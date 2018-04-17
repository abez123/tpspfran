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
use Dwij\Laraadmin\Models\LAConfigs;
use Dwij\Laraadmin\Helpers\LAHelper;
use Illuminate\Support\Facades\Input;
use App\Models\Encuesta;
use App\Models\Cita;
use App\Models\Franquiciatario;
use App\Models\Cuenta;
use App\Models\Cliente;
use App\Models\Documento;
use App\Models\Employee;
use App\Models\FacturaXML;
use App\Models\Pedicurista;
use App\Models\Producto;
use App\Models\Evento;
use App\Models\Sucursal;
use App\Models\Servicio;
use App\Models\Horario;
use App\User;
use App\Models\Upload;
use Mail;
use Carbon\Carbon;
use App\Models\EncuestaISF;
use App\Models\Enlace;


/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class UserProfileController extends Controller
{

     public $show_action = true;
    public $view_col = 'cliente_id';
    public $listing_cols = ['id', 'cliente_id', 'sucursal_id', 'servicio_id', 'pedicurista_id', 'fechaservicio','hora','estatus','cortesia'];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         // Field Access of Listing Columns
        if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
            $this->middleware(function ($request, $next) {
                $this->listing_cols = ModuleFields::listingColumnAccessScan('Citas', $this->listing_cols);
                return $next($request);
            });
        } else {
            $this->listing_cols = ModuleFields::listingColumnAccessScan('Citas', $this->listing_cols);
        }
    }

    
    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {            

        $module = Module::get('Citas');
        $clientes= Cliente::all();
        $cliente='';
      
        $sucursal = '';
        $servicios= Servicio::all();
        $servicio = '';
        $horarios = Horario::all();
        $horario = '';
       
           
      $encuesta=EncuestaISF::all();

        $franquiciatarios = Franquiciatario::join('users','users.context_id','=','franquiciatarios.id')->where('franquiciatarios.id',Auth::user()->context_id)->where('users.type','FRANQUICIATARIO')->select(array('franquiciatarios.*'))->whereNull('franquiciatarios.deleted_at')->get();    
        $franquiciatariorfc = Franquiciatario::join('users','users.context_id','=','franquiciatarios.id')->where('franquiciatarios.id',Auth::user()->context_id)->where('users.type','FRANQUICIATARIO')->select(array('franquiciatarios.rfc'))->whereNull('franquiciatarios.deleted_at')->value('rfc');    
         
        $facturasxmls = FacturaXML::join('franquiciatarios','franquiciatarios.rfc','=','facturaxmls.rfc')->join('users','users.context_id','=','franquiciatarios.id')->where('franquiciatarios.rfc','=',$franquiciatariorfc)->select(array('facturaxmls.*'))->whereNull('facturaxmls.deleted_at')->groupBy('facturaxmls.id')->paginate(4);

         $xmlsfiles = FacturaXML::join('franquiciatarios','franquiciatarios.rfc','=','facturaxmls.rfc')->join('users','users.context_id','=','franquiciatarios.id')->where('franquiciatarios.rfc','=',$franquiciatariorfc)->select(array('facturaxmls.*'))->whereNull('facturaxmls.deleted_at')->value('xml');

          $pdfsfiles = FacturaXML::join('franquiciatarios','franquiciatarios.rfc','=','facturaxmls.rfc')->join('users','users.context_id','=','franquiciatarios.id')->where('franquiciatarios.rfc','=',$franquiciatariorfc)->select(array('facturaxmls.*'))->whereNull('facturaxmls.deleted_at')->value('pdf');

       
              $xmlsfile= Upload::find($xmlsfiles); 
              if($xmlsfile){
                $xmls=$xmlsfile->path();
              }else{
                $xmls='Sin Archivo';
              }


              $pdfsfile= Upload::find($pdfsfiles);
            
              if($pdfsfile){
                $pdfs=$pdfsfile->path();
              }else{
                $pdfs='Sin Archivo';
              }
     
      

          //Docuemntos
      

        $adecuacionsucursalinteriors = Documento::where('conceptodocu','=','Adecuación de Sucursal: Interior')->select(array('documentos.*'))->orderBy('documentos.nombredocu','DESC')->whereNull('documentos.deleted_at')->get();

        $adecuacionsucursalexteriors = Documento::where('conceptodocu','=','Adecuación de Sucursal: Exterior')->select(array('documentos.*'))->orderBy('documentos.nombredocu','DESC')->whereNull('documentos.deleted_at')->get();

        $impresos = Documento::where('conceptodocu','=','Impresos')->select(array('documentos.*'))->orderBy('documentos.nombredocu','DESC')->whereNull('documentos.deleted_at')->get();

        $videopantallas = Documento::where('conceptodocu','=','Videos para Pantallas')->select(array('documentos.*'))->orderBy('documentos.nombredocu','DESC')->whereNull('documentos.deleted_at')->get();

       // $eventos = Evento::leftJoin('patrocinadores','patrocinadores.id','=','eventos.patrocinadores')->select(array('eventos.*','patrocinadores.nombrepatroc','patrocinadores.logopatroc'))->orderBy('eventos.fecha','DESC')->paginate(4);

    foreach($franquiciatarios as $franquiciatario){
        $name=$franquiciatario->nombrecompletofran;
        $email=$franquiciatario->correofran;
        $proper1 = $franquiciatario->sucursal;          

          
    }
          $prop2 = str_replace('"', ' ', $proper1);
          $miems = json_decode($prop2); 

      $sucursales= Sucursal::whereIN('sucursals.id',$miems)->select(array('sucursals.id','sucursals.nombresuc'))->get();
      foreach ($sucursales as $sucursal) {
        $suc=$sucursal->id;
      }

      $sucursalescnt= Sucursal::whereIN('sucursals.id',$miems)->select(array('sucursals.id','sucursals.nombresuc'))->count();
      $pedicuristas= Pedicurista::where('pedicuristas.sucursal_id',$suc)->select(array('pedicuristas.id','pedicuristas.nombrecompletoped'))->get();
      $pedicuristascnt= Pedicurista::where('pedicuristas.sucursal_id',$suc)->select(array('pedicuristas.id','pedicuristas.nombrecompletoped'))->count();

       $citasasigandas = DB::table('citas')->join('clientes','clientes.id','=','citas.cliente_id')->join('sucursals','sucursals.id','=','citas.sucursal_id')->join('servicios','servicios.id','=','citas.servicio_id')->join('pedicuristas','pedicuristas.id','=','citas.pedicurista_id')->select(array('citas.id','clientes.nombrecompleto','sucursals.nombresuc','servicios.nombreservicio','pedicuristas.nombrecompletoped','citas.fechaservicio','citas.hora','citas.estatus','citas.cortesia'))->whereNull('citas.deleted_at')->whereIN('sucursals.id',$miems)->where('citas.estatus','Asignada')->count();

       $citascancladas = DB::table('citas')->join('clientes','clientes.id','=','citas.cliente_id')->join('sucursals','sucursals.id','=','citas.sucursal_id')->join('servicios','servicios.id','=','citas.servicio_id')->join('pedicuristas','pedicuristas.id','=','citas.pedicurista_id')->select(array('citas.id','clientes.nombrecompleto','sucursals.nombresuc','servicios.nombreservicio','pedicuristas.nombrecompletoped','citas.fechaservicio','citas.hora','citas.estatus','citas.cortesia'))->whereNull('citas.deleted_at')->whereIN('sucursals.id',$miems)->where('citas.estatus','Cancelada')->count();

       $citaspagadas = DB::table('citas')->join('clientes','clientes.id','=','citas.cliente_id')->join('sucursals','sucursals.id','=','citas.sucursal_id')->join('servicios','servicios.id','=','citas.servicio_id')->join('pedicuristas','pedicuristas.id','=','citas.pedicurista_id')->select(array('citas.id','clientes.nombrecompleto','sucursals.nombresuc','servicios.nombreservicio','pedicuristas.nombrecompletoped','citas.fechaservicio','citas.hora','citas.estatus','citas.cortesia'))->whereNull('citas.deleted_at')->whereIN('sucursals.id',$miems)->where('citas.estatus','Pagada')->count();

       $citasconfirmadas = DB::table('citas')->join('clientes','clientes.id','=','citas.cliente_id')->join('sucursals','sucursals.id','=','citas.sucursal_id')->join('servicios','servicios.id','=','citas.servicio_id')->join('pedicuristas','pedicuristas.id','=','citas.pedicurista_id')->select(array('citas.id','clientes.nombrecompleto','sucursals.nombresuc','servicios.nombreservicio','pedicuristas.nombrecompletoped','citas.fechaservicio','citas.hora','citas.estatus','citas.cortesia'))->whereNull('citas.deleted_at')->whereIN('sucursals.id',$miems)->where('citas.estatus','Confirmada')->count();

        $citasnoshows = DB::table('citas')->join('clientes','clientes.id','=','citas.cliente_id')->join('sucursals','sucursals.id','=','citas.sucursal_id')->join('servicios','servicios.id','=','citas.servicio_id')->join('pedicuristas','pedicuristas.id','=','citas.pedicurista_id')->select(array('citas.id','clientes.nombrecompleto','sucursals.nombresuc','servicios.nombreservicio','pedicuristas.nombrecompletoped','citas.fechaservicio','citas.hora','citas.estatus','citas.cortesia'))->whereNull('citas.deleted_at')->whereIN('sucursals.id',$miems)->where('citas.estatus','No Show')->count();

        $enlaces=Enlace::paginate(8);
      


    return View('user-profile', [
                'show_actions' => $this->show_action,
                'listing_cols' => $this->listing_cols,
                'module' => $module,
                'clientes' => $clientes,
                'cliente' => $cliente,
                'sucursales' => $sucursales,
                'sucursal' => $sucursal,
                'servicios' => $servicios,
                'servicio' => $servicio,
                'horarios' => $horarios,
                'horario' => $horario,
                'franquiciatarios'=> $franquiciatarios,
                'facturasxmls'=> $facturasxmls,
                'adecuacionsucursalinteriors'=> $adecuacionsucursalinteriors,
                'adecuacionsucursalexteriors'=> $adecuacionsucursalexteriors,
                'impresos'=> $impresos,
                'videopantallas'=> $videopantallas,
                'xmls'=> $xmls,
                'pdfs'=> $pdfs,
                'pedicuristas'=> $pedicuristas,
                'pedicuristascnt'=> $pedicuristascnt,
                'citasasigandas'=> $citasasigandas,
                'citascancladas'=> $citascancladas,
                'citaspagadas'=> $citaspagadas,
                'citasconfirmadas'=> $citasconfirmadas,
                'citasnoshows'=> $citasnoshows,
                'sucursalescnt'=> $sucursalescnt,
                'encuesta'=> $encuesta,
                'enlaces'=> $enlaces,
                'name'=> $name,
                'email'=> $email
            ]);
			
			
    }

    public function dashboard()
    {
      return view('user-dashboard');
    }


    public function company()
    {
      return view('profile_company');
    }
    

}