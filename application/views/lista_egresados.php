<html>
<head>
    <title>Lista de Egresados</title>
</head>
<body>


<a href="<?php  echo base_url()?>">Menu Principal</a><br><br>

Egresados Existentes en la base de Datos: <?php echo $numFilas; ?>
<br>
<br>

<form method="link" <?php  echo 'action="'.base_url().'index.php/Egresadoctr/view_add"' ?>>
    <input type="submit" value="Agregar un Egresado">
</form>

<br>

<table border="1">
    <tr>
        <td>Id</td>
        <td>MATRICULA</td>
        <td>NOMBRES</td>
        <td>APELLIDOS</td>
        <td>FECHA DE NACIMIENTO</td>
        <td>CORREO</td>
        <td>EDITAR</td>
        <td>ELIMINAR</td>

    </tr>
    <?php
        foreach( $data as $egresado )
        {
            echo "<tr>";
                echo "<td>".$egresado->id."</td>";
                echo "<td>".$egresado->matricula."</td>";
                echo "<td>".$egresado->nombres."</td>";
                echo "<td>".$egresado->apellidos."</td>";
                echo "<td>".$egresado->nacido_el."</td>";
                echo "<td>".$egresado->correo."</td>";
                echo "<td><a href=".base_url()."index.php/Egresadoctr/view_update/".$egresado->id.">EDITAR</a></td>";
                echo "<td><a href=".base_url()."index.php/Egresadoctr/delete/".$egresado->id.">ELIMINAR</a></td>";;
            echo "</tr>";
        }
    ?>
</table>

</body>
</html>