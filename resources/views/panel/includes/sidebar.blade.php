<div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
    <div class="logo">
        <a href="{{route('home')}}" class="simple-text logo-normal">
            Alast CMS
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item @isset($active['dashboard']) active @endisset">
                <a class="nav-link" href="{{route('home')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
        </ul>
    </div>
</div>