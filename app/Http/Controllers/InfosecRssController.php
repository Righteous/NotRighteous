<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class InfosecRssController extends Controller
{
    public function create() {
        $dbFeeds = \App\Models\Rss::all()->pluck('feed');
        $feeds = array();
        foreach ($dbFeeds as $feedLink) {
            $feeds = array_merge($feeds, $this->getFeed($feedLink));
        }
        return view('pages.rss')->with('feeds', $feeds);
    }

    public function getFeed($feedLink) {
        $feedObj = \Awjudd\FeedReader\Facades\FeedReader::read($feedLink);
        $feedData = array();
        foreach ($feedObj->get_items(0, 10) as $post) {
            $feedData[$post->get_title()] = $post->get_permalink();
        }
        return $feedData;
    }
}
