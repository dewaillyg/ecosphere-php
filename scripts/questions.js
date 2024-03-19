const pages = document.querySelectorAll(".questions__page");
const header = document.querySelector(".questions_header");
const nbrPages = pages.length;

let pageActive = 1;

// Au chargement de la page :

window.onload = () => {

    // Affiche première page
    document.querySelector(".questions__page").style.display = "block";

    // Parcourt la liste des pages
    pages.forEach((page, index) => {
        // Création élémént "numéro de page"
        let element = document.createElement("div");
        element.classList.add('questions__header_page-num');
        element.id = "questions_header_page-" + (index + 1);
        if (pageActive === index + 1) {
            element.classList.add("questions__active");
        }
        element.innerHTML = index + 1;
        header.appendChild(element);
    });

    // Boutons suivants
    let boutons = document.querySelectorAll(".questions__form_button-next");

    for (let bouton of boutons) {
        bouton.addEventListener("click", pageSuivante);
    }

    // Boutons précédents
    boutons = document.querySelectorAll(".questions__form_button-prev");

    for (let bouton of boutons) {
        bouton.addEventListener("click", pagePrecedente);
    }

}

// Avancer le formulaire d'une page

function pageSuivante() {

    // Masque les pages
    for (let page of pages) {
        page.style.display = "none";
    }

    // On affiche la page suivante
    console.log(this.parentElement);
    this.parentElement.nextElementSibling.style.display = "block";

    document.querySelector(".questions__active").classList.remove("questions__active");
    pageActive++;
    document.querySelector("#questions_header_page-"+pageActive).classList.add("questions__active");

}

// Reculer le formulaire d'une page

function pagePrecedente() {

        // Masque les pages
        for (let page of pages) {
            page.style.display = "none";
        }
    
        // On affiche la page suivante
        this.parentElement.previousElementSibling.style.display = "block"
    
        document.querySelector(".questions__active").classList.remove("questions__active");
        pageActive--;
        document.querySelector("#questions_header_page-"+pageActive).classList.add("questions__active");
    
}
