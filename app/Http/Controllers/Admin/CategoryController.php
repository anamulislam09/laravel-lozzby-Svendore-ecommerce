<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Show categories 
    public function index()
    {
        $cats = Category::all();
        return view('admin.categories.category.index', compact('cats'));
    }
    
    // create categories 
    public function create()
    {
        return view('admin.categories.category.create');
    }

     // store Service category
     public function store(Request $request)
     {
        $request->validate([
             'category_name' => 'required|unique:categories|max:255',
         ]);

         // using eloquent orm
         Category::insert([
             'category_name' => $request->category_name,
             'category_slug' => Str::slug($request->category_name, '-'),
         ]);
         $notification = array('message'=>'Category added successfully.','alert_type'=>'success');
         return redirect()->route('category.index')->with($notification);
     }
 
     // category edit method 
     public function edit($id)
     {
         // using query builder 
         // $data = DB::table('categories')->where('id', $id)->first();
 
         // using eloquent orm 
         $data = Category::findOrFail($id);
         return response()->json($data);
     }
     // category update method 
     public function update(Request $request)
     {
        $request->validate([
             'category_name' => 'required|unique:categories|max:255',
         ]);
         $id = $request->id;
         // using queryBuilder 
         // $data = array();
         // $data['category_name'] = $request->category_name;
         // $data['category_slug'] = Str::slug($request->category_name, '-');
         // DB::table('categories')->where("id", $id)->update($data);
 
         // Using Querybuilder 
         $data = Category::findOrFail($id);
         $data->update([
             'category_name' => $request->category_name,
             'category_slug' => Str::slug($request->category_name, '-'),
         ]);

         $notification = array('message'=>'Category updated successfully.','alert_type'=>'success');
        return redirect()->route('category.index')->with($notification);
     }
 
 
     public function destroy($id)
     {
         // using query builder 
         // DB::table('categories')->where('id', $id)->delete();
         // Using Eloquent Orm 
 
         // Using querybuilder 
         $data = Category::findOrFail($id);
         $data->delete();
         $notification = array('message'=>'Category deleted successfully.','alert_type'=>'success');
        return redirect()->route('category.index')->with($notification);
     }
}
