<?php
/*
 Plugin Name:Syllabus Management System
  Plugin url:http://hiteshkumarsofat.wordpress.com
  Description:this plugin is provide the help to create the syllabus of colleges.
  Author:hitesh rockx
  version:1.0
*/


add_action('admin_enqueue_scripts','myscript'); //this function used for add the all script file in plugin (style,javascript)	
function myscript()
{
wp_enqueue_script('jquery.ui.tabs',plugins_url('jquery.ui.tabs.js',__FILE__));
wp_enqueue_script('jquery.ui.spinner',plugins_url('jquery.ui.spinner.js',__FILE__));
wp_enqueue_script('jquery.ui.sortable',plugins_url('jquery.ui.sortable.js',__FILE__));
wp_enqueue_script('jquery.ui.selectable',plugins_url('jquery.ui.selectable.js',__FILE__));
wp_enqueue_script('jquery.ui.resizable',plugins_url('jquery.ui.resizable.js',__FILE__));
wp_enqueue_script('jquery.ui.progressbar',plugins_url('jquery.ui.progressbar.js',__FILE__));
wp_enqueue_script('jquery.ui.mouse',plugins_url('jquery.ui.mouse.js',__FILE__));
wp_enqueue_script('jquery.ui.menu',plugins_url('jquery.ui.menu.js',__FILE__));
wp_enqueue_script('jquery.ui.effect-shake',plugins_url('jquery.ui.effect-shake.js',__FILE__));
wp_enqueue_script('jquery.ui.effect-scale',plugins_url('jquery.ui.effect-scale.js',__FILE__));
wp_enqueue_script('jquery.ui.effect-pulsate',plugins_url('jquery.ui.effect-pulsate.js',__FILE__));
wp_enqueue_script('jquery.ui.effect-highlight',plugins_url('jquery.ui.effect-highlight.js',__FILE__));
wp_enqueue_script('jquery.ui.effect-fold',plugins_url('jquery.ui.effect-fold.js',__FILE__));
wp_enqueue_script('jquery.ui.effect-fade',plugins_url('jquery.ui.effect-fade.js',__FILE__));
wp_enqueue_script('jquery.ui.effect-explode',plugins_url('jquery.ui.effect-explode.js',__FILE__));
wp_enqueue_script('jquery.ui.effect-drop',plugins_url('jquery.ui.effect-drop.js',__FILE__));
wp_enqueue_script('jquery.ui.effect-clip',plugins_url('jquery.ui.effect-clip.js',__FILE__));
wp_enqueue_script('jquery.ui.effect-bounce',plugins_url('jquery.ui.effect-bounce.js',__FILE__));
wp_enqueue_script('jquery.ui.effect-blind',plugins_url('jquery.ui.effect-blind.js',__FILE__));
wp_enqueue_script('jquery.ui.effect',plugins_url('jquery.ui.effect.js',__FILE__));
wp_enqueue_script('jquery.ui.droppable',plugins_url('jquery.ui.droppable.js',__FILE__));
wp_enqueue_script('jquery.ui.draggable',plugins_url('jquery.ui.draggable.js',__FILE__));
wp_enqueue_script('jquery.ui.dialog',plugins_url('jquery.ui.dialog.js',__FILE__));
wp_enqueue_script('jquery.ui.datepicker',plugins_url('jquery.ui.datepicker.js',__FILE__));
wp_enqueue_script('jquery.ui.autocomplete',plugins_url('jquery.ui.autocomplete.js',__FILE__));
wp_enqueue_script('jquery.ui.autocomplete',plugins_url('jquery.ui.autocomplete.js',__FILE__));
wp_enqueue_script('jquery.ui.accordion',plugins_url('jquery.ui.accordion.js',__FILE__));	
wp_enqueue_script('jquery-1.9.1',plugins_url('jquery-1.9.1.js',__FILE__));
wp_enqueue_script('jquery.ui.core',plugins_url('jquery.ui.core.js',__FILE__));
wp_enqueue_script('jquery.ui.widget',plugins_url('jquery.ui.widget.js',__FILE__));
wp_enqueue_script('jquery.ui.position',plugins_url('jquery.ui.position.js',__FILE__));
wp_enqueue_script('jquery.ui.tooltip',plugins_url('jquery.ui.tooltip.js',__FILE__));
wp_enqueue_style('syllabus',plugins_url('style.css',__FILE__));
}
add_action('admin_menu','collegeprofilemenu');
function collegeprofilemenu()
{
add_menu_page('CollegeProfile','college_profile','administrator','collegeprofile','collegeprofile','','top-level');
add_submenu_page('collegeprofile','collegeprofilemenu','Add College','subscriber','collegeprofilemenu','collegeprofile');
add_submenu_page('collegeprofile','college','Colleges','subscriber','college','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','Update','subscriber','update','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','Theme','subscriber','Theme','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','Create Syllabus','subscriber','makesyllabus','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','Add Syllabus','subscriber','addsyllabus','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','Add Author&Publisher','subscriber','aupu','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','Refer Books','subscriber','referbooks','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','Add Topic','subscriber','topics','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','ViewTopics','subscriber','topicview','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','ViewBook','subscriber','viewbook','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','Add Paritical','subscriber','Paritical','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','Show Paritical','subscriber','showp','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','PreView Syllabus','subscriber','preview','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','','subscriber','previewsyllabus','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','Update Syllabus','subscriber','syllabusupdate','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','Download','subscriber','Download','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','','subscriber','updated','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','','subscriber','viewstopics','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','','subscriber','actions','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','','subscriber','viewsbooks','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','','subscriber','addbranch','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','','subscriber','advanceser','collegeprofile');
remove_menu_page('index.php');
}
require_once("function.php");
require_once("db.php");
function error($error)   //this function used for error display
{
?>
<script>
	$(document).ready(function(){
		$("#error").fadeOut(5000);
		});
	</script>
<?php
	echo "<div class='error' id='error'><p><strong>";
echo $error;
echo "</strong></p></div>";
}
function ok($error)   //this function used for show ok stutas
{?>
<script>
	$(document).ready(function(){
		$("#message").fadeOut(5000);
		});
	</script>

<?php	
	echo "<div id='message' class='updated' ><p><strong>";
echo $error;
echo "</strong></p></div>";
}
function collegeprofile() //this function is provide the help to user for add the college ,update the college 
{
global $current_user;
	echo"<div id='form'>";
	if(isset($_POST['add']))
	{
		if(strlen($_POST['t1'])>5)
		{
			if(preg_match("/[0-9]{6}/",$_POST['t6']))
			{
				if(strlen($_POST['t7'])>2)
				{
					if(strlen($_POST['t8'])>2)
					{
			if($_POST['t2'])
			{
				if(preg_match("/[0-9]{2}/",$_POST['t10']))
				{
				if(preg_match("/[0-9]{10}/",$_POST['t3']))
				{
					if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',$_POST['t4']))
					{
						if(strlen($_POST['t5'])>2)
						{
							if(strlen($_POST['t16'])>2)
							{
								$qry="select * from college_data where userid='".$current_user->ID."' and name='".$_POST['t1']."'";
$result=mysql_query($qry);
$data=mysql_fetch_array($result);
if($data['userid']==$current_user->ID && $data['name']==$_POST['t1'] || $data['email']==$_POST['t4'])
{
	error("YOU ALREADY REGISTER");
}
else{
$qry1="insert into college_data values('".$_POST['t1']."','".$_POST['t2']."','".$_POST['t10'].$_POST['t3']."','".$_POST['t4']."','".$_POST['t5']."','".$_POST['t16']."','".$current_user->ID."','".$_POST['t8']."','".$_POST['t6']."','".$_POST['t7']."','0','".$_POST['t11'].$_POST['t12']."','".$_POST['long']."','".$_POST['lati']."')";
$result1=mysql_query($qry1);
ok("OK YOU ARE REGISTER");
}
							}else
							{
								error("Enter the University Name");
							}
						}else
						{
							error("Enter the State Name");
						}
					}else
					{
						error("Enter the Vaild email");
					}
					
		
				}else
				{
					error("Enter the Valid Phone Number Format");
				}
			}
			else{
				error("Enter the Valid Phone Number Format & code");
			}
		}
			else{
				error("ENTER THE ADDRESS(minimum 15 char)");
			}
									}else
		{
			error("ENTER THE CITY NAME");
		}
		}else
		{
			error("ENTER THE ROAD DETAILS");
		}
		}else
		{
			error("ENTER THE PIN CODE");
		}
			}
			else
			{
				error("ENTER THE COLLEGE NAME(minimum 6 char)");
			
			}
	}else
	{
//		error("ENTER THE COLLEGE NAME");
	}
 $qry3="select * from college_data where userid='".$current_user->ID."'";
	$res3=mysql_query($qry3);
$data3=mysql_fetch_array($res3);

if($_GET['page'])
{
	switch($_GET['page'])
	{
		case "update":
	if(isset($_POST['updated']))
	{
		collegeupdate($_POST['t1'],$_POST['t2'],$_POST['t3'],$_POST['t4'],$_POST['t5'],$_POST['t16'],$_POST['t17'],$_POST['t8'],$_POST['t9'],$_POST['id'],$current_user->ID);
	}
	
$qry3="select * from college_data where userid='".$current_user->ID."' AND id='".$_POST['id']."'";
	$res3=mysql_query($qry3);
	if(mysql_num_rows($res3)==0)
	{
		error("Select The college");
	}else{
while ($data3=mysql_fetch_array($res3))
{
echo "<form action='admin.php?page=update' method='post'>";
echo "<table align='center'>";
echo "<tr><td>Name</td><td width=100></td><td><input type='text' name='t1' value='".$data3['name']."' title='name'></td></tr>";	
echo "<tr><td>City</td><td width=100></td><td><input type='text' name='t17' value='".$data3['city']."'></td></tr>";	
echo "<tr><td>Pin code</td><td width=100></td><td><input type='text' name='t8' value='".$data3['pin']."' maxlength=6></td></tr>";	
echo "<tr><td>Road</td><td width=100></td><td><input type='text' name='t9' value='".$data3['road']."'></td></tr>";	
echo "<tr><td>Address</td><td width=100></td><td><input type='text' name='t2' value='".$data3['address']."'></td></tr>";
echo "<tr><td>Phone</td><td width=100></td><td><input type='text' name='t3' value='".$data3['phone']."' maxlength='10'></td></tr>";
echo "<tr><td>Email</td><td width=100></td><td><input type='text' name='t4' value='".$data3['email']."'></td></tr>";
echo "<tr><td>State</td><td width=100></td><td><input type='text' name='t5' value='".$data3['state']."'></td></tr>";
echo "<tr><td>University</td><td width=100></td><td><input type='text' name='t16' value='".$data3['uni']."'></td></tr>";
echo "<input type='hidden' value='".$data3['id']."' name='id'>";
echo "<tr><td><input type='submit' name='updated' value='UPDATE'></td></tr></table></form>";	
}
}
break;
case "collegeprofile":
about();
break;
case "college":
	$qry3="select * from college_data where userid='".$current_user->ID."'";
	$res3=mysql_query($qry3);
	echo "<table border=1>";
	echo "<tr><th>Name</th><th>City</th><th>Pin Code</th><th>Road</th><th>Phone</th><th>email</th><th>State</th><th>University</th></tr>";
while ($data3=mysql_fetch_array($res3))
{
echo "<form action='admin.php?page=update' method='post'>";
echo "<tr><td>".$data3['name']."</td><td>".$data3['city']."</td><td>".$data3['pin']."</td><td>".$data3['road']."</td><td>".$data3['phone']."</td><td>".$data3['email']."</td><td>".$data3['state']."</td><td>".$data3['uni']."</td><td><input type='hidden'  value='".$data3['id']."' name='id'></td><td><input type='submit' name='update' value='UPDATE'></tr></form>";	
}
echo "</table>";	
break;
case "Theme":
theme($current_user->ID);
break;
case "makesyllabus":
make_syllabus($current_user->ID,DB_NAME,DB_USER,DB_PASSWORD,DB_HOST);
break;
case "referbooks":
referbooks($current_user->ID,DB_NAME,DB_USER,DB_PASSWORD,DB_HOST);
break;
case "topics":
topic($current_user->ID,DB_NAME,DB_USER,DB_PASSWORD,DB_HOST);
break; 
case "preview":
preview($current_user->ID,DB_NAME,DB_USER,DB_PASSWORD,DB_HOST);
break;
case "previewsyllabus":
previewsyllabus($current_user->ID,DB_NAME,DB_USER,DB_PASSWORD,DB_HOST);
break;
case "syllabusupdate":
syllabusupdate($current_user->ID,DB_NAME,DB_USER,DB_PASSWORD,DB_HOST);
break;
case "updated":
updated($_POST['subject']);
break;
case "topicview":
viewtopics($current_user->ID,DB_NAME,DB_USER,DB_PASSWORD,DB_HOST);
break;
case "viewstopics":
viewstopics($current_user->ID);
break;
case "actions":
actions($_GET['value'],$_GET['id'],$current_user->ID);
break;
case "viewbook":
viewbook($current_user->ID);
break;
case "viewsbooks":
viewbooks($current_user->ID,$_POST['s5'],$_POST['s4'],$_POST['s9'],$_POST['s7']);
break;
case "addbranch":
addbranch($current_user->ID);
break;
case "addsyllabus":
addsyllabus($current_user->ID,DB_NAME,DB_USER,DB_PASSWORD,DB_HOST);
break;
case "Download":
Download($current_user->ID,DB_NAME,DB_USER,DB_PASSWORD,DB_HOST);
break;
case "Paritical":
Paritical($current_user->ID,DB_NAME,DB_USER,DB_PASSWORD,DB_HOST);
break;
case "showp":
showp($current_user->ID,DB_NAME,DB_USER,DB_PASSWORD,DB_HOST);
break;
case "aupu":
aupu($current_user->ID);
break;
case "advanceser":
advanceser($current_user->ID,DB_NAME,DB_USER,DB_PASSWORD,DB_HOST);
break;
case "collegeprofilemenu":?>
<script>
 $(document).ready(function(){
	 $(document).tooltip();
	 });
</script>
<form action="admin.php?page=collegeprofilemenu" method="post">
<h1>College Information</h1>
		<table align="center">
			    <tr>
				<td><b>Enter Full College Name</b></td><td width=6%></td><td><input type="text" name="t1" placeholder="College name" title="Enter The College Name" required></td></tr>
				<tr><th colspan=4><h2><u>Address</u></h2></th></tr>
				<tr><td><b>Pin Code</b></td><td width=6%></td><td><input type="text" name="t6" placeholder="Pin code" required title="Enter The Pin Code"></td></tr>
				<tr><td><b>Road</b></td><td width=6%></td><td><input type="text" name="t7" placeholder="About Road" required title="About Road"></td></tr>
				<tr><td><b>City</b></td><td width=6%></td><td><input type="text" name="t8" placeholder="City" required title="About City"></td></tr>
				<tr><td><b>Longitute</b></td><td width=6%></td><td><input title="Enter Longitutu" type="text" name="long" placeholder="Longitute" required></td></tr>
		        <tr><td><b>Latitube</b></td><td width=6%></td><td><input title="Enter the Latitube" type="text" name="lati" placeholder="Latitube" required></td></tr>    
				<tr><td><b>Enter State</b></td><td width=6%></td><td><input title="Enter the state" type="text" name="t5" placeholder="State" required></td></tr>
				<tr><td valign=top><b>Enter full Address</b></td><td width=6%></td><td><textarea rows="10" cols="40" name="t2" required></textarea></td></tr>
				<tr><td><b>Enter Mobile</b></td><td width=6%></td><td><input title="Enter the mobile number" type="text" name="t10" placeholder="+91" required style="width:40px" maxlength="2"><input type="text" name="t3" placeholder="Phone number" required style="width:200px"></td></tr>
				<tr><td><b>Enter Phone Number</b></td><td width=6%></td><td><input title="Enter the phone number" type="text" name="t11" placeholder="Code" required style="width:100px" ><input type="text" name="t12" placeholder="STD" required style="width:100px"></td></tr>
				<tr><td><b>Enter Email</b></td><td width=6%></td><td><input title="Enter the email id" type="text" name="t4" placeholder="Email Id" required></td></tr>
				<tr><td><b>Enter University Name</b></td><td width=6%></td><td><input title="Enter university name" type="text" name="t16" placeholder="Enter University Name" required></td></tr>
				<tr><td><input type="submit" name="add" value="Add College"></td></tr>
			</table>
</form>
<?php
break;
	}
}else
{
echo "<form action='admin.php?page=update' method='post'>";
echo "<table align='center'>";
echo "<tr><td>Name</td><td width=100></td><td>".$data3['name']."</td></tr>";	
echo "<tr><td>Address</td><td width=100></td><td>".$data3['address']."</td></tr>";
echo "<tr><td>Phone</td><td width=100></td><td>".$data3['phone']."</td></tr>";
echo "<tr><td>Email</td><td width=100></td><td>".$data3['email']."</td></tr>";
echo "<tr><td>State</td><td width=100></td><td>".$data3['state']."</td></tr>";
echo "<tr><td>University</td><td width=100></td><td>".$data3['uni']."</td></tr>";
echo "<tr><td><input type='submit' name='update' value='UPDATE'></td></tr></table>"; 

}
	?>
		
	</div>
	</body>


<?php

}
?>
