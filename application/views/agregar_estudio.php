<html>
<head>
    <title>Agregar Estudio</title>
</head>
<body>
<?php echo '<form action="'.base_url().'index.php/Estudioctr/add" method="post">' ?>
<P>
    <label for="Programa">Programa: </label>
    <input type="text" id="programa" name="Programa"><br>

    <label for="institucion">Institucion: </label>
    <input type="text" id="institucion" name="institucion"><br>

    <label for="tipo">Tipo: </label>
    <input type="text" id="tipo" name="tipo"><br>

    <label for="fecha_inicio">Fecha de Inicio: </label>
    <input type="text" id="fecha_inicio" name="fecha_inicio" placeholder="AAAA-MM-DD"><br>

    <label for="fecha_fin">Fecha de Terminacion: </label>
    <input type="text" id="fecha_fin" name="fecha_fin" placeholder="AAAA-MM-DD" ><br>

    <label for="fecha_titulacion">Fecha de Titulacion: </label>
    <input type="text" id="fecha_titulacion" name="fecha_titulacion"><br>

    <INPUT type="submit" value="Agregar Egresado"> <INPUT type="reset">
</P>
</form>
</body>
</html>