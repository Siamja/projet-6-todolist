<?php

/* Sanitization

$options = array(
    'exercices-php' 	=> FILTER_SANITIZE_STRING,
    'coiffeur' 	=> FILTER_SANITIZE_STRING,
    'legumes' 	=> FILTER_SANITIZE_STRING,   
    
    $result = filter_input_array(INPUT_POST, $options));
    if ($result != null AND $result != FALSE) {
        echo "Tous les champs ont été nettoyés !"  . "<br>";
    
    } else {
    
        echo "Un champ est vide ou n'est pas correct!";
    
    }
    foreach($options as $key => $value) 
    {
       $result[$key]=trim($result[$key]);
    }
        echo $result['exercices-php'] . "<br>";
        echo $result['Coiffeur'] . "<br>";
        echo $result['legumes'] . "<br>";*/


$document = file_get_contents("todo.json", true);

if(isset($_POST['objectif'])) {

    

    $tableau = json_decode($document, true);

    $tableau[] = ["objectif" => $_POST['objectif']];
    
    $codejson = json_encode($tableau,JSON_UNESCAPED_UNICODE);
    $depart = trim(filter_input(INPUT_POST, 'objectif'));
    $depart = fopen("todo.json", "w");
    $write = file_put_contents($depart);    
    print_r($codejson);

    fwrite($depart, $codejson);
    fclose($depart);

    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <title>Coucou petite perruche</title>
</head>

<body>
    <main>
        <div class="container-fluid">
            <div class="container" id="objectif">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 ml-3 p-0">
                        <h3>A faire</h3>
                        <input type="checkbox" id="scales" name="exercices-php">
                        <label for="exercices-php">Terminer les exercices PHP</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 ml-1">
                        <input type="checkbox" id="horns" name="Coiffeur">
                        <label for="Coiffeur">Aller chez le coiffeur</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 ml-1">
                        <input type="checkbox" id="horns" name="legumes">
                        <label for="legumes"> Manger 5 fruits et légumes par jour</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 ml-3">
                        <input type="submit" value="Enregistrer">
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 ml-3 p-0">
                        <h2>Archives des tâches</h2>
                    </div>
                </div>
            </div>
        </div>




        <form method="post" action="#">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 ml-3 p-0">
                            <p>AJouter une tâche</p>
                        </div>
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 ml-3">
                                <input type="textarea" name="objectif"><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 ml-3">
                                <input type="submit" name="submit" value="Ajouter">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
</body>
</html>