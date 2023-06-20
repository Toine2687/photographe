<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Partenaire</th>
            <th scope="col">Téléphone</th>
            <th scope="col">Email</th>
            <th scope="col">Ville</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($users as $user) {
        ?>
            <tr>
                <th scope="row"><?= $user->users_id ?></th>
                <td><?= $user->lastname ?></td>
                <td><?= $user->firstname ?></td>
                <td><?= $user->partner_firstname ?></td>
                <td><a href="tel:<?= $user->phone ?>"><?= $user->phone ?></a> </td>
                <td><a href="mailto:<?= $user->mail ?>"><?= $user->mail ?></a></td>
                <td><a href="/controllers/dash/clients/detailCtrl.php?id=<?= $user->users_id?>"><i class="fa-solid fa-eye"></i></a></td>
                <td><a href="/controllers/dash/clients/detailCtrl.php?id=<?= $user->users_id?>&delete=true"><i class="fa-solid fa-trash"></i></a></td>
            </tr>
        <?php }
        ?>
    </tbody>
</table>

<!-- <li class="list-group-item">
        <div class="d-flex justify-content-between">
            <p class="clientFirstname">Machin</p>
            <p class="clientLastname">Dupont</p>
            <p class="clientEmail">machin.dupont@mail.com</p>
            <p><a href=""><i class="fa-solid fa-eye"></i></a></p>
            <p><a href=""><i class="fa-solid fa-pen-to-square"></i></a></p>
            <p><a href=""><i class="fa-solid fa-trash"></i></a></p>
        </div>
    </li> -->