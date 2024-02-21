<h3>Inscripcion de Usuarios</h3>
<div class="col-lg-6">
    <label for="apellidos" class="form-label">Email</label>
    <input type="text" class="form-control" id="email" name="email"
        placeholder="Correo del usuario">
</div>
<div class="col-lg-6">
                <label for="fecha_nac" class="form-label">Programas</label>
                    <select class="form-select" id="programa" name="programa" aria-label="Default select example">
                        <option selected >dd </option>
                        <option value="1">Construccion</option>
                        <option value="2">Programacion</option>
                        <option value="3"></option>
                    </select>
                </div>
<a href="?controlador=inscripcion&accion=registrar" class="btn btn-primary m-3">Inscribir</a>
<h3>Inscripciones recientes</h3>
<table class="table table-dark table-striped-columns">
    <thead>
        <tr>
            <th scope="row">Estudiante</th>
            <th scope="row">Programa</th>
            <th></th>

        </tr>
    </thead>
    <tbody>

        <?php
        foreach ($this->usuarios as $data) {
            $id = $data["USU_UID"];
            echo "<tr>";
            echo "<th>" . $data["USU_NOMBRES"] . "</th>";
            echo "<th>" . $data["USU_APELLIDOS"] . "</th>";
            echo "<th>" . $data["USU_EMAIL"] . "</th>";
            if ($_SESSION['USU_ROL'] == 1) {
                echo "<td><a href='?controlador=usuario&accion=frmEditar&id=$id' class='btn btn-primary m-3'>Editar</a>  |  <button class= 'btn btn-primary name='usuarios' mt-3' data-name='usuarios'  data-id='$id' onclick='confirmarEliminar()'>Eliminar</button>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>