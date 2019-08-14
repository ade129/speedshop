<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Spareparts;
use App\Models\Categories;
use Illuminate\Http\Request;


class SparepartsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contents = [
            'spareparts' => Spareparts::with(['categories'])->get(),
        ];

        $pagecontent = view('spareparts.index',$contents);

            $pagemain = array(
            'title' => 'Sparepart',
            'menu' => 'Master',
            'submenu' => 'sparepart',
            'pagecontent' => $pagecontent,
        );

        return view('masterpage', $pagemain);
    }

    public function create_page()
    {
        $categories = Categories::all();

        $contents = [
            'categories' => $categories,
            'sparepart' => Spareparts::all(),
        ];

        $pagecontent = view('spareparts.create',$contents);

            $pagemain = array(
            'title' => 'Sparepart',
            'menu' => 'Master',
            'submenu' => 'sparepart',
            'pagecontent' => $pagecontent,
        );

        return view('masterpage', $pagemain);
    }
    public function save_page(Request $request)
    {
        $request->validate([
            'namespareparts' => 'required',
            'codespareparts' => 'required',
            'brand' => 'required',
            'unit' => 'required',
            'active' => '',
        ]);
        $active = FALSE;
        if($request->has('active')) {
            $active = TRUE;
        }

        $saveSpareparts = new Spareparts;
        $saveSpareparts->namespareparts = $request->namespareparts;
        $saveSpareparts->idcategories = $request->idcategories;
        $saveSpareparts->codespareparts = $request->codespareparts;
        $saveSpareparts->brand = $request->brand;
        $saveSpareparts->price = $request ->price;
        $saveSpareparts->actcost = $request ->actcost;
        $saveSpareparts->forecast = $request ->forecast;
        $saveSpareparts->unit = $request->unit;
        $saveSpareparts->active = $active;
        $saveSpareparts->save();
        return redirect('spareparts')->with('Status Success','Sparepart Created');
    }

    public function update_page(Spareparts $spareparts)
    {
        // return $spareparts;
        
        $categories = Categories::all();

        $contents = [
            'categories' => $categories,
            'spareparts' => Spareparts::find($spareparts->idspareparts),
        ];

        $pagecontent = view('spareparts.update',$contents);

            $pagemain = array(
            'title' => 'Sparepart',
            'menu' => 'Master',
            'submenu' => 'sparepart',
            'pagecontent' => $pagecontent,
        );

        return view('masterpage', $pagemain);
    }

    public function update_save(Request $request, Spareparts $spareparts)
    {
        // return $request->all();
        $request->validate([
            'namespareparts' => 'required|max:100',
            'codespareparts' => 'required',
            'brand' => 'required',
            'price' => 'required',
            'actcost' => 'required',
            'forecast' => 'required',
            'unit' => 'required',
            'active' => ''
            ]);
            $active = FALSE;
            if($request->has('active')) {
                $active = TRUE;
            }
            $updateSpareparts = Spareparts::find($spareparts->idspareparts);
            $updateSpareparts->namespareparts = $request->namespareparts;
            $updateSpareparts->idcategories = $request->idcategories;
            $updateSpareparts->codespareparts = $request->codespareparts;
            $updateSpareparts->brand = $request->brand;
            $updateSpareparts->price = $request ->price;
            $updateSpareparts->actcost = $request ->actcost;
            $updateSpareparts->forecast = $request ->forecast;
            $updateSpareparts->unit = $request->unit;
            $updateSpareparts->active = $active;            
            $updateSpareparts->save();
              return redirect('spareparts')->with('status_success','Update Sparepart');
            
    }
}
