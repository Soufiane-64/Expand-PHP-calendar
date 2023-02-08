<?php
require_once '../src/bootstrap.php';

$pdo = Connexion::getConnect()->getConnection();
$events = new Calendar\Events($pdo);

try {
    $event = $events->find($_GET['id']);
}catch (\Exception $e){
    err();
}
render ('header', ['title' => $event->getName()]);
?>


<div class="form-container">
    <h1>Termindetails</h1>
    <form id="form" action="crud.php">
        <input type="hidden" name="crud" value="edit">

        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <input type="text" placeholder="Titel des Termins" name="name" value="<?= h($event->getName()); ?>" required />
        <label for="date" >Datum : </label>
        <input type="date" placeholder="Date" name="date" value="<?= date($event->getStart()->format('Y-m-d')); ?>"required />
        <label for="start" >Startzeit : </label>
        <input type="time" name="start" value="<?= $event->getStart()->format('H:i'); ?>" required />
        <label for="end" >Endzeit : </label>
        <input type="time" name="end" value="<?= $event->getEnd()->format('H:i'); ?>" required />
        <textarea placeholder="Terminbeschreibung" name="description"  required><?= h($event->getDescription()); ?></textarea>
        <button type="submit" id="click">Termin ändern</button>
    </form>
    <button type="button" id="delete" value="<?= $event->getId(); ?>">Termin löschen</button>

</div>


<script src ="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="./edit.js"defer></script>
<script src="./delete.js"defer></script>

<?php require '../views/footer.php';?>




