<?php
require '../src/bootstrap.php';


$pdo = Connexion::getConnect()->getConnection();

if (isset($_POST['crud'])) {
    echo "ok";
    if ($_POST['crud'] == "add") {

        if (isset($_POST['name']) and isset($_POST['date']) and isset($_POST['start']) and isset($_POST['end']) and isset($_POST['description'])) {

            $_POST['name'] = htmlspecialchars($_POST['name']);
            $_POST['date'] = htmlspecialchars($_POST['date']);
            $_POST['start'] = htmlspecialchars($_POST['start']);
            $_POST['end'] = htmlspecialchars($_POST['end']);
            $_POST['description'] = htmlspecialchars($_POST['description']);


            $reponse = $pdo->prepare('INSERT INTO events(name,description,start,end) VALUES (?,?,?,?)');
            $reponse->execute(array( $_POST['name'],$_POST['description'],$_POST['date']." ".$_POST['start'].":00",$_POST['date']." ".$_POST['end'].":00"));
            $reponse->closeCursor();


        }

    }
    else if ($_POST['crud'] == "edit"){
        if (isset($_POST['id']) and isset($_POST['name']) and isset($_POST['date']) and isset($_POST['start']) and isset($_POST['end']) and isset($_POST['description'])) {

            $_POST['id'] = htmlspecialchars($_POST['id']);
            $_POST['name'] = htmlspecialchars($_POST['name']);
            $_POST['date'] = htmlspecialchars($_POST['date']);
            $_POST['start'] = htmlspecialchars($_POST['start']);
            $_POST['end'] = htmlspecialchars($_POST['end']);
            $_POST['description'] = htmlspecialchars($_POST['description']);


            $reponse = $pdo->prepare('UPDATE events SET name=?,description=?,start=?,end=? WHERE id=?');
            $reponse->execute(array( $_POST['name'],$_POST['description'],$_POST['date']." ".$_POST['start'].":00",$_POST['date']." ".$_POST['end'].":00", $_POST['id'] ));
            $reponse->closeCursor();


        }
    }
}


if( isset($_GET['crud']) && $_GET['crud'] == "delete"){

    if (isset($_GET['id']) ) {

        $_GET['id'] = htmlspecialchars($_GET['id']);



        $reponse = $pdo->prepare('DELETE FROM events WHERE id=?');
        $reponse->execute(array( $_GET['id']));
        $reponse->closeCursor();

    }

}