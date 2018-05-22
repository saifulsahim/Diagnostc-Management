<?php
require_once("../../vendor/autoload.php");

if (!isset($_SESSION)) session_start();
if(!isset($_POST['fromDate'])) {
    \App\Utility\Utility::redirect("add_income_report.php");
}

$fromDate = $_POST['fromDate'];
$toDate = $_POST['toDate'];


$objIncomeReport= new App\IncomeReport\IncomeReport();
$allData= $objIncomeReport->index($fromDate,$toDate)

?>


<div class="row">
    <div class="col-lg-12">

            <div class="panel-heading">
                Income Report
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Invoice No</th>
                        <th>Date</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody style="text-align: center">

                     <?php
                     $total = 0;
                  foreach($allData as $values)

                  {?>
                        <tr class="odd gradeX">
                            <td><?php echo $values->invoice_no ?></td>
                            <td><?php echo $values->date ?></td>
                            <td><?php echo $values->total ?></td>
                        </tr>
                        <?php $total += $values->total;
                    } ?>
                    <tr style="padding-top: 10px">
                        <td colspan="2"><b>Total Income:</b></td>

                        <td><b><?php echo $total; ?></b></td>
                    </tr>
                    </tbody>
                </table>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
