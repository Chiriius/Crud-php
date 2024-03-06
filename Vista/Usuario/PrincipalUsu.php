<h3>Administracion Usuarios</h3>


<div class="container-fluid pt-4 px-4">
  <div class="row g-4">

    <div class="col-sm-12 col-xl-6">
      <a href="?controlador=usuario&accion=frmRegistrar" class="btn btn-primary m-3">Registrar Nuevo Usuario</a>
      <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Reporte Usuario</h6>
        <form action="?controlador=usuario&accion=reportePDF" method="post" target="_blank">
          <select name="rol" class="form-control">
            <option value="1">Admin</option>
            <option value="2">Secretaria</option>
            <option value="3">Estudiante</option>
            <option value="4">Todos</option>
          </select>
          <br>
          <input type="submit" name="aceptar" value="aceptar" class="btn btn-primary">



        </form>
      </div>
    </div>


    <table class="table table-dark table-striped-columns">
      <thead>
        <tr>
          <th scope="row">Nombres</th>
          <th scope="row">Apellidos</th>
          <th scope="row">Correo</th>
          <th scope="row">Rol</th>
          <th></th>

        </tr>
      </thead>
      <tbody>

        <?php
        foreach ($this->usuarios as $data) {
          $id = $data["USU_UID"];
          $opc = "usuarios";
          echo "<tr>";
          echo "<th>" . $data["USU_NOMBRES"] . "</th>";
          echo "<th>" . $data["USU_APELLIDOS"] . "</th>";
          echo "<th>" . $data["USU_EMAIL"] . "</th>";
          echo "<th>" . $data["USU_ROL"] . "</th>";
          if ($_SESSION['USU_ROL'] == 1) {
            echo "<td>
        <a href='?controlador=usuario&accion=frmEditar&id=$id' class='btn btn-primary m-3'>Editar</a> |
        <button class='btn btn-danger mt-3 eliminar-btn' data-name='usuarios' data-id='$id'
                onclick='confirmarEliminar(\"$id\",\"$opc\")'>Eliminar</button>
      </td>";
            echo "</tr>";

          }
        }
        ?>
      </tbody>
    </table>