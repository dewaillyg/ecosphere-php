let radius = 20000; //20000
let userLat = 0;
let userLng = 0;
let isFirstTime = true;

const markers = Object.entries(markData);


function convertRad(input) {
    return (Math.PI * input) / 180;
}

// triez par distance, tableau ordre 

function Distance(ya, xa, yb, xb) {

    R = 6378000 //Rayon de la terre en mètre
    lat_a = convertRad(ya);
    lon_a = convertRad(xa);
    lat_b = convertRad(yb);
    lon_b = convertRad(xb);

    d = R * (Math.PI / 2 - Math.asin(Math.sin(lat_b) * Math.sin(lat_a) + Math.cos(lon_b - lon_a) * Math.cos(lat_b) * Math.cos(lat_a)))

    return d;
}


function onLocationFound(e) {
    L.marker(e.latlng).addTo(map).bindPopup("vous");
    userLat = e.latlng.lat;
    userLng = e.latlng.lng;
    if (isFirstTime == true ) {
        var circle = L.circle([userLat, userLng], {
            color: 'green',
            fillColor: 'green',
            opacity: .8,
            fillOpacity: 0,
            radius: radius
        }).addTo(map);
        isFirstTime = false;
    }
    addMarkers();
}

function addMarkers() {
    //vente, producteur, compostage
    let adresse = [[],[],[]];
    let latitude = [];
    let longitude = [];
    let distance = [];
    let name = [];
    let icon = [];

    var greenIcon = L.icon({
        iconUrl: '../assets/markers/marker.svg',
    
        iconSize:     [19, 45], // size of the icon
        iconAnchor:   [11, 40], // point of the icon which will correspond to marker's location
        popupAnchor:  [-3, -30] // point from which the popup should open relative to the iconAnchor
    });

    for (let i = 0; i < markers.length; i++) {
        adresse[i] = markers[i][1];
    }

    for (let i = 0; i < adresse.length; i++) {
        for (let j = 0; j < Object.entries(adresse[i]).length; j++) {

            icon.push(markers[i][0]);
            latitude.push(Object.entries(adresse[i])[j][1]["lat"]);
            longitude.push(Object.entries(adresse[i])[j][1]["lon"]);
            name.push(Object.entries(adresse[i])[j][0]);
            
        }
    }

    for (let i = 0; i < latitude.length; i++) {
        let d = Math.floor(Distance(userLat, userLng, latitude[i], longitude[i]) / 1000);
        distance[i] = d;
    }

    for (let i = 0; i < distance.length; i++) {
        if (distance[i] < (radius / 1000)) {
            var kerma = L.marker([latitude[i], longitude[i]]).addTo(map).bindPopup(name[i]);
        }
    }
}

function style(feature) {

    return {
        fillColor: "green",
        color: "white",
        opacity: .5,
        fillOpacity: 0.1
    };
}

const onLocationError = (e) => {
    alert(e.message);
}


/*-------------------------------------------------*/
/*-------------------------------------------------*/
// Initialisation
const map = L.map('map').fitWorld();

L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager_labels_under/{z}/{x}/{y}{r}.png', {
    maxZoom: 15,
    minZoom: 0,
    dragging: false,
    tap: false,
    attribution: '© OpenStreetMap'
}).addTo(map);


map.flyTo([49.29516622810261, 1.007308650396896], 8);


map.locate({ setView: false, maxZoom: 8 }); // géolocalisation
map.on('locationfound', onLocationFound);
map.on('locationerror', onLocationError);

// departement geojson
L.geoJson(depData).addTo(map);
L.geoJson(depData, { style: style }).addTo(map);

const departement = document.querySelector('.leaflet-interactive');
departement.style.fill = "green";
departement.style.color = "white";
departement.style.opacity = .4;

// GESTION ZOOM LOCATION
const locateBtn = document.getElementById("locate");
locateBtn.addEventListener("click", function () {
    map.locate({ setView: true, maxZoom: 14 }); // géolocalisation
});

/* ZOOM PERIMETRES*/

const zoomIn = document.querySelector('#zoom-min');
const zoomOut = document.querySelector('#zoom-plus');

// MARKERS 
var beigeIcon = L.icon({
    iconUrl: '../assets/img/mark/markbeige.svg',
    iconSize: [19, 47], // size of the icon
});
var brownIcon = L.icon({
    iconUrl: '../assets/img/mark/markmarron.svg',
    iconSize: [19, 47], // size of the icon
});
var greenIcon = L.icon({
    iconUrl: '../assets/img/mark/markvert.svg',
    iconSize: [19, 47], // size of the icon
});


zoomIn.addEventListener("click", function () {
    let rond = document.querySelectorAll('svg path.leaflet-interactive');
    let l = rond.length;
    rond[l - 1].style.display = "none";
    radius = 20000;
    var circle = L.circle([userLat, userLng], {
        color: 'green',
        fillColor: 'green',
        opacity: .8,
        fillOpacity: 0,
        radius: radius
    }).addTo(map);

    const leafletMarker = document.querySelectorAll('.leaflet-marker-icon');
    const leafletMarkerShadow = document.querySelectorAll('.leaflet-marker-shadow');
    
    for (let i = 1; i < leafletMarker.length; i++) {
        leafletMarker[i].remove();
        leafletMarkerShadow[i].remove();
    }
    addMarkers();
    block();
});

zoomOut.addEventListener("click", function () {
    let rond = document.querySelectorAll('svg path.leaflet-interactive');
    let l = rond.length;
    rond[l - 1].style.display = "none";
    radius = 50000;
    var circle = L.circle([userLat, userLng], {
        color: 'green',
        fillColor: 'green',
        opacity: .8,
        fillOpacity: 0,
        radius: radius
    }).addTo(map);

    const leafletMarker = document.querySelectorAll('.leaflet-marker-icon');
    const leafletMarkerShadow = document.querySelectorAll('.leaflet-marker-shadow');
    
    for (let i = 1; i < leafletMarker.length; i++) {
        leafletMarker[i].remove();
        leafletMarkerShadow[i].remove();
    }
    addMarkers();
    block();
});

// BLOCK INFO


document.addEventListener("DOMContentLoaded", (event) => {
        block();
});

function block() {
    var markerImg = document.getElementsByClassName("leaflet-marker-icon");
        const block_info = document.getElementById("infos");
        const mapReturn = document.getElementById("mapReturn");
        for (let i = 0; i < markerImg.length; i++) {
            markerImg[i].addEventListener("click", function() {
                setTimeout(() => {
                    let markerImgContent = document.getElementsByClassName("leaflet-popup-content");
                    console.log(markerImgContent[0].innerHTML);
                    document.getElementById("blockTitle").innerHTML = markerImgContent[0].innerHTML;
                }, 250)
                console.log(i);
                block_info.classList.add ("infos-active");
            });
        }
        mapReturn.addEventListener("click", function() {
            
            block_info.classList.remove ("infos-active");
        });
}

