<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\ScheduleContent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ScheduleContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $content = auth()->user()->pictures()->get();

        return view('dashboard.index', compact('content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'schedule_on' => 'required',
            'image'     => 'required|mimes:jpeg,jpg,png|max:3999'
        ]);

        $image  = $request->file('image');

        $image_name = rand(0, 9999).'_'.$image->getClientOriginalName();

        Storage::disk('public')->putFileAs('images', $image, $image_name);

        ScheduleContent::create([
            'user_id' => auth()->id(),
            'image' => $image_name,
            'description' => $request->description,
            'schedule_on' => $request->schedule_on,
            'status' => 'draft'
        ]);

        return redirect()->route('dashboard.content.index')->with('message', 'The picture was saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = ScheduleContent::findOrFail($id);

        return view('dashboard.edit', compact('content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'schedule_on' => 'required'
        ]);

        $content = ScheduleContent::findOrFail($id);

        $content->update($request->only(['schedule_on', 'description']));

        if($request->schedule_on > Carbon::now()) {
            $content->update(['status' => 'draft']);
        }

        return back()->with('message', 'The information was saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $content = ScheduleContent::findOrFail($id);

        Storage::disk('public')->delete('images/'.$content->image);

        $content->delete();

        return redirect()->route('dashboard.content.index')->with('message', 'The picture was deleted!');
    }
}
