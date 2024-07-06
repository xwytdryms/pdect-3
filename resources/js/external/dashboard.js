// Initialize the map
var map = L.map("map").setView([-7.797068, 110.370529], 12);

// Tile layer
var mainLayer = L.tileLayer(
    "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}",
    {
        attribution:
            'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: "mapbox/streets-v11",
        accessToken: "pk.eyJ1IjoiYWZyaXphbG9reSIsImEiOiJja2tnZDdqYW8wZDVqMm9sYWk5eHI3ODZlIn0.mzPjVy5zJUnJgrwuIQn89g",// Replace with a valid token
    }
);
map.addLayer(mainLayer);

// Custom marker icon
var customIcon = L.icon({
    iconUrl: 'https://unpkg.com/leaflet/dist/images/marker-icon.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34]
});

// Add marker
var marker = L.marker([-7.7657780949706865, 110.37176451322523], { icon: customIcon })
    .addTo(map)
    .bindPopup(
        '<div>' +
        '<strong>Device Id: sw_01</strong> ' + '<br>' +
        '<strong>Device Name: Sleman-Wates 01</strong><br> ' +
        '<a href="/monitoringpd">See Details</a>' +
        '</div>'
    );

// Remove automatic popup opening
// .openPopup() is removed to prevent popup from opening on load

// Handle map clicks
var popup = L.popup();
function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("Tambahkan Lokasi?" + e.latlng.toString())
        .openOn(map);
}
map.on("click", onMapClick);
