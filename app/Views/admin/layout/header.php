<nav class="navbar has-background-primary" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="https://bulma.io">
            <img src="https://virtual.certificatebolivia.com.bo/pluginfile.php/1/core_admin/logo/0x150/1641502145/logo%20certificate%20srl%20transparente%20con%20brillo.png"
                alt="Certificate Bolivia">
        </a>
        <div class="navbar-burger burger" data-target="navMenu">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </div>
    </div>

    <div id="navMenu" class="navbar-menu">
        <div class="navbar-end">
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    <img class="is-rounded" src="https://source.unsplash.com/random/96x96" alt="Placeholder image">&nbsp;
                    <?= ucfirst($session['user_lastname']) ?>
                </a>

                <div class="navbar-dropdown">
                    <a class="navbar-item">
                        <i class="fa-solid fa-user"></i>&nbsp;Perfil
                    </a>
                    <hr class="navbar-divider">
                    <a class="navbar-item" href="<?= base_url(route_to('signout')) ?>">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp;Cerrar Sesión
                    </a>

                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    (function () {
        var burger = document.querySelector('.burger');
        var menu = document.querySelector('#' + burger.dataset.target);
        burger.addEventListener('click', function () {
            burger.classList.toggle('is-active');
            menu.classList.toggle('is-active');
        });
    })();
</script>