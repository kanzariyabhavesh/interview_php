<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Number 2</title>
</head>

<body>

    <center>
        <h1>User Enter Input Boxes</h1>
    </center>
    <form action="third_page.php" method="post">
        <?php
        if (isset($_POST['number'])) {
            $Number = $_POST['number'];
        }
            
        if (isset($_POST['number'])) {
           if ($Number < 3) {
                    header('location:index.php');            
           }
        }

            if (isset($_GET['numberbox:'])) {
                $Number=$_GET['numberbox:'];
                echo 'Please input values in at least 3 textboxes</br>';
            }

        for ($i = 1; $i <= $Number; $i++) {
        ?>
            <label for="number box">Enter Number box <?php echo $i; ?></label>
            <input type="text" name="numberbox:<?php echo $i; ?>" id="numberid <?php echo $i; ?>"></br>
        <?php
        }
        ?>
        <input type="hidden" name="HiddenValue" value="<?php if (isset($Number)) {
                                                            echo $Number;
                                                        } ?>">
        <button type="submit" name="Submit">Submit</button>
    </form>
</body>

</html>