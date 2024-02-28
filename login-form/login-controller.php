<?php 
include ("../connect.php");

if(isset($_POST['postPassword']))
{
    $postEmail = $_POST["postEmail"];
    $postPassword = $_POST["postPassword"];

    // Validate user credentials
    $sql = "SELECT * FROM admin WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $postEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify the password
        $hashedPassword = encrypt_decrypt('decrypt', $row['password']); // Decrypt stored password
        if ($postPassword == $hashedPassword) {
            // If the password is correct, set up the session
            $_SESSION['user_email'] = $postEmail;
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['middle_name'] = $row['middle_name'];
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['occupation'] = $row['occupation'];

            // Redirect the user to the home page or any other authenticated page
              echo "Login success.";
            exit();
        } else {
            // Incorrect password
            echo "Invalid password.";
        }
    } else {
        // User not found
        echo "User not found.";
    }

    $stmt->close();
    $conn->close();
}

if(isset($_POST['postLogout']))
{
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to a specific page
    echo true;
    exit();
}

if(isset($_POST['check_email']))
{

    $postEmail = $_POST["check_email"];

    // Validate user credentials
    $sql = "SELECT * FROM admin WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $postEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // User found
        echo "User found.";

    } else {
        // User not found
        echo "User not found.";
    }

    $stmt->close();
    $conn->close();
}

?>
