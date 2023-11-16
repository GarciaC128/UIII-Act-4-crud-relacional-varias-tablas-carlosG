<?php

#Salir si alguno de los datos no está presente
if(
	empty($_POST["id_platillo"]) || !isset($_POST["platillo"]) || !isset($_POST["descripcion"]) || !isset($_POST["precio"]) || !isset($_POST["ingredientes"]) || !isset($_POST["categoria"]) || !isset($_POST["calorias"])
) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id = $_POST["id_platillo"];
$platillo = $_POST["platillo"];
$descripcion = $_POST["descripcion"];
$precio = $_POST["precio"];
$ingredientes = $_POST["ingredientes"];
$categoria = $_POST["categoria"];
$calorias = $_POST["calorias"];

if($_FILES['imagen']['tmp_name']){
	$imagen= file_get_contents($_FILES["imagen"]["tmp_name"]);
 }else{
	$sentencia = $base_de_datos->prepare("SELECT imagen FROM tbl_platillo WHERE id_platillo = ?;");
	$result = $sentencia->execute([$id]);
	$imagen = $sentencia->fetchColumn(); // Obtener el valor de la columna 'imagen' de la consulta

 }
 

$sentencia = $base_de_datos->prepare("UPDATE tbl_platillo SET platillo = ?, descripcion = ?, precio = ?, ingredientes = ?, categoria = ?, calorias = ?, imagen = ? WHERE id_platillo = ?;");
$resultado = $sentencia->execute([$platillo, $descripcion, $precio, $ingredientes, $categoria, $calorias, $imagen, $id]);

if($resultado === TRUE){
	header("Location: listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
?>