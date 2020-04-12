<?php
ob_start();
set_time_limit(0);
define("API_KEY", "1099024723:AAFDrTQHI73ExmZtSLTD6g9_AFlUq3BIKhY"); //Token!
$admin = "816589701"; //Admin ID raqami!
$kanal = "ARaBiC_CoDeR"; //Kanal Useri!
$bek = "SaNJaRBeK_ONE"; //Admin Useri!
$homiy = "N1BlackMafia"; //Kanal homiysi!
$bot = bot('getme',['bot'])->result->username; //Bot useri!

//Funksiyalar
function bot($method, $datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/$method";
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}

function sm($chat_id, $text, $mode, $true, $key = null){
return bot('SendMessage', [
'chat_id' => $chat_id,
'text' => $text,
'parse_mode' => $mode,
'disable_web_page_preview' => $true,
'reply_markup' => $key,
]);
}

function emt($chat_id, $message_id, $text, $mode){
return bot('EditMessageText', [
'chat_id' => $chat_id,
'message_id' => $message_id,
'text' => $text,
'parse_mode' => $mode,
]);
}

function emc($chat_id, $message_id, $caption, $mode){
return bot('EditMessageCaption', [
'chat_id' => $chat_id,
'message_id' => $message_id,
'caption' => $caption,
'parse_mode' => $mode,
]);
}

function dm($chat_id, $message_id){
return bot('DeleteMessage', [
'chat_id' => $chat_id,
'message_id' => $message_id,
]);
}

function acq($chat_id, $text, $show){
return bot('AnswerCallbackQuery', [
'callback_query_id' => $chat_id,
'text' => $text,
'show_alert' => $show,
]);
}

function gchm($chat_id, $from_id){
return bot('GetChatMember', [
'chat_id' => $chat_id,
'user_id' => $from_id,
]);
}

function scha($chat_id){
return bot('SendChatAction', [
'chat_id' => $chat_id,
'action' => "typing",
]);
}

//Metodlar
$update = json_decode(file_get_contents('php://input'));
$msgs = json_decode(file_get_contents('msgs.json'),true);
$temp = json_decode(file_get_contents('temp.json'),true);
$message = $update->message;
$type = $message->chat->type;
$text = $message->text;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$message_id = $message->message_id;
$gname = $message->chat->title;
$left = $message->left_chat_member;
$new = $message->new_chat_member;
$name = $message->from->first_name;
$repid = $message->reply_to_message->from->id;
$repname = $message->reply_to_message->from->first_name;
$newid = $message->new_chat_member->id;
$leftid = $message->left_chat_member->id;
$newname = $message->new_chat_member->first_name;
$leftname = $message->left_chat_member->first_name;
$username = $message->from->username;
$chusername = $message->chat->username;
$repmid = $message->reply_to_message->message_id;
$reply = $message->reply_to_message->text;

//Callback
$callback = $update->callback_query->message;
$query = $update->callback_query;
$cqid = $query->id;
$data = $query->data;
$callfrid = $query->from->id;
$cname = $query->from->first_name;
$cusrname = $query->from->username;
$inline_id = $query->inline_message_id;
$inlinequ = $update->inline_query->query;
$ctext = $callback->text;
$ccid = $callback->chat->id;
$cuid = $callback->from->id;
$cmid = $callback->message_id;
$calltitle = $callback->chat->title;
$calluser = $callback->chat->username;

//Channel
$channel = $update->channel_post;
$channel_text = $channel->text;
$channel_id = $channel->chat->id;
$channel_title = $channel->from->title;
$channel_mid = $channel->message_id;
$channel_user = $channel->chat->username;
$channel_doc = $channel->document;
$channel_vid = $channel->video;
$channel_mus = $channel->audio;
$channel_voi = $channel->voice;
$channel_gif = $channel->animation;
$channel_fot = $channel->photo;
$caption = $channel->caption;

//Info
$gruppa = file_get_contents("gruppa.db");
$lichka = file_get_contents("lichka.db");
$xabar = file_get_contents("xabar.txt");

//Papka
mkdir("like");

//Key
$keyboard = json_encode([
'inline_keyboard' => [
[['text' => "♻️ Do'stlarga ulashish", 'url' => "https://telegram.me/share/url?url=https://telegram.me/$bot"]],
]
]);
$reply_menu = json_encode([
'resize_keyboard' => false,
'force_reply' => true,
'selective' => true,
]);

//Typing
if(isset($text)){
scha($chat_id);
}

//Text
$txt = "<b>🆔️ ID Raqami: $callfrid\n🤖 Nomi: <a href='tg://user?id=$callfrid'>$cname</a>\n👤 Foydalanuchi: @$cusrname\n📡 Kanal: @$calluser\n📎 Post: t.me/$calluser/$cmid\n✍️ Fikri: ❤ Yoqdi.\n\n🎗 By: @$bot</b>";
$txt1 = "<b>🆔️ ID Raqami: $callfrid\n🤖 Nomi: <a href='tg://user?id=$callfrid'>$cname</a>\n👤 Foydalanuchi: @$cusrname\n📡 Kanal: @$calluser\n📎 Post: t.me/$calluser/$cmid\n✍️ Fikri: 🖤 Yoqmadi.\n\n🎗 By: @$bot</b>";
$txt2 = "*💠 Salom $cname 🎲 $name, Siz @$bot robotiga xush kelibsiz. Bu bot kanallardagi postlarga ulashish, like va dislike tugmalarini qo'yib beradi. Buning uchun siz, kanalingizda botga to'liq administratorlik huquqlarini bering, shundan keyin bot kanalingizda ishlay boshlaydi!\nAgar siz kanalingizdagi postlaringizga kimdir like yoki dislike bosganini ko'rishni xohlasangiz *🤖 [$kanal](t.me/$kanal)* kanaliga a'zo bo'ling! Ushbu kanalda postlarga bosilgan like va dislikelar joylanib boriladi!*";
$txt3 = "*🚫Bu funksiyani faqat @$bek ishlata oladi!*";

if($type == "private"){
$lichka = file_get_contents("lichka.db");
if(mb_stripos($lichka, "$chat_id")!==false){
}else{
file_put_contents("lichka.db", "$lichka\n$chat_id");
sm($chat_id, "*👏 Botga birinchi marta 🤘 tashrif buyurdingiz!\n✊ Tashrifingizdan xursandmiz!*", Markdown);
}
}

if(isset($text)){
$get = gchm("@$homiy", $chat_id)->result->status;
if($get == "member" or $get == "creator" or $get == "administrator"){
}else{
bot('SendMessage', [
'chat_id' => $chat_id,
'text' => "*Salom $name Siz ⛔️ Botimizdan foydalana olmaysiz chunki kanalimizga a'zo bo'lmagansiz. Kanalimizga a'zo bo'ling va Tekshirish tugmasini bosing!*",
'parse_mode' => "Markdown",
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "1️⃣ A'zo bo'lish 🎗", 'url' => "https://t.me/$homiy"]],[['text' => "*️⃣ Tekshirish 🎗", 'callback_data' => "tekshir"]],
]
]),
]); return false;
}
}

if($data == "tekshir"){
$get = gchm("@$homiy", $ccid)->result->status;
if($get == "member" or $get == "creator" or $get == "administrator"){
acq($cqid, "👏 Do'stim $cname siz bizning kanalimizga a‘zo bo'ldingiz ✅", true);
dm($ccid, $cmid);
sm($ccid, $txt2, Markdown, true);
sm($admin, "<b>‼ Diqqat <a href='tg://user?id=$ccid'>$cname</a>,\n🤖 Botimizga Tashrif Buyurdi!\n🌟 Nik:</b> $cname,\n<b>🆔️ Raqam:</b> <code>$ccid</code>,\n<b>❄ Username:</b> @$cusrname.", Html);
}else{
acq($cqid, "😡 Siz hali kanalimizga a‘zo bo‘lmagansiz", true);
}
}

if($text == "/start"){
sm($chat_id, $txt2, Markdown, true, $keyboard);
sm($admin, "<b>‼ Diqqat <a href='tg://user?id=$chat_id'>$name</a>,\n🤖 Botimizga Tashrif Buyurdi!\n🌟 Nik:</b> $name,\n<b>🆔️ Raqam:</b> <code>$chat_id</code>,\n<b>❄ Username:</b> @$username.", Html);
}

if($channel){
$getchat = bot('getChat', [
'chat_id' => $channel_id]);
$kid = $getchat->result->id;
$kname = $getchat->result->title;
$kuser = $getchat->result->username;
$gruppa = file_get_contents("gruppa.db");
if(mb_stripos($gruppa, "$channel_id")!==false){
}else{
file_put_contents("gruppa.db", "$gruppa\n$channel_id");
sm($admin, "*💠 $channel_id kanali qo'shildi!\n👽 Nomi: $kname,\n☺️ User: @$kuser,\n🆔️ ID: $kid*", Markdown);
sm($channel_id, "*💠 $channel_id kanali qo'shildi!\n👽 Sizning @$kuser Kanalingizga @$bot xizmat ko'rsatishni boshladi!*", Markdown);
}
}

if(isset($channel_doc) or isset($channel_vid) or isset($channel_mus) or isset($channel_voi) or isset($channel_gif) or isset($channel_fot)){
bot('EditMessageReplyMarkup', [
'chat_id' => $channel_id,
'message_id' => $channel_mid,
'inline_query_id' => $cqid, 
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "❤ Yoqdi", 'callback_data' => "$from_id=❤ Yoqdi"],['text' => "🖤 Yoqmadi", 'callback_data' => "$from_id=🖤 Yoqmadi"]],[['text' => "⤴️ Do'stlarga ulashish", 'url' => "https://telegram.me/share/url?url=https://telegram.me/$channel_user/$channel_mid"]],
]
]),
]);
}

if(mb_stripos($data, "=")!==false){
$ex = explode("=", $data);
$emoji = $ex[1];
$mylike = file_get_contents("like/$calluser.$cmid.dat");
if(mb_stripos($mylike, "$callfrid")!==false){
acq($cqid, "☺️ Siz Allaqachon Ovoz Bergansiz!", false);
}else{
file_put_contents("like/$calluser.$cmid.dat","$mylike\n$callfrid=$emoji");
$value = file_get_contents("like/$calluser.$cmid.dat");
$like = substr_count($value, "❤");
$dislike = substr_count($value, "🖤");
bot('EditMessageReplyMarkup', [
'chat_id' => $ccid, 
'message_id' => $cmid,
'inline_query_id' => $cqid,
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "❤ Yoqdi $like", 'callback_data' => "$cuid=❤ Yoqdi"],['text' => "🖤 Yoqmadi $dislike", 'callback_data' => "$cuid=🖤 Yoqmadi"]],[['text' => "⤴️ Do'stlarga ulashish", 'url' => "https://telegram.me/share/url?url=https://telegram.me/$calluser/$cmid"]],
]
]),
]);
acq($cqid, "✅ Ovozingiz qabul qilindi!", false);
if($callfrid == $admin){
}else{
if(mb_stripos($data, "$cuid=❤ Yoqdi")!==false){
sm("@$kanal", $txt, Html, true);
}
if(mb_stripos($data, "$cuid=🖤 Yoqmadi")!==false){
sm("@$kanal", $txt1, Html, true);
}
}
}
$mylike = file_get_contents("like/$calluser.$cmid.dat");
$sanjar = str_replace("$admin", "0", $mylike);
file_put_contents("like/$calluser.$cmid.dat", $sanjar);
}

if(isset($channel_text)){
bot('EditMessageReplyMarkup', [
'chat_id' => $channel_id,
'message_id' => $channel_mid,
'reply_markup' => json_encode([
'inline_keyboard' => [
[['text' => "♻️ Do'stlarga ulashish", 'url' => "https://telegram.me/share/url?url=https://telegram.me/$channel_user/$channel_mid"]],
]
]),
]);
}

if($text == "/send" and $chat_id == $admin){
sm($admin, "*Yuboriladigan xabar matnini kiriting!*", Markdown);
file_put_contents("xabar.txt", "user");
}elseif($text == "/send"){
sm($chat_id, $txt3, Markdown, true);
}
if($xabar == "user" and $chat_id == $admin){
if($text == "/cancel"){
unlink("xabar.txt");
}else{
$lich = explode("\n", $lichka);
foreach($lich as $lichkalar){
$okuser = sm($lichkalar, $text, Markdown, true, $keyboard);
}
if($okuser){
sm($admin, "*Hamma userlarga yuborildi!*", Markdown); unlink("xabar.txt");
}
}
}

if($text == "/channel" and $chat_id == $admin){
sm($admin, "*Kanallarga yuboriladigan xabar matnini kiriting!*", Markdown);
file_put_contents("xabar.txt", "guruh");
}elseif($text == "/channel"){
sm($chat_id, $txt3, Markdown, true);
}
if($xabar == "guruh" and $chat_id == $admin){
if($text == "/cancel"){
unlink("xabar.txt");
}else{
$grup = explode("\n", $gruppa);
foreach($grup as $chatlar){
$okguruh = sm($chatlar, $text, Markdown, true, $keyboard);
}
if($okguruh){
sm($admin, "*Hamma kanallarga yuborildi!*", Markdown); unlink("xabar.txt");
}
}
}

if($text == "/stat"){
$lich = substr_count($lichka, "\n");
$gr = substr_count($gruppa, "\n");
$jami = $lich + $gr;
sm($chat_id, "<b>🤖 Bot foydalanuvchilari soni:\n🎗 A'zolar: </b>$lich<b> ta\n🎲 Kanallar: </b>$gr<b> ta\n♂️ Jami: </b>$jami<b> ta</b>", Html);
}

if(mb_stripos($text, "/mult")!==false){
sm($admin, "*/mult\n💠 Kanal.msgid\n☺️ Soni\n🖤 L/D*", Markdown);
$vote = explode("\n", $text);
$msg_id = $vote[1]; $son = $vote[2]; $arg = $vote[3]; $qosh ='1';
$exp = str_replace(".", "/", $msg_id);
do{ $qosh++;
$datmsg = file_get_contents("like/$msg_id.dat");
file_put_contents("like/$msg_id.dat", "$datmsg\n$arg");
} while($qosh <= $son);
sm($admin, "*☕ [https://t.me/$exp] kanalidagi ushbu postga:\n🎁 $son ta - $arg bosildi!*", Markdown);
}

?>