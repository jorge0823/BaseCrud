<!DOCTYPE html>
<?php include "Tabla/Cliente.php";?>
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
                            <h1>Participantes</h>
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
                                        $fecha = $row['cli_fecha']; // $fecha es un objeto DateTime
                                        $fechaFormateada = $fecha->format('Y-m-d'); // Formatear la fecha como una cadena
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
                                        <input type="text" class="form-control" value="<?php echo $row[$campo2];?>" name="<?php echo $campo2;?>" required style="border: 1px solid #fff;" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $nombre3;?></label>
                                        <input type="text" class="form-control" value="<?php echo $row[$campo3];?>" name="<?php echo $campo3;?>" required style="border: 1px solid #fff;" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $nombre4;?></label>
                                        <input type="text" class="form-control" value="<?php echo $row[$campo4];?>" name="<?php echo $campo4;?>" required style="border: 1px solid #fff;" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $nombre5;?></label>
                                        <input type="text" class="form-control" value="<?php echo $row[$campo5];?>" name="<?php echo $campo5;?>" style="border: 1px solid #fff;" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $nombre6;?></label>
                                        <input type="text" class="form-control" value="<?php echo $row[$campo6];?>" name="<?php echo $campo6;?>" required style="border: 1px solid #fff;" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $nombre7;?></label>
                                        <input type="date" class="form-control" value="<?php echo $fechaFormateada;?>" name="<?php echo $campo7;?>" style="border: 1px solid #fff;" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $nombre8;?></label>
                                        <input type="date" class="form-control" value="<?php echo $row[$campo9];?>" name="<?php echo $campo9;?>" style="border: 1px solid #fff;" readonly>
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
                                        $fecha = $row['cli_fecha']; // $fecha es un objeto DateTime
                                        $fechaFormateada = $fecha->format('Y-m-d'); // Formatear la fecha como una cadena
                                    ?>
                                    <input type="text" value="<?php echo $row[$PK];?>" name="<?php echo $PK;?>" hidden>
                                    <input type="text" value="<?php echo $tabla;?>" name="<?php echo $tabla;?>" hidden>
                                    <input type="text" value="1" name="actualizar" hidden>
                                    <div class="form-group">
                                        <label><?php echo $nombre1;?></label>
                                        <input type="text" class="form-control" value="<?php echo $row[$campo1];?>" name="<?php echo $campo1;?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $nombre2;?></label>
                                        <input type="text" class="form-control" value="<?php echo $row[$campo2];?>" name="<?php echo $campo2;?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $nombre3;?></label>
                                        <input type="text" class="form-control" value="<?php echo $row[$campo3];?>" name="<?php echo $campo3;?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $nombre4;?></label>
                                        <input type="text" class="form-control" value="<?php echo $row[$campo4];?>" name="<?php echo $campo4;?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $nombre5;?></label>
                                        <input type="text" class="form-control" value="<?php echo $row[$campo5];?>" name="<?php echo $campo5;?>">
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $nombre6;?></label>
                                        <select class="form-control m-b" name="<?php echo $campo6;?>" required>
                                            <option value="<?php echo $row[$campo6];?>"><?php echo $row[$campo8];?></option>
                                            <?php
                                            $sql = "EXEC [BD_Bienestar].[dbo].[ObtenerPrograma];";
                                            $result = sqlsrv_query($con, $sql);
                                            while ($row2 = sqlsrv_fetch_array($result)) {
                                                if($row2['pro_id'] != $row[$campo6]){
                                            ?>
                                            <option value="<?php echo $row2['pro_id']?>"><?php echo $row2['pro_nombre']?></option>
                                            <?php
                                                }
                                            } //fin del while
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $nombre7;?></label>
                                        <input type="date" class="form-control" value="<?php echo $fechaFormateada;?>" name="<?php echo $campo7;?>">
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $nombre9;?></label>
                                        <input type="number" class="form-control" value="<?php echo $row[$campo9];?>" name="<?php echo $campo9;?>" required>
                                    </div>
                                    <?php
                                    } //fin del while
                                    ?>
                                    <div>
                                        <button class="btn btn-sm btn-primary pull-left m-t-n-xs" type="submit" name="GN"><strong>Guardar</strong></button>
                                        <button class="btn btn-sm btn-primary pull-left m-t-n-xs" type="submit" name="GS" style="margin-left: 1%;"><strong>Guardar y salir</strong></button>
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
                                        <input type="text" class="form-control" value="" name="<?php echo $campo2;?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $nombre3;?></label>
                                        <input type="text" class="form-control" value="" name="<?php echo $campo3;?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $nombre4;?></label>
                                        <input type="text" class="form-control" value="" name="<?php echo $campo4;?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $nombre5;?></label>
                                        <input type="text" class="form-control" value="" name="<?php echo $campo5;?>">
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $nombre6;?></label>
                                        <select class="form-control m-b" name="<?php echo $campo6;?>" required>
                                            <option value="" disabled selected>-- Seleccione Programa --</option>
                                            <?php
                                            $sql = "EXEC [BD_Bienestar].[dbo].[ObtenerPrograma];";
                                            $result = sqlsrv_query($con, $sql);
                                            while ($row2 = sqlsrv_fetch_array($result)) {
                                            ?>
                                            <option value="<?php echo $row2['pro_id']?>"><?php echo $row2['pro_nombre']?></option>
                                            <?php
                                            } //fin del while
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $nombre9;?></label>
                                        <input type="number" class="form-control" value="" name="<?php echo $campo9;?>">
                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-primary pull-left m-t-n-xs" type="submit" name="GN"><strong>Guardar</strong></button>
                                        <button class="btn btn-sm btn-primary pull-left m-t-n-xs" type="submit" name="GS"style="margin-left: 1%;"><strong>Guardar y salir</strong></button>
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
                                            <td><?php echo $nombre5;?></td>
                                            <td><?php echo $nombre6;?></td>
                                            <td><?php echo $nombre7;?></td>
                                            <td><?php echo $nombre9;?></td>
                                            <td>Acciones</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sql = "EXEC [BD_Bienestar].[dbo].[Obtener".$tabla."s];";
                                    $result = sqlsrv_query($con, $sql);
                                    while ($row = sqlsrv_fetch_array($result)) {
                                        $fecha = $row[$campo7]; // $fecha es un objeto DateTime
                                        $fechaFormateada = $fecha->format('Y-m-d'); // Formatear la fecha como una cadena
                                    ?>
                                        <tr>
                                            <td><?php echo $row[$PK]; ?></td>
                                            <td><?php echo $row[$campo1]; ?></td>
                                            <td><?php echo $row[$campo2]; ?></td>
                                            <td><?php echo $row[$campo3]; ?></td>
                                            <td><?php echo $row[$campo4]; ?></td>
                                            <td><?php echo $row[$campo5]; ?></td>
                                            <td><?php echo $row[$campo8]; ?></td>
                                            <td><?php echo $fechaFormateada; ?></td>
                                            <td><?php echo $row[$campo9]; ?></td>
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
