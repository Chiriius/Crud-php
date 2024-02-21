<h3>Programa Principal</h3>
<a href="?controlador=programa&accion=frmRegistrar" class="btn btn-primary">Registrar</a>

<h3>Admisnistracion Programas</h3>


<table class="table table-dark table-striped-columns">
  <thead>
  <tr>
      <th scope="row">Nombres</th>
      <th scope="row">Codigos</th>
      <th></th>
   
    </tr>
  </thead>
  <tbody>
  
    <?php
    foreach ($this->programas as $data){
      $id= $data["proUid"] ;
        echo "<tr>";
        echo "<th>".$data["proNombre"]. "</th>";
        echo "<th>".$data["proCod"]. "</th>";
        if($_SESSION['USU_ROL']== 1){
        echo "<td><a href='?controlador=programa&accion=frmEditar&id=$id' class='btn btn-primary m-3'>Editar</a> | <button class= 'btn btn-primary  mt-3' data-name='programa' data-id='$id' onclick='confirmarEliminar()'     id='programa'>Eliminar</button>";
        echo "</tr>";}
    }
    ?>
  </tbody>
</table>