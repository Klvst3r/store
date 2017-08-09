<!DOCTYPE html>
<html lang="en">
<head>
  <?php include VISTA_RUTA . "admininclude/head.php"?>
</head>
<body>
  <div id="wrapper" ng-app="ventaApp" ng-controller="ventaController">
    <?php include VISTA_RUTA . "admininclude/menu.php"?>
    <div id="page-wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header"><?php echo isset($venta) ? 'Actualizar' : 'Nueva'?> venta | <a href="<?php url('venta')?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Ver listado</a>
          </h1>
        </div>
        <!-- /.col-lg-12 -->
      </div>
      <!-- INICIO CONTENIDO -->

      <div class="row">
        <form action="<?php url('venta/agregar')?>" method="POST" role="form">
          <input type="hidden" value="<?php url('')?>" id="urlPrincipal">
          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-body">

                <legend>Datos de cliente</legend>

                <?php if (isset($venta)) {?>
                  <input type="hidden" value="<?php echo $venta->id?>" name="venta_id">
                  <?php }
?>

                  <div class="form-group">
                    <label for="usuario">Nombre del cliente</label>
                    <input value="<?php echo isset($venta) ? $venta->cliente : ''?>" required autofocus type="text" name="nombre" class="form-control" id="usuario" placeholder="Nombre Apellido(s)">
                  </div>
                  <?php if (isset($venta)) {?>
                    <div class="form-group">
                      <label for="precio">Precio</label>
                      <input value="<?php echo isset($venta) ? $venta->precio : ''?>" required type="text" name="precio" class="form-control" id="precio" placeholder="0.00">
                    </div>
                    <?php }
?>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <button ng-click="cargarProductos()" data-toggle="modal" data-target="#listaProductos" type="button" class="btn btn-sm btn-primary">Agregar producto</button>
                    <hr>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Producto</th>
                          <th>Cantidad</th>
                          <th>Precio</th>
                          <th>Subtotal</th>
                          <th><i class="fa fa-cog"></i></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr ng-repeat="pd in productosAdd">
                          <td>{{ pd.nombre }}</td>
                          <td>{{ pd.cantidad }}</td>
                          <td>{{ pd.precio | currency:'$ ' }}</td>
                          <td>{{ pd.subtotal | currency:'$ ' }}</td>
                          <td>
                            <a class="text-danger" href="javascript:;" ng-click="removerProducto($index)"><i class="fa fa-times"></i></a>
                          </td>
                        </tr>
                        <tr>
                          <th colspan="3" class="text-right">Total: </th>
                          <td>{{ getTotal() | currency:'$ ' }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <input type="hidden" name="productos" value="{{ productosAdd }}">
                <input type="hidden" name="monto_total" value="{{ getTotal() }}">
                <div class="text-right">
                  <button class="btn btn-lg btn-success" type="submit">Registrar venta</button>
                </div>
              </div>
            </form>
          </div>
          <div class="modal fade" id="listaProductos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Listado de productos</h4>
                </div>
                <div class="modal-body">
                  <input type="text" class="form-control" placeholder="buscar" ng-model="buscarProducto">
                  <hr>
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Accion</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr ng-repeat="producto in productos | filter:buscarProducto " >
                        <td>{{ producto.nombre }}</td>
                        <td>{{ producto.precio | currency:'$ ' }}</td>
                        <td>
                          <button ng-click="seleccionarProducto(producto.id)" type="button" class="btn btn-sm btn-default">Agregar producto</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div>
          <!--TERMINO CONTENIDO -->
        </div>
        <!-- /#page-wrapper -->
      </div>
      <!-- /#wrapper -->
      <?php include VISTA_RUTA . "admininclude/scripts.php"?>
    </body>

    </html>