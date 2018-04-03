<?php

Breadcrumbs::register('admin.aftermarket.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('labels.backend.aftermarkets.management'), route('admin.aftermarket.index'));
});

Breadcrumbs::register('admin.aftermarket.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.aftermarket.index');
    $breadcrumbs->push(__('menus.backend.aftermarkets.deleted'), route('admin.aftermarket.deleted'));
});

Breadcrumbs::register('admin.aftermarket.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.aftermarket.index');
    $breadcrumbs->push(__('labels.backend.aftermarkets.create'), route('admin.aftermarket.create'));
});

Breadcrumbs::register('admin.aftermarket.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.aftermarket.index');
    $breadcrumbs->push(__('menus.backend.aftermarkets.view', ['aftermarket' => $id->name]), route('admin.aftermarket.show', $id));
});

Breadcrumbs::register('admin.aftermarket.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.aftermarket.index');
    $breadcrumbs->push(__('menus.backend.aftermarkets.edit'), route('admin.aftermarket.edit', $id));
});


Breadcrumbs::register('admin.aftermarket.pricing_history.create', function ($breadcrumbs, $aftermarket) {
    $breadcrumbs->parent('admin.aftermarket.show', $aftermarket);
    $breadcrumbs->push(('Create Pricing History'), route('admin.aftermarket.pricing_history.create', $aftermarket));
});

Breadcrumbs::register('admin.aftermarket.pricing_history.show', function ($breadcrumbs, $aftermarket, $pricing_history) {
    $breadcrumbs->parent('admin.aftermarket.show', $aftermarket);
    $breadcrumbs->push(('Create Pricing History'), route('admin.aftermarket.pricing_history.show', [$aftermarket, $pricing_history]));
});

Breadcrumbs::register('admin.aftermarket.pricing_history.edit', function ($breadcrumbs, $aftermarket, $pricing_history) {
    $breadcrumbs->parent('admin.aftermarket.show', $aftermarket);
    $breadcrumbs->push($pricing_history->po_number, route('admin.aftermarket.pricing_history.show', [$aftermarket, $pricing_history]));
    $breadcrumbs->push(('Edit Pricing History'), route('admin.aftermarket.pricing_history.edit', [$aftermarket, $pricing_history]));
});

Breadcrumbs::register('admin.aftermarket.pricing_history.deleted', function ($breadcrumbs, $aftermarket, $pricing_history) {
    $breadcrumbs->parent('admin.aftermarket.show', $aftermarket);
    $breadcrumbs->push($pricing_history->po_number . ' - Deleted');
});