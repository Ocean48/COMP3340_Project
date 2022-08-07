
<?php require_once('../private/initialize.php');


?>

<?php $page_title = 'Monitor SQL'; //used in header.php
?>
<?php include(SHARED_PATH . '/header.php'); ?>


<body>
<header>
    <h1 style="text-align: center;">Monitor Page</h1>   
    <br> 
</header>

    
    
    <div id="temp1">The status of website:
        <ul>
            <li>SQL database connection is 
                <?php
                if(isset($db)){
                    echo "<span style='color: green;'>On</span>";
                    echo "<br>
                    <svg height=\"100\" width=\"100\">
                    <circle cx=\"50\" cy=\"50\" r=\"15\" fill=\"green\"/>
                    Sorry, your browser does not support inline SVG.  
                    </svg>
                    ";
                }else{
                    echo "<span style='color: red;'>Off</span>";
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
                    echo "<span style='color: green;'>On</span>";
                    echo "<br>
                    <svg height=\"100\" width=\"100\">
                    <circle cx=\"50\" cy=\"50\" r=\"15\" fill=\"green\"/>
                    Sorry, your browser does not support inline SVG.  
                    </svg>
                    ";
                }else{
                    echo "<span style='color: red;'>Off</span>";
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