<?php
session_start();
require ('controller/frontend.php');

try {
    if (isset($_GET['action'])) {
        if(isset($_POST['action'])){
            if($_POST['action'] == 'login'){
                login();
            }
            if($_POST['action'] == 'dislogin'){
                dislogin();
            }
        }
        if ($_GET['action'] == 'randomScenario') {
            randomScenario();
        }
        elseif($_GET['action'] == 'jeuDeRole'){
            startJeuDeRole();
        }
        elseif($_GET['action'] == 'registerForm'){
            registerForm(); 
        }
        else {
            require('view/frontend/errorView.php');//la fonction test la presence de la base de donnés, si la courgette est ronde sinon elle l'envoie sur errorNotFunnyView.php
        }
    }
    else {
        if(isset($_POST['action'])){
            if($_POST['action']== 'register'){
                register();
            }
            elseif($_POST['action']== 'login'){
                login();
                require('view/frontend/accueilView.php');
            }
            elseif($_POST['action']== 'dislogin'){
                dislogin();
                require('view/frontend/accueilView.php');
            }
        }
        else {
            require('view/frontend/accueilView.php');
        }
    }
}

    
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
        
        