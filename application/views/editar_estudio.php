<html>
<head>
    <title>Editar Estudio</title>
</head>
<body>

<?php echo '<form action="'.base_url().'index.php/Estudioctr/update" method="post">' ?>
<P>
    <input type="hidden" id="id" name="id" value= "<?php echo $data->id; ?>"><br>

    <label for="Programa">Programa: </label>
    <input type="text" id="programa" name="Programa" value= "<?php echo $data->programa; ?>"><br>

    <label for="institucion">Institucion: </label>
    <input type="text" id="institucion" name="institucion" value = "<?php echo $data->institucion; ?>"><br>

    <label for="tipo">Tipo: </label>
    <input type="text" id="tipo" name="tipo" value = "<?php echo $data->tipo; ?>"><br>

    <label for="fecha_inicio">Fecha de Inicio: </label>
    <input type="text" id="fecha_inicio" name="fecha_inicio" value = "<?php echo $data->iniciado_el; ?>"><br>

    <label for="fecha_fin">Fecha de Terminacion: </label>
    <input type="text" id="fecha_fin" name="fecha_fin" value = "<?php echo $data->terminado_el; ?>" ><br>

    <label for="fecha_titulacion">Fecha de Titulacion: </label>
    <input type="text" id="fecha_titulacion" name="fecha_titulacion" value = "<?php echo $data->titulado_el; ?>" ><br>

    <INPUT type="submit" value="Editar Egresado"> <INPUT type="reset">
</P>
</form>
</body>
</html>