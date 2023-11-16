<?php
if(!isset($_POST["total"])) exit;


session_start();


$total = $_POST["total"];
include_once "base_de_datos.php";


$ahora = date("Y-m-d H:i:s");


$sentencia = $base_de_datos->prepare("INSERT INTO tbl_pedidos(fecha_pedido, total) VALUES (?, ?);");
$sentencia->execute([$ahora, $total]);

$sentencia = $base_de_datos->prepare("SELECT id_pedido FROM tbl_pedidos ORDER BY id_pedido DESC LIMIT 1;");
$sentencia->execute();
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

$idVenta = $resultado === false ? 1 : $resultado->id_pedido;

$base_de_datos->beginTransaction();
$sentencia = $base_de_datos->prepare("INSERT INTO tbl_platillos_vendidos(id_platillo, id_pedido, cantidad) VALUES (?, ?, ?);");

foreach ($_SESSION["carrito"] as $producto) {
	$total += $producto->total;
	$sentencia->execute([$producto->id_platillo, $idVenta, $producto->cantidad]);
}
$base_de_datos->commit();
unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];
header("Location: ./vender.php?status=1");
?>