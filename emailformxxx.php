<?php
session_start();
function clean_string($string) {
  $bad = array("content-type","bcc:","to:","cc:","href");
  return str_replace($bad,"",$string);
}
$sender_name = $_SESSION['form_data']['sendername']; // required
$category = $_SESSION['form_data']['category']; // required
$topics_title = $_SESSION['form_data']['topics']; // required
$task_description =$_SESSION['form_data']['content']; // required
$sample_url = $_SESSION['form_data']["url"];
$release_yr = $_SESSION['form_data']["year"];
$release_month = $_SESSION['form_data']["month"];
$release_day = $_SESSION['form_data']["day"];
$release_time = $_SESSION['form_data']["time"];

if($sender_name == "Yonemura"){
 $email_to = "ocampo-c@cyscorpions.com";
/* $headers = "From: yonemura-k@cyscorpions.com" . "\r\n" .
"CC: yonemura-k@cyscorpions.com";*/
 $from_name = "From: yonemura-k@cyscorpions.com" . "\r\n" .
"CC: yonemura-k@cyscorpions.com";
}else{}
if($sender_name == "Araki"){
 $email_to = "ocampo-c@cyscorpions.com";
/* $headers = "From: araki-h@cyscorpions.com" . "\r\n" .
"CC: araki-h@cyscorpions.com";*/
$from_name = "From: araki-h@cyscorpions.com" . "\r\n" .
"CC: araki-h@cyscorpions.com";
}else{}
if($sender_name == "Asai"){
 $email_to = "ocampo-c@cyscorpions.com";
 /*$headers = "From: asai-n@cyscorpions.com" . "\r\n" .
"CC: asai-n@cyscorpions.com";*/
$from_name = "From: asai-n@cyscorpions.com" . "\r\n" .
"CC: asai-n@cyscorpions.com";
}else{}
if($sender_name == "Ocampo"){
 $email_to = "ocampo-c@cyscorpions.com";
 /*$headers = "From: ocampo-c@cyscorpions.com" . "\r\n" .
"CC: ocampo-c@cyscorpions.com";*/
$from_name = "From: ocampo-c@cyscorpions.com" . "\r\n" .
"CC: ocampo-c@cyscorpions.com";
}else{}

  $email_message .= "様から送信されました。 :".clean_string($sender_name)."\n \n";
  $email_message .= "カテゴリー: ".clean_string($category)."\n \n";
  $email_message .= "トピックスタイトル : ".clean_string($topics_title)."\n \n";
  $email_message .= "サンプルページURL : ".clean_string($sample_url)."\n \n";
  $email_message .= "公開日 : ".clean_string($release_yr)."年 ".clean_string($release_month)."月 ".clean_string($release_day)."日 ".clean_string($release_time)."\n \n";
  $email_message .= "依頼内容 : \n ".clean_string($task_description)."\n \n";
  $filename .= __DIR__.'/uploads/' . $_SESSION['form_data']['file_name'];
  $email_subject = $topics_title;
  $headers .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"; // use different content types here
  $headers .= "Content-Transfer-Encoding: base64\r\n";
  $headers .= "Content-Disposition: attachment";
  
  
  $file = $path.$filename;
 $file_size = filesize($file);
 $handle = fopen($file, "r");
 $content = fread($handle, $file_size);
 fclose($handle);
 $content = chunk_split(base64_encode($content));
 $uid = md5(uniqid(time()));
 $header = "From: ".$from_name." <".$from_mail.">\r\n";
 $header .= "Reply-To: ".$replyto."\r\n";
 $header .= "MIME-Version: 1.0\r\n";
 $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
 $header .= "This is a multi-part message in MIME format.\r\n";
 $header .= "--".$uid."\r\n";
 $header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
 $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
 $header .= $message."\r\n\r\n";
 $header .= "--".$uid."\r\n";
 $header .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"; // use different content types here
 $header .= "Content-Transfer-Encoding: base64\r\n";
 $header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
 $header .= $content."\r\n\r\n";
 $header .= "--".$uid."--";
 if (mail($mailto, $subject, "", $header)) {
 echo "mail send ... OK"; // or use booleans here
 } else {
 echo "mail send ... ERROR!";
  
  
  
// send email to admin
/*$headers = "From: ocampo-c@cyscorpions.com" . "\r\n" .
"CC: ocampo-c@cyscorpions.com";*/
mail($email_to, " [Topics新規依頼]  ".$email_subject, $email_message, $headers); 



session_destroy();
$url = "http://".$_SERVER['SERVER_NAME']."/swallowform/success.html";
header("Location: $url");
?>