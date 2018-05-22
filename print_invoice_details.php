<?php
require_once("vendor/autoload.php");

//if (!isset($_SESSION)) session_start();



    $objPrintInvoiceDetails = new App\PrintInvoiceDetails\PrintInvoiceDetails();
    $allData = $objPrintInvoiceDetails->get_information_by_invoice_no($invoice_no);

    $objPrintInvoiceDetails = new App\PrintInvoiceDetails\PrintInvoiceDetails();
    $allData1 = $objPrintInvoiceDetails->clear_payment_info($invoice_no);

    $objPrintInvoiceDetails = new App\PrintInvoiceDetails\PrintInvoiceDetails();
    $allData2 = $objPrintInvoiceDetails->company_info();


?>

<div id="invoiceReport">
    <table>
        <tr>

            <td width="70%" style="padding-top: 8%"><h4 style="font-weight: bold">INVOICE #
                    <?php echo $allData->invoice_no ?></h4></td>


            <td>
                <table>
                    <tr>

                        <td>
                            <img src="<?php echo $allData2->logoImage ?>" width="100px" height="150px">
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <?php echo $allData2->name ?>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <?php echo $allData2->address ?>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <?php echo $allData2->mobile_no ?>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>


    <hr style="border-top: 1px solid #8c8b8b">

    <table class="table" style="border: hidden">

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
                        <td>Name: <?php echo $allData->age ?></td>
                    </tr>


                    <tr>
                        <td>Name: <?php echo $allData->sex ?></td>
                    </tr>


                    <tr>
                        <td>Name: <?php echo $allData->mobile_no ?></td>
                    </tr>


                    <tr>
                        <td>Name: <?php echo $allData->doctor_name ?></td>
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
                        <td>Delivery Date</td>
                        <td><?php echo $allData->delivery_date ?></td>
                    </tr>


                    <tr>
                        <td>Delivery Date</td>
                        <td><?php echo $allData->time ?></td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

    <hr style="border-top: 1px solid #8c8b8b">

    <table class="table table-bordered">

        <tr>
            <th width="60%">Test Name</th>
            <th>Lab ID</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
        </tr>

        <?php
        $objPrintInvoiceDetails = new App\PrintInvoiceDetails\PrintInvoiceDetails();
        $allData3 = $objPrintInvoiceDetails->get_payment_info($invoice_no);

        $sum = 0;

        foreach ($allData3 as $values) {
            ?>
            <tr>

                <td width="60%"><?php echo $values['sub_test_id']; ?></td>
                <td><?php echo $values['lab_id']; ?></td>
                <td><?php echo $values['quantity']; ?></td>
                <td><?php echo $values['test_price']; ?></td>
                <td><?php echo $values['total'];
                    $sum += $values['total']; ?></td>

            </tr>
        <?php } ?>

        <tr>
            <td></td>
            <td colspan="3" align="center">Paid</td>
            <td><?php echo $allData1->paid ?></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="3" align="center">Due</td>
            <td><?php echo $allData1->due ?></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="3" align="center">Invoice Total</td>
            <td><?php echo $allData2->currency . ' ' . $sum; ?></td>
        </tr>
    </table>
</div>

<div style="text-align: center">
    <button onclick="printContent('invoiceReport');"><span class="glyphicon glyphicon-print"></span>Print</button>
</div>



