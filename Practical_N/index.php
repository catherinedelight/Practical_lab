<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Upload Image</title>
   
</head>
<body>
    

<h2> Upload image <br> </h2>

    <form method="Post" enctype="multipart/form-data" >     
        <input type="file" name="file" >

        <br> <br>

        <button type="submit" name="upload" value="submit">Upload</button>

        <button type="submit" name="display" value="submit">Display</button>

    </form>


<?php

require ('database_connection_test.php');

 // Upload image.

$file="";

if(isset($_POST['upload'])){

    // store image into image variable
    
    $image=$_FILES['file'];

    $file=addslashes(file_get_contents($_FILES["file"]["tmp_name"]));

    $query="insert into images (image) VALUES('$file') ";

    $run_query=mysqli_query($connection,$query);

    if($run_query){
        echo '<script type="text/javascript" > alert("Image uploaded successfuly") </script> ';

    }
    else{
        echo '<script type="text/javascript" > alert("Image not uploaded") </script>' ;


    }


}

// display image from database;
if(isset($_POST['display'])){
    $query="select * from images";
$result=mysqli_query($connection,$query);
while($row=mysqli_fetch_array($result)){
    echo '
    <tr>
        <td>

            <img src="data:image/jpeg;base64,'.base64_encode($row['image']).'"/>
        </td>
    <tr>';

}


}


?>



</body>
</html>