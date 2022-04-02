<?php include 'header.php' ?>
<?php include 'conn.php' ?>

<br>
<div class="container">
    <button type="button" class="btn btn-outline-primary">Sales List</button>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Sno.</th>
                <th scope="col">Order No.</th>
                <th scope="col">Amount</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = 'SELECT * FROM sales';
            $res = $conn->query($sql);
            $data = $res->fetch_assoc();
            ?>
            <!-- <script type="text/javascript">
                function PrintDiv() {
                    var divToPrint = document.getElementById('divToPrint');
                    var popupWin = window.open('', '_blank', 'width=300,height=300');
                    popupWin.document.open();
                    popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
                    popupWin.document.close();
                }
            </script> -->
            <tr>
                <th scope="row">1</th>
                <td><?php echo $data['order_id'] ?></td>
                <td><?php echo $data['total_amount'] ?></td>
                <td><?php echo $data['date_created'] ?></td>
                <!-- <td>
                    <div id="divToPrint"><input type="button" value="print" onclick="PrintDiv();" /></div>
                </td> -->
                <td><a href="invoice.php? id=<?php echo $data['order_id']; ?>"><button type="button" class="btn btn-outline-success">Print</button></a></td>
            </tr>
        </tbody>
    </table>
</div>