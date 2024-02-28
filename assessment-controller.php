<?php
 include ("connect.php");

  if(isset($_POST['newSub']))
  {
    $postSelectedOptions = $_POST['postSelectedOptions'];
    $postTotalLevel = $_POST['postTotalLevel'];
    $postLrn = $_POST['postLrn'];
    $postStrand = $_POST['postStrand'];
    $postYearLevel = $_POST['postYearLevel'];
    $jsonResponse = json_encode($postSelectedOptions);
    $postSelectedOptions = $jsonResponse;
  
    $sql = "INSERT INTO `learners_assessment`(`lrn`, `strand`, `year_level`, `depression_score`, `summary_choice`)
    VALUES ('$postLrn','$postStrand','$postYearLevel','$postTotalLevel','$postSelectedOptions')";
    if ($conn->query($sql) === TRUE)
    {
        // Get the ID of the last inserted record
        $lastInsertId = $conn->insert_id;

        // Return the ID in your response
        echo $lastInsertId;
    }
    else {     
      
      echo "Error insertion.";
    }
 
  }

  if(isset($_POST['updateSub']))
  {
    $postSelectedOptions = $_POST['postSelectedOptions'];
    $postTotalLevel = $_POST['postTotalLevel'];
    $postAssemenTd = $_POST['postAssemenTd'];
    $postLrn = $_POST['postLrn'];
    $postStrand = $_POST['postStrand'];
    $postYearLevel = $_POST['postYearLevel'];
    $jsonResponse = json_encode($postSelectedOptions);
    $postSelectedOptions = $jsonResponse;

    //update
    $sql = "UPDATE `learners_assessment` SET `lrn`='$postLrn',`strand`='$postStrand',`year_level`='$postYearLevel', `depression_score`='$postTotalLevel',`summary_choice`='$postSelectedOptions'
    WHERE  `id`= '$postAssemenTd'";

    if ($conn->query($sql) === TRUE)
    {
      echo $postAssemenTd;
    }
    else {     
      
        echo "Error update.";
    }
  }

  if(isset($_POST['postAssessmentId']))
  {
    $postAssessmentId = $_POST['postAssessmentId'];
    $assessment_var = array(); // Initialize an empty array

    // Your MySQL query
    $sql = "SELECT `lrn`, `strand`, `year_level`, `depression_score`, `summary_choice`, `assessment_date` FROM `learners_assessment` WHERE `id`='$postAssessmentId'";
    $result = $conn->query($sql);
    
    // Check if there are rows in the result
    if ($result->num_rows > 0) {
        // Fetch data and add it to the array
        while ($row = $result->fetch_assoc()) {
            $assessment_var[] = $row;
        }
    }
    
    // Close the MySQL connection
    $conn->close();
    
    // Print the array as JSON
    echo json_encode($assessment_var);
  }

?>