/**
 * Map Facade
 * Lazy loads Leaflet and initializes maps on scroll.
 */
document.addEventListener('DOMContentLoaded', function () {
    const mapContainers = document.querySelectorAll('[data-kidazzle-map]');
    if (!mapContainers.length) return;

    const loadMapAssets = () => {
        // Prevent multiple loads
        if (window.kidazzleMapAssetsLoaded) return;
        window.kidazzleMapAssetsLoaded = true;

        // Load Leaflet CSS
        const link = document.createElement('link');
        link.rel = 'stylesheet';
        link.href = 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css';
        document.head.appendChild(link);

        // Load Leaflet JS
        const script = document.createElement('script');
        script.src = 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js';
        script.async = true;
        script.onload = () => {
            // Load Map Layer Logic
            const mapLayerScript = document.createElement('script');
            mapLayerScript.src = kidazzleData.themeUrl + '/assets/js/map-layer.js';
            mapLayerScript.async = true;
            document.body.appendChild(mapLayerScript);
        };
        document.body.appendChild(script);
    };

    // Intersection Observer
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                loadMapAssets();
                observer.disconnect();
            }
        });
    }, {
        rootMargin: '200px' // Start loading before it comes into view
    });

    mapContainers.forEach(container => observer.observe(container));
});
