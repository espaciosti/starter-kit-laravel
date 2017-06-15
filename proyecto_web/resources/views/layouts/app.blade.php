<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Admin Dashboard</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="{{ url('assets/images/favicon.ico') }}">

       @yield('estilos')

    </head>

    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">


            <div class="topbar">
                @yield('barra')
            </div>

            <div class="left side-menu">
                @yield('menu-left')
            </div>

            <div class="content-page">
                @yield('content')
            </div>

        </div>
        <!-- END wrapper -->

            @yield('scriptjs')

            @yield('customjs')

    </body>
</html>