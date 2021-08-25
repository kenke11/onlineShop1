<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('created_at', 'DESC')->get();

        return view('admin.slider.index', [
            'sliders' => $sliders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slider = new Slider();
        $slider->title = $request->title;
        $slider->text = $request->text;
        $slider->link = $request->link;

        $img = $request->img;

        $img = str_replace('\\', '/', $img);
        $slider->img = '/' . $img;

        $slider->save();

        return redirect()->back()->withSuccess('სლაიდი წარმატებით დაემატა');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider, $id)
    {
//        $sliders = Slider::orderBy('created_at', 'DESC')->get();
        $slider = Slider::find($id);
        return view('admin.slider.edit', [
//            'sliders' => $sliders,
            'slider' => $slider
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider, $id)
    {
        $slider = Slider::find($id);
        $slider->title = $request->title;
        $slider->img =  $request->img;
        $slider->text = $request->text;
        $slider->link =  $request->link;
        $slider->save();

        return redirect()->back()->withSuccess('სლაიდი წარმატებით განახლდა');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider, $id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        return redirect()->back()->withSuccess('სტატია წარმატებით წაიშალა');
    }
}
