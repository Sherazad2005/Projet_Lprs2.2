// script.js
function afficherFormulaireDeconnexion() {
    document.getElementById("content").classList.add("blurred");
    document.getElementById("overlay").style.display = "block";
    document.getElementById("deconnexionForm").style.display = "block";
}

function fermerFormulaireDeconnexion() {
    document.getElementById("content").classList.remove("blurred");
    document.getElementById("overlay").style.display = "none";
    document.getElementById("deconnexionForm").style.display = "none";
}
