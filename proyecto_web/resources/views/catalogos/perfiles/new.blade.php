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

                          <div class="col-md-6">
                                    <div class="panel panel-primary">
                                        <div class="panel-body">
                                            <h4 class="m-t-0 m-b-30">Crear nuevo perfil</h4>
                                            <form class="form-horizontal"  method="POST" action="{{url('perfiles')}}" id="frm_perfiles" onsubmit="return validateFrm();">
                                            {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-3 control-label">Nombre del Perfil</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="perfil" name="perfil" placeholder="Capture el nombre del perfil" valida="SI" cadena ="- Debe capturar el nombre del perfil" value="{{ old('perfil') }}">
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="form-group m-b-0">
                                                    <div class="col-sm-offset-3 col-sm-9">
                                                        <a href="{{url('perfiles')}}" class="btn btn-danger waves-effect waves-light">Regresar</a>
                                                        <button type="submit" class="btn btn-info waves-effect waves-light">Grabar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> <!-- panel-body -->
                                    </div> <!-- panel -->
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
    @if (session('type')=='error')            
            <script>
                

                swal({
                    title:'Aviso!!',
                    text:'{{session('msg')}}',
                    type:'error',
                    timer: 5500,
                    confirmButtonColor:'red',
                    confirmButtonText:'OK'
                  });
            </script>
        @endif

        
    <script type="text/javascript">
        function validateFrm()
            {
              var listv = 0;
              var msg = '';
              $('#frm_perfiles').find(':input').each(function() {                          
              if($(this).attr("valida")=="SI" && ($(this).val()==""||$(this).val()=="null"))
              {
                  listv=1;
                  $('#input'+this.id).addClass('has-error');
                  msg+=$(this).attr('cadena')+'\n';
                  
                  //$(this).val($(this).val().toUpperCase());
                }else
                {
                  $('#input'+this.id).removeClass('has-error');
                  if($(this).attr("valida")=="SI")
                  {
                      //$(this).val($(this).val().toUpperCase());
                  }                  
                }
              
                });

              if(listv==1)
              {
                swal({
                    title:'Aviso!!',
                    text:msg,
                    type:'error',
                    timer: 4000,
                    confirmButtonColor:'red',
                    confirmButtonText:'OK'
                  });
                return false;
              }else{
                return true;
              }
            }
       
    </script>
	
@endsection