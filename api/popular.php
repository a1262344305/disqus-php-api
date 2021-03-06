<?php

    namespace Emojione;
    require_once('init.php');

    $fields_data = array(
        'api_key' => $public_key,
        'limit' => 5,
        'forum' => $forum,
        'interval' => '30d'
    );
    $curl_url = 'https://disqus.com/api/3.0/threads/listPopular.json?'.http_build_query($fields_data);
    $data = curl_get($curl_url);

    foreach ( $data -> response as $key => $post ) {
        $posts[$i] = array( 
            'link'=> $post->link,
            'title'=> $post -> clean_title
        );
    }
    $listposts = array(
       'code' => $data -> code,
       'response' => $posts
    );
    print_r(json_encode($listposts));
