<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.customer') }}</th>
                @if (count($model->customer))
                    <td>{{ $model->customer->name }} {!! $model->customer->trashed() ? '<label class="badge badge-danger" style="font-size: 10px;">Deleted | Recoverable</label>' : '' !!}</td>
                @else
                    <td>
                        <label class='badge badge-danger' style='font-size: 10px;'>The Customer assigned to this project was deleted permanently</label>
                    </td>
                @endif
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.name') }}</th>
                <td>{{ $model->name }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.source') }}</th>
                <td>{{ $model->source }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.address_1') }}</th>
                <td>{{ $model->address_1 }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.contact_person_1') }}</th>
                <td>{{ $model->contact_person_1 }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.contact_number_1') }}</th>
                <td>{{ $model->contact_number_1 }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.email_1') }}</th>
                <td>{{ $model->email_1 }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.consultant') }}</th>
                <td>{{ $model->consultant }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.address_2') }}</th>
                <td>{{ $model->address_2 }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.contact_person_2') }}</th>
                <td>{{ $model->contact_person_2 }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.contact_number_2') }}</th>
                <td>{{ $model->contact_number_2 }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.email_2') }}</th>
                <td>{{ $model->email_2 }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.status') }}</th>
                <td>{{ $model->status }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.shorted_list_epc') }}</th>
                <td>{{ $model->shorted_list_epc }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.address_3') }}</th>
                <td>{{ $model->address_3 }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.contact_person_3') }}</th>
                <td>{{ $model->contact_person_3 }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.contact_number_3') }}</th>
                <td>{{ $model->contact_number_3 }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.email_3') }}</th>
                <td>{{ $model->email_3 }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.approved_vendors_list') }}</th>
                <td>{{ $model->approved_vendors_list }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.requirements_coor') }}</th>
                <td>{{ $model->requirements_coor }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.epc_award') }}</th>
                <td>{{ $model->epc_award }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.award_date') }}</th>
                <td>{{ date('F d, Y', strtotime($model->award_date)) }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.implementation_date') }}</th>
                <td>{{ date('F d, Y', strtotime($model->implementation_date)) }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.execution_date') }}</th>
                <td>{{ date('F d, Y', strtotime($model->execution_date)) }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.bu') }}</th>
                <td>{{ $model->bu }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.bu_reference') }}</th>
                <td>{{ $model->bu_reference }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.wpc_reference') }}</th>
                <td>{{ $model->wpc_reference }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.affinity_reference') }}</th>
                <td>{{ $model->affinity_reference }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.value') }}</th>
                <td>{{ $model->value }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.reference_number') }}</th>
                <td>{{ $model->reference_number }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.type_of_sales') }}</th>
                <td>{{ $model->types_of_sales }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.tag_number') }}</th>
                <td>{{ $model->tag_number }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.application') }}</th>
                <td>{{ $model->application }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.pump_model') }}</th>
                <td>{{ $model->pump_model }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.serial_number') }}</th>
                <td>{{ $model->serial_number }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.competitors') }}</th>
                <td>{{ $model->competitors }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.final_result') }}</th>
                <td>{{ $model->final_result }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.scanned_file') }}</th>
                <td>{{ $model->scanned_file }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.created_at') }}</th>
                <td>{{ date('F d, Y (h:i A)', strtotime($model->created_at)) }}</td>
            </tr>

            <tr>
                <th>{{ __('labels.backend.projects.tabs.content.overview.updated_at') }}</th>
                <td>{{ date('F d, Y (h:i A)', strtotime($model->updated_at)) }}</td>
            </tr>
        </table>
    </div>
</div><!--table-responsive-->