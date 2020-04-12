<?php
function nameList($dsks=array()){ ?>
    <select id="dsk" name="dsk[]" multiple="multiple" size="10" >
                            <option value="" >-</option>
                            <option value="dsk96" <?php if(in_array("dsk96",$dsks)) { echo 'selected'; } ?> >Mayur Bhayani</option>
                            <option value="dsk79" <?php if(in_array("dsk79",$dsks)) { echo 'selected'; } ?> >Meral</option>
                            <option value="ntb16" <?php if(in_array("ntb16",$dsks)) { echo 'selected'; } ?> >Harsh sir</option>
                            <option value="dsk105" <?php if(in_array("dsk105",$dsks)) { echo 'selected'; } ?> >Mausam</option>
                            <option value="dsk50" <?php if(in_array("dsk50",$dsks)) { echo 'selected'; } ?> >Aarti</option>
                            <option value="dsk40" <?php if(in_array("dsk40",$dsks)) { echo 'selected'; } ?> >Hiren Dave</option>
                            <option value="dsk52" <?php if(in_array("dsk52",$dsks)) { echo 'selected'; } ?> >Jinal</option>
                            <option value="dsk49" <?php if(in_array("dsk49",$dsks)) { echo 'selected'; } ?> >Niraj</option>
                            <option value="dsk28" <?php if(in_array("dsk28",$dsks)) { echo 'selected'; } ?> >Malay</option>
                            <option value="dsk35" <?php if(in_array("dsk35",$dsks)) { echo 'selected'; } ?> >Pankil</option>
                            <option value="dsk32" <?php if(in_array("dsk32",$dsks)) { echo 'selected'; } ?> >Mrunal</option>
                            <option value="dsk56" <?php if(in_array("dsk56",$dsks)) { echo 'selected'; } ?> >Nimit</option>
                            <option value="dsk39" <?php if(in_array("dsk39",$dsks)) { echo 'selected'; } ?> >Nidhi</option>
                            <option value="dsk102" <?php if(in_array("dsk102",$dsks)) { echo 'selected'; } ?> >Soni</option>
                            <option value="dsk111" <?php if(in_array("dsk111",$dsks)) { echo 'selected'; } ?> >Bhagawati</option>
    </select>   
    <?php
}

function myName()
{
    return "Meral";
}
?>
