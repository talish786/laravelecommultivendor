<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::all();
        return view('backend.banners.index',['banners'=>$banners]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => ['string','required'],
            'description' => ['string','nullable'],
            'photo' => ['required'],
            'condition' => ['string','in:banner,promo'],
            'status' => ['string','in:active,inactive'],
        ]);
        $data = $request->all();
        $slug = Str::slug($request->input('title'));
        $photoName = time().'_'.$request->file('photo')->getClientOriginalName();
        $filePath = $request->file('photo')->storeAs('uploads/banners', $photoName, 'public');
        $filePath = '/storage/' . $filePath;
        $slug_count = Banner::where('slug',$slug)->count();
        if($slug_count > 0){
            $slug = $time.'-'.$slug;
        }
        $data['slug'] = $slug;
        $data['photo'] = $filePath;
        $status = Banner::create($data);
        if ($status) {
            return redirect()->route('banners.index')->with('success','Successfully Created Banner');
        } else {
            return back()->with('error','Something Went Wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        //
    }
}
