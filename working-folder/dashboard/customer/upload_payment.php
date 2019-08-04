<?php 
    include "../includes/functions.php";
    include "../includes/connection.php";

    session_start();
    
    $student = new Student;
    $studentData = $student->getStudentData($_SESSION['loggedInId']);
    $studentImages = $student->getStudentImage($_SESSION['loggedInId']);

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit_upload_foto"])) {

        $target_dir = "uploads/";
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo(basename($_FILES["file_foto"]["name"]), PATHINFO_EXTENSION));
        $newFileName = md5(uniqid(rand(), true))  . "." . $imageFileType;
        $target_file = $target_dir . $newFileName;

        $check = getimagesize($_FILES["file_foto"]["tmp_name"]);
        if($check === false) {
            // echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 0;
        } 

        // get image width
        $sizes = explode(" ", $check[3]);
        $width = "";
        for ($i = 0; $i < strlen($sizes[0]); $i++) {
            if (is_numeric($sizes[0][$i])) {
                $width .= $sizes[0][$i];
                // echo $sizes[0][$i];
                // echo "<br>";
                // echo $width;
                // echo "<br>";
            }
        }

        $width = $width + 0;

        if ($_POST['jenis_foto'] == "X") {
            $uploadOk = 0;
        }

        $foto_diri = 0;
        $foto_rapor = 0;
        $foto_prestasi = 0;

        while ($row = $studentImages->fetch_assoc()) {

            if ($row['jenis_foto'] == "diri") {
                $foto_diri += 1;
            } elseif ($row['jenis_foto'] == "rapor") {
                $foto_rapor += 1;
            } elseif ($row['jenis_foto'] == "prestasi") {
                $foto_prestasi += 1;
            }
        }

        if ($_POST['jenis_foto'] == "diri" && $foto_diri > 0) {
            $uploadOk = 0;
        } elseif ($_POST['jenis_foto'] == "rapor" && $foto_rapor > 2) {
            $uploadOk = 0;
        } elseif ($_POST['jenis_foto'] == "prestasi" && $foto_prestasi > 2) {
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }
        // Check file width
        if ($width > 600) {
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["file_foto"]["size"] > 120000) {
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg"  && $imageFileType != "jpeg") {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $pop = "Upload error";
            header("Location: index.php?pop=$pop");
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file_foto"]["tmp_name"], $target_file)) {

                $query = "INSERT INTO images (student_id, jenis_foto, nama_foto) VALUE (?, ?, ?)";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('iss', $id_query, $jenis_foto_query, $nama_foto_query);
                $id_query = $studentData['student_id'];
                $jenis_foto_query = $_POST['jenis_foto'];
                $nama_foto_query = $newFileName;
                $stmt->execute();
                $stmt->close();
                $conn->close();

                $pop = "Upload berhasil";
                header("Location: index.php?pop=$pop");
            } else {
                $pop = "Upload error";
                header("Location: index.php?pop=$pop");
            }
        }
    }

    

?>