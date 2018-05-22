<?php

require_once("../../vendor/autoload.php");
if (!isset($_SESSION)) session_start();

use App\Message\Message;

$msg = Message::message();

echo "<div>  <div id='message'>  $msg </div>   </div>";

$objPatientInfo = new App\PatientInfo\PatientInfo();

$allData = $objPatientInfo->trashed();

?>


<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Set Sub Test & Patient Information</title>

    <script src="../../resource/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../resource/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../resource/bootstrap/css/main.css">
    <style>
        body {
            background: white;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 style="color: #442a8d;width:100%; font-size:">Trashed  List Test & Patient Information Entry</h3>

            <form id="selectionForm" action="recover_multiple.php" method="post">
                <div class="nav navbar">

                    <input class="btn btn-warning btn-md" type="button" id="recoverMultiple" value="Recover Multiple">

            <table class="table table-bordered table-striped">

                <tr>

                    <th>Check All <input type='checkbox' id='select_all' name='select_all'></th>
                    <th>Serial</th>
                    <th>ID</th>
                    <th>Patient Name</th>
                    <th>Mobile No</th>
                    <th>Age</th>
                    <th>Sex</th>
                    <th>Referred By</th>
                    <th>Delivery Date</th>
                    <th>Description</th>
                    <th>Invoice No</th>
                    <th>Invoice Type</th>
                    <th>Time</th>
                    <th>Acttion Buttons</th>

                </tr>


                <?php

                $serial = 1;

                foreach ($allData as $record) {

                    echo "
                         
                         
                <tr>
                    <td><input type='checkbox' class='checkbox' name='multiple[]' value='$record->id'> </td>
                    <td>$serial</td>
                    <td>$record->id</td>
                    <td>$record->patient_name</td>
                    <td>$record->mobile_no</td>
                    <td>$record->age</td>
                    <td>$record->sex</td>
                    <td>$record->doctor_id</td>
                    <td>$record->delivery_date</td>
                    <td>$record->description</td>
                    <td>$record->invoice_no</td>
                    <td>$record->invoice_type</td>
                    <td>$record->time</td>
                    
                    <td>
                    
                     <a href='view.php?id=$record->id' class='btn btn-primary btn-sm'>View</a>
                       <a href='edit.php?id=$record->id' class='btn btn-info btn-sm'>Edit</></a>
                          <a href='recover.php?id=$record->id' class='btn btn-success'>Recover</button></a>
                             <a href='delete.php?id=$record->id' class='btn btn-danger btn-sm'>Delete</a>
                    
                    
                    </td>
                    

                </tr>
                                                 
                                                                        
                      ";// end of echo

                    $serial++;

                }// end of foreach loop


                ?>


            </table>


        </div>
    </div>
</div>

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