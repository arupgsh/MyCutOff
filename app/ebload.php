<?php
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
        foreach($html->find('span[id=prcIsum]') as $price1)
 //       echo $price1."</br>";
        $price2 = preg_replace("/<span (.*?)>/","", $price1);
        //Null handling
        if (empty($price2)) exit("Not a valid Ebay.in Product");
//        echo "Store name Ebay</br>";
        //When everything is normal
        $price4 = preg_replace('/Rs.|,/',"",$price2);
        $price3 = round($price4,0);
//        echo $price3."</br>";
        // Finding the title part
        foreach($html->find('h1[class=it-ttl]') as $title1)
        //        echo $price1."</br>";
                $title2 = preg_replace("/<h1 (.*?)>|<span (.*?)>(.*?)<\/span>|<wbr\/>/","", $title1);
                if (empty($title2)) exit('<div class="alert alert-danger"><button class="close" data-dismiss="alert">×</button><strong>Product Maybe Sold Out!</strong></div>');
                $title3 = preg_replace('/<\/h1>/',"",$title2);
//                echo $title3."</br>";
        // Finding the image part
        foreach($html->find('img[id=icImg]') as $image1)
        //        echo $price1."</br>";
                preg_match( '@src="([^"]+)"@' , $image1, $match );
                $image3 = array_pop($match);
 //               echo $image3;
?>
