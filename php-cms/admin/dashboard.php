<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

?>

<ul id="dashboard">
  <li>
    <a href="projects.php">
      Manage Projects &#9812;
    </a>
  </li>
  <li>
    <a href="educations.php">
      Manage Educations &#9815;;
    </a>
  </li>
  <li>
    <a href="socials.php">
      Manage socials &#9814;;
    </a>
  </li>
  <li>
    <a href="skills.php">
      Manage Skills &#9822;
    </a>
  </li>
  <li>
    <a href="users.php">
      Manage Users &#9823;
    </a>
  </li>
  <li>
    <a href="logout.php">
      Logout
    </a>
  </li>
</ul>

<?php

include( 'includes/footer.php' );

?>
         