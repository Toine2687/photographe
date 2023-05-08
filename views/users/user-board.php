<section class="firstSection" id="userBoardHero">
    <h1>Marie & Simon</h1>
    <h2>30 Juin 2022</h2>
</section>

<section class="container" id="userBoardOptions">

    <div class="row d-flex justify-content-center">

        <div class="col-10 text-center">
            <h3>Bienvenue</h3>
            <p>Téléchargez l'archive complète du reportage ou consultez librement la galerie.</p>
        </div>

        <div class="col-10 text-center mb-5">
            <button type="button" class="btn btn-secondary">Archive <i class="fa-solid fa-rectangle-history"></i></button>
        </div>

    </div>
</section>

<section class="gallery">
    <?php
    foreach (glob("*.txt") as $filename) {
        echo "$filename occupe " . filesize($filename) . "\n";
    }
    ?>
</section>