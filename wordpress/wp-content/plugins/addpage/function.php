<?php
global $wpdb;
function about() //this function used for admin side .this plugin show all instruction to admin.
{
	echo "<h1>instruction</h1>";
	echo "<p>Basically this plugin provide The to user to create syllabus. Some instruction here for admin</p>";
	echo "<ol>";
	echo "<li>Active the plugin</li>";
	echo "<li>Click on settings</li>";
echo "<li>Click on general settings</li>";
echo "<li>Select membership option for other users</li>";
echo "<li>set New user default role as Subscriber</li>";
echo "<li>now this plugin is ready  for users</li>";
	echo "</ol>";
	}

function adduser($g,$b,$c,$d,$e)
{
global $wpdb;
?>
	<script>
	$(document).ready(function(){
$(document).tooltip();
			$("#course_level").click(function(){
		var dbname="<?php echo $b; ?>";
				var dbuser="<?php echo $c; ?>";
				var dbpassword="<?php echo $d; ?>";
				var dbhost="<?php echo $e; ?>";
				var wpdb = "<?php echo $wpdb->prefix; ?>";
				var current_user = "<?php echo $g ?>";
		$.post('<?php echo home_url();?>/wp-content/plugins/addpage/demo1.php',{dbname:dbname,dbuser:dbuser,dbpassword:dbpassword,dbhost:dbhost,course_level:$("#course_level").val(),wpdb:wpdb,current_user:current_user},function(data){$("#branches_assign").html(data)});
		});
		$("#course_level").blur(function(){
		var dbname="<?php echo $b; ?>";
				var dbuser="<?php echo $c; ?>";
				var dbpassword="<?php echo $d; ?>";
				var dbhost="<?php echo $e; ?>";
				var wpdb = "<?php echo $wpdb->prefix; ?>";
				var current_user = "<?php echo $g ?>";
		$.post('<?php echo home_url();?>/wp-content/plugins/addpage/demo1.php',{dbname:dbname,dbuser:dbuser,dbpassword:dbpassword,dbhost:dbhost,course_level:$("#course_level").val(),wpdb:wpdb,current_user:current_user},function(data){$("#branches_assign").html(data)});
		});
		});
	</script>

<?php
 $title = __('Add New User'); 
if($_SERVER["REQUEST_METHOD"] == "POST")
{
 $timestamp = date('Y-m-d H:i:s');
 $insert = mysql_query("INSERT INTO `".$wpdb->prefix."users` VALUES('0', '".$_POST['username']."', '".MD5($_POST['password'])."', '".$_POST['username']."', '".$_POST['email']."', '".$_POST['website']."', '".$timestamp."', '', '', '".$_POST['first_name']." ".$_POST['last_name']."') ");
}
?>

<form action="admin.php?page=adduser" method="post">
<table class="form-table">
<tr><th>Usename*</th><td><input required type="text" name="username" /></td></tr>
<tr><th>E-mail*</th><td><input required type="text" name="email" /></td></tr>
<tr><th>First Name</th><td><input type="text" name="first_name" /></td></tr>
<tr><th>Last Name</th><td><input type="text" name="last_name" /></td></tr>
<tr><th>Website</th><td><input type="text" name="website" /></td></tr>
<tr><th>Password*</th><td><input required type="password" name="password" autocomplete="off" /></td></tr>
<tr><th>Repeat Password*</th><td><input required type="password" name="repeat_password"  autocomplete="off" /></td></tr>
<tr><th>Send Password?</th><td><input type="checkbox" name="website" > &nbsp;&nbsp;&nbsp;Send this password to the new user by email.</td></tr>
<tr><th>Course Level</th><td><select name='course_level' id='course_level'><option value=''></option>
<?php
$qry_course = mysql_query("SELECT DISTINCT(`level`)  FROM `".$wpdb->prefix."selectedbranch` WHERE `userid`='".$g."' ORDER BY `level` ASC  ");
while($course_level = mysql_fetch_array($qry_course))
{
echo "<option value='".$course_level['level']."'>".$course_level['level']."</option>";
}
?></select></td></tr>
<tr><th>Branches Assign </th><td><div id='branches_assign'></div></td></tr> <!--<select><option value=''></option></select>-->
<tr><td></td><td><input type="submit" name="submit" class="button button-primary button-large" value="Add New User" ></td></tr>
</table>

</form>

<?php
}

function theme($user) //this function is used for theme dispaly and store the all information about selected theme in database.
{
	if(isset($_GET['active']))
	{
		$aa=$_GET['active'].".jpg";
	$qry="insert into `".$wpdb->prefix."selecttheme` values('".$user."','".$aa."')";
	$result1=mysql_query($qry);
	echo "<h1>THEME IS SELECTED</h1>";
}
	$qry1="select * from ".$wpdb->prefix."selecttheme";
	$res1=mysql_query($qry1);
	$cout1=0;
	while($data1=mysql_fetch_array($res1))
	{
		$b[$cout1]=$data1['theme'];
		$cout1++;
	}
	$qry2="select * from ".$wpdb->prefix."selecttheme where user='".$user."'";
	$res2=mysql_query($qry2);
	$data2=mysql_fetch_array($res2);	
	echo $row2=mysql_num_rows($res2);
	if($row2!=0)
	{
?>

<table width=100%>
	<tr>
		<td>
			<div id="theme1">
				<img src="<?php echo plugins_url();?>/addpage/images/<?php echo $data2['theme']; ?>" width=200 height=200>
				<div id="mask">
					<h1>YOUR THEME</h1>
					</div>
					</div>
					</td></tr></table>
					<?php
				}else
				{?>
<table width=100%>
	<tr>

		<td>
			<div id="theme1">
				<img src="<?php echo plugins_url();?>/addpage/images/ptu.jpg">
				<div id="mask">
					<h1>PTU</h1>
					<p><a href="admin.php?page=Theme&active=ptu">ACTIVE</a></p>
					</div>
					</div>
					</td>
					<td width=10em></td>
					<td>
						
			<div id="theme2">
				<img src="<?php echo plugins_url();?>/addpage/images/iitr.jpg" width=200 height=200>
				<div id="mask">
					<h1>IIT ROORKE</h1>
					<p><a href="admin.php?page=Theme&active=iitr">ACTIVE</a></p>
					</div>
					</div>
						
						<td width=10em></td>
					<td>
			<div id="theme3">
				<img src="<?php echo plugins_url();?>/addpage/images/pun.jpg" width=200 height=200>
				<div id="mask">
					<h1>PUNJABI UNIVERSITY</h1>
					<p><a href="admin.php?page=Theme&active=pun">ACTIVE</a></p>
					</div>
					</div>
					</td>
					</tr>
					<tr>
						<td>
						</td>
						</tr>
					</table>
												</div>

<?php
}
}
/*
function make_syllabus($g,$b,$c,$d,$e) //this function gave the help to make the syllabus and store the all syllabus related data in database.
{ global $wpdb;
	?>

	<script>
	$(document).ready(function(){
$(document).tooltip();
			$("#course").click(function(){

		var dbname="<?php echo $b; ?>";
				var dbuser="<?php echo $c; ?>";
				var dbpassword="<?php echo $d; ?>";
				var dbhost="<?php echo $e; ?>";
				var wpdb = "<?php echo $wpdb->prefix; ?>"
		$.post('<?php echo home_url();?>/wp-content/plugins/addpage/demo1.php',{dbname:dbname,dbuser:dbuser,dbpassword:dbpassword,dbhost:dbhost,s1:$("#course").val(),wpdb:wpdb},function(data){$("#branch").html(data)});
		})
		$("#course").blur(function(){
		var dbname="<?php echo $b; ?>";
				var dbuser="<?php echo $c; ?>";
				var dbpassword="<?php echo $d; ?>";
				var dbhost="<?php echo $e; ?>";
		$.post('<?php echo home_url();?>/wp-content/plugins/addpage/demo1.php',{dbname:dbname,dbuser:dbuser,dbpassword:dbpassword,dbhost:dbhost,s1:$("#course").val()},function(data){$("#branch").html(data)});
		});
		$("#op").click(function(){
			window.open('<?php echo home_url();?>/wp-admin/admin.php?page=addbranch','Continue_to_Application',"width=800,height=400");
			})
		});
	</script>
<form action="admin.php?page=makesyllabus" method="post">
<table width="80%">
<?php
//echo home_url()."/wp-content/plugins/addpage/demo1.php<br/>";
echo $qry="select distinct(`name`) from `".$wpdb->prefix."college_data` where  `userid`='".$g."'";
$re=mysql_query($qry);
echo "<tr><td>College</td><td><select name='s2' id='cou'>";
while($data=mysql_fetch_array($re))
{
	echo "<option>".$data['name']."</option>";
}
echo "</td><td></td></tr>";
$qry0="select distinct(name) from ".$wpdb->prefix."branches";
$re0=mysql_query($qry0);
echo "<tr><td>Course</td><td><select name='s1' id='course' title='Course details'><option></option>";
while($data=mysql_fetch_array($re0))
{
	echo "<option value='".$data['name']."'>".$data['name']."</option>";
}
echo "</td><td></td></tr></table>";
echo "<table><tr><td>Course Level</td><td>B.Tech<input type='radio' name='r1' value='B.Tech' title='ok'></td><td>M.Tech<input type='radio' name='r1' value='M.Tech'></td><td>MCA<input type='radio' name='r1' value='MCA'></td><td>BCA<input type='radio' name='r1' value='BCA'></td><td>Diploma<input type='radio' name='r1' value='Diploma'></td></tr>";
echo "</table>";
?>
<div id="branch">Branch</div><div id="branch2"><table><tr><td><input type='submit' value='ADD>>' name="add1"></td></tr><tr><td><input type='submit' value='<<REMOVE' name="remove"></td></tr></table></div><div id="branch1">Branch
<?php
$qry="select * from ".$wpdb->prefix."branches where name='".$_POST['s1']."'";
$re=mysql_query($qry);
$row=mysql_num_rows($re);
$j=1;
if(isset($_POST['add1']))
{
	if(strlen($_POST['r1'])>2)
	{
for($i=1;$i<=$row;$i++)
{
	if(isset($_POST['hello'.$i]))
	{
				$qry="select * from ".$wpdb->prefix."selectedbranch where userid='".$g."' AND college='".$_POST['s2']."' AND level='".$_POST['r1']."'  AND branch='".$_POST['hello'.$i]."'";
$result=mysql_query($qry);
		if(mysql_num_rows($result)!=0)
		{
			
		}else
		{
		$qry2="insert into ".$wpdb->prefix."selectedbranch values('".$g."','".$_POST['s2']."','".$_POST['s1']."','".$_POST['r1']."','0','".$_POST['hello'.$i]."','0')";
		$resu=mysql_query($qry2);
	} 
	}
}
}
else{
//	error("Select The Course level");
$errors->add("Error","There some error");
}
}
if(isset($_POST['remove']))
{
	
for($k=1;$k<=$row;$k++)
{

	if(isset($_POST['delete'.$k]))
	{
		$qury="delete from ".$wpdb->prefix."selectedbranch where id='".$_POST['delete'.$k]."'";
		$result=mysql_query($qury); 
	}
}

}
$f="delete";
$l=1;
		$qry3="select * from ".$wpdb->prefix."selectedbranch where userid='".$g."' AND college='".$_POST['s2']."'";
		$resu1=mysql_query($qry3);
		echo "<table width=100% style='background:none'>";
		while($data2=mysql_fetch_assoc($resu1))
		{
echo "<tr><td><input type='checkbox' name='".$f.$l."' value='".$data2['id']."'><td>".$data2['branch']."</td></tr>";
		$l++;
		}
		echo "</table>";

?></div>
<table>
<tr>
<td>
<a href="#" id="op">Add New Branch,Course,Level</a>
</td>
</tr>
</table>
<h1>YOUR ALL BRANCHES</h1>
<?php	

	$qry3="select * from ".$wpdb->prefix."selectedbranch where userid='".$g."'";
		$resu1=mysql_query($qry3);
		echo "<table width=100% style='background:none'>";
		while($data2=mysql_fetch_assoc($resu1))
		{
echo "<tr><td><input type='checkbox' name='".$f.$l."' value='".$data2['id']."'><td>".$data2['branch']."</td><td>".$data2['college']."</td></tr>";
		$l++;
		}
		echo "</table>";
?>
			</form>
<?php 
}
*/
function make_syllabus($g,$b,$c,$d,$e) //this function gave the help to make the syllabus and store the all syllabus related data in database.
{
global $wpdb;
	?>

	<script>
	$(document).ready(function(){
$(document).tooltip();
			$("#course").click(function(){
		var dbname="<?php echo $b; ?>";
				var dbuser="<?php echo $c; ?>";
				var dbpassword="<?php echo $d; ?>";
				var dbhost="<?php echo $e; ?>";
				var wpdb = "<?php echo $wpdb->prefix; ?>";
		$.post('<?php echo home_url();?>/wp-content/plugins/addpage/demo1.php',{dbname:dbname,dbuser:dbuser,dbpassword:dbpassword,dbhost:dbhost,s1:$("#course").val(),wpdb:wpdb},function(data){$("#branch").html(data)});
		});
		$("#course").blur(function(){
		var dbname="<?php echo $b; ?>";
				var dbuser="<?php echo $c; ?>";
				var dbpassword="<?php echo $d; ?>";
				var dbhost="<?php echo $e; ?>";
				var wpdb = "<?php echo $wpdb->prefix; ?>";
		$.post('<?php echo home_url();?>/wp-content/plugins/addpage/demo1.php',{dbname:dbname,dbuser:dbuser,dbpassword:dbpassword,dbhost:dbhost,s1:$("#course").val(),wpdb:wpdb},function(data){$("#branch").html(data)});
		});
		$("#op").click(function(){
			window.open('<?php echo home_url();?>/wp-admin/admin.php?page=addbranch','Continue_to_Application',"width=800,height=400");
			});
		});
	</script>
<?php 
//echo $g;
$count_insert = 0;
$qry="SELECT DISTINCT(`name`) FROM `".$wpdb->prefix."college_data` WHERE  `userid`='".$g."'";
$re=mysql_query($qry);
$data = mysql_fetch_array($re);

echo "<h1>".$data['name']."</h1>";
?>
<form action="admin.php?page=makesyllabus" method="post">
<table>
<?php
/*$qry="SELECT DISTINCT(`name`) FROM `".$wpdb->prefix."college_data` WHERE  `userid`='".$g."'";
$re=mysql_query($qry);
$data = $mysql_fetch_array($re);*/
echo "<input type='hidden' name='s2' value='".$data['name']."'>";
/*echo "<tr><td>College</td><td><select required name='s2' id='cou'><option value=''></option>";
while($data=mysql_fetch_array($re))
{
	echo "<option>".$data['name']."</option>";
}
echo "</td></tr>";
*/
 $qry="SELECT DISTINCT(`name`) FROM `".$wpdb->prefix."branches`";
$re=mysql_query($qry);
echo "<tr><td>Course</td><td><select name='s1' id='course' title='Course details'><option value=''></option>";
while($data=mysql_fetch_array($re))
{
	echo "<option>".$data['name']."</option>";
}
echo "</td></tr>";
echo "<tr><td>Course Level</td><td><table><tr><td><input type='radio' name='r1' value='B.Tech' />B.Tech</td><td><input type='radio' name='r1' value='M.Tech'>M.Tech</td><td><input type='radio' name='r1' value='MCA'>MCA</td><td><input type='radio' name='r1' value='BCA'>BCA</td><td><input type='radio' name='r1' value='Diploma'>Diploma</td></tr>";
echo "</table></td></tr></table><br/>";
?>
<div id="branch">Branch</div>
<div id="branch2">
<table>
<tr align='center' height='29'><td ><input type='submit' value="ADD >>" name="add1" id="ad" class="button-primary"></td></tr>
<tr align='center'><td><input type='submit' value="<< REMOVE" name="remove" class="button-primary"></td></tr>
</table>
</div>
<div id="branch1">Branch
<?php
$qry="SELECT * FROM `".$wpdb->prefix."branches` WHERE `name`='".$_POST['s1']."'";
$re=mysql_query($qry);
$_SESSION['row'] = $row=mysql_num_rows($re);
$j=1;

if(isset($_POST['add1']))
{
	if(strlen($_POST['r1'])>2)
	{
	for($i=1;$i<=$row;$i++)
	{
	if(isset($_POST['hello'.$i]))
	{
		$qry="SELECT `".$wpdb->prefix."selectedbranch`.`level`, `".$wpdb->prefix."selectedbranch`.`userid`, `".$wpdb->prefix."branches`.`subbranch`  FROM `".$wpdb->prefix."selectedbranch`, `".$wpdb->prefix."branches` WHERE `".$wpdb->prefix."selectedbranch`.`userid`='".$g."' AND `".$wpdb->prefix."selectedbranch`.`level`='".$_POST['r1']."' AND `".$wpdb->prefix."selectedbranch`.`branch`=`".$wpdb->prefix."branches`.`id`  AND `".$wpdb->prefix."branches`.`subbranch`='".$_POST['hello'.$i]."'  ";
$result=mysql_query($qry);
		if(mysql_num_rows($result)!=0)
		{
?>
			<script>
alert("Already Exist");
		/*	$(document).ready(function() {
alert("n");
			$(#ad).click(function(){
				alert('Already Exists');
			});
			});*/
			</script>
<?php
		}else
		{
		$qry_id = mysql_query("SELECT `id` FROM `".$wpdb->prefix."branches` WHERE `name`='".$_POST['s1']."' AND `subbranch`='".$_POST['hello'.$i]."' ");
		$select_id = mysql_fetch_array($qry_id);
		$branch_id = $select_id['id'];
		$qry2="INSERT INTO `".$wpdb->prefix."selectedbranch` VALUES('".$g."', '', '".$_POST['r1']."', '".$select_id['id']."', '0')";
		$resu=mysql_query($qry2);
		$qry_count = mysql_affected_rows();
		$count_insert;
		$count_insert += $qry_count;
		} 
	}
}
}
else{
//	error("Select The Course level");
//$errors->add("Error","There some error");
}
}
if(isset($_POST['remove']))
{
echo "vgfd";
for($k=1;$k<=$_SESSION['row'];$k++)
{
	if(isset($_POST['delete'.$k]))
	{
		echo $qury="DELETE FROM `".$wpdb->prefix."selectedbranch` WHERE `id`='".$_POST['delete'.$k]."'";
		$result=mysql_query($qury) or die('DELETE ERROR : '.mysql_error()); 
	}
}

}
$f="delete";
$l=1;
	 	$qry3="SELECT `".$wpdb->prefix."selectedbranch`.`id`, `".$wpdb->prefix."branches`.`subbranch` FROM `".$wpdb->prefix."selectedbranch`, `".$wpdb->prefix."branches` WHERE `".$wpdb->prefix."selectedbranch`.`userid`='".$g."' AND `".$wpdb->prefix."selectedbranch`.`branch`=`".$wpdb->prefix."branches`.`id` ORDER BY `".$wpdb->prefix."selectedbranch`.`id` DESC LIMIT ".$count_insert." ";
		$resu1=mysql_query($qry3) or mysql_error('ERROR : '.die());
		echo "<table width=100% style='background:none'>";
		while($data2=mysql_fetch_assoc($resu1))
		{
		echo "<tr><td><input type='checkbox' name='".$f.$l."' value='".$data2['id']."'><td>".$data2['subbranch']."</td></tr>";
		echo $l++;
		}
		echo "</table>";

?></div>
<table>
<tr>
<td>
<a href="#" id="op">Add New Branch,Course,Level</a>
</td>
</tr>
</table>
<h1>YOUR ALL BRANCHES</h1>
<?php	
$l = 1;
echo $_SESSION['var'] = 'ggg';

	$qry3="SELECT * FROM `".$wpdb->prefix."selectedbranch` WHERE `userid`='".$g."'  ORDER BY `".$wpdb->prefix."selectedbranch`.`id` DESC  ";
		$resu1=mysql_query($qry3) or mysql_error('ERROR : '.die());
		echo "<table width=100%  class='widefat'>";
		while($data2=mysql_fetch_assoc($resu1))
		{
echo "<tr><td><input type='checkbox' name='".$f.$l."' value='".$data2['id']."'><td>".$data2['branch']."</td><td>".$data2['id']."</td></tr>";
		$l++;
		}
		echo "</table>";
?>
			</form>
<?php
}
function referbooks($g,$b,$c,$d,$e) //this function is store all information about the books.
{
	$qryt="select * from `".$wpdb->prefix."syllabi` where userid='".$g."'";
	$rest=mysql_query($qryt);
	if(mysql_num_rows($rest)!=0)
	{
if($_POST['ok'])
{
	if(strlen($_POST['t1'])>6)
	{
		if(strlen($_POST['t2'])>5)
		{
			if(strlen($_POST['t7'])>2)
			{
				if(strlen($_POST['t4'])>1)
				{
					if(is_numeric($_POST['t5']))
					{
						if(is_numeric($_POST['t6']))
						{
     			$qry7="select * from `".$wpdb->prefix."book` where userid='".$g."' AND college='".$_POST['s5']."' AND level='".$_POST['s4']."' AND branch='".$_POST['s6']."' AND  book_name='".$_POST['t1']."' AND sem='".$_POST['s6']."' AND publication='".$_POST['t3']."' AND author='".$_POST['t2']."' AND batch='".$_POST['s16']."'";
				$result7=mysql_query($qry7);
				if(mysql_num_rows($result7)!=0)
				{
					error("This book Publiction,Author,Book is already stored");
				}else
				{
					$rs="-";
					$qry8="insert into `".$wpdb->prefix."book` values('".$_POST['s5']."','".$_POST['s4']."','".$_POST['s6R']."','".$_POST['s7']."','".$_POST['t1']."','".$_POST['s6']."','".$_POST['t2']."','".$_POST['t3']."','".$g."','0','".$_POST['s16']."','".$_POST['t4']."','".$_POST['t5']."','".$_POST['t6']."','".$_POST['t7']."','".$_POST['t8']."','".$_POST['t9']."','".$_POST['t10']."','".$_POST['t11'].$rs.$_POST['t12']."','".$_POST['s8']."')";
					$res8=mysql_query($qry8);
					ok("Record Is Stored");
				}
			}else
			{
				error("Enter The Volume");
			}
			}else
			{
				error("Enter The Series");
			}
				}else
			{
				error("Enter The Edition");
			}
		
}else
{
	error("Enter The Year");
}
		}else
		{
			error("Enter the full Name Of Author");
		}
	}else
	{
		error("Enter the Full Name Of Book");
	}
}?>
	<script>
	$(document).ready(function(){
$(document).tooltip();
			$("#level").click(function(){
				var dbname="<?php echo $b; ?>";
				var dbuser="<?php echo $c; ?>";
				var dbpassword="<?php echo $d; ?>";
				var dbhost="<?php echo $e; ?>";				
		$.post('<?php echo home_url();?>/wp-content/plugins/addpage/demo1.php?mode=referbooks',{dbname:dbname,dbuser:dbuser,dbpassword:dbpassword,dbhost:dbhost,s5:$("#cou").val(),s4:$("#level").val(),s6:$("#branchee").val()},function(data){$("#sub").html(data)});
		})
		$("#level").blur(function(){
				var dbname="<?php echo $b; ?>";
				var dbuser="<?php echo $c; ?>";
				var dbpassword="<?php echo $d; ?>";
				var dbhost="<?php echo $e; ?>";				
		$.post('<?php echo home_url();?>/wp-content/plugins/addpage/demo1.php?mode=referbooks',{dbname:dbname,dbuser:dbuser,dbpassword:dbpassword,dbhost:dbhost,s5:$("#cou").val(),s4:$("#level").val(),s6:$("#branchee").val()},function(data){$("#sub").html(data)});
		})
		});
	</script>
	<?php
echo "<form action='?page=advanceser' method='post'>";
echo "<input type='submit' value='Advance_Search'></form>";
echo "<form action='admin.php?page=referbooks' method='post'>";
echo "<table width=90%><tr><td>Select College</td><td><select name='s5' id='cou' title='Select College'>";
$qry6="select DISTINCT (college) from `".$wpdb->prefix."syllabi` where userid='".$g."'";
$result6=mysql_query($qry6);
while($data6=mysql_fetch_array($result6))
{
echo "<option>".$data6['college']."</option>";
}
echo "</select></td></tr>";
echo "<tr><td>Select Branch</td><td><select name='s6R' id='branchee' title='Select Branch'><option></option>";
$qry7="select DISTINCT (branch) from `".$wpdb->prefix."syllabi` where userid='".$g."'";
$result7=mysql_query($qry7);	
while($data7=mysql_fetch_array($result7))
{
echo "<option>".$data7['branch']."</option>";
}
echo "</select></td></tr>";
echo "<tr><td>Select Level</td><td><select name='s4' id='level' title='Select title like B.tech,M.tech'><option></option>";
$qry5="select DISTINCT (level) from `".$wpdb->prefix."syllabi` where userid='".$g."'";
$result5=mysql_query($qry5);
while($data5=mysql_fetch_array($result5))
{
echo "<option>".$data5['level']."</option>";
}
echo "</select></td></tr>";

echo "<tr><td>Select Subject</td><td><div id='sub'><select><option></option></select></div></td></tr>";
echo "<tr><td>Book Name(full name)</td><td><input type='text' name='t1' placeholder='book name' required></td></tr>";
$qry7="select DISTINCT(batch) from `".$wpdb->prefix."syllabi` where userid='".$g."'";
$result7=mysql_query($qry7);
echo "<tr><td>Batch</td><td><select name='s16' title='Select Batch'><option></option>";
while($data7=mysql_fetch_array($result7))
{
echo "<option value='".$data7['batch']."'>".$data7['batch']."</option>";
}
echo "</select></td></tr>"; 
echo "<tr><td>Semester</td><td><select name='s6' title='Select Semester'><option vlaue='1st'>1st</option><option vlaue='2nd'>2nd</option><option vlaue='3rd'>3rd</option><option vlaue='4th'>4th</option><option vlaue='5th'>5th</option><option vlaue='6th'>6th</option><option vlaue='7th'>7th</option><option vlaue='8th'>8th</option></select></td></tr>";
$qtt="select * from `".$wpdb->prefix."author`";
$qett=mysql_query($qtt);
echo "<tr><td>Author</td><td><select name='t2' placeholder='Author' required title='Enter the author name'>";
while($datar=mysql_fetch_array($qett))
{
echo "<option>".$datar['name']."</option>";
}
echo "</td></tr>";
echo "<tr><td>Edition</td><td><input type='text' name='t4' placeholder='Edition' required title='Enter the Edition'></td></tr>";
echo "<tr><td>Series</td><td><input type='text' name='t5' placeholder='Series' required title='Enter the series of book'></td></tr>";
echo "<tr><td>Volume</td><td><input type='text' name='t6' placeholder='Volumn' required title='Enter the volume of book'></td></tr>";
echo "<tr><td>Month</td><td><select name='s8' title='Select the month of book publishing'><option>Jan</option><option>Feb</option><option>Mar</option><option>Apr</option><option>May</option><option>June</option><option>July</option><option>Aug</option><option>Sept</option><option>Oct</option><option>Nov</option><option>Des</option></select></td></tr>";
echo "<tr><td>Year</td><td><input type='text' name='t7' placeholder='Year' required title='Select the year of book publishing'></td></tr>";
echo "</td></tr>";
//echo "<tr><td>Address(Publication)</td><td><input type='text' name='t8' placeholder='Address' required></td></tr>";
$qttt="select * from `".$wpdb->prefix."publisher`";
$qettt=mysql_query($qttt);
echo "<tr><td>Address(Publication)</td><td><select name='t8' placeholder='Author' required title='Enter the address'>";
while($datatr=mysql_fetch_array($qettt))
{
echo "<option>".$datatr['place']."</option>";
}
echo "<tr><td>Note</td><td><input type='text' name='t9' placeholder='Note' required title='Enter the note'></td></tr>";
echo "<tr><td>Editior</td><td><input type='text' name='t10' placeholder='Editior' required title='Enter the name of editior'></td></tr>";
echo "<tr><td>Pages</td><td><input type='text' name='t11' placeholder='Pages' style='width:50px' required title='Enter the total pages of book'>-<input type='text' name='t12' placeholder='Pages' style='width:50px' required></td></tr>";
//echo "<tr><td>Publication</td><td><input type='text' name='t3' placeholder='Publication' required></td></tr><tr><td><input type='submit' value='ADD' name='ok'></td></tr>";
$qtttt="select * from `".$wpdb->prefix."publisher`";
$qetttt=mysql_query($qtttt);
echo "<tr><td>Publication</td><td><select name='t3' placeholder='Author' required title='Select Plublication'>";
while($datattr=mysql_fetch_array($qetttt))
{
echo "<option>".$datattr['publisher']."</option>";
}
echo "<tr><td><input type='submit' value='ADD' name='ok'></td></tr></table></form>";

}
else
{
	error("Please Enter The Syllabus");
}
}
function topic($g,$b,$c,$d,$e) //this function is store all information about topics of chapter
{?>
	<script>
	$(document).ready(function(){
			$(document).tooltip();
			$("#level").click(function(){
var dbname="<?php echo $b; ?>";
				var dbuser="<?php echo $c; ?>";
				var dbpassword="<?php echo $d; ?>";
				var dbhost="<?php echo $e; ?>";
				
		$.post('<?php echo home_url();?>/wp-content/plugins/addpage/demo1.php?mode=topic',{dbname:dbname,dbuser:dbuser,dbpassword:dbpassword,dbhost:dbhost,s5:$("#cou").val(),s4:$("#level").val(),s6:$("#branchee").val(),s7:$("#sems").val()},function(data){$("#subj").html(data)});
		})
		$("#level").blur(function(){
var dbname="<?php echo $b; ?>";
				var dbuser="<?php echo $c; ?>";
				var dbpassword="<?php echo $d; ?>";
				var dbhost="<?php echo $e; ?>";
				
		$.post('<?php echo home_url();?>/wp-content/plugins/addpage/demo1.php?mode=topic',{dbname:dbname,dbuser:dbuser,dbpassword:dbpassword,dbhost:dbhost,s5:$("#cou").val(),s4:$("#level").val(),s6:$("#branchee").val(),s7:$("#sems").val()},function(data){$("#subj").html(data)});
		})
		var i=1;

		$("#am").click(function(){
						var u=1;
			var v=$("#mval").val();
			for(var j=1;j<=v;j++){
			$("#more").append('<tr><td><input type="text" name="t1'+i+'" placeholder="Chapter Name" required title="Enter chapter name"></td><td><textarea name="t2'+i+'" rows=2 cols=50 placeholder="Description" required title="Enter description"></textarea></td><td><input type="text" name="t3'+i+'" placeholder="Leacture" required title="enter the leacture"></td></tr>');
			i++;
			}
			u=u+i;
			document.getElementById("roval").value=u;
			
			})
		});
	</script>

<?php
	$qryt="select * from `".$wpdb->prefix."book` where userid='".$g."'";
	$rest=mysql_query($qryt);
	if(mysql_num_rows($rest)!=0)
	{

	if($_POST['addtopic'])
	{
		if(strlen($_POST['t10'])>2)
		{
			if(strlen($_POST['t20'])>3)
			{
				$qry3="select * from `".$wpdb->prefix."topic` where branch='".$_POST['s4']."' AND subject='".$_POST['s5']."' AND chapter='".$_POST['t1']."' AND topics='".$_POST['t2']."' AND userid='".$g."' AND batch='".$_POST['s7']."' AND college='".$_POST['s5']."' AND level='".$_POST['s6']."'";
				$res=mysql_query($qry3);
				if(mysql_num_rows($res)==0)
				{
if(strlen($_POST['roval'])>0){
for($k=0;$k<$_POST['roval'];$k++){
$qry5="insert into `".$wpdb->prefix."topic` value('".$_POST['s5']."','".$_POST['s6']."','".$_POST['s4']."','".$_POST['s7']."','".$_POST['t1'.$k]."','".$_POST['t2'.$k]."','".$g."','0','".$_POST['s8']."','".$_POST['t3'.$k]."')";
$res5=mysql_query($qry5);
}
}else
{
$qry5="insert into `".$wpdb->prefix."topic` value('".$_POST['s5']."','".$_POST['s6']."','".$_POST['s4']."','".$_POST['s7']."','".$_POST['t10']."','".$_POST['t20']."','".$g."','0','".$_POST['s8']."','".$_POST['t30']."')";
$res5=mysql_query($qry5);
}
ok("OK TOPIC IS ADDED");					
				}else
				{
					error("This Topic Is Already Added");
				}
			}else
			{
				error("Enter The Dscription");
			}
		}else
		{
			error("Enter the Chapter Name");
		}
	}else
{
	
}
$qry4="select DISTINCT (college) from  `".$wpdb->prefix."syllabi` where userid='".$g."'";
$result4=mysql_query($qry4);
echo "<form action='admin.php?page=topics' method='post'>";
echo "<table width=80%><tr><td>College</td><td><select name='s5' id='cou' title='Select your college'><option>".$_POST['s5']."</option>";
while($data4=mysql_fetch_array($result4))
{
echo "<option>".$data4['college']."</option>";
}
echo "</select></td></tr>";
$qry5="select DISTINCT (branch) from  `".$wpdb->prefix."syllabi` where userid='".$g."'";
$result5=mysql_query($qry5);
echo "<tr><td>Select Branch</td><td><select name='s4' id='branchee' title='Select the Branch'><option>".$_POST['s4']."</option>";
while($data5=mysql_fetch_array($result5))
{
echo "<option>".$data5['branch']."</option>";
}
echo "</select></td></tr>";
$qry5="select DISTINCT (semster) from  `".$wpdb->prefix."syllabi` where userid='".$g."'";
$result5=mysql_query($qry5);
echo "<tr><td>Semster</td><td><select name='s7' id='sems' title='Select semester'><option>".$_POST['s7']."</option>";
while($data5=mysql_fetch_array($result5))
{
echo "<option>".$data5['semster']."</option>";
}
echo "</select></td></tr>";
$qry3="select DISTINCT (level) from  `".$wpdb->prefix."syllabi` where userid='".$g."'";
$result3=mysql_query($qry3);
echo "<tr><td>Course Level</td><td><select name='s6' id='level' title='Select Course'><option>".$_POS['s6']."</option>";
while($data3=mysql_fetch_array($result3))
{
echo "<option>".$data3['level']."</option>";
}
echo "</select></td></tr>";
echo "<tr><td>Select Subject</td><td><div id='subj'></div></td></tr>";
$qry7="select DISTINCT(batch) from `".$wpdb->prefix."syllabi` where userid='".$g."'";
$result7=mysql_query($qry7);
echo "<tr><td>Batch</td><td><select name='s8' title='Select your batch'><option></option>";
while($data7=mysql_fetch_array($result7))
{
echo "<option value='".$data7['batch']."'>".$data7['batch']."</option>";
}
echo "</select></td></tr></table>";
echo "<table id='more'>" ;
echo "<input type='hidden' name='roval' id='roval'>";
echo "<tr><td>Topic Name</td><td>SubTopic Name</td><td>Leacture</td></tr>";
echo "<tr><td><input type='text' name='t10' placeholder='Chapter Name' required title='Enter chapter name'></td><td><textarea name='t20' rows=2 cols=50 placeholder='Description' required title='Enter description'></textarea></td><td><input type='text' name='t30' placeholder='Leacture' required title='enter the leacture'></td></tr>";		
echo "</table><table>";
echo "<tr><td><input type='submit' value='ADD' name='addtopic'>OR</td><td><input type='text' placeholder='How many Record you want to insert ?' id='mval'></td><td><input type='submit' value='Add More' name='addtopic' id='am'></td></tr>";
}
else
{
	error("Please Enter The Book");
}
}

function preview($g,$b,$c,$d,$e) //this functio show the syllabus in html fome.
{?>
<script>
	$(document).ready(function(){
		$(document).tooltip();
				var dbname="<?php echo $b; ?>";
				var dbuser="<?php echo $c; ?>";
				var dbpassword="<?php echo $d; ?>";
				var dbhost="<?php echo $e; ?>";


			$("#level").click(function(){

		$.post('<?php echo home_url();?>/wp-content/plugins/addpage/demo1.php?mode=preview',{dbname:dbname,dbuser:dbuser,dbpassword:dbpassword,dbhost:dbhost,s5:$("#cou").val(),s4:$("#branchee").val(),s1:$("#sem").val(),s7:$("#level").val()},function(data){$("#batch").html(data)});
		})
		$("#level").blur(function(){
					
		$.post('<?php echo home_url();?>/wp-content/plugins/addpage/demo1.php?mode=preview',{dbname:dbname,dbuser:dbuser,dbpassword:dbpassword,dbhost:dbhost,s5:$("#cou").val(),s4:$("#branchee").val(),s1:$("#sem").val(),s7:$("#level").val()},function(data){$("#batch").html(data)});
		})
		});
	</script>

<?php
   $qry2="select * from `".$wpdb->prefix."book`  where userid='".$g."'";
	$res2=mysql_query($qry2);
	if(mysql_num_rows($res2)==0)
	{
		error("Enter The Topics");
	}else{
		echo "<h1>Select Your Branch</h1>";
   $qry4="select DISTINCT (college) from  `".$wpdb->prefix."syllabi` where userid='".$g."'";
$result4=mysql_query($qry4);
echo "<form action='admin.php?page=previewsyllabus' method='post'>";
	
echo "<table width=100% style='box-shadow:none'><tr><td>College</td><td><select name='s5' id='cou' title='Select the college'>";
while($data4=mysql_fetch_array($result4))
{
echo "<option>".$data4['college']."</option>";
}
echo "</select></td></tr>";
$qry5="select DISTINCT (branch) from  `".$wpdb->prefix."syllabi` where userid='".$g."'";
$result5=mysql_query($qry5);
echo "<tr><td>Select Branch</td><td><select name='s4' id='branchee' title='Select the branch'><option></option>";
while($data5=mysql_fetch_array($result5))
{
echo "<option>".$data5['branch']."</option>";
}
echo "</select></td></tr>";
    $qry1="select DISTINCT (level) from `".$wpdb->prefix."syllabi` where userid='".$g."'";
	$res1=mysql_query($qry1);
	$cout=1;
	
echo "<tr><td>Semester</td><td><select name='s11' id='sem' title='Select your semester'><option value='1st'>1st</option><option value='2nd'>2nd</option><option value='3rd'>3rd</option><option value='4th'>4th</option><option value='5th'>5th</option><option value='6th'>6th</option><option value='7th'>7th</option><option value='8th'>8th</option></select>";
echo "<tr><td>Curse Level</td><td><select name='s7' id='level' title='Select curse level'><option></option>";
while($data=mysql_fetch_array($res1))
{
	echo "<option>".$data['level']."</option>";
}
echo "</select></td></tr>";
echo "<tr><td>Batch</td><td><div id='batch'><select name='s8' title='select the batch'><option></option></select></div></td></tr>";
echo "<tr><th>Select option for print the syllabus</th></tr>";
echo "<tr><td><input type='radio' name='r2' value='yes'>Batch wise</td><td><input type='radio' name='r2' values='no'>Semester</td></tr>";
echo "<tr><td><input type='submit' value='SELECT'></td></tr>";
echo "</table>";
echo "</form>";
}
}
function previewsyllabus($g,$b,$c,$d,$e) //this functio show the syllabus in html fome.
{

  switch($_POST['r2'])
  {
		  case "on":
echo "<form action='".plugin_dir_url(__FILE__)."print.php' method='post'>";
echo "<input type='hidden' name='dbname' value='".$b."'>";
echo "<input type='hidden' name='dbuser' value='".$c."'>";
echo "<input type='hidden' name='dbpass' value='".$d."'>";
echo "<input type='hidden' name='dbhost' value='".$e."'>";
echo "<input type='hidden' name='id' value='".$g."'>";
echo "<input type='hidden' name='s4' value='".$_POST['s4']."'>";
echo "<input type='hidden' name='s11' value='".$_POST['s11']."'>";
echo "<input type='hidden' name='s8' value='".$_POST['s8']."'>";
echo "<input type='hidden' name='s5' value='".$_POST['s5']."'>";
echo "<input type='hidden' name='s7' value='".$_POST['s7']."'>";
echo "<input type='hidden' name='r2' value='".$_POST['r2']."'>";
echo "<input type='submit' value='Print' name='p'></form>";
echo "<form action='".plugin_dir_url(__FILE__)."print1.php' method='post'>";
echo "<input type='hidden' name='dbname' value='".$b."'>";
echo "<input type='hidden' name='dbuser' value='".$c."'>";
echo "<input type='hidden' name='dbpass' value='".$d."'>";
echo "<input type='hidden' name='dbhost' value='".$e."'>";
echo "<input type='hidden' name='id' value='".$g."'>";
echo "<input type='hidden' name='s4' value='".$_POST['s4']."'>";
echo "<input type='hidden' name='s11' value='".$_POST['s11']."'>";
echo "<input type='hidden' name='s8' value='".$_POST['s8']."'>";
echo "<input type='hidden' name='s5' value='".$_POST['s5']."'>";
echo "<input type='hidden' name='s7' value='".$_POST['s7']."'>";
echo "<input type='hidden' name='r2' value='".$_POST['r2']."'>";
echo "<input type='submit' value='Genrate Pdf' name='p'></form>";

  $qry1="select * from college_data where userid='".$g."' AND name='".$_POST['s5']."'";
	$res1=mysql_query($qry1);
	$data=mysql_fetch_array($res1);
	echo "<div id='pr' style='border:1px solid black'>";
	echo "<table width=100% style='box-shadow:none;background:none'>";
	echo "<tr><th><h2 style='font-size:50px;color:Darkred'>".$data['uni']."</h2></th></tr>";
		echo "</table>";
$qry2="select * from `".$wpdb->prefix."syllabi` where userid='".$g."' AND branch='".$_POST['s4']."' AND semster='".$_POST['s11']."' AND batch='".$_POST['s8']."' AND college='".$_POST['s5']."' AND level='".$_POST['s7']."'";
	$res2=mysql_query($qry2);
	$data1=mysql_fetch_array($res2);
	echo "<table width=100% style='box-shadow:none;background:none'><br><br><br><br>";
	echo "<tr><td style='text-align:left'></b><h1 style='text-align:center;font-size:30px'>Scheme& Syllabus of</h1></td></tr>";
	echo "<tr><td style='text-align:left'></b><h1 style='text-align:center;font-size:30px'>".$data1['level']." ".$data1['course']."</h1></td></tr>";
	echo "<tr><td><hr color='lightblue'></hr></td></tr>";
	echo "<tr><td><h1 style='text-align:center;font-size:30px'>".$data1['semster']." Semester effective for Batch.".$data1['batch']."</h2></td></tr>";
	echo "</table>";
$qryo1="select * from `".$wpdb->prefix."syllabi` where userid='".$g."' AND branch='".$_POST['s4']."' AND batch='".$_POST['s8']."' AND semster='".$_POST['s11']."' AND college='".$_POST['s5']."'";
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
$qryo="select * from `".$wpdb->prefix."syllabi` where userid='".$g."' AND branch='".$_POST['s4']."' AND batch='".$_POST['s8']."' AND semster='".$_POST['s11']."' AND college='".$_POST['s5']."'";
$resultf=mysql_query($qryo);
echo "<table  style='box-shadow:none;background:none;text-align:center' border=1><br><br><br><br><br><br><br>";
echo "<tr><td rowspan='2' >CODE</td><td rowspan='2'>Course details</td><td colspan='3'>Load Allocation</td><td colspan='2' >Marks Distribution</td><td rowspan='2'>Total Marks</td><td rowspan='2'>Credit</td></tr>";
echo "<tr><td>T</td><td>L</td><td>P</td><td>Internal</td><td>External</td></tr>";
while($dataf=mysql_fetch_array($resultf))
{
	echo "<tr><td>".$dataf['subject_code']."</td><td>".$dataf['subject']."</td><td>".$dataf['leacture']."</td><td>".$dataf['theory']."</td><td>".$dataf['paritical']."</td><td>".$dataf['internal']."</td><td>".$dataf['external']."</td><td>".$dataf['tom']."</td><td>".$dataf['cre']."</td></tr>";
}
	echo "<tr><td></td><td>TOTAL</td><td>".$totallect."</td><td>".$theory."</td><td>".$paritical."</td><td>".$inter."</td><td>".$exter."</td><td>".$total."</td><td>".$cre."</td></tr>";
echo "</table>";
echo "<table width='100%' style='box-shadow:none;background:none'>";
	 $qry3="select * from `".$wpdb->prefix."syllabi` where userid='".$g."' AND branch='".$_POST['s4']."' AND semster='".$_POST['s11']."' AND batch='".$_POST['s8']."'AND college='".$_POST['s5']."' AND level='".$_POST['s7']."' AND place='theory'";
	$res3=mysql_query($qry3);
	while($data2=mysql_fetch_array($res3))
	{

		echo "<tr><td><h1 style='text-align:center;font-size:20px'>".$data2['subject_code']." ".$data2['subject']."</h1></td></tr>";		
$qrt="select * from `".$wpdb->prefix."objective` where fid='".$data2['id']."'";
$qurt=mysql_query($qrt);
if($data2['layout']=="List"){
echo "<tr><td><h3>Objective</h3></td></tr>";
}
while($dataa=mysql_fetch_array($qurt)){
if($data2['layout']=="List"){
echo "<tr><td><ul><li>".$dataa['objective']."</li></ul></td></tr>";
}else{
	echo "<tr><td><h3>Objective</h3></td><td>".$dataa['objective']."</td></tr>";
}
}
 $qry4="select * from `".$wpdb->prefix."topic` where userid='".$g."' AND branch='".$_POST['s4']."' AND subject='".$data2['subject']."' AND batch='".$_POST['s8']."' AND college='".$_POST['s5']."'";
	$res4=mysql_query($qry4);
	while($data3=mysql_fetch_array($res4))
	{
	echo "<tr><td width='600px'><ol><li><h2>".$data3['chapter'].":-</h2> <p>".$data3['topics']."[ ".$data3['leacture']." ]"."</li></ol></p></td></tr>";
}
echo "<tr><td><h2>Suggested Readings/ Books:</h2></td></tr>";
$qry5="select * from book where userid='".$g."' AND subject='".$data2['subject']."' AND sem='".$_POST['s11']."' AND batch='".$_POST['s8']."' AND college='".$_POST['s5']."'";
	$res8=mysql_query($qry5);
	echo "<ol>";
	while($data4=mysql_fetch_array($res8))
	{
	echo "<tr><td><li><p>".$data4['book_name']."<b>,,</b>".$data4['author']."</b>,,<b>".$data4['publication']."</b></td></li></tr>";
}
echo "</ol>";

$pr='/&/';
$re='\&';
$qry55="select * from `".$wpdb->prefix."paritical` where userid='".$g."' AND course='".$_POST['s4']."' AND batch='".$_POST['s8']."' AND subject='".$data2['subject']."' AND college='".$_POST['s5']."'";
$res55=mysql_query($qry55);
echo "<tr><td>";
echo "<hr color='black'></hr>";
echo "</td></tr>";

if(mysql_num_rows($res55)!=0)
{
echo "<tr><th>Pariticals</th></tr>";
$f=1;
echo "<tr><th>".$data2['subject']."</th></tr>";
while($data55=mysql_fetch_array($res55))
{
	echo "<tr><td><ul><li>".$f.')'.preg_replace($pr,$re,$data55['pariticalname'])."</li></ul></tr>";
	$f++;
	if(strlen($data55['subtopic'])>1)
	{
		echo "<tr><td><ol><li>".$data55['subtopic']."</li></ol></td></tr>";
	}
}
}else
{
}
}
echo "<tr><td>";
echo "<hr color='black'></hr>";
echo "</td></tr>";

	echo "</table>";
echo "</div>";
break;
case "yes":
echo "<form action='".plugin_dir_url(__FILE__)."print.php' method='post'>";
echo "<input type='hidden' name='dbname' value='".$b."'>";
echo "<input type='hidden' name='dbuser' value='".$c."'>";
echo "<input type='hidden' name='dbpass' value='".$d."'>";
echo "<input type='hidden' name='dbhost' value='".$e."'>";
echo "<input type='hidden' name='id' value='".$g."'>";
echo "<input type='hidden' name='s4' value='".$_POST['s4']."'>";
echo "<input type='hidden' name='s11' value='".$_POST['s11']."'>";
echo "<input type='hidden' name='s8' value='".$_POST['s8']."'>";
echo "<input type='hidden' name='s5' value='".$_POST['s5']."'>";
echo "<input type='hidden' name='s7' value='".$_POST['s7']."'>";
echo "<input type='hidden' name='r2' value='".$_POST['r2']."'>";
echo "<input type='submit' value='Print' name='p'></form>";
echo "<form action='".plugin_dir_url(__FILE__)."print1.php' method='post'>";
echo "<input type='hidden' name='dbname' value='".$b."'>";
echo "<input type='hidden' name='dbuser' value='".$c."'>";
echo "<input type='hidden' name='dbpass' value='".$d."'>";
echo "<input type='hidden' name='dbhost' value='".$e."'>";
echo "<input type='hidden' name='id' value='".$g."'>";
echo "<input type='hidden' name='s4' value='".$_POST['s4']."'>";
echo "<input type='hidden' name='s11' value='".$_POST['s11']."'>";
echo "<input type='hidden' name='s8' value='".$_POST['s8']."'>";
echo "<input type='hidden' name='s5' value='".$_POST['s5']."'>";
echo "<input type='hidden' name='s7' value='".$_POST['s7']."'>";
echo "<input type='hidden' name='r2' value='".$_POST['r2']."'>";
echo "<input type='submit' value='Genrate Pdf' name='p'></form>";

 $qry1="select * from `".$wpdb->prefix."college_data` where userid='".$g."' AND name='".$_POST['s5']."'";
  
	$res1=mysql_query($qry1);
	$data=mysql_fetch_array($res1);
	echo "<div id='pr' style='border:1px solid black'>";
	echo "<table width=100% style='box-shadow:none;background:none'>";
	echo "<tr><th><h1 style='font-size:5em;color:Darkred'>".$data['uni']."</h1></th></tr>";
		echo "</table>";
		$qry2u="select Distinct(semster) from `".$wpdb->prefix."syllabi` where userid='".$g."' AND branch='".$_POST['s4']."'  AND batch='".$_POST['s8']."' AND college='".$_POST['s5']."' AND level='".$_POST['s7']."'";
$query2u=mysql_query($qry2u);
while($data2u=mysql_fetch_array($query2u))
{
$qry2="select * from `".$wpdb->prefix."syllabi` where userid='".$g."' AND branch='".$_POST['s4']."'  AND batch='".$_POST['s8']."' AND college='".$_POST['s5']."' AND level='".$_POST['s7']."' AND semster='".$data2u['semster']."'";
	$res2=mysql_query($qry2);
	echo "<table width='100%' style='box-shadow:none;background:none'><br><br><br><br>";
	$data1=mysql_fetch_array($res2);
	echo "<tr><td style='text-align:left'></b><h1 style='text-align:center;font-size:30px'>Scheme& Syllabus of</h1></td></tr>";
	echo "<tr><td style='text-align:left'></b><h1 style='text-align:center;font-size:30px'>".$data1['level']." ".$data1['course']."</h1></td></tr>";
	echo "<tr><td><hr color='lightblue'></hr></td></tr>";
	echo "<tr><td><h1 style='text-align:center;font-size:30px'>".$data1['semster']." Semester effective for Batch.".$data1['batch']."</h2></td></tr>";
	echo "</table>";
$qryo1="select * from `".$wpdb->prefix."syllabi` where userid='".$g."' AND branch='".$_POST['s4']."' AND batch='".$_POST['s8']."'  AND college='".$_POST['s5']."' And semster='".$data2u['semster']."'";
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
$qryo="select * from `".$wpdb->prefix."syllabi` where userid='".$g."' AND branch='".$_POST['s4']."' AND batch='".$_POST['s8']."' AND college='".$_POST['s5']."' AND semster='".$data2u['semster']."'";
$resultf=mysql_query($qryo);
echo "<center>";
echo "<table width='100%' style='box-shadow:none;background:none;border:solid' border='1'>";
echo "<tr><td rowspan='2' >CODE</td><td rowspan='2'>Course details</td><td colspan='3'>Load Allocation</td><td colspan='2' >Marks Distribution</td><td rowspan='2'>Total Marks</td><td rowspan='2'>Credit</td></tr>";
echo "<tr><td>T</td><td>L</td><td>P</td><td>Internal</td><td>External</td></tr>";
while($dataf=mysql_fetch_array($resultf))
{
	echo "<tr><td>".$dataf['subject_code']."</td><td>".$dataf['subject']."</td><td>".$dataf['leacture']."</td><td>".$dataf['theory']."</td><td>".$dataf['paritical']."</td><td>".$dataf['internal']."</td><td>".$dataf['external']."</td><td>".$dataf['tom']."</td><td>".$dataf['cre']."</td></tr>";
}
	echo "<tr><td></td><td>TOTAL</td><td>".$totallect."</td><td>".$theory."</td><td>".$paritical."</td><td>".$inter."</td><td>".$exter."</td><td>".$total."</td><td>".$cre."</td></tr>";
echo "</table>";
echo "</center>";
	 $qry3="select * from `".$wpdb->prefix."syllabi` where userid='".$g."' AND branch='".$_POST['s4']."'  AND batch='".$_POST['s8']."'AND college='".$_POST['s5']."' AND level='".$_POST['s7']."' AND semster='".$data1['semster']."' AND place='theory'";
	$res3=mysql_query($qry3);
	while($data2=mysql_fetch_array($res3))
	{
echo "<table width=100% style='box-shadow:none;background:none'>";

		echo "<tr><td colspan='10'><h1 style='text-align:center;font-size:20px'>".$data2['subject_code']." ".$data2['subject']."</h1></td></tr>";		
$qrt="select * from `".$wpdb->prefix."objective` where fid='".$data2['id']."'";
$qurt=mysql_query($qrt);
if($data2['layout']=="List"){
echo "<tr><td><h3>Objective</h3></td></tr>";
}
while($dataa=mysql_fetch_array($qurt)){
if($data2['layout']=="List"){
echo "<tr><td><ul><li>".$dataa['objective']."</li></ul></td></tr>";
}else{
	echo "<tr><td><h3>Objective</h3></td><td>".$dataa['objective']."</td></tr>";
}
}

echo "</table>";
 $qry4="select * from `".$wpdb->prefix."topic` where userid='".$g."' AND branch='".$_POST['s4']."' AND subject='".$data2['subject']."' AND batch='".$_POST['s8']."' AND college='".$_POST['s5']."'";
	$res4=mysql_query($qry4);
echo "<table width=100% style='box-shadow:none;background:none'>";

	while($data3=mysql_fetch_array($res4))
	{
	echo "<tr><td><ul style='list-style:numric;text-align:left'><li><h2>".$data3['chapter'].":-</h2> <p>".$data3['topics']."[ ".$data3['leacture']." ]"."</li></ul></p></td></tr>";
}
echo "</table>";
echo "<table width=100% style='box-shadow:none;background:none'>";
echo "<tr><td><h2 align='left'>Suggested Readings/ Books:</h2></td></tr>";
$qry5="select * from `".$wpdb->prefix."book` where userid='".$g."' AND subject='".$data2['subject']."'  AND batch='".$_POST['s8']."' AND college='".$_POST['s5']."'";
	$res8=mysql_query($qry5);
	echo "<ul align='left'>";
	while($data4=mysql_fetch_array($res8))
	{
	echo "<tr><td><li><p>".$data4['book_name']."<b>,,</b>".$data4['author']."</b>,,<b>".$data4['publication']."</b></td></li></tr>";
}
echo "</ol>";
echo "</table>";
echo "<table width=100% style='box-shadow:none;background:none'>";

$pr='/&/';
$re='\&';
$qry55="select * from `".$wpdb->prefix."paritical` where userid='".$g."' AND course='".$_POST['s4']."' AND batch='".$_POST['s8']."' AND subject='".$data2['subject']."' AND college='".$_POST['s5']."' AND sem='".$data1['semster']."'";
$res55=mysql_query($qry55);
echo "<tr><td>";
echo "<hr color='black'></hr>";
echo "</td></tr>";
if(mysql_num_rows($res55)!=0)
{
	$f=1;
echo "<tr><th>Pariticals</th></tr>";
echo "<tr><th>".$data2['subject']."</th></tr>";
echo "<ul align='left'>";
while($data55=mysql_fetch_array($res55))
{
	echo "<tr><td><li>".preg_replace($pr,$re,$data55['pariticalname']).":-".$data55['subtopic']."</li></td></tr>";
$f++;
}
echo "</table>";
}
else
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

}
function syllabusupdate($g,$b,$c,$d,$e) //this function is allow to update the syllabus
{?>
		<script>
	$(document).ready(function(){
		$(document).tooltip();
				var dbname="<?php echo $b; ?>";
				var dbuser="<?php echo $c; ?>";
				var dbpassword="<?php echo $d; ?>";
				var dbhost="<?php echo $e; ?>";
			$("#level").click(function(){
		$.post('<?php echo home_url();?>/wp-content/plugins/addpage/demo1.php?mode=syllabusupdate',{dbname:dbname,dbuser:dbuser,dbpassword:dbpassword,dbhost:dbhost,s5:$("#cou").val(),s4:$("#level").val(),s6:$("#branchee").val(),s11:$("#sem").val()},function(data){$("#batch").html(data)});
		})
$("#level").blur(function(){
		$.post('<?php echo home_url();?>/wp-content/plugins/addpage/demo1.php?mode=syllabusupdate',{dbname:dbname,dbuser:dbuser,dbpassword:dbpassword,dbhost:dbhost,s5:$("#cou").val(),s4:$("#level").val(),s6:$("#branchee").val(),s11:$("#sem").val()},function(data){$("#batch").html(data)});
		})
		});
	</script>
<?php
   $qry2="select * from `".$wpdb->prefix."book`  where userid='".$g."'";
	$res2=mysql_query($qry2);
	if(mysql_num_rows($res2)==0)
	{
		error("Enter The Topics");
	}else{
		echo "<h1>Select Your Branch</h1>";
   $qry4="select DISTINCT (college) from  `".$wpdb->prefix."syllabi` where userid='".$g."'";
$result4=mysql_query($qry4);
echo "<form action='admin.php?page=syllabusupdate&update=syllabus' method='post'>";
	
echo "<table width=100% style='box-shadow:none'><tr><td>College</td><td><select name='s5' id='cou' title='Select the collge'>";
while($data4=mysql_fetch_array($result4))
{
echo "<option>".$data4['college']."</option>";
}
echo "</select></td></tr>";
$qry5="select DISTINCT (branch) from  `".$wpdb->prefix."syllabi` where userid='".$g."'";
$result5=mysql_query($qry5);
echo "<tr><td>Select Branch</td><td><select name='s4' id='branchee' title='Select Branch'><option></option>";
while($data5=mysql_fetch_array($result5))
{
echo "<option>".$data5['branch']."</option>";
}
echo "</select></td></tr>";
    $qry1="select DISTINCT (level) from `".$wpdb->prefix."syllabi` where userid='".$g."'";
	$res1=mysql_query($qry1);
	$cout=1;
	
echo "<tr><td>Semester</td><td><select name='s11' id='sem' title='select semester'><option value='1st'>1st</option><option value='2nd'>2nd</option><option value='3rd'>3rd</option><option value='4th'>4th</option><option value='5th'>5th</option><option value='6th'>6th</option><option value='7th'>7th</option><option value='8th'>8th</option></select>";
echo "<tr><td>Curse Level</td><td><select name='s7' id='level' title='select curse level'><option></option>";
while($data=mysql_fetch_array($res1))
{
	echo "<option>".$data['level']."</option>";
}
echo "</select></td></tr>";
echo "<tr><td>Batch</td><td><div id='batch'><select name='s8' title='select batch'><option></option></select></div></td></tr>";
echo "<tr><td><input type='submit' value='SELECT'></td></tr>";
echo "</table>";
echo "</form>";
}
echo "</form>";
switch($_GET['update'])
{
	case "syllabus":
$qry2="select * from `".$wpdb->prefix."syllabi` where userid='".$g."' AND branch='".$_POST['s4']."' AND semster='".$_POST['s11']."' And college='".$_POST['s5']."' AND level='".$_POST['s7']."'";
	$res2=mysql_query($qry2);
	if(mysql_num_rows($res2)!=0)
	{
		echo "<form action='admin.php?page=updated' method='post'>";
echo "<table width=100% >";
echo "<tr><th>Option</th><th>Branch</th><th>Semester</th><th>Subject</th><th>Subject_code</th><th>Short Name</th></th><th>Batch</th></tr>";
while($data1=mysql_fetch_array($res2))
{
		echo "<tr><td style='text-align:left'><input type='radio' name='subject' value='".$data1['id']."'></td><td align=center>".$data1['branch']."</td><td align=center>".$data1['semster']."</td><td align=center>".$data1['subject']."</td><td>".$data1['subject_code']."</td><td align=center>".$data1['short']."</td><td align=center>".$data1['batch']."</td></tr>";
}
echo "<tr><td><input type='submit' value='SELECT'></td></tr>";
echo "</table>";
	break;
}else
{
	error("Nothing Found");
}
}
}

function updated($id) //this function is do the updation in syllabus
{
$qry2="select * from `".$wpdb->prefix."syllabi` where id='".$id."'";
$res2=mysql_query($qry2);
$data5=mysql_fetch_array($res2);
if($_GET['option']=="up")
{
	if(strlen($_POST['t1'])<1)
	{
		$_POST['t1']=$data5['branch'];
	}
	if(strlen($_POST['t2'])<1)
	{
		$_POST['t2']=$data5['semster'];
	}
	if(strlen($_POST['t3'])<1)
	{
		$_POST['t3']=$data5['subject'];
	}
	if(strlen($_POST['t4'])<1)
	{
		$_POST['t4']=$data5['short'];
	}
	if(strlen($_POST['t5'])<1)
	{
		$_POST['t5']=$data5['subject_code'];
	}
		if(strlen($_POST['t18'])<1)
	{
		$_POST['t18']=$data5['internal'];
	}
	if(strlen($_POST['t19'])<1)
	{
		$_POST['t19']=$data5['external'];
	}
		if(strlen($_POST['t20'])<1)
	{
		$_POST['t20']=$data5['tom'];
	}
		if(strlen($_POST['t21'])<1)
	{
		$_POST['t21']=$data5['cre'];
	}
	$qryu="update `".$wpdb->prefix."syllabi` set `branch`='".$_POST['t1']."', `semster`='".$_POST['t2']."',`subject`='".$_POST['t3']."',`short`='".$_POST['t4']."',`subject_code`='".$_POST['t5']."',`leacture`='".$_POST['t15']."',`theory`='".$_POST['t16']."',`paritical`='".$_POST['t17']."',`internal`='".$_POST['t18']."',`external`='".$_POST['t19']."',`tom`='".$_POST['t20']."',`cre`='".$_POST['t21']."',`Objective`='".$_POST['t22']."' where id='".$_POST['t6']."'";

	$result=mysql_query($qryu);
	ok("OK UPDATE");
}
echo "<form action='admin.php?page=updated&option=up' method='post'>";
echo "<table width=100%>";
echo "<tr><td>Branch</td><td><input type='text' name='t1' value='".$data5['branch']."' required></td></tr>";
echo "<tr><td>Semester</td><td><input type='text' name='t2' value='".$data5['semster']."' required></td></tr>";
echo "<tr><td>Subject</td><td><input type='text' name='t3' value='".$data5['subject']."' required></td></tr>";
echo "<tr><td>Short Name</td><td><input type='text' name='t4' value='".$data5['short']."' required></td></tr>";
echo "<tr><td>Subject Code</td><td><input type='text' name='t5' value='".$data5['subject_code']."' required></td></tr>";
echo "<tr><td>Load Allocation(leacture,theory,paritical)</td><td><input type='text' name='t15' value='".$data5['leacture']."' style='width:20px'><input type='text' name='t16' value='".$data5['theory']."' style='width:20px'><input type='text' name='t17' value='".$data5['paritical']."' style='width:20px'></td></tr>";
echo "<tr><td>Marks(Internal,External)</td><td><input type='text' name='t18' value='".$data5['internal']."' style='width:40px' required><input type='text' name='t19' value='".$data5['external']."' style='width:40px' reqiurd></td></tr>";
echo "<tr><td>Total Marks</td><td><input type='text' name='t20' value='".$data5['tom']."' required></td></tr>";
echo "<tr><td>Credit</td><td><input type='text' name='t21' value='".$data5['cre']."' required></td></tr>";
echo "<tr><td>Credit</td><td><textarea rows=10 cols=40 name='t22' required>".$data5['Objective']."</textarea></td></tr>";
echo "<tr><td><input type='hidden' name='t6' value='".$data5['id']."'></td></tr>";	
echo "<tr><td><input type='submit' value='update'></td></tr></table></form>";
}
function viewtopics($g,$b,$c,$d,$e) //this function all to show the all topics
{?>
<script>
	$(document).ready(function(){
$(document).tooltip();
			$("#level").click(function(){
				var dbname="<?php echo $b; ?>";
				var dbuser="<?php echo $c; ?>";
				var dbpassword="<?php echo $d; ?>";
				var dbhost="<?php echo $e; ?>";
		$.post('<?php echo home_url();?>/wp-content/plugins/addpage/demo1.php?mode=viewtopic',{dbname:dbname,dbuser:dbuser,dbpassword:dbpassword,dbhost:dbhost,s5:$("#cou").val(),s4:$("#branchee").val(),s1:$("#sem").val(),s7:$("#level").val()},function(data){$("#subjj").html(data)});
		})
$("#level").blur(function(){
				var dbname="<?php echo $b; ?>";
				var dbuser="<?php echo $c; ?>";
				var dbpassword="<?php echo $d; ?>";
				var dbhost="<?php echo $e; ?>";
		$.post('<?php echo home_url();?>/wp-content/plugins/addpage/demo1.php?mode=viewtopic',{dbname:dbname,dbuser:dbuser,dbpassword:dbpassword,dbhost:dbhost,s5:$("#cou").val(),s4:$("#branchee").val(),s1:$("#sem").val(),s7:$("#level").val()},function(data){$("#subjj").html(data)});
		})
		});
	</script>

<?php
    $qry2="select * from `".$wpdb->prefix."book`  where userid='".$g."'";
	$res2=mysql_query($qry2);
	if(mysql_num_rows($res2)==0)
	{
		error("Enter The Topics");
	}else{
		echo "<h1>Select Your Branch</h1>";
   $qry4="select DISTINCT (college) from  `".$wpdb->prefix."syllabi` where userid='".$g."'";
$result4=mysql_query($qry4);
echo "<form action='admin.php?page=viewstopics' method='post'>";
	
echo "<table width=100% style='box-shadow:none'><tr><td>College</td><td><select name='s5' id='cou' title='Select your college'>";
while($data4=mysql_fetch_array($result4))
{
echo "<option>".$data4['college']."</option>";
}
echo "</select></td></tr>";
$qry5="select DISTINCT (branch) from  `".$wpdb->prefix."syllabi` where userid='".$g."'";
$result5=mysql_query($qry5);
echo "<tr><td>Select Branch</td><td><select name='s4' id='branchee' title='Select your branch'><option></option>";
while($data5=mysql_fetch_array($result5))
{
echo "<option>".$data5['branch']."</option>";
}
echo "</select></td></tr>";
    $qry1="select DISTINCT (level) from `".$wpdb->prefix."syllabi` where userid='".$g."'";
	$res1=mysql_query($qry1);
	$cout=1;
	
echo "<tr><td>Semester</td><td><select name='s1' id='sem' title='select your semester'><option value='1st'>1st</option><option value='2nd'>2nd</option><option value=3rd>3rd</option><option value=4th>4th</option><option value=4th>4th</option><option value=5th>5th</option><option value=6th>6th</option><option value=7th>7th</option><option value=8th>8th</option></select>";
echo "<tr><td>Curse Level</td><td><select name='s7' id='level' title='Select curse level'><option></option>";
while($data=mysql_fetch_array($res1))
{
	echo "<option>".$data['level']."</option>";
}
echo "</select></td></tr>";
echo "<tr><td>Subject</td><td><div id='subjj'><select name='s8' title='select subject'><option></option></select></div></td></tr>";
echo "<tr><td><input type='submit' value='SELECT'></td></tr>";
echo "</table>";
echo "</form>";
}}
function viewstopics($g)
{
		
  $qry1="select * from `".$wpdb->prefix."college_data` where userid='".$g."'";
	$res1=mysql_query($qry1);
	$data=mysql_fetch_array($res1);
	echo "<table width=100%>";
	echo "</table>";
 $qry2="select * from `".$wpdb->prefix."syllabi` where userid='".$g."' AND branch='".$_POST['s4']."' AND semster='".$_POST['s1']."' AND college='".$_POST['s5']."' AND level='".$_POST['s7']."'";
	$res2=mysql_query($qry2);
	$data1=mysql_fetch_array($res2);
	echo "<table width=100%>";
	echo "<tr><td><h1 style='color:#3FEB1A'>".$data1['branch']."</h1></td></tr>";
	echo "<tr><td><h2 style='color:#80EB1A'>Semester</td><td>".$data1['semster']."</h2></td></tr>";
$qry3="select * from `".$wpdb->prefix."syllabi` where userid='".$g."' AND branch='".$_POST['s4']."' AND semster='".$_POST['s1']."' AND college='".$_POST['s5']."' AND level='".$_POST['s7']."'";
	$res3=mysql_query($qry3);
	while($data2=mysql_fetch_array($res3))
	{

		echo "<tr><td><h2>Subject</td><td>".$data2['subject']."</h2></td></tr>";
echo "<tr><td><h3>Chapter</h3></td></tr>";
 $qry4="select * from `".$wpdb->prefix."topic` where userid='".$g."' AND branch='".$_POST['s4']."' AND college='".$_POST['s5']."' AND level='".$_POST['s7']."'";
	$res4=mysql_query($qry4);
	while($data3=mysql_fetch_array($res4))
	{
	echo "<tr><td>".$data3['chapter'].":-</td><td><p>".$data3['topics']."______________".$data3['leacture']."</p></td></tr>";
	echo "<tr><td><a href='admin.php?page=actions&value=delete&id=".$data3['id']."'>Delete</a></td><td><a href='admin.php?page=actions&value=update&id=".$data3['id']."'>Update</a></td></tr>";
}
}
	echo "</table>";
}
function actions($value,$id,$g) //this function all to delete or update the topic
{
	if($value=="delete")
	{
		$qry="delete from `".$wpdb->prefix."topic` where userid='".$g."' AND id='".$id."'";
		$res=mysql_query($qry);
		ok("OK TOPIC IS DELETE");
	}
	elseif($value=="update")
	{
$qry4="select * from `".$wpdb->prefix."topic` where userid='".$g."' AND id='".$id."'";
	$res4=mysql_query($qry4);
	$data3=mysql_fetch_array($res4);
	if(isset($_POST['update']))
	{
	if(strlen($_POST['t1'])<1)
	{
		$_POST['t1']=$data3['chapter'];
	}if(strlen($_POST['t2'])<7)
	{
		$_POST['t2']=$data3['topics'];
	}
	$qry="update `".$wpdb->prefix."topic` set `chapter`='".$_POST['t1']."',`topics`='".$_POST['t2']."' where id='".$_POST['t3']."'";
	$result=mysql_query($qry);
	ok("Ok Chapter Is Update");
}else{
	echo "<form action='admin.php?page=actions&value=update&id=11' method='post'>";
	echo "<table width=100%>";
	echo "<tr><td>Chapter Name</td><td><input type='text' name='t1' value='".$data3['chapter']."' required>";
	echo "<tr><td>Description/Index/Topic</td><td><textarea rows=15 cols=45 name='t2' placeholder='Description' required>".$data3['topics']."</textarea><input type='hidden' name='t3' value='".$data3['id']."'></td></tr>";
	echo "<tr><td><input type='submit' value='update' name='update'></td></tr></table></from>";	
		
		}}
		else
	{	
		
	}
	if($value=="deletebook")
	{
     $qry="delete from `".$wpdb->prefix."book` where userid='".$g."' AND id='".$id."'";
		$res=mysql_query($qry);
		error("OK BOOK IS DELETE");
		}
		elseif($value=="bookupdate")
		{
	$qry4="select * from `".$wpdb->prefix."book` where userid='".$g."' AND id='".$id."'";
	$res4=mysql_query($qry4);
	$data3=mysql_fetch_array($res4);
	if(isset($_POST['update']))
	{
	if(strlen($_POST['t1'])<1)
	{
		$_POST['t1']=$data3['branch'];
	}if(strlen($_POST['t2'])<2)
	{
		$_POST['t2']=$data3['book_name'];
	}
	if(strlen($_POST['t3'])<1)
	{
		$_POST['t3']=$data3['sem'];
	}
	if(strlen($_POST['t4'])<1)
	{
		$_POST['t4']=$data3['author'];
	}
	if(strlen($_POST['t5'])<1)
	{
		$_POST['t5']=$data3['publication'];
	}
	if(strlen($_POST['t6'])<1)
	{
		$_POST['t6']=$data3['edition'];
	}
	if(strlen($_POST['t7'])<1)
	{
		$_POST['t7']=$data3['series'];
	}
	if(strlen($_POST['t8'])<1)
	{
		$_POST['t8']=$data3['volumn'];
	}
	if(strlen($_POST['t9'])<3)
	{
		$_POST['t9']=$data3['Year'];
	}
	if(strlen($_POST['t10'])<1)
	{
		$_POST['t10']=$data3['note'];
	}
	if(strlen($_POST['t11'])<1)
	{
		$_POST['t11']=$data3['editior'];
	}
	
		$qry="update `".$wpdb->prefix."book` set `branch`='".$_POST['t1']."',`book_name`='".$_POST['t2']."',`sem`='".$_POST['t3']."',`author`='".$_POST['t4']."',`publication`='".$_POST['t5']."',`edition`='".$_POST['t6']."',`series`='".$_POST['t7']."',`volumn`='".$_POST['t8']."',`year`='".$_POST['t9']."',`note`='".$_POST['t10']."',`editior`='".$_POST['t11']."'  where id='".$_POST['t6']."'";
	$result=mysql_query($qry);
	ok("Ok Book Is Update");
}
	echo "<form action='admin.php?page=actions&value=bookupdate&id=11' method='post'>";
	echo "<table width=100%>";
	echo "<tr><td>Branch</td><td><input type='text' name='t1' value='".$data3['branch']."' required></td></tr>";
	echo "<tr><td>Book Name</td><td><input type='text' name='t2' value='".$data3['book_name']."' required>";
	echo "<tr><td>Semester</td><td><input type='text' name='t3' value='".$data3['sem']."' required><input type='hidden' name='t6' value='".$data3['id']."'></td></tr>";
	echo "<tr><td>Author</td><td><input type='text' name='t4' value='".$data3['author']."' required></td></tr>";
	echo "<tr><td>Publication</td><td><input type='text' name='t5' value='".$data3['publication']."' required></td></tr>";
	echo "<tr><td>Edition</td><td><input type='text' name='t6' value='".$data3['edition']."' required></td></tr>";
	echo "<tr><td>Series</td><td><input type='text' name='t7' value='".$data3['series']."' required></td></tr>";
    echo "<tr><td>Volumn</td><td><input type='text' name='t8' value='".$data3['volumn']."' required></td></tr>";
    echo "<tr><td>Year</td><td><input type='text' name='t9' value='".$data3['Year']."' required></td></tr>";
    echo "<tr><td>Note</td><td><input type='text' name='t10' value='".$data3['note']."' required></td></tr>";
echo "<tr><td>Editior</td><td><input type='text' name='t11' value='".$data3['editior']."' required></td></tr>";

	echo "<tr><td><input type='submit' value='update' name='update'></td></tr></table></from>";	
}
}
function viewbook($g) //this function is show all information of books
{
    $qry4="select DISTINCT (college) from  `".$wpdb->prefix."syllabi` where userid='".$g."'";
$result4=mysql_query($qry4);
echo "<form action='admin.php?page=viewsbooks' method='post'>";
	
echo "<table width=100% style='box-shadow:none'><tr><td>College</td><td><select name='s5' id='cou'>";
while($data4=mysql_fetch_array($result4))
{
echo "<option>".$data4['college']."</option>";
}
echo "</select></td></tr>";
$qry5="select DISTINCT (branch) from  `".$wpdb->prefix."syllabi` where userid='".$g."'";
$result5=mysql_query($qry5);
echo "<tr><td>Select Branch</td><td><select name='s4' id='branchee'><option></option>";
while($data5=mysql_fetch_array($result5))
{
echo "<option>".$data5['branch']."</option>";
}
echo "</select></td></tr>";
    $qry1="select DISTINCT (level) from `".$wpdb->prefix."syllabi` where userid='".$g."'";
	$res1=mysql_query($qry1);
	$cout=1;
	
echo "<tr><td>Semester</td><td><select name='s1' id='sem'><option value='1st'>1st</option><option value='2nd'>2nd</option><option value=3rd>3rd</option><option value=4rd>4rd</option><option value=5th>5th</option><option value=6th>6th</option><option value=7th>7th</option><option value=8th>8th</option></select>";
echo "<tr><td>Curse Level</td><td><select name='s9'><option></option>";
while($data=mysql_fetch_array($res1))
{
	echo "<option>".$data['level']."</option>";
}
echo "</select></td></tr>";
echo "<tr><td><input type='submit' value='SELECT'></td></tr>";
echo "</table>";
echo "</form>";
}

function viewbooks($g,$b,$c,$d) 
{
	echo "<table><tr><td><h2>Books</h2></td></tr>";
    $qry5="select * from `".$wpdb->prefix."book` where userid='".$g."' AND branch='".$c."' AND level='".$d."' AND college='".$b."'";
	$res8=mysql_query($qry5);
	while($data4=mysql_fetch_array($res8))
	{
	echo "<tr><td><b>".$data4['subject'].":-</td><td><p>".$data4['book_name']."</p></b></td></tr>";
		echo "<tr><td><b>semester:-</td><td>".$data4['sem']."</b></td></tr>";
		echo "<tr><td><b>Author:-</td><td>".$data4['author']."</b></td></tr>";
		echo "<tr><td><b>Publications:-</td><td>".$data4['publication']."</b></td></tr>";
		echo "<tr><td><b>Publications:-</td><td>".$data4['publication']."</b></td></tr>";
		echo "<tr><td><b>Edition:-</td><td>".$data4['edition']."</b></td></tr>";
    	echo "<tr><td><b>Series:-</td><td>".$data4['series']."</b></td></tr>";
		echo "<tr><td><b>Volumn:-</td><td>".$data4['volumn']."</b></td></tr>";
		echo "<tr><td><b>year:-</td><td>".$data4['year']."</b></td></tr>";
		echo "<tr><td><b>Publications Address:-</td><td>".$data4['address']."</b></td></tr>";
	    echo "<tr><td><b>Note:-</td><td>".$data4['note']."</b></td></tr>";
				echo "<tr><td><b>Editior:-</td><td>".$data4['editior']."</b></td></tr>";
			echo "<tr><td><a href='admin.php?page=actions&value=bookdelete&id=".$data4['id']."'>Delete</a></td><td><a href='admin.php?page=actions&value=bookupdate&id=".$data4['id']."'>Update</a></td></tr>";
}
echo "</table>";
}
function collegeupdate($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k) 
{
if(isset($a))
{
		if(strlen($g)>2)
		{
			if(strlen($h)>5)
			{
				if(preg_match("/[0-9]{2}/",$h))
				{
					if(strlen($i)>1)
					{
						if(strlen($b)>5)
						{
							if(preg_match("/[0-9]{10}/",$c))
							{
								if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',$d))
								{
									if(strlen($e)>2)
									{
										if(strlen($f)>2)
										{
$qry4="update `".$wpdb->prefix."college_data` set `name`='".$_POST['t1']."',`address`='".$_POST['t2']."',`phone`='".$_POST['t3']."',`email`='".$_POST['t4']."',`state`='".$_POST['t5']."',`uni`='".$_POST['t16']."', `city`='".$_POST['t17']."',`pin`='".$_POST['t8']."',`road`='".$_POST['t9']."' where userid='".$k."' And id='".$_POST['id']."'";
$res4=mysql_query($qry4);
$qry3="select * from `".$wpdb->prefix."college_data` where userid='".$current_user->ID."' AND id='".$_POST['id']."'";
	$res3=mysql_query($qry3);
ok("COLLEGE INFORMATION IS UPDATE");
}else
{
	error("Enter the university name");
}
}else
{
	error("Enter The State");
}
}else
{
	error("Enter the Correct Email");
}
}

else
{
	error("Enter The Correct Phone");
}
}
else
{
	error("Enter The Correct Address");
}
}
else
{
	error("Enter The Correct Road Name");
}
}
else
{
	error("Enter The Correct Format Of pin Code");
}
}else
{
	error("Enter The Pin Code");
}
}
else
{
	error("Enter The City Name");
}
}else
{
	error("Enter The College Name");
}
}

function addbranch($g) //this function allow to add the new branch
{?>
<?php
if(isset($_POST['addbranch']))
{
	if(strlen($_POST['r1'])>2)
	{
		if(strlen($_POST['t1'])>2)
		{
			$qry="select * from `".$wpdb->prefix."selectedbranch` where userid='".$g."' AND college='".$_POST['s2']."' AND level='".$_POST['r1']."'  AND branch='".$_POST['t1']."'";
$result=mysql_query($qry);
if(mysql_num_rows($result)==0)
{
		$qry2="insert into `".$wpdb->prefix."selectedbranch` values('".$g."','".$_POST['s2']."','".$_POST['s1']."','".$_POST['r1']."','0','".$_POST['t1']."','0')";
		$resu=mysql_query($qry2);
		ok("New Branch Is Added");	
}else
{
	error("This Branch Already Enterd");
}
		}else
		{
				error("Enter the branch name");
		}
	}else
	{
		error("Select The Course Lavel");
	}
}
?>
	<form action="admin.php?page=addbranch" method="post">
<table width="80%" style="box-shadow:none">
<?php
$qry1="select distinct(name) from `".$wpdb->prefix."college_data`";
$re1=mysql_query($qry1);
echo "<tr><td>College</td><td><select name='s2' id='cou'>";
while($data=mysql_fetch_array($re1))
{
	echo "<option>".$data['name']."</option>";
}
echo "</td><td></td></tr>";
$qry="select distinct(name) from `".$wpdb->prefix."branches`";
$re=mysql_query($qry);
echo "<tr><td>Course</td><td><select name='s1' id='course'><option></option>";
while($data=mysql_fetch_array($re))
{
	echo "<option>".$data['name']."</option>";
}
echo "</td><td></td></tr></table>";
echo "<table style='box-shadow:none'><tr><td>Course Level</td><td>B.Tech<input type='radio' name='r1' value='B.Tech'></td><td>M.Tech<input type='radio' name='r1' value='M.Tech'></td><td>MCA<input type='radio' name='r1' value='MCA'></td><td>BCA<input type='radio' name='r1' value='BCA'></td><td>Diploma<input type='radio' name='r1' value='Diploma'></td></tr>";
echo "</table>";
echo "<table style='box-shadow:none'><tr><td>Branch Name</td><td><input type='text' name='t1'></td></tr>";
echo "<tr><td></td><td><input type='submit' name='addbranch' value='ADD BRANCH'></td></tr></table>";
?>
<?php
}
function addsyllabus($g,$b,$c,$d,$e) //this function allow to add syllabus
{$f="gg";
	?>
	<script> 
	var t=0; 
	$(document).ready(function(){
				$("#para").hide();
								$("#list").hide();
			$(document).tooltip();
			$("#level").click(function(){
				var dbname="<?php echo $b; ?>";
				var dbuser="<?php echo $c; ?>";
				var dbpassword="<?php echo $d; ?>";
				var dbhost="<?php echo $e; ?>";
		$.post('<?php echo home_url();?>/wp-content/plugins/addpage/demo1.php?mode=level',{dbname:dbname,dbuser:dbuser,dbpassword:dbpassword,dbhost:dbhost,s2:$("#cou").val(),s3:$("#level").val()},function(data){$("#branche").html(data)});
		})
$("#level").blur(function(){
				var dbname="<?php echo $b; ?>";
				var dbuser="<?php echo $c; ?>";
				var dbpassword="<?php echo $d; ?>";
				var dbhost="<?php echo $e; ?>";
		$.post('<?php echo home_url();?>/wp-content/plugins/addpage/demo1.php?mode=level',{dbname:dbname,dbuser:dbuser,dbpassword:dbpassword,dbhost:dbhost,s2:$("#cou").val(),s3:$("#level").val()},function(data){$("#branche").html(data)});
		})
		$("#la").click(function(){
		var va=$("#la").val();
		if(va=="Paragraph"){
		$("#para").show();
					$("#list").hide();
		}else
		{
			$("#list").show();
						$("#para").hide();
		}
			})
					$("select").blur(function(){
		var va=$("#la").val();
		if(va=="Paragraph"){
		$("#para").show();
					$("#list").hide();
		}if(va=="List")		{
			$("#list").show();
						$("#para").hide();
		}

})
			$("#adm").click(function(){
				t++;
				$("#admo").append('<tr id="list"><td width="38%">Objectives</td><td><input type="text" name="tt'+t+'"></tr>');
				document.getElementById("ob1").value=t;
				});

		});
	</script>
<form action="admin.php?page=addsyllabus" method="post">
<table width="80%" style="box-shadow:none">
	
	<?php
	if(isset($_POST['create']))
	{
		if(strlen($_POST['t2'])>4)
		{
			if(strlen($_POST['t3'])>2)
			{
				if(strlen($_POST['t21'])>1 && is_numeric($_POST['t21']))
				{
					if(strlen($_POST['t22'])>1 && is_numeric($_POST['t21']))
					{
						if(is_numeric($_POST['t23']))
						{
						if(strlen($_POST['t25'])>10 || strlen($_POST['tt0']) )
						{
						$qryu="select * from `".$wpdb->prefix."syllabi` where college='".$_POST['s2']."' AND level='".$_POST['s1']."' AND course='".$_POST['s4']."' AND subject='".$_POST['t2']."' AND semster='".$_POST['t1']."' AND subject_code='".$_POST['t3']." ".$_POST['tt3']."'";
						$resu=mysql_query($qryu);
						if(mysql_num_rows($resu)==0)
						{
							if($_POST['ob']=="Paragraph"){
						$qryu="insert into `".$wpdb->prefix."syllabi` values('".$_POST['s2']."','".$_POST['s4']."','".$_POST['s1']."','".$_POST['s4']."','".$_POST['t1']."','".$_POST['t2']."','".$_POST['t4']."','".$_POST['t3']." ".$_POST['tt3']."','".$_POST['s3']."','".$g."','0','".$_POST['t17']."','".$_POST['t18']."','".$_POST['t19']."','".$_POST['t21']."','".$_POST['t22']."','".$_POST['t23']."','".$_POST['t24']."','".$_POST['sel']."','".$_POST['ob']."')";
						$QRY=mysql_query($qryu);
						$qryr="select max(id) from `".$wpdb->prefix."syllabi`";
							$resr=mysql_query($qryr);
							$datas=mysql_fetch_array($resr);
						
	$qryu1="insert into `".$wpdb->prefix."objective` values('0','".$datas[0]."','".$_POST['t25']."')";
						$QRY1=mysql_query($qryu1);
						ok("Syllabus is Added");
					}else{
						$qryr="select max(id) from `".$wpdb->prefix."syllabi`";
							$resr=mysql_query($qryr);
							$datas=mysql_fetch_array($resr);
	$qryu="insert into syllabi values('".$_POST['s2']."','".$_POST['s4']."','".$_POST['s1']."','".$_POST['s4']."','".$_POST['t1']."','".$_POST['t2']."','".$_POST['t4']."','".$_POST['t3']." ".$_POST['tt3']."','".$_POST['s3']."','".$g."','0','".$_POST['t17']."','".$_POST['t18']."','".$_POST['t19']."','".$_POST['t21']."','".$_POST['t22']."','".$_POST['t23']."','".$_POST['t24']."','".$_POST['sel']."','".$_POST['ob']."')";
						$QRY=mysql_query($qryu);	
						for($o=0;$o<$_POST['ob1'];$o++){
										
	$qryu1="insert into `".$wpdb->prefix."objective` values('0','".$datas[0]."','".$_POST['tt'.$o]."')";
						$QRY1=mysql_query($qryu1);

						}
												ok("Syllabus is Added");
					}
						}else
						{
							error("This Subject Already Added");
						}
						}else
						{
							error("Enter The objectives");
						}
						
					}else
					{
						error("Enter The Total Marks");
					}
					}else
					{
						error("Enter The External Marks");
					}
				}else
				{
					error("Enter The Internal Marks");
				}
			}else
			{
				error("Enter The Subject Code");
			}
		}else
		{
			error("Please Enter Subject Full Name");
		}
	}
$qry="select distinct(college) from `".$wpdb->prefix."selectedbranch` where userid='".$g."'";
$re=mysql_query($qry);
echo "<tr><td>College</td><td><select name='s2' id='cou'>";
if(isset($_POST['s2'])){
echo "<option>".$_POST['s2']."</option>";
}else
{
echo "<option>................</option>";
}
while($data=mysql_fetch_array($re))
{
	echo "<option>".$data['college']."</option>";
}

echo "</td><td></td></tr>";
$qry1="select distinct(level) from `".$wpdb->prefix."selectedbranch`";
$re1=mysql_query($qry1);
echo "<tr><td>Course Level</td><td><select name='s1' id='level' title='Select the cusre'><option></option>";
if(isset($_POST['s1'])){
	echo "<option>".$_POST['s1']."</option>";
}
while($data1=mysql_fetch_array($re1))
{
	echo "<option>".$data1['level']."</option>";
}
echo "</td><td></td></tr>";
echo "<tr><td>Course</td><td><div id='branche'><select name='s4'><option>".$_POST['s4']."</option></select></div></td></tr>";

?>
					<tr><td>Batch</td><td><select name="sel" title="Select the batch"><option value='2011'>2011</option><option value='2012'>2012</option><option value='2013'>2013</option><option value='2014'>2014</option><option value='2015'>2015</option><option value='2016'>2016</option><option value='2017'>2017</option><option value='2018'>2018</option><option value='2019'>2019</option> <option value='2020'>2020</option></select></td></tr>
					</tr>
					<tr>
						<td>Semester</td><td><select name="t1" title="Select the semester"><option>1st</option><option>2nd</option><option>3rd</option><option>4th</option><option>5th</option><option>6th</option><option>7th</option><option>8th</option></select></td>
					</tr>
					<tr>
						<td>Subject(full name)</td><td><input type="text" title="Eneter subject name" name="t2" placeholder="Subject(full name)" required></td>
					</tr>
																<tr>
						<td>Subject(Short name)</td><td><input type="text" title ="Subject short name " name="t4" placeholder="short name" required></td>
					</tr> 

					<tr>
						<td>Subject Code</td><td><input type="text" name="t3" title="enter the subject code" placeholder="Char" required maxlength=5 style='width:100px'><input type="text" name="tt3" placeholder="Numeric" required style='width:100px'></td>
					</tr>
					<tr>
						<td>Subject Type</td><td><select name="s3" title="enter subject type"><option value="Theory">Theory</option><option value="Practical">Practical</option></select></td>
						<tr><td>LoadAllocation(Lecture,Tutorials,Paritical)</td><td><input title="Assign load Allocation" type="text" name="t17" style='width:20px'><input type="text" name="t18" style='width:20px'><input type="text" name="t19" style='width:20px'></td>
						</tr>
					</tr>
					<tr>
						<td>Marks Distribution(internal,external)</td><td><input title="Marks Distribution" type="text" name="t21" style='width:40px' placeholder="internal" required><input type="text" name="t22" style='width:40px' placeholder="external" required></td>
					</tr>
					<tr>
						<td>Total Marks</td><td><input type="text" name="t23" placeholder="Total Marks"  required></td>
					</tr>

					<tr>
						<td>Credits</td><td><input title="Assign the credits" type="text" name="t24" style='width:40px' placeholder="Credits"></td>
					</tr>
					<tr>
						<td>Select Objective layout</td><td><select name='ob' id="la"><option>Select Layout</option><option>Paragraph</option><option>List</option></select></td>
					</tr>
<tr id="para"><td>Objectives</td><td><textarea name='t25' rows=10 cols=50 ></textarea></td></tr>
<tr id="list"><td>Objectives</td><td><input type="text" name="tt0"><input type="button" value="Add More" id="adm"><input type="hidden" name="ob1" id="ob1"></td></tr>
</table><table id="admo" width="100%"></table><table>
						<tr>
						<td><input type="submit" value="CREATE" name="create"></td>
						</tr>
						
			</table>
<?php
}
function Download($g,$dbname,$dbuser,$dbpass,$dbhost) //this function is allow to download the final syllabus in pdf format
{
	?>
<script>
	$(document).ready(function(){
		$(document).tooltip();
						var dbname="<?php echo $dbname; ?>";
				var dbuser="<?php echo $dbuser; ?>";
				var dbpassword="<?php echo $dbpass; ?>";
				var dbhost="<?php echo $dbhost; ?>";
			$("#batch").click(function(){
		$.post('<?php echo home_url();?>/wp-content/plugins/addpage/demo1.php?mode=sem',{dbname:dbname,dbuser:dbuser,dbpassword:dbpassword,dbhost:dbhost,s5:$("#cou").val(),s4:$("#branchee").val(),s6:$("#level").val(),s8:$("#batch").val()},function(data){$("#semu").html(data)});
		})
		$("#batch").blur(function(){
		$.post('<?php echo home_url();?>/wp-content/plugins/addpage/demo1.php?mode=sem',{dbname:dbname,dbuser:dbuser,dbpassword:dbpassword,dbhost:dbhost,s5:$("#cou").val(),s4:$("#branchee").val(),s6:$("#level").val(),s8:$("#batch").val()},function(data){$("#semu").html(data)});
		})
		$("#a1").click(function(){
			$("#semu").hide();
			})
		$("#a1").blur(function(){
			$("#semu").hide();
			})

					$("#a2").click(function(){
			$("#semu").show();
			})
			$("#a2").blur(function(){
			$("#semu").show();
			})
		});
	</script>
<?php
$qry56="select * from `".$wpdb->prefix."selecttheme` where user='".$g."'";
$res56=mysql_query($qry56);
$data56=mysql_fetch_array($res56);
if($data56['theme']=="ptu.jpg")
{
echo "<form action='".plugins_url()."/addpage/file.php?id=$g' method='post'>";
}
elseif($data56['theme']=="iitr.jpg")
{
	echo "<form action='".plugins_url()."/addpage/file1.php?id=$g' method='post'>";
}
elseif($data56['theme']=="pun.jpg")
{
	echo "<form action='".plugins_url()."/addpage/file2.php?id=$g' method='post'>";
}
else
{
	echo "<form action='".plugins_url()."/addpage/file.php?id=$g' method='post'>";
}
echo "<input type='hidden' name='dbase' value='".$dbname."'>";
echo "<input type='hidden' name='dbuser' value='".$dbuser."'>";
echo "<input type='hidden' name='dbpass' value='".$dbpass."'>";
echo "<input type='hidden' name='dbhost' value='".$dbhost."'>";
echo "<input type='hidden' name='fileadd' value='".plugin_dir_path(__FILE__)."'>";
	$qry4="select DISTINCT (college) from  `".$wpdb->prefix."syllabi` where userid='".$g."'";
$result4=mysql_query($qry4);
echo "<table width=80%><tr><td>College</td><td><select name='s5' id='cou'>";
while($data4=mysql_fetch_array($result4))
{
echo "<option>".$data4['college']."</option>";
}
echo "</select></td></tr>";
$qry5="select DISTINCT (branch) from  `".$wpdb->prefix."syllabi` where userid='".$g."'";
$result5=mysql_query($qry5);
echo "<tr><td>Select Branch</td><td><select name='s4' id='branchee'><option></option>";
while($data5=mysql_fetch_array($result5))
{
echo "<option>".$data5['branch']."</option>";
}
echo "</select></td></tr>";
$qry3="select DISTINCT (level) from  `".$wpdb->prefix."syllabi` where userid='".$g."'";
$result3=mysql_query($qry3);
echo "<tr><td>Course Level</td><td><select name='s6' id='level'><option></option>";
while($data3=mysql_fetch_array($result3))
{
echo "<option>".$data3['level']."</option>";
}
echo "</select></td></tr>";
$qry7="select DISTINCT(batch) from `".$wpdb->prefix."syllabi` where userid='".$g."'";
$result7=mysql_query($qry7);
echo "<tr><td>Batch</td><td><select name='s8' id='batch'><option></option>";
while($data7=mysql_fetch_array($result7))
{
echo "<option value='".$data7['batch']."'>".$data7['batch']."</option>";
}
echo "</select></td></tr>";
echo "<tr><th>Are You Want Syllabus Batchwise</th></tr>";
echo "<tr><td><input type='radio' name='a3' id='a1' value='yes' required>Yes</td><td><input type='radio' name='a3' id='a2' value='no' required>No</td></tr>";
echo "<tr><td>Semester</td><td><div id='semu'><select></select></div></td></tr>";
echo "<tr><td><input type='submit' value='Download'></td></tr></table>"; 
}
function Pariticals($g,$b,$c,$d,$e) //this function is used to add paritical
{
if(isset($_POST['addf'])){
if(strlen($_POST['s8'])>1)
{
	if(strlen($_POST['s9'])>0)
	{
		if(strlen($_POST['s10'])>1)
		{
			if(strlen($_POST['t1'])>1)
			{
				$qry1="select * from `".$wpdb->prefix."paritical` where college='".$_POST['s5']."' AND level='".$_POST['s6']."' AND course='".$_POST['s4']."' AND batch='".$_POST['s8']."' AND sem='".$_POST['s9']."' AND subject='".$_POST['s10']."' AND pariticalname='".$_POST['t1']."'";
				$res1=mysql_query($qry1);
				if(mysql_num_rows($res1)==0)
				{
					if(strlen($_POST['v'])>0){
						for($i=0;$i<=$_POST['v'];$i++){
							if(strlen($_POST['v'.$i])>1){
 $qry2="insert into paritical values('".$_POST['s5']."','".$_POST['s6']."','".$_POST['s4']."','".$_POST['s8']."','".$_POST['s10']."','".$_POST['s9']."','".$_POST['obj']."','".$_POST['t1']."','".$_POST['v'.$i]."','0','".$_POST['id']."','Paritical')";	
$re1=mysql_query($qry2);
}}
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



?>
	<script>
	$(document).ready(function(){
		$(document).tooltip();
						var t=0;
		
						var dbname="<?php echo $b; ?>";
				var dbuser="<?php echo $c; ?>";
				var dbpassword="<?php echo $d; ?>";
				var dbhost="<?php echo $e; ?>";

			$("#batch").click(function(){
		$.post('<?php echo home_url();?>/wp-content/plugins/addpage/demo1.php?mode=sem',{dbname:dbname,dbuser:dbuser,dbpassword:dbpassword,dbhost:dbhost,s5:$("#cou").val(),s4:$("#branchee").val(),s6:$("#level").val(),s8:$("#batch").val()},function(data){$("#semu").html(data)});
		})
		$("#batch").blur(function(){
		$.post('<?php echo home_url();?>/wp-content/plugins/addpage/demo1.php?mode=sem',{dbname:dbname,dbuser:dbuser,dbpassword:dbpassword,dbhost:dbhost,s5:$("#cou").val(),s4:$("#branchee").val(),s6:$("#level").val(),s8:$("#batch").val()},function(data){$("#semu").html(data)});
		})
		$("#a1").click(function(){
			$("#semu").hide();
			})
					$("#a1").blur(function(){
			$("#semu").hide();
			})

					$("#a2").click(function(){
			$("#semu").show();
			})
					$("#a2").blur(function(){
			$("#semu").show();
			})
			$("#semu").click(function(){
			$.post('<?php echo home_url();?>/wp-content/plugins/addpage/demo1.php?mode=subject',{dbname:dbname,dbuser:dbuser,dbpassword:dbpassword,dbhost:dbhost,s5:$("#cou").val(),s4:$("#branchee").val(),s6:$("#level").val(),s8:$("#batch").val(),s9:$("#semo").val(),v:t},function(data){$("#subject").html(data)});
				})
							$("#semu").blur(function(){
			$.post('<?php echo home_url();?>/wp-content/plugins/addpage/demo1.php?mode=subject',{dbname:dbname,dbuser:dbuser,dbpassword:dbpassword,dbhost:dbhost,s5:$("#cou").val(),s4:$("#branchee").val(),s6:$("#level").val(),s8:$("#batch").val(),s9:$("#semo").val(),v:t},function(data){$("#subject").html(data)});
				})

				$("#ADD").click(function(){
			$.post('<?php echo home_url();?>/wp-content/plugins/addpage/demo1.php?mode=addpartical',{dbname:dbname,dbuser:dbuser,dbpassword:dbpassword,dbhost:dbhost,s5:$("#cou").val(),s4:$("#branchee").val(),s6:$("#level").val(),s8:$("#batch").val(),s9:$("#semo").val(),s10:$("#sujj").val(),t1:$("#pn").val(),t2:$("#st").val(),id:<?php echo $g; ?>,obj:$("#obj").val(),v:t},function(data){$("#result").html(data)});
					})
					$("#addm").click(function(){
							t++;
					document.getElementById("stft").value=t;
					$("#ss").append("<tr><td></td><td><input type='text' name=v"+t+"></td></tr>");
						})
		});
	</script>
<?php
echo "<form action='admin.php?page=Paritical' method='post'>";
echo "<div id='result'></div>";
	$qry4="select DISTINCT (college) from  `".$wpdb->prefix."syllabi` where userid='".$g."'";
$result4=mysql_query($qry4);
echo "<table width=80% id='ss'><tr><td>College</td><td><select name='s5' id='cou' title='select the college'><option>".$_POST['s5']."</option>";
while($data4=mysql_fetch_array($result4))
{
echo "<option>".$data4['college']."</option>";
}
echo "</select></td></tr>";
$qry5="select DISTINCT (branch) from  `".$wpdb->prefix."syllabi` where userid='".$g."'";
$result5=mysql_query($qry5);
echo "<tr><td>Select Branch</td><td><select name='s4' id='branchee' title='select the branch'><option>".$_POST['s4']."</option>";
while($data5=mysql_fetch_array($result5))
{
echo "<option>".$data5['branch']."</option>";
}
echo "</select></td></tr>";
$qry3="select DISTINCT (level) from  `".$wpdb->prefix."syllabi` where userid='".$g."'";
$result3=mysql_query($qry3);
echo "<tr><td>Course Level</td><td><select name='s6' id='level' title='select your course'><option>".$_POST['s6']."</option>";
while($data3=mysql_fetch_array($result3))
{
echo "<option>".$data3['level']."</option>";
}
echo "</select></td></tr>";
$qry7="select DISTINCT(batch) from `".$wpdb->prefix."syllabi` where userid='".$g."'";
$result7=mysql_query($qry7);
echo "<tr><td>Batch</td><td><select name='s8' id='batch' title='select batch'><option>".$_POST['s8']."</option>";
while($data7=mysql_fetch_array($result7))
{
echo "<option value='".$data7['batch']."'>".$data7['batch']."</option>";
}
echo "</select></td></tr>";
echo "<tr><td>Semester</td><td><div id='semu'><select><option value=''></option></select></div></td></tr>";
echo "<tr><td>Subject</td><td><div id='subject'><select></select></div></td></tr>";
echo "<tr><td>Practical Name</td><td><input type='text' name='t1' required id='pn'></td></tr>";
echo "<tr><td>Subtopic</td><td><input type='hidden' name='v' id='stft'><input type='text' name='v0' id='st'><input type='button' name='ty' id='addm' value='ADD MORE'></td></tr>";
echo "</table><table>";
echo "<tr><td valign='top'>Objectives</td><td><textarea name='obj' rows=10 cols=40 id='obj'></textarea></td></tr>";
echo "<tr><td><input type='submit' value='ADD' id='ADD' name='addf'></td></tr></table></form>"; 
}

function showp($g,$b,$c,$d,$e) //this function used for see the all pariticals
{?>
	<script>
	$(document).ready(function(){
$(document).tooltip();
						var dbname="<?php echo $b; ?>";
				var dbuser="<?php echo $c; ?>";
				var dbpassword="<?php echo $d; ?>";
				var dbhost="<?php echo $e; ?>";

			$("#batch").click(function(){
		$.post('<?php echo home_url();?>/wp-content/plugins/addpage/demo1.php?mode=sem',{dbname:dbname,dbuser:dbuser,dbpassword:dbpassword,dbhost:dbhost,s5:$("#cou").val(),s4:$("#branchee").val(),s6:$("#level").val(),s8:$("#batch").val()},function(data){$("#semu").html(data)});
		})
					$("#batch").blur(function(){
		$.post('<?php echo home_url();?>/wp-content/plugins/addpage/demo1.php?mode=sem',{dbname:dbname,dbuser:dbuser,dbpassword:dbpassword,dbhost:dbhost,s5:$("#cou").val(),s4:$("#branchee").val(),s6:$("#level").val(),s8:$("#batch").val()},function(data){$("#semu").html(data)});
		})
		$("#a1").click(function(){
			$("#semu").hide();
			})
		$("#a1").blur(function(){
			$("#semu").hide();
			})

					$("#a2").click(function(){
			$("#semu").show();
			})
			
					$("#a2").blur(function(){
			$("#semu").show();
			})
			$("#semu").click(function(){
			$.post('<?php echo home_url();?>/wp-content/plugins/addpage/demo1.php?mode=subject',{dbname:dbname,dbuser:dbuser,dbpassword:dbpassword,dbhost:dbhost,s5:$("#cou").val(),s4:$("#branchee").val(),s6:$("#level").val(),s8:$("#batch").val(),s9:$("#semo").val()},function(data){$("#subject").html(data)});
				})
							$("#semu").blur(function(){
			$.post('<?php echo home_url();?>/wp-content/plugins/addpage/demo1.php?mode=subject',{dbname:dbname,dbuser:dbuser,dbpassword:dbpassword,dbhost:dbhost,s5:$("#cou").val(),s4:$("#branchee").val(),s6:$("#level").val(),s8:$("#batch").val(),s9:$("#semo").val()},function(data){$("#subject").html(data)});
				})

				$("#AvDD").click(function(){
			$.post('<?php echo home_url();?>/wp-content/plugins/addpage/demo1.php?mode=particaly',{dbname:dbname,dbuser:dbuser,dbpassword:dbpassword,dbhost:dbhost,s5:$("#cou").val(),s4:$("#branchee").val(),s6:$("#level").val(),s8:$("#batch").val(),s9:$("#semo").val(),s10:$("#sujj").val(),t1:$("#pn").val(),t2:$("#st").val(),id:<?php echo $g; ?>,obj:$("#obj").val()},function(data){$("#resultt").html(data)});
					})
		});
	</script>

<?php
	$qry4="select DISTINCT (college) from  `".$wpdb->prefix."syllabi` where userid='".$g."'";
$result4=mysql_query($qry4);

echo "<table width=80%><tr><td>College</td><td><select name='s5' id='cou'>";
while($data4=mysql_fetch_array($result4))
{
echo "<option>".$data4['college']."</option>";
}
echo "</select></td></tr>";
$qry5="select DISTINCT (branch) from  `".$wpdb->prefix."syllabi` where userid='".$g."'";
$result5=mysql_query($qry5);
echo "<tr><td>Select Branch</td><td><select name='s4' id='branchee'><option></option>";
while($data5=mysql_fetch_array($result5))
{
echo "<option>".$data5['branch']."</option>";
}
echo "</select></td></tr>";
$qry3="select DISTINCT (level) from  `".$wpdb->prefix."syllabi` where userid='".$g."'";
$result3=mysql_query($qry3);
echo "<tr><td>Course Level</td><td><select name='s6' id='level'><option></option>";
while($data3=mysql_fetch_array($result3))
{
echo "<option>".$data3['level']."</option>";
}
echo "</select></td></tr>";
$qry7="select DISTINCT(batch) from `".$wpdb->prefix."syllabi` where userid='".$g."'";
$result7=mysql_query($qry7);
echo "<tr><td>Batch</td><td><select name='s8' id='batch'><option></option>";
while($data7=mysql_fetch_array($result7))
{
echo "<option value='".$data7['batch']."'>".$data7['batch']."</option>";
}
echo "</select></td></tr>";
echo "<tr><td>Semester</td><td><div id='semu'><select></select></div></td></tr>";
echo "<tr><td>Subject</td><td><div id='subject'><select></select></div></td></tr>";
echo "<tr><td><input type='submit' value='ADD' id='AvDD'></td></tr></table>"; 	
echo "<div id='resultt'></div>";
if(isset($_POST['del']))
{
	if(strlen($_POST['del'])>1)
	{
	$qry3="delete from `".$wpdb->prefix."paritical` where id='".$_POST['r']."'";
	$res=mysql_query($qry);
	ok("Paritical Is deleted");
	}
}
}
function aupu($g)
{
	if(isset($_POST['ok']))
	{
		if(strlen($_POST['t1'])>2)
		{
			if(strlen($_POST['t2'])>2)
			{
				if(strlen($_POST['t3'])>2)
				{
					$rt="select * from `".$wpdb->prefix."author` where name='".$_POST['t1']."'";
					$resa=mysql_query($rt);
					if(mysql_num_rows($resa)!=0)
					{
						error("This Auther is already added");
					}else
					{
						$rt1="insert into `".$wpdb->prefix."author` values('".$_POST['t1']."','0')";
						$ret=mysql_query($rt1);
					ok("Author is added");
					
					$rt1="select * from `".$wpdb->prefix."publisher` where publisher='".$_POST['t2']."'";
					$resa1=mysql_query($rt1);
					if(mysql_num_rows($resa1)!=0)
					{
						error("This Publisher is already added");
					}else
					{
						$rt11="insert into `".$wpdb->prefix."publisher` values('".$_POST['t2']."','".$_POST['t3']."','0')";
						$ret11=mysql_query($rt11);
					ok("Publisher is added");
					}
}
					
				}else{
							error("ENTER THE PUBLISHER ADDRESS");
				}
			}else
			{
							error("ENTER THE PUBLISHER NAME");
			}
		}else
		{
			error("ENTER THE AUTHER NAME");
		}
	}
echo "<form action='admin.php?page=aupu' method='post'>";
	echo "<table>";
	echo "<tr><td>Author Name</td><td><input type='text' name='t1' required></td></tr>";
	echo "<tr><td>Publisher Name</td><td><input type='text' name='t2' required></td></tr>";
	echo "<tr><td>Publisher Address</td><td><input type='text' name='t3' required></td></tr>";
	echo "<tr><td><input type='submit' name='ok'></td></tr>";
	echo"</table>";
	echo "</form>";
}
function advanceser($g,$b,$c,$d,$e)
{
	?>
		<script>
	$(document).ready(function(){
		$(document).tooltip();
			$("#level").click(function(){
				var dbname="<?php echo $b; ?>";
				var dbuser="<?php echo $c; ?>";
				var dbpassword="<?php echo $d; ?>";
				var dbhost="<?php echo $e; ?>";				
		$.post('<?php echo home_url();?>/wp-content/plugins/addpage/demo1.php?mode=referbooks',{dbname:dbname,dbuser:dbuser,dbpassword:dbpassword,dbhost:dbhost,s5:$("#cou").val(),s4:$("#level").val(),s6:$("#branchee").val()},function(data){$("#sub").html(data)});
		})
		$("#level").blur(function(){
				var dbname="<?php echo $b; ?>";
				var dbuser="<?php echo $c; ?>";
				var dbpassword="<?php echo $d; ?>";
				var dbhost="<?php echo $e; ?>";				
		$.post('<?php echo home_url();?>/wp-content/plugins/addpage/demo1.php?mode=referbooks',{dbname:dbname,dbuser:dbuser,dbpassword:dbpassword,dbhost:dbhost,s5:$("#cou").val(),s4:$("#level").val(),s6:$("#branchee").val()},function(data){$("#sub").html(data)});
		})
		$('#authe').click(function(){
var dbname='<?php echo $b; ?>';
var dbuser='<?php echo $c; ?>';
var dbpassword='<?php echo $d; ?>';
var dbhost='<?php echo $e; ?>';
$.post('<?php echo home_url();?>//wp-content/plugins/addpage/demo1.php?mode=referbookau',{dbname:dbname,dbuser:dbuser,dbpassword:dbpassword,dbhost:dbhost,s5:$('#authe').val()},function(data){$('#autho').html(data)});

			})
		});
	</script>

	<?php
if(isset($_POST['ins']))
{
	$c="c";
for($i=1;$i<=$_POST['arow'];$i++)
{
	if(isset($_POST['c'.$i]))
	{
$rqyu="select * from books where id='".$_POST[$c.$i]."'";
		$res=mysql_query($rqyu);
		$datah=mysql_fetch_array($res);
	$qrye="insert into `".$wpdb->prefix."book`(college,level,branch,subject,book_name,sem,author,publication,batch,year,pp,userid) values('".$_POST['s5']."','".$_POST['s4']."','".$_POST['s6R']."','".$_POST['s7']."','".$datah['title']."','".$_POST['s6']."','".$datah['author']."','".$datah['publisher']."','".$_POST['s16']."','".$datah['year']."','".$datah['pages']."','".$g."')";
	$res=mysql_query($qrye);
	ok("Record is stored");
	}
	$i++;
}
}
	echo "<form action='admin.php?page=advanceser' method='post'>";
echo "<table width=90%><tr><td>Select College</td><td><select name='s5' id='cou'>";
$qry6="select DISTINCT (college) from `".$wpdb->prefix."syllabi` where userid='".$g."'";
$result6=mysql_query($qry6);
while($data6=mysql_fetch_array($result6))
{
echo "<option>".$data6['college']."</option>";
}
echo "</select></td></tr>";
echo "<tr><td>Select Branch</td><td><select name='s6R' id='branchee' title='select branch'><option></option>";
$qry7="select DISTINCT (branch) from `".$wpdb->prefix."syllabi` where userid='".$g."'";
$result7=mysql_query($qry7);	
while($data7=mysql_fetch_array($result7))
{
echo "<option>".$data7['branch']."</option>";
}
echo "</select></td></tr>";
echo "<tr><td>Select Level</td><td><select name='s4' id='level' title='select leavel'><option></option>";
$qry5="select DISTINCT (level) from `".$wpdb->prefix."syllabi` where userid='".$g."'";
$result5=mysql_query($qry5);
while($data5=mysql_fetch_array($result5))
{
echo "<option>".$data5['level']."</option>";
}
echo "</select></td></tr>";

echo "<tr><td>Select Subject</td><td><div id='sub'><select><option></option></select></div></td></tr>";
$qry7="select DISTINCT(batch) from `".$wpdb->prefix."syllabi` where userid='".$g."'";
$result7=mysql_query($qry7);
echo "<tr><td>Batch</td><td><select name='s16'><option></option>";
while($data7=mysql_fetch_array($result7))
{
echo "<option value='".$data7['batch']."'>".$data7['batch']."</option>";
}
echo "</select></td></tr>"; 
echo "<tr><td>Semester</td><td><select name='s6'><option vlaue='1st'>1st</option><option vlaue='2nd'>2nd</option><option vlaue='3rd'>3rd</option><option vlaue='4th'>4th</option><option vlaue='5th'>5th</option><option vlaue='6th'>6th</option><option vlaue='7th'>7th</option><option vlaue='8th'>8th</option></select></td></tr>";
$qtt="select distinct(author) from `".$wpdb->prefix."books`";
$qett=mysql_query($qtt);
echo "<tr><td>Author</td><td><select name='t2' placeholder='Author' required id='authe'>";
while($datar=mysql_fetch_array($qett))
{
echo "<option>".$datar['author']."</option>";
}
echo "</td></tr></table>";
echo "<div id='autho'></div>";
echo "<table>";
echo "<tr><td><input type='submit' value='Insert' name='ins'></td></tr>";
echo "</table></form>";

}
?>
