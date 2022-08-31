<?= $this->extend('Admin/layout/main') ?>

<?= $this->section('title') ?>
    
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="columns">
    <div class="column is-12">
        <?php if((session('msg'))){ ?>
            <article class="message is-<?= session('msg.type') ?>">
                <div class="message-body">
                    <?= session('msg.body ') ?>
                </div>
            </article>
        <?php } ?>
        <div class="card events-card">
            <header class="card-header">
                <p class="card-header-title">
                <span class="title">Todos los estudiantes</span>
                </p>
                <a href="<?= base_url(route_to('admin/add_student')) ?>" class="button is-primary"><i class="fa-solid fa-user-plus"></i>Agregar estudiante</a>
            </header>
            <div class="card-table">
                <div class="content">
                    <table class="table is-fullwidth is-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre(s)</th>
                                <th>Apellido(s)</th>
                                <th>Carnet de Identidad</th>
                                <th>Celular</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $contador = 1;
                                foreach ($students as $student):
                            ?>
                            <tr>
                                <td width="5%"><?= $contador ?></td>
                                <td ><?= $student['student_name'] ?></td>
                                <td ><?= $student['student_lastname'] ?></td>
                                <td><?= "{$student['student_ci']} {$student['student_cicomplement']}" ?></td>
                                <td ><?= $student['student_celphone'] ?></td>
                                <td ><?= $student['student_email'] ?></td>
                                <td>
                                    <a href="<?= base_url("admin/edit_student/{$student['student_id']}") ?>" class="button is-small is-info" title="Editar">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <a href="#" class="button is-small is-danger" title="Borrar">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                                $contador++; 
                                endforeach; 
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>