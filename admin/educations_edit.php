<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: educations.php' );
  die();
  
}

if( isset( $_POST['title'] ) )
{
  
  if( $_POST['institution'] and $_POST['date'] )
  {
    
    $query = 'UPDATE educations SET
      title = "'.mysqli_real_escape_string( $connect, $_POST['title'] ).'",
      description = "'.mysqli_real_escape_string( $connect, $_POST['description'] ).'",
      institution = "'.mysqli_real_escape_string( $connect, $_POST['institution'] ).'",
      url = "'.mysqli_real_escape_string( $connect, $_POST['url'] ).'",
      date = "'.mysqli_real_escape_string( $connect, $_POST['date'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'education has been updated' );
    
  }

  header( 'Location: educations.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM educations
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: educations.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>

<h2>Edit Education</h2>

<form method="post">
  
  <label for="title">Title:</label>
  <input type="text" name="title" id="title" value="<?php echo htmlentities( $record['title'] ); ?>">
    
  <br>
  
  <label for="description">Description:</label>
  <textarea type="text" name="description" id="description" rows="5"><?php echo htmlentities( $record['description'] ); ?></textarea>
  
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
  <input type="text" name="institution" id="institution" value="<?php echo htmlentities( $record['institution'] ); ?>">
    
  <br>

  <label for="url">URL:</label>
  <input type="text" name="url" id="url" value="<?php echo htmlentities( $record['url'] ); ?>">
    
  <br>
  
  <label for="date">Date:</label>
  <input type="date" name="date" id="date" value="<?php echo htmlentities( $record['date'] ); ?>">
    
  <br>
  
  <input type="submit" value="Edit Education">
  
</form>

<p><a href="educations.php"><i class="fas fa-arrow-circle-left"></i> Return to Education List</a></p>


<?php

include( 'includes/footer.php' );

?>