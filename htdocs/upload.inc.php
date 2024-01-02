<?php
if (isset($_POST['submit'])) {
    $newFileName = $_POST['filename'];
    if (empty($newFileName)) {
        $newFileName = "gallery";
    } else {
        $newFileName = strtolower(str_replace(" ", "-", $newFileName));
    }
    
    $imageTitle = $_POST['filetitle'];
    $imageDesc = $_POST['filedesc'];
    
    $file = $_FILES['file'];

     $fileName = $file["name"];
     $fileType = $file["type"];
     $fileTempName = $file["tmp_name"];
     $fileError = $file["error"];
     $fileSize = $file["size"];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');
    
    if (in_array($fileActualExt, $allowed)) {
         if($fileError === 0){
            if ($fileSize < 1000000) {
                $imageFullName = $newFileName  . "." . uniqid("", true) . "." . $fileActualExt;
                $fileDestination = 'uploads/' . $imageFullName;
                include_once "dbh_third.inc.php";

                if (empty($imageTitle) || empty($imageDesc))  {
                    header("Location: uploads.php?uploadempty");
                    exit();
                } else {
                    $sql = "SELECT * FROM photos;";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header ("Location: uploads.php?statementfailed"); 
                        exit();
                    } else {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $rowCount = mysqli_num_rows($result );
                        $setImageOrder = $rowCount + 1;

                        $sql = "INSERT INTO photos (titleGallery, descGallery, imgFullNameGallery, orderGallery) VALUES (?, ?, ?, ?);";
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            header ("Location: uploads.php?statementfailed"); 
                            exit();
                        } else {
                            mysqli_stmt_bind_param($stmt, "ssss", $imageTitle, $imageDesc, $imageFullName, $setImageOrder);
                            mysqli_stmt_execute($stmt);

                            move_uploaded_file($fileTempName, __DIR__.'uploads/'. $imageFullName);
                                header("Location: uploads.php?uploadsuccess");
                                exit();
                        }
                    }
                }
            } else {
                header ("Location: uploads.php?Imagetoolarge"); 
                        exit();
            }
         } else {
            header ("Location: uploads.php?error"); 
                        exit();
         }    
    } else {
        header ("Location: uploads.php?onlyimagesallowed"); 
                        exit();
    }
}