<div class="columns is-mobile is-multiline">
    <div class="column is-12">
        <div class="field">
            <input name="instructor_id" value="<?= isset($instructor['instructor_id']) ? $instructor['instructor_id']:"" ?>" type="hidden">
            <label class="label" for="instructor_name">Nombre(s)<span class="has-text-danger">*</span> </label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" name="instructor_name" value="<?= old('instructor_name') ?? (isset($instructor['instructor_name']) ? $instructor['instructor_name']:"") ?>" type="text" placeholder="Nombre(s) del intructor" onkeyup="mayus(this);">
                <span class="icon is-small is-left">
                    <i class="fa-solid fa-address-card"></i>
                </span>
            </div>
            <p class="is-danger help"><?= session('errors.instructor_name') ?></p>
        </div>
    </div>
    
    <?php if(isset($instructor)): ?>
    <div class="column is-6-mobile is-4">
        <div class="field">
            <label class="label" for="status_id">Estado</label>
            <div class="control has-icons-left has-icons-right">
                <div class="select">
                    <select name="status_id">
                        <?php foreach($status as $statu): ?>
                            <option value="<?= $statu['status_id'] ?>" <?= $statu['status_id'] == (isset($instructor['status_id']) ? $instructor['status_id']:"") ? "selected":"" ?>><?= $statu['status_description'] ?></option>
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
                <input type="submit" class="button is-success" value="<?= isset($instructor) ? "Actualizar":"Crear" ?>">
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
