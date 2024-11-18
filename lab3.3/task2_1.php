<?php 
if (isset($_GET['submit'])) {
    $username = $_GET['username'];
    if ($username == null) 
    {
        echo "Invalid username";
    } 
    else 
    {
        if(strlen($username)<2)
        {
            echo"Invalid username";
        }
        else if (!(($username[0] >= 'A' && $username[0] <= 'Z') || ($username[0] >= 'a' && $username[0] <= 'z'))) {
            echo "Invalid username";
        }
        else {
            $valid = true;
            for ($i = 0; $i < strlen($username); $i++) 
            {
                if (
                    !(
                        ($username[$i] >= 'A' && $username[$i] <= 'Z') || 
                        ($username[$i] >= 'a' && $username[$i] <= 'z') || 
                        $username[$i] == '.' || 
                        $username[$i] == '-' || 
                        $username[$i] == ' '
                    )
                ) {
                    $valid = false;
                    break;
                }
            }
            if (!$valid) {
                echo "Invalid username";
            } else {
                echo "Valid username";
            }
        }
    }
}
?>
