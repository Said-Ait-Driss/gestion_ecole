<main class="container-fluid" style="height:100vh;">
    <div class="row">
        <div class="col-lg-3">
            <?php  include __DIR__."/../shared/sideBar.php"  ?>
        </div>
        <div class="col-lg-9">
            <div class="card mt-3">
                <div class="card-header">
                    Modifier un etudiant
                </div>
                <div class="card-body">
                    <?php if($_SESSION['success'] !=""){  ?>
                        <div class="alert alert-success" role="alert">
                            <?= $_SESSION['success']; ?>
                        </div>
                    <?php $_SESSION['success'] = "";} ?>
                    <form action="update?id=<?= $id ?>" method="POST" class="row needs-validation">
                        <div class="mb-3 col-lg-6 has-validation">
                            <label for="Prenom" class="form-label">Prenom : </label>
                            <input type="text" class="form-control <?php if(array_key_exists('prenom', $errors)){ echo "is-invalid"; } ?>" id="Prenom" name="fName"  placeholder="Prenom" value="<?= $data["fName"]; ?>">
                            <div class="invalid-feedback">
                               <?= $errors["prenom"]; ?>
                            </div>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="Nom" class="form-label">Nom : </label>
                            <input type="text" class="form-control <?php if(array_key_exists('nom', $errors)){ echo "is-invalid"; } ?>" id="Nom" aria-describedby="Nom" name="lName"  placeholder="Nom" value="<?= $data["lName"]; ?>">
                            <div class="invalid-feedback">
                               <?= $errors["nom"]; ?>
                            </div>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="email" class="form-label">Email : </label>
                            <input type="email" class="form-control <?php if(array_key_exists('email', $errors)){ echo "is-invalid"; } ?>" id="email"  placeholder="Email" name="email" value="<?= $data["email"]; ?>">
                            <div class="invalid-feedback">
                               <?= $errors["email"]; ?>
                            </div>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="phone" class="form-label">Telephone : </label>
                            <input type="text" class="form-control <?php if(array_key_exists('phone', $errors)){ echo "is-invalid"; } ?>" id="phone"  placeholder="Telephone" name="phone" value="<?= $data["phone"]; ?>">
                            <div class="invalid-feedback">
                               <?= $errors["phone"]; ?>
                            </div>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="date" class="form-label">Date de naissance : </label>
                            <input type="date" class="form-control <?php if(array_key_exists('date', $errors)){ echo "is-invalid"; } ?>" id="date"  placeholder="Date de naissance" name="dateBirth" value="<?= $data["dateBirth"] ?>">
                            <div class="invalid-feedback">
                               <?= $errors["date"]; ?>
                            </div>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="adresse" class="form-label">Adresse : </label>
                            <input type="text" class="form-control <?php if(array_key_exists('adresse', $errors)){ echo "is-invalid"; } ?>" id="adresse"  placeholder="Adresse" name="adresse" value="<?= $data["adresse"]; ?>">
                            <div class="invalid-feedback">
                               <?= $errors["adresse"]; ?>
                            </div>
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="ville" class="form-label">Ville : </label>
                            <input type="text" class="form-control <?php if(array_key_exists('ville', $errors)){ echo "is-invalid"; } ?>" id="ville" placeholder="Ville" name="city" value="<?= $data["city"]; ?>">
                            <div class="invalid-feedback">
                               <?= $errors["ville"]; ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Mdifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>