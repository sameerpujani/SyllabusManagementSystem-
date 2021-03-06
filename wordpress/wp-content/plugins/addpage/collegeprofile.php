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
//add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
add_menu_page('CollegeProfile','college_profile','administrator','collegeprofile','collegeprofile','','top-level');
//add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );
add_submenu_page('collegeprofile','collegeprofilemenu','Add University','administrator','collegeprofilemenu','collegeprofile');
add_submenu_page('collegeprofile','college','All Universities','administrator','college','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','Update','administrator','update','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','Theme','editor','Theme','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','Insert Courses','editor','makesyllabus','collegeprofile');
add_submenu_page('collegeprofile', 'Add New User', 'Add User', 'editor', 'adduser', 'collegeprofile');
add_submenu_page('collegeprofile', 'Assign Courses', 'Assign Courses', 'editor', 'assigncourses', 'collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','','editor','addbranch','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','Add Syllabus','subscriber','addsyllabus','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','Add Author&Publisher','subscriber','aupu','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','Refer Books','subscriber','referbooks','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','Add Topic','subscriber','topics','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','ViewTopics','subscriber','topicview','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','ViewBook','subscriber','viewbook','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','Add Practical','subscriber','Paritical','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','Show Practical','subscriber','showp','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','PreView Syllabus','subscriber','preview','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','','subscriber','previewsyllabus','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','Update Syllabus','subscriber','syllabusupdate','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','Download','subscriber','Download','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','','subscriber','updated','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','','subscriber','viewstopics','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','','subscriber','actions','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','','subscriber','viewsbooks','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','','subscriber','advanceser','collegeprofile');
add_submenu_page('collegeprofile','collegeprofilemenu','TEST','subscriber','test','collegeprofile');
remove_menu_page('index.php');
}
require_once("function.php");
require_once("require/rand_fun.php");
require_once("db.php");

function error($error)   //this function used for error display
{
?>
<!--<script>
	$(document).ready(function(){
		$("#error").fadeOut(5000);
	});
	</script>-->
<?php
	echo "<div style='text:#FF0000' class='error' ><p><strong>ERROR : </strong>";
echo $error;
echo "</p></div>";
}
function ok($error)   //this function used for show ok status
{?>
<!--<script>
	$(document).ready(function(){
		$("#message").fadeOut(5000);
		});
	</script>
-->
<?php	
	echo "<div id='message' class='updated' ><p><strong>";
echo $error;
echo "</strong></p></div>";
}
function collegeprofile() //this function is provide the help to user for add the college ,update the college 
{
global $current_user;
global $wpdb;
	echo"<div id='form'>";
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
/*		if(strlen($_POST['t1'])>5)
		{
			if(preg_match("/[0-9]{6}/",$_POST['t6']))
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
									{*/
										$qry="select * from `".$wpdb->prefix."college_data` where `userid`='".$current_user->ID."' and `name`='".$_POST['t1']."' ";
$result=mysql_query($qry);
$data=mysql_fetch_array($result);
if(($data['userid']==$current_user->ID && $data['name']==$_POST['t1'] ) || ($data['email']==$_POST['t4']) )
{
	error("YOU HAVE ALREADY REGISTERED");
}
else
{
        echo $password = random();		//Generate Random Password
	$timestamp = date('Y-m-d H:i:s');	//timestamp
//	$qry1="INSERT INTO `".$wpdb->prefix."college_data` VALUES('0', '".$_POST['t1']."', '".$_POST['t2']."', '".$_POST['t10'].$_POST['t3']."', '".$_POST['t4']."', '".$_POST['t5']."', '".$current_user->ID."', '".$_POST['t8']."', '".$_POST['t6']."', '".$_POST['t11'].$_POST['t12']."', '".$_POST['long']."', '".$_POST['lati']."')";
//	$result1=mysql_query($qry1) or die('ERROR : '.mysql_error());

//USER IS EDITOR
	$insert_users = mysql_query("INSERT INTO `".$wpdb->prefix."users` VALUES('0', '".$_POST['username']."', '".MD5($password)."', '".$_POST['username']."', '".$_POST['t4']."', '".$_POST['url']."', '".$timestamp."', '', '', '".$_POST['first_name']." ".$_POST['last_name']."') ");
	$select_qry = mysql_query("SELECT `ID` FROM `".$wpdb->prefix."users` WHERE `user_email`='".$_POST['t4']."' ");
	$select_id = mysql_fetch_array($select_qry);
	$user_id = $select_id['ID'];

        $qry1="INSERT INTO `".$wpdb->prefix."college_data` VALUES('0', '".$_POST['t1']."', '".$_POST['t2']."', '".$_POST['t10'].$_POST['t3']."', '".$_POST['t4']."', '".$_POST['t5']."', '".$user_id."', '".$_POST['t8']."', '".$_POST['t6']."', '".$_POST['t11'].$_POST['t12']."', '".$_POST['long']."', '".$_POST['lati']."')";
        $result1=mysql_query($qry1) or die('ERROR : '.mysql_error());

/*	$array_qry = array(
			array(`user_id`=>$user_id, `meta_key`=>'first_name', `meta_value`=>$_POST['first_name']), array(`user_id`=>$user_id, `meta_key`=>'last_name', `meta_value`=>$_POST['last_name']), array(`user_id`=>$user_id, `meta_key`=>'nickname', `meta_value`=>$_POST['username']), array(`user_id`=>$user_id, `meta_key`=>'description', `meta_value`=>''), array(`user_id`=>$user_id, `meta_key`=>'rich_editing', `meta_value`=>'true'), array(`user_id`=>$user_id, `meta_key`=>'comment_shortcuts', `meta_value`=>'false'), array(`user_id`=>$user_id, `meta_key`=>'admin_color', `meta_value`=>'fresh'), array(`user_id`=>$user_id, `meta_key`=>'use_ssl', `meta_value`=>'0'), array(`user_id`=>$user_id, `meta_key`=>'show_admin_bar_front', `meta_value`=>'true'), array(`user_id`=>$user_id, `meta_key`=>'wp_capabilities', `meta_value`=>'a:1:{s:6:"editor";b:1;}'), array(`user_id`=>$user_id, `meta_key`=>'wp_user_level', `meta_value`=>'7'), array(`user_id`=>$user_id, `meta_key`=>'dismissed_wp_pointers', `meta_value`=>'wp350_media,wp360_revisions,wp360_locks,wp390_widgets')
			);
	foreach($array_qry as $data)
	{
	$insert_usermeta = $wpdb->insert($wpdb->prefix.'usermeta', $data);
	}*/
        $insert_users_meta_capabilities = mysql_query("INSERT INTO `".$wpdb->prefix."usermeta` VALUES('0', '".$user_id."', 'wp_capabilities', 'a:1:{s:6:\"editor\";b:1;}' ) ");
	$insert_users_meta_user_level = mysql_query("INSERT INTO `".$wpdb->prefix."usermeta` VALUES('0', '".$user_id."', 'wp_user_level', '7' ) ");

	ok("OK YOU ARE REGISTER");
}

								/*	}else
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
						}else
						{
						error("Enter the Valid Phone Number Format & code");
						}
					}else
					{
						error("ENTER THE ADDRESS(minimum 15 char)");
					}
				}else
				{
					error("ENTER THE CITY NAME");
				}
			}else
			{
				error("ENTER THE PIN CODE");
			}
		}else
		{
			error("ENTER THE COLLEGE NAME(minimum 6 char)");
			
		}
	}else
	{
		error("ENTER THE COLLEGE NAME");	*/
	}

 $qry3="select * from `".$wpdb->prefix."college_data` where `userid`='".$current_user->ID."'";
	$res3=mysql_query($qry3);
//$data3=mysql_fetch_array($res3);

if($_GET['page'])
{
	switch($_GET['page'])
	{
		case "update":
	if(isset($_POST['updated']))
	{
		collegeupdate($_POST['t1'],$_POST['t2'],$_POST['t3'],$_POST['t4'],$_POST['t5'],$_POST['t16'],$_POST['t17'],$_POST['t8'],$_POST['t9'],$_POST['id'],$current_user->ID);
	}
	
$qry3="select * from `".$wpdb->prefix."college_data` where userid='".$current_user->ID."' AND id='".$_POST['id']."'";
	$res3=mysql_query($qry3);
	if(mysql_num_rows($res3)==0)
	{
		error("Select The college");
	}else{
while ($data3=mysql_fetch_array($res3))
{
echo "<form action='admin.php?page=update' method='post'>";
echo "<table align='center' class='widefat'>";
echo "<tr><td><b>University Name</b></td><td width=100></td><td><input type='text' name='t1' value='".$data3['name']."' title='name'></td></tr>";
echo "<tr><td>City</td><td width=100></td><td><input type='text' name='t17' value='".$data3['city']."'></td></tr>";	
echo "<tr><td>Pin code</td><td width=100></td><td><input type='text' name='t8' value='".$data3['pin']."' maxlength=6></td></tr>";	
echo "<tr><td>Road</td><td width=100></td><td><input type='text' name='t9' value='".$data3['road']."'></td></tr>";	
echo "<tr><td>Address</td><td width=100></td><td><input type='text' name='t2' value='".$data3['address']."'></td></tr>";
echo "<tr><td>Phone</td><td width=100></td><td><input type='text' name='t3' value='".$data3['phone']."' maxlength='10'></td></tr>";
echo "<tr><td>Email</td><td width=100></td><td><input type='text' name='t4' value='".$data3['email']."'></td></tr>";
echo "<tr><td>State</td><td width=100></td><td><input type='text' name='t5' value='".$data3['state']."'></td></tr>";
echo "<tr><td>University</td><td width=100></td><td><input type='text' name='t16' value='".$data3['uni']."'></td></tr>";
echo "<input type='hidden' value='".$data3['id']."' name='id'>";
echo "<tr><td><input type='submit' name='updated' value='Update University' class='button-primary' /></td></tr></table></form>";
}
}
break;

case "collegeprofile":
about();
break;

case "adduser":
adduser($current_user->ID,DB_NAME,DB_USER,DB_PASSWORD,DB_HOST);
break;

case "assigncourses":
assigncourses($current_user->ID,DB_NAME,DB_USER,DB_PASSWORD,DB_HOST);
break;

case "college":
	$qry3="select * from `".$wpdb->prefix."college_data`";
	$res3=mysql_query($qry3);
	echo "<table border=1 class='widefat'>";
	echo "<tr><th>Name</th><th>City</th><th>Pin Code</th><th>Road</th><th>Phone</th><th>email</th><th>State</th><th>University</th><th>Action</th></tr>";
while ($data3=mysql_fetch_array($res3))
{
echo "<form action='admin.php?page=update' method='post'>";
echo "<tr><td>".$data3['name']."</td><td>".$data3['city']."</td><td>".$data3['pin']."</td><td>".$data3['road']."</td><td>".$data3['phone']."</td><td>".$data3['email']."</td><td>".$data3['state']."</td><td>".$data3['uni']."</td><input type='hidden'  value='".$data3['id']."' name='id'><td><input type='submit' name='update' value='Update' class='button-primary'></td></tr></form>";	
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
Pariticals($current_user->ID,DB_NAME,DB_USER,DB_PASSWORD,DB_HOST);
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

case "collegeprofilemenu": ?>
<script>
 $(document).ready(function(){
	 $(document).tooltip();
	 });
</script>
<form action="admin.php?page=collegeprofilemenu" method="post">
<h1>Add University</h1>
		<table align="center" border="0" class="form-table">
				<tr><td><b>University Name*</b></td><td width=6%></td><td width=30%><input type="text" name="t1" placeholder="Enter University Name" required></td><td width=30%></td></tr>
                                <tr><td><b>Username*</b></td><td width=6%></td><td width=30%><input type="text" name="username" placeholder="Login Username" required></td><td width=30%></td></tr>
                                <tr><td><b>First Name</b></td><td width=6%></td><td width=30%><input type="text" name="first_name" placeholder="First Name of University Admin" /></td><td width=30%></td></tr>
                                <tr><td><b>Last Name</b></td><td width=6%></td><td width=30%><input type="text" name="last_name" placeholder="Last Name of University Admin" /></td><td width=30%></td></tr>
				<tr><td colspan=4 align='center'><h2><u>Address</u></h2></td></tr>
				<tr><td><b>City*</b></td><td width=6%></td><td><input type="text" name="t8" placeholder="Enter City" required /></td><td width=30%></td></tr>
				<tr><td><b>Pin Code*</b></td><td width=6%></td><td width=30%><input type="text" class="pin" name="t6" placeholder="Pin code" required /></td><td width=30%><span class="change" style="color:#FF0000;display:none;">Please Enter 6 digit PIN Code</span></td></tr>
				<tr><td><b>State*</b></td><td width=6%></td><td width=30%><input type="text" name="t5" placeholder="State" required /></td><td width=30%></td></tr>
				<tr><td valign=top><b>Enter full Address*</b></td><td width=6%></td><td width=30%><textarea rows="10" cols="40" name="t2" required></textarea></td><td width=30%></td></tr>
				<tr><td><b>Longitute</b></td><td width=6%></td><td width=30%><input type="text" name="long" placeholder="Longitute" /></td><td width=30%></td></tr>
		        	<tr><td><b>Latitube</b></td><td width=6%></td><td width=30%><input type="text" name="lati" placeholder="Latitube" /></td><td width=30%></td></tr>
				<tr><td><b>Enter Mobile*</b></td><td width=6%></td><td width=30%><input type="text" name="t10" placeholder="+91" required style="width:40px" maxlength="3"><input type="text" name="t3" placeholder="Mobile number" required style="width:200px"></td><td width=30%></td></tr>
				<tr><td><b>Enter Phone Number*</b></td><td width=6%></td><td width=30%><input type="text" name="t11" placeholder="Code" required style="width:100px" ><input type="text" name="t12" placeholder="STD" required style="width:100px"></td><td width=30%></td></tr>
				<tr><td><b>E-mail*</b></td><td width=6%></td><td width=30%><input type="text" name="t4" placeholder="Email Id" required></td><td width=30%></td></tr>
                                <tr><td><b>Website</b></td><td width=6%></td><td width=30%><input type="text" name="url" placeholder="Enter URL" /></td><td width=30%></td></tr>
				<tr><td><input type="submit" class="button button-primary button-large" name="add" value="Add University"></td></tr>
		</table>
</form>
<?php
break;

case "test":
?>
<script>
//alert("ALERT");
$(document).ready(function(){
alert("DDDDDDDDDDDDDFGGGGGGGG");
});
</script>
<?php
echo "test";

$qry1 = mysql_query("SELECT wp_college_data.id, wp_college_data.userid, wp_college_data.name, wp_selectedbranch.id, wp_selectedbranch.course, wp_branches.name, wp_branches.subbranch FROM wp_branches, wp_college_data, wp_selectedbranch, wp_users WHERE wp_selectedbranch.userid='".$current_user->ID."' AND wp_selectedbranch.college=wp_college_data.id AND wp_selectedbranch.branch=wp_branches.id AND wp_college_data.userid=wp_users.id   ") OR mysql_error('ERROR : '. die());

/*echo "SELECT wp_college_data.id, wp_college_data.userid, wp_college_data.name, wp_selectedbranch.id, wp_selectedbranch.course, wp_branches.name, wp_branches.subbranch

FROM wp_branches, wp_college_data, wp_selectedbranch

WHERE wp_selectedbranch.userid = '2'

AND wp_selectedbranch.college = 'wp_college_data.id'

AND wp_selectedbranch.branch = 'wp_branches.id'

LIMIT 0 , 30";*/

$qry = mysql_fetch_array($qry1);
echo $a = mysql_num_rows($qry1);
print_r($qry);
echo "wp_college_data->id : ".$qry['id'];
echo "<br/>wp_college_data->userid : ".$qry['userid'];
echo "<br/>wp_college_data->name : ".$qry['name'];
echo "<br/>wp_selectedbranch->id : ".$qry['id'];
echo "<br/>wp_selectedbranch->course : ".$qry['course'];
echo "<br/>wp_branches->Name : ".$qry['name'];
echo "<br/>wp_branches->SubBranch : ".$qry['subbranch'];
//echo "<br/>";

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
