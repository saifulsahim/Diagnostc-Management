<?php
require_once("../../vendor/autoload.php");

//if (!isset($_SESSION)) session_start();

$invoice_no = $_GET['invoice_no'];
//$invoice_no = $_GET['invoice_no'];

$objPrintInvoiceDetails = new App\PrintInvoiceDetails\PrintInvoiceDetails();
$allData = $objPrintInvoiceDetails->get_information_by_invoice_no($invoice_no);
//var_dump($allData);
//echo "<br><br>";

$objPrintInvoiceDetails = new App\PrintInvoiceDetails\PrintInvoiceDetails();
$allData1 = $objPrintInvoiceDetails->clear_payment_info($invoice_no);
//var_dump($allData1);
//echo "<br><br>";

$objPrintInvoiceDetails = new App\PrintInvoiceDetails\PrintInvoiceDetails();
$allData2 = $objPrintInvoiceDetails->company_info();
//var_dump($allData2);
//echo "<br>";


?>

<div id="invoiceReport">
    <table class="table" style="border: hidden" width="100%">
        <tr>

            <td width="70%" style="padding-top: 8%"><h4 style="font-weight: bold">INVOICE #
                    <?php echo $allData->invoice_no; ?></h4></td>


            <td>
                <table>
                    <tr>

                        <td>
                            <img src="/Diagonstic/views/Settings/Images/1523271138synchronise-it-logo.png" width="100px"
                                 height="30px">
                        </td>
                    </tr>

                    <?php
                    foreach ($allData2 as $value) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $value->name ?>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <?php echo $value->address ?>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <?php echo $value->mobile_no ?>
                            </td>
                        </tr>

                    <?php }
                    ?>
                </table>
            </td>
        </tr>
    </table>


    <hr style="border-top: 1px solid #8c8b8b">

    <table class="table" width="100%"  style="border: hidden">

        <tr>
            <td>
                <table>

                    <tr>
                        <td><h5 style="font-weight: bold">Invoices To</h5></td>
                    </tr>

                    <tr>
                        <td>Name: <?php echo $allData->patient_name ?></td>
                    </tr>

                    <tr>
                        <td>Age: <?php echo $allData->age ?></td>
                    </tr>


                    <tr>
                        <td>Sex: <?php echo $allData->sex ?></td>
                    </tr>


                    <tr>
                        <td>Mobile: <?php echo $allData->mobile_no ?></td>
                    </tr>


                    <tr>
                        <td>Ref By: <?php echo $allData->doctor_name ?></td>
                    </tr>
                </table>
            </td>

            <td>
                <table class="table table-bordered tab-content tab-pane">

                    <tr>
                        <td>INVOICE #</td>
                        <td><?php echo $allData->invoice_no ?></td>
                    </tr>


                    <tr>
                        <td>Delivery Date:</td>
                        <td><?php echo $allData->delivery_date ?></td>
                    </tr>


                    <tr>
                        <td>Time</td>
                        <td><?php echo $allData->time ?></td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

    <hr>

    <table style="width: 100%; text-align: center" class="table table-bordered">
        <tr>
            <th>Test Name</th>
            <th>Lab ID</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
        </tr>

        <?php
        $objPrintInvoiceDetails = new App\PrintInvoiceDetails\PrintInvoiceDetails();
        $allData3 = $objPrintInvoiceDetails->get_payment_info($invoice_no);

        //echo "<br><br>";
        //var_dump($allData3);

        $sum = 0;

        foreach ($allData3 as $values) {
            ?>
            <tr>

                <td><?php echo $values->test_name ?></td>
                <td><?php echo $values->lab_id ?></td>
                <td><?php echo $values->quantity; ?></td>
                <td><?php echo $values->test_price; ?></td>
                <td><?php echo $values->total;
                    $sum += $values->total; ?></td>

            </tr>
        <?php } ?>

        <tr>
            <td></td>
            <td colspan="3" style=" padding-left: 68px; padding-top: 20px" align="center" class="margin-30">Paid
            <td><?php echo $allData1->paid ?></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="3"  style=" padding-left: 68px; padding-top: 10px" align="center" class="margin-30">Due
            <td><?php echo $allData1->due ?></td>
        </tr>
        <tr>
            <?php
            foreach ($allData2 as $val) {
                ?>


                <td></td>
                <td colspan="3" align="center"  style=" padding-left: 68px; padding-top: 10px" class="margin-30">Invoice Total
                <td><?php echo $val->currency . ' ' . $sum; ?></td>

            <?php } ?>
        </tr>
    </table>
</div>

<div style="text-align: center">
    <button onclick="printContent('invoiceReport');"><span class="glyphicon glyphicon-print"></span>Print</button>
</div>


<script>

    function printContent(el) {
        var restorePage = document.body.innerHTML;
        var printContent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printContent;
        window.print();
        document.body.innerHTML = restorePage;
    }


</script>

