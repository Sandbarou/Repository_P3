function delpost(BIL_ID, BIL_TITRE) {
    "use strict";
    if (confirm("Etes-vous sûr de vouloir effacer le " + BIL_TITRE + " ?")) {
        window.location.href = 'index.php?action=admin&delpost=' + BIL_ID;
    }
}


function delcom(COM_ID, COM_AUTEUR) {
    "use strict";
    if (confirm("Etes-vous sûr de vouloir effacer le commentaire de " + COM_AUTEUR + " ?")) {
        window.location.href = 'index.php?action=moderation&delcom=' + COM_ID;
    }
}


function okcom(COM_ID, COM_AUTEUR) {
    "use strict";
    if (confirm("Voulez-vous valider le commentaire de " + COM_AUTEUR + " ?")) {
        window.location.href = 'index.php?action=moderation&okcom=' + COM_ID;
    }
}


function deluser(user_ID, user_Pseudo) {
    "use strict";
    if (confirm("Etes-vous sûr de vouloir effacer l'utilisateur suivant de la base de données : " + user_Pseudo + "")) {
        window.location.href = 'index.php?action=users&deluser=' + user_ID;
    }
}


function modcom(COM_ID, COM_AUTEUR) {
    "use strict";
    if (confirm("Voulez-vous signaler le commentaire de " + COM_AUTEUR + " ?")) {
        window.location.href = 'index.php?action=blog&modcom=' + COM_ID;
    }
}
