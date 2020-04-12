<form name="frmAddContact" id="frmAddContact" method="post" action="" onsubmit="" >
<input type="hidden" name="photoName2" id="photoName2" value="" />
<input type="hidden" name="Avatar" id="Avatar"/>
<input type="hidden" name="Avatar2" id="Avatar2"/>
<input type="hidden" name="gid" id="gid" value=""/>

<div class="control-group">
	<label class="control-label">First Name <span class="red">*</span></label>
	<div class="controls">
	<input type="text" name="txtFName" id="txtFName" placeholder="" class="form-control required">
	</div>
	<div style=" width:600px; text-align: center;" id="fnameerr" class="red"></div>
</div>

<div class="control-group">
	<label class="control-label">Last Name <span class="red">*</span></label>
	<div class="controls"><input type="text" name="txtLName" id="txtLName">
</div>
<div id="lnameerr" class="red" style=" width:600px; text-align: center;"></div>
</div>

<div class="control-group">
	<label class="control-label">Role <span class="red">*</span></label>
	<div class="controls"><!-- <input type="text" name="txtRole" id="txtRole"> -->
	<select id="selRole" name="selRole">
     <option value="0">--Select Role--</option>
	
	</select>
</div>
<div id="roleerr" class="red" style=" width:600px; text-align: center;"></div>
</div>

<div style=" width:600px; text-align: center; color:#A5A4A4">Please enter any one of the phone number</div>
<div class="control-group">
	<label class="control-label">Home Phone</label>
	<div class="controls"><input type="text" name="txtPhone" id="txtHPhone">
</div>
<div id="hphoneerr" class="red" style=" width:600px; text-align: center;"></div>
</div>
<div class="control-group">
	<label class="control-label">Work  Phone</label>
	<div class="controls"> <input type="text" name="txtPhone" id="txtWPhone"> 
</div>
<div id="wphoneerr" class="red" style=" width:600px; text-align: center;"></div>
</div>
<div class="control-group">
	<label class="control-label">Mobile:</label>
	<div class="controls"><input type="text" name="txtPhone" id="txtMobile">
</div>
<div id="mobileerr" class="red" style=" width:600px; text-align: center;"></div>
</div>
<div class="control-group">
	<label class="control-label">Email<span class="red">*</span></label>
	<div class="controls"><input type="text" name="txtEmail" id="txtEmail">
</div>
<div id="emailerr" class="red" style=" width:600px; text-align: center;"></div>
</div>

<div class="control-group">
  <label class="control-label"></label>
  <div class="controls"></div>
  </div>
        
<!-- commented tmp by g2 form name="frmAddContact" id="frmAddContact" method="post" action="" onsubmit="return addContactValid('');"-->
<div class="control-group btngroup">
    

<button type="button" value="" class="btn btn-primary" id="save" onclick=""><i class="icon-save"></i>Save</button>
<a ref="#" onclick="document.getElementById('setAcctThumbnail').style.display='none';document.getElementById('frmAddContact').reset();document.getElementById('preview').innerHTML = '';document.getElementById('thumbs').innerHTML = '';parent.parent.GB_hide()">
						<div class="btn btn-small" data-dismiss="modal" id="cancel_comment" onclick="hideContactForm()">
							<i class="icon-remove"></i>Cancel 
</div></a>
 
 </form>