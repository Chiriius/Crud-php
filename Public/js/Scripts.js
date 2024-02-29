let registrarUsuario = async () => {
  let formUrl = "?controlador=usuario&accion=registrar";
  fd = new FormData();
  fd.append("nombres", document.getElementById("nombres").value);
  fd.append("apellidos", document.getElementById("apellidos").value);
  fd.append("email", document.getElementById("email").value);
  fd.append("telefono", document.getElementById("telefono").value);
  fd.append("fecha_nac", document.getElementById("fecha_nac").value);
  fd.append("password", document.getElementById("password").value);
  fd.append("usu_rol", document.getElementById("usu_rol").value);
console.log(fd)
console.error();
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
  if(info.estado == 1){
    console.log("correcto");
    window.location.href = `?controlador=inicio&accion=dashboard`;

  }
  else {
    Swal.fire({
      icon: info.icono,
      title: info.mensaje,
      timer: 2000,
     
    });
  }



}

let editarUsuario = async () => {
  let formUrl = "?controlador=usuario&accion=editar";
  fd = new FormData();
  fd.append("nombres", document.getElementById("nombres").value);
  fd.append("apellidos", document.getElementById("apellidos").value);
  fd.append("email", document.getElementById("email").value);
  fd.append("telefono", document.getElementById("telefono").value);
  fd.append("fecha_nac", document.getElementById("fecha_nac").value);
  fd.append("usu_rol", document.getElementById("usu_rol").value);
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
let editarPrograma = async () => {
  let formUrl = "?controlador=programa&accion=editar";
  fd = new FormData();
  fd.append("nombres", document.getElementById("nombres").value);
  fd.append("codigos", document.getElementById("codigos").value);
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

let ins = async()=>{
  console.log("si inicio");
  let ins_usu_correo = document.getElementById("ins_usu_correo").value;
  let ins_usu_codigo = document.getElementById("ins_usu_codigo").value;
  if(ins_usu_codigo.trim()=="" || ins_usu_correo.trim()==""){
    Swal.fire({
      icon: "error",
      title: "Ingrese todos los campos",
      timer: 2000,
    });
   
  }
  else{
    let url ='?controlador=inscripcion&accion=registrar';
    fd = new FormData()
    fd.append("ins_usu_correo", document.getElementById("ins_usu_correo").value);
    fd.append("ins_usu_codigo", document.getElementById("ins_usu_codigo").value);
    fd.append("USPRO_FCH_INS", document.getElementById("USPRO_FCH_INS").value);
    
    let res = await fetch(url,{
      method:"post",
      body:fd
    })
    let info = await res.json()
    Swal.fire({
      title: info.mensaje,
      icon: info.icon,
    }).then((result) =>{
      if(result.isConfirmed){
        window.location.href = `?controlador=inscripcion&accion=principal`;
      }
    })
    
    
  }
}