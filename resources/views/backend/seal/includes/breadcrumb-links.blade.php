<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('menus.backend.seals.main') }}</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.seal.index') }}">{{ __('menus.backend.seals.all') }}</a>
                <a class="dropdown-item" href="{{ route('admin.seal.create') }}">{{ __('menus.backend.seals.create') }}</a>
                <a class="dropdown-item" href="{{ route('admin.seal.deleted') }}">{{ __('menus.backend.seals.deleted') }}</a>
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>