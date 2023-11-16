<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM tbl_platillo WHERE id_platillo = ?;");
$sentencia->execute([$id]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
if($producto === FALSE){
	echo "¡No existe algún producto con ese ID!";
	exit();
}

?>
<?php include_once "encabezado.php" ?>
	<div class="col-xs-12">
		<h1>Editar producto con el ID <?php echo $producto->id_platillo; ?></h1>
		<form method="post" action="guardarDatosEditados.php" enctype="multipart/form-data">
			<input type="hidden" name="id_platillo" value="<?php echo $producto->id_platillo; ?>">
	
			<!-- <label for="codigo">Código de barras:</label>
			<input value=">" class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código"> -->

			<label for="descripcion">Nombre de platillo:</label>
			<textarea required id="descripcion" name="platillo" cols="30" rows="5" class="form-control"><?php echo $producto->platillo ?></textarea>
			
			<label for="descripcion">Descripción:</label>
			<textarea required id="descripcion" name="descripcion" cols="30" rows="5" class="form-control"><?php echo $producto->descripcion ?></textarea>

			<label for="precioVenta">Precio:</label>
			<input value="<?php echo $producto->precio ?>" class="form-control" name="precio" required type="number" id="precioVenta" placeholder="Precio de venta">

			<label for="precioCompra">Ingredientes:</label>
			<input value="<?php echo $producto->ingredientes ?>" class="form-control" name="ingredientes" required type="text" id="precioCompra" placeholder="Precio de compra">
             
			<label for="precioCompra">Categoria:</label>
			<input value="<?php echo $producto->categoria ?>" class="form-control" name="categoria" required type="text" id="precioCompra" placeholder="Precio de compra">

			<label for="existencia">Calorias:</label>
			<input value="<?php echo $producto->calorias ?>" class="form-control" name="calorias" required type="text" id="existencia" placeholder="Cantidad o existencia">
			
			<label for="imagen">Imagen:</label>
			<input type="file" name="imagen" class="form-control" id="imagen"  value=""><img width="50" src="data:image/jpeg;base64,<?= base64_encode($producto->imagen); ?>" alt="Descripción de la imagen">
 			
			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./listar.php">Cancelar</a>
		</form>
	</div>
<?php include_once "pie.php" ?>
