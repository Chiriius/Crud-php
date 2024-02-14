let registrarUsuario = async () => {
  let formUrl = "?controlador=usuario&accion=registrar";
  fd = new FormData();
  fd.append("nombres", document.getElementById("nombres").value);
  fd.append("apellidos", document.getElementById("apellidos").value);
  fd.append("email", document.getElementById("email").value);
  fd.append("telefono", document.getElementById("telefono").value);
  fd.append("fecha_nac", document.getElementById("fecha_nac").value);
  fd.append("password", document.getElementById("password").value);

  let respuesta = await fetch(formUrl, {
    method: "post",
    body: fd,
  });
  let info = await respuesta.json();
  Swal.fire({
    icon: info.icono,
    title: info.mensaje,
    timer: 2000,
  });
  $("#frm")[0].reset();
};

let confirmarEliminar = async () => {
  const bt = document.querySelector(".btn-primary[data-id]");
  const id = bt.getAttribute("data-id");
  const opc = bt.getAttribute("data-name");
  console.log(id);
  console.log(opc);
  Swal.fire({
    title: "¿Estás seguro?",
    text: "No podrás revertir esto.",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sí, eliminarlo",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        title: "¡Eliminado!",
        text: "Tu archivo ha sido eliminado.",
        icon: "success",
        timer: 2000,
      });
      if (opc == "programa") {
        window.location.href = `?controlador=programa&accion=eliminar&id=${id}`;
      }
      if (opc == "usuarios") {
        window.location.href = `?controlador=usuario&accion=eliminar&id=${id}`;
      }
    }
  });
};

let registrarPrograma = async () => {
  let formUrl = "?controlador=programa&accion=registrar";
  fd = new FormData();
  fd.append("nombres", document.getElementById("nombres").value);
  fd.append("codigos", document.getElementById("codigos").value);

  let respuesta = await fetch(formUrl, {
    method: "post",
    body: fd,
  });
  let info = await respuesta.json();
  Swal.fire({
    icon: info.icono,
    title: info.mensaje,
    timer: 2000,
  });
  $("#frm")[0].reset();
};


let logear = async() => {
  let formUrl = "?controlador=inicio&accion=logear";
  fd = new FormData();
  fd.append("usuario", document.getElementById("usuario").value);
  fd.append("contraseña", document.getElementById("contraseña").value);
  
  let respuesta = await fetch(formUrl, {
    method: "post",
    body: fd,
  });
  let info = await respuesta.json();
  console.log(info);

  Swal.fire({
    icon: info.icono,
    title: info.mensaje,
    timer: 2000,
  });


}

let editarUsuario = async () => {
  let formUrl = "?controlador=usuario&accion=editar";
  fd = new FormData();
  fd.append("nombres", document.getElementById("nombres").value);
  fd.append("apellidos", document.getElementById("apellidos").value);
  fd.append("email", document.getElementById("email").value);
  fd.append("telefono", document.getElementById("telefono").value);
  fd.append("fecha_nac", document.getElementById("fecha_nac").value);
  fd.append("uid", document.getElementById("uid").value);


  let respuesta = await fetch(formUrl, {
    method: "post",
    body: fd,
  });
  let info = await respuesta.json();
  Swal.fire({
    icon: info.icono,
    title: info.mensaje,
    timer: 2000,
  });

};