<?php

include_once("include.php");

$dsks = array();

if(isset($_REQUEST["sss"]) && trim($_REQUEST["sss"])!="")
{
    if((isset($_REQUEST["dsk"]) && $_REQUEST["dsk"]!="") || (isset($_REQUEST["o-dsk"]) && $_REQUEST["o-dsk"]!="" ))
    {
        $dsks = $_REQUEST["dsk"];
        if(isset($_REQUEST["o-dsk"]) && strlen($_REQUEST["o-dsk"]))
        {
            $ext_dsk = explode(",",$_REQUEST["o-dsk"]);
            $dsks = array_merge($dsks,$ext_dsk);
        }
        
    }
    else
    {
        $dsks[] = array();
    }
    
    if(isset($_REQUEST["msg"]) && trim($_REQUEST["msg"])!="")
    {
        $msg = trim($_REQUEST["msg"]);
    }
    else
    {
        $msg = "NO MASSAGE";
    }

    if(count($dsks))
    {
        $WshShell = new COM("WScript.Shell");
        
        if($_REQUEST["sss"]=="Send")
            $msg = $msg;
        elseif($_REQUEST["sss"]=="Call")
            $msg = "CALL FOR YOU";
        else
            $msg = $msg;
        
        $formatMsg = "\n\n -------------------------------------------------------- \n\n";
        $formatMsg .= $msg;
        $formatMsg .= "\n\n -------------------------------------------------------- \n\n\n";
        
        
        $formatMsg .= "- ".myName();
        $formatMsg .= "\n\n @@@@@@@@@@@@@@@@ Designed By: Meral M_@@@@@@ \n\n\n";
        
        foreach($dsks as $dsk)
        {
            if($dsk!="")
            {
            $cmd = "net send ".$dsk." ".$formatMsg;
            $oExec = $WshShell->Run($cmd);
            }
        }
    }
}


?>
<html>
    <body>
        <form name="fr1" accept="" method="post" />
            <table align="center">
                <tr>
                    <td>
                       <?php
                            nameList($dsks);
                       ?><br />
                        <input type="text" name="o-dsk" id="o-dsk" value="" size="10"  />
                    </td>
                    <td>
                        <br />
                        <table >
                           
                            <tr>
                                <td>
                                   <textarea name="msg" id="msg" cols="30" rows="14" ></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="right" style="font-size:10px; color:#333;" >
                                    Designed By <b>MeralM ©</b>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   <input type="submit" name="sss" value="Send" />
                                   <input type="submit" name="sss" value="Call" />
                                </td>
                            </tr>
                            
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" >
                    <?php
                    if(isset($_REQUEST["sss"]) && trim($_REQUEST["sss"])!=""){ ?>
                    <br><div id="done" style="font-size:16px;font-weight:bold;color:#0F0;" >Msg has been sent to <?php echo implode(",",$dsks); ?>...</div>
                    <?php $_REQUEST["sss"] = ""; } ?>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
<script>
    function done()
    {
        document.getElementById('done').innerHTML = '';
    }
    setTimeout('done()',3000);
    
    document.getElementById('dsk').focus();
</script>