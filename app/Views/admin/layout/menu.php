<div class="aside-tools">
                <div class="aside-tools-label">
                    <span><b>Admin</b> One HTML</span>
                </div>
            </div>
            <div class="menu is-menu-main">
                <p class="menu-label">General</p>
                <ul class="menu-list">
                    <li>
                        <a href="<?= base_url(route_to('admin/dashboard')) ?>" class="router-link-active has-icon <?= service('request')->uri->getPath() == 'admin/dashboard' ? 'is-active':'' ?>">
                            <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
                            <span class="menu-item-label">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url(route_to('admin/students')) ?>" class="router-link-active has-icon <?= service('request')->uri->getPath() == 'admin/students' ? 'is-active':'' ?>">
                            <span class="icon"><i class="fa-solid fa-graduation-cap"></i></span>
                            <span class="menu-item-label">Estudiantes</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url(route_to('admin/courses')) ?>" class="router-link-active has-icon <?= service('request')->uri->getPath() == 'admin/courses' ? 'is-active':'' ?>">
                            <span class="icon"><i class="fa-solid fa-school"></i></span>
                            <span class="menu-item-label">Cursos</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url(route_to('admin/users')) ?>" class="router-link-active has-icon <?= service('request')->uri->getPath() == 'admin/users' ? 'is-active':'' ?>">
                            <span class="icon"><i class="fa-solid fa-user"></i></span>
                            <span class="menu-item-label">Usuarios</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url(route_to('admin/courses')) ?>" class="router-link-active has-icon <?= service('request')->uri->getPath() == 'admin/models' ? 'is-active':'' ?>">
                            <span class="icon"><i class="fa-solid fa-hotel"></i></span>
                            <span class="menu-item-label">Modelo</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url(route_to('admin/courses')) ?>" class="router-link-active has-icon <?= service('request')->uri->getPath() == 'admin/' ? 'is-active':'' ?>">
                            <span class="icon"><i class="fa-solid fa-scroll"></i></span>
                            <span class="menu-item-label">Emitidos</span>
                        </a>
                    </li>
                </ul>
                <p class="menu-label">Examples</p>
                <ul class="menu-list">
                    <li>
                        <a href="tables.html" class="has-icon">
                            <span class="icon has-update-mark"><i class="mdi mdi-table"></i></span>
                            <span class="menu-item-label">Tables</span>
                        </a>
                    </li>
                    <li>
                        <a href="forms.html" class="has-icon">
                            <span class="icon"><i class="mdi mdi-square-edit-outline"></i></span>
                            <span class="menu-item-label">Forms</span>
                        </a>
                    </li>
                    <li>
                        <a href="profile.html" class="has-icon">
                            <span class="icon"><i class="mdi mdi-account-circle"></i></span>
                            <span class="menu-item-label">Profile</span>
                        </a>
                    </li>
                    <li>
                        <a class="has-icon has-dropdown-icon">
                            <span class="icon"><i class="mdi mdi-view-list"></i></span>
                            <span class="menu-item-label">Submenus</span>
                            <div class="dropdown-icon">
                                <span class="icon"><i class="mdi mdi-plus"></i></span>
                            </div>
                        </a>
                        <ul>
                            <li>
                                <a href="#void">
                                    <span>Sub-item One</span>
                                </a>
                            </li>
                            <li>
                                <a href="#void">
                                    <span>Sub-item Two</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <p class="menu-label">About</p>
                <ul class="menu-list">
                    <li>
                        <a href="https://github.com/vikdiesel/admin-one-bulma-dashboard" target="_blank"
                            class="has-icon">
                            <span class="icon"><i class="mdi mdi-github-circle"></i></span>
                            <span class="menu-item-label">GitHub</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://justboil.me/bulma-admin-template/free-html-dashboard/" class="has-icon">
                            <span class="icon"><i class="mdi mdi-help-circle"></i></span>
                            <span class="menu-item-label">About</span>
                        </a>
                    </li>
                </ul>
            </div>