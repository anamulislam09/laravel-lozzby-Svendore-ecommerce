<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Childcategory;
use App\Models\pickup_point;
use App\Models\Product;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // index method 
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $imgurl = "files/product";
            $product = "";
            $query = DB::table('products')->leftJoin('categories', 'products.category_id', 'categories.id')
                ->leftJoin('subcategories', 'products.subcategory_id', 'subcategories.id')
                ->leftJoin('brands', 'products.brand_id', 'brands.id');
            if ($request->category_id) {
                $query->where('products.category_id', $request->category_id);
            }
            if ($request->brand_id) {
                $query->where('products.brand_id', $request->brand_id);
            }
            if ($request->warehouse_id) {
                $query->where('products.warehouse', $request->warehouse_id);
            }
            if($request->status==1){
                $query->where('products.status',1);
            }elseif($request->status==0){
                $query->where('products.status',0);
            }
            $product = $query->select('products.*', 'categories.category_name', 'subcategories.subcategory_name', 'brands.brand_name')->get();
            return DataTables::of($product)
                ->addIndexColumn()
                //featured column start here
                ->editColumn('featured', function ($row) {
                    if ($row->featured == 1) {
                        return ' <a href="#" data-id= "' . $row->id . '" class="deactive_featured" ><i class="fas fa-thumbs-down text-danger pr-1"></i><span class="badge badge-success ">active</span></a>';
                    } else {
                        return ' <a href="#" data-id= "' . $row->id . '" class="active_featured" ><i class="fas fa-thumbs-up text-primary pr-1"></i><span class="badge badge-danger ">deactive</span></a>';
                    }
                })         //featured column ends here
                //today_deal column start here
                ->editColumn('today_deal', function ($row) {
                    if ($row->today_deal == 1) {
                        return ' <a href="#" data-id= "' . $row->id . '"class="deactive_todayDeal" ><i class="fas fa-thumbs-down text-danger pr-1"></i><span class="badge badge-success ">active</span></a>';
                    } else {
                        return ' <a href="#" data-id= "' . $row->id . '" class="active_todayDeal" ><i class="fas fa-thumbs-up text-primary pr-1"></i><span class="badge badge-danger ">deactive</span></a>';
                    }
                })         //today_deal column ends here
                //status column start here
                ->editColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return ' <a href="#" data-id= "' . $row->id . '"class="deactive_status" ><i class="fas fa-thumbs-down text-danger pr-1"></i><span class="badge badge-success ">active</span></a>';
                    } else {
                        return ' <a href="#" data-id= "' . $row->id . '" class="active_status" ><i class="fas fa-thumbs-up text-primary pr-1"></i><span class="badge badge-danger ">deactive</span></a>';
                    }
                })         //status column ends here
                ->addColumn('action', function ($row) {
                    $actionbtn = ' 
                    <a href="' . route('product.edit', [$row->id]) . '" class="btn btn-sm btn-info" ><i class="fas fa-edit"></i></a> 
                    <a href="" class="btn btn-sm btn-primary" ><i class="fas fa-eye"></i></a> 
                     <a href="' . route('product.delete', [$row->id]) . '"  class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>';
                    return $actionbtn;
                })
                ->rawColumns(['action', 'category_name', 'subcategory_name', 'featured', 'today_deal', 'status'])
                ->make(true);
        }

        $category = Category::all();
        $brand = Brand::all();
        $warehouse = Warehouse::all();
        return view('admin.product.index', compact('category', 'brand', 'warehouse'));
    }


    // Featured method start here
    // activeFeatured method 
    public function activeFeatured($id)
    {
        DB::table('products')->where('id', $id)->update(['featured' => 1]);
        return response()->json('Product Featured Activated');
    }
    // notFeatured method 
    public function notFeatured($id)
    {
        $data = Product::findOrFail($id);
        // DB::table('products')->where('id',$id)->update(['featured'=>0]);
        $data->update(['featured' => 0]);
        return response()->json('Product Not Featured');
    }
    // Featured method ends here

    // today deal method start here
    // activeTodayDeal method 
    public function activeTodayDeal($id)
    {
        $data = Product::findOrFail($id);
        // DB::table('products')->where('id',$id)->update(['featured'=>0]);
        $data->update(['today_deal' => 1]);
        return response()->json('Today deal Activated');
    }
    // notTodayDeal method 
    public function notTodayDeal($id)
    {
        DB::table('products')->where('id', $id)->update(['today_deal' => 0]);
        return response()->json('Today deal not Activated');
    }
    // today deal method ends here

    // status method start here
    // activeTodayDeal method 
    public function activeStatus($id)
    {
        $data = Product::findOrFail($id);
        // DB::table('products')->where('id',$id)->update(['featured'=>0]);
        $data->update(['status' => 1]);
        return response()->json('Product status Activated');
    }
    // notTodayDeal method 
    public function notActiveStatus($id)
    {
        DB::table('products')->where('id', $id)->update(['status' => 0]);
        return response()->json('Product status Not Activated');
    }
    // status method ends here


    // Product create page 
    // create child category 
    public function create()
    {
        $cats = Category::all();
        // $childcats = Childcategory::all();
        $brands = Brand::all();
        $pic_poines = pickup_point::all();
        $warehouses = Warehouse::all();
        return view('admin.product.create', compact('cats', 'brands', 'pic_poines', 'warehouses'));
    }
    // insert sub category category using ajax request
    public function subcategory(Request $request)
    {
        $categoryid = $request->post('categoryid');
        $subcategory = DB::table('subcategories')->where('category_id', $categoryid)->orderBy('subcategory_name', 'ASC')->get();
        $html = '<option value="" selected disabled>Select One</option>';
        foreach ($subcategory as $list) {
            $html .= '<option value="' . $list->id . '">' . $list->subcategory_name . '</option>';
        }
        echo $html;
    }
    // insert sub category category using ajax request
    public function childcategory(Request $request)
    {
        $childCatid = $request->post('childCatid');
        $childCategory = DB::table('childcategories')->where('subcategory_id', $childCatid)->orderBy('childcategory_name', 'ASC')->get();
        $html = '<option value="" selected disabled>Select One</option>';
        foreach ($childCategory as $list) {
            $html .= '<option value="' . $list->id . '">' . $list->childcategory_name . '</option>';
        }
        echo $html;
    }


    public function store(Request $request)
    {
        // dd($request);
        $slug = Str::slug($request->product_name, '-');
        // Image upload start here
        $thumbnail = $request->product_thumbnail;
        $thumbnail_name = $slug . '.' . $thumbnail->getClientOriginalExtension();
        $thumbnail->move(public_path('files/product'), $thumbnail_name);
        $thumbnail_url = 'files/product/' . $thumbnail_name;

        // multiple image ulpload 
        $images = array();
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $image) {
                $imageName = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('files/product'), $imageName);
                array_push($images, $imageName);
            }
        }

        Product::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'childcategory_id' => $request->childcategory_id,
            'brand_id' => $request->brand_id,
            'product_name' => $request->product_name,
            'product_slug' => Str::slug($request->product_name, '-'),
            'product_code' => $request->product_code,
            'product_unit' => $request->product_unit,
            'product_tags' => $request->product_tags,
            'product_color' => $request->product_color,
            'product_size' => $request->product_size,
            'product_video' => $request->product_video,
            'purchase_price' => $request->purchase_price,
            'selling_price' => $request->selling_price,
            'descount_price' => $request->descount_price,
            'stock_quantity' => $request->stock_quantity,
            'warehouse' => $request->warehouse,
            'product_description' => $request->product_description,
            'product_thumbnail' => $thumbnail_url,
            'images' => json_encode($images),
            'featured' => $request->featured,
            'product_slider' => $request->product_slider,
            'status' => $request->status,
            'trendy' => $request->trendy,
            'today_deal' => $request->today_deal,
            'cash_on_delivery' => $request->cash_on_delivery,
            'admin_id' => Auth::id(),
            'pickup_point_id' => $request->pickup_point_id,
            // 'date' => date('d-m-Y'),
            // 'month' => date('F'),

        ]);
        $notification = array('message' => 'Product added successfully.', 'alert_type' => 'success');
        return redirect()->route('product.index')->with($notification);
        // return redirect()->route('product.index')->with($notification);
    }


    // destroy method 
    public function edit($id){

        $cats = Category::all();
        $brands = Brand::all();
        $pic_poines = pickup_point::all();
        $warehouses = Warehouse::all();

        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('product','cats','brands','pic_poines','warehouses'));
    }


    // destroy method 
    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        $data->delete();
        // return response()->json('Product deleted successfully');
        $notification = array('message' => 'Product deleted successfully.', 'alert_type' => 'danger');
        return redirect()->route('product.index')->with($notification);
    }
}
