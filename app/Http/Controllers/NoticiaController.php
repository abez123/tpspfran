<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Noticia;
/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class NoticiaController extends Controller
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
    public function index()
    {
            $noticias = Noticia::paginate(4);
                return view('noticias',compact('noticias'));
    
    }

        /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function detail($id)
    {
            $noticia = Noticia::find($id);
                return view('noticia-post',compact('noticia'));
    
    }
}