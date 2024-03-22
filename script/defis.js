var defisData = {
    "débutant": {
        "Réduire l'utilisation du plastique": " Utilisez des sacs réutilisables lors de vos courses au supermarché plutôt que des sacs en plastique jetables.",

        "Opter pour des produits locaux": " Achetez des fruits et légumes de saison auprès de producteurs locaux pour réduire l'empreinte carbone liée au transport des aliments.",

        "Économiser l'eau": " Prenez des douches plus courtes et fermez le robinet lorsque vous vous brossez les dents pour économiser l'eau.",

        "Utiliser des transports en commun": " Optez pour les transports en commun, le vélo ou la marche pour vous rendre au travail.",

        "Économiser l’énergie": " Éteignez complètement vos appareils électriques et ne les laissez pas en veille, lorsque vous ne les utilisez pas."
    },
    "intermédiaire": {
        "Manger des repas végétariens": "Adoptez un régime alimentaire végétarien complet pendant une journée pour réduire votre empreinte carbone et découvrir de nouvelles recettes sans viande.",

        "Installer des ampoules LED": "Remplacez toutes les ampoules de votre maison par des ampoules LED à faible consommation d'énergie pour réduire votre consommation d'électricité.",

        "Participer à un nettoyage de plage": "Joignez-vous à une initiative de nettoyage de plage pour aider à ramasser les déchets plastiques et protéger les écosystèmes marins.",

        "Créer un composteur": "Construisez votre propre composteur dans votre jardin pour composter vos déchets de jardin en plus de vos déchets de cuisine.",

        "Pratiquer le covoiturage": "Organisez un système de covoiturage avec des collègues ou des amis, ou utilisez une application de covoiturage pour vous rendre au travail ou à des événements afin de réduire les émissions de CO2 liées aux trajets individuels en voiture."
    },
    "expert": {

        "Créer un potager": "Transformez une partie de votre balcon ou de votre jardin en un potager pour cultiver vos propres fruits, légumes et herbes aromatiques.",

        "Installer un système de récupération d'eau de pluie": "Installez un système de récupération d'eau de pluie dans votre jardin pour collecter l'eau de pluie et l'utiliser pour arroser vos plantes.",

        "Installer des panneaux solaires": "Explorez la possibilité d'installer des panneaux solaires sur votre toit pour produire votre propre électricité à partir de sources renouvelables.",

        "Participer à un projet de reforestation": "Impliquez-vous dans un projet de reforestation en plantant des arbres dans des zones déboisées ou en parrainant la plantation d'arbres dans des régions en voie de déforestation.",

        "Organiser un événement éco-responsable": "Organisez un événement ou une fête éco-responsable avec des voisins, des amis ou des collègues de travail en utilisant des décorations réutilisables, en servant des plats végétariens."
    }
}

let boxMois = document.querySelectorAll(".defis-mois");
let defisContent = document.querySelectorAll(".defis-content");
let chevron = document.querySelectorAll(".fa-chevron-down");

for (let i = 0; i < boxMois.length; i++) {
    boxMois[i].addEventListener("click", function () {
        // Ferme toutes les boîtes sauf celle actuellement cliquée
        for (let j = 0; j < boxMois.length; j++) {
            if (j !== i) {
                boxMois[j].classList.remove('active');
                defisContent[j].style.display = "none";
                chevron[j].style.transform = "rotate(0deg)";
            }
        }

        // Bascule la classe active et ajuste l'affichage
        boxMois[i].classList.toggle('active');

        if (boxMois[i].classList.contains('active')) {
            defisContent[i].style.display = "block";
            chevron[i].style.transform = "rotate(180deg)";
        } else {
            defisContent[i].style.display = "none";
            chevron[i].style.transform = "rotate(0deg)";

        }
    });
}

// DEFIS

var levelUtilisateur;
const defisTitle = document.getElementsByTagName("h4");
const defisMain = document.querySelectorAll(".defis-content p");

function creationXHR() {
    var resultat = null;
    try {
        resultat = new XMLHttpRequest();
    } catch (Error) {
        try {
            resultat = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (Error) {
            try {
                resultat = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (Error) {
                resultat = null;
            }
        }
    }
    return resultat;
}

xhr = creationXHR();

let url = `../PHP/traitementdefis.php`;

xhr.open("GET", url, true);
xhr.onreadystatechange = function () {
    if (xhr.readyState == 4) {
        if (xhr.status == 200) {
            
            levelUtilisateur = xhr.responseText;


            
            var defDatas = Object.entries(defisData);
            
            switch (levelUtilisateur) {
                case "débutant" :
                    var finalDatas = defDatas[0][1];
                    let ii = 0;
                    for (const [title, content] of Object.entries(finalDatas)) {
                        console.log(`${title}: ${content}`);
                        defisTitle[ii].textContent = title;
                        defisMain[ii].textContent = content;
                        ii++;
                    }
                    break;
                case "intermédiaire" :
                    var finalDatas = defDatas[1][1];
                    let ij = 0;
                    for (const [title, content] of Object.entries(finalDatas)) {
                        console.log(`${title}: ${content}`);
                        defisTitle[ij].textContent = title;
                        defisMain[ij].textContent = content;
                        ij++;
                    }
                    break;
                default : 
                    var finalDatas = defDatas[2][1];
                    let ik = 0;
                    for (const [title, content] of Object.entries(finalDatas)) {
                        console.log(`${title}: ${content}`);
                        defisTitle[ik].textContent = title;
                        defisMain[ik].textContent = content;
                        ik++;
                    }
                break;
            }



            } else {
                alert("probleme de connection au serveur !");
            }
        }
    };
xhr.send(null);


