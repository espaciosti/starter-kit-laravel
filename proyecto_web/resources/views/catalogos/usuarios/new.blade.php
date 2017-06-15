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
                                            <h4 class="m-t-0 m-b-30">Crear nuevo usuario</h4>
                                            @if (count($errors) > 0)
                                              <div class="alert alert-warning">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                              </div>
                                            @endif
                                            <form class="form-horizontal"  method="POST" action="{{url('usuarios')}}" id="frm_usuarios" onsubmit="return validateFrm();" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                                <div class="form-group" id="inputname">
                                                    <label for="inputname" class="col-sm-3 control-label">Nombre completo</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Capture el nombre completo" valida="SI" cadena ="- Debe capturar el nombre completo" value="{{ old('name') }}">
                                                    </div>
                                                </div>

                                                <div class="form-group" id="inputemail">
                                                    <label for="inputemail" class="col-sm-3 control-label">Correo electronico</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" id="email" name="email" placeholder="Capture el e-mail" valida="SI" cadena ="- Debe capturar el email del usuario" value="{{ old('email') }}">
                                                    </div>
                                                </div>

                                                <div class="form-group" id="inputpassword">
                                                    <label for="inputpassword" class="col-sm-3 control-label">Contraseña</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control" id="password" name="password" placeholder="Capture su contraseña" valida="SI" cadena ="- Debe capturar la contraseña del usuario" value="{{ old('password') }}">
                                                    </div>
                                                </div>

                                                <div class="form-group" id="inputpassword-confirm">
                                                    <label for="inputpassword-confirm" class="col-sm-3 control-label">Confirmar contraseña</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control" id="password-confirm" name="password-confirm" placeholder="Confirme su contraseña" valida="SI" cadena ="- Debe confirmar la contraseña del usuario" value="{{ old('password-confirm') }}">
                                                    </div>
                                                </div>

                                                <div class="form-group" id="inputperfil_id">
                                                    <label for="inputperfil_id" class="col-sm-3 control-label">Perfil</label>
                                                    <div class="col-sm-9">
                                                        <select id="perfil_id" class="form-control" name="perfil_id" valida="SI" cadena="- Debe seleccionar un perfil para asignarlo al usuario">
                                                          <option value="null">Seleccione</option>
                                                          @foreach($perfiles as $key => $value)
                                                            <option value="{{$value->id}}">{{$value->perfil}}</option>
                                                          @endforeach
                                                        </select>
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
                                                        <a href="{{url('usuarios')}}" class="btn btn-danger waves-effect waves-light">Regresar</a>
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

              if($('#password').val()!=$('#password-confirm').val())
              {
                msg+='- Las contraseñas no coinciden favor de revisar\n';
                listv=1;
              }else{
                if(!checkPassword($('#password').val()))
                {
                  msg+='- La contraseña es muy sencilla intente con al menos 7 caracteres y numeros \n';
                  listv=1;
                }
              }

              if(!IsEmail($('#email').val()))
              {
                msg+='- El correo no es valido \n';
                listv=1;
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