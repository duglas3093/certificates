<?= $this->extend('Admin/layout/main') ?>

<?= $this->section('title') ?>
    Dashboard admin
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php if((session('msg'))): ?>
    <!-- <article class="message is-<?= session('msg.type') ?>">
        <div class="message-body">
            
        </div>
    </article> -->
    <section class="hero is-info welcome is-small" style="margin-bottom: 20px;">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    <?= session('msg.body ') ?>
                </h1>
            </div>
        </div>
    </section>
<?php endIf; ?>

<section class="info-tiles">
    <div class="tile is-ancestor has-text-centered">
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title">439k</p>
                <p class="subtitle">Estudiantes</p>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title">59k</p>
                <p class="subtitle">Cursos</p>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title">3.4k</p>
                <p class="subtitle">Certificados</p>
            </article>
        </div>
    </div>
</section>
<div class="columns">
    <div class="column is-12">
        <div class="card events-card">
            <header class="card-header">
                <p class="card-header-title">
                <span class="title">Ultimos cursos <i class="fa-solid fa-chalkboard-user"></i></span>
                </p>
            </header>
            <div class="card-table">
                <div class="content">
                    <table class="table is-fullwidth is-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Fecha</th>
                                <th>Creado Por</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td width="5%">1</td>
                                <td class="level-left">Diplomado en trabajo social forence y pericial</td>
                                <td>17-08-2022</td>
                                <td >Marcelo</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="column is-6">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    Inventory Search
                </p>
                <a href="#" class="card-header-icon" aria-label="more options">
                    <span class="icon">
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </span>
                </a>
            </header>
            <div class="card-content">
                <div class="content">
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-large" type="text" placeholder="">
                        <span class="icon is-medium is-left">
                            <i class="fa fa-search"></i>
                        </span>
                        <span class="icon is-medium is-right">
                            <i class="fa fa-check"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    User Search
                </p>
                <a href="#" class="card-header-icon" aria-label="more options">
                    <span class="icon">
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </span>
                </a>
            </header>
            <div class="card-content">
                <div class="content">
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-large" type="text" placeholder="">
                        <span class="icon is-medium is-left">
                            <i class="fa fa-search"></i>
                        </span>
                        <span class="icon is-medium is-right">
                            <i class="fa fa-check"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>
<?= $this->endSection() ?>