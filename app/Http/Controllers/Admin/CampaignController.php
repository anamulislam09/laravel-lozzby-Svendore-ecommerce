<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class CampaignController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // show data using data table 
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Campaign::all();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionbtn = '<a href="" id="edit" class="btn btn-sm btn-info" data-id="' . $row->id . '" data-toggle="modal" data-target="#editbrandModel"><i class="fas fa-edit"></i></a>

                <a href="' . route('campaign.delete', [$row->id]) . '"  class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>';
                    return $actionbtn;
                })->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.Campaign.index');
    }

    // create campaign 

    public function create(){
        return view('admin.Campaign.create');
    }

     // Store campaign  
     public function store(Request $request)
     {
         $request->validate([
             'title' => 'required|unique:campaigns',
             'start_date' => 'required',
             'image' => 'required',
            //  'discount' => 'required',
         ]);
         // Image upload start here
         $slug = Str::slug($request->title, '-');
         $image = $request->image;
         $img_name =$slug . '.' . $image->getClientOriginalExtension();
         $image->move(public_path('files/campaign'), $img_name);
         $img_url = 'files/campaign/' . $img_name;
 
         // using eloquent orm
         Campaign::insert([
             'title' => $request->title,
             'start_date' => $request->start_date,
             'end_date' => $request->end_date,
             'image' => $img_url,
             'status' => $request->status,
             'discount' => $request->discount,
             'month' => $request->month,
             'year' => $request->year,
         ]);
 
         $notification = array('message' => 'Campaign added successfully.', 'alert_type' => 'success');
         return redirect()->route('campaign.index')->with($notification);
     }

  // delete campaign  
     public function destroy($id)
     {
         $data = Campaign::findOrFail($id);
         $image = $data->image;
         if(File::exists($image)){       //delete image from folder
             unlink($image);
         };
         $data = Campaign::findOrFail($id);
         $data->delete();
         $notification = array('message' => 'Campaign deleted successfully.', 'alert_type' => 'success');
         return redirect()->route('campaign.index')->with($notification);
     }
}
