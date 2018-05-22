<?php
require_once("../../vendor/autoload.php");

if (!isset($_SESSION)) session_start();
if(!isset($_POST['fromDate'])) {
    \App\Utility\Utility::redirect("add_total_report.php");
}


$fromDate = $_POST['fromDate'];
//var_dump($_POST);
//\App\Utility\Utility::dd($fromDate);
$toDate = $_POST['toDate'];


$objTotalReport = new App\TotalReport\TotalReport();
$allData  = $objTotalReport->get_expense_details($fromDate,$toDate);

$objTotalReport= new App\TotalReport\TotalReport();
$allData1 = $objTotalReport->get_income_info($fromDate,$toDate);

$total_income = 0;

foreach($allData1 as $values){
    $total_income += $values->total;
}

$total_expense = 0;
foreach($allData as $values){
    $total_expense += $values->amount;
}



?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Total Report
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover">
                    <tbody>
                    <tr>
                        <td>Total Income</td>
                        <td><?php echo $total_income; ?></td>
                    </tr>
                    <tr>
                        <td>Total Expense</td>
                        <td><?php echo $total_expense; ?></td>
                    </tr>
                    <tr>
                        <?php
                        if ($total_income > $total_expense) {
                            ?>
                            <td colspan="1"><b>Profit</b></td>
                            <td><b><?php echo $total_income - $total_expense; ?></b></td>
                        <?php } else { ?>
                            <td colspan="1"><b>Loss</b></td>
                            <td><b><?php echo $total_expense - $total_income; ?></b></td>
                        <?php } ?>
                    </tr>
                    </tbody>
                </table>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
