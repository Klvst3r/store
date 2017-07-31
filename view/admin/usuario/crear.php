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
            <div class="row">
                <div class="col-lg-12">Nuevo Usuario | 
                    <a href="<?php url('usuario'); ?>" class="btn btn-default">
                        <i class="fa fa-users"></i> Ver Listado</a>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- Begin Work Area -->
            
            <form action="" method="POST" role="form">
              <legend>Form title</legend>
              
              <div class="form-group">
                  <label for="">label</label>
                  <input type="text" class="form-control" id="" placeholder="Input field">
              </div>
              
              
              
              <button type="submit" class="btn btn-primary">Submit</button>
          </form>  

          <!-- End Work Area -->


      </div>
      <!-- /#page-wrapper -->

  </div>
  <!-- /#wrapper -->

  <?php  include(VISTA_RUTA."admininclude/scripts.php"); ?>

</body>

</html>
