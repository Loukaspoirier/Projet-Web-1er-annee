<?php
// Pour supprimer la revue

require("header.php");
$reviewController->remove($_GET["id"]);
echo "<script>window.location.href='index.php'</script>";