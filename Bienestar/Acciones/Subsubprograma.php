<?php
include "../conexion/Conexion.php";
include "../Tabla/Subsubprograma.php";
// ⚙️⚙️⚙️ ======================== DELETE ======================== ⚙️⚙️⚙️
if(isset($_GET['delete']) && !Empty($_GET['delete'])){
    $sql = "EXEC [BD_Bienestar].[dbo].[Eliminar".$tabla."]@".$PK."=".$_GET['delete'].";";
    $result = sqlsrv_query($con, $sql);
    if($result){
        header("Location: ../".$_GET[$tabla].".php?susses=1&action=elimino");
    }else{
        header("Location: ../".$_GET[$tabla].".php?susses=2&action=elimino");
    }
}

// ⚙️⚙️⚙️ ======================== INSERT ======================== ⚙️⚙️⚙️
if(isset($_GET['agregar']) && !Empty($_GET['agregar'])){
    $sql = "EXEC [BD_Bienestar].[dbo].[Insertar".$tabla."] 
            @".$campo1." = '".$_GET[$campo1]."',
            @".$campo2." = '".$_GET[$campo2]."',
            @".$campo3." = '".$_GET[$campo3]."',
            @".$campo4." = '".$_GET[$campo4]."',
            @".$campo5." = '".$_GET[$campo5]."'
            ;";
    $result = sqlsrv_query($con, $sql);
    if($result){
        if (isset($_GET['GS'])) {
            header("Location: ../".$_GET[$tabla].".php?susses=1&action=agrego");
        }elseif (isset($_GET['GN'])) {
            header("Location: ../".$_GET[$tabla].".php?add=1&susses=1&action=agrego");
        }
    }else{
        if (isset($_GET['GS'])) {
            header("Location: ../".$_GET[$tabla].".php?susses=2&action=agrego");
        } elseif (isset($_GET['GN'])) {
            header("Location: ../".$_GET[$tabla].".php?add=1&susses=2&action=agrego");
        }
    }
}

// ⚙️⚙️⚙️ ======================== UPDATE ======================== ⚙️⚙️⚙️
if(isset($_GET['actualizar']) && !Empty($_GET['actualizar'])){
    if($_GET[$campo4] == ""){
        $_GET[$campo4] = $_GET['foto1'];
    }
    $sql = "EXEC [BD_Bienestar].[dbo].[Actualizar".$tabla."] 
            @".$PK." = ".$_GET[$PK].", 
            @".$campo1." = '".$_GET[$campo1]."',
            @".$campo2." = '".$_GET[$campo2]."',
            @".$campo3." = '".$_GET[$campo3]."',
            @".$campo4." = '".$_GET[$campo4]."',
            @".$campo5." = '".$_GET[$campo5]."'
            ;";
    $result = sqlsrv_query($con, $sql);
    if($result){
        if (isset($_GET['GS'])) {
            header("Location: ../".$_GET[$tabla].".php?susses=1&action=actualizó");
        }elseif (isset($_GET['GN'])) {
            header("Location: ../".$_GET[$tabla].".php?edit=".$_GET[$PK]."&susses=1&action=actualizó");
        }
    }else{
        if (isset($_GET['GS'])) {
            header("Location: ../".$_GET[$tabla].".php?susses=2&action=actualizó");
        } elseif (isset($_GET['GN'])) {
            header("Location: ../".$_GET[$tabla].".php?edit=".$_GET[$PK]."&susses=2&action=actualizó");
        }
    }
}
include "../conexion/Cerrar_conexion.php";
?>
