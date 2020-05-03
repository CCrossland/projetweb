function validationProduit(e){
    var regex =  /[^a-zA-Z0-9 ]/;
    var value = e.srcElement.nom.value;
    if(regex.test(value)){
        alert("Pas de caractères spéciaux ni d'espace dans le nom de l'article!");
        e.preventDefault();
    }
}

// On se souscrit à l'event DOMContentLoaded du document.
// De cette façon, le chargement du javascript peut se faire dans la balise <head> car la fonction anonyme liée à l'event ne sera exécutée qu'après le chargement du DOM.
    document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('formProduitAdd').addEventListener("submit", function() {validationProduit(event);});
});