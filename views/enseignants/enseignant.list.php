<main class="container-fluid" style="height:100vh;">
    <div class="row">
        <div class="col-lg-3">
            <?php  include __DIR__."/../shared/sideBar.php"  ?>
        </div>
        <div class="col-lg-9">
        <?php if($_SESSION['success'] !=""){  ?>
                        <div class="alert alert-success" role="alert">
                            <?= $_SESSION['success']; ?>
                        </div>
                    <?php $_SESSION['success'] = "";} ?>
                    <?php if($_SESSION['error'] !=""){  ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $_SESSION['error']; ?>
                        </div>
                    <?php $_SESSION['error'] = "";} ?>

            <div class="card mt-3">
                <div class="card-header">
                    liste des professeurs
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                            <th scope="col">N</th>
                            <th scope="col">Matricule</th>
                            <th scope="col">Prenom</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Email</th>
                            <th scope="col">N Tel</th>
                            <th scope="col">Adresse</th>
                            <th scope="col">Ville</th>
                            <th scope="col">Date nais</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as  $item){  ?>
                                <tr>
                                    <th scope="row"><?= $item["id"]; ?></th>
                                    <td><?= $item["matricule"]; ?></td>
                                    <td><?= $item["fName"]; ?></td>
                                    <td><?= $item["lName"]; ?></td>
                                    <td><?= $item["email"]; ?></td>
                                    <td><?= $item["phone"]; ?></td>
                                    <td><?= $item["adresse"]; ?></td>
                                    <td><?= $item["city"]; ?></td>
                                    <td><?= $item["dateBirth"]; ?></td>
                                    <td class="d-flex justify-content-around">
                                        <a href="edit?id=<?= $item["id"]; ?>" class="btn btn-success">Modifier</a>
                                        <a href="delete?id=<?= $item["id"]; ?>" class="btn btn-danger">Suprimmer</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-end">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>

                                <?php  for($page = 1; $page<=$total_pages;$page++){  ?>
                                    <li class="page-item <?php if($page == $current_page) echo "active" ?>">
                                        <a class="page-link" href="?page=<?= $page; ?>"><?= $page; ?></a>
                                    </li>
                                <?php } ?>
                                    <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                    </li>
                                </ul>
                            </nav>
                </div>
            </div>
        </div>
    </div>
</main>