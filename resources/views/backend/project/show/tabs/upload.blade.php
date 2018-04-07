<div class="col">
    <div class="col-lg-12">
        <div id="dropzone">
            <form class="dropzone" id="dropZ" method="POST">
                {{ csrf_field() }}
                <input type="hidden" value="{{ $model->id }}" name="project_id">

            </form>
        </div>
    </div>
</div>