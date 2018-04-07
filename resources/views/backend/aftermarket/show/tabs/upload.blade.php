<div class="col">
    <div class="col-lg-12">
        <div id="dropzone">
            <form class="dropzone" id="dropZ" method="POST">
                {{ csrf_field() }}
                <input type="hidden" value="{{ $model->id }}" name="aftermarket_id">

            </form>
        </div>
    </div>
</div>
<br/>
<div class="col">
    <table class="table table-hover">
        <thead>
            <th>Filename</th>
            <th>Action</th>
        </thead>

        <tbody>
            @if(count($files))
                @foreach ($files as $file)
                    <tr>
                        <td>{{ $file }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ asset('storage/aftermarket/'.$model->id.'/'.$file) }}" data-toggle="tooltip" title="View File"><i class="fa fa-search"></i></a>
                            <a class="btn btn-warning btn-sm text-white" href="{{ route('admin.aftermarket.download', [$model->id, $file]) }}"><i class="fa fa-download"></i></a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="2"><p class="text-center">There are no uploaded files</p></td>
                </tr>
            @endif
        </tbody>
    </table>
</div>