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
                    <h1 class="page-header">Listado de ventas | <a href="<?php url('venta/nuevo')?>" class="btn btn-primary"><i class="fa fa-plus"></i> Nueva venta</a>
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
                        <th>Precio</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- El nombre es la variable que se pasa del controlador, en el retorno de la vista-->
                    <?php foreach ($ventas as $v) {
                    ?>
                    <tr>
                        <td><?php echo $v->id ?></td>
                        <td><?php echo $v->cliente ?></td>
                        <td><?php echo "$ ". number_format($v->monto_venta,2) ?></td>
                        <td>
                            
                        </td>
                      
                    <?php    
                    } ?>


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