var ventaApp = angular.module("ventaApp", []);
ventaApp.controller('ventaController', ['$scope', '$http',"$filter",function($scope, $http, $filter) {
        
        $scope.productos = [];
        //array para agragar productos
        $scope.productosAdd = [];
        //Nuevo modelo para crear un objeto de datos {} objeto en JSON
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

            var agregar = true;

            if($scope.productosAdd.length == 0){
            	$scope.agregarProducto(prod);
            	agregar = false;
            }else{
            	angular.forEach($scope.productosAdd,function(value,key){
            		if(value["id"] == $id_producto){
            			value.cantidad++;
            			value.subtotal = (value.cantidad * value.precio);
            			agregar = false;
            		}
            	});
            }

            if(agregar){
            	$scope.agregarProducto(prod);
            }

            $('#listaProductos').modal('hide');
        }

        $scope.agregarProducto = function(prod) {
        	$scope.producto = {
                id: prod.id,
                nombre: prod.nombre,
                cantidad: 1,
                precio: prod.precio,
                subtotal: prod.precio
            };

            $scope.productosAdd.push($scope.producto);
        }

        $scope.getTotal = function(){
        	var total = 0;
        	angular.forEach($scope.productosAdd,function(value,key){
            		total = total + parseInt(value.subtotal);
            });
        	return total;
        }
    }
]);