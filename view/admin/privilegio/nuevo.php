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
                <div class="col-lg-12"><?php echo isset($usuario) ? 'Actualizar' : 'Nuevo' ?> Privilegio | 
                    <a href="<?php url('privilegio'); ?>" class="btn btn-default">
                        <i class="fa fa-arrow-left"></i> Regresar Listado</a>
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
                        <form action="<?php url('privilegio/add'); ?>" method="POST" role="form">
                            <legend>Agregar Privilegio</legend>


                            <div class="form-group">
                              <label for="privilegio">Nombre</label>
                              <input value="<?php echo '' ?>"
                              type="text" name="privilegio" class="form-control" id="privilegio" placeholder="Nombre del Privilegio" required autofocus />
                            </div>
                          

                          <button type="submit" class="btn btn-primary">Registrar Privilegio</button>
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
