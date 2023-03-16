<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['institution'] ) )
{
  
  if( $_POST['institution'] and $_POST['description'] )
  {
    
    $query = 'INSERT INTO educations (
        title,
        description,
        institution,
        url,
        date
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['title'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['description'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['institution'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['url'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['date'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Education has been added' );
    
  }
  
  header( 'Location: educations.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Education</h2>

<form method="post">
  
  <label for="title">Title:</label>
  <input type="text" name="title" id="title">
    
  <br>
  
  <label for="description">Description:</label>
  <textarea type="text" name="description" id="description" rows="10"></textarea>
      
  <script>

  ClassicEditor
    .create( document.querySelector( '#description' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
    
  </script>

  <br>

  <label for="institution">Institution:</label>
  <input type="text" name="institution" id="institution">
  
  <br>
  
  <label for="url">URL:</label>
  <input type="text" name="url" id="url">
  
  <br>
  <label for="date">Date:</label>
  <input type="date" name="date" id="date">
  
  <br>
  
  <input type="submit" value="Add Education">
  
</form>

<p><a href="educations.php"><i class="fas fa-arrow-circle-left"></i> Return to Education List</a></p>


<?php

include( 'includes/footer.php' );

?>