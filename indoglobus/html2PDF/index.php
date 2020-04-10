<?php
/**
 * HTML2PDF Library - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @package   Html2pdf
 * @author    Laurent MINGUET <webmaster@html2pdf.fr>
 * @copyright 2016 Laurent MINGUET
 */


$url = dirname($_SERVER['REQUEST_URI']);
if (substr($url, 0, 7) !== 'http://') {
    $url = 'http://' . $_SERVER['HTTP_HOST'] . $url;
}


ob_start();

?>

    <style>

        .club_billing_page {
            padding: 10px;
        }

        .club_billing_page div.row {
            clear: both;
            width: 90%;
            padding: 0 0 0 20px;

        }

        .club_billing_page div.row p {
            float: left;

        }

        .left {
            float: left;
        }

        .right {
            float: right;
        }

        .amount {
            text-align: right;
        }

        .head-text {
            font-size: 20px;
            font-weight: bold;
        }

        .sub-head-text {
            font-size: 15px;
            font-weight: bold;
        }

        .subtotal {
            display: inline-block;
            width: 120px;

        }

        .summary {
            /* width: 400px;*/
        }

        #club_billing_make_payment_invoice table.appendix tr td {
            vertical-align: top;
        }

        #club_billing_make_payment_invoice table.appendix tr td table.dataTable {
            margin-top: 0px !important;
        }

        table {
             width: 100%;
        }

        table.dataTable thead th, table.dataTable tbody td, table.dataTable tfoot td {
            border: 1px solid #ccc;
            padding: 10px;
        }

        table.dataTable thead th {
            background-color: #ccc;
        }

        .toalRow {
            background-color: #E1E1E1;
        }

    </style>
    <!-- write html content here -->

    <page>
        <table style="width: 100%;">
            <tr>
                <td style="width: 65%">

                    <div class="head-text">Lorem Ipsum Golf Association</div>
                    <br/><br/>
                    <div>
                        444 East Central Ave <br/>
                        City, State 55565
                    </div>
                    <br/><br/>

                    <label class="sub-head-text">Bill Summary as of March 30, 2016</label>

                    <table class="dataTable no-footer summary" role="grid">

                        <tbody>
                        <tr role="row" class="odd">
                            <td>Previous Balance:</td>
                            <td class="amount">$310.00</td>
                        </tr>
                        <tr role="row" class="odd">
                            <td>Total Payment Received:</td>
                            <td class="amount">-$285.00</td>
                        </tr>
                        <tr role="row" class="odd">
                            <td>Total Payments to Club:</td>
                            <td class="amount">$0.00</td>
                        </tr>
                        <tr role="row" class="odd">
                            <td>Prorated Refunds:</td>
                            <td class="amount">$25.00</td>
                        </tr>
                        <tr role="row" class="odd">
                            <td>New Charges:</td>
                            <td class="amount">$170.00</td>
                        </tr>
                        </tbody>
                        <thead>
                        <tr class="thead" role="row">
                            <th>Balance Due</th>
                            <th class="amount">$170.00</th>
                        </tr>
                        </thead>
                    </table>

                </td>
                <td style="width: 35%">

                   
                    <img src="logo.jpg" />
                    <br/><br/>
                    <div>
                        <label class="sub-head-text">19th Hole Golf Club</label><br/>
                        <label class="sub-head-text">Mens 18</label><br/><br/>
                        <label class="sub-head-text">73-995-1</label><br/>
                        <label>Bill End Date: March 31, 2016</label><br/>
                        <label>Bill Number: 2384</label><br/>
                    </div>

                </td>
            </tr>
        </table>
    </page>
    <page>
        <table class="dataTable no-footer" role="grid" style="width: 100%;">


            <tbody>
            <tr role="row" class="odd">
                <td style="width: 20%;">03/05/16</td>
                <td style="width: 20%;">34920</td>
                <td style="width: 40%;">Anderson, Tom</td>
                <td style="width: 20%;" class="amount">$35.00</td>

            </tr>

            <tr role="row" class="even">
                <td>03/05/16</td>
                <td>34921</td>
                <td>Bui, Tony</td>
                <td class="amount">$35.00</td>

            </tr>

            <tr role="row" class="odd">
                <td>03/05/16</td>
                <td>34923</td>
                <td>Dobbs, Sean</td>
                <td class="amount">$0.00</td>
            </tr>

            <tr role="row" class="even">
                <td>03/05/16</td>
                <td>34925</td>
                <td>Gibbs, Rick</td>
                <td class="amount">$35.00</td>
            </tr>

            <tr role="row" class="odd">
                <td>03/05/16</td>
                <td>34926</td>
                <td>Goodman, Drew</td>
                <td class="amount">$35.00</td>
            </tr>

            <tr role="row" class="odd">
                <td>03/05/16</td>
                <td>34927</td>
                <td>Martinez, Ignacio</td>
                <td class="amount">$0.00</td>
            </tr>

            <tr role="row" class="amount">
                <td colspan="4">-$155.00</td>
            </tr>

            <tr role="row">
                <td colspan="4" class="amount">
                    Online Transactions
                </td>
            </tr>

            <tr role="row" class="odd">
                <td colspan="3">Credits from online transactions 03/01/16 - 03/30/16 <br/>(see Appendix A for details)
                </td>
                <td class="amount">-$150.00</td>
            </tr>

            <tr role="row">
                <td colspan="4" class="amount">
                    Misc. Credits from Association
                </td>
            </tr>

            <tr role="row" class="odd">
                <td>03/14/16</td>
                <td colspan="2">Adjustment for honorary membership</td>
                <td class="amount">-$5.00</td>
            </tr>


            <tr role="row">
                <td colspan="4" class="amount">
                    Misc. Fees from Association
                </td>
            </tr>

            <tr role="row" class="odd">
                <td>03/01/16</td>
                <td colspan="2">Fee for purchase of scorecards</td>
                <td class="amount">$10.00</td>
            </tr>

            <tr>
                <td colspan="2" class="toalRow">
                    There will be a 1.5% interest charge per month on late invoices.
                </td>

                <td colspan="2" class="toalRow amount">
                    Subtotal: <label class="subtotal"> $170.00 </label>
                    <hr/>
                    Total: <label class="subtotal">$170.00</label>

                </td>
            </tr>

            </tbody>
            <thead>
            <tr class="thead" role="row">

                <th class="manage-column sorting_disabled" scope="col" rowspan="1" colspan="1">
                    Date
                </th>
                <th class="manage-column sorting_disabled" scope="col" rowspan="1" colspan="1">
                    GHIN #
                </th>
                <th class="manage-column sorting_disabled" scope="col" rowspan="1" colspan="1">
                    Member
                </th>
                <th class="manage-column sorting_disabled" scope="col" rowspan="1" colspan="1">
                    Association Membership Fees
                </th>

            </tr>
            </thead>

        </table>
    </page>
    <page>
        <div class="head-text">Club Credits (Appendix A)</div><br/><br/>
        <table class="dataTable no-footer appendix" role="grid" style="width: 100%;">
            <thead>
            <tr class="thead" role="row">


                <th class="manage-column sorting_disabled" scope="col" rowspan="1" colspan="1" style="width: 10%;">Date
                </th>
                <th class="manage-column sorting_disabled" scope="col" rowspan="1" colspan="1" style="width: 14%;">
                    Golfer Name
                </th>
                <th class="manage-column sorting_disabled" scope="col" rowspan="1" colspan="1" style="width: 10%;">
                    GHIN #
                </th>
                <th class="manage-column sorting_disabled" scope="col" rowspan="1" colspan="1" style="width: 22%;">
                    Total Payment
                </th>
                <th class="manage-column sorting_disabled" scope="col" rowspan="1" colspan="1" style="width: 22%;">
                    Assn Fees
                </th>
                <th class="manage-column sorting_disabled" scope="col" rowspan="1" colspan="1" style="width: 22%;">
                    Club Credits
                </th>
            </tr>
            </thead>
            <tbody>
            <tr role="row" class="odd">
                <td>03/02/16</td>
                <td>John Smith</td>
                <td>095834</td>
                <td>
                    <table class="dataTable no-footer" role="grid">
                        <tbody>
                        <tr role="row" class="odd">
                            <td>Transaction Total:</td>
                            <td class="amount">$150.00</td>
                        </tr>
                        <tr role="row" class="odd">
                            <td>Merchant Fees:</td>
                            <td class="amount">-$3.75</td>
                        </tr>
                        <tr class="thead" role="row">
                            <td colspan="2" class="amount">$146.25</td>
                        </tr>
                        </tbody>

                    </table>
                </td>

                <td>
                    <table class="dataTable no-footer" role="grid">
                        <tbody>
                        <tr role="row" class="odd">
                            <td>Membership Dues:</td>
                            <td class="amount">$35.00</td>
                        </tr>
                        <tr role="row" class="odd">
                            <td>Early Bird Discount:</td>
                            <td class="amount">-$5.00</td>
                        </tr>
                        <tr role="row" class="odd">
                            <td>Assn Donation:</td>
                            <td class="amount">$70.00</td>
                        </tr>
                        <tr role="row" class="odd">
                            <td>Merchant Fees:</td>
                            <td class="amount">-$3.75</td>
                        </tr>
                        <tr class="thead" role="row">
                            <td colspan="2" class="amount">$96.25</td>
                        </tr>
                        </tbody>

                    </table>
                </td>
                <td>
                    <table class="dataTable no-footer" role="grid">
                        <tbody>
                        <tr role="row" class="odd">
                            <td>Club Dues:</td>
                            <td class="amount">$35.00</td>
                        </tr>
                        <tr role="row" class="odd">
                            <td>Early Bird Discount:</td>
                            <td class="amount">-$5.00</td>
                        </tr>
                        <tr role="row" class="odd">
                            <td>2 Free Rounds:</td>
                            <td class="amount">$20.00</td>
                        </tr>
                        <tr role="row" class="odd">
                            <td>Merchant Fees:</td>
                            <td class="amount">-$0.00</td>
                        </tr>
                        <tr class="thead" role="row">
                            <td colspan="2" class="amount">$50.00</td>
                        </tr>
                        </tbody>

                    </table>
                </td>

            </tr>

            <tr role="row" class="even">
                <td>03/14/16</td>
                <td>John Anderson</td>
                <td>678932</td>
                <td>
                    <table class="dataTable no-footer" role="grid">
                        <tbody>
                        <tr role="row" class="odd">
                            <td>Transaction Total:</td>
                            <td class="amount">$150.00</td>
                        </tr>
                        <tr role="row" class="odd">
                            <td>Merchant Fees:</td>
                            <td class="amount">-$3.75</td>
                        </tr>
                        <tr class="thead" role="row">
                            <td colspan="2" class="amount">$146.25</td>
                        </tr>
                        </tbody>

                    </table>
                </td>

                <td>
                    <table class="dataTable no-footer" role="grid">
                        <tbody>
                        <tr role="row" class="odd">
                            <td>Membership Dues:</td>
                            <td class="amount">$35.00</td>
                        </tr>
                        <tr role="row" class="odd">
                            <td>Early Bird Discount:</td>
                            <td class="amount">-$5.00</td>
                        </tr>
                        <tr role="row" class="odd">
                            <td>Assn Donation:</td>
                            <td class="amount">$70.00</td>
                        </tr>
                        <tr role="row" class="odd">
                            <td>Merchant Fees:</td>
                            <td class="amount">-$3.75</td>
                        </tr>
                        <tr class="thead" role="row">
                            <td colspan="2" class="amount">$96.25</td>
                        </tr>
                        </tbody>

                    </table>
                </td>
                <td>
                    <table class="dataTable no-footer" role="grid">
                        <tbody>
                        <tr role="row" class="odd">
                            <td>Club Dues:</td>
                            <td class="amount">$35.00</td>
                        </tr>
                        <tr role="row" class="odd">
                            <td>Early Bird Discount:</td>
                            <td class="amount">-$5.00</td>
                        </tr>
                        <tr role="row" class="odd">
                            <td>2 Free Rounds:</td>
                            <td class="amount">$20.00</td>
                        </tr>
                        <tr role="row" class="odd">
                            <td>Merchant Fees:</td>
                            <td class="amount">-$0.00</td>
                        </tr>
                        <tr class="thead" role="row">
                            <td colspan="2" class="amount">$50.00</td>
                        </tr>
                        </tbody>

                    </table>
                </td>

            </tr>

            <tr role="row" class="odd">
                <td>03/22/16</td>
                <td>Drew McDugal</td>
                <td>278392</td>
                <td>
                    <table class="dataTable no-footer" role="grid">
                        <tbody>
                        <tr role="row" class="odd">
                            <td>Transaction Total:</td>
                            <td class="amount">$150.00</td>
                        </tr>
                        <tr role="row" class="odd">
                            <td>Merchant Fees:</td>
                            <td class="amount">-$3.75</td>
                        </tr>
                        <tr class="thead" role="row">
                            <td colspan="2" class="amount">$146.25</td>
                        </tr>
                        </tbody>

                    </table>
                </td>

                <td>
                    <table class="dataTable no-footer" role="grid">
                        <tbody>
                        <tr role="row" class="odd">
                            <td>Membership Dues:</td>
                            <td class="amount">$35.00</td>
                        </tr>
                        <tr role="row" class="odd">
                            <td>Early Bird Discount:</td>
                            <td class="amount">-$5.00</td>
                        </tr>
                        <tr role="row" class="odd">
                            <td>Assn Donation:</td>
                            <td class="amount">$70.00</td>
                        </tr>
                        <tr role="row" class="odd">
                            <td>Merchant Fees:</td>
                            <td class="amount">-$3.75</td>
                        </tr>
                        <tr class="thead" role="row">
                            <td colspan="2" class="amount">$96.25</td>
                        </tr>
                        </tbody>

                    </table>
                </td>
                <td>
                    <table class="dataTable no-footer" role="grid">
                        <tbody>
                        <tr role="row" class="odd">
                            <td>Club Dues:</td>
                            <td class="amount">$35.00</td>
                        </tr>
                        <tr role="row" class="odd">
                            <td>Early Bird Discount:</td>
                            <td class="amount">-$5.00</td>
                        </tr>
                        <tr role="row" class="odd">
                            <td>2 Free Rounds:</td>
                            <td class="amount">$20.00</td>
                        </tr>
                        <tr role="row" class="odd">
                            <td>Merchant Fees:</td>
                            <td class="amount">-$0.00</td>
                        </tr>
                        <tr class="thead" role="row">
                            <td colspan="2" class="amount">$50.00</td>
                        </tr>
                        </tbody>

                    </table>
                </td>

            </tr>

            <tr role="row" class="odd">
                <td>03/22/16</td>
                <td>Drew McDugal</td>
                <td>278392</td>
                <td>
                    <table class="dataTable no-footer" role="grid">
                        <tbody>
                        <tr role="row" class="odd">
                            <td>Transaction Total:</td>
                            <td class="amount">$150.00</td>
                        </tr>
                        <tr role="row" class="odd">
                            <td>Merchant Fees:</td>
                            <td class="amount">-$3.75</td>
                        </tr>
                        <tr class="thead" role="row">
                            <td colspan="2" class="amount">$146.25</td>
                        </tr>
                        </tbody>

                    </table>
                </td>

                <td>
                    <table class="dataTable no-footer" role="grid">
                        <tbody>
                        <tr role="row" class="odd">
                            <td>Membership Dues:</td>
                            <td class="amount">$35.00</td>
                        </tr>
                        <tr role="row" class="odd">
                            <td>Early Bird Discount:</td>
                            <td class="amount">-$5.00</td>
                        </tr>
                        <tr role="row" class="odd">
                            <td>Assn Donation:</td>
                            <td class="amount">$70.00</td>
                        </tr>
                        <tr role="row" class="odd">
                            <td>Merchant Fees:</td>
                            <td class="amount">-$3.75</td>
                        </tr>
                        <tr class="thead" role="row">
                            <td colspan="2" class="amount">$96.25</td>
                        </tr>
                        </tbody>

                    </table>
                </td>
                <td>
                    <table class="dataTable no-footer" role="grid">
                        <tbody>
                        <tr role="row" class="odd">
                            <td>Club Dues:</td>
                            <td class="amount">$35.00</td>
                        </tr>
                        <tr role="row" class="odd">
                            <td>Early Bird Discount:</td>
                            <td class="amount">-$5.00</td>
                        </tr>
                        <tr role="row" class="odd">
                            <td>2 Free Rounds:</td>
                            <td class="amount">$20.00</td>
                        </tr>
                        <tr role="row" class="odd">
                            <td>Merchant Fees:</td>
                            <td class="amount">-$0.00</td>
                        </tr>
                        <tr class="thead" role="row">
                            <td colspan="2" class="amount">$50.00</td>
                        </tr>
                        </tbody>

                    </table>
                </td>

            </tr>
            <tr>
                <td colspan="6" class="toalRow amount">
                    Subtotal: <label class="subtotal">$150.00</label>
                    <hr/>
                    Total: <label class="subtotal">$150.00</label>

                </td>
            </tr>
            </tbody>
        </table>
    </page>
    <page >
        <div class="head-text">Club Prepayments (Appendix B)</div><br/><br/>
        <table class="dataTable no-footer appendix fullwidth" role="grid">
            <thead>
            <tr class="thead" role="row">

                <th class="manage-column sorting_disabled" scope="col" rowspan="1" colspan="1" style="width: 10%;">
                    Date
                </th>
                <th class="manage-column sorting_disabled" scope="col" rowspan="1" colspan="1" style="width: 14%;">
                    Golfer Name
                </th>
                <th class="manage-column sorting_disabled" scope="col" rowspan="1" colspan="1" style="width: 10%;">
                    GHIN #
                </th>
                <th class="manage-column sorting_disabled" scope="col" rowspan="1" colspan="1" style="width: 22%;">
                    Total Payment
                </th>
                <th class="manage-column sorting_disabled" scope="col" rowspan="1" colspan="1" style="width: 22%;">
                    Assn Fees
                </th>
                <th class="manage-column sorting_disabled" scope="col" rowspan="1" colspan="1" style="width: 22%;">
                    Club Credits
                </th>

            </tr>
            </thead>
            <tbody>
            <tr role="row" class="odd">
                <td>03/02/16</td>
                <td>John Smith</td>
                <td>095834</td>
                <td>
                    <table class="dataTable no-footer" role="grid">
                        <tbody>
                        <tr role="row" class="odd">
                            <td>Transaction Total:</td>
                            <td class="amount">$30.25</td>
                        </tr>
                        <tr class="thead" role="row">
                            <td colspan="2" class="amount">$30.25</td>
                        </tr>
                        </tbody>

                    </table>
                </td>

                <td>
                    <table class="dataTable no-footer" role="grid">
                        <tbody>
                        <tr role="row" class="odd">
                            <td>Membership Dues:</td>
                            <td class="amount">$35.00</td>
                        </tr>
                        <tr role="row" class="odd">
                            <td>Early Bird Discount:</td>
                            <td class="amount">-$5.00</td>
                        </tr>
                        <tr class="thead" role="row">
                            <td colspan="2" class="amount">$25.00</td>
                        </tr>
                        </tbody>

                    </table>
                </td>
                <td>
                    <table class="dataTable no-footer" role="grid">
                        <tbody>
                        <tr role="row" class="odd">
                            <td>Club Dues:</td>
                            <td class="amount">$0.00</td>
                        </tr>
                        <tr class="thead" role="row">
                            <td colspan="2" class="amount">$0.00</td>
                        </tr>
                        </tbody>

                    </table>
                </td>

            </tr>
            <tr>
                <td colspan="6" class="toalRow amount">
                    Subtotal: <label class="subtotal">$0.00</label>
                    <hr/>
                    Total: <label class="subtotal">$0.00</label>

                </td>
            </tr>
            </tbody>
        </table>
    </page>

<?php
$content = ob_get_clean();
//echo $content = ob_get_clean(); exit;
require_once(dirname(__FILE__) . '/html2pdf-4.5.1/vendor/autoload.php');
try {
    $html2pdf = new HTML2PDF('L', 'A4', 'en');
    $html2pdf->writeHTML($content);
    $html2pdf->Output('meral.pdf');
    exit;
} catch (HTML2PDF_exception $e) {
    echo $e;
    exit;
}

?>