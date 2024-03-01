<!DOCTYPE html>
<?php include "Tabla/Banner.php";?>
<html>
<head>
<?php include "zpiezas/head.php"; ?>
</head>
<style>
    .mensaje-exito {
        border: 2px solid #1ab394;
        padding: 15px;
        color: #1ab394;
        text-align: center;
        border-radius: 5px;
        background-color: #f0f8ff; 
        /* margin: 20px; */
        max-width: 400px; 
        position: absolute;
        margin-left: 36%;
        margin-top: 1%;
    }
    .mensaje-error {
        border: 2px solid #dc3545;
        padding: 15px;
        color: #dc3545;
        text-align: center;
        border-radius: 5px;
        background-color: #f2dede; 
        /* margin: 20px; */
        max-width: 400px; 
        position: absolute;
        margin-left: 36%;
        margin-top: 1%;
    }
</style>
<body>
    <div id="wrapper">
        <?php include "zpiezas/menu.php";?>
        <div id="page-wrapper" class="gray-bg">
            <?php include "zpiezas/top.php"; ?>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <?php if(isset($_GET['susses']) && !Empty($_GET['susses']) && $_GET['susses'] == '1'){?>
                        <div class="mensaje-exito">
                            Se <?php echo $_GET['action'];?> el campo exitosamente.
                        </div>
                        <?php }elseif(isset($_GET['susses']) && !Empty($_GET['susses']) && $_GET['susses'] == '2'){?>
                            <div class="mensaje-error">
                            No se <?php echo $_GET['action'];?> el campo error.
                            </div>
                        <?php }?>
                        <div class="ibox-title">
                            <h1>Banners</h>
                        </div>
                        <?php 
                        if(isset($_GET['view']) && !Empty($_GET['view'])){
                        ?>
                        <!-- =============VER TABLA============== -->
                        <div class="ibox-content">
                            <div class="ibox float-e-margins">
                                <form role="form" method="GET" action="Acciones/Actualizar.php">
                                    <?php
                                    $sql = "EXEC [BD_Bienestar].[dbo].[Obtener".$tabla."PorId] @".$PK." = ".$_GET['view'].";";
                                    $result = sqlsrv_query($con, $sql);
                                    while ($row = sqlsrv_fetch_array($result)) {
                                    ?>
                                    <input type="text" value="<?php echo $row[$PK];?>" name="<?php echo $PK;?>" hidden>
                                    <input type="text" value="<?php echo $tabla;?>" name="<?php echo $tabla;?>" hidden>
                                    <input type="text" value="1" name="actualizar" hidden>
                                    <div class="form-group">
                                        <label><?php echo $nombre1;?></label>
                                        <input type="text" class="form-control" value="<?php echo $row[$campo1];?>" name="<?php echo $campo1;?>" required style="border: 1px solid #fff;" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $nombre2;?></label>
                                        <a href="Acciones/Uploads/<?php echo $row[$campo2]; ?>" title="Image from Unsplash" data-gallery="">
                                            <img src="Acciones/Uploads/<?php echo $row[$campo2];?>" style="width: 10%">
                                        </a>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $nombre3;?></label>
                                        <input type="text" class="form-control" value="<?php echo $row[$campo3];?>" name="<?php echo $campo3;?>" required style="border: 1px solid #fff;" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $nombre4;?></label>
                                        <?php
                                        if($row[$campo4] == '1'){
                                        ?>
                                            <input type="text" class="form-control" value="Habilitado" name="<?php echo $campo4;?>" required style="border: 1px solid #fff;" readonly>
                                        <?php
                                        }else{
                                        ?>
                                            <input type="text" class="form-control" value="Deshabilitado" name="<?php echo $campo4;?>" required style="border: 1px solid #fff;" readonly>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    } //fin del while
                                    ?>
                                    <div>
                                        <a class="btn btn-sm btn-primary pull-left m-t-n-xs" style="margin-left: 1%;" onclick="exit()"><strong>Salir</strong></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                        }elseif(isset($_GET['edit']) && !Empty($_GET['edit'])){
                        ?>
                        <!-- =============UPDATE TABLA============== -->
                        <div class="ibox-content">
                            <div class="ibox float-e-margins">
                                <form role="form" method="GET" action="Acciones/<?php echo $tabla;?>.php">
                                    <?php
                                    $sql = "EXEC [BD_Bienestar].[dbo].[Obtener".$tabla."PorId] @".$PK." = ".$_GET['edit'].";";
                                    $result = sqlsrv_query($con, $sql);
                                    while ($row = sqlsrv_fetch_array($result)) {
                                    ?>
                                    <input type="text" value="<?php echo $row[$PK];?>" name="<?php echo $PK;?>" hidden>
                                    <input type="text" value="<?php echo $tabla;?>" name="<?php echo $tabla;?>" hidden>
                                    <input type="text" value="1" name="actualizar" hidden>
                                    <div class="form-group">
                                        <label><?php echo $nombre1;?></label>
                                        <input type="text" class="form-control" value="<?php echo $row[$campo1];?>" name="<?php echo $campo1;?>" required>
                                    </div>
                                    <!-- Subir imagenes -->
                                    <div class="form-group">
                                        <label><?php echo $nombre2;?></label>
                                        <div class="fileinput fileinput-exists input-group" data-provides="fileinput">
                                            <span class="input-group-addon btn btn-default btn-file">
                                                <span class="fileinput-new">Seleccionar Imagen</span>
                                                <span class="fileinput-exists">Cambiar</span>
                                                <input type="file" name="<?php echo $campo2;?>" id="foto"/>
                                            </span>
                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a>
                                            <div class="form-control" data-trigger="fileinput">
                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                <span class="fileinput-filename"><?php echo $row[$campo2];?></span>
                                            </div>
                                        </div> 
                                        <input type="text" name="foto1" value="<?php echo $row[$campo2];?>" hidden/>
                                    </div>
                                    <!-- fin Subir imagenes -->
                                    <div class="form-group">
                                        <label><?php echo $nombre3;?></label>
                                        <input type="text" class="form-control" value="<?php echo $row[$campo3];?>" name="<?php echo $campo3;?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $nombre4;?></label>
                                        <select name="<?php echo $campo4;?>" class="form-control m-b" required>
                                            <option value="1">Habilitado</option>
                                            <option value="0">Deshabilitado</option>
                                        </select>
                                    </div>
                                    <?php
                                    } //fin del while
                                    ?>
                                    <div>
                                        <button class="btn btn-sm btn-primary pull-left m-t-n-xs" type="submit" name="GN" onclick="subirImagen()"><strong>Guardar</strong></button>
                                        <button class="btn btn-sm btn-primary pull-left m-t-n-xs" type="submit" name="GS" onclick="subirImagen()" style="margin-left: 1%;"><strong>Guardar y salir</strong></button>
                                        <a class="btn btn-sm btn-primary pull-left m-t-n-xs" style="margin-left: 1%;" onclick="exit()"><strong>Salir</strong></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                        }elseif(isset($_GET['add']) && !Empty($_GET['add'])){
                        ?>
                        <!-- =============INSERT TABLA============== -->
                        <div class="ibox-content">
                            <div class="ibox float-e-margins">
                                <form role="form" method="GET" action="Acciones/<?php echo $tabla;?>.php">
                                    <input type="text" value="<?php echo $tabla;?>" name="<?php echo $tabla;?>" hidden>
                                    <input type="text" value="1" name="agregar" hidden>
                                    <div class="form-group">
                                        <label><?php echo $nombre1;?></label>
                                        <input type="text" class="form-control" value="" name="<?php echo $campo1;?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $nombre2;?></label>
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <span class="input-group-addon btn btn-default btn-file">
                                                <span class="fileinput-new">Seleccionar Imagen</span>
                                                <span class="fileinput-exists">Cambiar</span>
                                                <input type="file" name="<?php echo $campo2;?>" id="foto"/>
                                            </span>
                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a>
                                            <div class="form-control" data-trigger="fileinput">
                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                <span class="fileinput-filename"></span>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $nombre3;?></label>
                                        <input type="text" class="form-control" value="" name="<?php echo $campo3;?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $nombre4;?></label>
                                        <select name="<?php echo $campo4;?>" class="form-control m-b" required>
                                            <option value="1">Habilitado</option>
                                            <option value="0">Deshabilitado</option>
                                        </select>
                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-primary pull-left m-t-n-xs" type="submit" name="GN" onclick="subirImagen()"><strong>Guardar</strong></button>
                                        <button class="btn btn-sm btn-primary pull-left m-t-n-xs" type="submit" name="GS" onclick="subirImagen()" style="margin-left: 1%;"><strong>Guardar y salir</strong></button>
                                        <a class="btn btn-sm btn-primary pull-left m-t-n-xs" style="margin-left: 1%;" onclick="exit()"><strong>Salir</strong></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php 
                        }else{
                        ?>
                        <!-- =============MUESTRA TABLA============== -->
                        <div class="ibox-content">
                            <div>
                                <button class="btn btn-primary" style="margin: 0% 0% 2% 0%" onclick="add()">Agregar</button>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                        <tr>
                                            <td>N°</td>
                                            <td><?php echo $nombre1;?></td>
                                            <td><?php echo $nombre2;?></td>
                                            <td><?php echo $nombre3;?></td>
                                            <td><?php echo $nombre4;?></td>
                                            <td>Acciones</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sql = "EXEC [BD_Bienestar].[dbo].[Obtener".$tabla."];";
                                    $result = sqlsrv_query($con, $sql);
                                    while ($row = sqlsrv_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row[$PK]; ?></td>
                                            <td><?php echo $row[$campo1]; ?></td>
                                            <td>
                                                <a href="Acciones/Uploads/<?php echo $row[$campo2]; ?>" title="Image from Unsplash" data-gallery="">
                                                    <div style="background-image: url('Acciones/Uploads/<?php echo $row[$campo2]; ?>');background-size: 50%;height: 6vh;background-repeat: no-repeat;background-position: center;"></div>
                                                </a>
                                            </td>
                                            <td><?php echo $row[$campo3]; ?></td>
                                            <td><?php if($row[$campo4] == '1'){echo "Habilitado";}else{echo "Deshabilitado";} ?></td>
                                            <td>
                                                <button class="btn btn-primary" onclick="edit('<?php echo $row[$PK]; ?>')"><i class="fa fa-edit"></i></button>
                                                <button class="btn btn-primary" onclick="dele('<?php echo $row[$PK]; ?>')"><i class="fa fa-trash"></i></button>
                                                <button class="btn btn-primary" onclick="view('<?php echo $row[$PK]; ?>')"><i class="fa fa-search"></i></button>
                                            </td>
                                        </tr>
                                    <?php
                                    } //fin del while
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php 
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div>
                <strong>Copyright</strong> Banco Azteca &copy; 2024
            </div>
        </div>
    </div>
    <?php include "zpiezas/footer.php"; ?>                               
</body>
</html>
