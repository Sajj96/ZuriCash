<div class="wrapper">
    <!-- Navbar-->
    <header class="main-header-top hidden-print">
        <a href="{{ route('admin.home')}}" class="logo"><strong>NACHANGIA</strong></a>
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>
            <!-- Navbar Right Menu-->
            <div class="navbar-custom-menu f-right">

                <ul class="top-nav">
                    <!--Notification Menu-->
                    <!-- window screen -->
                    <li class="pc-rheader-submenu">
                        <a href="#!" class="drop icon-circle" onclick="javascript:toggleFullScreen()">
                            <i class="icon-size-fullscreen"></i>
                        </a>

                    </li>
                    <!-- User Menu-->
                    <li class="dropdown">
                        <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
                            <span><img class="img-circle " src="{{ asset('admin/assets/images/avatar-1.png')}}" style="width:40px;" alt="User Image"></span>
                            <span>John <b>Doe</b> <i class=" icofont icofont-simple-down"></i></span>

                        </a>
                        <ul class="dropdown-menu settings-menu">
                            <li><a href="#!"><i class="icon-settings"></i> Settings</a></li>
                            <li><a href="#"><i class="icon-user"></i> Profile</a></li>
                            <li><a href="#"><i class="icon-envelope-open"></i> My Messages</a></li>
                            <li class="p-0">
                                <div class="dropdown-divider m-0"></div>
                            </li>
                            <li><a href="#"><i class="icon-lock"></i> Lock Screen</a></li>
                            <li><a href="login1.html"><i class="icon-logout"></i> Logout</a></li>

                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Side-Nav-->
    <aside class="main-sidebar hidden-print ">
        <section class="sidebar" id="sidebar-scroll">
            <!-- Sidebar Menu-->
            <ul class="sidebar-menu">
                <li class="treeview">
                    <a class="waves-effect waves-dark" href="{{ route('admin.home')}}">
                        <i class="icon-speedometer"></i><span> Dashboard</span>
                    </a>
                </li>
                @if(Auth::user()->user_type == 2)
                <li class="treeview">
                    <a class="waves-effect waves-dark" href="index.html">
                        <i class="icon-people"></i><span> Users</span>
                    </a>
                </li>
                <li class="treeview">
                    <a class="waves-effect waves-dark" href="index.html">
                        <i class="icon-hourglass"></i><span> Campaigns</span>
                    </a>
                </li>
                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-grid"></i><span> Categories</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="waves-effect waves-dark" href="{{ route('category')}}"><i class="icon-arrow-right"></i> Category List</a></li>
                        <li><a class="waves-effect waves-dark" href="{{ route('category.show')}}"><i class="icon-arrow-right"></i> Create Category</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a class="waves-effect waves-dark" href="index.html">
                        <i class="icon-credit-card"></i><span> Transactions</span>
                    </a>
                </li>
                <li class="treeview">
                    <a class="waves-effect waves-dark" href="index.html">
                        <i class="icon-heart"></i><span> Donations</span>
                    </a>
                </li>
                @else
                <li class="treeview">
                    <a class="waves-effect waves-dark" href="{{ route('me.campaign')}}">
                        <i class="icon-hourglass"></i><span> Campaigns</span>
                    </a>
                </li>
                <li class="treeview">
                    <a class="waves-effect waves-dark" href="index.html">
                        <i class="icon-credit-card"></i><span> Transactions</span>
                    </a>
                </li>
                <li class="treeview">
                    <a class="waves-effect waves-dark" href="index.html">
                        <i class="icon-heart"></i><span> Donations</span>
                    </a>
                </li>
                @endif
            </ul>
        </section>
    </aside>