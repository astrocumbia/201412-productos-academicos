<html>
<head>
    <title>Agregar Egresado</title>
</head>
<body>
    <?php echo '<form action="'.base_url().'index.php/Egresadoctr/add" method="post">' ?>
        <P>
            <label for="matricula">Matricula: </label>
            <input type="text" id="matricula" name="matricula"><br>

            <label for="nombres">Nombres: </label>
            <input type="text" id="nombres" name="nombres"><br>

            <label for="apellidos">Apellidos: </label>
            <input type="text" id="apellidos" name="apellidos"><br>

            <label for="password">Contrasena: </label>
            <input type="text" id="password" name="password"><br>

            <label for="fecha_nacimiento">Fecha de nacimiento: </label>
            <input type="text" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="AAAA-MM-DD"><br>

            <label for="correo">Correo Electronico: </label>
            <input type="text" id="correo" name="correo"><br>

            <label for="direccion1">Direccion Principal: </label>
            <textarea id="direccion1" rows="4" cols="20" name="direccion1"></textarea><br>

            <label for="direccion2">Direccion Secundaria: </label>
            <textarea id="direccion2" rows="4" cols="20" name="direccion2"></textarea><br>

            <label for="codigo_postal">Codigo Postal: </label>
            <input type="text" id="codigo_postal" name="codigo_postal"><br>

            <label for="estado_actual">Estado Actual: </label>
            <select id="estado_actual" name="estado_actual">
                <option value="Oaxaca">Oaxaca</option>
                <option value="Mexico DF">Mexico DF</option>
            </select><br>

            <label for="ciudad_actual">Ciudad Actual: </label>
            <select id="ciudad_actual" name="ciudad_actual">
                <option value="Oaxaca de Juarez">Oaxaca de Juarez</option>
                <option value="Huajuapan de Leon">Huajuapan de Leon</option>
            </select><br>


            <label for="pais_origen">Pais de Origen: </label>
            <select id="pais_origen" name="pais_origen">
                <option value="Mexico">Mexico</option>
            </select><br>

            <label for="estado_origen">Estado de Origen: </label>
            <select id="estado_origen" name="estado_origen">
                <option value="Oaxaca">Oaxaca</option>
                <option value="Mexico DF">Mexico DF</option>
            </select><br>

            <label for="ciudad_origen">Ciudad de Origen: </label>
            <select id="ciudad_origen" name="ciudad_origen">
                <option value="Oaxaca de Juarez">Oaxaca de Juarez</option>
                <option value="Huajuapan de Leon">Huajuapan de Leon</option>
            </select><br>

            <label for="telefono_movil">Telefono Movil: </label>
            <input type="text" id="telefono_movil" name="telefono_movil"><br>

            <label for="telefono_fijo">Telefono Fijo: </label>
            <input type="text" id="telefono_fijo" name="telefono_fijo"><br>

            <label for="sigue_estudiando"> Sigues estudiando?: </label>
            <select id="sigue_estudiando" name="estudiando">
                <option value="si">si</option>
                <option value="no">no</option>
            </select><br>

            <INPUT type="submit" value="Agregar Egresado"> <INPUT type="reset">
        </P>
    </form>
</body>
</html>