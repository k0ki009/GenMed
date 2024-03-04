<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required form fields are set and not empty
    if (isset($_POST['doctor_id'], $_POST['edit_first_name'], $_POST['edit_specialization'], $_POST['edit_address'], $_FILES['edit_image']) && !empty($_POST['doctor_id']) && !empty($_POST['edit_first_name']) && !empty($_POST['edit_specialization']) && !empty($_POST['edit_address']) && !empty($_FILES['edit_image']['name'])) {
        $doctor_id = $_POST['doctor_id'];
        $edit_first_name = $_POST['edit_first_name'];
        $edit_specialization = $_POST['edit_specialization'];
        $edit_address = $_POST['edit_address'];
        
        // File upload configuration
        $target_dir = "admin/dist/doctor/";
        $target_file = $target_dir . basename($_FILES["edit_image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
        // Check if the file is an actual image
        $check = getimagesize($_FILES["edit_image"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        
        // Check file size (max 500KB)
        if ($_FILES["edit_image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        
        // Allow only certain file formats (JPG, JPEG, PNG, GIF)
        $allowed_formats = array("jpg", "jpeg", "png", "gif");
        if (!in_array($imageFileType, $allowed_formats)) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // Attempt to upload the file
            if (move_uploaded_file($_FILES["edit_image"]["tmp_name"], $target_file)) {
                // Prepare and execute the update query
                $update_query = "UPDATE doctors SET fName = '$edit_first_name', department = '$edit_specialization', address = '$edit_address', image = '".basename($_FILES["edit_image"]["name"])."' WHERE id = $doctor_id";
                $update_result = mysqli_query($conn, $update_query);
                
                if ($update_result) {
                    echo "Doctor information updated successfully.";
                } else {
                    echo "Error updating doctor information: " . mysqli_error($conn);
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "Invalid data received.";
    }
} else {
    echo "Invalid request method.";
}
?>
