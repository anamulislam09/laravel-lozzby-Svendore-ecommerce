<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\pickup_point;
use Illuminate\Http\Request;
use Illuminate\Support\Str;;

use Yajra\DataTables\Facades\DataTables;


class pickupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // show data using data table 
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = pickup_point::all();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionbtn = '<a href="" id="edit" class="btn btn-sm btn-info" data-id="' . $row->id . '" data-toggle="modal" data-target="#editPickupModel"><i class="fas fa-edit"></i></a>
  
                  <a href="' . route('coupon.delete', [$row->id]) . '" id="delete_coupon" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>';
                    return $actionbtn;
                })->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.pickup_point.index');
    }

    //  create pickup 
    public function create()
    {
        return view('admin.pickup_point.create');
    }

    //  store pickup 
    public function store(Request $request)
    {

        // using eloquent orm
        pickup_point::insert([
            'pickup_point_name' => $request->pickup_point_name,
            'pickup_point_address' => $request->pickup_point_address,

            'pickup_point_phone' => $request->pickup_point_phone,
            'pickup_point_phone_two' => $request->pickup_point_phone_two,
        ]);
        $notification = array('message' => 'Pickup added successfully.', 'alert_type' => 'success');
        return redirect()->route('pickup_point.index')->with($notification);
    }


    //  create pickup 
    public function edit($id)
    {
        $data = pickup_point::findOrFail($id);
        return response()->json($data);
    }


     //  Update pickup 
     public function update(Request $request)
     {
        $id = $request->id;
        $data = pickup_point::findOrFail($id);
         // using eloquent orm
         $data->update([
             'pickup_point_name' => $request->pickup_point_name,
             'pickup_point_address' => $request->pickup_point_address,
 
             'pickup_point_phone' => $request->pickup_point_phone,
             'pickup_point_phone_two' => $request->pickup_point_phone_two,
         ]);
         $notification = array('message' => 'Pickup updated successfully.', 'alert_type' => 'success');
         return redirect()->route('pickup_point.index')->with($notification);
     }

}
