
<?php
if(isset($_POST)) {
	$errors = array();
	$error_flag = 0;
	if(empty($_POST["sendername"])) {
		$errors['sendername'] = "送信者の名前を選択してください。";
		$error_flag = 1;
	}
 	if(empty($_POST["category"])) {
		$errors['category'] = "カテゴリを選択してください。";
		$error_flag = 1;
	}
	
	if(empty($_POST["topics"])) {
		$errors['topics'] = "トピックスのタイトルを入力してください。";
		$error_flag = 1;
	}
 
 	if(empty($_POST["content"])) {
		$errors['content'] = "依頼内容を入力してください。";
		$error_flag = 1;
	}
 	
  $sender_name = $_POST["sendername"];
  $category = $_POST["category"];
  $topics_title = $_POST["topics"];
  $sample_url = $_POST["url"];
  $release_yr = $_POST["year"];
  $release_month = $_POST["month"];
  $release_day = $_POST["day"];
  $release_time = $_POST["time"];
  $task_description = $_POST["content"];
  $_POST["file_name"] = $_FILES["uploaded_file"]['name'];



if(count($_POST["file_name"]) > 0){
        //Loop through each file
        for($i=0; $i<count($_POST["file_name"]); $i++) {
          //Get the temp file path
            $tmpFilePath = $_FILES['uploaded_file']['tmp_name'][$i];

            //Make sure we have a filepath
            if($tmpFilePath != ""){
            
                //save the filename
                $shortname = $_POST["file_name"][$i];

                //save the url and the file
                $filePath = __DIR__.'/uploads/' . date('d-m-Y-H-i-s').'-'.$_FILES['uploaded_file']['name'][$i];

                //Upload the file into the temp dir
                if(move_uploaded_file($tmpFilePath, $filePath)) {

                    $files[] = $shortname;
                    //insert into db 
                    //use $shortname for the filename
                    //use $filePath for the relative url to the file

                }
              }
        }
    }






 /*if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], __DIR__.'/uploads/'. $_FILES["uploaded_file"]['name'])) {
    echo "Uploaded";
} else {
    echo "File was not uploaded";
}*/

 
 //echo $error_flag; die();
	//print_r($_POST); die();
	if($error_flag == 1) { //There is an error in the input
		session_start();
		$_SESSION['errors'] = $errors;
		$_SESSION['form_data'] = $_POST;
		$url = "http://".$_SERVER['SERVER_NAME']."/swallowform/form.php";
		header("Location: $url");
		
	} else { //Form inputs are correct, send email.
		
	  session_start();
		$_SESSION['errors'] = array();
		$_SESSION['form_data'] = $_POST;
		$url = "http://".$_SERVER['SERVER_NAME']."/swallowform/form_confirm.php";
		header("Location: $url");
	} 
}
?>

