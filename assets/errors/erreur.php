<!-- Page d'erreur -->

<link href="assets/design/error.css" media="all" rel="stylesheet" type="text/css"/>

<?php

$status = $_GET['erreur']
;
    $codes = array(
    400 => array('400', 'Mauvaise Requête',
    'Une mauvaise syntaxe vous a amené ici'),
    403 => array('403', 'Interdiction', 'Le serveur à interdit votre requête.'),
    404 => array('404', 'Non Trouvé',
    'La page demandée ne peut pas être trouvé dans le serveur.'),
    405 => array('405', 'Method Non Autorisée',
    'La méthode spécifiée dans la requête ne peut être alloué.'),
    408 => array('408', 'Temps Imparti',
    'Votre navigateur ne pû envoyer une requête dans les temps impartis.'),

    500 => array('500', 'Erreur de Serveur Interne',
    'Une condition du serveur rends impossible la connexion'),
    502 => array('502', 'Erreur Paserelle',
    'Le serveur à eu une réponse invalide à votre requête.'
    ),
    504 => array('504', 'Temps Imparti Passerelle',
    'Le serveur à eu une réponse dans le temps imparti à votre requête.'),
    );
    
    $titre = $codes[$status][0];
    $nom = $codes[$status][1];
    $message = $codes[$status][2];
    
if ($titre == false || strlen($status) != 3) {
    $titre = "???";
    $message = 'Le code status donné est faux.';
}
?>

<div class="containererror">
    <div class="error">
        <?php
        echo'<h1>'.$titre.'</h1>';
        echo'<h2>'.$nom.'</h2>';
        echo'<p>'.$message.'</p>';
?>
        <p><a href="/PHP_projet/">Retour au menu</a></p>
    </div>
    <div class="stack-container">
        <div class="card-container">
            <div class="perspec" style="--spreaddist: 125px; --scaledist: .75; --vertdist: -25px;">
                <div class="card">
                    <div class="writing">
                        <div class="topbar">
                            <div class="red"></div>
                            <div class="yellow"></div>
                            <div class="green"></div>
                        </div>
                        <div class="code">
                            <ul>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-container">
            <div class="perspec" style="--spreaddist: 100px; --scaledist: .8; --vertdist: -20px;">
                <div class="card">
                    <div class="writing">
                        <div class="topbar">
                            <div class="red"></div>
                            <div class="yellow"></div>
                            <div class="green"></div>
                        </div>
                        <div class="code">
                            <ul>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-container">
            <div class="perspec" style="--spreaddist:75px; --scaledist: .85; --vertdist: -15px;">
                <div class="card">
                    <div class="writing">
                        <div class="topbar">
                            <div class="red"></div>
                            <div class="yellow"></div>
                            <div class="green"></div>
                        </div>
                        <div class="code">
                            <ul>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-container">
            <div class="perspec" style="--spreaddist: 50px; --scaledist: .9; --vertdist: -10px;">
                <div class="card">
                    <div class="writing">
                        <div class="topbar">
                            <div class="red"></div>
                            <div class="yellow"></div>
                            <div class="green"></div>
                        </div>
                        <div class="code">
                            <ul>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-container">
            <div class="perspec" style="--spreaddist: 25px; --scaledist: .95; --vertdist: -5px;">
                <div class="card">
                    <div class="writing">
                        <div class="topbar">
                            <div class="red"></div>
                            <div class="yellow"></div>
                            <div class="green"></div>
                        </div>
                        <div class="code">
                            <ul>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-container">
            <div class="perspec" style="--spreaddist: 0px; --scaledist: 1; --vertdist: 0px;">
                <div class="card">
                    <div class="writing">
                        <div class="topbar">
                            <div class="red"></div>
                            <div class="yellow"></div>
                            <div class="green"></div>
                        </div>
                        <div class="code">
                            <ul>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<script>
    const stackContainer = document.querySelector('.stack-container');
    const cardNodes = document.querySelectorAll('.card-container');
    const perspecNodes = document.querySelectorAll('.perspec');
    const perspec = document.querySelector('.perspec');
    const card = document.querySelector('.card');

    let counter = stackContainer.children.length;

    //function to generate random number
    function randomIntFromInterval(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    }

    //after tilt animation, fire the explode animation
    card.addEventListener('animationend', function() {
        perspecNodes.forEach(function(elem, index) {
            elem.classList.add('explode');
        });
    });

    //after explode animation do a bunch of stuff
    perspec.addEventListener('animationend', function(e) {
        if (e.animationName === 'explode') {
            cardNodes.forEach(function(elem, index) {

                //add hover animation class
                elem.classList.add('pokeup');

                //add event listner to throw card on click
                elem.addEventListener('click', function() {
                    let updown = [800, -800]
                    let randomY = updown[Math.floor(Math.random() * updown.length)];
                    let randomX = Math.floor(Math.random() * 1000) - 1000;
                    elem.style.transform = `translate(${randomX}px, ${randomY}px) rotate(-540deg)`
                    elem.style.transition = "transform 1s ease, opacity 2s";
                    elem.style.opacity = "0";
                    counter--;
                    if (counter === 0) {
                        stackContainer.style.width = "0";
                        stackContainer.style.height = "0";
                    }
                });

                //generate random number of lines of code between 4 and 10 and add to each card
                let numLines = randomIntFromInterval(5, 10);

                //loop through the lines and add them to the DOM
                for (let index = 0; index < numLines; index++) {
                    let lineLength = randomIntFromInterval(25, 97);
                    var node = document.createElement("li");
                    node.classList.add('node-' + index);
                    elem.querySelector('.code ul').appendChild(node).setAttribute('style', '--linelength: ' + lineLength + '%;');

                    //draw lines of code 1 by 1
                    if (index == 0) {
                        elem.querySelector('.code ul .node-' + index).classList.add('writeLine');
                    } else {
                        elem.querySelector('.code ul .node-' + (index - 1)).addEventListener('animationend', function(e) {
                            elem.querySelector('.code ul .node-' + index).classList.add('writeLine');
                        });
                    }
                }
            });
        }
    });
</script>