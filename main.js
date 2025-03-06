// Función para abrir el modal
function openModal(id) {
    document.getElementById(id).style.display = "block";
}

// Función para cerrar el modal
function closeModal(id) {
    document.getElementById(id).style.display = "none";
}

// Función para cargar el mapa de Google Maps
function initMap() {
    // Coordenadas de la ubicación (por ejemplo, la Torre Eiffel en París)
    var ubicacion = { lat: 48.8588443, lng: 2.2943506 };

    // Crear el mapa
    var map = new google.maps.Map(document.getElementById('mapa'), {
        zoom: 15,
        center: ubicacion
    });

    // Crear un marcador en la ubicación
    var marker = new google.maps.Marker({
        position: ubicacion,
        map: map
    });
}
