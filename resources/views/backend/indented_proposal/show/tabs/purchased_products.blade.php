<table class="table table-hover">
    <thead>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Currency</th>
        <th>Price</th>
        <th>Delivery</th>
        <th>Delivery Status</th>
        <th>Notification Date</th>
    </thead>
    
    <tbody>
        @foreach ($model->indented_proposal_items as $indented_proposal_item)
        <tr>
            <td>{{ $indented_proposal_item->indented_proposal_itemmable->name }}</td>
            <td>{{ $indented_proposal_item->quantity }}</td>
            <td>{{ $indented_proposal_item->currency }}</td>
            <td>{{ number_format($indented_proposal_item->price, 2) }}</td>
            <td>{{ $indented_proposal_item->delivery }}</td>
            <td>
                @if (auth()->user()->roles_label == 'Assistant')
                <form action="{{ route('admin.indented-proposal.update-item-delivery', $indented_proposal_item->id) }}" method="POST" name="update_item_delivery">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <select name="delivery_status" id="delivery_status" class="custom_select">
                        <option value="PROCESSING" {{ $indented_proposal_item->status == 'PROCESSING' ? 'selected' : '' }}>PROCESSING</option>
                        <option value="DELIVERED" {{ $indented_proposal_item->status == 'DELIVERED' ? 'selected' : '' }}>DELIVERED</option>
                        <option value="DELAYED" {{ $indented_proposal_item->status == 'DELAYED' ? 'selected' : '' }}>DELAYED</option>
                    </select>
                </form>
                @else
                    {{ $indented_proposal_item->status }}
                @endif
            </td>
            <td>{{ $indented_proposal_item->notification_date }}</td>
        </tr>
        @endforeach
    </tbody>
</table>