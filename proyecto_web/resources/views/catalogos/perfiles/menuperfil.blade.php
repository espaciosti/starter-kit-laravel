@extends('layouts.app')


@section('estilos')
    @include('layouts.estilos')
@endsection

@section('barra')
    @include('layouts.barra')
@endsection

@section('menu-left')
    @include('layouts.menu-left',$elmenu)
@endsection

@section('content')
	
                <!-- Start content -->
                <div class="content">

                    <div class="">
                        <div class="page-header-title">
                            <h4 class="page-title">Permisos Sistema</h4>
                        </div>
                    </div>

                    <div class="page-content-wrapper ">

                        <div class="container">

                             <div class="panel">
				              <div class="panel-heading">
				                <span class="panel-title">Mostrar menús del perfil <b>{{$roldata->perfil}}</b></span>
				              </div>
				              <div class="panel-body">
				                <h3>Seleccione los Menús que desea asignar al perfil</h3>
				              <p alig="justify">Recuerde que para habilitar una opción, la opción padre(de la que depende) debe ser seleccionada también</p><hr>
				              <form method="POST" action="{{url('asignamenus')}}">
				                {{ csrf_field() }}
				                <input type="hidden" id="perfil_id" name="perfil_id" value="{{ $roldata->id}}"/>
				                {!! $Menus !!}
				                <div align="center"><a href="{{url('perfiles')}}" class="btn btn-danger">Regresar</a>&nbsp;<input type="submit" value="Asignar" class="btn btn-success"/></div>
				              </form>
				              </div>
				            </div>


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

@endsection