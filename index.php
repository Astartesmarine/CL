<?php 
    include './inc/mysql.class.php';
    $db = new MySQL();
    $db2 = new MySQL(); 
?>
<!doctype html>
<html lang="it">
  <head>
   <!-- Collegamento della testata del nostro sito -->
   <?php include 'struttura/header.php'; ?>
  </head>
  <body>
      <?php include 'struttura/navbar.php'; ?>
      <?php
            if(empty($_GET['page']))
            {
               if(is_numeric($_GET['page']))
               {
                   $db->Query("SELECT * FROM menu WHERE stato=1 AND idMenu={$_GET['page']}");
                   $menu=$db->Row();
                   switch ($_GET['page']==$menu->idMenu) 
                   {
                       case $menu->idMenu:
                           include 'page/'.$menu->nome;
                           break;

                       default:
                           include 'page/default.php';
                           break;
                   }
               }
            }
            else
            {
                include 'page/default.php';
            }
      ?>
    <?php include 'struttura/footer.php'; ?>
  </body>
</html>
