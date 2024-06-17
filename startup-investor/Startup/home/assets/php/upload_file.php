<?php
session_start();
include("../../../../Assets/php/connection/connection.php");
$id = $_SESSION['user_id'];

$allowedExts = array("mp4");
$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
$dir = "../upload/".$id;
$dir_path = str_replace(' ','',$dir);
if(!file_exists($dir_path)){
    mkdir($dir_path,0777);
}

if ((($_FILES["file"]["type"] == "video/mp4"))&& in_array($extension, $allowedExts)){
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {

    if (file_exists("../upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
        $filename = $_FILES['file']['name'];
        $location = $dir_path."/".$filename;
        if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
            $location = str_replace('../','assets/',$location);
            mysqli_query($con,"INSERT INTO startup (unique_id,video_url) values('$id','$location') ON DUPLICATE KEY UPDATE video_url = '".$location."'");   
            echo "<script>
                    window.location.href = 'profile.php';
                    alert('Video Uploaded');
                    </script>"; 
        }
      }
    }
  }
else
  {
  echo "Invalid file";
  }
?>