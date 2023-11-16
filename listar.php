<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM tbl_platillo;");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Platillos</h1>
		<div>
			<a class="btn btn-success" href="./formulario.php">Nuevo <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Platillo</th>
					<th>Descripción</th>
					<th>Precio</th>
					<th>Ingredientes</th>
					<th>Categoria</th>
					<th>Calorias</th>
					<th>Imagen</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($productos as $producto){ ?>
				<tr>
					<td><?php echo $producto->id_platillo ?></td>
					<td><?php echo $producto->platillo ?></td>
					<td><?php echo $producto->descripcion ?></td>
					<td><?php echo $producto->precio ?></td>
					<td><?php echo $producto->ingredientes ?></td>
					<td><?php echo $producto->categoria ?></td>
					<td><?php echo $producto->calorias ?></td>
					<td><img src="data:image/jpeg;base64,<?=base64_encode($producto->imagen) ?>" alt="imagen" width="100" height="100" /></td>
					<td><a class="btn btn-warning" href="<?php echo "editar.php?id=" . $producto->id_platillo?>"><i class="fa fa-edit"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminar.php?id=" . $producto->id_platillo?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>