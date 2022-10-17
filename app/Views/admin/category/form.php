<div class="columns is-mobile is-multiline">
    <div class="column is-12">
        <div class="field">
            <input name="category_id" value="<?= isset($category['category_id']) ? $category['category_id']:"" ?>" type="hidden">
            <label class="label" for="category_description">Nombre<span class="has-text-danger">*</span> </label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" name="category_description" value="<?= old('category_description') ?? (isset($category['category_description']) ? $category['category_description']:"") ?>" type="text" placeholder="Categoria" onkeyup="mayus(this);">
                <span class="icon is-small is-left">
                <i class="fa-solid fa-school"></i>
                </span>
            </div>
            <p class="is-danger help"><?= session('errors.category_description') ?></p>
        </div>
    </div>
    
    <div class="column is-12">
        <div class="field">
            <p class="control">
                <input type="submit" class="button is-success" value="<?= isset($category) ? "Actualizar":"Crear" ?>">
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
