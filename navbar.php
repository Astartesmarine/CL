<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #a30001">
    <a class="navbar-brand" href="#"><img src="./img/logo2.png" style="width: 250px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
    <?php 
    $db->Query('SELECT * FROM menu WHERE stato=1 AND figlio=0');
    while($righe=$db->Row()){
     ?>
      <li class="nav-item <?=($righe->madre==1)? 'dropdown':'';?>">
        <a style="color: white;font-size: 18px" class="nav-link <?=($righe->madre==1)? 'dropdown-toggle':'';?>" href=" <?=$righe->nome;?>" <?=($righe->madre==1)? 'id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"':'';?> >
         <?=$righe->menu;?>
        </a>
       <?php if($righe->madre==1){?>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
 <?php 
 $db2->Query("SELECT * FROM menu WHERE stato=1 AND figlio={$righe->idMenu}");
 while ($sottomenu=$db2->Row()){
 
 ?>
          <a class="dropdown-item" href="<?=$sottomenu->nome;?>"><?=$sottomenu->menu;?></a>
 <?php } ?>
        </div>
       <?php } ?>
          
          
      </li>
 <?php } ?>    
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
   </div>    
</nav>