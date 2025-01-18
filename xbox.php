<?php require("./header.php") ?>
<h1 class="top">Test XBOX</h1>

<div class="d-flex">
    <?php
    // Afficher les revues propre à XBOX

    $reviews = $reviewController->getAll();
    $i = 0;

    foreach ($reviews as $review) {
        if (strpos($review->getPlatform(), "XBOX") !== false) { ?>
            <div class="card m-3" style="width: 18rem;">
                <img src="<?= $review->getImage() ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $review->getTitle() ?></h5>
                    <h3 class="card-title"><?= $review->getNote() ?>/20</h3>
                    <p class="card-text"><?= $review->getContent() ?></p>
                    <h5 class="card-title"><?= $review->getPlatform() ?></h5>
                    <a href="./reviewForm.php?id=<?= $review->getId_review() ?>" class="btn btn-warning">Modifier</a>
                    <a href="javascript:;" onclick="confirmRemove(<?= $review->getId_review() ?>)" class="btn btn-danger">Supprimer</a><br><br>
                    <a href="./criticForm.php" class="nav-link">Ajouter des points faibles, points forts</a>
                    <h1>Conclusion</h1>
                    <pre>Point fort        Point faible</pre>
                    <?php
                    // Afficher les critiques du jeu
                    
                    $critics = $criticController->getAll();

                    foreach ($critics as $critic) {
                        if ($review->getTitle() == $critic->getCriticTitle()) { ?>

                            <table id="profile">
                                <tr>
                                    <td>
                                        <li><?= $critic->getStrongPoint() ?></li>
                                    </td>
                                    <td>
                                        <li><?= $critic->getWeakPoint() ?></li>
                                    </td>
                                </tr>

                            </table><?php }
                            } ?>
                </div>

            </div>
    <?php
        }

        $i++;
    }
    ?>
</div>

<?php require("./footer.php") ?>