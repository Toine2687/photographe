<script src="https://cdn.tiny.cloud/1/x4fxygiud6rog5mec98fookfmqm6p8ukxhotmm9iepncon4r/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>


<form method="post" class="col-10 text-center" enctype="multipart/form-data">

    <div class="d-flex mb-3 justify-content-between">
        <div class="col-5">
            <label for="title" class="form-label">Titre</label>
            <input type="text" name="title" id="title" class="form-control">
            <p><?= $error["title"] ?? '' ?></p>

        </div>
        <div class="col-5">
            <label for="main_picture" class="form-label">Image de couverture</label>
            <input type="file" name="main_picture" id="main_picture" accept="image/*" class="form-control">
            <p><?= $error["main_picture"] ?? '' ?></p>
        </div>
    </div>

    <div class="col-12 mb-3">
        <label for="description" class="form-label">Courte description</label>
        <textarea name="description" id="description" class="form-control"></textarea>
    </div>

    <div class="col-12 mb-3">
        <label for="content">Contenu</label>
        <textarea name="content" id="content"></textarea>
    </div>

    <label for="users_id" class="form-label">Auteur : </label>
    <select name="users_id" id="users_id" class="form-select">
        <option value="select" disabled selected>Selectionnez un auteur</option>
        <?php
        foreach ($users as $user) {
            // Uniquement les utilisateurs admins (role == 1)
            if ($user->role == 1) {
                echo '<option value="' . $user->users_id . '">' . $user->firstname . ' ' . $user->lastname . '</option>';
            }
        }
        ?>
    </select>
    <?php echo "<p>" . ($error['id'] ?? '') . "</p>" ?>

    <p><?= $msg['add'] ?? '' ?></p>

    <button type="submit" class="btn btn-secondary col-3 mt-5">Publier</button>
</form>