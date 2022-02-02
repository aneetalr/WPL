<?php
$conn= mysqli_connect('localhost', 'root', '', 'artgallery');
if (!$conn) {
    die('Connection error : ' . mysqli_connect_error());
}
$table1= 'CREATE TABLE IF NOT EXISTS `artwork` (
    `artid` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(20) NOT NULL,
    `cdate` date NOT NULL,
    `type` varchar(20) NOT NULL
  )';
  $create_table1 = mysqli_query($conn, $table1);
$table2= 'CREATE TABLE IF NOT EXISTS `artist` (
    `artistid` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(20) NOT NULL,
    `exp` int NOT NULL,
    `category` varchar(20) NOT NULL
  )';
$create_table2 = mysqli_query($conn, $table2);
$table3= 'CREATE TABLE IF NOT EXISTS `customer` (
    `customerid` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(20) NOT NULL,
    `address` varchar(50) NOT NULL,
    `amount` varchar(20) NOT NULL
  )';
$create_table3 = mysqli_query($conn, $table3);
if(isset($_POST['work'])) {
    $sql="insert into artwork(name,cdate,type) values ('$_POST[name]','$_POST[cdate]','$_POST[type]')";
    $result= mysqli_query($conn, $sql);
    if($result) {
        echo "<script>alert('Details Added Successfully')</script>";
        echo "<script>window.location.href=window.location.href</script>";    
    }    
}
if(isset($_POST['artist'])) {
    $sql="insert into artist(name,exp,category) values ('$_POST[name]',$_POST[exp],'$_POST[category]')";
    $result= mysqli_query($conn, $sql);
    if($result) {
        echo "<script>alert('Details Added Successfully')</script>";
        echo "<script>window.location.href=window.location.href</script>";    
    }    
}
if(isset($_POST['customer'])) {
    $sql="insert into customer(name,address,amount) values ('$_POST[name]','$_POST[address]',$_POST[amount])";
    $result= mysqli_query($conn, $sql);
    if($result) {
        echo "<script>alert('Details Added Successfully')</script>";
        echo "<script>window.location.href=window.location.href</script>";    
    }    
}
?>
<html>
<head>
    <title>Art Gallery Management System</title>
</head>
<body>
            <form method="post" action="">
                <table cellpadding="5px" cellspacing="5px"  align="center">
                    <tr>
                        <th colspan="2"><h1 align="center">Add ArtWork</h1></th>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td><input type="text" name="name"></td>
                    </tr>
                    <tr>
                        <th>Created Date</th>
                        <td><input type="date" name="cdate"></td>
                    </tr>
                    <tr>
                        <th>Type</th>
                        <td><input type="text" name="type"></td>
                    </tr>
                    <tr>
                        <th colspan="2" style="text-align: center;">
                            <input type="submit" value="Add" name="work">
                        </th>
                    </tr>
                </table>
            </form>
            <table cellpadding="5px" cellspacing="5px"  align="center" border="1">
                <tr>
                    <th colspan="10"><h1 align="center">ArtWork Details</h1></th>
                </tr>
                <tr>
                    <th colspan="5">
                        <?php
                        $sql="select * from artwork";
                        $res= mysqli_query($conn, $sql);
                        ?> 
                        <p>No: of artworks : <?php echo mysqli_num_rows($res);?></p>                   
                    </th>
                </tr>
                <tr>
                    <th>Sl No</th>
                    <th>Artwork Id</th>
                    <th>Name</th>
                    <th>Created Date</th>
                    <th>Type</th>
                </tr>
                <?php 
                $n=1;
                while($row=mysqli_fetch_assoc($res)) {
                    ?>
                    <tr>
                        <td><?php echo $n++?></td>
                        <td><?php echo $row['artid']?></td>
                        <td><?php echo $row['name']?></td>
                        <td><?php echo $row['cdate']?></td>
                        <td><?php echo $row['type']?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <form method="post" action="">
                <table cellpadding="5px" cellspacing="5px"  align="center">
                    <tr>
                        <th colspan="2"><h1 align="center">Add Artist</h1></th>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td><input type="text" name="name"></td>
                    </tr>
                    <tr>
                        <th>Experiance</th>
                        <td><input type="number" name="exp"></td>
                    </tr>
                    <tr>
                        <th>Category</th>
                        <td><input type="text" name="category"></td>
                    </tr>
                    <tr>
                        <th colspan="2" style="text-align: center;">
                            <input type="submit" value="Add" name="artist">
                        </th>
                    </tr>
                </table>
            </form>
            <table cellpadding="5px" cellspacing="5px"  align="center" border="1">
                <tr>
                    <th colspan="10"><h1 align="center">Artist Details</h1></th>
                </tr>
                <tr>
                    <th colspan="5">
                        <?php
                        $sql="select * from artist";
                        $res= mysqli_query($conn, $sql);
                        ?>      
                        <p>No: of artists : <?php echo mysqli_num_rows($res);?></p>              
                    </th>
                </tr>
                <tr>
                    <th>Sl No</th>
                    <th>Artist Id</th>
                    <th>Name</th>
                    <th>Experiance</th>
                    <th>Category</th>
                </tr>
                <?php 
                $n=1;
                while($row=mysqli_fetch_assoc($res)) {
                    ?>
                    <tr>
                        <td><?php echo $n++?></td>
                        <td><?php echo $row['artistid']?></td>
                        <td><?php echo $row['name']?></td>
                        <td><?php echo $row['exp']?></td>
                        <td><?php echo $row['category']?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <form method="post" action="">
                <table cellpadding="5px" cellspacing="5px"  align="center" >
                    <tr>
                        <th colspan="2"><h1 align="center">Add Customer</h1></th>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td><input type="text" name="name"></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td><textarea name="address" rows="5" style="height: auto;border-style: inset;border-width: 2px;"></textarea></td>
                    </tr>
                    <tr>
                        <th>Amount</th>
                        <td><input type="number" name="amount"></td>
                    </tr>
                    <tr>
                        <th colspan="2" style="text-align: center;">
                            <input type="submit" value="Add" name="customer">
                        </th>
                    </tr>
                </table>
            </form>
            <table cellpadding="5px" cellspacing="5px"  align="center" border="1">
                <tr>
                    <th colspan="10"><h1 align="center">Customer Details</h1></th>
                </tr>
                <tr>
                    <th colspan="5">
                        <?php
                        $sql="select * from customer";
                        $res= mysqli_query($conn, $sql);
                        ?>                    
                        <p>No: of customers : <?php echo mysqli_num_rows($res);?></p>
                    </th>
                </tr>
                <tr>
                    <th>Sl No</th>
                    <th>Customer Id</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Amount</th>
                </tr>
                <?php 
                $n=1;
                while($row=mysqli_fetch_assoc($res)) {
                    ?>
                    <tr>
                        <td><?php echo $n++?></td>
                        <td><?php echo $row['customerid']?></td>
                        <td><?php echo $row['name']?></td>
                        <td><?php echo $row['address']?></td>
                        <td><?php echo $row['amount']?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
</body>
</html>