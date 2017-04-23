<?php require_once('header.php') ?>
<div>
	<form action="http://localhost:8181/TW/index.php?action=players&filter_on=1" method="POST">
    <div class="container">
      <button type="submit">Cauta</button>
      <label><b>Nume</b></label>
      <input type="text" placeholder="Introdu nume" name="nume" value="<?php if(isset($_REQUEST['nume'])){echo $_REQUEST['nume'];}?>">
      <label><b>Prenume</b></label>
      <input type="text" placeholder="Introdu prenume" name="prenume" value="<?php if(isset($_REQUEST['prenume'])){echo $_REQUEST['prenume'];}?>" >
      <label><b>Nationalitate</b></label>
      <select name="nationalitate" value="<?php if(isset($_REQUEST['nationalitate'])){echo $_REQUEST['nationalitate'];}?>">
 	  	<option value=""></option>
  	    <option value="romana">Romana</option>
  		<option value="italiana">Italiana</option>
       	<option value="germana">Germana</option>
       	<option value="japoneza">Japoneza</option>
      </select>
    </div>
  </form>
</div>
<?php
if(isset($_REQUEST['filter_on']))
{
	$range = 3;
	$v_nume=$_REQUEST['nume'];
	$v_prenume=$_REQUEST['prenume'];
	$v_nationalitate=$_REQUEST['nationalitate'];
	$sql = "SELECT COUNT(*) FROM jucatori where nume like '";
	$sql.="%$v_nume%";
	$sql.="' and  prenume like ";
	$sql.="'%$v_prenume%";
	$sql.="'";
	$result = oci_parse($db, $sql);
	oci_execute($result);
	$r = oci_fetch_row($result);
	$numrows = $r[0];
	$rowsperpage = 10;
	// find out total pages
	$totalpages = ceil($numrows / $rowsperpage);

	// get the current page or set a default
	if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
	   // cast var as int
	   $currentpage = (int) $_GET['currentpage'];
	} else {
	   // default page num
	   $currentpage = 1;
	} // end if

	// if current page is greater than total pages...
	if ($currentpage > $totalpages) {
	   // set current page to last page
	   $currentpage = $totalpages;
	} // end if
	// if current page is less than first page...
	if ($currentpage < 1) {
	   // set current page to first page
	   $currentpage = 1;
	} // end if

	// the offset of the list, based on current page 
	$offset = ($currentpage - 1) * $rowsperpage;

	// get the info from the db 
	$cerinte="'%$v_nume%";
	$cerinte.="' and  prenume like ";
	$cerinte.="'%$v_prenume%";
	$cerinte.="'";
	$sql = "SELECT nume,prenume,varsta FROM (Select rownum as rw ,nume, prenume ,varsta from jucatori where nume like $cerinte) where rw>=$offset and rw<=($rowsperpage+$offset)";
	$result = oci_parse($db,$sql);
	oci_execute($result);
	?>
	<table>
	<tr>
	    <td><strong>Nume<strong></th>
	    <td><strong>Prenume<strong></th> 
	    <td><strong>Varsta<strong></th>
	 </tr>
	<?php 
	while(oci_fetch($result)){ ?>
		<tr>
			<td><?php echo oci_result($result,'NUME')?></td>
			<td><?php echo oci_result($result,'PRENUME')?></td>
			<td><?php echo oci_result($result,'VARSTA')?></td>
		</tr>
	<?php } ?>
	</table>
	<?php
	$range = 3;
	$v_nume=$_REQUEST['nume'];
	$v_prenume=$_REQUEST['prenume'];
	$v_nationalitate=$_REQUEST['nationalitate'];
	// if not on page 1, don't show back links
	if ($currentpage > 1) {
	   // show << link to go back to page 1
	   echo " <a href='http://localhost:8181/TW/index.php?action=players&currentpage=1&filter_on=1&nume=$v_nume&prenume=$v_prenume&nationalitate=$nationalitate'><<</a> ";
	   // get previous page num
	   $prevpage = $currentpage - 1;
	   // show < link to go back to 1 page
	   echo " <a href='http://localhost:8181/TW/index.php?action=players&currentpage=$prevpage&filter_on=1&nume=$v_nume&prenume=$v_prenume&nationalitate=$nationalitate'><</a> ";
	} // end if 

	// loop to show links to range of pages around current page
	for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
	   // if it's a valid page number...
	   if (($x > 0) && ($x <= $totalpages)) {
	      // if we're on current page...
	      if ($x == $currentpage) {
	         // 'highlight' it but don't make a link
	         echo " [<b>$x</b>] ";
	      // if not current page...
	      } else {
	         // make it a link
	         echo " <a href='http://localhost:8181/TW/index.php?action=players&currentpage=$x&filter_on=1&nume=$v_nume&prenume=$v_prenume&nationalitate=$nationalitate'>$x</a> ";
	      } // end else
	   } // end if 
	} // end for

	// if not on last page, show forward and last page links        
	if ($currentpage != $totalpages) {
	   // get next page
	   $nextpage = $currentpage + 1;
	    // echo forward link for next page 
	   echo " <a href='http://localhost:8181/TW/index.php?action=players&currentpage=$nextpage&filter_on=1&nume=$v_nume&prenume=$v_prenume&nationalitate=$nationalitate'>></a> ";
	   // echo forward link for lastpage
	   echo " <a href='http://localhost:8181/TW/index.php?action=players&currentpage=$totalpages&filter_on=1&nume=$v_nume&prenume=$v_prenume&nationalitate=$nationalitate'>>></a> ";
	} 
}
?>
