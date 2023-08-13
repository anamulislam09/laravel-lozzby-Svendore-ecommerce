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
                    $actionbtn = '<a href="" id="edit" class="btn btn-sm btn-info" data-id="' . $row->id . '" data-toggle="modal" data-target="#editCouponModel"><i class="fas fa-edit"></i></a>
 
                 <a href="' . route('coupon.delete', [$row->id]) . '" id="delete_coupon" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>';
                    return $actionbtn;
                })->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.offer.coupon.index');
    }

    // store Service category
    public function create()
    {
    return view('admin.offer.coupon.create');
    }

    // store Service category
    public function store(Request $request)
    {
        Coupon::insert([
            'coupon_code' => $request->coupon_code,
            'valid_date' => $request->valid_date,
            'type' => $request->type,
            'coupon_amount' => $request->coupon_amount,
            'status' => $request->status,
        ]);

        $notification = array('message' => 'Coupon added successfully.', 'alert_type' => 'success');
        return redirect()->route('coupon.index')->with($notification);
    }

    // category edit method 
    public function edit($id)
    {
        $data = Coupon::findOrFail($id);
        return response()->json($data);
    }

      // Update Service category
      public function update(Request $request)
      {
        $id = $request->id;
        $data = Coupon::findOrFail($id);
        $data->update([
              'coupon_code' => $request->coupon_code,
              'valid_date' => $request->valid_date,
              'type' => $request->type,
              'coupon_amount' => $request->coupon_amount,
              'status' => $request->status,
          ]);
  
          $notification = array('message' => 'Coupon Updated successfully.', 'alert_type' => 'success');
          return redirect()->route('coupon.index')->with($notification);
      }

    //  destroy method 
    public function destroy($id)
    {
        $data = Coupon::findOrFail($id);
        $data->delete();
        return response()->json('Coupon deleted');
    }
}
