<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>{{ __('labels.backend.customers.tabs.content.overview.name') }}</th>
                <td>{{ $model->name }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.customers.tabs.content.overview.address') }}</th>
                <td>{{ $model->address }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.customers.tabs.content.overview.city') }}</th>
                <td>{{ $model->city }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.customers.tabs.content.overview.postal_code') }}</th>
                <td>{{ $model->postal_code }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.customers.tabs.content.overview.contact_person') }}</th>
                <td>{{ $model->contact_person }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.customers.tabs.content.overview.contact_number') }}</th>
                <td>{{ $model->contact_number }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.customers.tabs.content.overview.position_of_contact_person') }}</th>
                <td>{{ $model->position_of_contact_person }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.customers.tabs.content.overview.plant_site_address') }}</th>
                <td>{{ $model->plant_site_address }}</td>
            </tr>
        </table>
    </div>
</div><!--table-responsive-->