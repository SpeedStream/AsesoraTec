// Ruta raiz sitio web
var RUTA_URL = "http://localhost/eduapp/public";

// Registra nuevo usuario en la BD
function registrar_usuario(){
    // Evita que la pagina se recargue
    event.preventDefault();

    // Obtiene datos del formulario
    var perfil = document.getElementById('perfil').value;
    var nombre = document.getElementById('nombre_completo').value;
    var email = document.getElementById('email').value;
    var celular = document.getElementById('celular').value;
    var contrasena = document.getElementById('contrasena').value;
    var confirmacion_contrasena = document.getElementById('confirmacion_contrasena').value;

    // Realiza peticion AJAX al servidor
    $.ajax({
        type: "POST",
        url: RUTA_URL + "/usuario/guardar_registro",
        data: {
                'perfil':perfil,
                'nombre':nombre,
                'email':email,
                'celular':celular,
                'contrasena':contrasena,
                'confirmacion_contrasena':confirmacion_contrasena
            },
        success: function(data) {
            // Notificacion registro realizado con exito
            if (data === "true") {
                alert("Se realizó el registro satisfactoriamente");
            }

            // Notificacion de errores al realizar registro
            else{
                mostrar_errores_registro(data);
            }
        }
    });
}

// Muestra errores formulario registro
function mostrar_errores_registro(data){
    // Procesa respuesta
    var errores = JSON.parse(data);

    // Imprime descripcion errores
    $('#error-perfil').text(errores[0]);
    $('#error-nombre_completo').text(errores[1]);
    $('#error-email').text(errores[2]);
    $('#error-celular').text(errores[3]);
    $('#error-contrasena').text(errores[4]);

    // Aniade contornos de colores a campos
    if( ! errores[1])
        marcar_elemento_valido('#nombre_completo');
    else
        marcar_elemento_no_valido('#nombre_completo');

    if( ! errores[2])
        marcar_elemento_valido('#email');
    else
        marcar_elemento_no_valido('#email');

    if( ! errores[3])
        marcar_elemento_valido('#celular');
    else
        marcar_elemento_no_valido('#celular');

    if( ! errores[4]){
        marcar_elemento_valido('#contrasena');
        marcar_elemento_valido('#confirmacion_contrasena');
    }
    else{
        marcar_elemento_no_valido('#contrasena');
        marcar_elemento_no_valido('#confirmacion_contrasena');
    }
}

// Aniade contorno verde a elemento
function marcar_elemento_valido(id_input){
    if($(id_input).hasClass("is-invalid"))
        $(id_input).removeClass("is-invalid")

    $(id_input).addClass("is-valid")
}

// Aniade contorno rojo a elemento
function marcar_elemento_no_valido(id_input){
    if($(id_input).hasClass("is-valid"))
        $(id_input).removeClass("is-valid")

    $(id_input).addClass("is-invalid")
}

// Valida login usuario
function validar_login(){
    // Evita que la pagina se recargue
    event.preventDefault();

    // Obtiene datos del formulario
    var email = document.getElementById('email').value;
    var contrasena = document.getElementById('contrasena').value;

    // Realiza peticion AJAX al servidor
    $.ajax({
        type: "POST",
        url: RUTA_URL + "/login/validar",
        data: {
                'email':email,
                'contrasena':contrasena
            },
        success: function(data) {
            // Notificacion login exitoso
            if (data === "true") {
                alert("Se inició sesión correctamente");
                "<?php echo RUTA_URL .'/asesores';?>"
            }

            // Notificacion de errores al 
            else{
                mostrar_errores_login(data);
            }
        }
    });
}

// Muestra errores formulario login
function mostrar_errores_login(data){
    // Procesa respuesta
    var errores = JSON.parse(data);

    // Imprime descripcion errores
    $('#error-email').text(errores[0]);
    $('#error-contrasena').text(errores[1]);
}