<?= $this->extend('Admin/layout/main') ?>

<?= $this->section('title') ?>
    
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <?= include('admin/user/form') ?>

<?= $this->endSection() ?>