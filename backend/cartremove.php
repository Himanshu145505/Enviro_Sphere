<?php
$id = $_GET['id'];
$con = mysqli_connect("127.0.0.1:3308","root",'',"envirosphere");
$sql = "DELETE FROM `cart` WHERE `id`='$id'";
$result = mysqli_query($con, $sql);
if($result)
{
    header("location: shop.php");
}

?>
