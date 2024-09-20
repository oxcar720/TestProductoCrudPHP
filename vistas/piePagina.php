<link rel="stylesheet" href="/vistas/css/styles_footer.css">
<footer>
    <div class="contact-info">
        <p>Dato Inútil del día: <?php echo $datoInutil;?></p>
        <p>Desarrollador: Oscar Alejandro Rodriguez Contreras</p>
        <p>Contacto: o.scar_a@hotmail.com | Teléfono: +3195122559</p>
        <p>Dirección: Calle Ejemplo 123, Ciudad, País</p>
    </div>
    <div class="legal-links">
        <a href="/terminos">Términos y Condiciones</a> |
        <a href="/privacidad">Política de Privacidad</a> |
        <a href="/cookies">Política de Cookies</a>
    </div>
    <div class="sitemap">
        <a href="/inicio">Inicio</a> |
        <a href="/productos">Productos</a> |
        <a href="/sobre-nosotros">Sobre Nosotros</a> |
        <a href="/contacto">Contacto</a>
    </div>
    
    <div class="newsletter">
        <p>Suscríbete a nuestro boletín:</p>
        <form action="/suscribirse" method="post">
            <input type="email" name="email" placeholder="Tu correo electrónico">
            <button type="submit">Suscribirse</button>
        </form>
    </div>
    <div class="copyright">
        <p>&copy; 2024 Todos los derechos reservados.</p>
    </div>
</footer>