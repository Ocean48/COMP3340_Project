
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

    
    
    <div id="temp1">The status of website:
        <ul>
            <li>SQL database connection is 
                <?php
                if(isset($db)){
                    echo "On";
                    echo "<br>
                    <svg height=\"100\" width=\"100\">
                    <circle cx=\"50\" cy=\"50\" r=\"15\" fill=\"green\"/>
                    Sorry, your browser does not support inline SVG.  
                    </svg>
                    ";
                }else{
                    echo "Off";
                    echo "<br>
                    <svg height=\"100\" width=\"100\">
                    <circle cx=\"50\" cy=\"50\" r=\"15\" fill=\"red\"/>
                    Sorry, your browser does not support inline SVG.  
                    </svg>
                    ";
                }
                ?>
            </li>
            <li>Webserver connection is
                <?php
                $u = u();
                if(isset($u)){
                    echo "On";
                    echo "<br>
                    <svg height=\"100\" width=\"100\">
                    <circle cx=\"50\" cy=\"50\" r=\"15\" fill=\"green\"/>
                    Sorry, your browser does not support inline SVG.  
                    </svg>
                    ";
                }else{
                    echo "Off";
                    echo "<br><svg height=\"100\" width=\"100\">
                    <circle cx=\"50\" cy=\"50\" r=\"15\" fill=\"red\"/>
                    Sorry, your browser does not support inline SVG.  
                    </svg>
                    ";
                }
                ?>
            </li>
            
        </ul>
    </div>
    <!-- $output = '';
    SQL database connection is 
    if(!empty($errors)) {
      $output .= "<div class=\"errors\">";
      $output .= "Please fix the following errors:";
      $output .= "<ul>";
      foreach($errors as $error) {
        $output .= "<li>" . h($error) . "</li>";
      }
      $output .= "</ul>";
      $output .= "</div>";
    }
    return $output; -->



    <?php include(SHARED_PATH . '/footer.php'); ?>