import './bootstrap';
import Alpine from 'alpinejs';
import 'flowbite';

window.Alpine = Alpine;
Alpine.start();

// Check if certain elements are present and conditionally import scripts
if (document.getElementById('line-chart')) {
    import('./external/monitoringpd.js')
        .then(module => {
            // Optionally initialize any functionality here
        })
        .catch(err => console.error("Failed to load monitoringpd.js:", err));
}

if (document.getElementById('map')) {
    import('./external/dashboard.js')
        .then(module => {
            // Optionally initialize any functionality here
        })
        .catch(err => console.error("Failed to load dashboard.js:", err));
}

// Import Leaflet CSS globally
import 'leaflet/dist/leaflet.css';
