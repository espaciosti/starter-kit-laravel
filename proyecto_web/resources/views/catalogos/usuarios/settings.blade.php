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

                          <div class="col-md-8">
                                    <div class="panel panel-primary">
                                        <div class="panel-body">
                                            <h4 class="m-t-0 m-b-30">Perfil de usuario 
                                                    @if($usuario->photo)
                                                      <img src="{{ $usuario->photo }}" width="48px" class="img-circle">
                                                    @else
                                                        <img src="{{ url('assets/images/users/generic-user.png') }}" width="48px" class="img-circle">
                                                    @endif
                                            </h4>
                                            <p>Usted puede cambiar su nombre, contraseña y foto</p>
                                            <p>Ultima actualización : {{$usuario->updated_at->format('d/m/Y H:i') }}</p>
                                            @if (count($errors) > 0)
                                              <div class="alert alert-warning">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                              </div>
                                            @endif
                                            <form class="form-horizontal"  method="POST" action="{{url('updateuser/'.$usuario->id)}}" id="frm_usuarios" onsubmit="return validateFrm();" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            {{ method_field('PUT') }}
                                                <div class="form-group" id="inputname">
                                                    <label for="inputname" class="col-sm-3 control-label">Nombre completo</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Capture el nombre completo" valida="SI" cadena ="- Debe capturar el nombre completo" value="{{ $usuario->name }}">
                                                    </div>
                                                </div>

                                                <div class="form-group" id="inputemail">
                                                    <label for="inputemail" class="col-sm-3 control-label">Correo electronico</label>
                                                    <div class="col-sm-9">
                                                        {{ $usuario->email }}
                                                    </div>
                                                </div>

                                                <div class="form-group" id="inputpassword">
                                                    <label for="inputpassword" class="col-sm-3 control-label">Contraseña (si no desea cambiar, deje en blanco)</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control" id="password" name="password" placeholder="Capture su contraseña">
                                                    </div>
                                                </div>

                                                <div class="form-group" id="inputperfil_id">
                                                    <label for="inputperfil_id" class="col-sm-3 control-label">Perfil</label>
                                                    <div class="col-sm-9">                                                        
                                                        {{$usuario->perfiles->perfil}}                                                        
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="inputphoto" class="col-sm-3 control-label">Fotografia de perfil</label>
                                                    <div class="col-sm-9">
                                                        <input type="file" class="filestyle" data-buttonname="btn-primary" data-buttontext="Seleccione archivo" id="photo" name="photo" placeholder="Seleccione una imagen">
                                                    </div>
                                                </div>


                                                <div class="form-group m-b-0">
                                                    <div class="col-sm-offset-3 col-sm-9">
                                                        <a href="{{url('/')}}" class="btn btn-danger waves-effect waves-light">Cancelar</a>
                                                        <button type="submit" class="btn btn-info waves-effect waves-light">Actualizar</button>
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

         @if(session('type')=='success')
               <script>   
                  swal({
                    title:'Aviso!!',
                    text:'{{session('msg')}}',
                    type:'success',
                    timer: 3500,
                    confirmButtonColor:'green',
                    confirmButtonText:'OK'
                  });
               </script>
        @endif

        
    <script type="text/javascript">


    function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
    }

    function checkPassword(str)
    {
        var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
        return re.test(str);
    }
        function validateFrm()
            {
              var listv = 0;
              var msg = '';
              $('#frm_usuarios').find(':input').each(function() {                          
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

              if($('#password').val()!='')
              {
                if(!checkPassword($('#password').val()))
                {
                  msg+='- La contraseña es muy sencilla intente con al menos 7 caracteres y numeros \n';
                  listv=1;
                }
              }

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