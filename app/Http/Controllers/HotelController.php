<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\HotelsChannel;
class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotelChannels = DB::table('hotels_channel')
        ->join('hotels', 'hotels.id', '=', 'hotels_channel.hotel_id')
        ->select('hotels_channel.*', 'hotels.name','hotels.label')
        ->get();
    //  $query= HotelsChannel::all();
   return response()->json(['Data'=>$hotelChannels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

    }
   public function update_visibility(Request $request)
   {

    $hotelId = $request->input('hotel_id');
        $channelId = $request->input('channel_id');
        $visibility = $request->input('visibility');


        $hotelChannel = HotelsChannel::where('hotel_id', $hotelId)
        ->where('channel_id', $channelId)
        ->update(['visibility' => $visibility]);

        $query= HotelsChannel::all();
         return response()->json(['Data' => $query]);
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
    }
}
