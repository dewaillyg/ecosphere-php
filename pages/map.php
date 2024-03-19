<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="../styles/map.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="../script/mapDatas.js"></script>
    <script src="../script/markersData.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <title>Carte</title>
</head>

<body>
    <div id="map"></div>
    <div id="return">
<a href="./accueil.php">    <i class="fa-solid fa-house"></i>
</a>    </div>
    <!-- <div id="seeAll"></div> -->
    <div id="locate"><i class="fa-solid fa-location-dot"></i></div>
    <div class="input">
        <div>
            <label for="zoom-min">20Km</label>
            <input type="radio" name="zoom" id="zoom-min" checked />
        </div>
        <div>
            <label for="zoom-plus">50Km</label>
            <input type="radio" name="zoom" id="zoom-plus" />
        </div>
    </div>
    <div id="infos">
        <i id="mapReturn" class="fa-solid fa-map"></i>
        <h2 id="blockTitle"></h2>
    </div>
    <script src="../script/map.js"></script>
</body>

</html>