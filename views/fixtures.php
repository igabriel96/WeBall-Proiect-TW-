<!DOCTYPE html>
<?php require_once('header.php') ?>
<?php 

  $sql = "select (select nume from echipe where id = id_echipa1) as echipa1 , (select logo from echipe where id = id_echipa1) as logo1 , ( select logo from echipe where id = id_echipa2) as logo2 , 
  (select nume from echipe where id = id_echipa2) as echipa2 , rezultat1 , rezultat2 from fixtures" ;
  $result = oci_parse($db, $sql);
  oci_execute($result);
  $contor = 1;
  while($row = oci_fetch_array($result))
  {
    $echipe[$contor] = $row['LOGO1'];
    $contor++;
    $echipe[$contor] = $row['ECHIPA1'];  
    $contor++;
    $echipe[$contor] = $row['REZULTAT1'];
    $contor++;
    $echipe[$contor] = $row['REZULTAT2'];
    $contor++;
    $echipe[$contor] = $row['ECHIPA2'];
    $contor++;  
    $echipe[$contor] = $row['LOGO2'];  
    $contor++;
 } ?>

<ul>
  <li>
      <div class="match-1-1">
          <img src="<?php echo $echipe[37] ?>" height="30" width="30" >  
              <span>
                 <?php echo $echipe[38].' '.$echipe[39].'-'.$echipe[40].' '.$echipe[41]?>
              </span>
          <img src="<?php echo $echipe[42] ?>" height="30" width="30" >
      </div>
    <ul>
      <li>
          <div class="match-2-1">
            <img src="<?php echo $echipe[25] ?>" height="30" width="30" >  
                <span>
                    <?php echo $echipe[26].' '.$echipe[27].'-'.$echipe[28].' '.$echipe[29]?>
                </span>
            <img src="<?php echo $echipe[30] ?>" height="30" width="30" >
          </div>
        <ul>
          <li>
             <div class="match-3-1">
                <img src="<?php echo $echipe[1] ?>" height="30" width="30" >
                <span>
                   <?php echo $echipe[2].' '.$echipe[3].'-'.$echipe[4].' '.$echipe[5]?>
                </span>
                <img src="<?php echo $echipe[6] ?>" height="30" width="30" >
             </div>
          </li>
          <li>
             <div class="match-3-2">
               
               <img src="<?php echo $echipe[7] ?>" height="30" width="30" >
                 <span>
                   <?php echo $echipe[8].' '.$echipe[9].'-'.$echipe[10].' '.$echipe[11]?>
                 </span>
               <img src="<?php echo $echipe[12] ?>" height="30" width="30" >
             </div>
          </li>
        </ul>
      </li>
      <li>
          <div class="match-2-2">
              <img src="<?php echo $echipe[31] ?>" height="30" width="30" >
                <span>
                    <?php echo $echipe[32].' '.$echipe[33].'-'.$echipe[34].' '.$echipe[35]?>
                </span>
              <img src="<?php echo $echipe[36] ?>" height="30" width="30" >
          </div>
        <ul>
          <li>
            <div class="match-3-3">
                <img src="<?php echo $echipe[13] ?>" height="30" width="30" >
                    <span>
                        <?php echo $echipe[14].' '.$echipe[15].'-'.$echipe[16].' '.$echipe[17]?>
                    </span>
                <img src="<?php echo $echipe[18] ?>" height="30" width="30" >
            </div>
          </li>
          <li>
            <div class="match-3-4">
                <img src="<?php echo $echipe[19] ?>" height="30" width="30" >
                    <span>
                        <?php echo $echipe[20].' '.$echipe[21].'-'.$echipe[22].' '.$echipe[23]?>
                    </span>
                <img src="<?php echo $echipe[24] ?>" height="30" width="30" >
            </div>
          </li>
        </ul>
      </li>
</ul>
 <div class="footer-fixtures">
       WeBall 2017 ® All rights reserved 
 </div>
      
<style>
    
ul {
  display:flex;
  justify-content:space-around;
  width:100%;
}
ul, li {
  padding:0;
  margin:0;
  flex:1;
}
li {
  display:block;
  text-align:center;
  margin:0 ;
  position:relative;
}
li span {
  border:solid 1px;
}
li {
  height:1.2em;
  margin-top:1.2em;
}
li +  li:before {
  content:'';
  position:absolute;
  width:100%;
  height:1.25em;
  border:solid 1px;
  border-bottom:0;
  left:-50%;
  bottom:1.15em;
}
.footer-fixtures {
    text-decoration: none;
    bottom:0;
    position:fixed;
    margin-left:37.5%;
    font-size: 24px;
}
</style
  