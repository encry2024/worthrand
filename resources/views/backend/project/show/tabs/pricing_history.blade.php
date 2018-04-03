<div class="col">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>{{ __('labels.backend.projects.table.pricing_history.po_number') }}</th>
                    <th>{{ __('labels.backend.projects.table.pricing_history.pricing_date') }}</th>
                    <th>{{ __('labels.backend.projects.table.pricing_history.price') }}</th>
                    <th>{{ __('labels.backend.projects.table.pricing_history.terms') }}</th>
                    <th>{{ __('labels.backend.projects.table.pricing_history.delivery') }}</th>
                    <th>{{ __('labels.backend.projects.table.pricing_history.fpd_reference') }}</th>
                    <th>{{ __('labels.backend.projects.table.pricing_history.wpc_reference') }}</th>
                    <th>{{ __('labels.backend.projects.table.pricing_history.created_at') }}</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @if ($model->pricing_histories->count())
                @foreach ($model->pricing_histories as $project_pricing_history)
                    <tr>
                        <td>{{ $project_pricing_history->po_number }}</td>
                        <td>{{ $project_pricing_history->pricing_date }}</td>
                        <td>{{ $project_pricing_history->price }}</td>
                        <td>{{ $project_pricing_history->terms }}</td>
                        <td>{{ $project_pricing_history->delivery }}</td>
                        <td>{{ $project_pricing_history->fpd_reference }}</td>
                        <td>{{ $project_pricing_history->wpc_reference }}</td>
                        <td>{{ $project_pricing_history->created_at }}</td>
                        <td>{!! $project_pricing_history->action_buttons !!}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="9"><p class="text-center">There are no stored Project's Pricing History in the database...</p></td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</div><!--col-->