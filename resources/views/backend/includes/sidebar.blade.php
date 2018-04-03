<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                {{ __('menus.backend.sidebar.general') }}
            </li>

            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/dashboard')) }}" href="{{ route('admin.dashboard') }}"><i class="icon-speedometer"></i> {{ __('menus.backend.sidebar.dashboard') }}</a>
            </li>

            @if ($logged_in_user->can('view customer'))
            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/customer*')) }}" href="{{ route('admin.customer.index') }}"><i class="fa fa-users"></i> Customers</a>
            </li>
            @endif

            @if ($logged_in_user->can('view project'))
            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/project*')) }}" href="{{ route('admin.project.index') }}"><i class="fa fa-cog"></i> Project</a>
            </li>
            @endif

            @if ($logged_in_user->can('view aftermarket'))
            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/aftermarket*')) }}" href="{{ route('admin.aftermarket.index') }}"><i class="fa fa-cogs"></i> Aftermarket</a>
            </li>
            @endif

            @if ($logged_in_user->can('view seal'))
            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/seal*')) }}" href="{{ route('admin.seal.index') }}"><i class="fa fa-certificate"></i> Seal</a>
            </li>
            @endif

            @if ($logged_in_user->can('view indented proposal'))
            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/indented-proposal*')) }}" href="{{ route('admin.indented-proposal.index') }}"><i class="fa fa-clipboard"></i> Indented Proposal</a>
            </li>
            @endif

            @if ($logged_in_user->can('view buy and resale proposal'))
            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/buy-and-resale-proposal*')) }}" href="{{ route('admin.buy-and-resale-proposal.index') }}"><i class="fa fa-clipboard"></i> Buy & Resale Proposal</a>
            </li>
            @endif

            <li class="nav-title">
                {{ __('menus.backend.sidebar.system') }}
            </li>

            @if ($logged_in_user->isAdmin())
                <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/auth*'), 'open') }}">
                    <a class="nav-link nav-dropdown-toggle" href="#">
                        <i class="icon-user"></i> {{ __('menus.backend.access.title') }}

                        @if ($pending_approval > 0)
                            <span class="badge badge-danger">{{ $pending_approval }}</span>
                        @endif
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/auth/user*')) }}" href="{{ route('admin.auth.user.index') }}">
                                {{ __('labels.backend.access.users.management') }}

                                @if ($pending_approval > 0)
                                    <span class="badge badge-danger">{{ $pending_approval }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ active_class(Active::checkUriPattern('admin/auth/role*')) }}" href="{{ route('admin.auth.role.index') }}">
                                {{ __('labels.backend.access.roles.management') }}
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/log-viewer*'), 'open') }}">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="icon-list"></i> {{ __('menus.backend.log-viewer.main') }}
                </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer')) }}" href="{{ route('log-viewer::dashboard') }}">
                            {{ __('menus.backend.log-viewer.dashboard') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer/logs*')) }}" href="{{ route('log-viewer::logs.list') }}">
                            {{ __('menus.backend.log-viewer.logs') }}
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div><!--sidebar-->