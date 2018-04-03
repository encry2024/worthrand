<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">

            <tr>
                <th>{{ __('labels.backend.aftermarkets.tabs.content.overview.pricing_history.po_number') }}</th>
                <td>{{ $model->po_number }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.aftermarkets.tabs.content.overview.pricing_history.pricing_date') }}</th>
                <td>{{ $model->pricing_date }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.aftermarkets.tabs.content.overview.pricing_history.price') }}</th>
                <td>{{ $model->price }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.aftermarkets.tabs.content.overview.pricing_history.terms') }}</th>
                <td>{{ $model->terms }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.aftermarkets.tabs.content.overview.pricing_history.delivery') }}</th>
                <td>{{ $model->delivery }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.aftermarkets.tabs.content.overview.pricing_history.fpd_reference') }}</th>
                <td>{{ $model->fpd_reference }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.aftermarkets.tabs.content.overview.pricing_history.wpc_reference') }}</th>
                <td>{{ $model->wpc_reference }}</td>
            </tr>

        </table>
    </div>
</div><!--table-responsive-->