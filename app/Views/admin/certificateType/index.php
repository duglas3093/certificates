<?= $this->extend('Admin/layout/main') ?>

<?= $this->section('title') ?>
Estudiantes
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<input type="hidden" value="<?= base_url() ?>" id="base_url">
<section class="section is-title-bar">
    <div class="level">
        <div class="level-left">
            <div class="level-item">
                <h1 class="title">Tipos de certificados</h1>
                
            </div>
        </div>
        <div class="level-right">
            <div class="level-item">
                <div class="buttons is-right">
                    <button class="button is-primary" data-target="addFormModal"
                        type="button" onclick="formModal('add')">
                        <span class="icon"><i class="fa-solid fa-user-plus"></i></span>
                        <span>Agregar tipo</span>
                    </button>
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

    <?php if(sizeof($types) > 0): ?>
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
                                <th>Descripcion</th>
                                <th>Creado</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $contador = 1;
                                foreach ($types as $type):
                            ?>
                            <tr>
                                <td class="is-checkbox-cell">
                                    <label class="b-checkbox checkbox">
                                        <input type="checkbox" value="false">
                                        <span class="check"></span>
                                    </label>
                                </td>
                                <td><?= $type['certificatetype_description'] ?></td>
                                <td><?= $type['created_at'] ?></td>
                                <td>
                                    <button class="button is-small is-primary" title="Editar" onclick="editCertificateType(<?= $type['certificatetype_id'] ?>)">
                                        <span class="icon"><i class="fa-solid fa-pencil"></i></span>
                                    </button>
                                    <button class="button is-small is-danger jb-modal" data-target="sample-modal"
                                        type="button" onclick="showModalDelete(<?= $type['certificatetype_id'] ?>)">
                                        <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                    </button>
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

<!-- MODAL -->
<div id="addFormModal" class="modal">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="box ">
            <div class="field">
                <label class="label" for="type_description">Tipo de certificado</label>
                <p class="control has-icons-left has-icons-right">
                    <input class="input" type="text" id="type_description" name="type_description" placeholder="Tipo" onkeyup="mayus(this)">
                    <span class="icon is-small is-left"><i class="fa-sharp fa-solid fa-certificate"></i></span>
                </p>
                <input type="hidden" id="type_id">
            </div>
            <div class="field">
                
                <button class="button is-success" id="buttonSave" >Guardar</button>
                <button class="button is-danger jb-modal-close">Cancelar</button>
            </div>
        </div>

    </div>
</div>
<!-- MODAL -->
<script>
    var base_url;

    window.onload = () => {
        base_url = $('#base_url').val();
    };

    function formModal(add) {
        $('#addFormModal').addClass('is-active');
        if(add == 'add'){
            clear();
            $('#buttonSave').attr('onclick','addCertificateType()');
        }else if(add == 'edit'){
            $('#buttonSave').attr('onclick','saveCertificateType()');
        }
    }
    
    function addCertificateType() {
        let controller = `${base_url}/admin/add_type_description`;
        let typeDescription = $('#type_description').val();

        $.ajax({
            url: controller,
            type: "POST",
            data: {
                typeDescription:typeDescription
            },
            beforeSend: () => {},
            complete: (data) => {},
            success: (response) => {
                window.location.reload()
            },
            error: () => {
                alert("error");
            }
        });
    }

    function editCertificateType(type){
        let controller = `${base_url}/admin/get_type_description`;
        $.ajax({
            url: controller,
            type: "POST",
            data: {
                type:type
            },
            beforeSend: () => {},
            complete: (data) => {},
            success: (response) => {
                let res = JSON.parse(response);
                formModal('edit');
                $('#type_id').val(`${res['certificatetype_id']}`);
                $('#type_description').val(`${res['certificatetype_description']}`);
            },
            error: () => {
                alert("error");
            }
        });
        
    }
    
    function saveCertificateType(){
        let controller = `${base_url}/admin/save_certificatetype`;
        let typeId = $('#type_id').val();
        let typeDescription = $('#type_description').val();
        $.ajax({
            url: controller,
            type: "POST",
            data: {
                typeId : typeId,
                typeDescription : typeDescription,
            },
            beforeSend: () => {},
            complete: (data) => {},
            success: (response) => {
                window.location.reload();
            },
            error: () => {
                alert("error");
            }
        });
        
    }

    function clear() {
        $('#type_id').val('');
        $('#type_description').val('');
    }

    function mayus(e) {
        e.value = e.value.toUpperCase();
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