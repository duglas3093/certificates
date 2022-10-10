<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title></title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- ** Plugins Needed for the Project ** -->
    <!-- plugins -->
    <link rel="stylesheet" href="<?= base_url('plugins/bulma/bulma.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/themify-icons/themify-icons.css')?>">
    <!-- Main Stylesheet -->
    <link href="<?=base_url('css/style.css')?>" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" href="<?=base_url('images/favicon.ico')?>" type="image/x-icon">
    <link rel="icon" href="<?=base_url('images/favicon.ico')?>" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

</head>

<body>

    <?= $this->include('users/layout/header') ?>

    <?= $this->renderSection('content') ?>
    
    <!-- /call to action -->
    <?= $this->include('users/layout/footer') ?>
    <!-- plugins -->
    <script src="<?=base_url('plugins/jQuery/jquery.min.js')?>"></script>
    <script src="<?=base_url('plugins/masonry/masonry.min.js')?>"></script>
    <script src="<?=base_url('plugins/clipboard/clipboard.min.js')?>"></script>
    <script src="<?=base_url('plugins/match-height/jquery.matchHeight-min.js')?>"></script>

    <!-- Main Script -->
    <script src="<?=base_url('js/script.js')?>"></script>

</body>

</html>