<?php include 'header.php' ?>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php include 'conn.php' ?>
<div class="container">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">
        <div class="col-md-12">
            <div class="invoice">
                <!-- begin invoice-company -->
                <div class="invoice-company text-inverse f-w-600">
                    <span class="pull-right hidden-print">
                        <a href="javascript:;" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-file t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a>
                        <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
                    </span>
                    Company Name
                </div>
                <!-- end invoice-company -->
                <!-- begin invoice-header -->

                <?php
                session_start();
                if($_SERVER['REQUEST_METHOD']=='POST'){
                    $cname = $_POST['cname'];
                    $contact = $_POST['contact'];
                    $address = $_POST['address'];
                    $email = $_POST['email'];
                    $date = $_POST['date'];
                }
                $o_id = $_SESSION['o_id'];
                $sql = "SELECT * FROM orders where id = '$o_id'";
                $res = $conn->query($sql);
                foreach($res as $val){
                    $pay_method = $val['payment_method'];
                }
                $sql = "SELECT * FROM ORDER_LIST WHERE ORDER_ID = '$o_id'";
                $res = $conn->query($sql);
                foreach($res as $val){
                    $p_id = $val['product_id'];
                    $qtty = $val['quantity'];
                    $amt = $val['total'];
                }
                $sql = "SELECT * FROM products WHERE id = '$p_id'";
                $res = $conn->query($sql);
                foreach($res as $val){
                    $pname = $val['name'];
                    $specs = $val['specs'];
                    $imei = $val['imei_no'];
                }
                ?>

                <div class="invoice-header">
                    <div class="invoice-from">
                        <small>from</small>
                        <address class="m-t-5 m-b-5">
                            <strong class="text-inverse">Company name</strong><br>
                            Street Address<br>
                            City, Zip Code<br>
                            Phone: *************<br>
                            Fax: *************
                        </address>
                    </div>
                    <div class="invoice-to">
                        <small>to</small>
                        <address class="m-t-5 m-b-5">
                            <strong class="text-inverse"><?php echo $cname ?></strong><br>
                            Address : <?php echo $address ?><br>
                            City, Zip Code<br>
                            Phone: <?php echo $contact ?><br>
                            Email: <?php echo $email ?>
                        </address>
                    </div>
                    <div class="invoice-date">
                        <div class="date text-inverse m-t-5"><?php echo $date ?></div>
                        <div class="invoice-detail">
                            #0000123DSS<br>
                            Services Product
                        </div>
                    </div>
                </div>
                <!-- end invoice-header -->
                <!-- begin invoice-content -->
                <div class="invoice-content">
                    <!-- begin table-responsive -->
                    <div class="table-responsive">
                        <table class="table table-invoice">
                            <thead>
                                <tr>
                                    <th>PRODUCT DESCRIPTION</th>
                                    <th>QUANTITY</th>
                                    <th class="text-center" width="10%">PRICE</th>
                                    <th class="text-center" width="10%">TAX</th>
                                    <th class="text-right" width="20%">LINE TOTAL</th>
                                    <th class="text-right" width="20%">PAYMENT METHOD</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <span class="text-inverse"><?php echo $pname ?></span><br>
                                        <small><?php echo $specs ?>IMEI : <?php echo $imei ?></small>
                                    </td>
                                    <td class="text-center"><?php echo $qtty ?></td>
                                    <td class="text-center"><?php echo $amt ?></td>
                                    <td class="text-center">50</td>
                                    <td class="text-right"><?php echo $amt ?></td>
                                    <td class="text-right"><?php echo $pay_method ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- end table-responsive -->
                    <!-- begin invoice-price -->
                    <div class="invoice-price">
                        <div class="invoice-price-left">
                            <div class="invoice-price-row">
                                <div class="sub-price">
                                    <!-- <small>SUBTOTAL</small> -->
                                    <!-- <span class="text-inverse">$4,500.00</span> -->
                                </div>
                                <div class="sub-price">
                                    <!-- <i class="fa fa-plus text-muted"></i> -->
                                </div>
                                <div class="sub-price">
                                    <!-- <small>PAYPAL FEE (5.4%)</small> -->
                                    <!-- <span class="text-inverse">$108.00</span> -->
                                </div>
                            </div>
                        </div>
                        <div class="invoice-price-right">
                            <small>TOTAL</small> <span class="f-w-600">$<?php echo $amt ?></span>
                        </div>
                    </div>
                    <!-- end invoice-price -->
                </div>
                <!-- end invoice-content -->
                <!-- begin invoice-note -->
                <div class="invoice-note">
                    * Make all cheques payable to [Your Company Name]<br>
                    * Payment is due within 30 days<br>
                    * If you have any questions concerning this invoice, contact [Name, Phone Number, Email]
                </div>
                <!-- end invoice-note -->
                <!-- begin invoice-footer -->
                <div class="invoice-footer">
                    <p class="text-center m-b-5 f-w-600">
                        THANK YOU FOR YOUR PURCHASE
                    </p>
                    <p class="text-center">
                        <span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> matiasgallipoli.com</span>
                        <span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone-volume"></i> T:016-18192302</span>
                        <span class="m-r-10"><i class="fa fa-fw fa-lg fa-envelope"></i> rtiemps@gmail.com</span>
                    </p>
                </div>
                <!-- end invoice-footer -->
            </div>
        </div>
    </div>
</div>
</body>
</html>
<style>
    body {
        margin-top: 20px;
        background: #eee;
    }

    .invoice {
        background: #fff;
        padding: 20px
    }

    .invoice-company {
        font-size: 20px
    }

    .invoice-header {
        margin: 0 -20px;
        background: #f0f3f4;
        padding: 20px
    }

    .invoice-date,
    .invoice-from,
    .invoice-to {
        display: table-cell;
        width: 1%
    }

    .invoice-from,
    .invoice-to {
        padding-right: 20px
    }

    .invoice-date .date,
    .invoice-from strong,
    .invoice-to strong {
        font-size: 16px;
        font-weight: 600
    }

    .invoice-date {
        text-align: right;
        padding-left: 20px
    }

    .invoice-price {
        background: #f0f3f4;
        display: table;
        width: 100%
    }

    .invoice-price .invoice-price-left,
    .invoice-price .invoice-price-right {
        display: table-cell;
        padding: 20px;
        font-size: 20px;
        font-weight: 600;
        width: 75%;
        position: relative;
        vertical-align: middle
    }

    .invoice-price .invoice-price-left .sub-price {
        display: table-cell;
        vertical-align: middle;
        padding: 0 20px
    }

    .invoice-price small {
        font-size: 12px;
        font-weight: 400;
        display: block
    }

    .invoice-price .invoice-price-row {
        display: table;
        float: left
    }

    .invoice-price .invoice-price-right {
        width: 25%;
        background: #2d353c;
        color: #fff;
        font-size: 28px;
        text-align: right;
        vertical-align: bottom;
        font-weight: 300
    }

    .invoice-price .invoice-price-right small {
        display: block;
        opacity: .6;
        position: absolute;
        top: 10px;
        left: 10px;
        font-size: 12px
    }

    .invoice-footer {
        border-top: 1px solid #ddd;
        padding-top: 10px;
        font-size: 10px
    }

    .invoice-note {
        color: #999;
        margin-top: 80px;
        font-size: 85%
    }

    .invoice>div:not(.invoice-footer) {
        margin-bottom: 20px
    }

    .btn.btn-white,
    .btn.btn-white.disabled,
    .btn.btn-white.disabled:focus,
    .btn.btn-white.disabled:hover,
    .btn.btn-white[disabled],
    .btn.btn-white[disabled]:focus,
    .btn.btn-white[disabled]:hover {
        color: #2d353c;
        background: #fff;
        border-color: #d9dfe3;
    }
</style>