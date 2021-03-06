<?php

Breadcrumbs::register('admin.auth.user.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('labels.backend.access.users.management'), route('admin.auth.user.index'));
});

Breadcrumbs::register('admin.auth.user.deactivated', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.auth.user.index');
    $breadcrumbs->push(__('menus.backend.access.users.deactivated'), route('admin.auth.user.deactivated'));
});

Breadcrumbs::register('admin.auth.user.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.auth.user.index');
    $breadcrumbs->push(__('menus.backend.access.users.deleted'), route('admin.auth.user.deleted'));
});

Breadcrumbs::register('admin.auth.user.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.auth.user.index');
    $breadcrumbs->push(__('labels.backend.access.users.create'), route('admin.auth.user.create'));
});

Breadcrumbs::register('admin.auth.user.assign-customer', function ($breadcrumbs, $user) {
    $breadcrumbs->parent('admin.auth.user.show', route('admin.auth.user.show', $user->id));
    $breadcrumbs->push('Assign Customer', route('admin.auth.user.assign-customer', $user->id));
});

Breadcrumbs::register('admin.auth.user.target-revenue', function ($breadcrumbs, $user) {
    $breadcrumbs->parent('admin.auth.user.show', route('admin.auth.user.show', $user->id));
    $breadcrumbs->push('Target Revenue', route('admin.auth.user.target-revenue', $user->id));
});

Breadcrumbs::register('admin.auth.user.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.auth.user.index');
    $breadcrumbs->push(__('menus.backend.access.users.view'), route('admin.auth.user.show', $id));
});

Breadcrumbs::register('admin.auth.user.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.auth.user.index');
    $breadcrumbs->push(__('menus.backend.access.users.edit'), route('admin.auth.user.edit', $id));
});

Breadcrumbs::register('admin.auth.user.change-password', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.auth.user.index');
    $breadcrumbs->push(__('menus.backend.access.users.change-password'), route('admin.auth.user.change-password', $id));
});
