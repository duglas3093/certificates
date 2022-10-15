<?= $this->extend('Admin/layout/main') ?>

<?= $this->section('title') ?>
    Editando instructor
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="columns">
    <div class="column is-12">
        <div class="card events-card">
            <header class="card-header">
                <p class="card-header-title">
                <span class="title">Editar instructor</span>
                </p>
            </header>
            <div class="card-table">
                <section class="section">
                    <form action="<?= base_url('admin/update_instructor') ?>" method="POST" enctype="multipart/form-data">
                        <?= $this->include('admin/instructor/form') ?>
                    </form>
                
                </section>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>