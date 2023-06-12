<main class="container-fluid" style="height:100vh;">
    <div class="row">
        <div class="col-lg-3">
            <?php  include __DIR__."/../shared/sideBar.php"  ?>
        </div>
        <div class="col-lg-9">
            <div class="card mt-3">
                <div class="card-header">
                    Modifier un cours
                </div>
                <div class="card-body">
                    <?php if($_SESSION['success'] !=""){  ?>
                        <div class="alert alert-success" role="alert">
                            <?= $_SESSION['success']; ?>
                        </div>
                    <?php $_SESSION['success'] = "";} ?>
                    <form action="update?id=<?= $id ?>" method="POST" class="row needs-validation">
                        <div class="mb-3 col-lg-6 has-validation">
                            <label for="nom" class="form-label">nom : </label>
                            <input type="text" class="form-control <?php if(array_key_exists('nom', $errors)){ echo "is-invalid"; } ?>" id="nom" name="nom"  placeholder="nom" value="<?= $data["nom"]; ?>">
                            <div class="invalid-feedback">
                               <?= $errors["nom"]; ?>
                            </div>
                        </div>
                        <div class="mb-3 col-lg-6 has-validation">
                            <label for="id_enseignant" class="form-label">Enseignant: </label>
                            <select class="form-select" aria-label="Default select example" name="id_enseignant" id="id_enseignant">
                                <?php foreach($enseignants as $item) {  ?>
                                    <option value="<?= $item["id"] ?>" <?php if($item["id"] == $data["id_enseignant"]) echo "selected";?>><?= $item['fName'] . " ". $item["lName"] ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                               <?= $errors["id_enseignant"]; ?>
                            </div>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="description" class="form-label">Description : </label>
                            <input type="text" class="form-control <?php if(array_key_exists('description', $errors)){ echo "is-invalid"; } ?>" id="description" aria-describedby="description" name="description"  placeholder="description" value="<?= $data["description"]; ?>">
                            <div class="invalid-feedback">
                               <?= $errors["description"]; ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Mdifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>