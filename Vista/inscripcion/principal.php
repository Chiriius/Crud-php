<div class="col-lg-12">
    <div class="row">
        <div class="col-5 p-4 me-5 ">
            <h3>Inscripcion de Usuarios</h3>
            <form method="POST" action="?controlador=inscripcion&accion=registrar" id="frm" onsubmit="return false;">
                <div class="col-lg-12 ">
                    <label for="apellidos" class="form-label">Email</label>
                    <input type="text" class="form-control" id="ins_usu_correo" name="ins_usu_correo"
                        placeholder="Correo del usuario">
                </div>
                <br>
                <div class="col-lg-12">
                    <label for="apellidos" class="form-label">Codigo programa</label>
                    <select class="form-select" name="ins_usu_codigo" id="ins_usu_codigo">
                        <option selected>Seleccione un programa</option>
                        <?php foreach ($this->programas as $programa): ?>
                        <option value="<?php echo $programa['proCod']; ?>">
                            <?php echo $programa['proNombre']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>

                </div>
                <br>

                <div class="col-lg-12">
                    <label for="fecha_nac" class="form-label">Fecha de inscripcion</label>
                    <input type="date" class="form-control" id="USPRO_FCH_INS" name="USPRO_FCH_INS">
                </div>
                <button type="submit" class="btn btn-primary m-4" onclick="ins()">Inscribir</button>
            </form>
        </div>
        <div class="col-5 p-4">
            <h3>Filtro de estudiantes por programas</h3>
            <div class="mb-3">
                <label for="" class="form-label">Programa</label>
                <select class="form-select" name="programa" id="programa">
                    <option selected>Seleccione un programa</option>
                    <?php foreach ($this->programas as $programa): ?>
                    <option value="<?php echo $programa['proCod']; ?>">
                        <?php echo $programa['proNombre']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" class="btn btn-primary m-4" onclick="Filtro()">Filtrar</button>

            </div>

        </div>

    </div>

    < </div>
        <div class="col-12 text-center align-items-center ">
            <h3>Inscripciones recientes</h3>
            <div class="d-flex justify-content-center">
                <div class=" col-10  text-center  ">
                    <table class="table table-dark table-striped-columns">
                        <thead>
                            <tr>
                                <th scope="row">Id del estudiante</th>
                                <th scope="row">Nombre del estudiante</th>
                                <th scope="row">Codigo del programa</th>
                                <th scope="row">Nombre del programa</th>
                                <th scope="row">Fecha de la inscripcion</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($this->inscripciones as $data) {
                                $id = $data["USPRO_UID"];
                                $opc = "inscripciones";
                                echo "<tr>";
                                echo "<th>" . $data["USPRO_USU_ID"] . "</th>";
                                echo "<th>" . $data["USU_NOMBRES"] . "</th>";
                                echo "<th>" . $data["USPRO_PRO_ID"] . "</th>";
                                echo "<th>" . $data["proNombre"] . "</th>";
                                echo "<th>" . $data["USPRO_FCH_INS"] . "</th>";
                                if ($_SESSION['USU_ROL'] == 1) {
                                    echo "<td><a href='?controlador=inscripcion&accion=frmEditar&id=$id' class='btn btn-primary m-3'>Editar</a>  |   <button class='btn btn-danger mt-3 eliminar-btn' data-name='usuarios' data-id='$id'
                onclick='confirmarEliminar(\"$id\",\"$opc\")'>Eliminar</button>";

                                    echo "</tr>";
                                }


                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>