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
                            
                        </div>
                    </div>

                    <div class="page-content-wrapper ">

                        <div class="container">

                          <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-primary">
                                        <div class="panel-body">
                                          <a href="{{ url('usuarios/create') }}" class="btn btn-success waves-effect waves-light pull-right"><span class="glyphicon glyphicon-check"></span> Nuevo Usuario</a>
                                            <h4 class="m-b-30 m-t-0">Catalogo de Usuarios</h4>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">

                                                	<table class="table table-bordered table-hover table-striped table-responsive" id="usuarios-table">
                                                          <thead>
                                                              <tr>
                                                                  <th>Id</th>
                                                                  <th>Nombre</th>                                          
                                                                  <th>Correo</th>
                                                                  <th>Foto</th>
                                                                  <th>Estatus</th>
                                                                  <th>Perfil</th>
                                                                  <th>Creado</th>
                                                                  <th>Acción</th>
                                                              </tr>
                                                          </thead>
                                                      </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

	@if (session('msg'))            
            <script>
                @if(session('type')=='success')
                  
                  swal({
                    title:'Aviso!!',
                    text:'{{session('msg')}}',
                    type:'success',
                    timer: 3500,
                    confirmButtonColor:'green',
                    confirmButtonText:'OK'
                  });
                @endif

                @if(session('type')=='error')
                  
                  swal({
                    title:'Aviso!!',
                    text:'{{session('msg')}}',
                    type:'error',
                    timer: 3500,
                    confirmButtonColor:'red',
                    confirmButtonText:'OK'
                  });
                @endif
            </script>
        @endif

    <script type="text/javascript">
    	
    	//Aqui deben de ir las secciones adicionales
        $(function() {
          $('#usuarios-table').DataTable({
              processing: true,
              serverSide: true,
              ajax: '{!! url('datatable/usuarios') !!}',
          language:{    
            url: '{{url('assets/plugins/datatables/json/Spanish.json')}}'
          },
			"bStateSave": true,
	        "fnStateSave": function (oSettings, oData) {
	            localStorage.setItem( 'DataTables', JSON.stringify(oData) );
	        },
	        "fnStateLoad": function (oSettings) {
	            return JSON.parse( localStorage.getItem('DataTables') );
	        },
              columns: [
                  { data: 'id', name: 'id' },
                  { data: 'name', name: 'name' },
                  { data: 'email', name: 'email' },
                  { data: 'photo', render: function(data, type, row){
                    return '<img src="'+data+'" class="img-circle" width="36px">'
                  } ,orderable:false, searchable:false},
                  { data: 'status', name: 'status' },
                  { data: 'perfil_id', name: 'perfil_id' },
                  { data: 'created_at', name: 'created_at' },
                  { data: 'action', name: 'action',orderable:false, searchable:false },
              ]
          });
      });

    </script>
@endsection