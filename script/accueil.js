$(".burger-container").click(function() {
  $(this).find(".burger").toggleClass("burger-active");
});

$(".burger-container-2").click(function() {
  $(this).find(".burger-2").toggleClass("burger-active-2");
});

$(".burger-container-3").click(function() {
  $(this).find(".burger-3").toggleClass("burger-active-3");
});



$(".burger-container").click(function() {
  // Vérifie si la classe "menu-ouvert" est présente
  if ($(".box-menu").hasClass("menu-ouvert")) {
    // Si oui, la boîte-menu est ouverte, la ferme en enlevant la classe et rétablissant la translation à zéro
    $(".box-menu").removeClass("menu-ouvert").css("transform", "translateX(-100%)");
  } else {
    // Sinon, la boîte-menu est fermée, ouvre-la en ajoutant la classe et appliquant la translation
    $(".box-menu").addClass("menu-ouvert").css("transform", "translateX(0%)");
  }
});

console.log($(".burger-container"));