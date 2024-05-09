<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Number 3</title>
</head>

<body>
    <center>
        <h1>select check box</h1>
    </center>
    <form action="foruth_page.php" method="post">
    <?php
    $number = $_POST['HiddenValue'];
    $validCount = 0;
    for ($i = 1; $i <= $number; $i++) {
        $inputName = 'numberbox:'. $i;
        $inputValue = $_POST[$inputName] ?? '';
        if (!empty($inputValue)) {
            $validCount++;
    ?>
        <label for="<?php echo $inputValue; ?>">Value <?php echo $i; ?></label>
        <input type="text" name="<?php echo $inputValue; ?>" value="<?php echo $inputValue ?>" readonly>
        <input type="checkbox" name="checkboxname[]" id="checkboxid <?php echo $i; ?>" value="<?php echo $inputValue ; ?>">    </br>
    <?php
    }
}
?>
    </br>
    <button type="button" name="CheckAll" onclick="checkall()" >Check All</button>
    <button type="button" name="ClearAll" onclick="clearall()">Clear All</button>
    <?php 
     if ($validCount <=2) {
        header('location:second_page.php?numberbox:='.$number.'');
     }
     else{
        echo "<button type='submit' name='submit'>Submit</button>";
     }
    ?>
    </form>
</body>
<script>

    function checkall(){
        var checkboxes=document.getElementsByName('checkboxname[]');
        checkboxes.forEach((checkbox)=>{
            checkbox.checked=true;
        });
    }
    function clearall(){
        var checkboxes=document.getElementsByName('checkboxname[]');
        checkboxes.forEach((checkbox)=>{
            checkbox.checked=false;
        });
    }

</script>
</html>