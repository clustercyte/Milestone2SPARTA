<?php 

include "../../assets/includes/connection.php";

session_start(); 

if (isset($_POST['submit_order'])) {

    $user_id = $_SESSION['loggedInId'];
    $cs_name = $_POST['cs_name'];
    $cs_itb_or_not = $_POST['cs_itb_or_not'];
    $cs_institution = $_POST['cs_institution'];
    $cs_faculty = $_POST['cs_faculty'];
    $cs_email = $_POST['cs_email'];
    $cs_order_amount = $_POST['cs_order_amount'];
    $cs_phone = $_POST['cs_phone'];
    $cs_line = $_POST['cs_line'];
    $cs_address = $_POST['cs_address'];

    $query = "INSERT INTO preorders (";
    $query .= "user_id,";
    $query .= "cs_name,";
    $query .= "cs_itb_or_not,";
    $query .= "cs_institution,";
    $query .= "cs_faculty,";
    $query .= "cs_email,";
    $query .= "cs_order_amount,";
    $query .= "cs_phone,";
    $query .= "cs_line,";
    $query .= "cs_address) VALUE (";
    $query .= "?,?,?,?,?,?,?,?,?,?)";

    $stmt = $conn->prepare($query);
    $stmt->bind_param('isssssisss', $id_query, $name_query, $itb_query, $institution_query, $faculty_query, $email_query, $amount_query, $phone_query, $line_query, $address_query);

    $id_query = $user_id;
    $name_query = $cs_name;
    $itb_query = $cs_itb_or_not;
    $institution_query = $cs_institution;

    if ($cs_itb_or_not == "itb") {
        $faculty_query = $cs_faculty;
    } else {
        $faculty_query = "";
    }

    $email_query = $cs_email;
    $amount_query = $cs_order_amount;
    $phone_query = $cs_phone;
    $line_query = $cs_line;
    $address_query = $cs_address;

    $stmt->execute();
    $stmt->close();

}

?>