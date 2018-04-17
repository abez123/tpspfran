<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers\LA;

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
use PDF;
use App\Models\Checklist;
use App\Models\Sucursal;
use App\Models\Franquiciatario;

class ChecklistsController extends Controller
{
	public $show_action = true;
	public $view_col = 'sucursal_id';
	public $listing_cols = ['id', 'sucursal_id', 'fecha', 'calfinal', 'video'];
	public $view_col2 = 'checklist_id';
	public $listing_cols2 = ['id', 'checklist_id', 'comentariocompromiso', 'fechacompromiso', 'fechaentrega', 'estatuscompromiso', 'evidencia'];
	
	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('Checklists', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('Checklists', $this->listing_cols);
		}
	}
	
	/**
	 * Display a listing of the Checklists.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('Checklists');
		
		if(Module::hasAccess($module->id)) {
			return View('la.checklists.index', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}

	/**
	 * Show the form for creating a new checklist.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created checklist in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("Checklists", "create")) {
		
			$rules = Module::validateRules("Checklists", $request);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
			
			$insert_id = Module::insert("Checklists", $request);
			$ponderacion= Checklist::find($insert_id);
			if($request->fachada1=="Si"||$request->fachada1=="No Aplica"){
				$preg1= $request->ponderaconfachada1;
			}else{
             $preg1= 0;
             $ponderacion->ponderaconfachada1=0;
			}
			if($request->fachada2=="Si"||$request->fachada2=="No Aplica"){
				$preg2= $request->ponderacionfachada2;
			}else{
             $preg2= 0;
              $ponderacion->ponderacionfachada2=0;
			}
			if($request->fachada3=="Si"||$request->fachada3=="No Aplica"){
				$preg3= $request->ponderaconfachada3;
			}else{
             $preg3= 0;
             $ponderacion->ponderaconfachada3=0;
			}
			if($request->fachada4=="Si"||$request->fachada4=="No Aplica"){
				$preg4= $request->ponderacion4;
			}else{
             $preg4= 0;
              $ponderacion->ponderacion4=0;
			}
			if($request->fachada5=="Si"){
				$preg5= $request->ponderacion5;
			}else{
             $preg5= 0;
             $ponderacion->ponderacion5=0;
			}
			if($request->fachada6=="Si"){
				$preg6= $request->ponderacionfachada6;
			}else{
             $preg6= 0;
              $ponderacion->ponderacionfachada6=0;
			}
			if($request->imagenpregunta1=="Si"){
				$preg7= $request->ponderacion7;
			}else{
             $preg7= 0;
             $ponderacion->ponderacion7=0;
			}
			if($request->imagenpregunta2=="Si"){
				$preg8= $request->ponderacion8;
			}else{
             $preg8= 0;
              $ponderacion->ponderacion8=0;
			}
			if($request->imagenpregunta3=="Si"){
				$preg9= $request->ponderacion9;
			}else{
             $preg9= 0;
             $ponderacion->ponderacion9=0;
			}
			if($request->imagenpregunta4=="Si"){
				$preg10= $request->ponderacion10;
			}else{
             $preg10= 0;
              $ponderacion->ponderacion10=0;
			}
			if($request->imagenpregunta5=="Si"){
				$preg11= $request->ponderacion11;
			}else{
             $preg11= 0;
             $ponderacion->ponderacion11=0;
			}
			if($request->imagenpregunta6=="Si"){
				$preg12= $request->ponderacion12;
			}else{
             $preg12= 0;
              $ponderacion->ponderacion12=0;
			}
			if($request->imagenpregunta7=="Si"){
				$preg13= $request->ponderacion13;
			}else{
             $preg13= 0;
             $ponderacion->ponderacion13=0;
			}
			if($request->imagenpregunta8=="Si"){
				$preg14= $request->ponderacion14;
			}else{
             $preg14= 0;
              $ponderacion->ponderacion14=0;
			}
			if($request->imagenpregunta9=="Si"){
				$preg15= $request->ponderacion15;
			}else{
             $preg15= 0;
             $ponderacion->ponderacion15=0;
			}
			if($request->recepcion1=="Si"){
				$preg16= $request->ponderacion16;
			}else{
             $preg16= 0;
              $ponderacion->ponderacion16=0;
			}
			if($request->recepcion2=="Si"){
				$preg17= $request->ponderacion17;
			}else{
             $preg17= 0;
             $ponderacion->ponderacion17=0;
			}
			if($request->recepcion3=="Si"){
				$preg18= $request->ponderacion18;
			}else{
             $preg18= 0;
              $ponderacion->ponderacion18=0;
			}
			if($request->recepcion4=="Si"){
				$preg19= $request->ponderacion19;
			}else{
             $preg19= 0;
             $ponderacion->ponderacion19=0;
			}
			if($request->recepcion5=="Si"){
				$preg20= $request->ponderacion20;
			}else{
             $preg20= 0;
              $ponderacion->ponderacion20=0;
			}
			if($request->recepcion6=="Si"){
				$preg21= $request->ponderacion21;
			}else{
             $preg21= 0;
             $ponderacion->ponderacion21=0;
			}
			if($request->recepcion7=="Si"){
				$preg22= $request->ponderacion22;
			}else{
             $preg22= 0;
              $ponderacion->ponderacion22=0;
			}
			if($request->recepcion8=="Si"){
				$preg23= $request->ponderacion23;
			}else{
             $preg23= 0;
             $ponderacion->ponderacion23=0;
			}
			if($request->cubiculo1=="Si"){
				$preg24= $request->ponderacion24;
			}else{
             $preg24= 0;
              $ponderacion->ponderacion24=0;
			}
			if($request->cubiculo2=="Si"){
				$preg25= $request->ponderacion25;
			}else{
             $preg25= 0;
             $ponderacion->ponderacion25=0;
			}
			if($request->cubiculo3=="Si"){
				$preg26= $request->ponderacion26;
			}else{
             $preg26= 0;
              $ponderacion->ponderacion26=0;
			}
			if($request->cubiculo4=="Si"){
				$preg27= $request->ponderacion27;
			}else{
             $preg27= 0;
             $ponderacion->ponderacion27=0;
			}
			if($request->cubiculo5=="Si"){
				$preg28= $request->ponderacion28;
			}else{
             $preg28= 0;
              $ponderacion->ponderacion28=0;
			}
			if($request->cubiculo6=="Si"){
				$preg29= $request->ponderacion29;
			}else{
             $preg29= 0;
             $ponderacion->ponderacion29=0;
			}
			if($request->cubiculo7=="Si"){
				$preg30= $request->ponderacion30;
			}else{
             $preg30= 0;
              $ponderacion->ponderacion30=0;
			}
			if($request->cubiculo8=="Si"){
				$preg31= $request->ponderacion31;
			}else{
             $preg31= 0;
             $ponderacion->ponderacion31=0;
			}
			if($request->proceso1=="Si"){
				$preg32= $request->ponderacion32;
			}else{
             $preg32= 0;
              $ponderacion->ponderacion32=0;
			}
			if($request->proceso2=="Si"){
				$preg33= $request->ponderacion33;
			}else{
             $preg33= 0;
             $ponderacion->ponderacion33=0;
			}
			if($request->proceso3=="Si"){
				$preg34= $request->ponderacion34;
			}else{
             $preg34= 0;
              $ponderacion->ponderacion34=0;
			}
			if($request->proceso4=="Si"){
				$preg35= $request->ponderacion35;
			}else{
             $preg35= 0;
             $ponderacion->ponderacion35=0;
			}
			if($request->proceso5=="Si"){
				$preg36= $request->ponderacion36;
			}else{
             $preg36= 0;
              $ponderacion->ponderacion36=0;
			}
			if($request->proceso6=="Si"){
				$preg37= $request->ponderacion37;
			}else{
             $preg37= 0;
             $ponderacion->ponderacion37=0;
			}
			if($request->proceso7=="Si"){
				$preg38= $request->ponderacion38;
			}else{
             $preg38= 0;
              $ponderacion->ponderacion38=0;
			}
			if($request->proceso8=="Si"){
				$preg39= $request->ponderacion39;
			}else{
             $preg39= 0;
             $ponderacion->ponderacion39=0;
			}
			if($request->proceso9=="Si"){
				$preg40= $request->ponderacion40;
			}else{
             $preg40= 0;
              $ponderacion->ponderacion40=0;
			}
			if($request->proceso10=="Si"){
				$preg41= $request->ponderacion41;
			}else{
             $preg41= 0;
             $ponderacion->ponderacion41=0;
			}
			if($request->proceso11=="Si"){
				$preg42= $request->ponderacion42;
			}else{
             $preg42= 0;
              $ponderacion->ponderacion42=0;
			}
			if($request->proceso12=="Si"){
				$preg43= $request->ponderacion43;
			}else{
             $preg43= 0;
             $ponderacion->ponderacion43=0;
			}
			if($request->proceso13=="Si"){
				$preg44= $request->ponderacion44;
			}else{
             $preg44= 0;
              $ponderacion->ponderacion44=0;
			}
			if($request->inventario1=="Si"){
				$preg45= $request->ponderacion45;
			}else{
             $preg45= 0;
             $ponderacion->ponderacion45=0;
			}
			if($request->inventario2=="Si"){
				$preg46= $request->ponderacion46;
			}else{
             $preg46= 0;
              $ponderacion->ponderacion46=0;
			}
			if($request->sistema4=="Si"){
				$preg47= $request->ponderacion47;
			}else{
             $preg47= 0;
             $ponderacion->ponderacion47=0;
			}
			if($request->sistema3=="Si"){
				$preg48= $request->ponderacion48;
			}else{
             $preg48= 0;
              $ponderacion->ponderacion48=0;
			}
			if($request->sistema2=="Si"){
				$preg49= $request->ponderacion49;
			}else{
             $preg49= 0;
             $ponderacion->ponderacion49=0;
			}
			if($request->sistema1=="Si"){
				$preg50= $request->ponderacion50;
			}else{
             $preg50= 0;
              $ponderacion->ponderacion50=0;
			}
			$total=$preg1+$preg2+$preg3+$preg4+$preg5+$preg6+$preg7+$preg8+$preg9+$preg10+$preg11+$preg12+$preg13+$preg14+$preg15+$preg16+$preg17+$preg18+$preg19+$preg20+$preg21+$preg22+$preg23+$preg24+$preg25+$preg26+$preg27+$preg28+$preg29+$pre30+$preg31+$preg32+$preg33+$preg34+$preg35+$preg36+$preg37+$preg38+$preg39+$preg40+$preg41+$preg42+$preg43+$preg44+$preg45+$preg46+$preg47+$preg48+$preg49+$preg50;
			
			$ponderacion->calfinal=$total;
			$ponderacion->save();
			return redirect()->route(config('laraadmin.adminRoute') . '.checklists.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified checklist.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("Checklists", "view")) {
			$module2 = Module::get('Compromisos');
			$checklist = Checklist::find($id);
			if(isset($checklist->id)) {
				$module = Module::get('Checklists');
				$module->row = $checklist;
				
				return view('la.checklists.show', [
					'module' => $module,
					'module2' => $module2,
					'view_col' => $this->view_col,
					'view_col2' => $this->view_col2,
					'show_actions' => $this->show_action,
				    'listing_cols2' => $this->listing_cols2,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('checklist', $checklist);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("checklist"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified checklist.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("Checklists", "edit")) {			
			$checklist = Checklist::find($id);
			if(isset($checklist->id)) {	
				$module = Module::get('Checklists');
				
				$module->row = $checklist;
				
				return view('la.checklists.edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('checklist', $checklist);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("checklist"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified checklist in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("Checklists", "edit")) {
			
			$rules = Module::validateRules("Checklists", $request, true);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}
			
			$insert_id = Module::updateRow("Checklists", $request, $id);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.checklists.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified checklist from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("Checklists", "delete")) {
			Checklist::find($id)->delete();
			
			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.checklists.index');
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}
	/* ================== PDF ================== */

public function pdf($id)
	{
		
				    //Crear pdf
		
		$checklist = Checklist::find($id);
		$sucursal=Sucursal::find($checklist->sucursal_id);
		$module = Module::get('Checklists');
		$module->row =$checklist;
		
	
	    
           
        
        $franquiciatario = Franquiciatario::whereIN('id',  [$checklist->sucursal_id])->select(array('franquiciatarios.*'))->orderBy('id','DESC')->get();

	
		$pdf = PDF::loadView('pdf.conlogo',['checklist' =>$checklist,'module'=>$module,'sucursal'=>$sucursal,'franquiciatario'=>$franquiciatario]);
		$pdf->setPaper('A4', 'portrait');
		
		return $pdf->download($sucursal->nombresuc.' '.$checklist->fecha.'.pdf');
		/*return $pdf->stream();*/
	}
	
	/**
	 * Datatable Ajax fetch
	 *
	 * @return
	 */
	public function dtajax()
	{
		$values = DB::table('checklists')->select($this->listing_cols)->whereNull('deleted_at');
		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('Checklists');
		
		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) { 
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/checklists/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}
			
			if($this->show_action) {
				$output = '';
				if(Module::hasAccess("Checklists", "edit")) {
					$output .= '<a href="'.url(config('laraadmin.adminRoute') . '/checklists/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
				}
				
				if(Module::hasAccess("Checklists", "delete")) {
					$output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.checklists.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
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
