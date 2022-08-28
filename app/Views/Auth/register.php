<?= $this->extend('users/layout/main') ?>

<?= $this->section('title') ?>
Registro
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<section class="section">
    <div class="container">
        <h1 class="title">Registrate</h1>
        <h2 class="subtitle">
            Solo debes ingresar unos datos para comenzar a publicar.
        </h2>
    </div>
    <?php //session() ?>
    <form action="<?= base_url('auth/store') ?>" method="POST">
        <div class="field">
            <label class="label" for="user_name">Nombre</label>
            <div class="control">
                <input class="input" name="user_name" value="<?=old('user_name')?>" type="text" placeholder="Text input">
            </div>
            <p class="is-danger help"><?= session('errors.user_name') ?></p>
        </div>
    
        <div class="field">
            <label class="label" for="user_lastname">Apellidos</label>
            <div class="control">
                <input class="input" name="user_lastname" value="<?= old('user_lastname ') ?>" type="text" placeholder="Text input">
            </div>
            <p class="is-danger help"><?= session('errors.user_lastname') ?></p>
        </div>
    
        <div class="field">
            <label class="label">Correo</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" name="user_email" value="<?= old('user_email') ?>" type="user_email" placeholder="Email input">
                <span class="icon is-small is-left">
                    <i class="fas fa-envelope"></i>
                </span>
                <span class="icon is-small is-right">
                    <i class="fas fa-exclamation-triangle"></i>
                </span>
            </div>
            <p class="is-danger help"><?= session('errors.user_email') ?></p>
        </div>
    
        <div class="field">
            <label class="label" for="user_login">Nombre de usuario</label>
            <div class="control">
                <input class="input" name="user_login" type="text" placeholder="" value="<?= old('user_login') ?>">
            </div>
            <p class="is-danger help"><?= session('errors.user_login') ?></p>
        </div>  

        <div class="field">
            <label class="label" for="user_password">Constraseña</label>
            <div class="control">
                <input class="input" name="user_password" type="password" placeholder="">
            </div>
            <p class="is-danger help"><?= session('errors.user_password') ?></p>
        </div>  
    
        <div class="field">
            <label class="label" for="c-password">Confirmación de constraseña</label>
            <div class="control">
                <input class="input" name="c-password" type="password" placeholder="">
            </div>
        </div>
        
        <div class="field is-grouped">
            <div class="control">
                <button class="button is-info">Registrarse</button>
            </div>
        </div>
    </form>
</section>
<?= $this->endSection() ?>