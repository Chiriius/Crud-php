<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Registrar</h6>
        <form method="POST" action="?controlador=usuario&accion=editar" id="frm" onsubmit="return false;">
            <div class="row">
                <div class="col-lg-6">
                    <label for="nombre" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="nombres" name="nombres"
                        value="<?php echo $this ->infoUsuario["USU_NOMBRES"];?>">

                </div>
                <div class="col-lg-6">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos"
                        value="<?php echo $this ->infoUsuario["USU_APELLIDOS"];?>">
                </div>

                <div class="col-lg-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="<?php echo $this ->infoUsuario["USU_EMAIL"];?>">
                </div>


                <div class="col-lg-6">
                    <label for="telefono" class="form-label">Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono"
                        value="<?php echo $this ->infoUsuario["USU_TELEFONO"];?>">
                </div>

                <div class="col-lg-6">
                    <label for="fecha_nac" class="form-label">Fecha de nacimiento</label>
                    <input type="date" class="form-control" id="fecha_nac" name="fecha_nac"
                        value="<?php echo $this ->infoUsuario["USU_FCH_NAC"];?>">
                </div>

                <div class="col-lg-6">
                    <label for="fecha_nac" class="form-label">Rol</label>
                    <select class="form-select" id="usu_rol" name="usu_rol" aria-label="Default select example">
                        <option selected><?php  echo $this ->infoUsuario["USU_ROL"]; ?> </option>
                        <option value="1">Administrador</option>
                        <option value="2">Secretario/a</option>
                        <option value="3">Estudiante</option>
                    </select>
                </div>
                <div class="col-lg-6">

                    <input type="hidden" class="form-control" id="uid" name="uid"
                        value="<?php echo $this ->infoUsuario["USU_UID"];?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-4" onclick="editarUsuario()">Editar</button>
        </form>
    </div>
</div>
//ss