<?php
/**
 * Project
 */
Breadcrumbs::register('admin.project.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('labels.backend.projects.management'), route('admin.project.index'));
});

Breadcrumbs::register('admin.project.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.project.index');
    $breadcrumbs->push(__('labels.backend.projects.create'), route('admin.project.create'));
});

Breadcrumbs::register('admin.project.show', function ($breadcrumbs, $project) {
    $breadcrumbs->parent('admin.project.index');
    $breadcrumbs->push(__('labels.backend.projects.show', ['project' => $project->name]), route('admin.project.show', $project));
});

Breadcrumbs::register('admin.project.edit', function ($breadcrumbs, $project) {
    $breadcrumbs->parent('admin.project.index');
    $breadcrumbs->push(__('labels.backend.projects.edit', ['project' => $project->name]), route('admin.project.edit', $project));
});

Breadcrumbs::register('admin.project.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.project.index');
    $breadcrumbs->push(__('labels.backend.projects.deleted'), route('admin.project.deleted'));
});