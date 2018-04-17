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

use App\Models\Peticion;

class PeticionsController extends Controller
{
	public $show_action = true;
	public $view_col = 'titulo';
	public $listing_cols = ['id', 'titulo', 'mensaje', 'franquiciatario_id', 'empleado_id', 'estatus'];
	
	public function __construct() {
		// Field Access of Listing Columns
		if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
			$this->middleware(function ($request, $next) {
				$this->listing_cols = ModuleFields::listingColumnAccessScan('Peticions', $this->listing_cols);
				return $next($request);
			});
		} else {
			$this->listing_cols = ModuleFields::listingColumnAccessScan('Peticions', $this->listing_cols);
		}
	}
	
	/**
	 * Display a listing of the Peticions.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('Peticions');
		$peticiones=Peticion::join('users','users.context_id','=','peticions.franquiciatario_id')->where('franquiciatario_id',Auth::user()->context_id)->where('users.type',' 
		FRANQUICIATARIO')->whereNull('users.deleted_at')->select('peticions.*')->get();
     
		
		if(Module::hasAccess($module->id)) {
			return View('peticiones', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module,
				'peticiones' => $peticiones
			]);
		} else {
            return redirect("/");
        }
	}

	/**
	 * Show the form for creating a new peticion.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created peticion in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if(Module::hasAccess("Peticions", "create")) {
		
			$rules = Module::validateRules("Peticions", $request);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
			
			$insert_id = Module::insert("Peticions", $request);
			
			return redirect()->route('peticions');
			
		} else {
			return redirect("/");
		}
	}

	/**
	 * Display the specified peticion.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if(Module::hasAccess("Peticions", "view")) {
			
			$peticion = Peticion::find($id);
			if(isset($peticion->id)) {
				$module = Module::get('Peticions');
				$module->row = $peticion;
				
				return view('la.peticions.show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('peticion', $peticion);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("peticion"),
				]);
			}
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Show the form for editing the specified peticion.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if(Module::hasAccess("Peticions", "edit")) {			
			$peticion = Peticion::find($id);
			if(isset($peticion->id)) {	
				$module = Module::get('Peticions');
				
				$module->row = $peticion;
				
				return view('peticiones-edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('peticion', $peticion);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("peticion"),
				]);
			}
		} else {
			return redirect("/");
		}
	}

	/**
	 * Update the specified peticion in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if(Module::hasAccess("Peticions", "edit")) {
			
			$rules = Module::validateRules("Peticions", $request, true);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}
			
			$insert_id = Module::updateRow("Peticions", $request, $id);
			
			return redirect()->route(config('laraadmin.adminRoute') . '.peticions.index');
			
		} else {
			return redirect(config('laraadmin.adminRoute')."/");
		}
	}

	/**
	 * Remove the specified peticion from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if(Module::hasAccess("Peticions", "delete")) {
			Peticion::find($id)->delete();
			
			// Redirecting to index() method
			return redirect()->route(config('laraadmin.adminRoute') . '.peticions.index');
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
		$values = DB::table('peticions')->select($this->listing_cols)->whereNull('deleted_at');
		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('Peticions');
		
		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) { 
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url('/peticiones/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}
			
			if($this->show_action) {
				$output = '';
				if(Module::hasAccess("Peticions", "edit")) {
					$output .= '<a href="'.url('/peticiones/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
				}
				
				if(Module::hasAccess("Peticions", "delete")) {
					$output .= Form::open(['route' => ['peticiones.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
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
