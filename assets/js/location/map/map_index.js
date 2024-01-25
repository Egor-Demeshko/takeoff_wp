import Map from 'ol/Map.js';
import View from 'ol/View.js';
import TileLayer from 'ol/layer/Tile.js';
import OSM from 'ol/source/OSM.js';
import {useGeographic} from 'ol/proj';
import Feature from 'ol/Feature.js';
import Point from 'ol/geom/Point.js';
import VectorSource from 'ol/source/Vector.js';
import VectorLayer from 'ol/layer/Vector.js';
import Style from 'ol/style/Style.js';
import Icon from 'ol/style/Icon.js';

useGeographic();
const map = new Map({
    view: new View({
        center: [27.4633, 53.9371],
        zoom: 4,
    }),
    layers: [
        new TileLayer({
            source: new OSM(),
        }),
    ],
    target: 'map',
});

var vectorLayer;

(function init(){
    document.addEventListener('change_map_coors', changeMapCenter);
})();


function changeMapCenter({detail}) {
    const coordinates = detail.coors;

    map.getView().setCenter(coordinates[0]);
    updatePins(coordinates);
}



function updatePins(arrayOfCoordinates){
    // An example array of groups of coordinates
    if(!arrayOfCoordinates || arrayOfCoordinates.length === 0) {
        console.error("No coordinates provided");
        return;
    }

    // Remove the existing pin layer
    map.getLayers().getArray()
        .filter(layer => layer === vectorLayer)
        .forEach(layer => map.removeLayer(layer));

    // Convert each group of coordinates into a new Feature
    let features = arrayOfCoordinates.map(coordinate => {
        return new Feature({
            geometry: new Point(coordinate)
        });
    });

    // Create a source and add all the Features
    let vectorSource = new VectorSource({
        features: features
    });

    // Create a layer from the source
    vectorLayer = new VectorLayer({
        source: vectorSource,
        style: new Style({
            image: new Icon({
                // Provide the URL to your custom image
                src: window.to_themePath + '/public/images/pin.png',
                // Specify the size of the icon
                scale: 0.5,
                displacement: [0, 10]
            })
        })
    });

    // Add the layer to the map
    map.addLayer(vectorLayer);
}


