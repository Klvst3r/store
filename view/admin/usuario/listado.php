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
                <div class="col-lg-12">
                    <h1 class="page-header">Listado de usuarios</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- Begin Work Area -->
            
            <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $usuario) { ?>
                            <tr>
                                <td><?php echo $usuario->id; ?></td>
                                <td><?php echo $usuario->usuario; ?></td>
                                <td><?php echo $usuario->email; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>    

            <!-- End Work Area -->


        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php  include(VISTA_RUTA."admininclude/scripts.php"); ?>

</body>

</html>
