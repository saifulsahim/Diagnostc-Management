<?php
require_once ("../../vendor/autoload.php");
if(!isset($_SESSION)) session_start();

$obj = new App\Expenses\Expenses();


$allData=$obj->index();


use App\Message\Message;
use App\Utility\Utility;

$msg = Message::message();






################## search  block 1 of 5 start ##################
if(isset($_REQUEST['search']) ){

    $someData =  $obj->search($_REQUEST);
}

$availableKeywords = $obj->getAllKeywords();
$comma_separated_keywords= '"'.implode('","',$availableKeywords).'"';

################## search  block 1 of 5 end ##################





######################## pagination code block#1 of 2 start ######################################
$recordCount= count($allData);


if(isset($_REQUEST['Page']))   $page = $_REQUEST['Page'];
else if(isset($_SESSION['Page']))   $page = $_SESSION['Page'];
else   $page = 1;
$_SESSION['Page']= $page;


if(isset($_REQUEST['ItemsPerPage']))   $itemsPerPage = $_REQUEST['ItemsPerPage'];
else if(isset($_SESSION['ItemsPerPage']))   $itemsPerPage = $_SESSION['ItemsPerPage'];
else   $itemsPerPage = 3;
$_SESSION['ItemsPerPage']= $itemsPerPage;



$pages = ceil($recordCount/$itemsPerPage);

$someData = $obj->indexPaginator($page,$itemsPerPage);
$allData= $someData;


$serial = (  ($page-1) * $itemsPerPage ) +1;



if($serial<1) $serial=1;
####################### pagination code block#1 of 2 end #########################################






################## search  block 2 of 5 start ##################
if(isset($_REQUEST['search']) )$someData =  $obj->search($_REQUEST);

if(isset($_REQUEST['search']) ) {
    $serial = 1;
    $allData=$someData;

}
################## search  block 2 of 5 end ################



?>
<!
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../../resource/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../resource/bootstrap/css/main.css">
    <link rel="stylesheet" href="../../resource/bootstrap/js/bootstrap.min.js">



    <!-- required for search, block3 of 5 start -->

    <link rel="stylesheet" href="../../resource/bootstrap/css/jquery-ui.css">
    <script src="../../resource/bootstrap/js/jquery.js"></script>
    <script src="../../resource/bootstrap/js/jquery-ui.js"></script>

    <!-- required for search, block3 of 5 end -->



</head>
<body>


<!-- required for search, block 4 of 5 start -->

<div style="margin-left: 68%">
    <form id="searchForm" action="index.php"  method="get" style="margin-top: 5px; margin-bottom: 10px ">
        <input type="text" value="" id="searchID" name="search" placeholder="Search" width="60" >
        <input type="checkbox"  name="byName"   checked  >By Name
        <input type="checkbox"  name="byDescription"  checked >By Description
        <input hidden type="submit" class="btn-primary" value="search">
    </form>
</div>

<!-- required for search, block 4 of 5 end -->







<h1>Active List- Expenses </h1>
    <form id="selectionForm" action="trash_multiple.php" method="post">

        <div class="nav navbar-brand">
            <input class="btn btn-warning btn-sm" id="trashMultiple" type="button" value="Trash Multiple" >
            <input class="btn btn-danger btn-sm" id="deleteMultiple" type="button" value="Delete Multiple" >

        </div>

    <table class="table table-bordered table-striped">

      <tr>

         <th>Check All <input type="checkbox" name="select_all" id="select_all"></th>
        <th>Serial</th>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Active Buttons</th>

      </tr>

        <?php
        $serial=1;
        foreach ($allData as $record) {

            echo "
            
            <tr>
                <td><input type='checkbox' class='checkbox' name='multiple[]' value='$record->id'></td>
                <td>$serial</td>
                <td>$record->id</td>
                <td>$record->name</td>
                <td>$record->description</td>
                <td>
                
                 <a href='view.php?id=$record->id' class='btn btn-primary btn-sm'>View</a>
                  <a href='edit.php?id=$record->id' class='btn btn-warning btn-sm'>Edit</a>
                   <a href='trash.php?id=$record->id' class='btn btn-success btn-sm'>Trash</a>
                    <a href='delete.php?id=$record->id' class='btn btn-danger btn-sm' onclick='return confirm_delete()'>Delete</a>
                
                
                
                
                
                
                </td>
            
            </tr>
            
            
            ";


            $serial++;
        }

        ?>

    </table>

    </form>



<!--  ######################## pagination code block#2 of 2 start ###################################### -->
<div align="left" class="col-sm-3" >
    <ul class="pagination" >

        <?php

        $pageMinusOne  = $page-1;
        $pagePlusOne  = $page+1;


        if($page>$pages) Utility::redirect("index.php?Page=$pages");

        if($page>1)   echo "<li><a href='index.php?Page=$pageMinusOne'>" . "Previous" . "</a></li>";


        for($i=1;$i<=$pages;$i++)
        {
            if($i==$page) echo '<li class="active"><a href="">'. $i . '</a></li>';
            else  echo "<li><a href='?Page=$i'>". $i . '</a></li>';

        }
        if($page<$pages) echo "<li><a href='index.php?Page=$pagePlusOne'>" . "Next" . "</a></li>";

        ?>

        <select  class="form-control"  name="ItemsPerPage" id="ItemsPerPage" onchange="javascript:location.href = this.value;" >
            <?php
            if($itemsPerPage==3 ) echo '<option value="?ItemsPerPage=3" selected >Show 3 Items Per Page</option>';
            else echo '<option  value="?ItemsPerPage=3">Show 3 Items Per Page</option>';

            if($itemsPerPage==4 )  echo '<option  value="?ItemsPerPage=4" selected >Show 4 Items Per Page</option>';
            else  echo '<option  value="?ItemsPerPage=4">Show 4 Items Per Page</option>';

            if($itemsPerPage==5 )  echo '<option  value="?ItemsPerPage=5" selected >Show 5 Items Per Page</option>';
            else echo '<option  value="?ItemsPerPage=5">Show 5 Items Per Page</option>';

            if($itemsPerPage==6 )  echo '<option  value="?ItemsPerPage=6"selected >Show 6 Items Per Page</option>';
            else echo '<option  value="?ItemsPerPage=6">Show 6 Items Per Page</option>';

            if($itemsPerPage==10 )   echo '<option  value="?ItemsPerPage=10"selected >Show 10 Items Per Page</option>';
            else echo '<option  value="?ItemsPerPage=10">Show 10 Items Per Page</option>';

            if($itemsPerPage==15 )  echo '<option  value="?ItemsPerPage=15"selected >Show 15 Items Per Page</option>';
            else    echo '<option  value="?ItemsPerPage=15">Show 15 Items Per Page</option>';
            ?>
        </select>
    </ul>

</div>
<!--  ######################## pagination code block#2 of 2 end ###################################### -->










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

    function confirm_delete(){
        return confirm("Are you sure?");
    }

</script>


<script>

    $('#deleteMultiple').click(function(){

        if(checkEmptySelection()){
            alert("Empty Selection! Please select some record(s) first")
        }
        else{
            var r = confirm("Are you sure you want to delete the selected record(s)?");

            if(r){
                var selectionForm =   $('#selectionForm');
                selectionForm.attr("action","delete_multiple.php");
                selectionForm.submit();
            }
        }
    });


</script>



<script>

        //select all checkboxes
        $("#select_all").change(function(){  //"select all" change
            var status = this.checked; // "select all" checked status
            $('.checkbox').each(function(){ //iterate all listed checkbox items
                this.checked = status; //change ".checkbox" checked status
            });
        });

        $('.checkbox').change(function(){ //".checkbox" change
//uncheck "select all", if one of the listed checkbox item is unchecked
            if(this.checked == false){ //if this item is unchecked
                $("#select_all")[0].checked = false; //change "select all" checked status to false
            }

//check "select all" if all checkbox items are checked
            if ($('.checkbox:checked').length == $('.checkbox').length ){
                $("#select_all")[0].checked = true; //change "select all" checked status to true
            }
        });

    </script>

<script>

    function checkEmptySelection(){

        emptySelection =true;

        $('.checkbox').each(function(){
            if(this.checked)   emptySelection = false;
        });

        return emptySelection;
    }


    $("#trashMultiple").click(function(){

        if(checkEmptySelection()){
            alert("Empty Selection! Please select some record(s) first")
        }else{

            $("#selectionForm").submit();

        }




    }) ;



</script>

<!-- required for search, block 5 of 5 start -->
<script>

    $(function() {
        var availableTags = [

            <?php
            echo $comma_separated_keywords;
            ?>
        ];
        // Filter function to search only from the beginning of the string
        $( "#searchID" ).autocomplete({
            source: function(request, response) {

                var results = $.ui.autocomplete.filter(availableTags, request.term);

                results = $.map(availableTags, function (tag) {
                    if (tag.toUpperCase().indexOf(request.term.toUpperCase()) === 0) {
                        return tag;
                    }
                });

                response(results.slice(0, 15));

            }
        });


        $( "#searchID" ).autocomplete({
            select: function(event, ui) {
                $("#searchID").val(ui.item.label);
                $("#searchForm").submit();
            }
        });


    });

</script>
<!-- required for search, block 5 of 5 end -->



</body>
</html>

