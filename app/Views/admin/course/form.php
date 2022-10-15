<div class="columns is-mobile is-multiline">
    <div class="column is-12">
        <div class="field">
            <input name="course_id" value="<?= isset($course['course_id']) ? $course['course_id']:"" ?>" type="hidden">
            <label class="label" for="course_name">Nombre<span class="has-text-danger">*</span> </label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" name="course_name" value="<?= old('course_name') ?? (isset($course['course_name']) ? $course['course_name']:"") ?>" type="text" placeholder="Nombre del curso" onkeyup="mayus(this);">
                <span class="icon is-small is-left">
                <i class="fa-solid fa-school"></i>
                </span>
            </div>
            <p class="is-danger help"><?= session('errors.course_name') ?></p>
        </div>
    </div>
    <div class="column is-12">
        <div class="field">
            <label class="label" for="instructor_id">Instructor<span class="has-text-danger">*</span> </label>
            <div class="control has-icons-left has-icons-right">
                <div class="select">
                    <select name="instructor_id">
                        <?php foreach($instructors as $instructor): ?>
                            <option value="<?= $instructor['instructor_id'] ?>" <?= $instructor['instructor_id'] == (isset($course['instructor_id']) ? $course['instructor_id']:"") ? "selected":"" ?>><?= $instructor['instructor_name'] ?></option>
                        <?php endforeach;?>
                    </select>
                    <span class="icon is-small is-left">
                    <i class="fa-solid fa-chalkboard-user"></i>
                    </span>
                </div>
            </div>
            <p class="is-danger help"><?= session('errors.instructor_id') ?></p>
        </div>
    </div>
    
    <div class="column is-6">
        <div class="field">
            <label class="label" for="course_stardate">Fecha Inicio<span class="has-text-danger">*</span> </label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" name="course_stardate" value="<?= old('course_stardate') ?? (isset($course['course_stardate']) ? $course['course_stardate']:"") ?>" type="date">
                <span class="icon is-small is-left">
                <i class="fa-solid fa-calendar-days"></i>
                </span>
            </div>
            <p class="is-danger help"><?= session('errors.course_stardate') ?></p>
        </div>
    </div>
    <div class="column is-6">
        <div class="field">
            <label class="label" for="course_enddate">Fecha Fin<span class="has-text-danger">*</span> </label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" name="course_enddate" value="<?= old('course_enddate') ?? (isset($course['course_enddate']) ? $course['course_enddate']:"") ?>" type="date">
                <span class="icon is-small is-left">
                <i class="fa-solid fa-calendar-days"></i>
                </span>
            </div>
            <p class="is-danger help"><?= session('errors.course_enddate') ?></p>
        </div>
    </div>
    <div class="column is-12">
        <div class="field">
            <label class="label" for="course_description">Descripción<span class="has-text-danger">*</span> </label>
            <div class="control">
                <textarea class="textarea" name="course_description" id="course_description" placeholder="Descripción del curso"><?= (old('course_description') ?? (isset($course['course_description']) ? $course['course_description']:"")) ?></textarea>
            </div>
            <p class="is-danger help"><?= session('errors.course_description') ?></p>
        </div>
    </div>
    
    <?php if(isset($course)): ?>
    <div class="column is-6-mobile is-4">
        <div class="field">
            <label class="label" for="status_id">Estado</label>
            <div class="control has-icons-left has-icons-right">
                <div class="select">
                    <select name="status_id">
                        <?php foreach($status as $statu): ?>
                            <option value="<?= $statu['status_id'] ?>" <?= $statu['status_id'] == (isset($course['status_id']) ? $course['status_id']:"") ? "selected":"" ?>><?= $statu['status_description'] ?></option>
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
                <input type="submit" class="button is-success" value="<?= isset($course) ? "Actualizar":"Crear" ?>">
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
