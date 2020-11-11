<?php
class DSession
{
  public function sessionDestroy()
  {
    if(isset($_POST['logout']))
    {
    session_destroy();
    header('location:login3');
}
  }
}

 ?>
