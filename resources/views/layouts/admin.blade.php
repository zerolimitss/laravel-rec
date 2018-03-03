
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/dashboard/dashboard.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css?family=Pacifico|Open+Sans:300,400,600');
        h1 {
            font-family: 'Pacifico', cursive;
            font-weight: 400;
            font-size: 2.5em;
            padding-bottom: 20px;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        ul .inner {
            padding-left: 1em;
            overflow: hidden;
            display: none;
        }
        ul .inner.show {
            /*display: block;*/
        }
        ul li {
            margin: .5em 0;
        }
        ul li a.toggle {
            width: 100%;
            display: block;
            background: rgba(0, 0, 0, 0.78);
            color: #fefefe;
            padding: .75em;
            border-radius: 0.15em;
            transition: background .3s ease;
        }
        ul li a.toggle:hover {
            background: rgba(0, 0, 0, 0.9);
            text-decoration: none;
        }

    </style>
</head>

<body>
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{route("home")}}">Microsoft</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a href="{{ route('logout') }}" class="nav-link"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>

        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin') ? 'active' : '' }}" href="{{route('admin')}}">
                            <span data-feather="home"></span>
                            Dashboard <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{ Request::is('all') ? 'active' : '' }}" href="{{route('all')}}">
                            <span data-feather="file"></span>
                            All info
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{ Request::is('add') ? 'active' : '' }}" href="{{route('add')}}">
                            <span data-feather="file"></span>
                            Add
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            {{--<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <button class="btn btn-sm btn-outline-secondary">Share</button>
                        <button class="btn btn-sm btn-outline-secondary">Export</button>
                    </div>
                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                        <span data-feather="calendar"></span>
                        This week
                    </button>
                </div>
            </div>

            <canvas class="my-4" id="myChart" width="900" height="380"></canvas>
--}}
            @section('content')
            @show


        </main>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://getbootstrap.com/assets/js/vendor/popper.min.js"></script>
<script src="https://getbootstrap.com/dist/js/bootstrap.min.js"></script>

<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>

@section('custom-scripts')
@show

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.29.5/js/jquery.tablesorter.js"></script>
</body>
</html>
