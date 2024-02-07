
let registrarUsuario= async() =>{
    let formUrl= '?controlador=usuario&accion=registrar';
    fd= new FormData();
    fd.append('nombres',document.getElementById('nombres').value);
    fd.append('apellidos',document.getElementById('apellidos').value);
    fd.append('email',document.getElementById('email').value);
    fd.append('telefono',document.getElementById('telefono').value);
    fd.append('fecha_nac',document.getElementById('fecha_nac').value);
    fd.append('password',document.getElementById('password').value);

    let respuesta = await fetch(formUrl,{
        method:"post",
        body: fd
    });
    let info=await
    respuesta.json();
    Swal.fire({
       
        icon: info.icono,
        title: info.mensaje,
        timer: 1500
      });
      $('#frm')[0].reset();
   

}

let registrarPrograma= async() =>{
    let formUrl= '?controlador=programa&accion=registrar';
    fd= new FormData();
    fd.append('nombres',document.getElementById('nombres').value);
    fd.append('codigos',document.getElementById('codigos').value);
    
    let respuesta = await fetch(formUrl,{
        method:"post",
        body: fd
    });
    let info=await
    respuesta.json();
    Swal.fire({
       
        icon: info.icono,
        title: info.mensaje,
        timer: 2000
      });
      $('#frm')[0].reset();
   

}