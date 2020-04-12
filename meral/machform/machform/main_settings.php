<?php
/********************************************************************************
 MachForm
  
 Copyright 2007-2014 Appnitro Software. This code cannot be redistributed without
 permission from http://www.appnitro.com/
 
 More info at: http://www.appnitro.com/
 ********************************************************************************/	
	require('includes/init.php');
	
	require('config.php');
	require('includes/db-core.php');
	require('includes/helper-functions.php');
	require('includes/check-session.php');
	
	require('includes/filter-functions.php');
	require('includes/entry-functions.php');
	
	$dbh = mf_connect_db();
	$mf_settings = mf_get_settings($dbh);

	//check user privileges, is this user has privilege to administer MachForm?
	if(empty($_SESSION['mf_user_privileges']['priv_administer'])){
		$_SESSION['MF_DENIED'] = "You don't have permission to administer MachForm.";

		$ssl_suffix = mf_get_ssl_suffix();						
		header("Location: http{$ssl_suffix}://".$_SERVER['HTTP_HOST'].mf_get_dirname($_SERVER['PHP_SELF'])."/restricted.php");
		exit;
	}

	//handle form submission if there is any
	if(!empty($_POST['submit_form'])){

		$admin_theme 			= $_POST['admin_theme'];
		$smtp_enable 			= $_POST['smtp_enable'];
		$smtp_host 	 			= $_POST['smtp_host'];
		$smtp_auth   			= $_POST['smtp_auth'];
		$smtp_secure 			= $_POST['smtp_secure'];
		$smtp_username 			= $_POST['smtp_username'];
		$smtp_password 			= $_POST['smtp_password'];
		$smtp_port 	   			= $_POST['smtp_port'];
		$admin_image_url   		= $_POST['admin_image_url'];
		$base_url   			= $_POST['base_url'];
		$default_from_name   	= $_POST['default_from_name'];
		$default_from_email   	= $_POST['default_from_email'];
		$upload_dir   			= $_POST['upload_dir'];
		$form_manager_max_rows  = $_POST['form_manager_max_rows'];
		$disable_machform_link  = $_POST['disable_machform_link'];
		$enforce_tsv  			= $_POST['enforce_tsv'];
		$enable_ip_restriction  = $_POST['enable_ip_restriction'];
		$ip_whitelist  			= $_POST['ip_whitelist'];
		$enable_account_locking		= $_POST['enable_account_locking'];
		$account_lock_period	    = (int) $_POST['account_lock_period'];
		$account_lock_max_attempts	= (int) $_POST['account_lock_max_attempts'];
		$default_form_theme_id	    = (int) $_POST['default_form_theme_id'];

		//if account lock settings empty, set the default max attempts = 6 and lock period = 30 minutes
		//these defaults are based on PCI DSS standard
		if(empty($account_lock_period)){
			$account_lock_period = 30;
		}
		if(empty($account_lock_max_attempts)){
			$account_lock_max_attempts = 6;
		}
		
		//save the settings	
		$settings['smtp_enable'] 			= (int) $smtp_enable;
		$settings['smtp_host'] 				= $smtp_host;
		$settings['smtp_auth'] 				= $smtp_auth;
		$settings['smtp_secure']		 	= $smtp_secure;
		$settings['smtp_username'] 			= $smtp_username;
		$settings['smtp_password'] 			= $smtp_password;
		$settings['smtp_port'] 				= $smtp_port;
		$settings['admin_image_url'] 		= $admin_image_url;
		$settings['base_url'] 				= $base_url;
		$settings['default_from_name'] 		= $default_from_name;
		$settings['default_from_email'] 	= $default_from_email;
		$settings['upload_dir'] 			= $upload_dir;
		$settings['form_manager_max_rows'] 	= $form_manager_max_rows;
		$settings['disable_machform_link'] 	= $disable_machform_link;
		$settings['enforce_tsv'] 			= $enforce_tsv;
		$settings['admin_theme'] 			= $admin_theme;
		$settings['enable_ip_restriction'] 	= $enable_ip_restriction;
		$settings['ip_whitelist'] 			= $ip_whitelist;
		$settings['enable_account_locking']	= $enable_account_locking;
		$settings['account_lock_period'] 	= $account_lock_period;
		$settings['account_lock_max_attempts'] 	= $account_lock_max_attempts;
		$settings['default_form_theme_id'] 	= $default_form_theme_id;

		mf_ap_settings_update($settings,$dbh);
		$_SESSION['MF_SUCCESS'] = 'System settings has been saved.';

		$mf_settings = mf_get_settings($dbh);
		
	}else{

		$smtp_enable 			= $mf_settings['smtp_enable'];
		$smtp_host 	 			= $mf_settings['smtp_host'];
		$smtp_auth   			= $mf_settings['smtp_auth'];
		$smtp_secure 			= $mf_settings['smtp_secure'];
		$smtp_username 			= $mf_settings['smtp_username'];
		$smtp_password 			= $mf_settings['smtp_password'];
		$smtp_port 	   			= $mf_settings['smtp_port'];
		$admin_image_url   		= $mf_settings['admin_image_url'];
		$base_url   			= $mf_settings['base_url'];
		$default_from_name   	= $mf_settings['default_from_name'];
		$default_from_email   	= $mf_settings['default_from_email'];
		$upload_dir   			= $mf_settings['upload_dir'];
		$form_manager_max_rows  = $mf_settings['form_manager_max_rows'];
		$disable_machform_link  = $mf_settings['disable_machform_link'];
		$admin_theme			= $mf_settings['admin_theme'];
		$enforce_tsv			= $mf_settings['enforce_tsv'];
		$enable_ip_restriction	= $mf_settings['enable_ip_restriction'];
		$ip_whitelist			= $mf_settings['ip_whitelist'];

		//prepare default ip whitelist
		if(empty($ip_whitelist)){
			$current_ip = $_SERVER['REMOTE_ADDR'];

			$exploded     = explode('.', $current_ip);
			$current_ip_2 = $exploded[0].'.'.$exploded[1].'.'.$exploded[2].'.*'; 

			$ip_whitelist = "{$current_ip}\n{$current_ip_2}";
		}
		
		$enable_account_locking		= (int) $mf_settings['enable_account_locking'];
		$account_lock_period	    = (int) $mf_settings['account_lock_period'];
		$account_lock_max_attempts	= (int) $mf_settings['account_lock_max_attempts'];
		$default_form_theme_id		= (int) $mf_settings['default_form_theme_id'];

		//if account lock settings empty, set the default max attempts = 6 and lock period = 30 minutes
		//these defaults are based on PCI DSS standard
		if(empty($account_lock_period)){
			$account_lock_period = 30;
		}
		if(empty($account_lock_max_attempts)){
			$account_lock_max_attempts = 6;
		}

	}

	//get the available custom themes
	$query = "SELECT theme_id,theme_name FROM ".MF_TABLE_PREFIX."form_themes WHERE theme_built_in=0 and status=1 ORDER BY theme_name ASC";
	$params = array();

	$sth = mf_do_query($query,$params,$dbh);

	$theme_list_array = array();
	while($row = mf_do_fetch_result($sth)){
		$theme_list_array[$row['theme_id']] = htmlspecialchars($row['theme_name']);
	}

	//get built-in themes
	$query = "SELECT theme_id,theme_name FROM ".MF_TABLE_PREFIX."form_themes WHERE theme_built_in=1 and status=1 ORDER BY theme_name ASC";
		
	$params = array();
	$sth = mf_do_query($query,$params,$dbh);

	$theme_builtin_list_array = array();
	while($row = mf_do_fetch_result($sth)){
		$theme_builtin_list_array[$row['theme_id']] = htmlspecialchars($row['theme_name']);
	}
	
	$license_key = $mf_settings['license_key'];
	if($license_key[0] == 'S'){
		$license_type = 'MachForm Standard';
	}else if($license_key[0] == 'P'){
		$license_type = 'MachForm Professional';
	}elseif ($license_key[0] == 'U') {
		$license_type = 'MachForm Unlimited';
	}else{
		$license_type = "Invalid License";
	}

	//get the list of the form, put them into array
	$query = "SELECT 
					form_name,
					form_id
				FROM
					".MF_TABLE_PREFIX."forms
				WHERE
					form_active=0 or form_active=1
			 ORDER BY 
					form_name ASC";
	
	$params = array();
	$sth = mf_do_query($query,$params,$dbh);
	
	$form_list_array = array();
	$i=0;
	while($row = mf_do_fetch_result($sth)){
		$form_list_array[$i]['form_id']   	  = $row['form_id'];

		if(!empty($row['form_name'])){		
			$form_list_array[$i]['form_name'] = htmlentities($row['form_name'],ENT_QUOTES)." (#{$row['form_id']})";
		}else{
			$form_list_array[$i]['form_name'] = '-Untitled Form- (#'.$row['form_id'].')';
		}
		$i++;
	}

	$session_id = session_id();
	$jquery_data_code = '';

	$jquery_data_code .= "\$('.main_settings').data('session_id','{$session_id}');\n";

		$header_data =<<<EOT
<style>
.uploadifive-queue-item { border: none !important; }
</style>
<link type="text/css" href="js/jquery-ui/themes/base/jquery.ui.all.css" rel="stylesheet" />
EOT;

	$current_nav_tab = 'main_settings';
	require('includes/header.php'); 
	
?>


		<div id="content" class="full">
			<div class="post main_settings">
				<div class="content_header">
					<div class="content_header_title">
						<div style="float: left">
							<h2>System Settings</h2>
							<p>Configure system wide settings.</p>
						</div>	
						
						<div style="clear: both; height: 1px"></div>
					</div>
					
				</div>

				<?php mf_show_message(); ?>

				<div class="content_body">
					
					<form id="ms_form" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
					<ul id="ms_main_list">
						<li>
							<div id="ms_box_smtp" class="ms_box_main gradient_blue">
								<div class="ms_box_title">
									<input type="checkbox" <?php if(!empty($smtp_enable)){echo 'checked="checked"';} ?> value="1" class="checkbox" id="smtp_enable" name="smtp_enable">
									<label for="smtp_enable" class="choice">Use SMTP Server to Send Emails</label>
									<img class="helpmsg" src="images/icons/68_blue.png" style="vertical-align: top" title="If your forms doesn't send the result to your email, most likely you'll need to enable this option. This will send all emails from MachForm through SMTP server."/>
								</div>
								<div class="ms_box_email" <?php if(empty($smtp_enable)){echo 'style="display: none"';} ?>>
									<label class="description" for="smtp_host">SMTP Server</label>
									<input id="smtp_host" name="smtp_host" class="element text medium" value="<?php echo htmlspecialchars($smtp_host,ENT_QUOTES); ?>" type="text">
									<label class="description" for="smtp_auth">Use Authentication</label>
									<select class="element select small" id="smtp_auth" name="smtp_auth"> 
										<option <?php if(empty($smtp_auth)){ echo 'selected="selected"'; } ?> value="0">No</option>
										<option <?php if(!empty($smtp_auth)){ echo 'selected="selected"'; } ?> value="1">Yes</option>				
									</select>
									<label class="description" for="smtp_secure">Use TLS/SSL</label>
									<select class="element select small" id="smtp_secure" name="smtp_secure"> 
										<option <?php if(empty($smtp_secure)){ echo 'selected="selected"'; } ?> value="0">No</option>
										<option <?php if(!empty($smtp_secure)){ echo 'selected="selected"'; } ?> value="1">Yes</option>						
									</select>
									<label class="description" for="smtp_username">SMTP User Name</label>
									<input id="smtp_username" name="smtp_username" class="element text medium" value="<?php echo htmlspecialchars($smtp_username,ENT_QUOTES); ?>" type="text">
									<label class="description" for="smtp_password">SMTP Password</label>
									<input id="smtp_password" name="smtp_password" class="element text medium" value="<?php echo htmlspecialchars($smtp_password,ENT_QUOTES); ?>" type="text">
									<label class="description" for="smtp_port">SMTP Port</label>
									<input id="smtp_port" name="smtp_port" class="element text small" value="<?php echo htmlspecialchars($smtp_port,ENT_QUOTES); ?>" type="text" style="width: 50px">
								</div>
							</div>
						</li>
						<li>&nbsp;</li>
						<li>
							<div id="ms_box_misc" class="ms_box_main gradient_red">
								<div class="ms_box_title">
									<label class="choice">Miscellaneous Settings</label>
								</div>
								<div class="ms_box_email">

									<label class="description" for="admin_theme">Admin Panel Theme</label>
									<select class="element select medium" id="admin_theme" name="admin_theme"> 
										<option <?php if(empty($admin_theme)){ echo 'selected="selected"'; } ?> value="">Modern Orange (Default)</option>
										<option <?php if($admin_theme == 'blue'){ echo 'selected="selected"'; } ?> value="blue">Business Blue</option>
										<option <?php if($admin_theme == 'green'){ echo 'selected="selected"'; } ?> value="green">Emerald Green</option>
										<option <?php if($admin_theme == 'gray'){ echo 'selected="selected"'; } ?> value="gray">Timeless Gray</option>
										<option <?php if($admin_theme == 'brown'){ echo 'selected="selected"'; } ?> value="brown">Natural Brown</option>
										<option <?php if($admin_theme == 'red'){ echo 'selected="selected"'; } ?> value="red">Strong Red</option>				
									</select>

									<label class="description" for="admin_image_url">Admin Panel Image URL <img class="helpmsg" src="images/icons/68_red.png" style="vertical-align: top" title="Provide a full URL to an image which is displayed on the admin panel header. A transparent PNG no larger than 150px wide by 55px high is recommended."/></label>
									<input id="admin_image_url" name="admin_image_url" class="element text large" value="<?php echo htmlspecialchars($admin_image_url,ENT_QUOTES); ?>" type="text">

								</div>
								<div class="ms_box_more" style="display: none">
									<label class="description" for="default_from_name">Default Email From Name <img class="helpmsg" src="images/icons/68_red.png" style="vertical-align: top" title="This is the default name being used to send all form notifications and system-related emails from MachForm (example: password reset email, form resume email)."/></label>
									<input id="default_from_name" name="default_from_name" class="element text medium" value="<?php echo htmlspecialchars($default_from_name,ENT_QUOTES); ?>" type="text">

									<label class="description" for="default_from_email">Default Email From Address <img class="helpmsg" src="images/icons/68_red.png" style="vertical-align: top" title="This is the default email address being used to send all form notifications and system-related emails from MachForm (example: password reset email, form resume email)."/></label>
									<input id="default_from_email" name="default_from_email" class="element text medium" value="<?php echo htmlspecialchars($default_from_email,ENT_QUOTES); ?>" type="text">

									<label class="description" for="base_url">MachForm URL <img class="helpmsg" src="images/icons/68_red.png" style="vertical-align: top" title="The URL to your MachForm admin panel. Normally you don't need to modify this setting. Don't change this setting if you aren't sure."/></label>
									<input id="base_url" name="base_url" class="element text large" value="<?php echo htmlspecialchars($base_url,ENT_QUOTES); ?>" type="text">

									<label class="description" for="upload_dir">File Upload Folder <img class="helpmsg" src="images/icons/68_red.png" style="vertical-align: top" title="The path for your file upload folder. If you change it, make sure to provide a full path to your upload folder. Don't change this setting if you aren't sure."/></label>
									<input id="upload_dir" name="upload_dir" class="element text medium" value="<?php echo htmlspecialchars($upload_dir,ENT_QUOTES); ?>" type="text">
									
									<label class="description" for="default_form_theme_id">Default Form Theme <img class="helpmsg" src="images/icons/68_red.png" style="vertical-align: top" title="The default theme being used on every new forms."/></label>
									<select class="element select medium" id="default_form_theme_id" name="default_form_theme_id"> 
											<optgroup label="Built-in Themes">
												<option value="0">White</option>
												<?php 
													if(!empty($theme_builtin_list_array)){
														foreach ($theme_builtin_list_array as $theme_id=>$theme_name){
															$selected_tag = '';
															if($default_form_theme_id == $theme_id){
																$selected_tag = 'selected="selected"';
															}
															echo "<option value=\"{$theme_id}\" {$selected_tag}>{$theme_name}</option>";
														}
													}
												?>
											</optgroup>
										
											<?php if(!empty($theme_list_array)){ ?>	
											<optgroup label="Custom Themes">
												<?php 
													if(!empty($theme_list_array)){
														foreach ($theme_list_array as $theme_id=>$theme_name){
															$selected_tag = '';
															if($default_form_theme_id == $theme_id){
																$selected_tag = 'selected="selected"';
															}
															echo "<option value=\"{$theme_id}\" {$selected_tag}>{$theme_name}</option>";
														}
													}
												?>
											</optgroup>
											<?php } ?>
									</select>

									<label class="description" for="form_manager_max_rows">Form Manager Max List <img class="helpmsg" src="images/icons/68_red.png" style="vertical-align: top" title="The number of forms to be displayed for each page on the Form Manager."/></label>
									<input id="form_manager_max_rows" style="width: 50px" name="form_manager_max_rows" class="element text small" value="<?php echo htmlspecialchars($form_manager_max_rows,ENT_QUOTES); ?>" type="text">
									

									<div style="clear: both;width: 100%;border-bottom: 1px dashed #DF8F7D;margin-top: 20px;margin-bottom: 5px"></div>
									
									<input type="checkbox" <?php if(!empty($disable_machform_link)){echo 'checked="checked"';} ?> value="1" class="checkbox" id="disable_machform_link" name="disable_machform_link">
									<label class="description inline" for="disable_machform_link">Remove the "Powered by MachForm" link from all my forms</label>
									
									<div style="clear: both"></div>

									<input type="checkbox" <?php if(!empty($enforce_tsv)){echo 'checked="checked"';} ?> value="1" class="checkbox" id="enforce_tsv" name="enforce_tsv">
									<label class="description inline" for="enforce_tsv">Enforce 2-Step Verification on users </label> <img class="helpmsg" src="images/icons/68_red.png" style="vertical-align: bottom; padding-bottom: 3px" title="If enabled, all MachForm users are enrolled in 2-Step Verification. Once enabled, MachForm will require a six-digit security code (generated by TOTP authenticator mobile app) in addition to the standard password whenever they sign in to MachForm. "/>
									
									<div style="clear: both"></div>

									<input type="checkbox" <?php if(!empty($enable_ip_restriction)){echo 'checked="checked"';} ?> value="1" class="checkbox" id="enable_ip_restriction" name="enable_ip_restriction">
									<label class="description inline" for="enable_ip_restriction">Enable IP Address Restriction </label> <img class="helpmsg" src="images/icons/68_red.png" style="vertical-align: bottom; padding-bottom: 3px" title="If enabled, all users can only login to MachForm panel from IP address listed here. Users using other IP address will be blocked. "/>
									
									<div style="clear: both"></div>

									<div id="div_ip_whitelist" style="display: <?php if(!empty($enable_ip_restriction)){ echo 'block'; }else{ echo 'none'; } ?>">
										<label class="checkbox" for="ip_whitelist">Only allow login from these IP Addresses: </label> <img class="helpmsg" src="images/icons/68_red.png" style="vertical-align: bottom; padding-bottom: 3px" title="You can enter multiple ip addresses, one ip address per line. Use the asterisk (*) as a wildcard to specify a range of address (examples: 192.168.1.*, 192.168.*, 192.168.*.120)"/>
										<textarea class="element textarea small" style="width: 250px;margin-top: 5px" name="ip_whitelist" id="ip_whitelist"><?php echo htmlentities($ip_whitelist,ENT_QUOTES); ?></textarea>
									</div>
									
									<div style="clear: both"></div>

									<input type="checkbox" <?php if(!empty($enable_account_locking)){echo 'checked="checked"';} ?> value="1" class="checkbox" id="enable_account_locking" name="enable_account_locking">
									<label class="description inline" for="enable_account_locking">Enable Account Locking </label> <img class="helpmsg" src="images/icons/68_red.png" style="vertical-align: bottom; padding-bottom: 3px" title="If enabled, users account will be temporarily locked after several invalid login attempts."/>
									
									<div style="clear: both"></div>

									<div id="div_account_locking" style="margin-left: 22px;margin-top: 10px;display: <?php if(!empty($enable_account_locking)){ echo 'block'; }else{ echo 'none'; } ?>">
											Lock account for
											<input type="text" maxlength="255" value="<?php echo htmlspecialchars($account_lock_period,ENT_QUOTES); ?>" class="text" style="width: 20px" id="account_lock_period" name="account_lock_period">
											minutes after
											<input type="text" maxlength="255" value="<?php echo htmlspecialchars($account_lock_max_attempts,ENT_QUOTES); ?>" class="text" style="width: 20px" id="account_lock_max_attempts" name="account_lock_max_attempts">
											invalid login attempts
									</div>
								</div>
								<div class="ms_box_more_switcher">
									<a id="more_option_misc_settings" href="#">advanced options</a>
									<img id="misc_settings_img_arrow" style="vertical-align: top;margin-left: 3px" src="images/icons/38_rightred_16.png">
								</div>
							</div>
						</li>
						<li>&nbsp;</li>
						<li>
							<div id="ms_box_export_tool" class="ms_box_main gradient_green">
								<div class="ms_box_title">
									<label class="choice">Form Export/Import Tool</label> &nbsp;<img class="helpmsg" src="images/icons/68_green.png" style="vertical-align: top" title="Use this tool to export your form structure into a file and then import the form file into another instance of MachForm"/>
								</div>
								<div class="ms_box_email" style="padding-top: 15px">
									<span>
										<input id="export_import_type_1"  name="export_import_type" class="element radio" type="radio" value="export" checked="checked" style="margin-left: 0px" />
										<label for="export_import_type_1">Export Form</label>
									</span>
									<span style="margin-left: 20px">
										<input id="export_import_type_2"  name="export_import_type" class="element radio" type="radio" value="import" />
										<label for="export_import_type_2">Import Form</label>
									</span>

									<div id="tab_export_form">
										<label style="margin-top: 10px" class="description" for="export_form_id">Choose Form to Export</label>
										<select class="element select" id="export_form_id" name="export_form_id" style="width: 300px;margin-right: 10px"> 
											<?php
												if(!empty($form_list_array)){
													foreach ($form_list_array as $value) {
														echo "<option value=\"{$value['form_id']}\">{$value['form_name']}</option>";
													}
												}
											?>				
										</select>
										<input type="button" id="ms_btn_export_form" value="Export Form" class="button_text">
									</div>
									<div id="tab_import_form" style="display: none">
										<div id="ms_form_import_upload">
											<label class="description" for="ms_form_import_file">Upload Form File</label>
											<input id="ms_form_import_file" name="ms_form_import_file" class="element file" type="file" />
										</div>
									</div>
								</div>
							</div>
						</li>
						<li style="padding-top: 20px">
							
							<a href="#" id="button_save_main_settings" class="bb_button bb_small bb_green">
								<span class="icon-disk" style="margin-right: 5px"></span>Save Settings
							</a>
							
						</li>		
					</ul>
					<input type="hidden" id="submit_form" name="submit_form" value="1">
					</form>

					<div id="license_box" data-licensekey="<?php echo $mf_settings['license_key']; ?>">
						<table id="license_box_table" width="100%" border="0" cellspacing="0" cellpadding="0">
						  <tr>
						    <th colspan="2" scope="col">License Information</th>
						  </tr>
						  <tr>
						    <td class="ms_lic_left" width="50%" align="right">Customer ID</td>
						    <td class="ms_lic_right" width="50%"><span id="lic_customer_id"><?php if(!empty($mf_settings['customer_id'])){echo $mf_settings['customer_id'];}else{echo '-none-';} ?></span></td>
						  </tr>
						  <tr>
						    <td class="ms_lic_left" align="right">Name</td>
						    <td class="ms_lic_right"><span id="lic_customer_name"><?php if(!empty($mf_settings['customer_name'])){echo $mf_settings['customer_name'];}else{echo '-none-';} ?></span> <?php if(empty($mf_settings['customer_id'])){ echo '<a id="lic_activate" href="#">activate now</a>'; } ?></td>
						  </tr>
						  <tr>
						    <td class="ms_lic_left" align="right">License Type</td>
						    <td class="ms_lic_right"><span id="lic_type"><?php echo $license_type; ?></span></td>
						  </tr>
						  <tr>
						    <td class="ms_lic_left" align="right">MachForm Version</td>
						    <td class="ms_lic_right"><?php echo $mf_settings['machform_version']; ?></td>
						  </tr>
						  <tr>
						    <td colspan="2" align="middle"><a id="ms_change_license" href="">Change License</a></td>
						  </tr>
						</table>
					</div>

					<div id="dialog-change-password" title="Change Admin Password" class="buttons" style="display: none"> 
						<form id="dialog-change-password-form" class="dialog-form" style="margin-bottom: 10px">				
							<ul>
								<li>
									<label for="dialog-change-password-input1" class="description">Enter New Password</label>
									<input type="password" id="dialog-change-password-input1" name="dialog-change-password-input1" class="text large" value="">
									<label for="dialog-change-password-input2" style="margin-top: 15px" class="description">Confirm New Password</label>
									<input type="password" id="dialog-change-password-input2" name="dialog-change-password-input2" class="text large" value="">
									
								</li>
							</ul>
						</form>
					</div>

					<div id="dialog-change-license" title="Change License Key" class="buttons" style="display: none"> 
						<form id="dialog-change-license-form" class="dialog-form" style="margin-bottom: 10px">				
							<ul>
								<li>
									<label for="dialog-change-license-input" class="description">Enter New License Key</label>
									<input type="text" id="dialog-change-license-input" name="dialog-change-license-input" class="text large" value="">
								</li>
							</ul>
						</form>
					</div>
					
					<div id="dialog-form-import-success" title="Success! Import completed" class="buttons" style="display: none">
						<span class="icon-checkmark-circle"></span> 
						<p>
							<strong>The following form has been imported:</strong><br/>
							<a id="form-imported-link" target="_blank" style="color: #529214;font-size: 120%;border: none;background: none;float: none" href="#">x</a>
						</p>	
					</div>

					<div id="dialog-warning" title="Error! Import failed" class="buttons" style="display: none">
						<span class="icon-bubble-notification"></span>
						<p id="dialog-warning-msg" style="margin-bottom: 20px">
							The form file seems to be corrupted.<br/>Please try again with another file.
						</p>
					</div>
				</div> <!-- /end of content_body -->	
			
			</div><!-- /.post -->
		</div><!-- /#content -->

 
<?php
	$footer_data =<<<EOT
<script type="text/javascript">
	$(function(){
		{$jquery_data_code}		
    });
</script>
<script type="text/javascript" src="js/jquery-ui/ui/jquery.ui.core.js"></script>
<script type="text/javascript" src="js/jquery-ui/ui/jquery.ui.widget.js"></script>
<script type="text/javascript" src="js/jquery-ui/ui/jquery.ui.tabs.js"></script>
<script type="text/javascript" src="js/jquery-ui/ui/jquery.ui.mouse.js"></script>
<script type="text/javascript" src="js/jquery-ui/ui/jquery.ui.sortable.js"></script>
<script type="text/javascript" src="js/jquery-ui/ui/jquery.ui.draggable.js"></script>
<script type="text/javascript" src="js/jquery-ui/ui/jquery.ui.position.js"></script>
<script type="text/javascript" src="js/jquery-ui/ui/jquery.ui.dialog.js"></script>
<script type="text/javascript" src="js/jquery.tools.min.js"></script>
<script type="text/javascript" src="js/uploadifive/jquery.uploadifive.js"></script>
<script type="text/javascript" src="js/main_settings.js"></script>
EOT;

	require('includes/footer.php'); 
?>