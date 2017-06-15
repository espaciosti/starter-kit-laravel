@extends('layouts.app')


@section('estilos')
    @include('layouts.estilos')
@endsection

@section('barra')
    @include('layouts.barra')
@endsection

@section('menu-left')
    
@endsection

@section('content')
    
                <!-- Start content -->
                <div class="content">

                    <div class="">
                        <div class="page-header-title">
                            <h4 class="page-title">Pagina no encontrada</h4>
                        </div>
                    </div>

                    <div class="page-content-wrapper ">

                        <div class="container">

                           <div class="jumbotron"><h1>La pagina que busca no existe !!</h1></div>

                        </div><!-- container -->


                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->

                <footer class="footer">
                     © {{ date('Y') }} Tecnología
                </footer>

            
@endsection

@section('scriptjs')
    @include('layouts.scriptjs')
@endsection

@section('customjs')
    @include('layouts.customjs')
@endsection