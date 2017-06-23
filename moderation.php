<?php

include_once('model/config.php');

if (!isset($_GET['section']) OR $_GET['section'] == 'index')
{
    include_once('control/moderation/controleur_moderation.php');    
}
