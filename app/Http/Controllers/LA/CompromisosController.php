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

use App\Models\Compromiso;

class CompromisosController extends Controller
{
	public $show_action = true;
	public $view_col = 'checklist_id';
	public $listing_cols = ['id', 'checklist_id', 'comentariocompromiso', 'fechacompromiso', 'fechaentrega', 'estatuscompromiso', 'evidencia'];
	
	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('Compromisos', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('Compromisos', $this->listing_cols);
		}
	}
	
	/**
	 * Display a listing of the Compromisos.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('Compromisos');
		
		if(Module::hasAccess($module->id)) {
			return View('la.compromisos.index', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module
			]);
		} else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
	}

	/**
	 * Show the form for creating a new compromiso.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created compromiso in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("Compromisos", "create")) {
		
			$rules = Module::validateRules("Compromisos", $request);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
			
			$insert_id = Module::insert("Compromisos", $request);
			
	        $compromiso=Compromiso::find($insert_id);
	        $begin = new \DateTime($compromiso->created_at);
            $goal = new \DateTime($compromiso->fechacompromiso);
            $interval = $goal->diff($begin);

	        // %a will output the total number of days.
	        $datebeg= $interval->format('%a');
	        $date=$datebeg+1;
	        $half= $date/2;
	        $halfdate= strtotime("-".$half." days",strtotime ($compromiso->fechacompromiso));   
	        $fechahalf=date('Y-m-d H:i:00',$halfdate);
	        $compromiso->diffdays=$date;
	        $compromiso->mitaddias=$half;
	        $compromiso->fechaenviocorreo=$fechahalf;
	        $compromiso->save();

			
			return redirect()->route(config('laraadmin.adminRoute') . '.compromisos.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Display the specified compromiso.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("Compromisos", "view")) {
			
			$compromiso = Compromiso::find($id);
			if(isset($compromiso->id)) {
				$module = Module::get('Compromisos');
				$module->row = $compromiso;
				
				return view('la.compromisos.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('compromiso', $compromiso);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("compromiso"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified compromiso.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("Compromisos", "edit")) {			
			$compromiso = Compromiso::find($id);
			if(isset($compromiso->id)) {	
				$module = Module::get('Compromisos');
				
				$module->row = $compromiso;
				
				return view('la.compromisos.edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('compromiso', $compromiso);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("compromiso"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Update the specified compromiso in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("Compromisos", "edit")) {
			
			$rules = Module::validateRules("Compromisos", $request, true);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}
			
			$insert_id = Module::updateRow("Compromisos", $request, $id);
			$compromiso=Compromiso::find($id);
	        $begin = new \DateTime($compromiso->created_at);
            $goal = new \DateTime($compromiso->fechacompromiso);
            $interval = $goal->diff($begin);


	        // %a will output the total number of days.
	        $datebeg= $interval->format('%a');
	        $date=$datebeg+1;
	        $half= $date/2;
	        $halfdate= strtotime("-".$half." days",strtotime ($compromiso->fechacompromiso));   
	        $fechahalf=date('Y-m-d H:i:00',$halfdate);
	        $compromiso->diffdays=$date;
	        $compromiso->mitaddias=$half;
	        $compromiso->fechaenviocorreo=$fechahalf;
	        $compromiso->save();
			
			return redirect()->route(config('laraadmin.adminRoute') . '.compromisos.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified compromiso from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("Compromisos", "delete")) {
			Compromiso::find($id)->delete();
			
			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.compromisos.index');
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}
	
	/**
	 * Datatable Ajax fetch
	 *
	 * @return
	 */
	public function dtajax()
	{
		$values = DB::table('compromisos')->select($this->listing_cols)->whereNull('deleted_at');
		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('Compromisos');
		
		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) { 
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/compromisos/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}
			
			if($this->show_action) {
				$output = '';
				if(Module::hasAccess("Compromisos", "edit")) {
					$output .= '<a href="'.url(config('laraadmin.adminRoute') . '/compromisos/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
				}
				
				if(Module::hasAccess("Compromisos", "delete")) {
					$output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.compromisos.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
					$output .= ' <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-times"></i></button>';
					$output .= Form::close();
				}
				$data->data[$i][] = (string)$output;
			}
		}
		$out->setData($data);
		return $out;
	}

	/**
	 * Datatable Ajax fetch detalle
	 *
	 * @return
	 */
	public function dtajax_detalle($id)
	{
		$values = DB::table('compromisos')->select($this->listing_cols)->whereNull('deleted_at')->where('checklist_id',$id);
		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('Compromisos');
		
		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) { 
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url(config('laraadmin.adminRoute') . '/compromisos/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}
			
			if($this->show_action) {
				$output = '';
				if(Module::hasAccess("Compromisos", "edit")) {
					$output .= '<a href="'.url(config('laraadmin.adminRoute') . '/compromisos/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
				}
				
				if(Module::hasAccess("Compromisos", "delete")) {
					$output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.compromisos.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
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
