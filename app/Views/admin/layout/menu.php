<aside class="menu is-hidden-mobile " style="margin-left: 5px;">
    <p class="menu-label">
        General
    </p>
    <ul class="menu-list">
        <li>
            <a href="<?= base_url(route_to('admin/dashboard')) ?>" class="<?= service('request')->uri->getPath() == 'admin/dashboard' ? 'is-active':'' ?>">
                Inicio
            </a>
        </li>
        <li>
            <a href="<?= base_url(route_to('admin/students')) ?>" class="<?= service('request')->uri->getPath() == 'admin/students' ? 'is-active':'' ?>">
                Estudiantes
            </a>
        </li>
        <li>
            <a href="#" class="<?= service('request')->uri->getPath() == 'admin/courses' ? 'is-active':'' ?>">Cursos</a>
        </li>
        <li>
            <a>Certificados</a>
            <ul>
                <li>
                    <a href="#">Emitidos</a>
                </li>
                <li>
                    <a href="#">Modelo</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">Usuarios</a>
        </li>
        
    </ul>
    <p class="menu-label">
        Institución
    </p>
    <ul class="menu-list">
        <li>
            <a>Información general</a>
        </li>
    </ul>
    <p class="menu-label">
        Configuración
    </p>
    <ul class="menu-list">
        <li><a>test</a></li>
    </ul>
</aside>