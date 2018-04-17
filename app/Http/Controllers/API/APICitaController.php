<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers\API;

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
use Illuminate\Support\Facades\Input;
use App\Models\Cita;
use App\Models\Cliente;
use App\Models\Pedicurista;
use App\Models\Sucursal;
use App\Models\Servicio;
use App\Models\Horario;
use Response;
use Nexmo\Laravel\Facade\Nexmo;
use Carbon\Carbon;
class APICitaController extends Controller
{
	public $show_action = true;
	public $view_col = 'cliente_id';
	public $listing_cols = ['id', 'cliente_id', 'sucursal_id', 'servicio_id', 'pedicurista_id', 'fechaservicio','hora','estatus'];
	
	public function __construct() {
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
	 * Display a listing of the Citas.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('Citas');
		$clientes= Cliente::all();
		$cliente='';
		$sucursales= Sucursal::all();
		$sucursal = '';
		$servicios= Servicio::all();
		$servicio = '';
		$horarios = Horario::all();
		$horario = '';
		if(Module::hasAccess($module->id)) {
			return View('la.citas.index', [
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
				'horario' => $horario
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}

	/**
	 * Display a listing of the Citas.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function createcita()
	{
		$module = Module::get('Citas');
		$clientes= Cliente::all();
		$cliente='';
		$sucursales= Sucursal::all();
		$sucursal = '';
		$servicios= Servicio::all();
		$servicio = '';
		$horarios = Horario::all();
		$horario = '';
		if(Module::hasAccess($module->id)) {
			return View('la.citas.create', [
			
				'module' => $module,
				'clientes' => $clientes,
				'cliente' => $cliente,
				'sucursales' => $sucursales,
				'sucursal' => $sucursal,
				'servicios' => $servicios,
				'servicio' => $servicio,
				'horarios' => $horarios,
				'horario' => $horario
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}

	public function jsonCalendar()
  {
    

  $citapedis= Cita::join('pedicuristas','pedicuristas.id','=','citas.pedicurista_id')->join('servicios','servicios.id','=','citas.servicio_id')->join('sucursals','sucursals.id','=','citas.sucursal_id')->join('clientes','clientes.id','=','citas.cliente_id')->select(array('pedicuristas.nombrecompletoped as title','clientes.nombrecompleto as description','sucursals.nombresuc','servicios.nombreservicio',DB::raw('CONCAT(citas.fechaservicio, " ", citas.hora) AS start'),DB::raw('CONCAT(citas.fechaservicio, " ", citas.horafinal) AS end')))->orderBy('hora','ASC')->get();

 return Response::json($citapedis);   
    
  }

	  public function buscarCliente(){
            

            $cliente_id = Input::get('cliente_id');
          
      
        
    
         $cliente = DB::table('citas')->join('clientes','clientes.id','=','citas.cliente_id')->join('sucursals','sucursals.id','=','citas.sucursal_id')->join('servicios','servicios.id','=','citas.servicio_id')->join('pedicuristas','pedicuristas.id','=','citas.pedicurista_id')->select(array('citas.id','clientes.nombrecompleto','sucursals.nombresuc','servicios.nombreservicio','pedicuristas.nombrecompletoped','citas.fechaservicio','citas.hora','citas.estatus'))->where('clientes.id',$cliente_id)->whereNull('citas.deleted_at')->orderBy('citas.fechaservicio','DESC')->limit(5)->get();



            return Response::json($cliente);
        }

	    public function buscarPedicurista(){
            

            $sucursal_id = Input::get('sucursal_id');
            $servicios = Input::get('servicio_id');
      
           switch ($servicios) {
           	case '1':
           		$campo='pedicuristas.pediestandard';
           		break;
           	case '2':
           		$campo='pedicuristas.pediespecial';
           		break;
           	case '3':
           		$campo='pedicuristas.masaje';
           		break;	
           	case '4':
           		$campo='pedicuristas.manicure';
           		break;
           	case '5':
           		$campo='pedicuristas.gelish';
           		break;	
           	default:
           		$campo='';
           		break;
           }
    
         $pedicuristas = Pedicurista::where('pedicuristas.sucursal_id','=',$sucursal_id)->where($campo,'=',1)->select(array('pedicuristas.id','pedicuristas.nombrecompletoped','pedicuristas.sucursal_id'))->orderBy('pedicuristas.nombrecompletoped', 'asc')->groupBy('pedicuristas.id')->get();



            return Response::json($pedicuristas);
        }


        public function buscarHorario(){
            

            $pedicurista_id = Input::get('pedicurista_id');
            $pedicurista=Pedicurista::find($pedicurista_id);
            $servicios = Input::get('servicio_id');
            $sucursal = Input::get('sucursal_id');
            $duracion= Servicio::where('id',$servicios)->select(array('duracion'))->value('duracion');
            $fechas = Input::get('fechaservicio');
                            
            $citahoras= Cita::where('pedicurista_id','=',$pedicurista_id)->where('fechaservicio','=',$fechas)->select(array('hora'))->orderBy('hora','ASC')->get();
             $citahorasterm= Cita::where('pedicurista_id','=',$pedicurista_id)->where('fechaservicio','=',$fechas)->select(array('horafinal'))->orderBy('horafinal','ASC')->get();
            // $starttime = new \DateTime($pedicurista->horario_entrada);
            // $endtime = new \DateTime($pedicurista->horario_salida);
            // $timestep= 60;

           // $startdate = strtotime($pedicurista->horario_entrada);
            // $starttm= date('H', $startdate);
            // $enddate = strtotime($pedicurista->horario_salida);
           //  $endtm= date('H', $enddate);

              //Obtener la min de inicio y termino del dia de trabajo
            //$startminute = strtotime($pedicurista->horario_entrada);
            // $startmin= date('i', $startminute);
            // $endminute = strtotime($pedicurista->horario_salida);
            // $endmin= date('i', $endminute);

            if($pedicurista_id!='000'){

             $start = strtotime('today '.$pedicurista->horario_entrada);
             $finish = strtotime('today '.$pedicurista->horario_salida);
             $interval = 60;
             $horas = [];
             $times=[];
           for ($i = $start; $i < $finish; $i += $interval * 60) {
               $time = date('H:i:s', $i);
             
               $horas[] = ['hora'=>$time];
            
        }
        $comterm= new Carbon($pedicurista->comidatermina); 
			
			$timec = strtotime($pedicurista->comidatermina);
			$timec = $timec - (60 * 60);
		    $datec = date("H:i:s", $timec);
        	$pedihorariocome= array('hora' => $pedicurista->comidainicia);
        	$pedihorariocomf= array('hora' => $datec);
      		$horasmerge= $pedihorariocomf+$pedihorariocome;
           
            	 foreach($citahoras as $citashr)
				{
				
				    $horarios[]= ['hora'=>$citashr->hora];
				   
				} 
           
            
				$newcome= array($pedihorariocome);
				$newcomf= array($pedihorariocomf);
				$comidacomp=array_merge($newcome,$newcomf);
				
         	$comidacomcol=array_column($comidacomp, 'hora');
       
         if(!empty($horarios)){
         	 $resulthorario=array_column($horarios, 'hora');
         	 $resulthorarioycom=array_merge($resulthorario,$comidacomcol);
         	}else{

         	 $resulthorarioycom=array_column($comidacomp, 'hora');
         	}
            
             
             $resulthoras=array_column($horas, 'hora');
			
				 $diffs = array_diff($resulthoras,  $resulthorarioycom);

             foreach($diffs as $diff)
				{
				
				    $diffs2[]= ['hora'=>$diff];
				   
				} 
				
                

         }else{
         	//$pedicuristacount= Cita::where('fechaservicio','=',$fechas)->select(array('pedicurista_id'))->orderBy('pedicurista_id','ASC')->count('pedicurista_id');
         //	$pedicuristaasignadas= Cita::where('fechaservicio','=',$fechas)->select(array('pedicurista_id'))->orderBy('pedicurista_id','ASC')->pluck('pedicurista_id');

         	//$citasxpedicurista=Cita::whereIN('pedicurista_id',$pedicuristaasignadas)->select(array('pedicurista_id'))->pluck('pedicurista_id')->toArray();
         	 
         	//$count=array_count_values($citasxpedicurista);
         	                          	
           // $minpedicurista=array_keys($count, min($count)); 
           // $pedicuristaasignada=Pedicurista::where('id',$minpedicurista)->select(array('hora'))->get();
          //  $citahoras= Cita::where('pedicurista_id','=',$minpedicurista)->where('fechaservicio','=',$fechas)->select(array('hora'))->orderBy('hora','ASC')->get();

         	switch ($servicios) {
           	case '1':
           		$campo='pedicuristas.pediestandard';
           		break;
           	case '2':
           		$campo='pedicuristas.pediespecial';
           		break;
           	case '3':
           		$campo='pedicuristas.masaje';
           		break;	
           	case '4':
           		$campo='pedicuristas.manicure';
           		break;
           	case '5':
           		$campo='pedicuristas.gelish';
           		break;	
           	default:
           		$campo='';
           		break;
           }
    
         $pedicuristas = Pedicurista::where('sucursal_id','=',$sucursal)->where($campo,'=',1)->select(array('id'))->pluck('id');
         $horario_entradas = Pedicurista::where('sucursal_id','=',$sucursal)->where($campo,'=',1)->select(array('horario_entrada'))->pluck('horario_entrada');
         $horario_salidas = Pedicurista::where('sucursal_id','=',$sucursal)->where($campo,'=',1)->select(array('horario_salida'))->pluck('horario_salida');
         $comidainicias = Pedicurista::where('sucursal_id','=',$sucursal)->where($campo,'=',1)->select(array('comidainicia'))->pluck('comidainicia');
         $comidaterminas = Pedicurista::where('sucursal_id','=',$sucursal)->where($campo,'=',1)->select(array('comidatermina'))->pluck('comidatermina');
         	

        $citahoras= Cita::where('fechaservicio','=',$fechas)->whereIN('citas.pedicurista_id',$pedicuristas)->select(array('hora'))->orderBy('hora','ASC')->get();

        	foreach($horario_entradas as $horentrada){
        		 $start = strtotime('today '.$horentrada);
        	}
        	foreach($horario_salidas as $horsalida){
        		 $finish = strtotime('today '.$horsalida);
        	}
        	 
             
             $interval = 60;
             $horas = [];
             $times=[];
           for ($i = $start; $i < $finish; $i += $interval * 60) {
               $time = date('H:i:s', $i);
             
               $horas[] = ['hora'=>$time];
            
        }
      /*  foreach($comidaterminas as $comidatermina){
        		 $comterm= new Carbon($comidatermina); 
        		 $timec = strtotime($comidatermina);
        	}
        
			
			
			$timec = $timec - (60 * 60);
		    $datec = date("H:i:s", $timec);
		     foreach($comidainicias as $comidainicia){
        		$pedihorariocome= array('hora' => $comidainicia);
        	}
        	
        	$pedihorariocomf= array('hora' => $datec);
      		$horasmerge= $pedihorariocomf+$pedihorariocome;
           */
            	 foreach($citahoras as $citashr)
				{
				
				    $horarios[]= ['hora'=>$citashr->hora];
				   
				} 
           
            /*
				$newcome= array($pedihorariocome);
				$newcomf= array($pedihorariocomf);
				$comidacomp=array_merge($newcome,$newcomf);
				
         	$comidacomcol=array_column($comidacomp, 'hora');
       */
         if(!empty($horarios)){
         	 $resulthorario=array_column($horarios, 'hora');
         	// $resulthorarioycom=array_merge($resulthorario,$comidacomcol);
         	 $resulthoras=array_column($horas, 'hora');
         	 $diffs = array_diff($resulthoras,  $resulthorario);
         	}else{
    
         	// $resulthorarioycom=array_merge($resulthorario,$comidacomcol);
         
         	 $diffs =array_column($horas, 'hora');
         	}
                        
       				 

             foreach($diffs as $diff)
				{
				
				    $diffs2[]= ['hora'=>$diff];
				   
				} 
         	 //$diffs2[]= ['hora'=>'12:00:00'];
         }
       

               //Obtener la hora de inicio y termino del dia de trabajo
            /*$startdate = strtotime($horarioentrada);
             $starttm= date('H', $startdate);
             $enddate = strtotime($horariosalida);
             $endtm= date('H', $enddate);

              //Obtener la min de inicio y termino del dia de trabajo
            $startminute = strtotime($horarioentrada);
             $startmin= date('i', $startminute);
             $endminute = strtotime($horariosalida);
             $endmin= date('i', $endminute);

    



           /* $horas= array();
           
         	   	   for($h=$starttm; $h< $endtm; $h++){
             	 for($m = $startmin; $m < 60; $m+=30){
             	 	for($s = 00; $s < 01; $s++){
             	 	$hora= sprintf('%02d:%02d:%02d', $h, $m,$s);
             	 	$horas[$hora]=['hora'=>$hora];
             	 	$horas["'$hora'"] = "'$hora'";
             	 	//$merge=array_merge($horas,$citas);
             	   // $gg=array_unique($merge,SORT_REGULAR);
            $exclude=  ($horas, $citas);
       


             	 }
             }
         }
*/
		         
      	         return Response::json(

     $diffs2
            
            );           
      		

        }
/**
	 * Show the form for creating a new cita.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function calendario()
	{
		return view('la.citas.calendar');
	}
	/**
	 * Show the form for creating a new cita.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created cita in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("Citas", "create")) {
		
			$rules = Module::validateRules("Citas", $request);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
			

			$insert_id = Module::insert("Citas", $request);
			
			
 
	$cita = Cita::find($insert_id);
            
			$sucursal =  Sucursal::where('sucursals.id','=',$cita->sucursal_id)->value('nombresuc');

			$pedicurista =  Pedicurista::where('pedicuristas.id','=',$cita->pedicurista_id)->value('nombrecompletoped');

			$servicio =  Servicio::where('servicios.id','=',$cita->servicio_id)->value('nombreservicio');
			$serviciomin =  Servicio::where('servicios.id','=',$cita->servicio_id)->value('duracion');
	$current= new Carbon($request->hora);
    
	$cita->horafinal=$current->addMinutes($serviciomin);
	$cita->save();
			 if($cita->cliente_id == '0'){
			 	$cliente = new Cliente();
				$cliente->nombrecompleto = $request->nombrecompleto;
				$cliente->telcasa = $request->telcasa;
				$cliente->celular = $request->celular;
				$cliente->correo = $request->correo;
				$cliente->save();
				$citas = Cita::find($insert_id);
			
			 	$citas->cliente_id = $cliente->id;
			 	$citas->save(); 
			/* Nexmo::message()->send([
    'to'   => $request->celular,
    'from' => 'Nexmo',
    'text' => $request->nombrecompleto.' su cita ésta confirmada el '.$request->fechaservicio.' '.$request->hora.' en '.$sucursal.' con '.$pedicurista.' servicio de '.$servicio.'. Todo Para Sus Pies. '
]);
			 } else{
	$cliente =  Cliente::where('clientes.id','=',$cita->cliente_id)->value('nombrecompleto');
	$celular =  Cliente::where('clientes.id','=',$cita->cliente_id)->value('celular');
			
			Nexmo::message()->send([
    'to'   => $celular,
    'from' => 'Nexmo',
    'text' => $cliente.' su cita ésta confirmada el '.$request->fechaservicio.' '.$request->hora.' en '.$sucursal.' con '.$pedicurista.' servicio de '.$servicio.'. Todo Para Sus Pies. '
]);
			*/}
			
			return redirect()->route(config('laraadmin.adminRoute') . '.citas.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified cita.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("Citas", "view")) {
			
			$cita = Cita::find($id);
			if(isset($cita->id)) {
				$module = Module::get('Citas');
				$module->row = $cita;
				
				return view('la.citas.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('cita', $cita);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("cita"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified cita.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("Citas", "edit")) {			
			$cita = Cita::find($id);
			if(isset($cita->id)) {	
				$module = Module::get('Citas');
				
				$module->row = $cita;
				
				return view('la.citas.edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('cita', $cita);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("cita"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified cita in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("Citas", "edit")) {
			
			$rules = Module::validateRules("Citas", $request, true);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}
			
			$insert_id = Module::updateRow("Citas", $request, $id);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.citas.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified cita from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("Citas", "delete")) {
			Cita::find($id)->delete();
			
			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.citas.index');
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}
	
	/**
	 * Datatable Ajax fetch
	 *['id', 'cliente_id', 'sucursal_id', 'servicio_id', 'pedicurista_id', 'fechaservicio','hora','estatus'];
	 * @return
	 */
	public function dtajax()
	{
		$values = DB::table('citas')->join('clientes','clientes.id','=','citas.cliente_id')->join('sucursals','sucursals.id','=','citas.sucursal_id')->join('servicios','servicios.id','=','citas.servicio_id')->join('pedicuristas','pedicuristas.id','=','citas.pedicurista_id')->select(array('citas.id','clientes.nombrecompleto','sucursals.nombresuc','servicios.nombreservicio','pedicuristas.nombrecompletoped','citas.fechaservicio','citas.hora','citas.estatus'))->whereNull('citas.deleted_at');
		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('Citas');
		
		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) { 
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/citas/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}
			
			if($this->show_action) {
				$output = '';
				if(Module::hasAccess("Citas", "edit")) {
					$output .= '<a href="'.url(config('laraadmin.adminRoute') . '/citas/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
				}
				
				if(Module::hasAccess("Citas", "delete")) {
					$output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.citas.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
					$output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
					$output .= Form::close();
				}
				$data->data[$i][] = (string)$output;
			}
		}
		$out->setData($data);
		return $out;
	}
}
