<!-- Header-->
<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="navbar-brand" href="./"><img src="{{ url('images/logo.png') }}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="{{ url('images/logo2.png') }}" alt="Logo"></a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">

            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle" src="{{ url('images/admin.jpg') }}" alt="User Avatar">
                </a>

                <div class="user-menu dropdown-menu">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="nav-link btn btn-sm"><i class="fa fa-power -off"></i>Logout</button>
                    </form>
                    {{-- <a class="nav-link" href="{{ logout }}"><i class="fa fa-power -off"></i>Logout</a> --}}
                </div>
            </div>

        </div>
    </div>
</header>
<!-- /#header -->