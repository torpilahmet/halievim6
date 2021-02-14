<header id="header">

    <!-- Mobile Button -->
    <button id="mobileMenuBtn"></button>

    <!-- Logo -->
    <span class="logo pull-left">
					<img src="{{asset('assets/admin/images/logo_light.png')}}" alt="admin panel" height="35" />
				</span>

    <form method="get" action="page-search.html" class="search pull-left hidden-xs">
        <input type="text" class="form-control" name="k" placeholder="Search for something..." />
    </form>

    <nav>

        <!-- OPTIONS LIST -->
        <ul class="nav pull-right">

            <!-- USER OPTIONS -->
            <li class="dropdown pull-left">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <img class="user-avatar" alt="" src="{{ asset('images/avatar').'/'.Auth::user()->avatar }}" height="34" />
                    <span class="user-name">
									<span class="hidden-xs">
										{{ Auth::user()->name }} <i class="fa fa-angle-down"></i>
									</span>
								</span>
                </a>
                <ul class="dropdown-menu hold-on-click">
                    <li><!-- my calendar -->
                        <a href="calendar.html"><i class="fa fa-calendar"></i> Calendar</a>
                    </li>
                    <li><!-- my inbox -->
                        <a href="#"><i class="fa fa-envelope"></i> Inbox
                            <span class="pull-right label label-default">0</span>
                        </a>
                    </li>
                    <li><!-- settings -->
                        <a href="page-user-profile.html"><i class="fa fa-cogs"></i> Settings</a>
                    </li>

                    <li class="divider"></li>

                    <li><!-- logout -->
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i> {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
            <!-- /USER OPTIONS -->

        </ul>
        <!-- /OPTIONS LIST -->

    </nav>

</header>
