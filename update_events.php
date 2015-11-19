<?php

/* Values received via ajax */
$id = $_POST['id'];
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];

// connection to the database

 // update the records
$sql = "UPDATE evenement SET title=?, start=?, end=? WHERE id=?";
$q = $connessione->prepare($sql);
$q->execute(array($title,$start,$end,$id));
?>