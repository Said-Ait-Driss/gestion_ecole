<!-- layout.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion d'ecole </title>
    <link rel="stylesheet" href="/ecole/public/dist/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" />
</head>
<body>

<?php include 'shared/header.php'; ?>

    <div class="content">
        <?php include $page; ?>
    </div>

<?php include 'shared/footer.php'; ?>

    <script src="/ecole/public/dist/bundle.js"></script>
    </body>
</html>

