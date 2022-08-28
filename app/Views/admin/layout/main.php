<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Free Bulma template</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.9.0-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
</head>

<body>
    <!-- START NAV -->
    <?= $this->include('admin/layout/header') ?>
    <!-- END NAV -->
    <div class="columns">
        <div class="column is-2">
            <?= $this->include('Admin/layout/menu') ?>
        </div>
        <div class="column is-10">
            <?= $this->renderSection('content') ?>
        </div>
    </div>
    <section class="section">
    </section>
    <?= $this->include('admin/layout/footer') ?>
    <script async type="text/javascript" src="../js/bulma.js"></script>
</body>

</html>