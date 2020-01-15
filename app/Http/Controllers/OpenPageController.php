<?php

namespace App\Http\Controllers;

use Redirect;

use Illuminate\{
    Http\Request,
    Support\Facades\DB
};

class OpenPageController extends Controller
{

    public function queryredirectform(Request $request){

        $tags = $request->tags;

        return Redirect::to('find/'.$tags) ;

    }

    public function communityList(){
        
        $Communitydbquerys = DB::table('communities')
                                ->select(DB::raw('communities._cname as cname , communities._cdescription as cdes , communities.id'))
                                ->Join('community_tags', 'community_tags._cid', '=', 'communities.id')
                                ->Join('tags', 'tags.id', '=', 'community_tags._tid')
                                ->groupBy('communities.id')
                                ->take(10)
                                ->get();

        $communitiesList  = array();
        

        foreach($Communitydbquerys as $Communitydbquery){


            $linkdbquerys = DB::table('links')
                                ->select(DB::raw('links.rel, links.src, community_links.link'))
                                ->RightJoin('community_links', 'community_links._lid', '=', 'links.id')
                                ->whereRaw('community_links._cid = ?', [$Communitydbquery->id])
                                ->take(2)
                                ->get();

            $links = array();
            
            foreach($linkdbquerys as $linkdbquery){

                    $link = array(
                        'src' => $linkdbquery->src,
                        'rel' => $linkdbquery->rel,
                        'link' => $linkdbquery->link
                    );

                array_push($links, $link);

            }
            $community  = array(
                'id' => $Communitydbquery->id,
                'name' => $Communitydbquery->cname,
                'desc' => $Communitydbquery->cdes,
                'like' => 0,
                'dislike' => 0,
                'links'=> $links
            );

            array_push($communitiesList, $community);
        }
    
        return view('result')->with('communitiesList', $communitiesList);
    }

    // If some one query execute this function

    public function querycommunity($tags){
        
        $query = $tags;

        $Communitydbquerys = DB::table('communities')
                                ->select(DB::raw('communities._cname as cname , communities._cdescription as cdes , communities.id'))
                                ->Join('community_tags', 'community_tags._cid', '=', 'communities.id')
                                ->Join('tags', 'tags.id', '=', 'community_tags._tid')
                                ->whereRaw('tags.tag LIKE "%'.$query.'%"')
                                 ->groupBy('communities.id')
                                ->take(10)
                                ->get();

        $communitiesList  = array();
        

        foreach($Communitydbquerys as $Communitydbquery){


            $linkdbquerys = DB::table('links')
                                ->select(DB::raw('links.rel, links.src, community_links.link'))
                                ->RightJoin('community_links', 'community_links._lid', '=', 'links.id')
                                ->whereRaw('community_links._cid = ?', [$Communitydbquery->id])
                                ->take(2)
                                ->get();

            $links = array();
            
            foreach($linkdbquerys as $linkdbquery){

                    $link = array(
                        'src' => $linkdbquery->src,
                        'rel' => $linkdbquery->rel,
                        'link' => $linkdbquery->link
                    );

                array_push($links, $link);

            }
            $community  = array(
                'id' => $Communitydbquery->id,
                'name' => $Communitydbquery->cname,
                'desc' => $Communitydbquery->cdes,
                'like' => 0,
                'dislike' => 0,
                'links'=> $links
            );

            array_push($communitiesList, $community);
        }
        
        return view('result')->with('communitiesList', $communitiesList);
    }
}
