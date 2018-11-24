<?php
 //NUMERO DI PAGINE
 $x_pag = 30;
 // Recupero il numero di pagina corrente.
// Generalmente si utilizza una querystring
$pag = isset($_GET['pag']) ? $_GET['pag'] : 1;
// Controllo se $pag è valorizzato e se è numerico
// ...in caso contrario gli assegno valore 1
if (!$pag || !is_numeric($pag)) $pag = 1;

 // creiamo un piccolo motore di ricerca PER I PRODOTTI
  $cerca= " WHERE 1=1";
 if(!empty($_REQUEST['categorie'])){
     $categorienomevar=',categorie';
     $ric="&categorie={$_REQUEST['categorie']}";
  $cerca .=" AND catmer_anaart='{$_REQUEST['categorie']}'";
 }
 if(!empty($_REQUEST['subcategorie'])){
     $categorienomevar=',categorie';
     $ric .="&subcategorie={$_REQUEST['subcategorie']}";
  $cerca .=" AND gruppo_anaart='{$_REQUEST['subcategorie']}'";
 }
  if(!empty($_REQUEST['sottogruppi'])){
      $categorienomevar=',categorie';
   $ric .="&sottogruppi={$_REQUEST['subcategorie']}";  
  $cerca .=" AND sottog_anaart='{$_REQUEST['sottogruppi']}'";
 }
 if(!empty($_REQUEST['codart_anaart'])){
   $ric .="&codart_anaart={$_REQUEST['codart_anaart']}";    
  $cerca .=" AND codart_anaart='{$_REQUEST['codart_anaart']}'";
 }
 if(!empty($_REQUEST['cerca'])){
  $ric .="&cerca={$_REQUEST['cerca']}";   
  $cerca .= " AND desart_anaart like '%{$_REQUEST['cerca']}%'";   
 }
  if(!empty($_REQUEST['marca'])){
    $ric .="&marca={$_REQUEST['marca']}";    
  $cerca .= " AND precod_anaart = '{$_REQUEST['marca']}'";   
 }
   if(!empty($_REQUEST['modello'])){
   $ric .="&modello={$_REQUEST['modello']}";         
  $cerca .= " AND precod_anaart = '{$_REQUEST['modello']}'";   
 }
  if(!empty($_REQUEST['marcamoto'])){
    $ric .="&marcamoto={$_REQUEST['marcamoto']}"; 
  $cerca .= " AND precod_anaart = '{$_REQUEST['marcamoto']}'";   
 }
   if(!empty($_REQUEST['modellomoto'])){
  $ric .="&modellomoto={$_REQUEST['modellomoto']}";    
  $cerca .= " AND precod_anaart = '{$_REQUEST['modellomoto']}'";   
 }
 //creo le variabili per la form
 $anagraficaprodotti='anaart';
 $stringadiquery="SELECT * FROM {$anagraficaprodotti} {$categorienomevar}";
// Uso mysql_num_rows per contare il totale delle righe presenti all'interno della tabella agenda
//$all_rows = $db->Query($stringadiquery.$cerca);
 if (! $db->Query($stringadiquery.$cerca)) echo $db->Kill();
    $all_rows = $db->RowCount();
// Tramite una semplice operazione matematica definisco il numero totale di pagine
$all_pages = ceil($all_rows / $x_pag);
// Calcolo da quale record iniziare
$first = ($pag - 1) * $x_pag;
 $stringafinale=" ORDER BY numpro_anaart DESC LIMIT $first, $x_pag";
 //echo $stringadiquery.$cerca.$stringafinale;
 $prodotticerca =$db->Query($stringadiquery.$cerca.$stringafinale);

  while($prodotticerca=$db->Row()){?>    
codice htl
  <?php } ?> 

 <?php
if ($all_pages > 1){
  if ($pag > 1){
    echo "<li><a href=\"" . $_SERVER['PHP_SELF'] . "?page=" . $_GET['page'] . "&pag=" . ($pag - 1) . $ric. "\">";
    echo "<i class=\"fa fa-angle-left\"></i></a>&nbsp;</li>";
  }
  // faccio un ciclo di tutte le pagine
  // faccio un ciclo di tutte le pagine
  for ($p=1; $p<=$all_pages; $p++) {
    // per la pagina corrente non mostro nessun link ma la evidenzio in blod
    // all'interno della sequenza delle pagine
    if ($p == $pag) echo "<li><a href='#'><b>" . $p . "</b>&nbsp;</a></li>";
    // per tutte le altre pagine stampo il link
    else {
      echo "<li><a href=\"" . $_SERVER['PHP_SELF'] . "?page=" . $_GET['page'] . "&pag=" . $p . $ric . "\">";
      echo $p . "</a>&nbsp;</li>";
    }
  }
  if ($all_pages > $pag){
    echo "<li><a href=\"" . $_SERVER['PHP_SELF'] . "?page=" . $_GET['page'] . "&pag=" . ($pag + 1) . $ric. "\">";
    echo "<i class=\"fa fa-angle-right\"></i></a></li>";
  }
}
  
?>

	
	
	
