<!-- START NAV -->
<nav class="navbar">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="<?= base_url(route_to('/')) ?>">
                    <img src="https://virtual.certificatebolivia.com.bo/pluginfile.php/1/core_admin/logo/0x150/1641502145/logo%20certificate%20srl%20transparente%20con%20brillo.png" alt="Logo">
                    <!-- <img src="https://cdn.emk.dev/templates/bulma-logo-light.png" alt="Logo"> -->
                </a>
                <span class="navbar-burger burger" data-target="navbarMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </div>
            <div id="navbarMenu" class="navbar-menu">
                <div class="navbar-end">
                    <a class="navbar-item is-active" href="<?= base_url(route_to('signout')) ?>">
                        Cerrar Sesión
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <!-- END NAV -->