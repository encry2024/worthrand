<?php

Breadcrumbs::register('admin.buy-and-resale-proposal.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('labels.backend.buy-and-resale-proposals.management'), route('admin.buy-and-resale-proposal.index'));
});

Breadcrumbs::register('admin.buy-and-resale-proposal.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.buy-and-resale-proposal.index');
    $breadcrumbs->push(__('menus.backend.buy-and-resale-proposals.deleted'), route('admin.buy-and-resale-proposal.deleted'));
});

Breadcrumbs::register('admin.buy-and-resale-proposal.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.buy-and-resale-proposal.index');
    $breadcrumbs->push(__('labels.backend.buy-and-resale-proposals.create'), route('admin.buy-and-resale-proposal.create'));
});

Breadcrumbs::register('admin.buy-and-resale-proposal.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.buy-and-resale-proposal.index');
    $breadcrumbs->push(__('menus.backend.buy-and-resale-proposals.view'), route('admin.buy-and-resale-proposal.show', $id));
});

Breadcrumbs::register('admin.buy-and-resale-proposal.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.buy-and-resale-proposal.index');
    $breadcrumbs->push(__('menus.backend.buy-and-resale-proposals.edit'), route('admin.buy-and-resale-proposal.edit', $id));
});