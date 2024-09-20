document.addEventListener('DOMContentLoaded', function() {
    // Obtén el mensaje
    var mensaje = document.querySelector('.mensaje');
    
    if (mensaje) {
        // Añade la clase para mostrar el mensaje
        mensaje.classList.add('mostrar');
        
        // Elimina el mensaje después de 5 segundos
        setTimeout(function() {
            mensaje.classList.remove('mostrar');
            // Opcionalmente, puedes eliminar el elemento completamente después de que desaparezca
            setTimeout(function() {
                if (mensaje) {
                    mensaje.remove();
                }
            }, 500); // Tiempo en milisegundos (500ms) para coincidir con la duración de la animación de opacidad
        }, 3000); // 5000ms = 5 segundos
    }

    const mensajes = document.querySelectorAll('.mensaje_api');

    mensajes.forEach((mensaje, index) => {
        // Desaparecer después de 10 segundos
        setTimeout(() => {
            mensaje.classList.add('ocultar');
        }, 10000);

        // Eliminar el elemento del DOM después de 10.5 segundos
        setTimeout(() => {
            mensaje.remove();
        }, 10500);
    });
});

