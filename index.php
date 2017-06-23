<?php

include_once('model/config.php');

if (!isset($_GET['section']) OR $_GET['section'] == 'index')
{
    include_once('control/controleur_index.php');
}
