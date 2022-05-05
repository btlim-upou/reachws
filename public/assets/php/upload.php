
<?php 

/* Get the name of the uploaded file */
$filename = $_FILES['file']['name'];

$result = array();

/* Choose where to save the uploaded file */
// $newName = time() . '-' . $filename;
$location = "../../storage/attachments/".$filename; 

// Save the uploaded file to the local filesystem 
if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
    $result['success'] = true; 
    $result['new_name'] = $newName;
} else {
    $result['success'] = false; 
}
echo $result;
return json_encode($result);

?>