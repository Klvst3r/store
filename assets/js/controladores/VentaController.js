var ventaApp = angular.module("ventaApp", []);
ventaApp.controller('ventaController', ['$scope', '$http',"$filter",function($scope, $http, $filter) {
        $scope.productos = [];
    //array para agragar productos
        $scope.productosAdd = [];
    
        $scope.producto = {};
        $scope.url = $("#urlPrincipal").val();

        //Creación de metodo de Angular que puede cargarse en cualquier momento en la vista    
        $scope.cargarProductos = function() {
            $http.get($scope.url + "producto/todos").then(function($request) {
                $scope.productos = $request.data;
            });
        };

        $scope.removerProducto = function(index){
            $scope.productosAdd.splice(index,1);
        }

        $scope.seleccionarProducto = function($id_producto) {
            var prod = $filter("filter")($scope.productos, {
                id: $id_producto
            })[0];

            //Cuando aun no se agraga el producto
            var agregar = true;



            //Condicional para ver si es la primera vez que se agrega el producto 
            if($scope.productosAdd.length == 0){
                //Solo al estar vacio agrega producto
                $scope.agregarProducto(prod);
                //Cuando es cero no agrega otra fila con el mismo producto sino lo suma al ya listado
                agregar = false;
            }else{
                //Si esta en la lista, se quiere filtrar lo que se quiere recorrer productosAdd, mediante una funcion anonima
                angular.forEach($scope.productosAdd,function(value,key){
                    //Recorrera este conjunto de datos e internamente se comprueba si ya existe internamente
                    if(value["id"] == $id_producto){
                        //Solo suma cantidades
                        value.cantidad++;
                        //Hayamos el subtotal
                        value.subtotal = (value.cantidad * value.precio);
                        //Si ya esta agragado el producto
                        agregar = false;
                    }
                });
            }

            
            if(agregar){
                //Enviamos el producto adicional desde la funcion agregarProducto
                $scope.agregarProducto(prod);
            }

            //Oculpa el modal al seleccionar
            $('#listaProductos').modal('hide');
        }

        $scope.agregarProducto = function(prod) {
            //Agregamos al array de productos
            $scope.producto = {
                id: prod.id,
                nombre: prod.nombre,
                cantidad: 1,
                precio: prod.precio,
                subtotal: prod.precio
            };

            //Le empujamos el producto en el array
            $scope.productosAdd.push($scope.producto);
        }

        $scope.getTotal = function(){
            //Inicializamos con cero la variable que nos va ir sumando
            var total = 0;
            //Recorre internamente la suma de productos
            angular.forEach($scope.productosAdd,function(value,key){
                    total = total + parseInt(value.subtotal);//Lo formatea en subtotal como valor numerico
            });
            
            return total;
        }
    }
]);