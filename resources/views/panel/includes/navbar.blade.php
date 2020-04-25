<nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute fixed-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('logout')}}">
                        <i class="material-icons">exit_to_app</i>
                        <p>
                            <span class="d-lg-none d-md-block">Stats</span>
                        </p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>