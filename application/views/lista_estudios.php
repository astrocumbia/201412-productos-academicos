<html>
<head>
    <title>Lista de Egresados</title>
</head>
<body>

<a href="<?php  echo base_url()?>">Menu Principal</a><br><br>


Estudios Existentes en la base de Datos: <?php echo $numFilas; ?>
<br>
<br>

<form method="link" <?php  echo 'action="'.base_url().'index.php/Estudioctr/view_add"' ?>>
    <input type="submit" value="Agregar un Estudio">
</form>

<br>

<table border="1">
    <tr>
        <td>Id</td>
        <td>PROGRAMA</td>
        <td>INSTITUCION</td>
        <td>TIPO</td>
        <td>FECHA DE INICIO</td>
        <td>FECHA DE TERMINACION</td>
        <td>FECHA DE TITULACION</td>
        <td></td>
        <td></td>
    </tr>
    <?php
    foreach( $data as $estudio )
    {
        echo "<tr>";
        echo "<td>".$estudio->id."</td>";
        echo "<td>".$estudio->programa."</td>";
        echo "<td>".$estudio->institucion."</td>";
        echo "<td>".$estudio->tipo."</td>";
        echo "<td>".$estudio->iniciado_el."</td>";
        echo "<td>".$estudio->terminado_el."</td>";
        echo "<td>".$estudio->titulado_el."</td>";
        echo "<td><a href=".base_url()."index.php/Estudioctr/view_update/".$estudio->id.">EDITAR</a></td>";
        echo "<td><a href=".base_url()."index.php/Estudioctr/delete/".$estudio->id.">ELIMINAR</a></td>";;
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>