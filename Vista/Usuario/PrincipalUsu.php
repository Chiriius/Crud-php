
<h3>Administracion Usuarios</h3>

<a href="?controlador=usuario&accion=frmRegistrar" class="btn btn-primary m-3">Registrar</a>

<table class="table table-dark table-striped-columns">
  <thead>
  <tr>
      <th scope="row">Nombres</th>
      <th scope="row">Apellidos</th>
      <th scope="row">Correo</th>
      <th></th>
    
    </tr>
  </thead>
  <tbody>
  
    <?php
    foreach ($this->usuarios as $data){
      $id= $data["USU_UID"] ;
        echo "<tr>";
        echo "<th>".$data["USU_NOMBRES"]. "</th>";
        echo "<th>".$data["USU_APELLIDOS"]. "</th>";
        echo "<th>".$data["USU_EMAIL"]. "</th>";
        if($_SESSION['USU_ROL']== 1){
        echo "<td><a href='?controlador=usuario&accion=frmEditar&id=$id' class='btn btn-primary m-3'>Editar</a>  |  <button class= 'btn btn-primary name='usuarios' mt-3' data-name='usuarios'  data-id='$id' onclick='confirmarEliminar()'>Eliminar</button>";
        echo "</tr>";}
    }
    ?>
  </tbody>
</table>