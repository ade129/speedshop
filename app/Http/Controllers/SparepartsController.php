<?php

namespace App\Http\Controllers;

use App\Models\Spareparts;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use File;
use Illuminate\Support\Str;
use Image;


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
            // 'images' => 'required|file|mimes:jpeg,jpg,png|max:1024'
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
        if ($request->hasFile('images')){
            $image = $request->file('images');
            $re_image = Str::random(20).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save( public_path('/spare_image/' . $re_image) );
            $saveSpareparts->images = $re_image;
        }
        // return $request->all();
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

    public function change_image(Request $request,Spareparts $spareparts)
    {
        
        // return $request->file('images');
        $save_image = Spareparts::find($spareparts->idspareparts);
        
        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $re_image = Str::random(20).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save( public_path('/spare_image/' . $re_image) );
            $save_image->images = $re_image;
        }
        $save_image->save();
        return redirect('spareparts/update/'.$spareparts->idspareparts)->with('status_success','Change  Image');
        // $request->file('images');
    }
    File::delete($filename);
}
