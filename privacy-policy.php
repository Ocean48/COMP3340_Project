<?php

require_once('private/initialize.php');

$layout = get_style_by_view(1);
$product_set = find_all_product();

$count = 0;
if (!empty($_SESSION["cart"])) {  // if cart is not empty count number of product inside
    foreach ($_SESSION["cart"] as $key => $value) {
        $count++;
    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="X">
    <link rel="stylesheet" href="css/style.css">
    <title>Privacy Policy</title>

    <!-- load style from database -->
    <style>
        body {
            background-color: <?php echo $layout["background_color"]; ?>;
        }

        .topnav {
            background-color: <?php echo $layout["margin_color"]; ?>;
        }

        .topnav a {
            color: <?php echo $layout["margin_text_color"]; ?>;
        }

        .container_footer {
            background-color: <?php echo $layout["margin_color"]; ?>;
            color: <?php echo $layout["margin_text_color"]; ?>;
        }
    </style>

</head>

<body>

    <!-- Header -->
    <header>
        <div class="topnav" id="myTopnav">
            <a href="index.php"><img src="images/logo.png" alt="logo" class="logo"></a>
            <a href="index.php" class="htext htext2">Home</a>
            <a href="products.php" class="htext">Shop</a>
            <a href="account/account.php" class="htext">Account</a>
            <a href="cart.php" class="htext">Cart <span style="font-size: 25px;"><?php if ($count != 0) {
                                                                                        echo "(" . $count . ")";
                                                                                    } ?></span></a>
            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="header_menu()">&#9776;</a>
            <a href="contact.php" class="htext">Contact</a>
            <a href="shipping-policy.php" class="htext_bottom">Shipping Policy</a>
            <a href="privacy-policy.php" class="htext_bottom">Privacy Policy</a>
            <a href="return-policy.php" class="htext_bottom">Return Policy</a>
        </div>
    </header>

    <blockquote cite="https://www.lttstore.com/pages/privacy-policy">
        <h1 class="page_title">privacy policy</h1>
        <br>
        <h4>Creator Warehouse, Inc. Privacy Policy</h4>
        <br>
        <p>This Privacy Policy describes how your personal information is collected, used, and shared when you visit or
            make a purchase from this “Site”.</p>
        <br>
        <h4>PERSONAL INFORMATION WE COLLECT</h4>
        <br>
        <p>When you visit the Site, we automatically collect certain information about your device, including
            information about your web browser, IP address, time zone, and some of the cookies that are installed on
            your device. Additionally, as you browse the Site, we collect information about the individual web pages or
            products that you view, what websites or search terms referred you to the Site, and information about how
            you interact with the Site. We refer to this automatically-collected information as “Device Information.”
        </p>
        <br>
        <p>
            We collect Device Information using the following technologies:
        </p>
        <br>
        <p>- “Cookies” are data files that are placed on your device or computer and often include an anonymous unique
            identifier. For more information about cookies, and how to disable cookies, visit
            http://www.allaboutcookies.org.</p>
        <p>- “Log files” track actions occurring on the Site, and collect data including your IP address, browser type,
            Internet service provider, referring/exit pages, and date/time stamps</p>
        <P>- “Web beacons,” “tags,” and “pixels” are electronic files used to record information about how you browse
            the Site.</P>
        <br>
        <p>Additionally when you make a purchase or attempt to make a purchase through the Site, we collect certain
            information from you, including your name, billing address, shipping address, payment information (including
            credit card numbers & PayPal information), email address, and phone number. We refer to this information as
            “Order Information.”
        </p>
        <br>
        <P>When we talk about “Personal Information” in this Privacy Policy, we are talking both about Device
            Information and Order Information.</P>
        <br>
        <h4>HOW DO WE USE YOUR PERSONAL INFORMATION?</h4>
        <br>
        <p>We use the Order Information that we collect generally to fulfill any orders placed through the Site
            (including processing your payment information, arranging for shipping, and providing you with invoices
            and/or order confirmations). Additionally, we use this Order Information to:</p>
        <p>Communicate with you;</p>
        <P>Screen our orders for potential risk or fraud; and</P>
        <p>When in line with the preferences you have shared with us, provide you with information or advertising
            relating to our products or services.</p>
        <p>We use the Device Information that we collect to help us screen for potential risk and fraud (in particular,
            your IP address), and more generally to improve and optimize our Site (for example, by generating analytics
            about how our customers browse and interact with the Site, and to assess the success of our marketing and
            advertising campaigns).</p>
        <br>
        <h4>SHARING YOUR PERSONAL INFORMATION</h4>
        <br>
        <p>We share your Personal Information with third parties to help us use your Personal Information, as described
            above. For example.</p>
        <br>
        <p>Finally, we may also share your Personal Information to comply with applicable laws and regulations, to
            respond to a subpoena, search warrant or other lawful request for information we receive, or to otherwise
            protect our rights.
        </p>
        <br>
        <h4>BEHAVIOURAL ADVERTISING</h4>
        <br>
        <p>As described above, we use your Personal Information to provide you with targeted advertisements or marketing
            communications we believe may be of interest to you. For more information about how targeted advertising
            works, you can visit the Network Advertising Initiative’s (“NAI”) educational page at
            http://www.networkadvertising.org/understanding-online-advertising/how-does-it-work.</p>
        <br>
        <p>You can opt out of targeted advertising by:</p>
        <P>FACEBOOK - https://www.facebook.com/settings/?tab=ads</P>
        <p>GOOGLE - https://www.google.com/settings/ads/anonymous</p>
        <p>BING - https://advertise.bingads.microsoft.com/en-us/resources/policies/personalized-ads</p>
        <br>
        <p>Additionally, you can opt out of some of these services by visiting the Digital Advertising Alliance’s
            opt-out portal at: http://optout.aboutads.info/.</p>
        <br>
        <h4>DO NOT TRACK</h4>
        <br>
        <p>Please note that we do not alter our Site’s data collection and use practices when we see a Do Not Track
            signal from your browser.
        </p>
        <br>
        <h4>YOUR RIGHTS</h4>
        <br>
        <p>If you are a European resident, you have the right to access personal information we hold about you and to
            ask that your personal information be corrected, updated, or deleted. If you would like to exercise this
            right, please contact us through the contact information below.</p>
        <br>
        <p>Additionally, if you are a European resident we note that we are processing your information in order to
            fulfill contracts we might have with you (for example if you make an order through the Site), or otherwise
            to pursue our legitimate business interests listed above. Additionally, please note that your information
            will be transferred outside of Europe, including to Canada and the United States.
        </p>
        <br>
        <h4>DATA RETENTION</h4>
        <br>
        <p>When you place an order through the Site, we will maintain your Order Information for our records unless and
            until you ask us to delete this information.</p>
        <br>
        <h4>CHANGES</h4>
        <br>
        <p>We may update this privacy policy from time to time in order to reflect, for example, changes to our
            practices or for other operational, legal or regulatory reasons.</p>
        <br>
        <h4>CONTACT US</h4>
        <br>
        <p>For more information about our privacy practices, if you have questions, or if you would like to make a
            complaint, please contact us by e-mail at support@email.com </p>

    </blockquote>

    <footer>
        <div class="container_footer">
            <br>
            <a href="index.php"><img src="images/logo.png" alt="logo" class="footer_logo"></a>
            <div class="center">
                <a href="contact.php" class="footer_text">Contact</a>
                <a href="shipping-policy.php" class="footer_text">Shipping Policy</a>
                <a href="privacy-policy.php" class="footer_text">Privacy Policy</a>
                <a href="return-policy.php" class="footer_text">Return Policy</a>
                <a href="terms-and-conditions.php" class="footer_text">Term and Conditions</a>
            </div>
            <p class="copyright">Copyright &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script> WEB | All Rights Reserved
            </p>
        </div>
    </footer>
</body>

</html>