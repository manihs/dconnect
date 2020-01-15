<?php

namespace App\Http\Controllers;

use App;

use App\{
        Community,
        CommunityLinks,
        Link,
        CommunityTag,
        Tag
};

use Illuminate\Http\Request;

class CommunityController extends Controller
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
    public function create()
    {
        return view('createCommunity');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = auth()->user();
        $community = New Community;
        $link = New Link;
        $communityLinks = New CommunityLinks;
        

        $community->_cuser = $user->id;
        $community->_cname = $request->_cname;
        $community->_cdescription = $request->_cdescription;
        $community->save();
        $communityId =  $community->id;


        $taglist = $request->tagslist;

        $tags = explode(',', $taglist);
    
        foreach($tags as $tag){

            $tagiteam = App\Tag::firstOrCreate(['tag' => $tag]);
            
            $communityTag = New CommunityTag;
            $communityTag->_tid  = $tagiteam->id;
            $communityTag->_cid  = $communityId;
            $communityTag->save();

        }


        return redirect()->route('newCommunitylinkForm', ['cid' => $communityId]);

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
    public function destroy($id)
    {
        //
    }
}
