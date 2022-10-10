<?= $this->extend('users/layout/main') ?>
<?= $this->section('title')?>
Login
<?= $this->endSection()?>

<?= $this->section('content') ?>
<section class="section">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-half">
                <?php if((session('msg'))){ ?>
                    <article class="message is-<?= session('msg.type') ?>">
                        <div class="message-body">
                            <?= session('msg.body ') ?>
                        </div>
                    </article>
                <?php } ?>
                <figure style="margin-bottom: 40px;">
                    <!-- <img src="https://placeimg.com/640/480/any" alt="Melton Hill Lake"> -->
                    <img style="display: block; margin: 0px auto;" src="https://virtual.certificatebolivia.com.bo/pluginfile.php/1/core_admin/logo/0x150/1641502145/logo%20certificate%20srl%20transparente%20con%20brillo.png" alt="Logo">
                </figure>                
                <form action="<?= base_url(route_to('signin')) ?>" method="POST">
                    <div class="field">
                        <div class="control">
                            <p class="control has-icons-left has-icons-right">
                            <input class="input input-lg" type="email" name="user_email" placeholder="Email" value="<?= old('user_email') ?>">
                                <!-- <input class="input is-medium is-rounded" type="email" name="user_email" placeholder="Email" value="<?= old('user_email') ?>"> -->
                                <span class="icon is-small is-left">
                                    <i class="fas fa-envelope"></i>
                                </span>
                            </p>
                            <p class="is-danger help"><?= session('errors.user_email') ?></p>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <p class="control has-icons-left">
                                <input class="input input-lg" type="password" name="user_password" placeholder="Contraseña">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </p>
                            <p class="is-danger help"><?= session('errors.user_password') ?></p>
                        </div>
                    </div>
                    <br/>
                    <input type="submit" class="button is-block is-fullwidth btn-primary is-medium" value="Ingresar">
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>