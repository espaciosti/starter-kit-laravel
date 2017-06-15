<?php
/*
* File          Util.php
* Autor         Dante Robles
* Description   Clase con funciones de ayuda
* Fecha         01/Junio/2017
*/
namespace App\Support;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Token;
use App\Models\Menu;
use App\Models\Profile;
use App\Models\ProfileMenu;
use DB;
use Auth;

class Util {


    /*Generador de Passwords*/
	public static function genera_password($longitud=10) {
		$str = "*abcdef1234567890ABCDEF!";
		
		$cadena = "";
		for($i=0;$i<$longitud;$i++) {
			$cadena .= substr($str,rand(0,24),1);
		}
	return $cadena;
	}

    /*Generador de Token Stateless*/
	public static function crea_token()
    {
        $inicial = time();
        $segundos = (integer)env('API_TIME',1800);       
        $final = $inicial + $segundos;
        $token = sha1(uniqid(rand(), true));
            $rs = [];
            $rs['expire'] = $final;
            $rs['token']  = $token;
        return $rs;
    }

    /*Respuestas API RESTful*/
    public static function creaRest($httpCode=200,$data = [],$error=false,$msg="")
    {
    	$rest = [];
    	$rest['error'] 		= $error;
    	$rest['message'] 	= $msg;
    	$rest['status'] 	= $httpCode;
    	$rest['data']		= $data;   	
            $respuesta = response()->json($rest,$httpCode,[],JSON_UNESCAPED_UNICODE|JSON_NUMERIC_CHECK|JSON_PRETTY_PRINT);
            $respuesta->header('Content-Type','application/json; charset=utf-8');
    	return $respuesta;
    }

    /*Funciones para manejo de Token Stateless*/

    //Funcion para verificar si el Token es valido
    public static function verificaToken($token)
    {        
        $tiempo = time();
        $datos = Token::where('token',$token)->where('expire','>',$tiempo)->first();        
            if ($datos==null) {
                return false;
            } else {
                return true;
            }
    }

    //Funcion para devolver el id del Usuario dependiendo del token
    public static function find_id_by_token($token)
    {        
        try {           
            $eltoken = Token::where('token',$token)->first();
            $usuario_id = $eltoken->user_id;
        } catch (Exception $e) {
            $usuario_id = 0;
        }
        return $usuario_id;
    }

    public static function generateMenu($profile_id)
    {

        
        $active = request()->path();

    $renderMenu='<ul>';
    $items=DB::table('perfil_menus')
                    ->join('menus','perfil_menus.menu_id','=','menus.id')
                    ->select('perfil_menus.menu_id','menus.menu','menus.parent','menus.active','menus.icon','menus.url','menus.id')
                    ->where('perfil_menus.perfil_id','=',$profile_id)
                    ->where('menus.parent','=',0)
                    ->where('menus.active','=',1)
                    ->orderBy('menus.order')
                    ->get();
          
          $renderMenu.=' <li><a href="'.url('/').'" class="waves-effect"><i class="ti-home"></i><span> Inicio </span></a></li>';

    foreach ($items as $value) {
        
        $subitem=DB::table('perfil_menus')
                    ->join('menus','perfil_menus.menu_id','=','menus.id')
                    ->select('perfil_menus.menu_id','menus.menu','menus.parent','menus.active','menus.icon','menus.url','menus.id')
                    ->where('perfil_menus.perfil_id','=',$profile_id)
                    ->where('menus.parent','=',$value->id)
                    ->where('menus.active','=',1)
                    ->orderBy('menus.order')
                    ->get();

                    if(count($subitem)==0){

                            /*if(trim($active)==trim($value->url))
                            {
                                $claseActive="has_sub nav-active";
                            }else{
                                $claseActive="has_sub";
                            }*/
                        $renderMenu.='<li>
                                        <a href="'.url($value->url).'" class="waves-effect">
                                          <i class="'.$value->icon.'"></i>                                          
                                          <span>'.$value->menu.'</span>
                                        </a>
                                      </li>';
                        
                    }else{

                        $renderMenu.='<li class="has_sub">
                                        <a class="wave-effect" href="'.url($value->url).'">
                                          <i class="'.$value->icon.'"></i>                                           
                                          <span>'.$value->menu.'</span>
                                          <span class="pull-right"><i class="mdi mdi-chevron-right"></i></span>
                                        </a>
                                        <ul class="list-unstyled">';
                       
                        foreach($subitem as $valor){        

                            /*if($active==$valor->url)
                            {
                                $claseActive="has_sub nav-active";
                            }else{
                                $claseActive="";
                            }*/

                            $renderMenu.='<li>
                                            <a href="'.url($valor->url).'">
                                              <i class="'.$valor->icon.'"></i>                                           
                                              <span>'.$valor->menu.'</span>
                                            </a>
                                          </li> ';
                        }

                        $renderMenu.='</ul>';

                        $renderMenu.='<li><a href="'.route('logout').'" onclick="event.preventDefault();document.getElementById(\'logout-form\').submit();" class="waves-effect"><i class="mdi mdi-logout "></i><span> Terminar sesión </span></a><form id="logout-form" action="'.route('logout').'" method="POST" style="display: none;">'.csrf_field().'</form></li>';
                        $renderMenu.='</li>';
            
                    }

    }

    $renderMenu.='</ul>';

    return $renderMenu;
    }


    public static function evaluaMenu($menu)
    {
        $profile_id = Auth::user()->perfil_id;

        //Obtener todos los menus del usuario en base al perfil
        $listaMenu=DB::table('perfil_menus')
                    ->join('menus','perfil_menus.menu_id','=','menus.id')
                    ->select('perfil_menus.menu_id','menus.menu','menus.parent','menus.active','menus.icon','menus.url','menus.id')
                    ->where('perfil_menus.perfil_id','=',$profile_id)                    
                    ->where('menus.active','=',1)
                    ->orderBy('menus.order')
                    ->get();

                   


        foreach ($listaMenu as $menuPerfil) {
            
            if($menuPerfil->url==$menu)
            {
                $menuValido = true;
                break;
            }else{
                $menuValido = false;
            }
        }

        return $menuValido;
    }

    public static function regresaRutasValidas()
    {
        $profile_id = Auth::user()->perfil_id;

        //Obtener todos los menus del usuario en base al perfil
        $listaMenu=DB::table('perfil_menus')
                    ->join('menus','perfil_menus.menu_id','=','menus.id')
                    ->select('perfil_menus.menu_id','menus.menu','menus.parent','menus.active','menus.icon','menus.url','menus.id')
                    ->where('perfil_menus.perfil_id','=',$profile_id)                    
                    ->where('menus.active','=',1)
                    ->orderBy('menus.order')
                    ->get();

                   

        $data = collect('#');

        foreach ($listaMenu as $menuPerfil) {
            
            if($menuPerfil->url=='#')
            {

            }else{
                $data->push($menuPerfil->url);    
            }
            
            
        }

        return $data;
    }

}
