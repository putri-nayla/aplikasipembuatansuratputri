<?php
include 'db.php';
$id = $_GET['id'];
$conn->query("DELETE FROM surat WHERE id=$id");
header("Location: index.php");
?>
