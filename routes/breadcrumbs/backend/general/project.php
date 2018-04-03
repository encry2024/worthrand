<?php

Breadcrumbs::register('admin.project.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('labels.backend.projects.management'), route('admin.project.index'));
});

Breadcrumbs::register('admin.project.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.project.index');
    $breadcrumbs->push(__('menus.backend.projects.deleted'), route('admin.project.deleted'));
});

Breadcrumbs::register('admin.project.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.project.index');
    $breadcrumbs->push(__('labels.backend.projects.create'), route('admin.project.create'));
});

Breadcrumbs::register('admin.project.show', function ($breadcrumbs, $project) {
    $breadcrumbs->parent('admin.project.index');
    $breadcrumbs->push(__('menus.backend.projects.view', ['project' => $project->name]), route('admin.project.show', $project));
});

Breadcrumbs::register('admin.project.edit', function ($breadcrumbs, $project) {
    $breadcrumbs->parent('admin.project.index');
    $breadcrumbs->push(__('menus.backend.projects.edit'), route('admin.project.edit', $project));
});

Breadcrumbs::register('admin.project.pricing_history.create', function ($breadcrumbs, $project) {
    $breadcrumbs->parent('admin.project.show', $project);
    $breadcrumbs->push(('Create Pricing History'), route('admin.project.pricing_history.create', $project));
});

Breadcrumbs::register('admin.project.pricing_history.show', function ($breadcrumbs, $project, $pricing_history) {
    $breadcrumbs->parent('admin.project.show', $project);
    $breadcrumbs->push(('Create Pricing History'), route('admin.project.pricing_history.show', [$project, $pricing_history]));
});

Breadcrumbs::register('admin.project.pricing_history.edit', function ($breadcrumbs, $project, $pricing_history) {
    $breadcrumbs->parent('admin.project.show', $project);
    $breadcrumbs->push($pricing_history->po_number, route('admin.project.pricing_history.show', [$project, $pricing_history]));
    $breadcrumbs->push(('Edit Pricing History'), route('admin.project.pricing_history.edit', [$project, $pricing_history]));
});

Breadcrumbs::register('admin.project.pricing_history.deleted', function ($breadcrumbs, $project, $pricing_history) {
    $breadcrumbs->parent('admin.project.show', $project);
    $breadcrumbs->push($pricing_history->po_number . ' - Deleted');
});