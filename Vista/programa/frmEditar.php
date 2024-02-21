<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Registro</h6>
                <form method="POST" action="?controlador=programa&accion=editar" id="frm" onsubmit="return false;">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese Nombre"
                            value="<?php echo $this->infoUsuario["proNombre"]; ?>">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Codigo</label>
                        <input type="text" class="form-control" id="codigos" name="codigos"
                            value="<?php echo $this->infoUsuario["proCod"]; ?>">
                    </div>
                    <div class="col-lg-6">

                    <input type="hidden" class="form-control" id="uid" name="uid" value="<?php echo $this ->infoUsuario["proUid"];?>">
                    </div>
                    <button type="submit" class="btn btn-primary mt-4" onclick="editarPrograma()">Editar</button>

                </form>
            </div>
        </div>