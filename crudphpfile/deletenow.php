<?php
require_once("../database/connection.php");

if(isset($_GET["btn_yes"])){
    $user_id = $_GET["user_id"];
    mysqli_query($con, "DELETE FROM tbl_info WHERE id = '$user_id'");

    echo "<script language='javascript'>alert('Successfully DELETED!')</script>";
    echo "<script>window.location.href='../admin/crud.php';</script>";

}
mysqli_close($con);


?>