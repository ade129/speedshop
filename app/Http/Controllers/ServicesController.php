<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Services;
use App\Models\Spareparts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contents = [
            'services'=> Services::all(),
        ];
        
        $pagecontent = view('services.index',$contents);

        // masterpage
        $pagemain = array(
            'title' => 'Service',
            'menu' => 'service',
            'submenu' => '',
            'pagecontent' => $pagecontent,
        );

        return view('masterpage', $pagemain);
    }

    public function create_page()
    {
        $spareparts = Spareparts::where('active',1)->get();
        // dd($spareparts);
        $contents = [
            'spareparts' => $spareparts,
            'services' => Services::all(),
        ];

        $pagecontent = view('services.create',$contents);

            $pagemain = array(
            'title' => 'Service',
            'menu' => 'Service',
            'submenu' => '',
            'pagecontent' => $pagecontent,
        );

        return view('masterpage', $pagemain);
    }
    
    public function save_page(Request $request)
    {
        $request->validate([
            'description' => 'required',
            ]);
        
        $ServicesDetails = $request->idservicesdetails;
        $saveServices->code = $this->get_code;
        $saveServices->idservices = $request->nameservices;
        $saveServices->namespareparts = $request->idspareparts;
        $saveServices->dateservices = date('Y-m-d H:i:s');
        $saveServices->description = $request->description;
        $saveServices->progress = 'p';
        $saveServices->save();
        return redirect('services')->with('Status Success','Service Created');
    }

    protected function get_code()
    {
        $date_ym = date('ym');
        $date_between = [date('Y-m-01 00:00:00'), date('Y-m-t 23:59:59')];

        $dataServices = Services::select('code')
            ->whereBetween('created_at',$date_between)
            ->serviceBy('code',   'desc')
            ->first();

        if(is_null($dataServices)) {
            $nowcode = '00001';
        } else {
            $lastcode = $dataServices->code;
            $lastcode1 = intval(substr($lastcode, -5))+1;
            $nowcode = str_pad($lastcode1, 5, '0', STR_PAD_LEFT);
        }

        return 'PO-'.$date_ym.'-'.$nowcode;
    }
}