<?php
$connect = pg_connect("host=34.67.116.97 dbname=Database user=postgres password=cataso123");

session_start();
$user=$_POST['user'];
$password=$_POST['pass'];

$query="SELECT * FROM administrador WHERE nombre='$user' AND password='$password'";

$consulta=pg_query($connect,$query);
$cantidad=pg_num_rows($consulta);

if($cantidad>0){
    $_SESSION['nombre_usuario']=$user;
    echo "<h1>Bienvenido $user</h1>";
    header("location: index.php");
} else {

    $mensaje = "Datos incorrectos";
    header("Location: signin.php?mensaje=" . urlencode($mensaje));

}
?>