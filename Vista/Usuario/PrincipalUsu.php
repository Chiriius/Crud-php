
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
        echo "<td><a href='?controlador=usuario&accion=editar&id=$id' class='btn btn-primary m-3'>Editar</a>  | <a href='?controlador=usuario&accion=eliminar&id=$id' class='btn btn-primary m-3'>Eliminar</a> </td>";
        echo "</tr>";
    }
    ?>
  </tbody>
</table>