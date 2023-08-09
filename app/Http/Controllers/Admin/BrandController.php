<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // show data using data table 
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Brand::all();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionbtn = '<a href="" id="edit" class="btn btn-sm btn-info" data-id="' . $row->id . '" data-toggle="modal" data-target="#editbrandModel"><i class="fas fa-edit"></i></a>

                <a href="' . route('brand.delete', [$row->id]) . '"  class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>';
                    return $actionbtn;
                })->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.categories.brand.index');
    }

    // create data  
    public function create()
    {
        return view('admin.categories.brand.create');
    }

    // Store data  
    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|unique:brands|max:50',
        ]);
        $slug = Str::slug($request->brand_name, '-');
        // Image upload start here
        $image = $request->brand_logo;
        $img_name = $slug . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('files/brand'), $img_name);
        $img_url = 'files/brand/' . $img_name;

        // using eloquent orm
        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_slug' => Str::slug($request->brand_name, '-'),
            'brand_logo' => $img_url,
        ]);

        $notification = array('message' => 'Brand added successfully.', 'alert_type' => 'success');
        return redirect()->route('brand.index')->with($notification);
    }

    // childcategory edit method 
    public function edit($id)
    {
        $data = Brand::findOrFail($id);
        return response()->json($data);
    }

    // childcategory Update method 
    public function update(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|unique:brands|max:50',
        ]);
        $id = $request->id;
        $data = Brand::findOrFail($id);
        $data->update([
            'brand_name' => $request->brand_name,
            'brand_slug' => Str::slug($request->brand_name, '-'),
        ]);

        $notification = array('message' => 'Brand updated successfully.', 'alert_type' => 'success');
        return redirect()->route('brand.index')->with($notification);
    }


    public function destroy($id)
    {
        $data = Brand::findOrFail($id);
        $image = $data->brand_logo;
        if(File::exists($image)){       //delete image from folder
            unlink($image);
        };
        $data = Brand::findOrFail($id);
        $data->delete();
        $notification = array('message' => 'Brand deleted successfully.', 'alert_type' => 'success');
        return redirect()->route('brand.index')->with($notification);
    }
}
