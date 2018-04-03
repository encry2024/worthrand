<?php

Breadcrumbs::register('admin.dashboard', function ($breadcrumbs) {
    $breadcrumbs->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});

require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';
require __DIR__.'/general/project.php';
require __DIR__.'/general/customer.php';
require __DIR__.'/general/indented_proposal.php';
require __DIR__.'/general/buy_and_resale_proposal.php';
require __DIR__.'/general/aftermarket.php';
require __DIR__.'/general/seal.php';
require __DIR__.'/general/product.php';