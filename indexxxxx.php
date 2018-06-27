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
 
 <form action="sendtopic.php" method="post" enctype="multipart/form-data">
 <table>
  <tr>
   <td class="fs20">Sender name</td>
  </tr>
  <tr>
   <td>
   <select name="sendername">
    <option value="">----</option>
    <option value="Yonemura">Yonemura</option>
    <option value="Araki">Araki</option>
    <option value="Asai">Asai</option>
    <option value="Ocampo">Ocampo</option>
   </select>
   </td>
  </tr>
  <tr>
   <td class="fs20">Category</td>
  </tr>
  <tr>
   <td>
    <select name="category">
    <option value="">----</option>
    <option value="チーム">チーム</option>
    <option value="ファーム">ファーム</option>
    <option value="グッズ">グッズ</option>
    <option value="チケット">チケット</option>
    <option value="イベント">イベント</option>
    <option value="CREW">CREW</option>
    <option value="メディア">メディア</option>
   </select>
   </td>
  </tr>
  <tr>
   <td class="fs20">Topics Title</td>
  </tr>
  <tr>
   <td>
    <input name="topics" type="text" />
   </td>
  </tr>
  <tr>
   <td class="fs20">Sample Page URL</td>
  </tr>
  <tr>
   <td>
    <input name="url" type="text" />
   </td>
  </tr>
  <tr>
   <td class="fs20">Release date</td>
  </tr>
  <tr>
   <td class="dates">
    
    <dl class="clearfix">
     <dt class="fl">
         <select name="year">
         <option value="<?php date("Y"); ?>"><?php echo date("Y"); ?></option>
         <option value="2018">2018</option>
         <option value="2018">2019</option>
         <option value="2018">2020</option>
        </select>
     </dt>
     <dd class="fl"><label for="年">年</label></dd>
     <dt class="fl">
      	<select name="month">
         <option value="<?php date("m"); ?>"><?php echo date("m"); ?></option>
         <option value="01">01</option>
         <option value="02">02</option>
         <option value="03">03</option>
         <option value="04">04</option>
         <option value="05">05</option>
         <option value="06">06</option>
         <option value="07">07</option>
         <option value="08">08</option>
         <option value="09">09</option>
         <option value="10">10</option>
         <option value="11">11</option>
         <option value="12">12</option>
        </select>
     </dt>
     <dd class="fl"><label for="月">月</label></dd>
     <dt class="fl">
         <select name="day">
         <option value="<?php date("d"); ?>"><?php echo date("d"); ?></option>
         <option value="01">01</option>
         <option value="02">02</option>
         <option value="03">03</option>
         <option value="04">04</option>
         <option value="05">05</option>
         <option value="06">06</option>
         <option value="07">07</option>
         <option value="08">08</option>
         <option value="09">09</option>
         <option value="10">10</option>
         <option value="11">11</option>
         <option value="12">12</option>
         <option value="13">13</option>
         <option value="14">14</option>
         <option value="15">15</option>
         <option value="16">16</option>
         <option value="17">17</option>
         <option value="18">18</option>
         <option value="19">19</option>
         <option value="20">20</option>
         <option value="21">21</option>
         <option value="22">22</option>
         <option value="23">23</option>
         <option value="24">24</option>
         <option value="25">25</option>
         <option value="26">26</option>
         <option value="27">27</option>
         <option value="28">28</option>
         <option value="29">29</option>
         <option value="30">30</option>
         <option value="31">31</option>
        </select>
     </dt>
     <dd class="fl"><label for="日">日</label></dd>
     <dt class="fr">
     <?php 
	 function get_times( $default = 'H:i', $interval = '+30 minutes' ) {

    $output = '';

    $current = strtotime( '00:00' );
    $end = strtotime( '23:59' );

    while( $current <= $end ) {
        $time = date( 'H:i', $current );
        $sel = ( $time == $default ) ? ' selected' : '';

        $output .= "<option value=\"{$time}\"{$sel}>" . date( 'H:i', $current ) .'</option>';
        $current = strtotime( $interval, $current );
    }

    return $output;
}
	 
	 ?>
     <select name="time"><?php echo get_times(); ?></select>
     <!--select name="time">
      <option value=""><?php //echo date("h"). ":" .date("i"); ?></option>
      <option value="01:00">01:00</option>
      <option value="02:00">02:00</option>
      <option value="03:00">03:00</option>
      <option value="04:00">04:00</option>
      <option value="05:00">05:00</option>
      <option value="06:00">06:00</option>
      <option value="07:00">07:00</option>
      <option value="08:00">08:00</option>
      <option value="09:00">09:00</option>
      <option value="10:00">10:00</option>
      <option value="11:00">11:00</option>
      <option value="12:00">12:00</option>
      <option value="13:00">13:00</option>
      <option value="14:00">14:00</option>
      <option value="15:00">15:00</option>
      <option value="16:00">16:00</option>
      <option value="17:00">17:00</option>
      <option value="18:00">18:00</option>
      <option value="19:00">19:00</option>
      <option value="20:00">20:00</option>
      <option value="21:00">21:00</option>
      <option value="22:00">22:00</option>
      <option value="23:00">23:00</option>
      <option value="24:00">24:00</option>
     </select-->
     </dt>
     <dd></dd>
    </dl>
    
   </td>
  </tr>
  <tr>
   <td class="fs20">依頼内容</td>
  </tr>
  <tr>
   <td>
    <textarea name="content" cols="20" rows="5"></textarea>
   </td>
  </tr>
  <tr>
   <td class="fs20">Upload files</td>
  </tr>
  <tr>
   <td>
    <input type="file" name="uploaded_file">
   </td>
  </tr>
  <tr>
   <td class="right">
     <input type="submit" name="send" class="w100" >
     <!--input type="button" value="Submit" type="submit" -->
     <!--input type="image" value="Submit" type="submit"-->
   </td>
  </tr>
 
 </table>
 </form>
</div>

</body>
</html>