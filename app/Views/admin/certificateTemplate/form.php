<div class="columns is-mobile is-multiline">
    <div class="column is-12">
        <div class="field">
            <input name="student_id" value="<?= isset($template['student_id']) ? $template['student_id']:"" ?>" type="hidden">
            <label class="label" for="certificatem_title">Titulo<span class="has-text-danger">*</span> </label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" name="certificatem_title" value="<?= old('certificatem_title') ?? (isset($template['certificatem_title']) ? $template['certificatem_title']:"") ?>" type="text" placeholder="Titulo" onkeyup="mayus(this);">
                <span class="icon is-small is-left">
                    <i class="fa-solid fa-address-card"></i>
                </span>
            </div>
            <p class="is-danger help"><?= session('errors.certificatem_title') ?></p>
        </div>
    </div>
    <div class="column is-12">
        <div class="field">
            <label class="label" for="certificatem_description">Description<span class="has-text-danger">*</span></label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" name="certificatem_description" id="editor" value="<?= old('certificatem_description') ?? (isset($template['certificatem_description']) ? $template['certificatem_description']:"") ?>" type="text" placeholder="Apellido(s) del estudiante" onkeyup="mayus(this);">
                <div id="toolbar-container"></div>

                <!-- This container will become the editable. -->
                <div id="editor">
                    <p>This is the initial editor content.</p>
                </div>
                <span class="icon is-small is-left">
                    <i class="fa-solid fa-address-card"></i>
                </span>
            </div>
            <p class="is-danger help"><?= session('errors.certificatem_description') ?></p>
        </div>
    </div>
    <div class="column is-12">
        <div class="control">
            <label class="radio">
                <input type="radio" name="foobar">
                Foo
            </label>
            <label class="radio">
                <input type="radio" name="foobar" checked>
                Bar
            </label>
        </div>
    </div>
    <div class="column is-12">
        <div class="field">
            <label class="label" for="certificatem_background">Fondo<span class="has-text-danger">*</span></label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" name="certificatem_background" value="<?= old('certificatem_background') ?? (isset($template['certificatem_background']) ? $template['certificatem_description']:"") ?>" type="file" >
                <span class="icon is-small is-left">
                    <i class="fa-solid fa-address-card"></i>
                </span>
            </div>
            <p class="is-danger help"><?= session('errors.certificatem_description') ?></p>
        </div>
    </div>
    
    <?php if(isset($template)): ?>
    <div class="column is-6-mobile is-4">
        <div class="field">
            <label class="label" for="status_id">Estado</label>
            <div class="control has-icons-left has-icons-right">
                <div class="select">
                    <select name="status_id">
                        <?php foreach($status as $state): ?>
                            <option value="<?= $state['status_id'] ?>" <?= $state['status_id'] == (isset($template['status_id']) ? $template['status_id']:"") ? "selected":"" ?>><?= $state['status_description'] ?></option>
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
                <input type="submit" class="button is-success" value="<?= isset($template) ? "Actualizar":"Crear" ?>">
                <a href="javascript:history.back()" class="button is-danger">
                    Cancelar
                </a>
            </p>
        </div>
    </div>
</div>

