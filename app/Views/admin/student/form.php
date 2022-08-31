<div class="columns is-mobile is-multiline">
    <div class="column is-12">
        <div class="field">
            <input name="student_id" value="<?= isset($student['student_id']) ? $student['student_id']:"" ?>" type="hidden">
            <label class="label" for="student_name">Nombre(s)<span class="has-text-danger">*</span> </label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" name="student_name" value="<?= old('student_name') ?? (isset($student['student_name']) ? $student['student_name']:"") ?>" type="text" placeholder="Nombre(s) del estudiante" value="">
                <span class="icon is-small is-left">
                    <i class="fa-solid fa-address-card"></i>
                </span>
            </div>
            <p class="is-danger help"><?= session('errors.student_name') ?></p>
        </div>
    </div>
    <div class="column is-12">
        <div class="field">
            <label class="label" for="student_lastname">Apellido(s)<span class="has-text-danger">*</span></label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" name="student_lastname" value="<?= old('student_lastname') ?? (isset($student['student_lastname']) ? $student['student_lastname']:"") ?>" type="text" placeholder="Apellido(s) del estudiante">
                <span class="icon is-small is-left">
                    <i class="fa-solid fa-address-card"></i>
                </span>
            </div>
            <p class="is-danger help"><?= session('errors.student_lastname') ?></p>
        </div>
    </div>
    <div class="column is-7-mobile is-4-desktop">
        <div class="field">
            <label class="label" for="student_ci">Carnet de Identidad<span class="has-text-danger">*</span></label>
            <div class="control has-icons-left">
                <input class="input" name="student_ci" value="<?= old('student_ci') ?? (isset($student['student_ci']) ? $student['student_ci']:"") ?>" type="text" placeholder="CI del estudiante">
                <span class="icon is-small is-left">
                    <i class="fa-solid fa-address-card"></i>
                </span>
            </div>
            <p class="is-danger help"><?= session('errors.student_ci') ?></p>
        </div>
    </div>
    <div class="column is-5-mobile is-2-desktop">
        <div class="field">
            <label class="label" for="student_cicomplement">Complemento</label>
            <div class="control">
                <input class="input" name="student_cicomplement" value="<?= old('student_cicomplement') ?? (isset($student['student_cicomplement']) ? $student['student_cicomplement']:"") ?>" type="text" placeholder="Complemento de CI">
            </div>
            <p class="is-danger help"><?= session('errors.student_cicomplement') ?></p>
        </div>
    </div>
    <div class="column is-12-mobile is-3-desktop">
        <div class="field">
            <label class="label" for="student_celphone">N&uacute;mero de celular</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" name="student_celphone" value="<?= old('student_celphone') ?? (isset($student['student_celphone']) ? $student['student_celphone']:"") ?>" type="tel" placeholder="Número de celular del estudiante">
                <span class="icon is-small is-left">
                    <i class="fa-solid fa-mobile-retro"></i>
                </span>
            </div>
            <p class="is-danger help"><?= session('errors.student_celphone') ?></p>
        </div>
    </div>
    <div class="column is-12-mobile is-3-desktop">
        <div class="field">
            <label class="label" for="genere_id">Genero</label>
            <div class="control has-icons-left">
                <div class="select">
                    <select name="genere_id">
                        <option value="0">GENERO NO INDICADO</option>
                        <?php foreach($generes as $genere): ?>
                            <option value="<?= $genere['genere_id'] ?>" <?= $genere['genere_id'] == (isset($student['genere_id']) ? $student['genere_id']:"") ? "selected":"" ?>><?= $genere['genere_description'] ?></option>
                        <?php endforeach;?>
                    </select>
                    <span class="icon is-small is-left">
                        <i class="fa-solid fa-venus-mars"></i>
                    </span>
                </div>
            </div>
            <p class="is-danger help"><?= session('errors.genere_id') ?></p>
        </div>
    </div>
    <div class="column is-12">
        <div class="field">
            <label class="label" for="student_email">Correo Electr&oacute;nico</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" name="student_email" value="<?= old('student_email') ?? (isset($student['student_email']) ? $student['student_email']:"") ?>" type="text" placeholder="Email del estudiante">
                <span class="icon is-small is-left">
                    <i class="fa-solid fa-at"></i>
                </span>
            </div>
            <p class="is-danger help"><?= session('errors.student_email') ?></p>
        </div>
    </div>
    <div class="column is-12">
        <div class="field">
            <label class="label" for="student_photo">Foto</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" name="student_photo" value="<?= old('student_photo') ?? (isset($student['student_photo']) ? $student['student_photo']:"") ?>" type="file" accept="image/png,image/jpeg">
                <span class="icon is-small is-left">
                    <i class="fa-solid fa-image"></i>
                </span>
            </div>
            <p class="is-danger help"><?= session('errors.student_phonenumber') ?></p>
        </div>
    </div>
    <?php if(isset($student)): ?>
    <div class="column is-6-mobile is-4">
        <div class="field">
            <label class="label" for="status_id">Estado</label>
            <div class="control has-icons-left has-icons-right">
                <div class="select">
                    <select name="status_id">
                        <?php foreach($status as $statu): ?>
                            <option value="<?= $statu['status_id'] ?>" <?= $statu['status_id'] == (isset($student['status_id']) ? $student['status_id']:"") ? "selected":"" ?>><?= $statu['status_description'] ?></option>
                        <?php endforeach;?>
                    </select>
                    <span class="icon is-small is-left">
                        <i class="fa-solid fa-square-check"></i>
                    </span>
                </div>
            </div>
            <p class="is-danger help"><?= session('errors.student_phonenumber') ?></p>
        </div>
    </div>
    <?php endIf; ?>
    <div class="column is-12">
        <div class="field">
            <p class="control">
                <input type="submit" class="button is-success" value="<?= isset($student) ? "Actualizar":"Crear" ?>">
                <a href="<?= base_url(route_to('admin/student')) ?>" class="button is-danger">
                    Cancelar
                </a>
            </p>
        </div>
    </div>
</div>






