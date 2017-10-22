<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 22/10/2017
 * Time: 07:32 AM
 */
$servername="localhost";
$username="root";
$password="";
$db="infinity";
$conn=mysqli_connect($servername,$username,$password,$db);
if (!$conn){
    die("Connection Erro:".mysqli_connect_error());
}
?>