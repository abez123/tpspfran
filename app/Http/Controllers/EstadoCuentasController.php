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
use App\Models\FacturaXML;
use App\Models\Upload;

class EstadoCuentasController extends Controller
{
    public $show_action = true;
    public $view_col = 'nombre';
    public $listing_cols = ['id', 'fecha','folio','nombre', 'rfc',  'cantidad',  'descripcion', 'valorunitario','subimporte', 'impuesto' ,'importe', 'formapago', 'moneda','estatus'];
    
    public function __construct() {
        // Field Access of Listing Columns
        if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() == 5.3) {
            $this->middleware(function ($request, $next) {
                $this->listing_cols = ModuleFields::listingColumnAccessScan('FacturaXMLs', $this->listing_cols);
                return $next($request);
            });
        } else {
            $this->listing_cols = ModuleFields::listingColumnAccessScan('FacturaXMLs', $this->listing_cols);
        }
    }
    
    /**
     * Display a listing of the FacturaXMLs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $module = Module::get('FacturaXMLs');
        
       

        if(Module::hasAccess($module->id)) {
            return View('estado_cuenta', [
                'show_actions' => $this->show_action,
                'listing_cols' => $this->listing_cols,
                'module' => $module  
            ]);
        } else {
            return redirect(config('laraadmin.adminRoute')."/");
        }
    }

    /**
     * Show the form for creating a new facturaxml.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created facturaxml in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        
    }

    /**
     * Display the specified facturaxml.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Module::hasAccess("FacturaXMLs", "view")) {
            
            $facturaxml = FacturaXML::find($id);
            if(isset($facturaxml->id)) {
                $module = Module::get('FacturaXMLs');
                $module->row = $facturaxml;
                
                return view('estado_show', [
                    'module' => $module,
                    'view_col' => $this->view_col,
                    'no_header' => true,
                    'no_padding' => "no-padding"
                ])->with('facturaxml', $facturaxml);
            } else {
                return view('errors.404', [
                    'record_id' => $id,
                    'record_name' => ucfirst("facturaxml"),
                ]);
            }
        } else {
            return redirect("/");
        }
    }

    /**
     * Show the form for editing the specified facturaxml.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified facturaxml in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified facturaxml from storage.
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
        $rfc=Franquiciatario::where('id',Auth::user()->context_id)->whereNull('deleted_at')->select(array('rfc'))->value('rfc');
        $values = DB::table('facturaxmls')->where('rfc',$rfc)->select($this->listing_cols)->whereNull('deleted_at');
        $out = Datatables::of($values)->make();
        $data = $out->getData();

        $fields_popup = ModuleFields::getModuleFields('FacturaXMLs');
        
        for($i=0; $i < count($data->data); $i++) {
            for ($j=0; $j < count($this->listing_cols); $j++) { 
                $col = $this->listing_cols[$j];
                if($fields_popup[$col] != null && starts_with($fields_popup[$col]->popup_vals, "@")) {
                    $data->data[$i][$j] = ModuleFields::getFieldValue($fields_popup[$col], $data->data[$i][$j]);
                }
                if($col == $this->view_col) {
                    $data->data[$i][$j] = '<a href="'.url('/facturaxmls/'.$data->data[$i][0]).'">'.$data->data[$i][$j].'</a>';
                }
                // else if($col == "author") {
                //    $data->data[$i][$j];
                // }
            }
            
            if($this->show_action) {
                $output = '';
                if(Module::hasAccess("FacturaXMLs", "edit")) {
                    $output .= '<a href="'.url(config('laraadmin.adminRoute') . '/facturaxmls/'.$data->data[$i][0].'/edit').'" class="btn btn-warning btn-xs" style="display:inline;padding:2px 5px 3px 5px;"><i class="fa fa-edit"></i></a>';
                }
                
                if(Module::hasAccess("FacturaXMLs", "delete")) {
                    $output .= Form::open(['route' => [config('laraadmin.adminRoute') . '.facturaxmls.destroy', $data->data[$i][0]], 'method' => 'delete', 'style'=>'display:inline']);
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
