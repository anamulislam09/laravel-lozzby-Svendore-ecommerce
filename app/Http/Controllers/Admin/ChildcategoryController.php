<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Childcategory;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ChildcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Show child category using yajra datatable 
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = DB::table('childcategories')->leftJoin('categories', 'childcategories.category_id', 'categories.id')->leftJoin('subcategories', 'childcategories.subcategory_id', 'subcategories.id')->select('childcategories.*', 'categories.category_name', 'subcategories.subcategory_name')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionbtn = ' <a href="" id="edit" class="btn btn-sm btn-info" data-id="'.$row->id .'" data-toggle="modal" data-target="#editchildCatModel"><i class="fas fa-edit"></i></a> 
            <a href="'.route('childcategory.delete',[$row->id]).'"  class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>';
                    return $actionbtn;
                })  
                ->rawColumns(['action'])
                ->make(true);
        }

        $cats = Category::all();
        return view('admin.categories.childcategory.index', compact('cats'));
    }

        // create child category 
    public function create(){
        $cats = Category::all();
        // $subcats = Subcategory::all();
        return view('admin.categories.childcategory.create', compact('cats'));
    }
    // insert sub category category using ajax request
    public function subcategory(Request $request){
        $categoryid = $request->post('categoryid');
        $subcategory = DB::table('subcategories')->where('category_id', $categoryid)->orderBy('subcategory_name','ASC')->get();
        $html = '<option value="" selected disabled>Select One</option>';
        foreach($subcategory as $list){
            $html .= '<option value="'.$list->id.'">'.$list->subcategory_name.'</option>';
        }
        echo $html;
    }

    // store child category 
    public function store(Request $request){

        // dd($request);
        
        $request->validate([
            'childcategory_name' => 'required|unique:childcategories|max:50',
            'subcategory_id' => 'required ',
            'category_id' => 'required '
        ]);

        $category_id = $request->category_id;
        $subcategory_id = $request->subcategory_id;
        //    $category_name = Category::where('id', $category_id)->value('category_name');

        Childcategory::insert([
            'childcategory_name' => $request->childcategory_name,
            'childcategory_slug' => Str::slug($request->childcategory_name, '-'),
            'subcategory_id' => $subcategory_id,
            'category_id' => $category_id,
        ]);
        $notification = array('message' => 'childcategory added successfully.', 'alert_type' => 'success');
        return redirect()->route('childcategory.index')->with($notification);
    }

      // childcategory edit method 
      public function edit($id)
      {
          $data = Childcategory::findOrFail($id);
          return response()->json($data);
      }
      // childcategory Update method 
      public function update(Request $request)
      {
        $request->validate([
            'childcategory_name' => 'required|unique:childcategories|max:50',
            'subcategory_id' => 'required ',
            'category_id' => 'required '
        ]);

        $category_id = $request->category_id;
        $subcategory_id = $request->subcategory_id;
        $id = $request->id;
        $data = Childcategory::findOrFail($id);
        $data->update([
            'childcategory_name' => $request->childcategory_name,
            'childcategory_slug' => Str::slug($request->childcategory_name, '-'),
            'subcategory_id' => $subcategory_id,
            'category_id' => $category_id,
        ]);
        $notification = array('message' => 'childcategory updated successfully.', 'alert_type' => 'success');
        return redirect()->route('childcategory.index')->with($notification);
      }


      // childcategory delete method 
      public function destroy($id)
      {
          $data = Childcategory::findOrFail($id);
          $data->delete();
          $notification = array('message' => 'Subcategory deleted successfully.', 'alert_type' => 'success');
          return redirect()->route('childcategory.index')->with($notification);
      }
}
