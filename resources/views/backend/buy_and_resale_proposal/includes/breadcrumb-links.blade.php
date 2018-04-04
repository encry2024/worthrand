<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('menus.backend.buy_and_resale_proposals.main') }}</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.buy-and-resale-proposal.index') }}">{{ __('menus.backend.buy_and_resale_proposals.all') }}</a>
                <a class="dropdown-item" href="{{ route('admin.buy-and-resale-proposal.create') }}">{{ __('menus.backend.buy_and_resale_proposals.create') }}</a>
                <a class="dropdown-item" href="{{ route('admin.buy-and-resale-proposal.deleted') }}">{{ __('menus.backend.buy_and_resale_proposals.deleted') }}</a>
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>