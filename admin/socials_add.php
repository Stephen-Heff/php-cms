<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

// If the form has been submitted
if( isset( $_POST['name'] ) )
{
  
  // Check for minimum required content
  if( $_POST['name'] and $_POST['url'] )
  {
    
    $query = 'INSERT INTO socials (
        name,
        url
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['url'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Social has been added' );
    
  }
  
  header( 'Location: socials.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Social</h2>

<form method="post">
  
  <label for="name">Name:</label>
  <input type="text" name="name" id="name">
    
  <br>
  
  <label for="url">URL:</label>
  <input type="text" name="url" id="url">
  
  <br>
  
  <input type="submit" value="Add Social">
  
</form>

<p><a href="socials.php"><i class="fas fa-arrow-circle-left"></i> Return to Social List</a></p>


<?php

include( 'includes/footer.php' );

?>
         