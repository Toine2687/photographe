<script src="https://cdn.tiny.cloud/1/x4fxygiud6rog5mec98fookfmqm6p8ukxhotmm9iepncon4r/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>


<form method="post" class="col-10 text-center">
    <div class="mb-3">
        <label for="articleTitle" class="form-label">Titre</label>
        <input type="text" name="articleTitle" id="articleTitle" class="form-control">
    </div>
    <div class="d-flex mb-3 justify-content-between">
        <div class="col-5 ">
            <label for="articleDate" class="form-label">Date à afficher</label>
            <input type="date" name="articleDate" id="articleDate" class="form-control">
        </div>
        <div class="col-5">
            <label for="articleImg" class="form-label">Image de couverture</label>
            <input type="file" name="articleImg" id="articleImg" accept="image/*" class="form-control">
        </div>
    </div>
    <div class="col-12 mb-3">
        <label for="articleContent">Contenu</label>
        <textarea name="articleContent" id="articleContent"></textarea>
    </div>
    <button type="submit" class="btn btn-secondary col-3 mt-5">Publier</button>
</form>