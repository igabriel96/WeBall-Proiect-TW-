<!DOCTYPE html>
<?php require_once('header.php') ?>
<div>
	<form action="index.php?action=matches&filter_on=1" method="POST">
    <div class="container">
      <button type="submit">Search</button>
      <label><b>Data disputarii meciului</b></label>
      <input type="date" placeholder="Introdu data" name="data_meci" value="<?php if(isset($_REQUEST['data_meci'])){echo $_REQUEST['data_meci'];}?>">
   </div>
 </form>
</div>
<?php
if(isset($_REQUEST['filter_on']))
{
	$range = 1;
	$v_data_meci=$_REQUEST['data_meci'];
	 if($_REQUEST['data_meci'] != NULL)
    	{
	   $sql = "SELECT COUNT(*) FROM meciuri where data_meci = to_date('";
	   $sql.="$v_data_meci";
	   $sql.="','yyyy-mm-dd')";
    	}
    	else
   	{
        $sql = "SELECT COUNT(*) FROM meciuri";
   	}
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
	$cerinte="'$v_data_meci";
	$cerinte.="'";
	if($_REQUEST['data_meci'] != NULL)
    	{
		$sql = "SELECT * from (Select rownum as rw, DATA_MECI, (SELECT NUME FROM ECHIPE WHERE ID=id_echipa1) as Echipa1, (SELECT logo FROM ECHIPE WHERE ID=id_echipa1) as Logo1 , (SELECT logo FROM ECHIPE WHERE ID=id_echipa2) as Logo2, (SELECT NUME FROM ECHIPE WHERE ID=id_echipa2) as Echipa2 , REZULTAT1 , REZULTAT2 , ID_GRUPA, ID from
       		MECIURI WHERE data_meci = to_date($cerinte,'yyyy-mm-dd')) where rw>=$offset and rw<=($rowsperpage+$offset)";
    	}
    	else
    	{
        	$sql = "SELECT * from (Select rownum as rw, DATA_MECI, (SELECT NUME FROM ECHIPE WHERE ID=id_echipa1) as Echipa1, (SELECT logo FROM ECHIPE WHERE ID=id_echipa1) as Logo1 , (SELECT logo FROM ECHIPE WHERE ID=id_echipa2) as Logo2, (SELECT NUME FROM ECHIPE WHERE ID=id_echipa2) as Echipa2 , REZULTAT1 , REZULTAT2 , ID_GRUPA, ID from
        	MECIURI ) where rw>=$offset and rw<=($rowsperpage+$offset)";
   	 }
	$result = oci_parse($db,$sql);
	oci_execute($result);
	if($r[0] != 0 ) { ?>
	<table class="tablematches">
	<tr>
        <th>Data meci</th>
        <th>Echipa gazda</th> 
        <th>Scorul</th>
        <th>Echipa oaspete</th>
        <th>Grupa</th>
        <th>Review</th>
        <th>Poll</th>
	 </tr>
	<?php } 
    	else
    	{
        echo "<center><b>Nu s-au disputat meciuri in aceasta data</b></center><br>";
        exit;
    	}
	while($row = oci_fetch_array($result)){ ?>
		<tr>
            <div class="displaymatches">
                <td><?php echo substr($row['DATA_MECI'],0,2).
                str_repeat('&nbsp;',1).substr($row['DATA_MECI'],3,1).
                strtolower(substr($row['DATA_MECI'],4,2)).
                str_repeat('&nbsp;', 1).'20'.
                substr($row['DATA_MECI'],7,2) ?></td>
                <td><?php echo $row[2]?></td>
                <td>
                <div id="scorescontainer">
                  <div id="leftimg">    
                    <img src="images/<?php echo $row[3] ?>" >
                  </div>
                  <div id="centerscore">
                    <?php echo $row['REZULTAT1'].'-'.$row['REZULTAT2']?>
                  </div>       
                  <div id="rightimg">
                      <img src="images/<?php echo $row[4] ?>" >
                 </div>
               </div>
              </td>
            <td><?php echo $row[5]?></td>
            <td><?php echo $row['ID_GRUPA']?></td>
            
     	    <td><div class="reviewpoll"><a href="index.php?action=reviews&id_meci=<?php echo $row['ID']?>"><center> REVIEW </center></a></div></td>
            <td><div class="reviewpoll"><a href="index.php?action=poll&id_meci=<?php echo $row['ID']?>"><center> POLL </center></a></div></td>
			</div></tr>
	<?php } ?>
	</table>
	<?php
	$range = 1;
	$v_data_meci=$_REQUEST['data_meci'];
	// if not on page 1, don't show back links
	if ($currentpage > 1) {
	   // show << link to go back to page 1
	   echo " <a href='http://localhost:8181/TW/index.php?action=matches&currentpage=1&filter_on=1&data_meci=$v_data_meci'><</a> ";
	   // get previous page num
	   $prevpage = $currentpage - 1;
	   // show < link to go back to 1 page
	   echo " <a href='http://localhost:8181/TW/index.php?action=matches&currentpage=$prevpage&filter_on=1&data_meci=$v_data_meci'><</a> ";
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
	         echo " <a href='http://localhost:8181/TW/index.php?action=matches&currentpage=$x&filter_on=1&data_meci=$v_data_meci'>$x</a> ";
	      } // end else
	   } // end if 
	} // end for

	// if not on last page, show forward and last page links        
	if ($currentpage != $totalpages) {
	   // get next page
	   $nextpage = $currentpage + 1;
	    // echo forward link for next page 
	   echo " <a href='http://localhost:8181/TW/index.php?action=matches&currentpage=$nextpage&filter_on=1&data_meci=$v_data_meci'>></a> ";
	   // echo forward link for lastpage
	   echo " <a href='http://localhost:8181/TW/index.php?action=matches&currentpage=$totalpages&filter_on=1&data_meci=$v_data_meci'>>></a> ";
	} 
}
?>
<?php require_once('footer.php') ?>
