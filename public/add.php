<?php
require '../src/bootstrap.php';
render('header',['title' => 'Termin hinzufügen']);
?>



<div class="form-container">
    <h1>Termin hinzufügen</h1>
    <form id="form" action="crud.php">
        <input type="text" placeholder="Titel des Termins" name="name" required />
        <label for="date" >Datum : </label>
        <input type="date" placeholder="Date" name="date" required />
        <label for="start" >Startzeit : </label>
        <input type="time" name="start" required />
        <label for="end" >Endzeit : </label>
        <input type="time" name="end"  required />
        <input type="hidden" name="crud" value="add"  required />
        <textarea placeholder="Terminbeschreibung" name="description" required></textarea>
        <button type="submit" id="click">Termin hinzufügen</button>
    </form>
</div>
<script src ="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="./add.js" ></script>


<?php render('footer');?>
