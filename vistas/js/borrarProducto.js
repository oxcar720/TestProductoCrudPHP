document.querySelector('form').addEventListener('submit', function(event) {
    if (!confirm('¿Estás seguro de que quieres eliminar este producto? Esta acción no se puede deshacer.')) {
        event.preventDefault();
    }
});