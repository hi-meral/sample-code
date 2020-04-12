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


    $generate = isset($_GET['make_pdf']);
    $nom = isset($_GET['nom']) ? $_GET['nom'] : 'inconnu';
    $url = dirname($_SERVER['REQUEST_URI']);
    if (substr($url, 0, 7)!=='http://') {
        $url = 'http://'.$_SERVER['HTTP_HOST'].$url;
    }

    $nom = substr(preg_replace('/[^a-zA-Z0-9]/isU', '', $nom), 0, 26);

    ob_start();

?>
<!-- write html content here -->
    <style type="text/Css">

        .table-fill
        {
            border: solid 1px #000;
            background: #FFF;

            width: 600px;
        }

        .table-fill td{
            border:1px solid #000;
        }
    </style>
    <table class="table-fill" style="color:#036881">
        <thead>
        <tr>
            <th class="text-left">Month</th>
            <th class="text-left">Sales</th>
        </tr>
        </thead>
        <tbody class="table-hover">
        <tr>
            <td class="text-left">January</td>
            <td class="text-left">$ 50,000.00</td>
        </tr>
        <tr>
            <td class="text-left">February</td>
            <td class="text-left">$ 10,000.00</td>
        </tr>
        <tr>
            <td class="text-left">March</td>
            <td class="text-left">$ 85,000.00</td>
        </tr>
        <tr>
            <td class="text-left">April</td>
            <td class="text-left">$ 56,000.00</td>
        </tr>
        <tr>
            <td class="text-left">May</td>
            <td class="text-left">$ 98,000.00</td>
        </tr>
        </tbody>
    </table>


<?php

        $content = ob_get_clean();
        require_once(dirname(__FILE__).'/../vendor/autoload.php');
        try
        {
            $html2pdf = new HTML2PDF('P', 'A4', 'en');
            $html2pdf->writeHTML($content);
            $html2pdf->Output('meral.pdf',false);
            exit;
        }
        catch(HTML2PDF_exception $e) {
            echo $e;
            exit;
        }

?>