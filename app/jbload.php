<?php
#PS . Jabong is really pain in the ass, after they started playing with javascript.
#-- Playing with the url input
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$user_input);
curl_setopt($ch, CURLOPT_USERAGENT, "User-Agent: Mozilla/5.0 (Windows NT 6.3; WOW64; rv:37.0) Gecko/20100101 Firefox/37.0");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_ENCODING, "");
$pagebody=curl_exec($ch);
curl_close ($ch);

include_once('simple_html_dom.php');
$html = str_get_html($pagebody);
        //Finding the image part
        foreach($html->find('span[class=actual-price]') as $price1)
        //        echo $price1."</br>";
        $price2 = preg_replace("/<span (.*?)>/","", $price1);
        //Null handling
        if (empty($price2)) exit("Not a valid Jabong Product");
//        echo "Store name Jabong</br>";
        //When everything is normal
        $price3 = preg_replace('/[a-zA-Z or . or , or <\/(.*?)>]/',"",$price2);
//        echo $price3."</br>";
        // Finding the title part
        foreach($html->find('span[class=product-title]') as $title1)
        //        echo $price1."</br>";
                $title2 = preg_replace("/<span (.*?)>/","", $title1);
                if (empty($title2)) exit('<div class="alert alert-danger"><button class="close" data-dismiss="alert">×</button><strong>Product Maybe Sold Out!</strong></div>');
                $title3 = preg_replace('/<\/span>/',"",$title2);
//                echo $title3."</br>";
        // Finding the image part
//        foreach($html->find('img[class=load-in-viewport primary-image first thumb]') as $image1)
        //        echo $price1."</br>";
        foreach($html->find('meta[property=og:image]') as $image1)
        echo $image1;
        preg_match( '/http:\/.*.jpg/' , $image1, $match);
        $image3 = array_pop($match);
	// preg_match( '@data-src-320=([^"]+)"@' , $pagebody, $match);
        //$image2 = array_pop($match);
        //$image3 = preg_replace('/\sdata-src-(.*)/',"",$image2);
//      echo $image3;
?>
