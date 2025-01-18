<?php require("./header.php") ?>
<h1 class="top">GamingZone</h1>

<div class="d-flex">
    <?php
    $reviews = $reviewController->getAll();
    $i = 0;

    // Pour afficher la revue
    foreach ($reviews as $review) { ?>
        <div class="card m-3" style="width: 18rem;">
            <img src="<?= $review->getImage() ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $review->getTitle() ?></h5>
                <p class="card-text"><?= substr($review->getContent(), 0, 150) ?> <?= strlen($review->getContent()) > 150 ? "..." : ""; ?></p>
                <a href="javascript:;" onclick="deployReview(<?= htmlspecialchars(json_encode($review->getContent()), ENT_QUOTES); ?>, <?= $i ?>)" class="link-primary">Voir plus</a> <br>
                
                </div>
        </div>
    <?php

        $i++;
    }  ?>
</div>
<a href="http://176.183.249.225" target="_blank">PokéBingo</a>

<?php require("./footer.php") ?>