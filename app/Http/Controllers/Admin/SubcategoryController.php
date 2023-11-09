<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
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
        $subcats = DB::table('subcategories')->leftJoin('categories', 'subcategories.category_id', 'categories.id')->select('subcategories.*', 'categories.category_name')->orderBy('id','DESC')->get();
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
            'category_id' => 'required ',
            'home_page' => 'required '
        ]);

        $category_id = $request->category_id;
        //    $category_name = Category::where('id', $category_id)->value('category_name');

        $slug = Str::slug($request->subcategory_name, '-');
        $image = $request->image;
        $img_name = $slug . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('files/subcategory'), $img_name);
        $img_url = 'files/subcategory/' . $img_name;


        Subcategory::insert([
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => Str::slug($request->subcategory_name, '-'),
            'image' => $img_url,
            'home_page' => $request->home_page,
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
        $id = $request->id;
        // Using Querybuilder
        $data = SubCategory::findOrFail($id);
        $data['category_id'] = $request->category_id;
        $data['subcategory_name'] = $request->subcategory_name;
        $data['home_page'] = $request->home_page;
        $data['image'] = $request->image;;
        $data['subcategory_slug'] = Str::slug($request->subcategory_name, '-');
        // dd($data);
        // $data->update([
        //     'category_id' => $request->category_id,
        //     'subcategory_name' => $request->subcategory_name,
        //     'subcategory_slug' => Str::slug($request->subcategory_name, '-'),
        //     'image' => $request->image,
        // ]);

        if ($request->image) {
            if (File::exists($request->old_image)) {
                unlink($request->old_image);
            }
            $slug = Str::slug($request->subcategory_name, '-');
            $image = $request->image;
            $img_name = $slug . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('files/subcategory'), $img_name);
            $img_url = 'files/subcategory/' . $img_name;
            $data['image'] = $img_url;
        } else {
            $data['image'] = $request->old_image;
        }
        $data->save();
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
