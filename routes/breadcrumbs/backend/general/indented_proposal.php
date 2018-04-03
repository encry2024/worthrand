<?php

Breadcrumbs::register('admin.indented-proposal.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('labels.backend.indented_proposals.management'), route('admin.indented-proposal.index'));
});

Breadcrumbs::register('admin.indented-proposal.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.indented-proposal.index');
    $breadcrumbs->push(__('menus.backend.indented_proposals.deleted'), route('admin.indented-proposal.deleted'));
});

Breadcrumbs::register('admin.indented-proposal.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.indented-proposal.index');
    $breadcrumbs->push(__('labels.backend.indented_proposals.create'), route('admin.indented-proposal.create'));
});

Breadcrumbs::register('admin.indented-proposal.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.indented-proposal.index');
    $breadcrumbs->push(__('menus.backend.indented_proposals.view'), route('admin.indented-proposal.show', $id));
});

Breadcrumbs::register('admin.indented-proposal.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.indented-proposal.index');
    $breadcrumbs->push(__('menus.backend.indented_proposals.edit'), route('admin.indented-proposal.edit', $id));
});