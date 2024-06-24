<?php

include("connect.php");

if(isset($_GET["deleteid"])){
    $id = $_GET["deleteid"];

    // SQL statements to delete the user and reset auto-increment
    $sql = "DELETE FROM `user` WHERE id = $id;
            SET @num := 0;
            UPDATE `user` SET id = @num := (@num+1);
            ALTER TABLE `user` AUTO_INCREMENT = 1;";

    // Execute multiple queries
    if (mysqli_multi_query($con, $sql)) {
        // Ensure all queries are executed
        do {
            if ($result = mysqli_store_result($con)) {
                mysqli_free_result($result);
            }
        } while (mysqli_next_result($con));
        
        // Redirect to avoid resubmission
        header("Location: display.php");
        exit;
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

/*

Explanation:
mysqli_multi_query:

This function is used to execute multiple SQL statements in one call. It's necessary when you want to run several queries 
separated by semicolons.
Ensuring all queries are executed:

The do-while loop ensures that all results from the multiple queries are processed and any remaining results are freed. 
This is crucial to avoid issues with unprocessed results.

Redirect:

After the queries are executed, the script redirects to display.php to avoid form resubmission.

*/

?>

