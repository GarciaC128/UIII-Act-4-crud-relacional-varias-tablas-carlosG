<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["id_platillo"]) || !isset($_POST["platillo"]) || !isset($_POST["descripcion"]) || !isset($_POST["precio"]) || !isset($_POST["ingredientes"]) || !isset($_POST["categoria"]) || !isset($_POST["calorias"])) exit();
if($_FILES['imagen']['tmp_name']){
	$imagen= file_get_contents($_FILES["imagen"]["tmp_name"]);
 }else{
	 $imagen = null;
 }
 
#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id = $_POST["id_platillo"];
$platillo = $_POST["platillo"];
$descripcion = $_POST["descripcion"];
$precio = $_POST["precio"];
$ingredientes = $_POST["ingredientes"];
$categoria = $_POST["categoria"];
$calorias = $_POST["calorias"];

$sentencia = $base_de_datos->prepare("INSERT INTO tbl_platillo(id_platillo, platillo, descripcion, precio, ingredientes, categoria, calorias,imagen) VALUES (?, ?, ?, ?, ?, ?, ?,?);");
$resultado = $sentencia->execute([$id, $platillo, $descripcion, $precio, $ingredientes, $categoria, $calorias,$imagen]);

if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "pie.php" ?>