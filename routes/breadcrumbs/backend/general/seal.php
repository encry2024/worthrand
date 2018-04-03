<?php

Breadcrumbs::register('admin.seal.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('labels.backend.seals.management'), route('admin.seal.index'));
});

Breadcrumbs::register('admin.seal.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.seal.index');
    $breadcrumbs->push(__('menus.backend.seals.deleted'), route('admin.seal.deleted'));
});

Breadcrumbs::register('admin.seal.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.seal.index');
    $breadcrumbs->push(__('labels.backend.seals.create'), route('admin.seal.create'));
});

Breadcrumbs::register('admin.seal.show', function ($breadcrumbs, $seal) {
    $breadcrumbs->parent('admin.seal.index');
    $breadcrumbs->push(__('menus.backend.seals.view', ['seal' => $seal->name]), route('admin.seal.show', $seal));
});

Breadcrumbs::register('admin.seal.edit', function ($breadcrumbs, $seal) {
    $breadcrumbs->parent('admin.seal.index');
    $breadcrumbs->push(__('menus.backend.seals.edit'), route('admin.seal.edit', $seal));
});

Breadcrumbs::register('admin.seal.pricing_history.create', function ($breadcrumbs, $seal) {
    $breadcrumbs->parent('admin.seal.show', $seal);
    $breadcrumbs->push(('Create Pricing History'), route('admin.seal.pricing_history.create', $seal));
});

Breadcrumbs::register('admin.seal.pricing_history.show', function ($breadcrumbs, $seal, $pricing_history) {
    $breadcrumbs->parent('admin.seal.show', $seal);
    $breadcrumbs->push(('Create Pricing History'), route('admin.seal.pricing_history.show', [$seal, $pricing_history]));
});

Breadcrumbs::register('admin.seal.pricing_history.edit', function ($breadcrumbs, $seal, $pricing_history) {
    $breadcrumbs->parent('admin.seal.show', $seal);
    $breadcrumbs->push($pricing_history->po_number, route('admin.seal.pricing_history.show', [$seal, $pricing_history]));
    $breadcrumbs->push(('Edit Pricing History'), route('admin.seal.pricing_history.edit', [$seal, $pricing_history]));
});

Breadcrumbs::register('admin.seal.pricing_history.deleted', function ($breadcrumbs, $seal, $pricing_history) {
    $breadcrumbs->parent('admin.seal.show', $seal);
    $breadcrumbs->push($pricing_history->po_number . ' - Deleted');
});