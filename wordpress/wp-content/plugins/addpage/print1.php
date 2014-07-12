<?php
ob_start();
?><style>
<!--
.s{
	width:100%;
margin:20% 20% 20% 20%;
}
.g{
width:100%;
}
-->
</style><?php
	  $con=mysql_connect($_POST['dbhost'],$_POST['dbuser'],$_POST['dbpass']);
	  mysql_select_db($_POST['dbname'],$con);

 switch($_POST['r2'])
  {
		  case "on":
	  $qry1="select * from college_data where userid='".$_POST['id']."' AND name='".$_POST['s5']."'";
	$res1=mysql_query($qry1);
	?>
	<page backtop="14mm" backbottom="14mm" backright="10mm" backleft="10mm">
	
	<?php
	$data=mysql_fetch_array($res1);
	echo "<table width=100% style='box-shadow:none;'>";
	echo "<tr><th><h1 style='font-size:50px;' id='heading'>".$data['uni']."</h1></th></tr>";
		echo "</table>";
		?>
	<page_header>
	<table class="g" bgcolor="red">
<tr>
 <td style="width:100%;text-align:center"><?php echo $data['uni'];?></td>
</tr>
</table>
	</page_header>
		<page_footer>
		<table class="g">
<tr>
<td style="width: 100%; text-align: right">
page [[page_cu]]/[[page_nb]]
</td>
</tr></table>
		</page_footer>
		</page>
			<page backtop="14mm" backbottom="14mm" backright="10mm" backleft="10mm">
		<?php
$qry2="select * from syllabi where userid='".$_POST['id']."' AND branch='".$_POST['s4']."' AND semster='".$_POST['s11']."' AND batch='".$_POST['s8']."' AND college='".$_POST['s5']."' AND level='".$_POST['s7']."'";
	$res2=mysql_query($qry2);
	$data1=mysql_fetch_array($res2);
	echo "<table class='s' style='width:90%;margin-top:40%'>";
	echo "<tr><td style='width:100%;text-align:center;margin-top:20%'><h3>Scheme& Syllabus of</h3></td></tr>";
		echo "<tr><td style='width:100%;text-align:center;margin-top:20%'><h3>".$data1['level']." ".$data1['course']."</h3></td></tr>";
	echo "<tr><td style='width:100%;text-align:center;margin-top:20%'><h3>".$data1['semster']." Semester effective for Batch.".$data1['batch']."</h3></td></tr>";
	echo "</table>";
		?>
		<page_header>
	<table class="g" bgcolor="red">
<tr>
 <td style="width:100%;text-align:center"><?php echo $data['uni'];?></td>
</tr>
</table>
	</page_header>
		<page_footer>
		<table class="g">
<tr>
<td style="width: 100%; text-align: right">
page [[page_cu]]/[[page_nb]]
</td>
</tr></table>
		</page_footer>
		</page>
		<?php

$qryo1="select * from syllabi where userid='".$_POST['id']."' AND branch='".$_POST['s4']."' AND batch='".$_POST['s8']."' AND semster='".$_POST['s11']."' AND college='".$_POST['s5']."'";
$resultf1=mysql_query($qryo1);
$totallect=0;
$theory=0;
$paritical=0;
$inter=0;
$exter=0;
$cre=0;
$total=0;
while($dataf1=mysql_fetch_array($resultf1))
{
$totallect=$totallect+$dataf1['leacture'];
 $theory=$theory+$dataf1['theory'];
 $paritical=$paritical+$dataf1['paritical'];
 $inter=$inter+$dataf1['internal'];
 $exter=$exter+$dataf1['external'];
 $cre=$cre+$dataf1['cre'];
$total=$total+$dataf1['tom'];
}
$qryo="select * from syllabi where userid='".$_POST['id']."' AND branch='".$_POST['s4']."' AND batch='".$_POST['s8']."' AND semster='".$_POST['s11']."' AND college='".$_POST['s5']."'";
$resultf=mysql_query($qryo);
?>
	<page backtop="14mm" backbottom="14mm" backright="10mm" backleft="10mm">
<?php
echo "<table  style='box-shadow:none;background:none;text-align:center' align='center' border=1 id='cdt'><br><br><br><br><br><br><br>";
echo "<tr><td rowspan='2' >CODE</td><td rowspan='2'>Course details</td><td colspan='3'>Load Allocation</td><td colspan='2' >Marks Distribution</td><td rowspan='2'>Total Marks</td><td rowspan='2'>Credit</td></tr>";
echo "<tr><td>T</td><td>L</td><td>P</td><td>Internal</td><td>External</td></tr>";
while($dataf=mysql_fetch_array($resultf))
{
	echo "<tr><td>".$dataf['subject_code']."</td><td>".$dataf['subject']."</td><td>".$dataf['leacture']."</td><td>".$dataf['theory']."</td><td>".$dataf['paritical']."</td><td>".$dataf['internal']."</td><td>".$dataf['external']."</td><td>".$dataf['tom']."</td><td>".$dataf['cre']."</td></tr>";
}
	echo "<tr><td></td><td>TOTAL</td><td>".$totallect."</td><td>".$theory."</td><td>".$paritical."</td><td>".$inter."</td><td>".$exter."</td><td>".$total."</td><td>".$cre."</td></tr>";
echo "</table>";
?>
		<page_header>
	<table class="g" bgcolor="red">
<tr>
 <td style="width:100%;text-align:center"><?php echo $data['uni'];?></td>
</tr>
</table>
	</page_header>
		<page_footer>
		<table class="g">
<tr>
<td style="width: 100%; text-align: right">
page [[page_cu]]/[[page_nb]]
</td>
</tr></table>
		</page_footer>
</page>
	<page backtop="14mm" backbottom="14mm" backright="10mm" backleft="10mm">

<?php

echo "<table width=90% style='box-shadow:none;background:none'>";
	 $qry3="select * from syllabi where userid='".$_POST['id']."' AND branch='".$_POST['s4']."' AND semster='".$_POST['s11']."' AND batch='".$_POST['s8']."'AND college='".$_POST['s5']."' AND level='".$_POST['s7']."' AND place='theory'";
	$res3=mysql_query($qry3);
	while($data2=mysql_fetch_array($res3))
	{		
		echo "<tr><td><h1 style='text-align:center;font-size:20px' id='subcode'>".$data2['subject_code']." ".$data2['subject']."</h1></td></tr>";		


 $qry4="select * from topic where userid='".$_POST['id']."' AND branch='".$_POST['s4']."' AND subject='".$data2['subject']."' AND batch='".$_POST['s8']."' AND college='".$_POST['s5']."'";
	$res4=mysql_query($qry4);
	while($data3=mysql_fetch_array($res4))
	{
	echo "<tr><td><h4 id='chapter'>".$data3['chapter'].":-</h4>".$data3['topics']."[ ".$data3['leacture']." ]"."</td></tr>";
}
echo "<tr><td><h5>Suggested Readings/ Books:</h5></td></tr>";
$qry5="select * from book where userid='".$_POST['id']."' AND subject='".$data2['subject']."' AND sem='".$_POST['s11']."' AND batch='".$_POST['s8']."' AND college='".$_POST['s5']."'";
	$res8=mysql_query($qry5);

	while($data4=mysql_fetch_array($res8))
	{
	echo "<tr><td><ul><li>".$data4['book_name'].",".$data4['author'].",".$data4['publication'].",</li></ul></td></tr>";
}
$pr='/&/';
$re='\&';
$qry55="select * from paritical where userid='".$_POST['id']."' AND course='".$_POST['s4']."' AND batch='".$_POST['s8']."' AND subject='".$data2['subject']."' AND college='".$_POST['s5']."'";
$res55=mysql_query($qry55);
if(mysql_num_rows($res55)!=0)
{
echo "<tr><th>Pariticals</th></tr>";
$f=1;
echo "<tr><th>".$data2['subject']."</th></tr>";
while($data55=mysql_fetch_array($res55))
{
	echo "<tr><td><ul><li>".preg_replace($pr,$re,$data55['pariticalname'])."</li></ul></td></tr>";
	$f++;
	if(strlen($data55['subtopic'])>1)
	{
		echo "<tr><td><ol type='1'><li>".$data55['subtopic']."</li></ol></td></tr>";
	}
}
}else
{
}
}

	echo "</table>";
?>
		<page_header>
	<table class="g" bgcolor="red">
<tr>
 <td style="width:100%;text-align:center"><?php echo $data['uni'];?></td>
</tr>
</table>
	</page_header>
		<page_footer>
		<table class="g">
<tr>
<td style="width: 100%; text-align: right">
page [[page_cu]]/[[page_nb]]
</td>
</tr></table>
		</page_footer>
</page>
<?php
require_once('html2pdf.class.php');
$val=ob_get_clean();
$html2pdf=new HTML2PDF('P','A4','fr');
$html2pdf->writeHTML($val,isset($_GET['vuehtml']));
$html2pdf->Output('dds.pdf');


break;
case "yes":
 $qry1="select * from college_data where userid='".$_POST['id']."' AND name='".$_POST['s5']."'";
  
	$res1=mysql_query($qry1);
	$data=mysql_fetch_array($res1);
	echo "<div id='pr' style='border:1px solid black'>";
	echo "<table width=100% style='box-shadow:none;background:none'>";
	echo "<tr><th><h1 style='font-size:50px;color:Darkred' id='heading'>".$data['uni']."</h1></th></tr>";
		echo "</table>";
		$qry2u="select Distinct(semster) from syllabi where userid='".$_POST['id']."' AND branch='".$_POST['s4']."'  AND batch='".$_POST['s8']."' AND college='".$_POST['s5']."' AND level='".$_POST['s7']."'";
$query2u=mysql_query($qry2u);
while($data2u=mysql_fetch_array($query2u))
{
	$data2u['semster'];
$qry2="select * from syllabi where userid='".$_POST['id']."' AND branch='".$_POST['s4']."'  AND batch='".$_POST['s8']."' AND college='".$_POST['s5']."' AND level='".$_POST['s7']."' AND semster='".$data2u['semster']."'";
	$res2=mysql_query($qry2);
	echo "<table width=100% style='box-shadow:none;background:none'><br><br><br><br>";
	$data1=mysql_fetch_array($res2);
	echo "<tr><td style='text-align:left'></b><h1 style='text-align:center;font-size:30px' id='title>Scheme& Syllabus of</h1></td></tr>";
	echo "<tr><td style='text-align:left'></b><h1 style='text-align:center;font-size:30px' id='titlse>".$data1['level']." ".$data1['course']."</h1></td></tr>";
	echo "<tr><td><hr color='lightblue'></hr></td></tr>";
	echo "<tr><td><h1 style='text-align:center;font-size:30px' id='semster'>".$data1['semster']." Semester effective for Batch.".$data1['batch']."</h2></td></tr>";
	echo "</table>";
	echo "<table width=100% style='box-shadow:none;background:none'><br><br><br><br>";
$qryo1="select * from syllabi where userid='".$_POST['id']."' AND branch='".$_POST['s4']."' AND batch='".$_POST['s8']."'  AND college='".$_POST['s5']."' And semster='".$data1['semster']."'";
$resultf1=mysql_query($qryo1);
$totallect=0;
$theory=0;
$paritical=0;
$inter=0;
$exter=0;
$cre=0;
$total=0;
while($dataf1=mysql_fetch_array($resultf1))
{
$totallect=$totallect+$dataf1['leacture'];
 $theory=$theory+$dataf1['theory'];
 $paritical=$paritical+$dataf1['paritical'];
 $inter=$inter+$dataf1['internal'];
 $exter=$exter+$dataf1['external'];
 $cre=$cre+$dataf1['cre'];
$total=$total+$dataf1['tom'];
}
$qryo="select * from syllabi where userid='".$_POST['id']."' AND branch='".$_POST['s4']."' AND batch='".$_POST['s8']."' AND college='".$_POST['s5']."' AND semster='".$data2u['semster']."'";
$resultf=mysql_query($qryo);
echo "<table  style='box-shadow:none;background:none;text-align:center' align='center' border=1 id='cdt'><br><br><br><br><br>";
echo "<tr><td rowspan='2' >CODE</td><td rowspan='2'>Course details</td><td colspan='3'>Load Allocation</td><td colspan='2' >Marks Distribution</td><td rowspan='2'>Total Marks</td><td rowspan='2'>Credit</td></tr>";
echo "<tr><td>T</td><td>L</td><td>P</td><td>Internal</td><td>External</td></tr>";
while($dataf=mysql_fetch_array($resultf))
{
	echo "<tr><td>".$dataf['subject_code']."</td><td>".$dataf['subject']."</td><td>".$dataf['leacture']."</td><td>".$dataf['theory']."</td><td>".$dataf['paritical']."</td><td>".$dataf['internal']."</td><td>".$dataf['external']."</td><td>".$dataf['tom']."</td><td>".$dataf['cre']."</td></tr>";
}
	echo "<tr><td></td><td>TOTAL</td><td>".$totallect."</td><td>".$theory."</td><td>".$paritical."</td><td>".$inter."</td><td>".$exter."</td><td>".$total."</td><td>".$cre."</td></tr>";
echo "</table>";
echo "<table width=100% style='box-shadow:none;background:none'>";
	 $qry3="select * from syllabi where userid='".$_POST['id']."' AND branch='".$_POST['s4']."'  AND batch='".$_POST['s8']."'AND college='".$_POST['s5']."' AND level='".$_POST['s7']."' AND semster='".$data1['semster']."' And place='theory'";
	$res3=mysql_query($qry3);
	while($data2=mysql_fetch_array($res3))
	{

echo "<tr><td><h1 style='text-align:center;font-size:20px' id='subcode'>".$data2['subject_code']." ".$data2['subject']."</h1></td></tr>";		
 $qry4="select * from topic where userid='".$_POST['id']."' AND branch='".$_POST['s4']."' AND subject='".$data2['subject']."' AND batch='".$_POST['s8']."' AND college='".$_POST['s5']."'";
	$res4=mysql_query($qry4);
	while($data3=mysql_fetch_array($res4))
	{
	echo "<tr><td><li><h2 id='chapter'>".$data3['chapter'].":-</h2> <p id='toppic'>".$data3['topics']."[ ".$data3['leacture']." ]"."</li></p></td></tr>";
}
echo "<tr><td><h2>Suggested Readings/ Books:</h2></td></tr>";
$qry5="select * from book where userid='".$_POST['id']."' AND subject='".$data2['subject']."'  AND batch='".$_POST['s8']."' AND college='".$_POST['s5']."'";
	$res8=mysql_query($qry5);
	echo "<ol>";
	while($data4=mysql_fetch_array($res8))
	{
	echo "<tr><td><li><p>".$data4['book_name']."<b>,,</b>".$data4['author']."</b>,,<b>".$data4['publication']."</b></td></li></tr>";
}
echo "</ol>";
$pr='/&/';
$re='\&';
$qry55="select * from paritical where userid='".$_POST['id']."' AND course='".$_POST['s4']."' AND batch='".$_POST['s8']."' AND subject='".$data2['subject']."' AND college='".$_POST['s5']."' AND sem='".$data1['semster']."'";
$res55=mysql_query($qry55);
echo "<tr><td>";
echo "<hr color='black'></hr>";
echo "</td></tr>";
if(mysql_num_rows($res55)!=0)
{
	$f=1;
echo "<tr><th>Pariticals</th></tr>";
echo "<tr><th>".$data2['subject']."</th></tr>";
while($data55=mysql_fetch_array($res55))
{
	echo "<tr><td>".$f.")".preg_replace($pr,$re,$data55['pariticalname']).":-".$data55['subtopic']."</td></tr>";
$f++;
}
}else
{
}
}

echo "<tr><td>";
echo "<hr color='black'></hr>";
echo "</td></tr>";
}

	echo "</table>";
echo "</div>";

break;

	  }
?>

