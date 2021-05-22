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
// Finding the price part
foreach($html->find('span[id=priceblock_ourprice],span[id=priceblock_saleprice],span[id=priceblock_dealprice],span[class=a-size-small a-color-price]') as $price1)
//        echo $price1."</br>";
        $price2 = preg_replace("/<span (.*?)>/","", $price1);
        //Null handling
//        if (empty($price2)) exit("Not a valid Amazon.in Product");
//        echo "Store name Amazon.in</br>";
        //When everything is normal
        $price4 = preg_replace('/[a-zA-Z or , or &; or <\/(*?)>]/',"",$price2);
        $price3 = round($price4,0);
?>
