<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Show categories 
    public function index()
    {
        $subcats = DB::table('subcategories')->leftJoin('categories', 'subcategories.category_id', 'categories.id')->select('subcategories.*', 'categories.category_name')->get();
        return view('admin.categories.subcategory.index', compact('subcats'));
    }

    // create subcategory
    public function create()
    {
        $cats = Category::all();
        return view('admin.categories.subcategory.create', compact('cats'));
    }

    // store subcategory
    public function store(Request $request)
    {
        $request->validate([
            'subcategory_name' => 'required|unique:subcategories|max:50',
            'category_id' => 'required '
        ]);

        $category_id = $request->category_id;
        //    $category_name = Category::where('id', $category_id)->value('category_name');

        Subcategory::insert([
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => Str::slug($request->subcategory_name, '-'),
            'category_id' => $category_id,
        ]);
        $notification = array('message' => 'Subcategory added successfully.', 'alert_type' => 'success');
        return redirect()->route('subcategory.index')->with($notification);
    }

    // category edit method
    public function edit($id)
    {
        // using eloquent orm
        $data = SubCategory::findOrFail($id);
        $cats = Category::all();
        return view('admin.categories.subcategory.edit', compact('data', 'cats'));
    }

    // category update method
    public function update(Request $request)
    {       
         $request->validate([
            'subcategory_name' => 'required|unique:subcategories|max:255',
            'category_id' => 'required '
        ]);
        $id = $request->id;
        // using queryBuilder
        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['category_slug'] = Str::slug($request->category_name, '-');
        // DB::table('categories')->where("id", $id)->update($data);

        // Using Querybuilder
        $data = SubCategory::findOrFail($id);
        $data->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => Str::slug($request->subcategory_name, '-'),
        ]);
        $notification = array('message' => 'Subcategory updated successfully.', 'alert_type' => 'success');
        return redirect()->route('subcategory.index')->with($notification);
    }


    // DESTROY method
    public function destroy($id)
    {
        $data = SubCategory::findOrFail($id);
        $data->delete();

        $notification = array('message' => 'SubCategory deleted successfully.', 'alert_type' => 'success');
        return redirect()->route('subcategory.index')->with($notification);
    }
}
