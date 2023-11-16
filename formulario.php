<?php include_once "encabezado.php" ?>

<div class="col-xs-12">
	<h1>Nuevo platillo</h1>
	<form method="post" action="nuevo.php" enctype="multipart/form-data">
		<label for="codigo">ID platillo:</label>
		<input class="form-control" name="id_platillo" required type="text" id="id_platillo" placeholder="Escribe el id">

		<label for="precioVenta">Nombre platillo:</label>
		<input class="form-control" name="platillo" required type="text" id="precioVenta" placeholder="Nombre del platillo">

		<label for="descripcion">Descripción:</label>
		<textarea required id="descripcion" name="descripcion" cols="30" rows="5" class="form-control"></textarea>

		<label for="precioVenta">Precio:</label>
		<input class="form-control" name="precio" required type="text" id="precioVenta" placeholder="Precio">

		<label for="descripcion">ingredientes:</label>
		<textarea required id="descripcion" name="ingredientes" cols="30" rows="2" class="form-control"></textarea>

		<label for="precioVenta">Categoria:</label>
		<input class="form-control" name="categoria" required type="text" id="precioVenta" placeholder="categoria">

		<label for="precioVenta">Calorias:</label>
		<input class="form-control" name="calorias" required type="text" id="precioVenta" placeholder="calorias">
		
		<label for="precioVenta">Imagen:</label>
		<input class="form-control" name="imagen" required type="file" id="precioVenta" placeholder="calorias">

		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "pie.php" ?>