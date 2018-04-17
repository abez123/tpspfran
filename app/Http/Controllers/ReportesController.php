<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use DB;
use Validator;
use Datatables;
use Collective\Html\FormFacade as Form;
use Dwij\Laraadmin\Models\Module;
use Dwij\Laraadmin\Models\ModuleFields;
use App\Models\Franquiciatario;
use App\Models\Reporte;
use App\Models\Cita;
class ReportesController extends Controller
{
    public $show_action = true;
    public $view_col = 'nombrereporte';
    public $listing_cols = ['id', 'sucursal_id','nombrereporte','archivorep', 'mes'];
    
    public function __construct() {
        // Field Access of Listing Columns
        if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
            $this->middleware(function ($request, $next) {
                $this->listing_cols = ModuleFields::listingColumnAccessScan('Reportes', $this->listing_cols);
                return $next($request);
            });
        } else {
            $this->listing_cols = ModuleFields::listingColumnAccessScan('Reportes', $this->listing_cols);
        }
    }
    
    /**
     * Display a listing of the Reportes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 

        $franquiciatarios = Franquiciatario::join('users','users.context_id','=','franquiciatarios.id')->where('franquiciatarios.id',Auth::user()->context_id)->where('users.type','FRANQUICIATARIO')->select(array('franquiciatarios.*'))->whereNull('franquiciatarios.deleted_at')->get();  


        foreach($franquiciatarios as $franquiciatario){
        $proper1 = $franquiciatario->sucursal;          

          
    }
          $prop2 = str_replace('"', ' ', $proper1);
          $miems = json_decode($prop2); 

        $module = Module::get('Reportes');

       $citasasigandas = DB::table('citas')->join('clientes','clientes.id','=','citas.cliente_id')->join('sucursals','sucursals.id','=','citas.sucursal_id')->join('servicios','servicios.id','=','citas.servicio_id')->join('pedicuristas','pedicuristas.id','=','citas.pedicurista_id')->select(array('citas.id','clientes.nombrecompleto','sucursals.nombresuc','servicios.nombreservicio','pedicuristas.nombrecompletoped','citas.fechaservicio','citas.hora','citas.estatus','citas.cortesia'))->whereNull('citas.deleted_at')->whereIN('sucursals.id',$miems)->where('citas.estatus','Asignada')->count();

       $citascancladas = DB::table('citas')->join('clientes','clientes.id','=','citas.cliente_id')->join('sucursals','sucursals.id','=','citas.sucursal_id')->join('servicios','servicios.id','=','citas.servicio_id')->join('pedicuristas','pedicuristas.id','=','citas.pedicurista_id')->select(array('citas.id','clientes.nombrecompleto','sucursals.nombresuc','servicios.nombreservicio','pedicuristas.nombrecompletoped','citas.fechaservicio','citas.hora','citas.estatus','citas.cortesia'))->whereNull('citas.deleted_at')->whereIN('sucursals.id',$miems)->where('citas.estatus','Cancelada')->count();

       $citaspagadas = DB::table('citas')->join('clientes','clientes.id','=','citas.cliente_id')->join('sucursals','sucursals.id','=','citas.sucursal_id')->join('servicios','servicios.id','=','citas.servicio_id')->join('pedicuristas','pedicuristas.id','=','citas.pedicurista_id')->select(array('citas.id','clientes.nombrecompleto','sucursals.nombresuc','servicios.nombreservicio','pedicuristas.nombrecompletoped','citas.fechaservicio','citas.hora','citas.estatus','citas.cortesia'))->whereNull('citas.deleted_at')->whereIN('sucursals.id',$miems)->where('citas.estatus','Pagada')->count();

       $citasconfirmadas = DB::table('citas')->join('clientes','clientes.id','=','citas.cliente_id')->join('sucursals','sucursals.id','=','citas.sucursal_id')->join('servicios','servicios.id','=','citas.servicio_id')->join('pedicuristas','pedicuristas.id','=','citas.pedicurista_id')->select(array('citas.id','clientes.nombrecompleto','sucursals.nombresuc','servicios.nombreservicio','pedicuristas.nombrecompletoped','citas.fechaservicio','citas.hora','citas.estatus','citas.cortesia'))->whereNull('citas.deleted_at')->whereIN('sucursals.id',$miems)->where('citas.estatus','Confirmada')->count();

        $citasnoshows = DB::table('citas')->join('clientes','clientes.id','=','citas.cliente_id')->join('sucursals','sucursals.id','=','citas.sucursal_id')->join('servicios','servicios.id','=','citas.servicio_id')->join('pedicuristas','pedicuristas.id','=','citas.pedicurista_id')->select(array('citas.id','clientes.nombrecompleto','sucursals.nombresuc','servicios.nombreservicio','pedicuristas.nombrecompletoped','citas.fechaservicio','citas.hora','citas.estatus','citas.cortesia'))->whereNull('citas.deleted_at')->whereIN('sucursals.id',$miems)->where('citas.estatus','No Show')->count();
        
        if(Module::hasAccess($module->id)) {
            return View('reportes', [
                'show_actions' => $this->show_action,
                'listing_cols' => $this->listing_cols,
                'module' => $module,
                 'citasasigandas'=> $citasasigandas,
                'citascancladas'=> $citascancladas,
                'citaspagadas'=> $citaspagadas,
                'citasconfirmadas'=> $citasconfirmadas,
                'citasnoshows'=> $citasnoshows
            ]);
        } else {
            return redirect("/");
        }
    }

    /**
     * Show the form for creating a new reporte.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created reporte in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified reporte.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Module::hasAccess("Reportes", "view")) {
            
            $reporte = Reporte::find($id);
            if(isset($reporte->id)) {
                $module = Module::get('Reportes');
                $module->row = $reporte;
                
                return view('reporte_show', [
                    'module' => $module,
                    'view_col' => $this->view_col,
                    'no_header' => true,
                    'no_padding' => "no-padding"
                ])->with('reporte', $reporte);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("reporte"),
                ]);
            }
        } else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
    }

    /**
     * Show the form for editing the specified reporte.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified reporte in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified reporte from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }
    
    /**
     * Datatable Ajax fetch
     *
     * @return
     */
    public function dtajax()
    {

         $franquiciatarios=Franquiciatario::join('users','users.context_id','=','franquiciatarios.id')->where('franquiciatarios.id','=',Auth::user()->context_id)->where('users.type','=','FRANQUICIATARIO')->select(array('franquiciatarios.sucursal'))->get();
    foreach($franquiciatarios as $franquiciatario){
        $proper1 = $franquiciatario->sucursal;          

          
    }
          $prop2 = str_replace('"', ' ', $proper1);
          $miems = json_decode($prop2); 
        $values = DB::table('reportes')->join('sucursals','sucursals.id','=','reportes.sucursal_id')->whereIN('reportes.sucursal_id',$miems)->select(array('reportes.id','sucursals.nombresuc','reportes.nombrereporte','reportes.archivorep','reportes.mes'))->whereNull('reportes.deleted_at');
        $out = Datatables::of($values)->make()
            ;
        $data = $out->getData();

        $fields_popup = ModuleFields::getModuleFields('Reportes');
        
        for($i=0; $i < count($data->data); $i++) {
            for ($j=0; $j < count($this->listing_cols); $j++) { 
                $col = $this->listing_cols[$j];
  
                if($col == $this->view_col) {
                 
                $img = \App\Models\Upload::find($data->data[$i][3]);
                      
                    
               $data->data[$i][$j] = '<a href="'.url($img->path()).'">'.$data->data[$i][$j] .'</a>';
                   
                   
              
              
            }
        }
            
        
        }
        $out->setData($data);
        return $out;
    }
}
