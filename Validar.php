<?php
include('db.php');
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;


$conexion=mysqli_connect("localhost", "root", "", "login");

$consulta="SELECT*FROM usuarios where usuario='$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){  

    header("location:home.php");

} else {
      ?>
<?php
include("index.html");

?>
<center><div class="container">
<h1 class="btn btn-primary btn-lg btn btn-success animate__animated animate__bounce">Error de autentificacion</h1>
</div>
</center>
<?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);