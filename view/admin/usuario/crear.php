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
                <div class="col-lg-12"><?php echo isset($usuario) ? 'Actualizar' : 'Nuevo' ?> Usuario | 
                    <a href="<?php url('usuario'); ?>" class="btn btn-default">
                        <i class="fa fa-users"></i> Ver Listado</a>
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
                        <form action="<?php url('usuario/agregar'); ?>" method="POST" role="form">
                            <legend>Datos del usario</legend>

                            <?php if(isset($usuario)) { ?>
                                  <input type="hidden" value="<?php echo $usuario->id ?>" name="usuario_id" />
                            <?php } ?>

                            <div class="form-group">
                              <label for="usuario">Nombre</label>
                              <input value="<?php echo isset($usuario) ? $usuario->usuario : '' ?>"
                              type="text" name="usuario" class="form-control" id="usuario" placeholder="Nombre de Usuario" required autofocus />
                            </div>
                          
                            <div class="form-group">
                              <label for="email">Email</label>
                              <input value="<?php echo isset($usuario) ? $usuario->email : '' ?>"
                              type="email" name="email" class="form-control" id="email" placeholder="usuario@dominio" required  />
                            </div>

                            <div class="form-group">
                              <label for="pwd">Password</label>
                              <input type="password" name="password" class="form-control" id="pwd" />
                            </div>

                            <div class="form-group">
                              <label for="inputPrivi">Privilegio</label>
                              <select name="privilegio" id="inputPrivi" class="form-control" required="required">
                                  <option <?php echo isset($usuario) && $usuario->privilegio == 'admin' ? 'selected' : '' ?> value?"admin">Administrador</option>
                                  <option <?php echo isset($usuario) && $usuario->privilegio == 'venta' ? 'selected' : '' ?> value?"venta">Vendedor</option>
                              </select>
                            </div>


                          <button type="submit" class="btn btn-primary">Registrar</button>
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
