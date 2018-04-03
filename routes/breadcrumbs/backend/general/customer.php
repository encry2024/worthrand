<?php

Breadcrumbs::register('admin.customer.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('labels.backend.customers.management'), route('admin.customer.index'));
});

Breadcrumbs::register('admin.customer.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.customer.index');
    $breadcrumbs->push(__('menus.backend.customers.deleted'), route('admin.customer.deleted'));
});

Breadcrumbs::register('admin.customer.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.customer.index');
    $breadcrumbs->push(__('labels.backend.customers.create'), route('admin.customer.create'));
});

Breadcrumbs::register('admin.customer.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.customer.index');
    $breadcrumbs->push(__('menus.backend.customers.view'), route('admin.customer.show', $id));
});

Breadcrumbs::register('admin.customer.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.customer.index');
    $breadcrumbs->push(__('menus.backend.customers.edit'), route('admin.customer.edit', $id));
});