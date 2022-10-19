<?= $this->extend('Admin/layout/main') ?>

<?= $this->section('title') ?>
    Modelo de certificado
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="columns">
        <div class="column is-12">
            <div class="card events-card">
                <header class="card-header">
                    <p class="card-header-title">
                    <span class="title">Certificado de <?= $template['course_name'] ?></span>
                    </p>
                </header>
                <div class="card-table">
                    <section class="section">
                        <form action="<?= base_url('admin/store_course_certificate') ?>" method="POST" enctype="multipart/form-data">
                            <div class="columns is-mobile is-multiline">
                                <div class="column is-12">
                                    <div class="field">
                                        <input name="course_id" value="<?= isset($template['course_id']) ? $template['course_id']:"" ?>" type="hidden">
                                        <input name="certificatetem_id" value="<?= isset($template['certificatetem_id']) ? $template['certificatetem_id']:"" ?>" type="hidden">
                                        <label class="label" for="certificatetem_title">Titulo<span class="has-text-danger">*</span> </label>
                                        <div class="control has-icons-left has-icons-right">
                                            <input class="input" name="certificatetem_title" value="<?= old('certificatetem_title') ?? (isset($template['certificatetem_title']) ? $template['certificatetem_title']:"") ?>" type="text" placeholder="Nombre del curso" onkeyup="mayus(this);">
                                            <span class="icon is-small is-left">
                                            <i class="fa-solid fa-school"></i>
                                            </span>
                                        </div>
                                        <p class="is-danger help"><?= session('errors.certificatetem_title') ?></p>
                                    </div>
                                </div>
                                <div class="column is-12">
                                    <div class="field">
                                        <label class="label" for="certificatetem_description">Descripción </label>
                                        <div class="control">
                                            <textarea class="textarea" name="certificatetem_description" id="certificatetem_description" placeholder="Descripción del certificado"><?= (old('certificatetem_description') ?? (isset($template['certificatetem_description']) ? $template['certificatetem_description']:"")) ?></textarea>
                                        </div>
                                        <p class="is-danger help"><?= session('errors.certificatetem_description') ?></p>
                                    </div>
                                </div>
                                <div class="column is-12">
                                    <label class="label" for="">Plantilla<span class="has-text-danger">*</span></label>
                                    <div class="control columns">
                                        <label class="radio column">
                                            <div class="container">
                                                <img src="<?= base_url('images/templateCertificate/centered_middle.png') ?>" alt="">
                                            </div>
                                            <input type="radio" name="certificatetem_template" value="1" <?= $template['certificatetem_template'] == 1 ? 'checked' : ''?>>
                                            Centrado en medio
                                        </label>
                                        <label class="radio column">
                                            <div class="container">
                                                <img src="<?= base_url('images/templateCertificate/centered_left.png') ?>" alt="">
                                            </div>
                                            <input type="radio" name="certificatetem_template" value="2" <?= $template['certificatetem_template'] == 2 ? 'checked' : ''?>>
                                            Centrado izquierdo
                                        </label>
                                        <label class="radio column">
                                            <div class="container">
                                                <img src="<?= base_url('images/templateCertificate/centered_right.png') ?>" alt="">
                                            </div>
                                            <input type="radio" name="certificatetem_template" value="3" <?= $template['certificatetem_template'] == 3 ? 'checked' : ''?>>
                                            Centrado derecho
                                        </label>
                                        <label class="radio column">
                                            <div class="container">
                                                <img src="<?= base_url('images/templateCertificate/centered_top.png') ?>" alt="">
                                            </div>
                                            <input type="radio" name="certificatetem_template" value="4" <?= $template['certificatetem_template'] == 4 ? 'checked' : ''?>>
                                            Centrado superior
                                        </label>
                                        <label class="radio column">
                                            <div class="container">
                                                <img src="<?= base_url('images/templateCertificate/centered_bottom.png') ?>" alt="">
                                            </div>
                                            <input type="radio" name="certificatetem_template" value="5" <?= $template['certificatetem_template'] == 5 ? 'checked' : ''?>>
                                            Centrado inferior
                                        </label>
                                    </div>
                                    <p class="is-danger help"><?= session('errors.certificatetem_template') ?></p>
                                </div>
                                
                                <div class="column is-12">
                                    <div class="container">
                                        <div class="columns">
                                            <div class="column is-two-thirds">
                                                <div class="field">
                                                    <label class="label" for="certificatetem_background">Fondo</label>
                                                    <div class="control has-icons-left has-icons-right">
                                                        <input class="input" id="seleccionArchivos" name="certificatetem_background" value="<?= old('certificatetem_background') ?? (isset($template['certificatetem_background']) ? $template['certificatetem_background']:"") ?>" type="file" accept="image/png,image/jpeg">
                                                        <span class="icon is-small is-left">
                                                            <i class="fa-solid fa-image"></i>
                                                        </span>
                                                    </div>
                                                    <p class="is-danger help"><?= session('errors.certificatetem_background') ?></p>
                                                </div>
                                            </div>
                                            <div class="column">
                                                <figure class="image is-128x128">
                                                    <img id="imagenPrevisualizacion" src="<?= base_url("uploads/images/certificateBackground/{$template['certificatetem_background']}") ?>" alt="image">
                                                </figure>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                
                                <div class="column is-12">
                                    <div class="field">
                                        <p class="control">
                                            <input type="submit" class="button is-success" value="Actualizar">
                                            <a href="javascript:history.back()" class="button is-danger">
                                                Cancelar
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <script>
                                function mayus(e) {
                                    e.value = e.value.toUpperCase();
                                }
                            </script>

                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Obtener referencia al input y a la imagen

        const $seleccionArchivos = document.querySelector("#seleccionArchivos"),
        $imagenPrevisualizacion = document.querySelector("#imagenPrevisualizacion");

        // Escuchar cuando cambie
        $seleccionArchivos.addEventListener("change", () => {
            // Los archivos seleccionados, pueden ser muchos o uno
            const archivos = $seleccionArchivos.files;
            // Si no hay archivos salimos de la función y quitamos la imagen
            if (!archivos || !archivos.length) {
                $imagenPrevisualizacion.src = "";
                return;
            }
            // Ahora tomamos el primer archivo, el cual vamos a previsualizar
            const primerArchivo = archivos[0];
            // Lo convertimos a un objeto de tipo objectURL
            const objectURL = URL.createObjectURL(primerArchivo);
            // Y a la fuente de la imagen le ponemos el objectURL
            $imagenPrevisualizacion.src = objectURL;
        });
    </script>

<?= $this->endSection() ?>