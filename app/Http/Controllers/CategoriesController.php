<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('admin');
    }
    public function index()
    {
        $contents = [
            'categories' => Categories::all(),
        ];

        $pagecontent = view('categories.index',$contents);

        // masterpage
        $pagemain = array(
            'title' => 'Categories',
            'menu' => 'Master',
            'submenu' => 'categories',
            'pagecontent' => $pagecontent,
        );

        return view('masterpage', $pagemain);
    }

    public function create_page()
    {
        $contents = [
            'categories' => Categories::all(),
        ];
        $pagecontent = view('categories.create',$contents);

        // masterpage
        $pagemain = array(
            'title' => 'Categories',
            'menu' => 'categories',
            'submenu' => 'categories',
            'pagecontent' => $pagecontent,
        );

        return view('masterpage', $pagemain);
    }

    public function save_page(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $saveCategories = new Categories;
        $saveCategories->name = $request->name;
        $saveCategories->save();
        return redirect('categories')->with('Status Success','Categories Created');
    }
    public function update_page(Categories $categories)
    {
        $contents = [
            'categories' => Categories::find($categories->idcategories),
        ];
        $pagecontent = view('categories.update',$contents);

        // return $contents;

        // masterpage
        $pagemain = array(
            'title' => 'Categories',
            'menu' => 'categories',
            'submenu' => 'categories',
            'pagecontent' => $pagecontent,
        );

        return view('masterpage', $pagemain);   
    }

    public function update_save(Request $request, Categories $categories)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required',
        ]);
        $saveCategories =  Categories::find($categories->idcategories);
        $saveCategories->name = $request->name;
        $saveCategories->save();
        return redirect('categories')->with('Status Success','Categories Created');
    }

}
