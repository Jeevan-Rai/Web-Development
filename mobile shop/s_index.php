<?php include 'header.php' ?>
<?php include 'conn.php' ?>
<br>
<html>
    <?php
        $sql = 'SELECT COUNT(*) as cnt FROM sales';
        $res = $conn->query($sql);
        foreach($res as $var){
            $count = $var['cnt'];
        }
        $sql = "SELECT count(*) as cnt from products";
        $res = $conn->query($sql);
        foreach($res as $var){
            $countprdcts = $var['cnt'];
        }
    ?>
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total sales</h5>
                    <p class="card-text"> <?php echo $count; ?></p>
                    <a href="viewsales.php" class="btn btn-primary">VIEW</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Available Products</h5>
                    <p class="card-text"><?php echo $countprdcts; ?></p>
                    <a href="viewprdcts.php" class="btn btn-primary">VIEW</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Sell Mobile</h5>
                    <p class="card-text">Add new orders</p>
                    <a href="addorders.php" class="btn btn-primary">SELL</a>
                </div>
            </div>
        </div>
    </div>
</div>

</html>