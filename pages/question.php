<?php

session_start();

$label = [
    "débutant",
    "intermédiaire",
    "expert"
];

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/questions.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Questions</title>
</head>

<!-- QUESTIONNAIRE DU PROFIL UTILISATEUR -->

<body id="body_questions">
    <!-- QUESTIONNAIRE -->
    <section id="questions">
        <header class="questions_header"></header>
        <!-- FORMULAIRE -->
        <form id="questions__form" action="../PHP/traitementquestion.php" method="GET">
            <!-- PAGE -->
            <div class="questions__page" id="page1">
                <!-- LOGO -->
                <div class="questions__form_logo-container">
                    <div class="questions__form_logo"></div>
                </div>
                <!-- QUESTIONS -->
                <div class="questions__form_title-container">
                    <h2 class="questions__form_title">Quelle est votre fréquence d'utilisation des modes de transport partagés (covoiturage, vélos en libre-service, etc.) ?</h2>
                </div>
                <!-- REPONSES -->
                <section class="questions__form_answers">
                    <div class="questions__form_answer answer-1">
                        <label for="answer-11" class="questions__form_label">Rarement</label>
                        <input type="radio" value="answer-11" id="answer-11" name="answer-1" class="questions__input">
                    </div>
                    <div class="questions__form_answer answer-2">
                        <label for="answer-12" class="questions__form_label">Occasionnellement</label>
                        <input type="radio" value="answer-12" id="answer-12" name="answer-1" class="questions__input">
                    </div>
                    <div class="questions__form_answer answer-3">
                        <label for="answer-13" class="questions__form_label">Régulièrement</label>
                        <input type="radio" value="answer-13" id="answer-13" name="answer-1" class="questions__input">
                    </div>
                </section>
                <!-- SOUMETTRE -->
                
                    <button type="button" class="questions__form_button-next"><i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>
            <!-- FIN PAGE -->
            <!-- (x7) -->
            <div class="questions__page" id="page2">
                <div class="questions__form_logo-container">
                    <div class="questions__form_logo"></div>
                </div>
                <div class="questions__form_title-container">
                    <h2 class="questions__form_title">Comment gérez-vous vos déchets au quotidien ?</h2>
                </div>
                <section class="questions__form_answers">
                    <div class="questions__form_answer answer-1">
                        <label for="answer-21" class="questions__form_label">C'est dur...</label>
                        <input type="radio" id="answer-21" value="answer-21" name="answer-2" class="questions__input">
                    </div>
                    <div class="questions__form_answer answer-2">
                        <label for="answer-22" class="questions__form_label">De temps en temps</label>
                        <input type="radio" id="answer-22" value="answer-22" name="answer-2" class="questions__input">
                    </div>
                    <div class="questions__form_answer answer-3">
                        <label for="answer-23" class="questions__form_label">Je gère !</label>
                        <input type="radio" id="answer-23" value="answer-23" name="answer-2" class="questions__input">
                    </div>
                </section>
                
                <button type="button" class="questions__form_button-prev"><i class="fa-solid fa-arrow-left"></i></button>
                <button type="button" class="questions__form_button-next"><i class="fa-solid fa-arrow-right"></i></button>
                
            </div>

            <div class="questions__page" id="page3">
                <div class="questions__form_logo-container">
                    <div class="questions__form_logo"></div>
                </div>
                <div class="questions__form_title-container">
                    <h2 class="questions__form_title">Quelle est votre consommation d'énergie à la maison ?</h2>
                </div>
                <section class="questions__form_answers">
                    <div class="questions__form_answer answer-1">
                        <label for="answer-31" class="questions__form_label">Tout est allumé</label>
                        <input type="radio" id="answer-31" value="answer-31" name="answer-3" class="questions__input">
                    </div>
                    <div class="questions__form_answer answer-2">
                        <label for="answer-32" class="questions__form_label">Je fais attention</label>
                        <input type="radio" id="answer-32" value="answer-32" name="answer-3" class="questions__input">
                    </div>
                    <div class="questions__form_answer answer-3">
                        <label for="answer-33" class="questions__form_label">Je fais ce qu'il faut</label>
                        <input type="radio" id="answer-33" value="answer-33" name="answer-3" class="questions__input">
                    </div>
                </section>
                
                <button type="button" class="questions__form_button-prev"><i class="fa-solid fa-arrow-left"></i></button>
                <button type="button" class="questions__form_button-next"><i class="fa-solid fa-arrow-right"></i></button>
                
            </div>

            <div class="questions__page" id="page4">
                <div class="questions__form_logo-container">
                    <div class="questions__form_logo"></div>
                </div>
                <div class="questions__form_title-container">
                    <h2 class="questions__form_title">Quelle est votre régime alimentaire principale ?</h2>
                </div>
                <section class="questions__form_answers">
                    <div class="questions__form_answer answer-1">
                        <label for="answer-41" class="questions__form_label">Plat tout fait / viande</label>
                        <input type="radio" id="answer-41" value="answer-41" name="answer-4" class="questions__input">
                    </div>
                    <div class="questions__form_answer answer-2">
                        <label for="answer-42" class="questions__form_label">Produit locaux / bio</label>
                        <input type="radio" id="answer-42" value="answer-42" name="answer-4" class="questions__input">
                    </div>
                    <div class="questions__form_answer answer-3">
                        <label for="answer-43" class="questions__form_label">Végétarien</label>
                        <input type="radio" id="answer-43" value="answer-43" name="answer-4" class="questions__input">
                    </div>
                </section>
                
                <button type="button" class="questions__form_button-prev"><i class="fa-solid fa-arrow-left"></i></button>
                <button type="button" class="questions__form_button-next"><i class="fa-solid fa-arrow-right"></i></button>
                
            </div>

            <div class="questions__page" id="page5">
                <div class="questions__form_logo-container">
                    <div class="questions__form_logo"></div>
                </div>
                <div class="questions__form_title-container">
                    <h2 class="questions__form_title">Comment choisissez-vous vos produits de consommation courante ?</h2>
                </div>
                <section class="questions__form_answers">
                    <div class="questions__form_answer answer-1">
                        <label for="answer-51" class="questions__form_label">Avec le prix</label>
                        <input type="radio" id="answer-51" value="answer-51" name="answer-5" class="questions__input">
                    </div>
                    <div class="questions__form_answer answer-2">
                        <label for="answer-52" class="questions__form_label">Marque éthique</label>
                        <input type="radio" id="answer-52" value="answer-52" name="answer-5" class="questions__input">
                    </div>
                    <div class="questions__form_answer answer-3">
                        <label for="answer-53" class="questions__form_label">Locaux / artisanaux</label>
                        <input type="radio" id="answer-53" value="answer-53" name="answer-5" class="questions__input">
                    </div>
                </section>
                
                <button type="button" class="questions__form_button-prev"><i class="fa-solid fa-arrow-left"></i></button>
                <button type="button" class="questions__form_button-next"><i class="fa-solid fa-arrow-right"></i></button>
                
            </div>

            <div class="questions__page" id="page6">
                <div class="questions__form_logo-container">
                    <div class="questions__form_logo"></div>
                </div>
                <div class="questions__form_title-container">
                    <h2 class="questions__form_title">Quelle est votre implication dans des actions de préservation de l'environnement ?</h2>
                </div>
                <section class="questions__form_answers">
                    <div class="questions__form_answer answer-1">
                        <label for="answer-61" class="questions__form_label">Aucune implication</label>
                        <input type="radio" id="answer-61" value="answer-61" name="answer-6" class="questions__input"></div>
                    <div class="questions__form_answer answer-2">
                        <label for="answer-62" class="questions__form_label">Action locale</label>
                        <input type="radio" id="answer-62" value="answer-62" name="answer-6" class="questions__input">
                    </div>
                    <div class="questions__form_answer answer-3">
                        <label for="answer-63" class="questions__form_label">Activement engagé</label>
                        <input type="radio" id="answer-63" value="answer-63" name="answer-6" class="questions__input">
                    </div>
                    </section>
                    
                    <button type="button" class="questions__form_button-prev"><i class="fa-solid fa-arrow-left"></i></button>
                    <button type="button" class="questions__form_button-next"><i class="fa-solid fa-arrow-right"></i></button>
                    
            </div>

            <div class="questions__page" id="page7">
                <div class="questions__form_logo-container">
                    <div class="questions__form_logo"></div>
                </div>
                <div class="questions__form_title-container">
                    <h2 class="questions__form_title">Comment choisissez-vous vos produits de consommation courante ?</h2>
                </div>
                <section class="questions__form_answers">
                    <div class="questions__form_answer answer-1">
                        <label for="answer-71" class="questions__form_label">Avec le prix</label>
                        <input type="radio" id="answer-71" value="answer-71" name="answer-7" class="questions__input">
                    </div>
                    <div class="questions__form_answer answer-2">
                        <label for="answer-72" class="questions__form_label">Marque éthique</label>radio
                        <input type="radio" id="answer-72" value="answer-72" name="answer-7" class="questions__input">
                    </div>
                    <div class="questions__form_answer answer-3">
                        <label for="answer-73" class="questions__form_label">Locaux / artisanaux</label>
                        <input type="radio" id="answer-73" value="answer-73" name="answer-7" class="questions__input">
                    </div>
                </section>
                
                    <button type="button" class="questions__form_button-prev"><i class="fa-solid fa-arrow-left"></i></button>
                    <button class="questions__form_button-submit"><i class="fa-solid fa-square-check"></i></button>
                
            </div>
        </form>
        <!--FIN FORMULAIRE -->
    </section>
    <!-- FIN QUESTIONNAIRE -->
    <!-- SCRIPT INTERACTION "PAGE" -->
    <script src="../scripts/questions.js"></script>
</body>
<!-- FIN BODY TEMPORAIRE -->
</html>