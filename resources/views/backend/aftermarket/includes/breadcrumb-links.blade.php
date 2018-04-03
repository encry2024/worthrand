<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('menus.backend.aftermarkets.main') }}</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.aftermarket.index') }}">{{ __('menus.backend.aftermarkets.all') }}</a>
                <a class="dropdown-item" href="{{ route('admin.aftermarket.create') }}">{{ __('menus.backend.aftermarkets.create') }}</a>
                <a class="dropdown-item" href="{{ route('admin.aftermarket.deleted') }}">{{ __('menus.backend.aftermarkets.deleted') }}</a>
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>