// 1. Variables et Constantes [20, 25]
let compteur = 0;
const messageAccueil = "Bienvenue sur le site !";

// Affichage dans la console
console.log(messageAccueil);

// 2. Fonctions (Classique et Fléchée) [21, 23]
function saluer(nom) {
    return "Bonjour " + nom;
}

const multiplier = (a, b) => a * b; // Fonction fléchée

// 3. Objets et Classes [24, 26]
let etudiant = {
    nom: "Dupont",
    prenom: "Jean",
    notes: [19, 27, 28], // Tableau dans un objet
    // Méthode de l'objet
    afficherNomComplet: function() {
        return this.prenom + " " + this.nom;
    }
};

// Utilisation de JSON.stringify pour transformer l'objet en texte [29]
console.log("Objet JSON : " + JSON.stringify(etudiant));

// 4. Manipulation du DOM et Événements [22, 30, 31]

// Récupération par ID [22]
const btnAction = document.getElementById('btn-action');
const zoneInteraction = document.getElementById('zone-interaction');

// Écouteur d'événement 'click' [17, 31]
btnAction.addEventListener('click', function() {
    compteur++;
    
    // Modification du style via JS
    zoneInteraction.style.backgroundColor = "lightblue";
    
    // Modification du contenu textuel (innerHTML) [7, 32]
    zoneInteraction.innerHTML = `<p>Vous avez cliqué <strong>${compteur}</strong> fois.</p>`;
    
    // Exemple d'Asynchrone avec setTimeout [23]
    setTimeout(() => {
        alert("Ceci est un message asynchrone apparu après 1 seconde !");
    }, 1000);
});

// 5. Gestion de formulaire et preventDefault [33]
const formulaire = document.querySelector('#monFormulaire'); // Sélecteur CSS [32]

formulaire.addEventListener('submit', function(event) {
    // Empêche le rechargement de la page (comportement par défaut) [33]
    event.preventDefault(); 
    
    const nomSaisi = document.getElementById('nom').value;
    if (nomSaisi === "") {
        alert("Veuillez remplir le nom !");
    } else {
        alert("Formulaire envoyé pour : " + nomSaisi);
    }
});

// 6. Boucles et Tableaux [34]
// Parcours du tableau des notes de l'objet étudiant
etudiant.notes.forEach(note => {
    console.log("Note : " + note);
});

/* Affichage capacités */
function toggleAbilities(id) {
        var panel = document.getElementById(id);
        if (panel.style.display === "none" || panel.style.display === "") {
            panel.style.display = "grid";
        } else {
            panel.style.display = "none";
        }
    }