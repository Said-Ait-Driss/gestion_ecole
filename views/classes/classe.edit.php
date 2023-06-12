<main class="container-fluid" style="height:100vh;">
    <div class="row">
        <div class="col-lg-3">
            <?php  include __DIR__."/../shared/sideBar.php"  ?>
        </div>
        <div class="col-lg-9">
            <div class="card mt-3">
                <div class="card-header">
                    Modifier un classe
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
                            <label for="anne" class="form-label">Anne scolaire : </label>
                            <input type="text" class="form-control <?php if(array_key_exists('anne', $errors)){ echo "is-invalid"; } ?>" id="anne" name="anne"  placeholder="2022/2023" value="<?= $data["anne"]; ?>">
                            <div class="invalid-feedback">
                               <?= $errors["anne"]; ?>
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