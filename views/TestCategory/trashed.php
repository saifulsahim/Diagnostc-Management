<?php
require_once("../../vendor/autoload.php");

use App\Message\Message;

$msg = Message::message();

echo "<div>  <div id='message'>  $msg </div>   </div>";

$obj = new App\TestCategory\TestCategory();

$allData = $obj->trashed();
?>

<!
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../../resource/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../resource/bootstrap/js/bootstrap.min.js">
</head>
<body>

<h1>Trashed List - Test Category Information</h1>

<form id="selectionForm" action="recover_multiple.php" method="post">
    <div class="nav navbar">

        <input class="btn btn-warning btn-lg" type="button" id="recoverMultiple" value="Recover Multiple">
        <table class="table table-bordered table-striped">

            <tr>
                <th>Check All <input type='checkbox' id='select_all' name='select_all'></th>
                <th>Serial</th>
                <th>ID</th>
                <th>Name</th>
                <th>Action Buttons</th>

            </tr>


            <?php

            $serial = 1;

            foreach ($allData as $record) {
                echo "
        <tr>
             <td><input type='checkbox' class='checkbox' name='multiple[]' value='$record->id'> </td>
            <td>$serial</td>
            <td>$record->id </td>
            <td>$record->name </td>
            <td>
            
                <a href='view.php?id=$record->id' class='btn btn-primary'>View</button></a>
                <a href='edit.php?id=$record->id'  class='btn btn-warning'>Edit</button></a>
                <a href='recover.php?id=$record->id' class='btn btn-success'>Recover</button></a>
                <a href='delete.php?id=$record->id' class='btn btn-danger' onclick='return confirm_delete()'>Delete</button></a>
            
            
            </td>

        </tr>




        ";

                $serial++;

            }


            ?>
        </table>

        <script src="../../resource/bootstrap/js/jquery.js"></script>

        <script>


            jQuery(
                function ($) {
                    $('#message').fadeOut(550);
                    $('#message').fadeIn(550);
                    $('#message').fadeOut(550);
                    $('#message').fadeIn(550);
                    $('#message').fadeOut(550);
                    $('#message').fadeIn(550);
                    $('#message').fadeOut(550);
                }
            )
        </script>

        <script>

            function confirm_delete() {

                return confirm("Are you Sure?");

            }

        </script>






        <script >

        $("#select_all").change(function () {  //"select all" change
            var status = this.checked; // "select all" checked status
            $('.checkbox').each(function () { //iterate all listed checkbox items
                this.checked = status; //change ".checkbox" checked status
            });
        });

        $('.checkbox').change(function () { //".checkbox" change
            //uncheck "select all", if one of the listed checkbox item is unchecked
            if (this.checked == false) { //if this item is unchecked
                $("#select_all")[0].checked = false; //change "select all" checked status to false
            }

            //check "select all" if all checkbox items are checked
            if ($('.checkbox:checked').length == $('.checkbox').length) {
                $("#select_all")[0].checked = true; //change "select all" checked status to true
            }
        });


        </script>

        <script>

            function checkEmptySelection() {

                emptySelection = true;

                $('.checkbox').each(function () {
                    if (this.checked) emptySelection = false;
                });

                return emptySelection;
            }


            $("#recoverMultiple").click(function () {
                if (checkEmptySelection()) {
                    alert("Empty Selection! Please select some record(s) first")
                } else {
                    $("#selectionForm").submit();
                }
            });


        </script>


</body>
</html>