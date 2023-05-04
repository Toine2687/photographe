<section id="addClientsSection">
    <div class="container">
        <h1>Ajout de clients</h1>
        <form action="" method="post">
            <div class="formInputLine">
                <div class="mb-3">
                    <label for="clientsFirstnames" class="form-label">Prénoms</label>
                    <input type="text" class="form-control" id="clientsFirstnames" name="clientsFirstnames" placeholder="XXX & YYY">
                </div>
                <div class="mb-3">
                    <label for="clientsEmail" class="form-label">Addresse Mail</label>
                    <input type="email" class="form-control" id="clientsEmail" name="clientsEmail" placeholder="nom@exemple.com">
                </div>
            </div>
            <div class="formInputLine">
                <div class="mb-3">
                    <label for="clientEventDate" class="form-label">Date de l'événement</label>
                    <input type="date" class="form-control" id="clientEventDate">
                </div>
                <div class="mb-3">
                    <label for="clientsPassword" class="form-label">Mot de passe clients</label>
                    <input type="text" class="form-control" id="clientsPassword" name="clientsPassword" placeholder="Mot de passe">
                </div>
            </div>
            <div class="formInputLine">
                <div class="mb-3">
                    <label for="clientsMainPicture" class="form-label">Photo de couverture</label>
                    <input type="file" class="form-control" id="clientsMainPicture">
                </div>
                <div class="mb-3">
                    <label for="clientsPassword" class="form-label">Fichiers clients</label>
                    <input type="file" class="form-control" id="clientsPassword" name="clientsPassword" multiple>
                </div>
            </div>
            <button type="submit" class="btn btn-secondary">Valider</button>
        </form>
    </div>
</section>