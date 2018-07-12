<?php
$accessToken = "7qxw2p5f6fuMDQn/g1bm4nc29SFk4kQUQ2KEf3GtKsUxnUUrGEm3ylND+XPJRv4M6Rci3pDmGdXqtRdF2Ff5la2UWS91Bq1ogdzUhjgySYU5TxzSafPKmF0IM7PhbHMbviwM49V+kFKKMmsKjDbAwgdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่

$content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);
    
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";


    
    //รับข้อความจากผู้ใช้
    $mytype = $arrayJson['events'][0]['message']['type'];
    if($mytype = "text"){
        $message = $arrayJson['events'][0]['message']['text'];
    } else{
       $message = $arrayJson['events'][0]['message']['stickerId'];
    }
#ตัวอย่าง Message Type "Text"
    if($message == "สวัสดี"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "สวัสดีจ้าาา";
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Sticker"
    else if($message == "ฝันดี"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "sticker";
        $arrayPostData['messages'][0]['packageId'] = "2";
        $arrayPostData['messages'][0]['stickerId'] = "46";
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Image"
    else if($message == "รูป"){
        $image_url = "https://i.pinimg.com/originals/cc/22/d1/cc22d10d9096e70fe3dbe3be2630182b.jpg";
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Location"
    else if($message == "พิกัด"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "location";
        $arrayPostData['messages'][0]['title'] = "สยามพารากอน";
        $arrayPostData['messages'][0]['address'] =   "13.7465354,100.532752";
        $arrayPostData['messages'][0]['latitude'] = "13.7465354";
        $arrayPostData['messages'][0]['longitude'] = "100.532752";
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Text + Sticker ใน 1 ครั้ง"
    else if($message == "ลาก่อน"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "อย่าทิ้งกันไป";
        $arrayPostData['messages'][1]['type'] = "sticker";
        $arrayPostData['messages'][1]['packageId'] = "1";
        $arrayPostData['messages'][1]['stickerId'] = "131";
        replyMsg($arrayHeader,$arrayPostData);
    }
    else if($message == "ง่วง"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "sticker";
        $arrayPostData['messages'][0]['packageId'] = "1";
        $arrayPostData['messages'][0]['stickerId'] = "1";
        replyMsg($arrayHeader,$arrayPostData);
    }
    else if($message == "ดูหนัง"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "sticker";
        $arrayPostData['messages'][0]['packageId'] = "1";
        $arrayPostData['messages'][0]['stickerId'] = "402";
        replyMsg($arrayHeader,$arrayPostData);
    }
    else if($message == "ฉลอง"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "sticker";
        $arrayPostData['messages'][0]['packageId'] = "1";
        $arrayPostData['messages'][0]['stickerId'] = "132";
        replyMsg($arrayHeader,$arrayPostData);
    }
    else if($message == "HBD"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "sticker";
        $arrayPostData['messages'][0]['packageId'] = "1";
        $arrayPostData['messages'][0]['stickerId'] = "427";
        replyMsg($arrayHeader,$arrayPostData);
    }
    else if($message == "โกรธ"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "sticker";
        $arrayPostData['messages'][0]['packageId'] = "2";
        $arrayPostData['messages'][0]['stickerId'] = "19";
        replyMsg($arrayHeader,$arrayPostData);
    }
    else if($message == "กินไรดี" || $message == "กินไร" || $message == "หิว"){
        $i = rand(1,7);
        $msg = "ไม่รู้ซิ ลูกชิ้นหอยจ้อมั้ง";
            
        if($i == 1){
            $msg = "ข้าวมันไก่";
        }
        else if($i == 2){
            $msg = "ส้มตำ คอหมูย่าง";
        }
        else if($i == 3){
            $msg = "ก๋วยเตี๋ยวเยาวราช";
        }
        else if($i == 4){
            $msg = "ขาหมูบางหว้า";
        }    
        else if($i == 5){
            $msg = "ส้มตำ ไก่วิเชียร";
        }
        else if($i == 6){
            $msg = "บ้านเจ๊ไพ";
        }
            
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = $msg;
        replyMsg($arrayHeader,$arrayPostData);
    }

    else if($message == "ไม่กิน" || $message == "ไม่หิว" || $message == "ไม่เอา"){
        $i = rand(1,4);            
        if($i == 1){
            $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
            $arrayPostData['messages'][0]['type'] = "text";
            $arrayPostData['messages'][0]['text'] = "งั้นก็ไม่ต้องกิน";
            $arrayPostData['messages'][1]['type'] = "sticker";
            $arrayPostData['messages'][1]['packageId'] = "1";
            $arrayPostData['messages'][1]['stickerId'] = "420";
        }
        else if($i == 2){
            $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
            $arrayPostData['messages'][0]['type'] = "text";
            $arrayPostData['messages'][0]['text'] = "อดซิ แสดดดด";
            $arrayPostData['messages'][1]['type'] = "sticker";
            $arrayPostData['messages'][1]['packageId'] = "2";
            $arrayPostData['messages'][1]['stickerId'] = "520";
        }
        else if($i == 3){
            $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
            $arrayPostData['messages'][0]['type'] = "text";
            $arrayPostData['messages'][0]['text'] = "ไปเล่นตรงนู้นเลย!!";
            $arrayPostData['messages'][1]['type'] = "sticker";
            $arrayPostData['messages'][1]['packageId'] = "2";
            $arrayPostData['messages'][1]['stickerId'] = "518";
        }else {
            $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
            $arrayPostData['messages'][0]['type'] = "text";
            $arrayPostData['messages'][0]['text'] = "เรื่องของมุง..";
            $arrayPostData['messages'][1]['type'] = "sticker";
            $arrayPostData['messages'][1]['packageId'] = "2";
            $arrayPostData['messages'][1]['stickerId'] = "170";
        }
        
        replyMsg($arrayHeader,$arrayPostData);
    }

    else if(strpos($message,"เงี่ยน") !== false){
        $i = rand(1,3);            
        if($i == 1){
            $image_url = "https://www.picz.in.th/images/2018/07/12/NObpJ2.jpg";
            $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
            $arrayPostData['messages'][0]['type'] = "image";
            $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
            $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
            $arrayPostData['messages'][1]['type'] = "text";
            $arrayPostData['messages'][1]['text'] = "มาหาหนูมั้ยค่ะ...จุ๊บ";
            $arrayPostData['messages'][2]['type'] = "sticker";
            $arrayPostData['messages'][2]['packageId'] = "2";
            $arrayPostData['messages'][2]['stickerId'] = "172";
        }
        else if($i == 2){
            $image_url = "https://www.picz.in.th/images/2018/07/12/NOji6Q.jpg";
            $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
            $arrayPostData['messages'][0]['type'] = "image";
            $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
            $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
            $arrayPostData['messages'][1]['type'] = "text";
            $arrayPostData['messages'][1]['text'] = "หนูรอพี่อยู่นะ..";
            $arrayPostData['messages'][2]['type'] = "sticker";
            $arrayPostData['messages'][2]['packageId'] = "2";
            $arrayPostData['messages'][2]['stickerId'] = "158";
        } else {
            $image_url = "https://www.picz.in.th/images/2018/07/12/NOjqeW.jpg";
            $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
            $arrayPostData['messages'][0]['type'] = "image";
            $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
            $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
            $arrayPostData['messages'][1]['type'] = "text";
            $arrayPostData['messages'][1]['text'] = "เงียนมากใช่ป่ะ..เอาอันนี้ใช้แก้เงียนไป๊!!";
            $arrayPostData['messages'][2]['type'] = "sticker";
            $arrayPostData['messages'][2]['packageId'] = "1";
            $arrayPostData['messages'][2]['stickerId'] = "10";
        }
        replyMsg($arrayHeader,$arrayPostData);
    }
    
       else if($message == "10" || $message == "100" || $message == "110"){
            $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
            $arrayPostData['messages'][0]['type'] = "text";
            $arrayPostData['messages'][1]['text'] = "ขำ พ่อง!!";
            replyMsg($arrayHeader,$arrayPostData);
       }


function replyMsg($arrayHeader,$arrayPostData){
        $strUrl = "https://api.line.me/v2/bot/message/reply";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);    
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($arrayPostData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close ($ch);
    }
   exit;
?>
