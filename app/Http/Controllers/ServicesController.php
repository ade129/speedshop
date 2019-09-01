<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Services;
use App\Models\Spareparts;
use App\Models\ServicesDetails;
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
            'service'=> Services::all(),
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
            'service' => Services::all(),
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
            'date_services' => 'required',
            'description' => 'required',
            'payment' => 'required',
            'change' => 'required',
            'grandtotal' => 'required',
            ]);
        
        $ServicesDetails = $request->idservicesdetails;
        $unit = $request->unit;
        $spareparts = $request->idspareparts;
        $totalharga = $request->totalharga;
        $spare = count ($spareparts);
        
        for ($i=0; $i < $spare; $i++) {
            if($spareparts[$i] == 0) {
                return redirect()->back()->with('status_error','Spareparts Empty');
            }elseif ($spareparts[$i] == 0) {
                return redirect()->back()->with('status_error','Unit Empty');
            }
        }

        $saveServices = new Services;
        $saveServices->code = $this->get_code();
        $saveServices->date_services = date('Y-m-d H:i:s');
        $saveServices->description = $request->description;
        $saveServices->payments = $request->payment;
        $saveServices->changes = $request->change;
        $saveServices->grandtotal = $request->grandtotal;
        $saveServices->save();

            for ($i=0; $i < $spare ; $i++) {
                $saveServicesDetails = new ServicesDetails;
                $saveServicesDetails->idservices = $saveServices->idservices;
                $saveServicesDetails->idspareparts = $spareparts[$i];
                $saveServicesDetails->unit = $unit[$i];
                $saveServicesDetails->totalharga = $totalharga[$i];
                $saveServicesDetails->save();
                return redirect('services')->with('status_success','Services updated');
            }

    }

    public function update_page(Services $service)//service memanggil dari Models
    {
        // $spareparts = Spareparts::where('active',1)->get();

        $services = Services::with(['services_details' => function($sc){
            $sc->with(['spareparts']);
        }
        ])->where('idservices',$service->idservices)
        ->first();
        // $services = Services::where('idservices',$service->idservices)->first();
        // dd($services);
        // return $services;
        // $test = Spareparts::where('active', true)->get();
        // // return $test;
        $contents = [
            'service' => $services,
            'spareparts' => Spareparts::where('active', true)->get(),
        ];

        $pagecontent = view('services.update',$contents);

            $pagemain = array(
            'title' => 'Service',
            'menu' => 'Service',
            'submenu' => '',
            'pagecontent' => $pagecontent,
        );

        return view('masterpage', $pagemain);
    }

    public function update_save(Request $request, Services $service)
    {
        // return $request->all();
        $request->validate([
            'date_services',
            'payment' => 'required',
        ]);
        
        $services_details = $request->idservicesdetails;
        $unit = $request->unit;
        $spareparts = $request->idspareparts;
        $totalharga = $request->totalharga;
        $spare = count ($spareparts);
        
        for ($i=0; $i < $spare; $i++) {
            if($spareparts[$i] == 0) {
                return redirect()->back()->with('status_error','Sparepart Empty');
            }elseif ($unit[$i] == 0) {
                return redirect()->back()->with('status_error','Quantity Empty');
            }elseif ($totalharga[$i] == 0) {
                return redirect()->back()->with('status_error','Payment Empty'); 
            }
        }
        $saveServices = Services::find($service->idservices);
        $saveServices->date_services = date('Y-m-d H:i:s');
        $saveServices->description = $request->description;
        $saveServices->payments = $request->payment;
        $saveServices->changes = $request->change;
        $saveServices->grandtotal = $request->grandtotal;
        $saveServices->save();

            for ($i=0; $i < $spare ; $i++) {
                if ($services_details[$i] == 'new'){
                    $saveServicesDetails = new ServicesDetails;
                    $saveServicesDetails->idservices = $saveServices->idservices;
                }
                else{
                    $saveServicesDetails = ServicesDetails::find($services_details[$i]);
                    }
                $saveServicesDetails->idspareparts = $spareparts[$i];
                $saveServicesDetails->unit = $unit[$i];
                $saveServicesDetails->totalharga = $totalharga[$i];
                $saveServicesDetails->save();
                }
                return redirect('services')->with('status_success','Service Updated');
    }   

    protected function get_code()
    {
        $date_ym = date('ym');
        $date_between = [date('Y-m-01 00:00:00'), date('Y-m-t 23:59:59')];

        $dataServices = Services::select('code')
            ->whereBetween('created_at',$date_between)
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