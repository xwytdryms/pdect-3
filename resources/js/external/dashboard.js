// Initialize the map
var map = L.map("map").setView([-7.797068, 110.370529], 12);

// Tile layer
var mainLayer = L.tileLayer(
    "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}",
    {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: "mapbox/streets-v11",
        accessToken: "pk.eyJ1IjoiYWZyaXphbG9reSIsImEiOiJja2tnZDdqYW8wZDVqMm9sYWk5eHI3ODZlIn0.mzPjVy5zJUnJgrwuIQn89g" // Replace with a valid token
    }
);
map.addLayer(mainLayer);

// Custom marker icon
var customIcon = L.icon({
    iconUrl: 'https://unpkg.com/leaflet/dist/images/marker-icon.png',
    iconSize: [25, 41], // Size of the icon
    iconAnchor: [12, 41], // Anchor the marker
    popupAnchor: [1, -34] // Popup position
});

// Check if devices data is available and valid
if (devices && Array.isArray(devices)) {
    // Add markers for each device with the custom icon
    devices.forEach(device => {
        L.marker([device.latitude, device.longitude], { icon: customIcon })
            .addTo(map)
            .bindPopup(
                '<div>' +
                '<strong>Device Id: ' + device.device_id + '</strong><br>' +
                '<strong>PLN Area: ' + device.name + '</strong><br>' +
                '<a href="/monitoringpd">See Details</a>' +
                '</div>'
            );
    });
} else {
    console.error('No device data available or data is not an array');
}

// Handle map clicks
var popup = L.popup();
function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("Tambahkan Lokasi?" + e.latlng.toString())
        .openOn(map);
}
map.on("click", onMapClick);
