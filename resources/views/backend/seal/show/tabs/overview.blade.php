<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">

            <tr>
                <th>{{ __('labels.backend.seals.tabs.content.overview.name') }}</th>
                <td>{{ $model->name }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.seals.tabs.content.overview.drawing_number') }}</th>
                <td>{{ $model->drawing_number }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.seals.tabs.content.overview.bom_number') }}</th>
                <td>{{ $model->bom_number }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.seals.tabs.content.overview.end_user') }}</th>
                <td>{{ $model->end_user }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.seals.tabs.content.overview.seal_type') }}</th>
                <td>{{ $model->seal_type }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.seals.tabs.content.overview.material_number') }}</th>
                <td>{{ $model->material_number }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.seals.tabs.content.overview.code') }}</th>
                <td>{{ $model->code }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.seals.tabs.content.overview.model') }}</th>
                <td>{{ $model->model }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.seals.tabs.content.overview.serial_number') }}</th>
                <td>{{ $model->serial_number }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.seals.tabs.content.overview.tag') }}</th>
                <td>{{ $model->tag }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.seals.tabs.content.overview.price') }}</th>
                <td>{{ $model->price }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.seals.tabs.content.overview.scanned_file') }}</th>
                <td>{{ $model->scanned_file }}</td>
            </tr>

        </table>
    </div>
</div><!--table-responsive-->