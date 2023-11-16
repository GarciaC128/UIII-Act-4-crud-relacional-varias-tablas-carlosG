<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT tbl_pedidos.total, tbl_pedidos.fecha_pedido, tbl_pedidos.id_pedido, GROUP_CONCAT(	tbl_platillo.id_platillo, '..',  tbl_platillo.platillo, '..', tbl_platillos_vendidos.cantidad SEPARATOR '__') AS platillos FROM tbl_pedidos INNER JOIN tbl_platillos_vendidos ON tbl_platillos_vendidos.id_pedido = tbl_pedidos.id_pedido INNER JOIN tbl_platillo ON tbl_platillo.id_platillo = tbl_platillos_vendidos.id_platillo GROUP BY tbl_pedidos.id_pedido ORDER BY tbl_pedidos.id_pedido;");
$pedidos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

	<div class="col-xs-12">
		<h1>Pedidos</h1>
		<div>
			<a class="btn btn-success" href="./vender.php">Nueva <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID pedido</th>
					<th>Fecha</th>
					<th>Platillos vendidos</th>
					<th>Total</th>
					<th>Ticket</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($pedidos as $pedido){ ?>
				<tr>
					<td><?php echo $pedido->id_pedido ?></td>
					<td><?php echo $pedido->fecha_pedido ?></td>
					<td>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>ID</th>
									<th>Platillo</th>
									<th>Cantidad</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach(explode("__", $pedido->platillos) as $platillosConcatenados){ 
								$platillo = explode("..", $platillosConcatenados)
								?>
								<tr>
									<td><?php echo $platillo[0] ?></td>
									<td><?php echo $platillo[1] ?></td>
									<td><?php echo $platillo[2] ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</td>
					<td><?php echo $pedido->total ?></td>
					<td><a class="btn btn-info" href="<?php echo "imprimirTicket.php?id=" . $pedido->id_pedido?>"><i class="fa fa-print"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminarVenta.php?id=" . $pedido->id_pedido?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>