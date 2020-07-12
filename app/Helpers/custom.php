<?php 


function share($media, $slug)
{
    $host = $_SERVER['HTTP_HOST'];
    $host = trim($host, '/');

    // $slug = trim($slug, '/');

    $url = urlencode('http://'.$host.'/course/'.$slug);

    switch($media){
        case($media == 'facebook'):
            return "https://www.facebook.com/sharer/sharer.php?u=".$url;
            break;

        case($media == 'twitter'):
            return "https://www.twitter.com/sharer/sharer.php?u=".$url;
            break;
        
        default:
           return $host;
           break;
    }
}