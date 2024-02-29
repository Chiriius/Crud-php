<h3>Inscripcion de Usuarios</h3>
<form method="POST" action="?controlador=inscripcion&accion=registrar" id="frm" onsubmit="return false;">
    <div class="col-lg-6">
        <label for="apellidos" class="form-label">Email</label>
        <input type="text" class="form-control" id="ins_usu_correo" name="ins_usu_correo"
            placeholder="Correo del usuario">
    </div>
    <br>
    <div class="col-lg-6">
        <label for="apellidos" class="form-label">Codigo programa</label>
        <input type="text" class="form-control" id="ins_usu_codigo" name="ins_usu_codigo"
            placeholder="Codigo del programa">
    </div>
    <br>
 
    <div class="col-lg-6">
        <label for="fecha_nac" class="form-label">Fecha de inscripcion</label>
        <input type="date" class="form-control" id="USPRO_FCH_INS" name="USPRO_FCH_INS">
    </div>
    <button type="submit" class="btn btn-primary m-4" onclick="ins()">Inscribir</button>
</form>
<h3>Inscripciones recientes</h3>
<table class="table table-dark table-striped-columns">
    <thead>
        <tr>
            <th scope="row">Id del usuario</th>
            <th scope="row">Codigo del programa</th>
            <th scope="row">Fecha de la inscripcion</th>
            <th></th>

        </tr>
    </thead>
    <tbody>

        <?php
                foreach ($this->inscripciones as $data) {
           $id = $data["USPRO_UID"];
            echo "<tr>";
           echo "<th>" . $data["USPRO_USU_ID"] . "</th>";
            echo "<th>" . $data["USPRO_PRO_ID"] . "</th>";
           echo "<th>" . $data["USPRO_FCH_INS"] . "</th>";
           echo "<th></th>";

     }
        ?>
    </tbody>
</table>