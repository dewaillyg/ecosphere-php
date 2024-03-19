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
