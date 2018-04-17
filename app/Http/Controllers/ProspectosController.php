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
use App\Models\Expo;

use App\Models\Prospecto;

class ProspectosController extends Controller
{
	public $show_action = true;
	public $view_col = 'nombrecompletoprosp';
	public $listing_cols = ['id', 'expo', 'fecha', 'nombrecompletoprosp', 'telefono', 'celular', 'email',  'fechadeseo', 'inversion', 'comentarios', 'atendidopor', 'fechaprimercontacto'];
	
	public function __construct() {
		
		
	}
	
	/**
	 * Display a listing of the Prospectos.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$module = Module::get('Prospectos');
		
		$expos=Expo::all();
                $expo='';
			return View('prospectos', [
				'show_actions' => $this->show_action,
				'listing_cols' => $this->listing_cols,
				'module' => $module,
                                'expos' => $expos,
                                'expo' => $expo
			]);
		
	}

	/**
	 * Show the form for creating a new prospecto.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
               $expos=Expo::select(array('expos.*'))->orderBy('id','DESC')->get();
                $expo='';

		return View('prospecto-create',compact('expos','expo'));
	}

	/**
	 * Store a newly created prospecto in database.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		
		
			$rules = Module::validateRules("Prospectos", $request);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
			
			$insert_id = Module::insert("Prospectos", $request);
			
		 return redirect()->back();
	
	}

	/**
	 * Display the specified prospecto.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		
			
			$prospecto = Prospecto::find($id);
			if(isset($prospecto->id)) {
				$module = Module::get('Prospectos');
				$module->row = $prospecto;
				
				return view('prospectos_show', [
					'module' => $module,
					'view_col' => $this->view_col,
					'no_header' => true,
					'no_padding' => "no-padding"
				])->with('prospecto', $prospecto);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("prospecto"),
				]);
			}
		
	}

	/**
	 * Show the form for editing the specified prospecto.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
				
			$prospecto = Prospecto::find($id);
                        $expos=Expo::all();
                        $expo=$prospecto->expo;
			if(isset($prospecto->id)) {	
				$module = Module::get('Prospectos');
				
				$module->row = $prospecto;
				
				return view('prospecto-edit', [
					'module' => $module,
					'view_col' => $this->view_col,
				])->with('prospecto', $prospecto)->with('expos', $expos)->with('expo', $expo);
			} else {
				return view('errors.404', [
					'record_id' => $id,
					'record_name' => ucfirst("prospecto"),
				]);
			}
		
	}

	/**
	 * Update the specified prospecto in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		
			
			$rules = Module::validateRules("Prospectos", $request, true);
			
			$validator = Validator::make($request->all(), $rules);
			
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();;
			}
			
			$insert_id = Module::updateRow("Prospectos", $request, $id);
			
		return redirect()->back();
			
	
	}

	/**
	 * Remove the specified prospecto from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		
			Prospecto::find($id)->delete();
			
			// Redirecting to index() method
			return redirect()->route('prospectos');
	
	}
	
	/**
	 * Datatable Ajax fetch
	 *
	 * @return
	 */
	public function dtajax()
	{
		$values = DB::table('prospectos')->select($this->listing_cols)->whereNull('deleted_at');
		$out = Datatables::of($values)->make();
		$data = $out->getData();

		$fields_popup = ModuleFields::getModuleFields('Prospectos');
		
		for($i=0; $i < count($data->data); $i++) {
			for ($j=0; $j < count($this->listing_cols); $j++) { 
				$col = $this->listing_cols[$j];
				if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
					$data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
				}
				if($col == $this->view_col) {
					$data->data[$i][$j] = '<a href="'.url('/prospectos/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
				}
				// else if($col == "author") {
				//    $data->data[$i][$j];
				// }
			}
			
			if($this->show_action) {
				$output = '';
			
					$output .= '<a href="'.url('/prospectos/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
			
				
				
				$data->data[$i][] = (string)$output;
			}
		}
		$out->setData($data);
		return $out;
	}
}
