<?php
require_once("../../vendor/autoload.php");

if (!isset($_SESSION)) session_start();
if(!isset($_POST['fromDate'])) {
    \App\Utility\Utility::redirect("add_income_report.php");
}

$fromDate = $_POST['fromDate'];
$toDate = $_POST['toDate'];


$objExpenseReport  = new App\ExpenseReport\ExpenseReport();
$allData= $objExpenseReport->index($fromDate,$toDate);

?>


<div class="row">
    <div class="col-lg-12">

        <h2>Expense Report</h2>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Invoice No</th>
                <th>Date</th>
                <th>Amount</th>
            </tr>
            </thead>
            <tbody>

            <?php
            $total = 0;
            foreach($allData as $values)

            {?>
                <tr class="odd gradeX">
                    <td><?php echo $values->invoice_no ?></td>
                    <td><?php echo $values->date ?></td>
                    <td><?php echo $values->amount ?></td>
                </tr>
                <?php $total += $values->amount;
            } ?>
            <tr>
                <td colspan="2"><b>Total Expense</b></td>
                <td><b><?php echo $total; ?></b></td>
            </tr>
            </tbody>



        </table>


    </div>



</div>
