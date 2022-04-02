<?php include 'header.php' ?>
<?php include 'conn.php' ?>

<?php
    $order_id = $_GET['id'];
    $_SESSION['o_id'] = $_GET['id'];
    $sql = "SELECT * FROM sales WHERE order_id ='$order_id'";
    $res = $conn->query($sql);
    $res = $res->fetch_assoc();
    $amt = $res['total_amount'];
    $date = $res['date_created'];
    $sql = "SELECT * FROM clients where id =(SELECT client_id from orders where id ='$order_id')";
    $res = $conn->query($sql);
    $res = $res->fetch_assoc();
    $fname = $res['firstname'];
    $lname = $res['lastname'];
    $cname = $fname . " " . $lname;
    $contact = $res['contact'];
    $email = $res['email'];
    $address = $res['default_delivery_address'];
    
if (isset($cname)) {
?>
<div class="container">
    <form action="printinvoice.php" method="POST">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Name</label>
                <input type="text" class="form-control" id="inputEmail4" value="<?php echo $cname ?>" name="cname" >
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">contact</label>
                <input type="number" class="form-control" id="inputPassword4" value="<?php echo $contact ?>" name="contact">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" id="inputAddress" value="<?php echo $address ?>" name="address">
        </div>
        <div class="form-group">
            <label for="inputAddress2">Email</label>
            <input type="email" class="form-control" id="inputAddress2" value="<?php echo $email ?>" name="email">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">Date</label>
                <input type="text" class="form-control" id="inputCity" value="<?php echo $date ?>" name="date">
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Check me out
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Create Invoice</button>
    </form>
</div>
<?php } else {
?>
    <form>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
        </div>
        <div class="form-group">
            <label for="inputAddress2">Address 2</label>
            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip">Zip</label>
                <input type="text" class="form-control" id="inputZip">
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Check me out
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
    </form>

<?php } ?>