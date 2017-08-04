<!DOCTYPE html>
<html lang="en">

<head>

    <?php include(VISTA_RUTA."admininclude/head.php") ?>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php  include(VISTA_RUTA."admininclude/menu.php"); ?>
        <div id="page-wrapper">
            <br/>
            <div class="row">
                <div class="col-lg-12"><?php echo isset($producto) ? 'Actualizar' : 'Nuevo' ?> producto | 
                    <a href="<?php url('producto'); ?>" class="btn btn-default">
                        <i class="fa fa-arrow-left"></i> Ver Listado</a>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- Begin Work Area -->
            <br/>
            <div class="row">
                <div class="col-md-6">
                  <div class="panel panel-default">
                     <div class="panel-body">
                        <form action="<?php url('producto/agregar'); ?>" method="POST" role="form">
                            <legend>Datos del producto</legend>

                            <?php if(isset($producto)) { ?>
                                  <input type="hidden" value="<?php echo $producto->id ?>" name="producto_id" />
                            <?php } ?>

                            <div class="form-group">
                              <label for="producto">Nombre</label>
                              <input value="<?php echo isset($producto) ? $producto->nombre : '' ?>"
                              type="text" name="nombre" class="form-control" id="producto" placeholder="Nombre del producto" required autofocus />
                            </div>
                          
                            <div class="form-group">
                              <label for="precio">Precio</label>
                              <input value="<?php echo isset($producto) ? $producto->precio : '' ?>"
                              type="text" name="precio" class="form-control" id="precio" placeholder="0.00" required  />
                            </div>


                          <button type="submit" class="btn btn-primary">Guardar</button>
                      </form>  
                  </div>
              </div>

          </div>
      </div>

  <!-- End Work Area -->


</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php  include(VISTA_RUTA."admininclude/scripts.php"); ?>

</body>

</html>
