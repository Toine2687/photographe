<div class="row align-items-center justify-content-center">
    <!-- <div class="col-6 mb-0">
        <img id="userProfilePic" src="/public/assets/img/userProfile.png">
    </div> -->
    <div class="col-12 mb-5 text-center">
        <h2> <?= $user->firstname . " " . $user->lastname;
                if ($user->partner_firstname != NULL | $user->partner_firstname != '') {
                    echo ' et ' . $user->partner_firstname  . ' '  . $user->partner_lastname;
                } ?></h2>

    </div>

    <div class="userData col-4 align-self-start">
        <p><strong> Contact : </strong></p>
        <p> Téléphone : <a href="tel:<?= $user->phone ?>"> <?= $user->phone ?></a></p>
        <p>Mail: <a href="mailto:<?= $user->mail ?>"><?= $user->mail ?></a></p>
    </div>
    <div class="col-4 align-self-start">
        <div class="col-12">
            <p><strong> Adresse : </strong></p>
            <p> <?= $user->address . ", " . $user->zip . " - " . $user->city ?></p>
        </div>
        <div class="col-12 modifiers">
            <!-- <a href="/controllers/dash/clients/detailCtrl.php"> -->
                <i id="modifyPic" class="fa-solid fa-pen"></i>
            <!-- </a> -->
            <a href="/controllers/dash/clients/deleteCtrl.php?id=<?= $id ?>&delete=true"><i id="deletePatient" class="fa-solid fa-trash"></i></a>
        </div>
    </div>
</div>