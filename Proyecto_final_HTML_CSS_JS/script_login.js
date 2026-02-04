const USUARIO_1 = "david";
const PASS_1 = "sexto";

const USUARIO_2 = "manolo";
const PASS_2 = "muela";

// --- FUNCIÓN QUE SE EJECUTA SIEMPRE AL CARGAR LA PÁGINA ---
window.onload = function() {
    // Comprobamos si la "llave" existe en el bolsillo del navegador
    if (localStorage.getItem("sesionIniciada") === "true") {
        mostrarContenidoPrincipal();
    }
};

function login() {
    let usuarioInput = document.getElementById("usuario").value;
    let passInput = document.getElementById("password").value;
    let mensajeError = document.getElementById("mensaje-error");

    if ((usuarioInput === USUARIO_1 && passInput === PASS_1) || 
        (usuarioInput === USUARIO_2 && passInput === PASS_2)) {

        // CREAMOS LA LLAVE: Guardamos el estado en el navegador
        localStorage.setItem("sesionIniciada", "true");
        // También puedes guardar el nombre del usuario si quieres personalizar
        localStorage.setItem("nombreUsuario", usuarioInput);

        mostrarContenidoPrincipal();
    } else {
        mensajeError.innerHTML = "Credenciales incorrectas. Acceso denegado.";
        document.getElementById("password").value = "";
    }
}

function mostrarContenidoPrincipal() {
    document.getElementById("pantalla-login").style.display = "none";
    document.getElementById("contenido-principal").classList.remove("oculto");
}

function cerrarSesion() {
    // DESTRUIMOS LA LLAVE: Borramos los datos
    localStorage.removeItem("sesionIniciada");
    localStorage.removeItem("nombreUsuario");
    location.reload(); 
}
