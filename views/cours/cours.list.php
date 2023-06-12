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
                    liste des classes
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                            <th scope="col">N</th>
                            <th scope="col">nom</th>
                            <th scope="col">enseignant</th>
                            <th scope="col">Description</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data as  $item){  ?>
                                <tr>
                                    <th scope="row"><?= $item["id"]; ?></th>
                                    <td><?= $item["nom"]; ?></td>
                                    <td><?= $item["enseignant"]; ?></td>
                                    <td><?= $item["description"]; ?></td>
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