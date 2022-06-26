<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Products</title>
    <style>
        .products {
            background: #f8f8f8;
            border: none;
            width: 200px;
            height: 200px;
            background-size: cover;
            background-position: center; 
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- <header>
        <div class="container_header">
            <img src="https://i.ibb.co/vq7sysz/logo.png" alt="logo" class="logo">
        
            <nav>
                <ul>
                    <li><a href="home.html">Home</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="news.php">News</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="sign_in.php">Account</a></li>
                </ul>
            </nav>
        </div>
    </header> -->

    <h1 style="color: #af0000; text-align: center; font-size: 40px;">Products</h1>

    <form action="products.php" method="post">
        <input style="background: #eeeeee; border: 1px solid #000000; border-radius: 5px; width: 45%; height: 30px; cursor: pointer; margin-left: 24%;" type="text" name="comments">
        <input style="margin-left: 1%; border: 1px solid #000000; border-radius: 5px; width: 90px; height: 30px; font-size: large; cursor: pointer;" type="submit" name="button" value="Search"/>
        <br><br>
    </form>


    <?php
        $conn = mysqli_connect("localhost", "root", "123456", "web");
                    
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);

        }
        $sql = "SELECT `name`, `price`, `key_word`, `image_url`, `image_url2`, `image_url3`, `image_url4`, `image_url5`, `image_url6`, `image_url7` FROM `products`";

        $result = $conn->query($sql);
        

        if (isset($_POST['comments']) AND strlen($_POST['comments'])>0) {

            $a = [];
            $comments= $_POST['comments'];
        

            $words = explode(" ", $comments);


            while($row = $result->fetch_assoc()){
                $n = $row['name'];
                $name = explode(" ", $n);
                $counter = 0;
                
                foreach ($words as $i) {
                    foreach ($name as $j) {
                        if(strcmp(strtolower($i), strtolower($j)) == 0){
                            $counter++;
                        }
                    }
                }

                $k = $row['key_word'];
                $name = explode(" ", $k);
                
                foreach ($words as $i) {
                    foreach ($name as $j) {
                        if(strcmp(strtolower($i), strtolower($j)) == 0){
                            $counter++;
                        }
                    }
                }

                if($counter > 0){
                    $a[$n."=".$row['image_url']."=".$row['price']] = $counter;
                }
            }

            foreach($a as $x=>$v){
                $t = explode("=", $x);

                echo '<form style="margin-left: 3%; margin-right: 5%;" action = "product.php" method="POST">   
                    <li style="float: left; display: block; margin-left: 15%; margin-top: 2%; list-style-type: none;">
                        <input class="products" name="t" type="hidden" value="'.$t[0].'">    
                        <input class="products" style="background-image: url('.$t[1].');" type="submit" value=" ">  
                        <p style="font-size: 20px; text-align: center;">'.$t[0].'<br>$'.$t[2].'</p>
                        
                        
                    </li></form>';
            }

        }


        else{
            while ($row = $result->fetch_assoc()) {
                echo '<form style="margin-left: 3%; margin-right: 5%;" action = "product.php" method="POST">   
                    <li style="float: left; display: block; margin-left: 15%; margin-top: 2%; list-style-type: none;">
                        <input class="products" name="t" type="hidden" value="'.$row['name'].'">    
                        <input class="products" style="background-image: url('.$row['image_url'].');" type="submit" value=" ">  
                        <p style="font-size: 20px; text-align: center;">'.$row['name'].'<br>$'.$row['price'].'</p>
                        
                        
                    </li></form>';
            }
        }
        $conn->close();
    ?>

    <br style="clear: both;"><br style="clear: both;"><br style="clear: both;">
    
    <!-- <footer class="container_footer">
        <div class="footer_logo">
            <img src="https://i.ibb.co/vq7sysz/logo.png" alt="logo">
        </div>
        <h2 class="footer_comp_name">NTST-Tech Development Ltd.</h2>
        <div class="contact_us">
            <a style="color: #e9e9e9; text-decoration: none; font-size: x-large; font-weight: bold;" href="contact.html"><li>CONTACT US</li></a>
            <li style="background: url(https://i.ibb.co/3pm5jWx/tel.png) no-repeat 0; padding-left: 12%;">(123)456-7890</li>
            <li style="background: url(https://i.ibb.co/WHscy1Q/email.png) no-repeat 0; padding-left: 12%;">email@gmail.com</li>
        </div> 
        <div class="follow_us">
            <li style="font-size: x-large; font-weight: bold;">FOLLOW US</li>
            <li style="background: url(https://i.ibb.co/nwDgBmM/facebook.png) no-repeat; background-position: -2.5%; padding-left: 16%; margin: 3px 0;"><a class="social_link" href="">Fackbook</a></li>
            <li style="background: url(https://i.ibb.co/LDwsPN2/twitter.png) no-repeat; background-position: -1%; padding-left: 16%; margin: 3px 0;"><a class="social_link" href="">Twitter</a></li>
            <li style="background: url(https://i.ibb.co/5L5rHhq/instgram.png) no-repeat; background-position: 1%; padding-left: 16%; margin: 3px 0;"><a class="social_link" href="">Instagram</a></li>
        </div>
        
        <p class="copyright">Copyright &copy; <script>document.write(new Date().getFullYear())</script> All Rights Reserved</p>
    </footer> -->

</body>
</html>


