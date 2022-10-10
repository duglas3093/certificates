<nav aria-label="<?= lang('Pager.pageNavigation') ?>">
    <div class="notification">
        <div class="level">
            <div class="level-left">
                <div class="level-item">
                    <div class="buttons has-addons">
                        <?php if ($pager->hasPreviousPage()) : ?>
                            <a href="<?= $pager->getPreviousPage() ?>" aria-label="<?= lang('Pager.previous') ?>" class="button">
                                <span aria-hidden="true">Anterior</span>
                            </a>
                        <?php endif ?>
                        <?php foreach ($pager->links() as $link): ?>
                            <a href="<?= $link['uri'] ?>" class="button <?= $link['active'] ? 'is-active' : '' ?>">
                                <?= $link['title'] ?>
                            </a>
                        <?php endforeach ?>

                        <?php if ($pager->hasNextPage()) : ?>
                            <a href="<?= $pager->getNextPage() ?>" aria-label="<?= lang('Pager.next') ?>" class="button">
                                <span aria-hidden="true">Siguiente</span>
                            </a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

