<?php

include_once('src/config.php');

if (!isset($_GET['section']) OR $_GET['section'] == 'index')
{
    include_once('control/moderation/controleur_moderation.php');    
}
