<?php
  //front-page of online book store
  
  include ('book_sc_fns.php');
  
  // session starts 
  session_start();
  do_html_header("Welcome to Cooper Book Store");

  echo "<p>Please choose a category:</p>";

  
  $cat_array = get_categories();

  // display as links to cat pages
  display_categories($cat_array);

  // if logged in as admin
  if(isset($_SESSION['admin_user'])) {
    display_button("admin.php", "Admin Menu");
  }
  do_html_footer();
?>
