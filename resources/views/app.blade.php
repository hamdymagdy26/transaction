<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{config('app.name')}}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="icon" type="image/png" href="{{ asset(config('app.favicon')) }}"/>
    <!-- Bootstrap 4.1.1 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@coreui/coreui@2.1.16/dist/css/coreui.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@icon/coreui-icons-free@1.0.1-alpha.1/coreui-icons-free.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css">
    <link href='{{ asset('adminPanel/vendor/choosen/css/chosen.min.css') }}' rel='stylesheet' type='text/css'>
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @yield('styles')

</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{ route('admin.home') }}">
        <img class="navbar-brand-full" src="{{ asset('adminPanel/images/logo1.jpg') }}" width="52px"
             alt="{{ config('app.name') }} Logo">
        <img class="navbar-brand-minimized" src="{{ asset(config('app.favicon')) }}" width="30"
             height="30" alt="Infyom {{ config('app.name') }}">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item d-md-down-none">
            {{-- <a class="nav-link" href="#">
                <i class="icon-bell"></i>
                <span class="badge badge-pill badge-danger">5</span>
            </a> --}}
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" style="margin-right: 100px" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="true" aria-expanded="false">
                <img src="{{ asset('adminPanel/images/avatar.png') }}" width="30" height="30"> {{ strtoupper(Auth::user()->name)  }}
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                
                <a class="dropdown-item" href="{{ route('logout') }}" class="btn btn-default btn-flat">
                    <i class="fa fa-lock"></i>Sign Out
                </a>
            </div>
        </li>
    </ul>
</header>

<div class="app-body">
    @include('sidebar')
    <main class="main">
        @yield('content')
    </main>
</div>
<footer class="app-footer">
    <div>
        <a href="https://www.egyptgotravel.com/" target="_blanck">Egypt Go Travels</a>
        <span>&copy; {{date('Y')}}.</span>
    </div>
    <div class="ml-auto">
        <span>Powered by</span>
        <a href="#">Semantic Code</a>
    </div>
</footer>
</body>
<!-- jQuery 3.1.1 -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@2.1.16/dist/js/coreui.min.js"></script>
<script src='{{ asset("adminPanel/vendor/choosen/js/chosen.jquery.min.js") }}'></script>
<script>
    $(".chosen-select").chosen({no_results_text: "Oops, nothing found!"});

    function convertToSlug(Text)
    {
        return Text
            .toLowerCase()
            .replace(/ /g,'-')
            .replace(/[^\w-]+/g,'')
            ;
    }
</script>
<script src='{{ asset("adminPanel/vendor/customs/js/dynamic-form-fields.js") }}'></script>
<script>
    document.getElementById("slugified-title").onkeypress = function() {

        var Text = this.value;

        var slug = convertToSlug(Text);

        document.getElementById("url_key").value = slug;
    }

    document.getElementById("slugified-title").onchange = function() {

        var Text = this.value;

        var slug = convertToSlug(Text);

        document.getElementById("url_key").value = slug;
    }

    document.getElementById("url_key").onkeypress = function() {

        var Text = this.value;

        var slug = convertToSlug(Text);

        document.getElementById("url_key").value = slug;
    }

    document.getElementById("url_key").onchange = function() {

        var Text = this.value;

        var slug = convertToSlug(Text);

        document.getElementById("url_key").value = slug;
    }
</script>
@yield('scripts')

</html>
