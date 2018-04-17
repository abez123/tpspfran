<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use DB;
use Validator;
use Datatables;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;
use Illuminate\Support\Facades\Input;
use App\Models\Encuesta;
use App\Models\Asistencia;
use App\Models\Convocatoria;
use App\Models\Contacto;
use App\Models\Comite;
use App\Models\Organization;
use App\Models\Employee;
use App\Models\Upload;
use Mail;
use Carbon\Carbon;
use App\Models\Comite_User;
use App\Models\Blog;
use App\Models\Categoria;
use App\Models\Evento;
use App\Models\Patrocinador;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class ComiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }


    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function detail($id)
    {
        $comites = Comite::join('convocatorias','convocatorias.comite_id','=','comites.id')->where('convocatorias.id','=',$id)->select('convocatorias.*','comites.*')->get();
         $convocatoria_id=$id;
         $estatus = Asistencia::where('miembro_id',Auth::user()->id)->where('convocatoria_id','=',$id)->value('estatus');
         
            return view('comite-post',compact('comites','convocatoria_id','estatus'));
            
    }

    /**
     * Show the form for creating a new asistencia.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_from_email($id)
    {
        
         $comites = Comite::join('convocatorias','convocatorias.comite_id','=','comites.id')->where('convocatorias.id','=',$id)->select('convocatorias.*','comites.*')->get();
         $convocatoria_id=$id;
        
        return View('comite-post-asist',compact('convocatoria_id','comites'));
        
    }

   /**
     * Store a newly created asistencia in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
            $rules = Module::validateRules("Asistencias", $request);
            
            $validator = Validator::make($request->all(), $rules);
            
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            
            $insert_id = Module::insert("Asistencias", $request);
            $comites = Comite::join('convocatorias','convocatorias.comite_id','=','comites.id')->where('convocatorias.id',$request->convocatoria_id)->select(array('comites.*'))->get();
            $convocatoria= Convocatoria::find($request->convocatoria_id);
            $correo = Contacto::where('id',$request->miembro_id)->value('correo');
            $miembroname = Contacto::where('id',$request->miembro_id)->value('nombre');
            $miembro = $request->miembro_id;
            foreach($comites as $com){
            $coordinador = Employee::where('id',$com->coordinador)->value('email');
            $presidente = Employee::where('id',$com->presidente)->value('email');
            $vice = Employee::where('id',$com->vicepresidente)->value('email');
            $comite = $com->nombre; 
            }
           $imgs = Upload::find($convocatoria->temarioimagen);
            
           $logoexp = Upload::find($convocatoria->logoexpositor);

        $noticias = Blog::join('categorias','categorias.id','=','blogs.categoria_id')->select(array('blogs.*','categorias.nombrecat'))->where('categorias.nombrecat','Noticias')->orderBy('blogs.created_at','DESC')->limit(4)->get();
   
     $infografias = Blog::join('categorias','categorias.id','=','blogs.categoria_id')->select(array('blogs.*','categorias.nombrecat'))->where('categorias.nombrecat','Infografias')->orderBy('blogs.created_at','DESC')->limit(4)->get();
        $capsulas = Blog::join('categorias','categorias.id','=','blogs.categoria_id')->select(array('blogs.*','categorias.nombrecat'))->where('categorias.nombrecat','Capsulas de video')->orderBy('blogs.created_at','DESC')->limit(4)->get();
        $eventos = Evento::leftJoin('patrocinadores','patrocinadores.id','=','eventos.patrocinadores')->select(array('eventos.*','patrocinadores.nombrepatroc','patrocinadores.logopatroc'))->orderBy('eventos.fecha','DESC')->limit(4)->get();
 
                Mail::queue('emails.confirmacion_asistencia', array(
                            'asistencia_id' => $insert_id,
                            'comitename' => $comite,
                            'miembroname' => $miembroname,
                            'name' => $convocatoria->tituloconvactoria,
                            'horario' => $convocatoria->horario,
                            'sedenombre' => $convocatoria->sedenombre,
                            'sededomicilio' => $convocatoria->sededomicilio,
                            'preciosocio' => $convocatoria->preciosocio,
                            'precionosocio' => $convocatoria->precionosocio,
                            'temario' => $convocatoria->temario,
                            'temarioimagen' => $imgs,
                            'expositor' => $convocatoria->expositor,
                            'logoexpositor' => $logoexp,
                            'comentarios' => $convocatoria->comentarios,
                            'noticias' => $noticias,
                            'infografias' => $infografias,
                            'capsulas' => $capsulas,
                            'eventos' => $eventos
                           
                           

                        ), function($message) use ($correo,$coordinador,$comite)
                    {
                       $message->from($coordinador);
                       $message->to($correo)->subject('Confirmación de Asistencia del comité'.' '.$comite);
                       $message->replyTo($coordinador, 'Amcham Comité'.' '.$comite);
                      
                    });
        
            
            return redirect('front_comite/'.$convocatoria->id);
            
   
    }
        /**
     * Show the form for creating a new asistencia.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancel_from_email($id)
    {
        
     
       
        $asistencia=Asistencia::find($id);
        $convocatoria_id=$asistencia->convocatoria_id;
        $convocatoria=Convocatoria::find($convocatoria_id);
        $comites = Comite::join('convocatorias','convocatorias.comite_id','=','comites.id')->where('convocatorias.id','=',$convocatoria->id)->select('convocatorias.*','comites.*')->get();
      
       /*
        $date1 = date('Y-m-d H:i');
        $date2 = $convocatoria->horario;

        $diff = abs(strtotime($date1) -strtotime($date2));
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

        */
        $date1 = new \DateTime( date('Y-m-d H:i'));
        $date2 = new \DateTime($convocatoria->horario);
        $interval = $date1->diff($date2);
        $days = $interval->format('%r%a'); 
        $dayofweek =date('w', strtotime($convocatoria->horario));
        return View('comite-post-cancel',compact('asistencia','convocatoria_id','convocatoria','days','dayofweek','comites'));
        
    }

    /**
     * Update the specified asistencia in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $cancelar = Asistencia::find($id);
            $cancelar->miembro_id = $request->miembro_id;
            $cancelar->convocatoria_id = $request->convocatoria_id;
            $cancelar->estatus = $request->estatus;
            $cancelar->save();

            if($request->asistencia == true){
            $comites = Comite::join('convocatorias','convocatorias.comite_id','=','comites.id')->where('convocatorias.id',$request->convocatoria_id)->select(array('comites.*'))->get();
            $convocatoria= Convocatoria::find($request->convocatoria_id);
            $correo = Contacto::where('id',$request->miembro_id)->value('correo');
            $miembroname = Contacto::where('id',$request->miembro_id)->value('nombre');
            $miembro = $request->miembro_id;

            foreach($comites as $com){
            $coordinador = Employee::where('id',$com->coordinador)->value('email');
            $presidente = Employee::where('id',$com->presidente)->value('email');
            $vice = Employee::where('id',$com->vicepresidente)->value('email');
            $comite = $com->nombre; 
            }

         
           
                Mail::queue('emails.encuesta', array(
                            'convocatoria_id' =>$request->convocatoria_id,
                            'comitename' => $comite,
                            'miembroname' => $miembroname,
                            'name' => $convocatoria->tituloconvactoria,
                            'horario' => $convocatoria->horario,
                 
                        ), function($message) use ($correo,$coordinador,$comite)
                    {
                       $message->from($coordinador);
                       $message->to($correo)->subject('Encuesta del comité'.' '.$comite);
                       $message->replyTo($coordinador, 'Amcham Comité'.' '.$comite);
                      
                    });
            }

            if($request->estatus == 'Cancelada' ||$request->estatus == 'Cancelada con cobre'){
                $comites = Comite::join('convocatorias','convocatorias.comite_id','=','comites.id')->where('convocatorias.id',$request->convocatoria_id)->select(array('comites.*'))->get();
            $convocatoria= Convocatoria::find($request->convocatoria_id);
            $correo = Contacto::where('id',$request->miembro_id)->value('correo');
            $miembroname = Contacto::where('id',$request->miembro_id)->value('nombre');
            $miembro = $request->miembro_id;

            foreach($comites as $com){
            $coordinador = Employee::where('id',$com->coordinador)->value('email');
             $coordinador_name = Employee::where('id',$com->coordinador)->value('name');
            $presidente = Employee::where('id',$com->presidente)->value('email');
            $vice = Employee::where('id',$com->vicepresidente)->value('email');
            $comite = $com->nombre; 
            }

           $imgs = Upload::find($convocatoria->temarioimagen);
            
           $logoexp = Upload::find($convocatoria->logoexpositor);
           
                Mail::queue('emails.confirmacion_cancelacion', array(
                            'asistencia_id' => $id,
                            'comitename' => $comite,
                            'miembroname' => $miembroname,
                            'name' => $convocatoria->tituloconvactoria,
                            'horario' => $convocatoria->horario,
                            'sedenombre' => $convocatoria->sedenombre,
                            'sededomicilio' => $convocatoria->sededomicilio,
                            'preciosocio' => $convocatoria->preciosocio,
                            'precionosocio' => $convocatoria->precionosocio,
                            'temario' => $convocatoria->temario,
                            'temarioimagen' => $imgs,
                            'expositor' => $convocatoria->expositor,
                            'logoexpositor' => $logoexp,
                            'comentarios' => $convocatoria->comentarios,
                            'coordinador_name' => $coordinador_name
                        ), function($message) use ($correo,$coordinador,$comite)
                    {
                       $message->from($coordinador);
                       $message->to($correo)->subject('Confirmación de Cancelación del comité'.' '.$comite);
                       $message->replyTo($coordinador, 'Amcham Comité'.' '.$comite);
                      
                    });
            }

            return redirect('front_comite/'.$convocatoria->id);
            
            
      
    }


        /**
     * Show the form for creating a new encuesta.
     *
     * @return \Illuminate\Http\Response
     */
    public function encuesta_from_email($id)
    {
        
        $convocatoria_id=$id;

        
            return View('encuesta', [
                
                'convocatoria_id' => $convocatoria_id

            ]);
       
        
        
    }

    /**
     * Store a newly created encuesta in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_encuesta(Request $request)
    {
 $socios = Contacto::where('contactos.id',Auth::user()->context_id)->select(array('contactos.*'))->get();    
         
       
        $comites = Comite::leftJoin('convocatorias','convocatorias.comite_id','=','comites.id')->select('convocatorias.id as idcon','convocatorias.tituloconvactoria','convocatorias.horario','comites.*')->get();     



        $noticias = Blog::join('categorias','categorias.id','=','blogs.categoria_id')->select(array('blogs.*','categorias.nombrecat'))->where('categorias.nombrecat','Noticias')->orderBy('blogs.created_at','DESC')->paginate(4);

        $infografias = Blog::join('categorias','categorias.id','=','blogs.categoria_id')->select(array('blogs.*','categorias.nombrecat'))->where('categorias.nombrecat','Infografias')->orderBy('blogs.created_at','DESC')->paginate(4);
        $capsulas = Blog::join('categorias','categorias.id','=','blogs.categoria_id')->select(array('blogs.*','categorias.nombrecat'))->where('categorias.nombrecat','Capsulas de video')->orderBy('blogs.created_at','DESC')->paginate(4);
        $eventos = Evento::leftJoin('patrocinadores','patrocinadores.id','=','eventos.patrocinadores')->select(array('eventos.*','patrocinadores.nombrepatroc','patrocinadores.logopatroc'))->orderBy('eventos.fecha','DESC')->paginate(4);
        if(Module::hasAccess("Encuestas", "create")) {
        
            $rules = Module::validateRules("Encuestas", $request);
            
            $validator = Validator::make($request->all(), $rules);
            
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            
            $insert_id = Module::insert("Encuestas", $request);
            
           
            return view('user-profile',compact('socios','comites','blogs','eventos','noticias','infografias','capsulas'));
            
        } else {
            return redirect('/');
        }
    }

}