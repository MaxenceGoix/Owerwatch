/* Affichage capacités */
function toggleAbilities(id) {
        var panel = document.getElementById(id);
        if (panel.style.display === "none" || panel.style.display === "") {
            panel.style.display = "grid";
        } else {
            panel.style.display = "none";
        }
    }
