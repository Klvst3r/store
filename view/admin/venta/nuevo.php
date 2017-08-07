<!DOCTYPE html>
<html lang="en">

<head>

  <?php include(VISTA_RUTA."admininclude/head.php") ?>

</head>

<body>

  <div id="wrapper" ng-app="ventaApp" ng-controller="ventaController">

    <!-- Navigation -->
    <?php  include(VISTA_RUTA."admininclude/menu.php"); ?>
    <div id="page-wrapper">
      <br/>
      <div class="row">
        <div class="col-lg-12"><?php echo isset($venta) ? 'Actualizar' : 'Nueva' ?> venta | 
          <a href="<?php url('venta'); ?>" class="btn btn-default">
            <i class="fa fa-arrow-left"></i> Ver Listado</a>
          </h1>
        </div>
        <!-- /.col-lg-12 -->
      </div>

      <!-- Begin Work Area -->
      <br/>
      <div class="row">
        <form action="<?php url('venta/agregar'); ?>" method="POST" role="form">
          <input type="hidden" value="<?php url(''); ?>" id="urlPrincipal" />
          <div class="col-md-6">
            <div class="panel panel-default">
             <div class="panel-body">
              <legend>Datos del Cliente</legend>

              <?php if(isset($venta)) { ?>
              <input type="hidden" value="<?php echo $venta->id ?>" name="venta_id" />
              <?php } ?>

              <div class="form-group">
                <label for="venta">Nombre del Cliente</label>
                <input value="<?php echo isset($venta) ? $venta->cliente : '' ?>"
                type="text" name="nombre" class="form-control" id="venta" placeholder="Nombre Apellido(s)" required autofocus />
              </div>

              <?php if(isset($venta)) { ?>
              <div class="form-group">
                <label for="precio">Precio</label>
                <input value="<?php echo isset($venta) ? $venta->precio : '' ?>"
                type="text" name="precio" class="form-control" id="precio" placeholder="0.00" required  />
              </div>
              <?php } ?>


              <!-- <button type="submit" class="btn btn-primary">Guardar</button> -->
            </div>
          </div>
      
        </div>
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-body">
              <button ng-click="cargarProductos()" data-toggle="modal" data-target="#listaProductos" type="button" class="btn btn-sm btn-primary">Agregar Producto</button>
              <hr/>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </form>  
    </div>

    <!-- End Work Area -->
    <!-- Get Bootstrap - Javascript  Modal -->
    <!-- Modal -->
    <div class="modal fade" id="listaProductos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Listado de Productos</h4>
          </div>
          <div class="modal-body"> 
            <!-- Se cargan los productos -->
           <input type="text" class="form-control" placeholder="Buscar" ng-model="buscarProducto" /> 
           <hr/>

            <!-- Tabla de productos cargados dinamicamente con Angular --> 
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Producto</th>
                  <th>Precio</th>
                  <th>Acción</th>
                </tr>
              </thead>
              <tbody>
                <!-- Referencia al scope de Angular de Productos -->
                <tr ng-repeat="producto in productos | filter:buscarProducto">
                  <td>{{ producto.nombre }}</td>
                  <td>{{ producto.precio | currency:'$ ' }}</td>
                    <td><button type="button" class="btn btn-sm btn-default">Agregar Producto</button></td>
                </tr>
              </tbody>
            </table>
            <!-- Tabla de productos cargados dinamicamente con Angular -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
<!-- Get Bootstrap - Javascript  Modal -->



  </div>
  <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php  include(VISTA_RUTA."admininclude/scripts.php"); ?>

</body>

</html>
