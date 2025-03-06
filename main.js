// Abrir ventana emergente
function openModal(section) {
    document.getElementById(section).style.display = "block";
}

// Cerrar ventana emergente
function closeModal(section) {
    document.getElementById(section).style.display = "none";
}

// Enviar formulario con AJAX para evitar recarga de página
$(document).ready(function() {
    $('#contactForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'contacto.php',
            data: $(this).serialize(),
            success: function(response) {
                alert('Formulario enviado con éxito');
                $('#contactForm')[0].reset();
                closeModal('contacto');
            },
            error: function() {
                alert('Hubo un error al enviar el formulario');
            }
        });
    });
});
