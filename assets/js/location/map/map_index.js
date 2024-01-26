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
import {ALL_COORS_ROUTE} from "/assets/js/const.js";
import prepareCoors from "/assets/js/utils/prepareCoors.js"

useGeographic();

/** php saves the very first coors in the 'data-coors' attribute on .slides element.*/
const elementWithCoors = document.querySelector("div[data-coors]");
const startCoors = prepareCoors([elementWithCoors.dataset.coors]);
const loader = document.querySelector('.map .loader');

const map = new Map({
    view: new View({
        center: startCoors[0],
        zoom: 7,
    }),
    layers: [
        new TileLayer({
            source: new OSM(),
        }),
    ],
    target: 'map',
});

map.on("loadstart", () => {
    loader.style.display = 'block';
});

map.on("loadend", () => {
    loader.style.display = 'none';
});

var vectorLayer;


(function init(){
    document.addEventListener('change_map_coors', changeMapCenter);

    if(map){
        fetch(ALL_COORS_ROUTE).then( async (response) => {
            if(response.ok){

                /**ALL COORS for pins to draw
                 * @param {Array} corsArr
                 */
                const corsArr = await response.json();

                updatePins( prepareCoors(corsArr));
            }
        });
        
    }
})();


function changeMapCenter({detail}) {
    const coordinates = detail.coors;
    const pickedCityName = detail.picked_name;

    map.getView().setCenter(coordinates[0]);

    if(pickedCityName === 'All'){
        map.getView().setZoom(5);
    } else {
        map.getView().setZoom(10);
    }

    updatePins(coordinates);
}




/**
 * Updates the pins on the map based on the provided array of coordinates.
 *
 * @param {Array} arrayOfCoordinates - An array of groups of coordinates
 * @return {void} 
 */
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
    let features = arrayOfCoordinates.map( (coordinate) => {
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


