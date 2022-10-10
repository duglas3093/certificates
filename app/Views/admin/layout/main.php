<!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->renderSection('title') ?>&nbsp;-&nbsp;Administraci&oacute;n</title>

    <!-- Bulma is included -->
    <link rel="stylesheet" href="<?= base_url("css/main.min.css") ?>">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

</head>

<body>
    <div id="app">
        <nav id="navbar-main" class="navbar is-fixed-top">
            <?= $this->include('admin/layout/header') ?>
        </nav>
        <aside class="aside is-placed-left is-expanded">
            <?= $this->include('admin/layout/menu') ?>
        </aside>
        <article>
            <?= $this->renderSection('content') ?>
        </article>
        <footer class="footer">
            <?= $this->include('admin/layout/footer') ?>
        </footer>
    </div>

    <!-- <div id="sample-modal" class="modal">
        <div class="modal-background jb-modal-close"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Confirm action</p>
                <button class="delete jb-modal-close" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <p>This will permanently delete <b>Some Object</b></p>
                <p>This is sample modal</p>
            </section>
            <footer class="modal-card-foot">
                <button class="button jb-modal-close">Cancel</button>
                <button class="button is-danger jb-modal-close">Delete</button>
            </footer>
        </div>
        <button class="modal-close is-large jb-modal-close" aria-label="close"></button>
    </div> -->

    <!-- Scripts below are for demo only -->
    <script type="text/javascript" src="<?= base_url("js/main.min.js") ?>"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script type="text/javascript" src="<?= base_url("js/chart.sample.min.js") ?>"></script>

    <!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</body>

</html>