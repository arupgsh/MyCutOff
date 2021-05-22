<?php
#-- Playing with the url input
$user_input ="http://www.ebay.in/itm/272117044308?_trkparms=clkid%3D3019478608211182990&_qi=RTM2285394";
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
        if (empty($price2)) exit("Not a valid Ebay Product");
 //       echo "Store name Ebay</br>";
        //When everything is normal
        $price4 = preg_replace('/Rs.|,/',"",$price2);
        $price3 = round($price4,0);
 ?>