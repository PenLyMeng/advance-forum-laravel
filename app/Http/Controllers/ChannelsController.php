<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;
use Session;


class ChannelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('channels.index')->with('channels',Channel::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('channels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request,[
            'channel' => 'required',
            
            ]);

            Channel::create([
                'title' => $request->channel,
                'slug' =>str_slug($request->channel),
                
            ]);

            Session::flash('success','Channel created.');
                
            return view('index');

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
        //

        return view('channels.edit')->with('channel',Channel::find($id));
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
        //
        $this->validate($request,[
            'channel' => 'required',
        ]);

        $channel = Channel::find($id);
        $channel->title = $request->channel;
        $channel->save();
      
        Session::flash('success','Channel updated successfully!');
            return redirect()->route('channels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
 
        $channel = Channel::destroy($id);
 
        Session::flash('success','Channel deleted successfully!');

        return redirect()->route('channels.index');
    }
}
