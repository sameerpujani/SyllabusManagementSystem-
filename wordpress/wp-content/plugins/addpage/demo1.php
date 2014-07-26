<?php	
function ok()
{
	echo "<h1>Ok Parctical Is Added</h1>";
}

$con=mysql_connect($_POST['dbhost'],$_POST['dbuser'],$_POST['dbpassword']);
mysql_select_db($_POST['dbname'], $con);
$wpdb = $_POST['wpdb'];


/* Add User - Level -> Branch */
if(isset($_POST['course_level']))
{
$current_user = $_POST['current_user'];

$qry = "SELECT `".$wpdb."selectedbranch`.`branch`, `".$wpdb."branches`.`subbranch` FROM `".$wpdb."selectedbranch`, `".$wpdb."branches` WHERE `".$wpdb."selectedbranch`.`userid`='".$current_user."' AND `".$wpdb."selectedbranch`.`level`='".$_POST['course_level']."' AND `".$wpdb."selectedbranch`.`branch`=`".$wpdb."branches`.`id`  ";
$select_branch = mysql_query($qry);
echo "<select required name='branch_id'><option value=''></option>";
while($branch = mysql_fetch_array($select_branch))
{
 echo "<option value='".$branch['branch']."'>".$branch['subbranch']."</option>";
}
echo "</select>";
}

/* Assign Courses - which to users by checkboxes */
if(isset($_POST['course_levelAs']))
{
	$current_user = $_POST['current_user'];

	//	echo $sql_level = "SELECT `".$wpdb."selectedbranch`.`id`, `".$wpdb."selectedbranch`.`level` FROM `".$wpdb."branch_users`, `".$wpdb."selectedbranch` WHERE `".$wpdb."selectedbranch`.`userid`='".$current_user."' AND `".$wpdb."branch_users`.`user_id`=`".$wpdb."selectedbranch`.`userid` AND `".$wpdb."branch_users`.`branch_id`=`".$wpdb."selectedbranch`.`id` AND `".$wpdb."selectedbranch`.`level`='".$_POST['course_levelAs']."'  ";

	//	echo $sql_branch = "SELECT `".$wpdb."branches`.`subbranch`, `".$wpdb."selectedbranch`.`id` FROM `".$wpdb."branch_users`, `".$wpdb."selectedbranch`, `".$wpdb."branches` WHERE `".$wpdb."selectedbranch`.`userid` = '".$current_user."' AND `".$wpdb."selectedbranch`.`level`='".$_POST['course_levelAs']."' AND `".$wpdb."branch_users`.`user_id` = `".$wpdb."selectedbranch`.`userid` AND `".$wpdb."selectedbranch`.`id` <> `".$wpdb."branch_users`.`branch_id` AND `".$wpdb."selectedbranch`.`branch` = `".$wpdb."branches`.`id`  ";

	$sql_branch = "SELECT  `".$wpdb."selectedbranch`.`id`, `".$wpdb."branches`.`subbranch` FROM `".$wpdb."selectedbranch`, `".$wpdb."branches` WHERE `".$wpdb."selectedbranch`.`userid` = '".$current_user."' AND `".$wpdb."selectedbranch`.`branch` = `".$wpdb."branches`.`id` AND `".$wpdb."selectedbranch`.`level` = '".$_POST['course_levelAs']."' AND ( `".$wpdb."selectedbranch`.`id` ) NOT IN ( SELECT `".$wpdb."branch_users`.`branch_id` FROM `".$wpdb."branch_users` WHERE `".$wpdb."branch_users`.`user_id` = '".$current_user."' )";

$branches = mysql_query($sql_branch);
if(mysql_num_rows($branches) == 0)
{
	echo "Please select any course";
}
else
{
	echo "<table width=100% border='1' class='widefat'>";
	$i=1;
	echo "<input type='hidden' name='row' value='".mysql_num_rows($branches)."'>";
	while($data=mysql_fetch_array($branches))
	{
   		$f='branchId'.$i;
		echo "<tr><td><input type='checkbox' name='".$f."' id='".$f."' value='".$data['id']."'><td>".$data['subbranch']."</td></tr>";
		$i++;
	}
	echo "</table>";
}
}

/* ASSIGN COURSES - To New Users New Form */
if(isset($_POST['userID']))
{
?>
	<script src='jquery.js'></script>
	<script>
	$(document).ready(function()
{
	var $count_boxes = $("table.delete-assigned-courses tr td input[type='checkbox']");
	var total = $count_boxes.length;
	$("#hidden-checkboxes").val(total);

	$count_boxes.change(function(){
		var count_checked = $count_boxes.filter(':checked').length;
		$("#hidden-checked-checkboxes").val(count_checked);
	});
});
	</script>

<?php
/*	if(isset($_POST['delete_assigned']))
	{
		echo "<script> alert('g'); </script>";
	}*/
	$delete = 1;
	$current_user = $_POST['current_user'];
	$sql_assign = "SELECT `".$wpdb."branch_users`.`id`, `".$wpdb."selectedbranch`.`level`, `".$wpdb."branches`.`subbranch` FROM `".$wpdb."branch_users`, `".$wpdb."selectedbranch`, `".$wpdb."branches` WHERE `".$wpdb."branch_users`.`user_id` = '".$current_user."' AND `".$wpdb."branch_users`.`user_id` = `".$wpdb."selectedbranch`.`userid` AND `".$wpdb."branch_users`.`allot_user_id` = '".$_POST['userID']."' AND `".$wpdb."branch_users`.`branch_id` = `".$wpdb."selectedbranch`.`id` AND `".$wpdb."selectedbranch`.`branch` = `".$wpdb."branches`.`id` ORDER BY `".$wpdb."selectedbranch`.`level`  ";
	$assign_branch = mysql_query($sql_assign);

	if(mysql_num_rows($assign_branch) == 0)
	{
		echo "<table width=100% class='widefat'><tr><th>Please Select any <strong>Username</strong></th></tr></table>";
	}
	else
	{
	echo "<table width=100% class='widefat delete-assigned-courses'>";
		echo "<tr><th><input type='submit' name='delete_assigned' value='Delete' class='button button-primary button-large'></th><th>Course Level</th><th>Branches</th></tr>";
	while($courses = mysql_fetch_array($assign_branch))
	{
		echo "<tr><td><input type='checkbox' name='delete".$delete."' id = 'delete".$delete."' value='".$courses['id']."' ></td><td>".$courses['level']."</td><td>".$courses['subbranch']."</td></tr>";
		$delete++;
	}
		echo "<tr><th><input type='submit' name='delete_assigned' value='Delete' class='button button-primary button-large'></th><th>Course Level</th><th>Branches</th></tr>";
	echo "</table>";
	echo "Checked <input type='text' value='0' name='checked' disabled id='hidden-checked-checkboxes' size='3'>";
	echo "Total <input type='text' value='0' name='total' id='hidden-checkboxes' size='3'>";
	}
}

/* Make Syllabus - Add Courses By University Admin */
if(isset($_POST['s1']))
{ 
$qry="SELECT * FROM `".$wpdb."branches` WHERE `name`='".$_POST['s1']."'";
$re=mysql_query($qry);
if(mysql_num_rows($re) == 0)
{
echo "Please select any course";
}
else
{
echo "<table width=100% border='1' style='background:none'>";
$i=1;
echo "<input type='hidden' name='row' value='".mysql_num_rows($re)."'>";
while($data=mysql_fetch_array($re))
{
	$f='hello'.$i;
echo "<tr><td><input type='checkbox' name='".$f."' id='".$f."' value='".$data['subbranch']."'><td>".$data['subbranch']."</td></tr>";
$i++;
}
echo "</table>";
}
}
if(isset($_GET['mode']))
{
if($_GET['mode']=="level")
{
$qry2="select distinct(branch) from `".$wpdb."selectedbranch` where college='".$_POST['s2']."' AND level='".$_POST['s3']."'";	
$re1=mysql_query($qry2);

echo "<select name='s4'>";
if(isset($_POST['s4'])){
	echo "<option>".$_POST['s4']."</option>";	
}
while($dataa=mysql_fetch_array($re1))
{
	echo "<option>".$dataa['branch']."</option>";	
}
echo "</select>";
}
elseif($_GET['mode']=="referbookau")
{
echo "<table>";
$qry="select * from books where `".$wpdb."author`='".$_POST['s5']."'";
$res=mysql_query($qry);
$c=1;
echo "<input type='hidden' name='arow' value='".mysql_num_rows($res)."'>";
echo "<tr><th>Author</th><th>Book</th><th>Publisher</th><th>Year</th><th>ISBN</th><th>Pages</th></tr>";
while($data6=mysql_fetch_assoc($res))
{
	echo "<tr><td><input type='checkbox' name='c$c' value='".$data6['id']."'>".$data6['author']."</td><td>".$data6['title']."</td><td>".$data6['publisher']."</td><td>".$data6['year']."</td><td>".$data6['isbn']."</td><td>".$data6['pages']."</td></tr>";
$c++;
}
echo "</table>";
}
elseif($_GET['mode']=="referbooks")
{
$qry2="select distinct(subject) from `".$wpdb."syllabi` where college='".$_POST['s5']."' AND level='".$_POST['s4']."' AND branch='".$_POST['s6']."'";	
$re1=mysql_query($qry2);

echo "<select name='s7'>";

while($dataa=mysql_fetch_array($re1))
{
	echo "<option>".$dataa['subject']."</option>";	
}
echo "</select>";
}
elseif($_GET['mode']=="topic")
{
$qry2="select distinct(subject) from `".$wpdb."syllabi` where college='".$_POST['s5']."' AND level='".$_POST['s4']."' AND branch='".$_POST['s6']."' AND semster='".$_POST['s7']."'";	
$re1=mysql_query($qry2);

echo "<select name='s7'>";

while($dataa=mysql_fetch_array($re1))
{
	echo "<option>".$dataa['subject']."</option>";	
}
echo "</select>";

}
elseif($_GET['mode']=="viewtopic")
{
$qry2="select distinct(subject) from `".$wpdb."syllabi` where college='".$_POST['s5']."' AND level='".$_POST['s7']."' AND branch='".$_POST['s4']."' AND semster='".$_POST['s1']."'";	
$re1=mysql_query($qry2);

echo "<select name='s8'>";

while($dataa=mysql_fetch_array($re1))
{
	echo "<option>".$dataa['subject']."</option>";	
}
echo "</select>";

}
elseif($_GET['mode']=="syllabusupdate")
{
	$qry2="select distinct(batch) from `".$wpdb."syllabi` where college='".$_POST['s5']."' AND branch='".$_POST['s6']."' AND level='".$_POST['s4']."' AND semster='".$_POST['s11']."'";	
$re1=mysql_query($qry2);

echo "<select name='s8'>";

while($dataa=mysql_fetch_array($re1))
{
	echo "<option>".$dataa['batch']."</option>";	
}
echo "</select>";

}
elseif($_GET['mode']=="particaly")
{
				$qry1="select * from `".$wpdb."paritical` where college='".$_POST['s5']."' AND level='".$_POST['s6']."' AND course='".$_POST['s4']."' AND batch='".$_POST['s8']."' AND sem='".$_POST['s9']."' AND subject='".$_POST['s10']."'";
				$res1=mysql_query($qry1);
				echo "<table>";
echo "<form action='?page=showp' method='post'>";

				echo "<tr><th>NAME</th><th>Subtopic</th></tn><th>Option</th></tr>";
				while($datf=mysql_fetch_array($res1))
				{
					echo "<tr><td><input type='radio' name='r' value='".$datf['id']."'>".$datf['pariticalname']."</td><td>".$datf['subtopic']."<td><input type='submit' name='del' value='delete'></td></tr>";
				}
				echo "</form></table>";
}
elseif($_GET['mode']=="preview")
{
$qry2="select distinct(batch) from `".$wpdb."syllabi` where college='".$_POST['s5']."' AND level='".$_POST['s7']."' AND branch='".$_POST['s4']."' AND semster='".$_POST['s1']."'";	
$re1=mysql_query($qry2);

echo "<select name='s8'>";

while($dataa=mysql_fetch_array($re1))
{
	echo "<option>".$dataa['batch']."</option>";	
}
echo "</select>";
	
}
elseif($_GET['mode']=="sem")
{
$qry2="select distinct(semster) from `".$wpdb."syllabi` where college='".$_POST['s5']."' AND level='".$_POST['s6']."' AND branch='".$_POST['s4']."' AND batch='".$_POST['s8']."' AND place='theory'";
$re1=mysql_query($qry2);
echo "<select name='s9' id='semo'><option value=''>---</option>";
while($dataa=mysql_fetch_array($re1))
{
	echo "<option>".$dataa['semster']."</option>";	
}
echo "</select>";
}
elseif($_GET['mode']=="subject")
{
	$qry2="select distinct(subject) from `".$wpdb."syllabi` where college='".$_POST['s5']."' AND level='".$_POST['s6']."' AND branch='".$_POST['s4']."' AND batch='".$_POST['s8']."' AND semster='".$_POST['s9']."' AND place='theory'";	
$re1=mysql_query($qry2);
echo "<select name='s10' id='sujj'><option value=''>---</option>";
while($dataa=mysql_fetch_array($re1))
{
	echo "<option>".$dataa['subject']."</option>";
}
echo "</select>";
}
elseif($_GET['mode']=="addpartical")
{
if(strlen($_POST['s8'])>1)
{
	if(strlen($_POST['s9'])>0)
	{
		if(strlen($_POST['s10'])>1)
		{
			if(strlen($_POST['t1'])>1)
			{
				$qry1="select * from `".$wpdb."paritical` where college='".$_POST['s5']."' AND level='".$_POST['s6']."' AND course='".$_POST['s4']."' AND batch='".$_POST['s8']."' AND sem='".$_POST['s9']."' AND subject='".$_POST['s10']."' AND pariticalname='".$_POST['t1']."'";
				$res1=mysql_query($qry1);
				if(mysql_num_rows($res1)==0)
				{
					echo $_POST['v'];
					if(strlen($_POST['v'])>0){
						for($i=0;$i<=$_POST['v'];$i++){
 $qry2="insert into paritical values('".$_POST['s5']."','".$_POST['s6']."','".$_POST['s4']."','".$_POST['s8']."','".$_POST['s10']."','".$_POST['s9']."','".$_POST['obj']."','".$_POST['t1']."','".$_POST['v'.$i]."','0','".$_POST['id']."','Paritical')";	
$re1=mysql_query($qry2);
}
}
ok("OK PARITICAL IS ADDED");
}else
{
		echo "<h1>This Record Is Already Added</h1>";
}
}
else
{
		echo "<h1>Please Enter The Paritical</h1>";
}
}
else
{
		echo "<h1>Please Enter The Subject</h1>";
}
}
else
{
		echo "<h1>Please Enter The Semester</h1>";
}
}
}else
{
	echo "<h1>Please Add Batch</h1>";
}

}

?>
