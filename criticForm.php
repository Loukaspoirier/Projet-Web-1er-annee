<?php require("./header.php") ?>
<h1 class="top">Ajouter des points faibles et des points forts</h1>

<?php 
// Formulaire pour créer une critique

$currentCritic = NULL;
if ($_GET) {
    $currentCritic = $criticController->get($_GET["id"]);
}

if ($_POST) {
    $newCritic = new Critic($_POST);
    if ($_GET) {
        $newCritic->setId_critic($_GET["id"]);
        $criticController->update($newCritic);
    } else {
        $criticController->add($newCritic);
    }

    echo "<script>window.location.href='ps5.php'</script>";
}

?>

<form class="mx-5" method="POST" id="critic">
    <label for="criticTitle" class="form-label">Titre</label>
    <input type="text" value="<?= $currentCritic ? $currentCritic->getCriticTitle() : "" ?>" name="criticTitle" id="criticTitle" placeholder="Entrer le titre du jeu" minlength="5" maxlength="120" class="form-control">
    <label for="strongPoint" class="form-label">Points forts</label>
    <input type="text" value="<?= $currentCritic ? $currentCritic->getStrongPoint() : "" ?>" name="strongPoint" id="strongPoint" placeholder="Ajouter un point fort" minlength="5" maxlength="120" class="form-control">
    <label for="weakPoint" class="form-label">Points faibles</label>
    <input type="text" value="<?= $currentCritic ? $currentCritic->getWeakPoint() : "" ?>" name="weakPoint" id="weakPoint" placeholder="Ajouter un point faible" minlength="5" maxlength="120" class="form-control">
    <input type="submit" value="Ajouter" class="btn btn-primary mt-2">
</form>

<?php require("./footer.php") ?>