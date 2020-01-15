<?php

namespace App\Http\Controllers;

use App;

use App\{
    Community,
    CommunityLinks,
    Link
};

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CommunityLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($cid)
    {
        $community = DB::table('communities')->where('id', $cid)->first();

        if($community == ''){

            dd('Community dose not Exist');

        }
        
        if($community->_cuser == auth()->user()->id){

            $links = DB::table('links')->get();

            return view('Communitylink', ['cid'=> $cid, 'links'=> $links]);

        }else{

            dd("TRYING TO ACCESS OTHERS COMMUNITY");
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $community = DB::table('communities')->where('id', $request->_cid)->first();
        
        if($community->_cuser == auth()->user()->id){

            $link = App\Link::firstOrCreate(['rel' => $request->_lref]);
        
            $community_link = New CommunityLinks;
            $community_link->_cid = $community->id;
            $community_link->_lid = $link->id;
            $community_link->link = $request->_llink;
            $community_link->save();

        }else{

            dd("TRYING TO ACCESS OTHERS COMMUNITY");

        }
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cid)
    {
        //  
    }
}
