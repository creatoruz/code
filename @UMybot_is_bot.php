<?php
ob_start();
set_time_limit(0);
define('API_KEY', "1051532888:AAHOc5VXgx0nV1ir5TOMOIH50-NfToXMy9o"); //tokenni yozing
$admin = "816589701";
$user = "SaNJaRBeK_ONE";
$chanel = "N1BlackMafia";
$bot = bot('getme', ['bot'])->result->username;//bot function

function bot($method, $datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/$method";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}

function scht($chat_id, $title){
return bot('SetChatTitle', [
'chat_id' => $chat_id,
'title' => $title,
]);
}

function dm($chat_id, $message_id){
return bot('DeleteMessage', [
'chat_id' => $chat_id,
'message_id' => $message_id,
]);
}

function scha($chat_id){
return bot('SendChatAction', [
'chat_id' => $chat_id,
'action' => "typing",
]);
}

//Botni Ishlatadigan Metodlarga Tegmang!!!
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$text = $message->text;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$username = $message->from->username;
$name = $message->from->first_name;
$file = file_get_contents("channel.txt");
$file_exp = explode("\n", $file);
$name_txt = file_get_contents("name.txt");
$name_exp = explode("\n", $name_txt);
$time = date('H:i', strtotime('3 hour'));

//Kanal metodlari
$channel = $update->channel_post;
$channel_id = $channel->chat->id;
$channel_text = $channel->text;
$channel_mid = $channel->message_id;
$channel_tite = $channel->chat->title;
$channel_user = $channel->chat->username;
$channel_photo = $channel->new_chat_photo;
$channel_title = $channel->new_chat_title;

//Typing function
if($text){
scha($chat_id);
}

//Bu "buyruqsiz so'zlarni" ishlatmaslik.
if(mb_stripos($text, "/")!==false){
}else{
bot('SendMessage', [
'chat_id' => $chat_id,
'text' => "*😡 Bunday Buyruq Yo'q!!!*",
'parse_mode' => "Markdown",
'reply_to_message_id' => $message_id,
]);
}

//Botni ishlatishni boshlash
if(mb_stripos($text, "/start")!==false){
bot('SendMessage', [
'chat_id' => $chat_id,
'text' => "*👋 Assalom-u Aleykum* [$name](tg://user?id=$chat_id), *Men kanal nomiga soat qo'yadigan botman. Faqat Men @$chanel Kanali uchun ishlayman va /add buyruqini @$user ishlatoladi!!!\nKanalingizni (/add kanal usernamesi) => shu ko'rinishda qo'shasiz.\nShu (@) belgi bo'lmasligi kerak!!!\nMasalan: /add N1BlackMafia*\n\n*🌐 Creator: @$user*",
'parse_mode' => "Markdown",
'reply_to_message_id' => $message_id,
'reply_markup' => json_encode([
'inline_keyboard' => [[['text' => '🌐 Admin 🖤', 'url' => "https://t.me/$user"],['text' => '💠 Kanal 💠', 'url' => "https://t.me/$chanel"],['text' => '🤖 RoBot 🎗', 'url' => "https://t.me/$bot"]],]
]),
]);
}

//Kanal Qo'shish /add "kanal useri" /add CoDeRBeK_UZ
if((mb_stripos($text, "/add")!==false) and ($chat_id == $admin)){
$exp = explode(" ", $text);
file_put_contents("channel.txt", "$file\n$exp[1]"); 
$get = bot('GetChat', ['chat_id' => "@$exp[1]"]);
$channel_title = $get->result->title;
$chan_name = str_replace(["0","1","2","2","3","4","5","6","7","8","9",":","|"," "], ["","","","","","","","","","","","","",""], $channel_title);
file_put_contents("name.txt", "$name_txt\n$chan_name");
bot('SendMessage', [
'chat_id' => $chat_id,
'text' => "*👋 $name joylagan kanalingiz pastdagi knopkada!!! 👇*",
'parse_mode' => "Markdown",
'reply_to_message_id' => $message_id,
'reply_markup' => json_encode([
'inline_keyboard' => [[['text' => "🌐 @$exp[1] 🖤", 'url' => "https://t.me/$exp[1]"]],[['text' => "🆔️ $channel_title 💾", 'url' => "https://t.me/$exp[1]"]],]
])
]);
}elseif(mb_stripos($text, "/add")!==false){
bot('SendMessage', [
'chat_id' => $chat_id,
'text' => "👋 [$name](tg://user?id=$chat_id) *😊 Kechirasiz, bu funksiyani ishlatish uchun @$user dan KEY Sotib oling!!!*",
'parse_mode' => "Markdown",
'reply_to_message_id' => $message_id,
]);
}

//Malumotlarni Tozalash.
if(mb_stripos($text, "/unlink")!==false){
unlink("name.txt"); unlink("channel.txt");
bot('SendMessage', [
'chat_id' => $chat_id,
'text' => "*✊ Ma'lumotlar tozalandi!!! 👽\n🎗 By: @$bot*",
'parse_mode' => "Markdown",
'reply_to_message_id' => $message_id,
]);
}

//Kanalga soat qo'yish funsiyasi.
if(true){
scht("@$file_exp[1]", "$time | $name_exp[1] | $time");
scht("@$file_exp[2]", "$time | $name_exp[2] | $time");
}

//O'zgarishni o'chirish
if(isset($channel_title)){
dm($channel_id, $channel_mid);
}

if(isset($channel_title)){
dm($channel_id, $channel_mid);
}

?>