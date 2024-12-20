// Initialize the map
var map = L.map("map").setView([-7.797068, 110.370529], 10);

// Tile layer
var mainLayer = L.tileLayer(
    "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}",
    {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, Imagery © Mapbox',
        maxZoom: 18,
        id: "mapbox/streets-v11",
        accessToken:"pk.eyJ1IjoiYWZyaXphbG9reSIsImEiOiJja2tnZDdqYW8wZDVqMm9sYWk5eHI3ODZlIn0.mzPjVy5zJUnJgrwuIQn89g"  // Replace with a valid token
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

// Function to add markers to the map
function addMarkers(devices) {
    map.eachLayer((layer) => {
        if (layer instanceof L.Marker) {
            map.removeLayer(layer);
        }
    });

    devices.forEach(device => {
        const deviceUrl = deviceRoute.replace(':id', device.device_id);
        L.marker([device.latitude, device.longitude], { icon: customIcon })
            .addTo(map)
            .bindPopup(
                `<div>
                    <strong>Device Id: ${device.device_id}</strong><br>
                    <strong>Device Name: ${device.name}</strong><br>
                    <a href="${deviceUrl}"> 
                    See Details</a>
                </div>`
            );
    });
    
}

// Add markers on load
if (typeof devices !== 'undefined') {
    addMarkers(devices);
} else {
    console.error('No device data available');
}
setTimeout(() => {
    map.invalidateSize();
}, 100);

window.addEventListener('resize', () => {
    map.invalidateSize();
});

