
<?php require_once('../private/initialize.php');


?>

<?php $page_title = 'Monitor SQL'; //used in header.php
?>
<?php include(SHARED_PATH . '/header.php'); ?>


<body>
<header>
        <nav>
            <ul>       
                <li><a href="<?php echo url_for('index.php'); ?>"> Main Menu</a> </li>
                <li><a href="<?php echo url_for('admin_account/index.php'); ?>"> Admin Accounts</a> </li>
                <li><a href="<?php echo url_for('user_account/index.php'); ?>"> Customer Accounts</a> </li>
                <li><a href="<?php echo url_for('product/index.php'); ?>"> Products</a> </li>
                <li><a href="<?php echo url_for('web_edit/index.php'); ?>"> Page Editor</a> </li>
                <li><a href="<?php echo url_for('admin_account/logout.php'); ?>"> Logout</a> </li>
            </ul>
        </nav>
    </header>

    
    
    <div id="temp1"><p> SQL database connection is 
            <?php
                if(isset($db)){
                    echo "On";
                    echo "
                    <svg height=\"100\" width=\"100\">
                    <circle cx=\"50\" cy=\"50\" r=\"15\" fill=\"green\"/>
                    Sorry, your browser does not support inline SVG.  
                    </svg>
                    </p>";
                }else{
                    echo "Off";
                    echo "<svg height=\"100\" width=\"100\">
                    <circle cx=\"50\" cy=\"50\" r=\"15\" fill=\"red\"/>
                    Sorry, your browser does not support inline SVG.  
                    </svg>
                    </p>";
                }
            ?>
    </div>




    <?php include(SHARED_PATH . '/footer.php'); ?>