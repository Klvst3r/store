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
              <button type="button" class="btn btn-sm btn-primary">Agregar Producto</button>
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


  </div>
  <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php  include(VISTA_RUTA."admininclude/scripts.php"); ?>

</body>

</html>
