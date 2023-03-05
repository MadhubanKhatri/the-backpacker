<?php
    // $url = 'https://www.geeksforgeeks.org?name=Tonny';
    // $url_components = parse_url($url);

    // echo var_dump($url_components);
    // echo "<br>";
    // echo $url_components['query'];
    // echo "<br>";
    // parse_str($url_components['query'], $params);
    // echo $params['name'];



    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
        $link = "https";
    else $link = "http";
      
    // Here append the common URL characters.
    $link .= "://";
      
    // Append the host(domain name, ip) to the URL.
    $link .= $_SERVER['HTTP_HOST'];
      
    // Append the requested resource location to the URL
    $link .= $_SERVER['REQUEST_URI'];
      
    // Print the link
    echo $link;

?>