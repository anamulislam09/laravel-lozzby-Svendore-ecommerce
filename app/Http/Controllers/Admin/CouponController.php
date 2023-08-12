<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

     // show data using data table 
     public function index(Request $request)
     {
         if ($request->ajax()) {
             $data = Coupon::all();
             return DataTables::of($data)->addIndexColumn()
                 ->addColumn('action', function ($row) {
                     $actionbtn = '<a href="" id="edit" class="btn btn-sm btn-info" data-id="' . $row->id . '" data-toggle="modal" data-target="#editbrandModel"><i class="fas fa-edit"></i></a>
 
                 <a href="' .route('coupon.delete', [$row->id]). '" id="delete_coupon" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>';
                     return $actionbtn;
                 })->rawColumns(['action'])
                 ->make(true);
         }
         return view('admin.offer.coupon.index');
     }

     
    //  destroy method 
    public function destroy($id){
        $data = Coupon::findOrFail($id);
        // dd($data);
        $data->delete();
        return response()->json('Coupon deleted');
    }

}
