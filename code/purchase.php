<?php

  include ('book_sc_fns.php');

  session_start();

  do_html_header("Checkout");

 
  $name = $_POST['name'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $zip = $_POST['zip'];
  $country = $_POST['country'];

  
  if (($_SESSION['cart']) && ($name) && ($address) && ($city) && ($zip) && ($country)) {
    // able to insert into database
    if(insert_order($_POST) != false ) {
      //display cart, not allowing changes and without pictures
      display_cart($_SESSION['cart'], false, 0);

      display_shipping(calculate_shipping_cost());

      //get credit card details
      display_card_form($name);

      display_button("show_cart.php", "Continue Shopping");
    } else {
      echo "<p>Could not store data, please try again.</p>";
      display_button('checkout.php', 'Back');
    }
  } else {
    echo "<p>You did not fill in all the fields, please try again.</p><hr />";
    display_button( 'checkout.php', 'Back');
  }

  do_html_footer();
?>
