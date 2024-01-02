<header class="navigation">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light px-0">
            <a class="navbar-brand order-1 py-0" href="{{ route('frontend.home') }}">
                <img loading="prelaod" decoding="async" class="img-fluid" width="200" src="{{ asset('assets/logo.png') }}"
                    alt="SU connect">
            </a>
            <div class="navbar-actions order-3 ml-0 ml-md-4">
                <button aria-label="navbar toggler" class="navbar-toggler border-0" type="button"
                    data-toggle="collapse" data-target="#navigation"> <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse text-center order-lg-2 order-4" id="navigation">
                <ul class="navbar-nav mx-auto mt-3 mt-lg-0">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('frontend.home') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Students
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('student.auth.login') }}">Log in</a>
                            <a class="dropdown-item" href="{{ route('student.auth.registration') }}">Registration</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Teachers
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('teacher.auth.login') }}">Log in</a>
                            <a class="dropdown-item" href="{{ route('teacher.auth.registration') }}">Registration</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
