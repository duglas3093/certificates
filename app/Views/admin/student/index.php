<?= $this->extend('Admin/layout/main') ?>

<?= $this->section('title') ?>
Estudiantes
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section is-title-bar">
    <div class="level">
        <div class="level-left">
            <div class="level-item">
                <h1 class="title">Todos los estudiantes</h1>
                
            </div>
        </div>
        <div class="level-right">
            <div class="level-item">
                <div class="buttons is-right">
                    <a href="<?= base_url(route_to('admin/add_student')) ?>"  class="button is-primary">
                        <span class="icon"><i class="fa-solid fa-user-plus"></i></span>
                        <span>Agregar Estudiante</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section is-main-section">
    <?php if((session('msg'))){ ?>
        <article class="message is-<?= session('msg.type') ?>">
            <div class="message-body">
                <?= session('msg.body ') ?>
            </div>
        </article>
    <?php } ?>

    <?php if(sizeof($students) > 0): ?>
    <div class="card has-table">
        <div class="card-content">
            <div class="b-table has-pagination">
                <div class="table-wrapper has-mobile-cards">
                    <table class="table is-fullwidth is-striped is-hoverable is-fullwidth">
                        <thead>
                            <tr>
                                <th class="is-checkbox-cell">
                                    <label class="b-checkbox checkbox">
                                        <input type="checkbox" value="false">
                                        <span class="check"></span>
                                    </label>
                                </th>
                                <th></th>
                                <th>Nombre</th>
                                <th>Carnet de Identidad</th>
                                <th>City</th>
                                <th>Created</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $contador = 1;
                                foreach ($students as $student):
                            ?>
                            <tr>
                                <td class="is-checkbox-cell">
                                    <label class="b-checkbox checkbox">
                                        <input type="checkbox" value="false">
                                        <span class="check"></span>
                                    </label>
                                </td>
                                <td class="is-image-cell">
                                    <div class="image">
                                        <img src="<?= base_url('uploads/images/students/'.($student['student_photo'] != "" ? $student['student_photo']: "user_default.jpg")) ?>"
                                            class="is-rounded">
                                    </div>
                                </td>
                                <td data-label="Name"><?= "{$student['student_name']} {$student['student_lastname']}" ?></td>
                                <td data-label="Company"><?= "{$student['student_ci']} {$student['student_cicomplement']}" ?></td>
                                <td data-label="City">South Cory</td>
                                <!-- <td data-label="Email"><?= $student['student_email'] ?></td> -->
                                <!-- <td data-label="Progress" class="is-progress-cell">
                                    <progress max="100" class="progress is-small is-primary" value="79">79</progress>
                                </td> -->
                                <td data-label="Created">
                                    <small class="has-text-grey is-abbr-like" title="Oct 25, 2020"><?= $student['updated_at'] ?></small>
                                </td>
                                <td class="is-actions-cell">
                                    <div class="buttons is-right">
                                        <a class="button is-small is-primary" title="Editar" href="<?= base_url("admin/edit_student/{$student['student_id']}") ?>">
                                            <span class="icon"><i class="fa-solid fa-pencil"></i></span>
                                        </a>
                                        <button class="button is-small is-danger jb-modal" data-target="sample-modal"
                                            type="button">
                                            <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php
                                $contador++; 
                                endforeach; 
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="notification">
                    <div class="level">
                        <div class="level-left">
                            <div class="level-item">
                                <div class="buttons has-addons">
                                    </div>
                                </div>
                            </div>
                            <div class="level-right">
                                <div class="level-item">
                                <?= $pager->links() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>

    <div class="card has-table">
        <div class="card-content">
            <section class="section">
                <div class="content has-text-grey has-text-centered">
                    <p>
                        <span class="icon is-large"><i class="mdi mdi-emoticon-sad mdi-48px"></i></span>
                    </p>
                    <p>No hay nada aquí…</p>
                </div>
            </section>
        </div>
    </div>
    <?php endIf; ?>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Functions to open and close a modal
        function openModal($el) {
            $el.classList.add('is-active');
        }

        function closeModal($el) {
            $el.classList.remove('is-active');
        }

        function closeAllModals() {
            (document.querySelectorAll('.modal') || []).forEach(($modal) => {
                closeModal($modal);
            });
        }

        // Add a click event on buttons to open a specific modal
        (document.querySelectorAll('.js-modal-trigger') || []).forEach(($trigger) => {
            const modal = $trigger.dataset.target;
            const $target = document.getElementById(modal);

            $trigger.addEventListener('click', () => {
                openModal($target);
            });
        });

        // Add a click event on various child elements to close the parent modal
        (document.querySelectorAll(
            '.modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button') || [])
        .forEach(($close) => {
            const $target = $close.closest('.modal');

            $close.addEventListener('click', () => {
                closeModal($target);
            });
        });

        // Add a keyboard event to close all modals
        document.addEventListener('keydown', (event) => {
            const e = event || window.event;

            if (e.keyCode === 27) { // Escape key
                closeAllModals();
            }
        });
    });
</script>
<?= $this->endSection() ?>