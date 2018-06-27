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


  $email_message .= "様から送信されました。 :".clean_string($sender_name)."\n \n";
  $email_message .= "カテゴリー: ".clean_string($category)."\n \n";
  $email_message .= "トピックスタイトル : ".clean_string($topics_title)."\n \n";
  $email_message .= "サンプルページURL : ".clean_string($sample_url)."\n \n";
  $email_message .= "公開日 : ".clean_string($release_yr)."年 ".clean_string($release_month)."月 ".clean_string($release_day)."日 ".clean_string($release_time)."\n \n";
  $email_message .= "依頼内容 : \n ".clean_string($task_description)."\n \n";
   
  //$filename =  $_SESSION['form_data']['file_name'];
 
  $arr_files =  $_SESSION['form_data']['file_name'];
		foreach ($arr_files as $filename) {
			$filename;
			$file = __DIR__.'/uploads/' .$filename;
           // $content = file_get_contents( $file);
			
		}
  
$email_subject = $topics_title;
  
$content = file_get_contents( $file);
$content = chunk_split(base64_encode($content));
$uid = md5(uniqid(time()));
$name = basename($file);

// header

if($sender_name == "Araki"){
$header = "From: araki-h@cyscorpions.com" . "\r\n"."CC: araki-h@cyscorpions.com" . "\r\n";
}else if($sender_name == "Asai"){
$header = "From: asai-n@cyscorpions.com" . "\r\n"."CC: asai-n@cyscorpions.com" . "\r\n";
}else if($sender_name == "Yonemura"){
$header = "From: yonemura-k@cyscorpions.com" . "\r\n"."CC: yonemura-k@cyscorpions.com" . "\r\n";
}else{}
//$header .= "Reply-To: ".$replyto."\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";

// message & attachment
$nmessage = "--".$uid."\r\n";
$nmessage .= "Content-type:text/plain; charset=iso-8859-1\r\n";
$nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$nmessage .= $email_message."\r\n\r\n";
$nmessage .= "--".$uid."\r\n";
$nmessage .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n";
$nmessage .= "Content-Transfer-Encoding: base64\r\n";
$nmessage .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
$nmessage .= $content."\r\n\r\n";
$nmessage .= "--".$uid."--";

mail("ocampo-c@cyscorpions.com", " [Topics新規依頼]  ".$email_subject, $nmessage, $header);
  

session_destroy();
$url = "http://".$_SERVER['SERVER_NAME']."/swallowform/success.html";
header("Location: $url");
?>