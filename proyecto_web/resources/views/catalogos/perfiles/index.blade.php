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
                                          <a href="{{ url('perfiles/create') }}" class="btn btn-success waves-effect waves-light pull-right"><span class="glyphicon glyphicon-check"></span> Nuevo Perfil</a>
                                            <h4 class="m-b-30 m-t-0">Catalogo de Perfiles</h4>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">

                                              	   <table class="table table-bordered table-hover table-striped table-responsive" id="perfiles-table">
                                                        <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Perfil</th>                                          
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

                <!-- Modales -->
                <div class="modal fade bs-example-modal-sm" id="mostrarModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="mySmallModalLabel">Perfil</h4>
                            </div>
                            <div class="modal-body">
                                <p id="nombreperfil"></p>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>


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
    	
    function verPerfil(perfil)
    {
    	$('#nombreperfil').text('');

    	$('#nombreperfil').text(perfil);

    	$('#mostrarModal').modal('show');
    }

    function confirmaDel(perfil_id,perfil)
        {
          
          swal({   
          title: "¿Confirmar?",   
          text: '¿Esta seguro de borrar el perfil : \"'+perfil+'\"?',
          type: "warning",   
          showCancelButton: true,   
          confirmButtonColor: "#DD6B55",   
          confirmButtonText: "Borrar",   
          cancelButtonText: "Cancelar",   
          closeOnConfirm: false,   
          closeOnCancel: false }, 
          function(isConfirm){   
            if (isConfirm) {     
                var formulario = $('#borraPerfilFrm'+perfil_id);
                    formulario.submit();  
            } else 
            {     
              swal.close();
            } 
          });
      }

    	//Aqui deben de ir las secciones adicionales
        $(function() {
          $('#perfiles-table').DataTable({
              processing: true,
              serverSide: true,
              ajax: '{!! url('datatable/perfiles') !!}',
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
                  { data: 'perfil', name: 'perfil' },                  
                  { data: 'action', name: 'action',orderable:false, searchable:false },
              ]
          });
      });

    </script>
@endsection