function delpost(bil_ID, bil_Titre) {
    "use strict";
    if (confirm("Etes-vous sûr de vouloir effacer le " + bil_Titre + " ?")) {
        window.location.href = 'index.php?action=admin&delpost=' + bil_ID;
    }
}


function delcom(com_ID, com_Auteur) {
    "use strict";
    if (confirm("Etes-vous sûr de vouloir effacer le commentaire de " + com_Auteur + " ?")) {
        window.location.href = 'index.php?action=moderation&delcom=' + com_ID;
    }
}


function okcom(com_ID, com_Auteur) {
    "use strict";
    if (confirm("Voulez-vous valider le commentaire de " + com_Auteur + " ?")) {
        window.location.href = 'index.php?action=moderation&okcom=' + com_ID;
    }
}


function deluser(user_ID, user_Pseudo) {
    "use strict";
    if (confirm("Etes-vous sûr de vouloir effacer l'utilisateur suivant de la base de données : " + user_Pseudo + " ?")) {
        window.location.href = 'index.php?action=users&deluser=' + user_ID;
    }
}


function modcom(com_ID, com_Auteur) {
    "use strict";
    if (confirm("Voulez-vous signaler le commentaire de " + com_Auteur + " ?")) {
        window.location.href = 'index.php?action=blog&modcom=' + com_ID;
    }
}