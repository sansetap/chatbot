<?php
$accessToken = "7qxw2p5f6fuMDQn/g1bm4nc29SFk4kQUQ2KEf3GtKsUxnUUrGEm3ylND+XPJRv4M6Rci3pDmGdXqtRdF2Ff5la2UWS91Bq1ogdzUhjgySYU5TxzSafPKmF0IM7PhbHMbviwM49V+kFKKMmsKjDbAwgdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่

$content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);
    
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";


    
    //รับข้อความจากผู้ใช้
    //$mytype = $arrayJson['events'][0]['message']['type'];
    //if($mytype = "text"){
        $message = $arrayJson['events'][0]['message']['text'];
    //} else{
       //$message = $arrayJson['events'][0]['message']['stickerId'];
    //}
#ตัวอย่าง Message Type "Text"
    if( strpos($message,"สวัสดี") !== false ){
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
        $arrayPostData['messages'][0]['title'] = "บริษัท มหาโชค มหาชัย เทรดดิ้ง จำกัด";
        $arrayPostData['messages'][0]['address'] =   "13.7465354,100.532752";
        $arrayPostData['messages'][0]['latitude'] = "13.6271373";
        $arrayPostData['messages'][0]['longitude'] = "100.2878033";
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
    else if($message == "กินไรดี" || $message == "กินไร" || $message == "หิว" ){
        $i = rand(1,8);
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
        else if($i == 7){
            $msg = "เซเว่นมั้ยล่ะ";
        }
        
            
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = $msg;
        replyMsg($arrayHeader,$arrayPostData);
    }

    else if($message == "ไม่กิน" || $message == "ไม่หิว" || $message == "ไม่เอา" ){
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

    else if( strpos($message,"บอท") !== false ){
        $i = rand(1,3);
            
        if($i == 1){
            $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
            $arrayPostData['messages'][0]['type'] = "text";
            $arrayPostData['messages'][0]['text'] = "ว่าไงครับ";
            replyMsg($arrayHeader,$arrayPostData);
        }
        else if($i == 2){
            $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
            $arrayPostData['messages'][0]['type'] = "text";
            $arrayPostData['messages'][0]['text'] = "ห๊ะ";
            $arrayPostData['messages'][1]['type'] = "sticker";
            $arrayPostData['messages'][1]['packageId'] = "1";
            $arrayPostData['messages'][1]['stickerId'] = "17";
            replyMsg($arrayHeader,$arrayPostData);
        } else {
            $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
            $arrayPostData['messages'][0]['type'] = "text";
            $arrayPostData['messages'][0]['text'] =  "เรียกผมหรอครับ";
            replyMsg($arrayHeader,$arrayPostData);
        }
        
    }
    
    else if(strpos($message,"นิว?") !== false ){
        $i = rand(1,3);
        $msg = "นิว คือ คู่ขาเค้าเอง";
        if($i == 1){
            $msg = "นิว คือ เมียผมครับ";
        }
        else if ($i == 2){
            $msg = "นิว คือ ยอดนักขุดทองในตำนาน";
        }
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = $msg;
        replyMsg($arrayHeader,$arrayPostData);
    }

    else if(strpos($message,"?") !== false ){
        $i = rand(1,100);
        $msg = "";
        if($i%2 == 0){
            $msg = "ใช่";
        }else{
            $msg = "ไม่";   
        }
        
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = $msg;
        replyMsg($arrayHeader,$arrayPostData);
    }
        
    else if(strpos($message,"กาน") !== false ){
        $i = rand(1,5);
        $msg = "ขี้เอา(ใจ)";
        if($i == 1){
            $msg = "อ่อน";
        }else if($i == 2) {
            $msg = "กะจอก";   
        }else if($i == 3) {
            $msg = "กลับบ้านเช้า";   
        }else if($i == 4) {
            $msg = "หลุมดำดูดของกิน";   
        }
        
        
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = $msg;
        replyMsg($arrayHeader,$arrayPostData);
    }

    else if(strpos($message,"ที่รัก") !== false ){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "sticker";
        $arrayPostData['messages'][0]['packageId'] = "3";
        $arrayPostData['messages'][0]['stickerId'] = "180";
        replyMsg($arrayHeader,$arrayPostData);
    }

    else if($message == "จริงดิ" ){
        $i = rand(1,4);
        $msg = "ไม่จริง";
        if($i == 1){
            $msg = "จริงจริ๊ง (เสียงสูง)";
        }else if($i == 2) {
            $msg = "มันเป็นมุข 555+";   
        }else if($i == 3) {
            $msg = "เชื่อเราหรอ";   
        }
        
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = $msg;
        replyMsg($arrayHeader,$arrayPostData);
    }
   
    else if(strpos($message,"555") !== false ){
        $i = rand(1,4);
        $msg = "ไม่ตลก";
        if($i == 1){
            $msg = "ตูต้องขำมั้ย";
        }else if($i == 2) {
            $msg = "ฮ่าๆๆๆ __มุงซิ";   
        }else if($i == 3) {
            $msg = "ฮาซิ รอไร";   
        }
        
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = $msg;
        if($i == 3) {
            $arrayPostData['messages'][1]['type'] = "sticker";
            $arrayPostData['messages'][1]['packageId'] = "1";
            $arrayPostData['messages'][1]['stickerId'] = "110";
        }
        replyMsg($arrayHeader,$arrayPostData);
    }

    else if(strpos($message,"กุ้ง") !== false ){
        $i = rand(1,5);
        $msg = "พ่อเทพบุตร";
        if($i == 1){
            $msg = "หล่อสุดแล้วในนี้";
        }else if($i == 2) {
            $msg = "เทพ Database Admin";   
        }else if($i == 3) {
            $msg = "หนุ่มในฝัน";   
        }else if($i == 3) {
            $msg = "ศักรินทร์";   
        }
        
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = $msg;
        replyMsg($arrayHeader,$arrayPostData);
    }
    
    else if(strpos($message,"พี่ชาติ") !== false ){
        $i = rand(1,4);
        $msg = "พ่อ ElfZaa";
        if($i == 1){
            $msg = "พ่อทุกสถาบัน!!";
        }else if($i == 2) {
            $msg = "ผู้ใหญ่ใจดี";   
        }else if($i == 3) {
            $msg = "เจอกันร้านพงษ์";   
        }
        
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = $msg;
        replyMsg($arrayHeader,$arrayPostData);
    }

    else if(strpos($message,"มด") !== false ){
        $i = rand(1,4);
        $msg = "เจ้าชู้";
        if($i == 1){
            $msg = "ไม่ได้หลายใจ แค่หลายคน";
        }else if($i == 2) {
            $msg = "หมูมะนาว ในตำนาน";   
        }else if($i == 3) {
            $msg = "เมื่อไหร่จะพอ";   
        }
        
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = $msg;
        replyMsg($arrayHeader,$arrayPostData);
    }

    else if(strpos($message,"ไอซ์") !== false ){
        $i = rand(1,4);
        $msg = "ผมไม่เล็กนะครับ";
        if($i == 1){
            $msg = "สวัสดีครับ คุณครู";
        }else if($i == 2) {
            $msg = "ตากล้อง ในตำนาน";   
        }else if($i == 3) {
            $msg = "good morning teacher";   
        }
        
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = $msg;
        replyMsg($arrayHeader,$arrayPostData);
    }

    else if(strpos($message,"ดรีม") !== false ){
        $i = rand(1,4);
        $msg = "แก็งลูกหมู";
        if($i == 1){
            $msg = "ชอบโดนเพื่อนทิ้ง";
        }else if($i == 2) {
            $msg = "เค้าคือใคร..";   
        }else if($i == 3) {
            $msg = "คนดี 2018";   
        }
        
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = $msg;
        replyMsg($arrayHeader,$arrayPostData);
    }

    else if(strpos($message,"ตาล") !== false ){
        $i = rand(1,4);
        $msg = "แก็งลูกหมู อีคน";
        if($i == 1){
            $msg = "ชอบทิ้งเพื่อน";
        }else if($i == 2) {
            $msg = "อย่านินทา..เค้าอ่านอยู่นะ";   
        }else if($i == 3) {
            $msg = "คนทิ้งเพื่อน 2018";   
        }
        
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = $msg;
        replyMsg($arrayHeader,$arrayPostData);
    }

    else if(strpos($message,"ตั้ม") !== false ){
        $i = rand(1,4);
        $msg = "ต้นมะละกอในตำนาน";
        if($i == 1){
            $msg = "ข้างบ้านที่แสนดี อิอิ";
        }else if($i == 2) {
            $msg = "0x100039 ฉันกำลังลำบาก ฉันกำลังลำบาก ฉันกำลังทำใจ ลืมคนที่ฉันรักเขามาก 0x100039";   
        }else if($i == 3) {
            $msg = "รางน้ำ ในตำนาน";   
        }
        
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = $msg;
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
