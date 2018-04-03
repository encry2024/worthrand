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
            <td>{{ $indented_proposal_item->status }}</td>
            <td>{{ $indented_proposal_item->notification_date }}</td>
        </tr>
        @endforeach
    </tbody>
</table>