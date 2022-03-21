import './styles/app.scss';
import 'bootstrap';

// start the Stimulus application
import './bootstrap';
import {getElement} from "bootstrap/js/src/util";

/* Récupérer les valeurs des range */
document.forms.filters.age.oninput = function (e) {
    let ageValeur = document.getElementById("ageValeur");
    ageValeur.innerText = document.forms.filters.age.value;
}
document.forms.filters.taille.oninput = function (e) {
    let tailleValeur = document.getElementById("tailleValeur");
    tailleValeur.innerText = document.forms.filters.taille.value;
}
/* Récupération de la date du dernier casting posté */

