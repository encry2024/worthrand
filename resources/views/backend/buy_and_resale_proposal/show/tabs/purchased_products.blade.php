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
        @foreach ($model->buy_and_resale_proposal_items as $buy_and_resale_proposal_item)
        <tr>
            <td>{{ $buy_and_resale_proposal_item->buy_and_resale_proposal_itemmable->name }}</td>
            <td>{{ $buy_and_resale_proposal_item->quantity }}</td>
            <td>{{ $buy_and_resale_proposal_item->currency }}</td>
            <td>{{ number_format($buy_and_resale_proposal_item->price, 2) }}</td>
            <td>{{ $buy_and_resale_proposal_item->delivery / 7 }}</td>
            <td>
                @if (auth()->user()->roles_label == 'Assistant')
                <form action="{{ route('admin.buy-and-resale-proposal.update-item-delivery', $buy_and_resale_proposal_item->id) }}" method="POST" name="update_item_delivery">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <select name="delivery_status" id="delivery_status" class="custom_select">
                        <option value="PROCESSING" {{ $buy_and_resale_proposal_item->status == 'PROCESSING' ? 'selected' : '' }}>PROCESSING</option>
                        <option value="DELIVERED" {{ $buy_and_resale_proposal_item->status == 'DELIVERED' ? 'selected' : '' }}>DELIVERED</option>
                        <option value="DELAYED" {{ $buy_and_resale_proposal_item->status == 'DELAYED' ? 'selected' : '' }}>DELAYED</option>
                    </select>
                </form>
                @else
                    {{ $buy_and_resale_proposal_item->status }}
                @endif
            </td>
            <?php $added_to_date = $buy_and_resale_proposal_item->delivery / 7; ?>
            <td>{{ date('Y-m-d', strtotime($buy_and_resale_proposal_item->created_at. "+".$added_to_date." day")) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>