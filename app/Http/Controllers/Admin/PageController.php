<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // shoe ages 
    public function index()
    {
        $pages = DB::table('pages')->latest()->get();
        return view('admin.settings.page.index', compact('pages'));
    }

    // shoe ages 
    public function create()
    {
        $pages = DB::table('pages')->latest()->get();
        return view('admin.settings.page.create', compact('pages'));
    }

    // store Service category
    public function store(Request $request)
    {
        $request->validate([
            'page_position' => 'required',
            'page_name' => 'required|unique:pages|max:55',
            'page_title' => 'required|',
            'page_description' => 'required|',
        ]);

        // using eloquent orm
        Page::insert([
            'page_position' => $request->page_position,
            'page_name' => $request->page_name,
            'page_slug' => Str::slug($request->page_name, '-'),
            'page_title' => $request->page_title,
            'page_description' => $request->page_description,
        ]);
        $notification = array('message' => 'Page added successfully.', 'alert_type' => 'success');
        return redirect()->route('page.index')->with($notification);
    }

    //  edit page
    public function edit($id)
    {
        $data = Page::findOrFail($id);
        return view('admin.settings.page.edit', compact('data'));
    }

    // Update Service category
    public function update(Request $request)
    {
        $request->validate([
            'page_position' => 'required',
            'page_name' => 'required|max:55',
            'page_title' => 'required|',
            'page_description' => 'required|',
        ]);

        $id = $request->id;
        $data = Page::findOrFail($id);
        // using eloquent orm
        $data->update([
            'page_position' => $request->page_position,
            'page_name' => $request->page_name,
            'page_slug' => Str::slug($request->page_name, '-'),
            'page_title' => $request->page_title,
            'page_description' => $request->page_description,
        ]);
        $notification = array('message' => 'Page updated successfully.', 'alert_type' => 'success');
        return redirect()->route('page.index')->with($notification);
    }

    //  Delete page
    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();
        $notification = array('message' => 'Page deleted successfully.', 'alert_type' => 'success');
        return redirect()->route('page.index')->with($notification);
    }
}
