<?= $this->extend('Admin/layout/main') ?>

<?= $this->section('title') ?>
Categorias
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= $this->extend('Admin/layout/main') ?>

<?= $this->section('title') ?>

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<input type="hidden" value="<?= base_url() ?>" id="base_url">
<section class="section is-title-bar">
    <div class="level">
        <div class="level-left">
            <div class="level-item">
                <h1 class="title">Categorias</h1>
            </div>
        </div>
        <div class="level-right">
            <div class="level-item">
                <div class="buttons is-right">
                    <a href="<?= base_url(route_to('admin/add_category')) ?>"  class="button is-primary">
                        <span class="icon"><i class="fa-solid fa-user-plus"></i></span>
                        <span>Agregar Categoria</span>
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

    <?php if(sizeof($categories) > 0): ?>
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
                                <th>Nombre</th>
                                <th>Fecha</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $contador = 1;
                                foreach ($categories as $category):
                            ?>
                            <tr>
                                <td class="is-checkbox-cell">
                                    <label class="b-checkbox checkbox">
                                        <input type="checkbox" value="false">
                                        <span class="check"></span>
                                    </label>
                                </td>
                                <td data-label="Nombre"><?= $category['category_description'] ?></td>
                                <td data-label="Fecha"><?= $category['created_at'] ?></td>
                                <td class="is-actions-cell">
                                    <div class="buttons is-right">
                                        <a class="button is-small is-primary" title="Editar" href="<?= base_url("admin/edit_category/{$category['category_id']}") ?>">
                                            <span class="icon"><i class="fa-solid fa-pencil"></i></span>
                                        </a>
                                        <button class="button is-small is-danger jb-modal" data-target="sample-modal"
                                            type="button" onclick="showModalDelete(<?= $category['category_id'] ?>,'<?= $category['category_description'] ?>')">
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
                    <p>No hay nada aqu?????</p>
                </div>
            </section>
        </div>
    </div>
    <?php endIf; ?>
</section>

<!-- MODAL -->
<div id="modalDelete" class="modal">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="box has-text-centered">
            <article class="media">
                <div class="media-left">
                    <p class="is-size-1 has-text-danger">
                        <i class="fa-solid fa-trash-can"></i>
                    </p>
                </div>
                <div class="media-content">
                    <div class="content">
                        <p>??Seguro que desea eliminar el curso <strong><span id="eliminarCurso"></span></strong> ?</p>
                        <input type="hidden" id="course_id">
                    </div>
                </div>
            </article>
            <button class="button is-success" onclick="deleteCouse()">Confirmar</button>
            <button class="button is-danger jb-modal-close">Cancelar</button>
        </div>

    </div>
</div>
<!-- MODAL -->

<script>
    var base_url;

    window.onload = () => {
        base_url = $('#base_url').val();
    };

    function showModalDelete(course_id,course_name) {
        $('#modalDelete').addClass('is-active');
        $('#course_id').val(course_id);
        $('#eliminarCurso').html(course_name);
    }
    
    function deleteCouse() {
        let controller = `${base_url}/admin/delete_course`;
        let course_id = $('#course_id').val();

        $.ajax({
            url: controller,
            type: "POST",
            data: {
                course_id: course_id
            },
            beforeSend: () => {},
            complete: (data) => {},
            success: (response) => {
                let producto = JSON.parse(response);
                $('#nombre_producto').val(producto.nombre_producto);
                $('#unidad').val(producto.unidad);
                $('#precio_mayor').val(producto.precio_mayor);
                $('#precio_menor').val(producto.precio_menor);
                $('#id_producto').val(producto.id);
            },
            error: () => {
                alert("error");
            }
        })
    }
</script>

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

<?= $this->endSection() ?>