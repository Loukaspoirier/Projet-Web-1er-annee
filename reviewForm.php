<?php require("./header.php") ?>
<h1 class="top">Rédiger une revue</h1>

<?php
// Formulaire pour créer une revue

$currentReview = NULL;
if ($_GET) {
    $currentReview = $reviewController->get($_GET["id"]);
}

if ($_POST) {
    $newReview = new Review($_POST);
    if ($_GET) {
        $newReview->setId_review($_GET["id"]);
        $reviewController->update($newReview);
    } else {
        $reviewController->add($newReview);
    }

    echo "<script>window.location.href='index.php'</script>";
}

?>

<form class="mx-5" method="POST">
    <label for="title" class="form-label">Titre</label>
    <input type="text" value="<?= $currentReview ? $currentReview->getTitle() : "" ?>" name="title" id="title" placeholder="Le titre de la revue" minlength="5" maxlength="120" class="form-control">
    <label for="image" class="form-label">Image</label>
    <input type="url" value="<?= $currentReview ? $currentReview->getImage() : "" ?>" name="image" id="image" placeholder="L'URL d'image de la revue" minlength="5" maxlength="120" class="form-control">
    <label for="author" class="form-label">Auteur</label>
    <input type="text" value="<?= $currentReview ? $currentReview->getAuthor() : "" ?>" name="author" id="author" placeholder="L'auteur de la revue" minlength="5" maxlength="120" class="form-control">
    <label for="content" class="form-label">Contenu</label>
    <textarea name="content" id="content" placeholder="Le contenu de la revue" minlength="10" class="form-control"><?= $currentReview ? $currentReview->getContent() : "" ?></textarea>
    <label for="note" class="form-label">Note</label>
    <input type="number" value="<?= $currentReview ? $currentReview->getNote() : "" ?>" name="note" id="note" placeholder="la note de la revue" min="0" max="20" class="form-control">
    <label for="platform">Platforme</label><br>
    <input type="text" value="<?= $currentReview ? $currentReview->getPlatform() : "" ?>" name="platform" id="platform"><br>
    <input type="submit" value="Publier" class="btn btn-primary mt-2">
</form>

<?php require("./footer.php") ?>