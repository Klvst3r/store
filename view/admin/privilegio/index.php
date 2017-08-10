<!DOCTYPE html>
<html lang="en">
<head>
    <?php include VISTA_RUTA . "admininclude/head.php"?>
</head>
<body>
    <div id="wrapper">
        <?php include VISTA_RUTA . "admininclude/menu.php"?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Listado de privilegios de usuarios | <a href="<?php url('privilegio/nuevo')?>" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo privilegio</a>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- INICIO CONTENIDO -->

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Privilegio</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $usuario) {?>
                    <tr>
                        <td><?php echo $usuario->id ?></td>
                        <td><?php echo $usuario->usuario ?></td>
                        <td><?php echo $usuario->privilegio ?></td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="<?php url('privilegio/edpriv/' . $usuario->id)?>">Cambiar</a>
                            
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>

            <!--TERMINO CONTENIDO -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <?php include VISTA_RUTA . "admininclude/scripts.php"?>
</body>

</html>