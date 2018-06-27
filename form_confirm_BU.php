<?php 
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Swallows Form</title>
<link rel="stylesheet" href="styles.css" />
</head>

<body>

<h1 class="center">Swallows topics form</h1>
<div class="swform">
 
 <form  name="frm_swallow" action="emailform.php" method="post" enctype="multipart/form-data">
 <table>
  <tr>
   <td class="fs14">Sender name</td>
  </tr>
  <tr>
   <td class="pl20">
    <p class="pl20"><?=$_SESSION['form_data']['sendername']?></p>
   </td>
  </tr>
  <tr>
   <td class="fs14">Category</td>
  </tr>
  <tr>
   <td class="pl20">
   <p class="pl20"> <?=$_SESSION['form_data']['category']?></p>
   </td>
  </tr>
  <tr>
   <td class="fs14">Topics Title</td>
  </tr>
  <tr>
   <td class="pl20">
    <p class="pl20"><?=$_SESSION['form_data']['topics']?></p>
   </td>
  </tr>
  <tr>
   <td class="fs14">Sample Page URL</td>
  </tr>
  <tr>
   <td class="pl20">
    <p class="pl20"><?=$_SESSION['form_data']['url']?></p>
   </td>
  </tr>
  <tr>
   <td class="fs14">Release date</td>
  </tr>
  <tr>
   <td class="dates pl20">
      <p class="pl20"> <?=$_SESSION['form_data']['year']?> 年 <?=$_SESSION['form_data']['month']?>月 <?=$_SESSION['form_data']['day']?>日 <?=$_SESSION['form_data']['time']?></p>
   </td>
  </tr>
  <tr>
   <td class="fs14">依頼内容</td>
  </tr>
  <tr>
   <td class="pl20">
    <p class="pl20"><?=$_SESSION['form_data']['content']?></p>
   </td>
  </tr>
  <tr>
   <td class="fs14">Upload files</td>
  </tr>
  <tr>
   <td class="pl20">
    <p class="pl20"><?=$_SESSION['form_data']['file_name']?> </p>
   </td>
  </tr>
  <tr>
   <td class="right">
     <input type="submit" name="send" class="w100" />
   </td>
  </tr>
 
 </table>
 </form>
</div>

</body>
</html>