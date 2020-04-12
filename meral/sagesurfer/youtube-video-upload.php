<script src="js/jquery-2.0.3.min.js"></script>
<style>

.fkbtns { margin-top:25px;}
.fkbtns .nav {
	margin-bottom:20px;
	margin-left:0;
	list-style:none
}
.fkbtns .nav>li>a {
	display:block
}
.fkbtns .nav>li>a:hover, .fkbtns .nav>li>a:focus {
	text-decoration:none;
	background-color:#eee
}
.fkbtns .nav>li>a>img {
	max-width:none
}
.fkbtns .nav>.pull-right {
	float:right
}
.fkbtns .nav-header {
	display:block;
	padding:3px 15px;
	font-size:11px;
	font-weight:bold;
	line-height:20px;
	color:#999;
	text-shadow:0 1px 0 rgba(255, 255, 255, 0.5);
	text-transform:uppercase
}

.fkbtns .nav-list {
	padding-right:15px;
	padding-left:15px;
	margin-bottom:0
}
.fkbtns .nav-list>li>a, .fkbtns .nav-list .fkbtns .nav-header {
	margin-right:-15px;
	margin-left:-15px;
	text-shadow:0 1px 0 rgba(255, 255, 255, 0.5)
}

.fkbtns .nav-list>.active>a, .fkbtns .nav-list>.active>a:hover, .fkbtns .nav-list>.active>a:focus {

	color: #FFF;
cursor: none;
background-color: #4f99c6;
border: 1px solid #2875a4;
box-shadow: 0 1px 0 rgba(20, 108, 136, 0.5);
}
.fkbtns .nav-list [class^="icon-"], .fkbtns .nav-list [class*=" icon-"] {
margin-right:2px
}
.fkbtns .nav-list .divider {
*width:100%;
	height:1px;
	margin:9px 1px;
*margin:-5px 0 5px;
	overflow:hidden;
	background-color:#e5e5e5;
	border-bottom:1px solid #fff
}

.fkbtns .nav-subtabs:before, .fkbtns .nav-pills:before, .fkbtns .nav-subtabs:after, .fkbtns .nav-pills:after {
	display:table;
	line-height:0;
	content:""
}
.fkbtns .nav-subtabs:after, .fkbtns .nav-pills:after {
	clear:both
}
.fkbtns .nav-subtabs>li, .fkbtns .nav-pills>li {
	float:left
}
.fkbtns .nav-subtabs>li>a, .fkbtns .nav-pills>li>a {
	padding-right:9px;
	padding-left:9px;
	line-height:14px; 

}

.fkbtns .nav-subtabs>li {
	margin-bottom:-1px; /*prm width:25%;  */ padding-right: 12px; list-style:none;}
}
.fkbtns .nav-subtabs>li>a {

	line-height:20px;

	-webkit-border-radius:4px 4px 0 0;
	-moz-border-radius:4px 4px 0 0;
	 text-align:center; margin-bottom:10px;
	cursor: pointer;
border-radius: 2px; /*border-radius:4px 4px 0 0; 	border:1px solid transparent;*/
border-color: #d3d3d3;
background: #f8f8f8;
color: #333;
box-shadow: 0 1px 0 rgba(0,0,0,0.05);
	

}
.fkbtns .nav-subtabs>li>a:hover, .youtube-main-content .nav-subtabs>li>a:focus {
	
/*		line-height:20px; margin-bottom:10px; */

	-webkit-border-radius:4px 4px 0 0;
	-moz-border-radius:4px 4px 0 0;
	 text-align:center; 
	cursor: pointer;
border-radius: 2px; /*border-radius:4px 4px 0 0; 	border:1px solid transparent;*/
border-color: #d3d3d3;
background: #eae8e8;
color: #333;
box-shadow: 0 1px 0 rgba(0,0,0,0.05);
}
.fkbtns .nav-subtabs>.active>a, .fkbtns .nav-subtabs>.active>a:hover, .fkbtns .nav-subtabs>.active>a:focus {
	color:#FFF;
	cursor:none;
	background-color:#4f99c6;
	border:1px solid #2875a4;
box-shadow: 0 1px 0 rgba(20, 108, 136, 0.5);
}


.tabbable:before, .tabbable:after {
	display:table;
	line-height:0;
	content:""
}
.tabbable:after {
	clear:both
}
.hide {
	display:none
}
.show {
	display:block
}
.invisible {
	visibility:hidden
}
#creatplaylistform{display:none;}
#searchresultvideos{}




.subtab-content
{	border:0px solid #c5d0dc;!important
	padding:5px 5px;
	position:relative;
	z-index:11
}

/* -- ---- 	border-bottom:1px solid red;	border-bottom-color:transparent;g2 yamer subtab */
.edit-btn{ background-color:#F3F3F3; width:45px; float:left; text-align:center; font-size:11px; margin-right: 10px;
margin-top: 10px;
border: 1px solid #ddd; 

-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px!important;
-webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
-moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
}

.delete-btn{ background-color:#F3F3F3; width:45px; float:left; text-align:center; font-size:11px; 
margin-top: 10px;
margin-top: 10px;
border: 1px solid #ddd; 

-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px!important;
-webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
-moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);}

.timeview{ font-size:10px; color:#999;}

.fkbtns .nav-subtabs
{
	border-color:#c5d0dc;

	position:relative;

}
.fkbtns .nav-subtabs li a
{ 
font-size:12px; color:#686868; border:1px solid #ddd;
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px!important;
-webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
-moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); line-height:22px;
padding-left: 10px;
padding-top: 4px;
padding-right: 10px;
padding-bottom: 4px;

}
.fkbtns .nav-subtabs>li>a:focus
{ 
 font-size:12px; color: #08c; border:1px solid #ddd;
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px!important;
-webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
-moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
}
.fkbtns .nav-subtabs>li>a:hover
{
	background-color:#FFF;
	color:#4c8fbd;
	border-color:#c5d0dc
}
.fkbtns .nav-subtabs>li>a:active,.fkbtns .nav-subtabs>li>a:focus
{
	outline:none!important; 
}

.tabs-below>.nav-subtabs
{
	top:auto;
	margin-bottom:0;
	margin-top:-1px;
	border-color:#c5d0dc
}
.tabs-below>.nav-subtabs>li>a,.tabs-below>.nav-subtabs>li>a:hover,.tabs-below>.nav-subtabs>li>a:focus
{
	border-color:#c5d0dc
}
.tabs-below>.nav-subtabs>li.active>a,.tabs-below>.nav-subtabs>li.active>a:hover,.tabs-below>.nav-subtabs>li.active>a:focus
{
	border-color:#c5d0dc;
	border-top-width:1px;
	border-bottom:2px solid #4c8fbd;
	border-top-color:transparent;
	margin-top:0;
	box-shadow:0 2px 3px 0 rgba(0,0,0,0.15)
}
.fkbtns .dialogs
{
	padding:9px 9px 0;
	position:relative
}
.fkbtns #video-container .viditemdiv, .fkbtns #search-container .viditemdiv
{
	padding-right:3px;
	min-height:100px;
	position:relative
}
.fkbtns #playlist-container .viditemdiv
{
	padding-right:3px;
	min-height:50px;
	position:relative
}
.fkbtns .viditemdiv>.user, .fkbtns .viditemdiv>.user
{
	display:inline-block;
	width:110px;
	position:absolute;
	left:0
}
.fkbtns .viditemdiv>.user>img, .fkbtns .viditemdiv>.user>img
{
	border:1px solid #5293c4;
	max-width:110px;
	position:relative
}
.fkbtns .like img{ height:50px;}
 .viditemdiv>.body
{
	width:auto;
	margin-left:120px;
	margin-right:12px;
	position:relative
}

/* --- */
.youtube-main-content .nav {
	margin-bottom:20px;
	margin-left:0;
	list-style:none
}
.youtube-main-content .nav>li>a {
	display:block
}
.youtube-main-content .nav>li>a:hover, .youtube-main-content .nav>li>a:focus {
	text-decoration:none;
	background-color:#eee
}
.youtube-main-content .nav>li>a>img {
	max-width:none
}
.youtube-main-content .nav>.pull-right {
	float:right
}
.youtube-main-content .nav-header {
	display:block;
	padding:3px 15px;
	font-size:11px;
	font-weight:bold;
	line-height:20px;
	color:#999;
	text-shadow:0 1px 0 rgba(255, 255, 255, 0.5);
	text-transform:uppercase
}

.youtube-main-content .nav-list {
	padding-right:15px;
	padding-left:15px;
	margin-bottom:0
}
.youtube-main-content .nav-list>li>a, .youtube-main-content .nav-list .youtube-main-content .nav-header {
	margin-right:-15px;
	margin-left:-15px;
	text-shadow:0 1px 0 rgba(255, 255, 255, 0.5)
}

.youtube-main-content .nav-list>.active>a, .youtube-main-content .nav-list>.active>a:hover, .youtube-main-content .nav-list>.active>a:focus {
	color:#fff;
	text-shadow:0 -1px 0 rgba(0, 0, 0, 0.2);
	background-color:#08c
}
.youtube-main-content .nav-list [class^="icon-"], .youtube-main-content .nav-list [class*=" icon-"] {
margin-right:2px
}
.youtube-main-content .nav-list .divider {
*width:100%;
	height:1px;
	margin:9px 1px;
*margin:-5px 0 5px;
	overflow:hidden;
	background-color:#e5e5e5;
	border-bottom:1px solid #fff
}

.youtube-main-content .nav-subtabs:before, .youtube-main-content .nav-pills:before, .youtube-main-content .nav-subtabs:after, .youtube-main-content .nav-pills:after {
	display:table;
	line-height:0;
	content:""
}
.youtube-main-content .nav-subtabs:after, .youtube-main-content .nav-pills:after {
	clear:both
}
.youtube-main-content .nav-subtabs>li, .youtube-main-content .nav-pills>li {
	float:left
}
.youtube-main-content .nav-subtabs>li>a, .youtube-main-content .nav-pills>li>a {
	padding-right:9px;
	padding-left:9px;
	line-height:14px; 

}
.youtube-main-content .nav-subtabs {
/*	border-bottom:1px solid #ddd*/
}
.youtube-main-content .nav-subtabs>li {
	margin-bottom:-1px; /*prm width:25%;  */ padding-right: 12px;}
}
.youtube-main-content .nav-subtabs>li>a {

	line-height:20px;

	-webkit-border-radius:4px 4px 0 0;
	-moz-border-radius:4px 4px 0 0;
	 text-align:center; margin-bottom:10px;
	cursor: pointer;
border-radius: 2px; /*border-radius:4px 4px 0 0; 	border:1px solid transparent;*/
border-color: #d3d3d3;
background: #f8f8f8;
color: #333;
box-shadow: 0 1px 0 rgba(0,0,0,0.05);
	

}
.youtube-main-content .nav-subtabs>li>a:hover, .youtube-main-content .nav-subtabs>li>a:focus {
	
/*		line-height:20px; margin-bottom:10px; */

	-webkit-border-radius:4px 4px 0 0;
	-moz-border-radius:4px 4px 0 0;
	 text-align:center; 
	cursor: pointer;
border-radius: 2px; /*border-radius:4px 4px 0 0; 	border:1px solid transparent;*/
border-color: #d3d3d3;
background: #eae8e8;
color: #333;
box-shadow: 0 1px 0 rgba(0,0,0,0.05);
}
.youtube-main-content .nav-subtabs>.active>a, .youtube-main-content .nav-subtabs>.active>a:hover, .youtube-main-content .nav-subtabs>.active>a:focus {
	color:#FFF;
	cursor:none;
	background-color:#4f99c6;
	border:1px solid #2875a4;
box-shadow: 0 1px 0 rgba(20, 108, 136, 0.5);
}


.tabbable:before, .tabbable:after {
	display:table;
	line-height:0;
	content:""
}
.tabbable:after {
	clear:both
}

.show {
	display:block
}
.invisible {
	visibility:hidden
}

#searchresultvideos{}




.subtab-content
{	border:0px solid #c5d0dc;!important
	padding:5px 5px;
	position:relative;
	z-index:11
}

/* -- ---- 	border-bottom:1px solid red;	border-bottom-color:transparent;g2 yamer subtab */
.edit-btn{ background-color:#F3F3F3; width:45px; float:left; text-align:center; font-size:11px; margin-right: 10px;
margin-top: 10px;
border: 1px solid #ddd; 

-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px!important;
-webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
-moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
}

.delete-btn{ background-color:#F3F3F3; width:45px; float:left; text-align:center; font-size:11px; 
margin-top: 10px;
margin-top: 10px;
border: 1px solid #ddd; 

-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px!important;
-webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
-moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);}

.timeview{ font-size:10px; color:#999;}

.youtube-main-content .nav-subtabs
{
	border-color:#c5d0dc;
	margin-bottom:0;
	position:relative;
	top:1px ; padding:10px;
}
.youtube-main-content .nav-subtabs li a
{ 
font-size:12px; color:#686868; border:1px solid #ddd;
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px!important;
-webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
-moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05); line-height:22px;
}
.youtube-main-content .nav-subtabs>li>a:focus
{ 
 font-size:12px; color: #08c; border:1px solid #ddd;
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
border-radius: 3px!important;
-webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
-moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
}
.youtube-main-content .nav-subtabs>li>a:hover
{
	background-color:#FFF;
	color:#4c8fbd;
	border-color:#c5d0dc
}
.youtube-main-content .nav-subtabs>li>a:active,.youtube-main-content .nav-subtabs>li>a:focus
{
	outline:none!important; 
}

.tabs-below>.nav-subtabs

{
	top:auto;
	margin-bottom:0;
	margin-top:-1px;
	border-color:#c5d0dc
}
.tabs-below>.nav-subtabs>li>a,.tabs-below>.nav-subtabs>li>a:hover,.tabs-below>.nav-subtabs>li>a:focus
{
	border-color:#c5d0dc
}
.tabs-below>.nav-subtabs>li.active>a,.tabs-below>.nav-subtabs>li.active>a:hover,.tabs-below>.nav-subtabs>li.active>a:focus
{
	border-color:#c5d0dc;
	border-top-width:1px;
	border-bottom:2px solid #4c8fbd;
	border-top-color:transparent;
	margin-top:0;
	box-shadow:0 2px 3px 0 rgba(0,0,0,0.15)
}
.youtube-main-content .dialogs
{
	padding:9px 9px 0;
	position:relative
}
.youtube-main-content #video-container .viditemdiv, .youtube-search-content #search-container .viditemdiv
{
	padding-right:3px;
	min-height:100px;
	position:relative
}
.youtube-main-content #playlist-container .viditemdiv
{
	padding-right:3px;
	min-height:50px;
	position:relative
}
.youtube-main-content .viditemdiv>.user, .youtube-search-content .viditemdiv>.user
{
	display:inline-block;
	width:110px;
	position:absolute;
	left:0
}
.youtube-main-content .viditemdiv>.user>img, .youtube-search-content .viditemdiv>.user>img
{
	border:1px solid #5293c4;
	max-width:110px;
	position:relative
}
.youtube-main-content .like img{ height:50px;}
 .viditemdiv>.body
{
	width:auto;
	margin-left:120px;
	margin-right:12px;
	position:relative
}
 .viditemdiv>.body>.time
{
	display:block;
	font-size:11px;
	font-weight:bold;
	color:#666;
	position:absolute;
	right:9px;
	top:0
}
.viditemdiv>.body>.time [class*="icon-"]
{
	font-size:14px;
	font-weight:normal
}
 .viditemdiv>.body>.name
{
	display:block;
	color:#999
}
 .viditemdiv>.body>.name>b
{
	color:#777
}
.viditemdiv>.body>.descriptiontext
{
	display:block;
/*	padding-bottom:5px;
	margin-top:2px; */ line-height:15px;
	font-size:11px;
	position:relative;
}


.viditemdiv:last-child>.body>.text
{
	border-bottom:0
}

 .viditemdiv.dialogdiv
{
	padding-bottom:14px
}
 .viditemdiv.dialogdiv:before
{
	position:absolute;
	display:block;
	content:"";
	top:0;
	bottom:0;
	left:19px;
	width:1px;
	max-width:1px;
	/*commented by vaibhav to remove the lines from the posts on wall. */
	/*background-color:#e1e6ed;
	border:1px solid #d7dbdd;
	border-width:0 1px .youtube-main-content */
}

.viditemdiv.dialogdiv>.user>img
{
	border-color:#c9d6e5
}
.viditemdiv.dialogdiv>.body
{
	border:1px solid #dde4ed;
	padding:3px 7px 7px;
	border-left-width:2px;
	margin-right:1px
}
 .viditemdiv.dialogdiv>.body:before
{
	content:"";
	display:block;
	position:absolute;
	left:-7px;
	top:11px;
	width:8px;
	height:8px;
	border:2px solid #dde4ed;
	border-width:2px 0 0 2px;
	background-color:#FFF;
	-webkit-transform:rotate(-45deg);
	-moz-transform:rotate(-45deg);
	-ms-transform:rotate(-45deg);
	-o-transform:rotate(-45deg);
	transform:rotate(-45deg)
}
.viditemdiv.dialogdiv>.body>.time
{
	position:static;
	float:right
}
 .viditemdiv.dialogdiv>.body>.text
{
	padding-left:0;
	padding-bottom:0
}

.viditemdiv.dialogdiv .tooltip>.tooltip-inner
{
	word-break:break-all
}
.viditemdiv.memberdiv
{ /*3prty*/
	width:75px;
	padding:2px;
	margin:3px 0;
	float:left;
	/*border-bottom:1px solid #e8e8e8*/
}
 .viditemdiv.memberdiv>.user>img
{
	border-color:#dce3ed
}
.viditemdiv.memberdiv>.body>.time
{
	position:static
}
.viditemdiv.memberdiv>.body>.videotitle{
	}
	
.body .videotitle a{ font-size:11px; font-weight:bold;  
 
}
 .viditemdiv.memberdiv>.body>.videotitle>a
{  
	display:inline-block; 
	max-width:100px;
	max-height:18px;
	overflow:hidden;
	text-overflow:ellipsis;
	word-break:break-all
}
.viditemdiv .tools
{
	width:20px;
	position:absolute;
	right:4px;
	bottom:16px;
	display:none
}
.viditemdiv .tools .btn
{
	border-radius:36px;
	margin:1px 0
}
.viditemdiv .body .tools
{
	bottom:4px;
	position:relative;
	right:0px;
}
.viditemdiv.commentdiv .tools
{
	right:9px
}
.viditemdiv:hover .tools
{
	display:inline-block
}

.youtube-main-content .userinfo{ font-size:13px; color:#555 ;  }


.youtube-main-content .utbt{ color:#33C!important; }
.youtube-search-btn{ border: 1px solid #d3d3d3;
background: #f8f8f8;
color: #333;
display: inline-block;
height: 24px;
outline: 0;
font-weight: bold;
font-size: 11px;
text-decoration: none;
white-space: nowrap;
word-wrap: normal;
line-height: 22px;
vertical-align: middle;
cursor: pointer;
width: 55px;
text-align: center;}
.youtube-search-btn:hover{ border: 1px solid #a6a6a6;
background:#e8e7e7;
color:#000;
display: inline-block;
height: 24px;
outline: 0;
font-weight: bold;
font-size: 11px;
text-decoration: none;
white-space: nowrap;
word-wrap: normal;
line-height: 22px;
vertical-align: middle;
cursor: pointer;
width: 55px;
text-align: center;}

.youtube-main-content{ }


#authorize-button{color: #FFF;
background-color: #1b7fcc;
border: 1px solid #1b7fcc;
box-shadow: 0px 1px 0px rgba(20, 108, 136, 0.5);
line-height: 22px; width:100%; 
}

#search-container{padding-top: 10px;}

	.youtube-main-content{  }

.csslider {
  -moz-perspective: 1300px;
  -ms-perspective: 1300px;
  -webkit-perspective: 1300px;
  perspective: 1300px;
  display: inline-block;
  text-align: left;
  position: relative;
  margin-bottom: 15px; border-bottom: 1px solid grey;
}
.csslider > input {
  display: none;
}
.csslider > input:nth-of-type(10):checked ~ ul li:first-of-type {
  margin-left: -900%;
}
.csslider > input:nth-of-type(9):checked ~ ul li:first-of-type {
  margin-left: -800%;
}
.csslider > input:nth-of-type(8):checked ~ ul li:first-of-type {
  margin-left: -700%;
}
.csslider > input:nth-of-type(7):checked ~ ul li:first-of-type {
  margin-left: -600%;
}
.csslider > input:nth-of-type(6):checked ~ ul li:first-of-type {
  margin-left: -500%;
}
.csslider > input:nth-of-type(5):checked ~ ul li:first-of-type {
  margin-left: -400%;
}
.csslider > input:nth-of-type(4):checked ~ ul li:first-of-type {
  margin-left: -300%;
}
.csslider > input:nth-of-type(3):checked ~ ul li:first-of-type {
  margin-left: -200%;
}
.csslider > input:nth-of-type(2):checked ~ ul li:first-of-type {
  margin-left: -100%;
}
.csslider > input:nth-of-type(1):checked ~ ul li:first-of-type {
  margin-left: 0%;
}
.csslider > ul {
  position: relative;
  width: 310px;
 /* height: 130px;*/
  z-index: 1;
  font-size: 0;
  line-height: 0;
  margin: 0 auto!important;
  overflow: hidden;
  white-space: nowrap;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
.videotitle{font-weight: bold;}
.csslider > ul > li {
  position: relative;
  display: inline-block; 
  width: 78px;
  height: 100%;
  overflow: hidden;
  font-size: 11px;
  font-size: initial;
  line-height: normal;
  -moz-transition: all 0.5s cubic-bezier(0.4, 1.3, 0.65, 1);
  -o-transition: all 0.5s ease-out;
  -webkit-transition: all 0.5s cubic-bezier(0.4, 1.3, 0.65, 1);
  transition: all 0.5s cubic-bezier(0.4, 1.3, 0.65, 1);
  -moz-background-size: cover;
  -o-background-size: cover;
  -webkit-background-size: cover;
  background-size: cover;
  vertical-align: top;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  white-space: normal; border:0px solid green;
}
.csslider > ul > li.scrollable {
  overflow-y: scroll;
}
.csslider > .navigation {
  position: absolute;
  bottom: -8px;
  left: 50%;
  z-index: 10;
  margin-bottom: -10px;
  font-size: 0;
  line-height: 0;
  text-align: center;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.csslider > .navigation > div {
  margin-left: -100%;
}
.csslider > .navigation label {
  position: relative;
  display: inline-block;
  cursor: pointer;
  border-radius: 50%;
  margin: 0 4px;
  padding: 4px;
  background: #3a3a3a;
}
.csslider > .navigation label:hover:after {
  opacity: 1;
}
.csslider > .navigation label:after {
  content: '';
  position: absolute;
  left: 50%;
  top: 50%;
  margin-left: -6px;
  margin-top: -6px;
  background: #71ad37;
  border-radius: 50%;
  padding: 6px;
  opacity: 0;
}
.csslider > .arrows {
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.csslider.inside .navigation {
  bottom: 10px;
  margin-bottom: 10px;
}
.csslider.inside .navigation label {
  border: 1px solid #7e7e7e;
}
.csslider > input:nth-of-type(1):checked ~ .navigation label:nth-of-type(1):after,
.csslider > input:nth-of-type(2):checked ~ .navigation label:nth-of-type(2):after,
.csslider > input:nth-of-type(3):checked ~ .navigation label:nth-of-type(3):after,
.csslider > input:nth-of-type(4):checked ~ .navigation label:nth-of-type(4):after,
.csslider > input:nth-of-type(5):checked ~ .navigation label:nth-of-type(5):after,
.csslider > input:nth-of-type(6):checked ~ .navigation label:nth-of-type(6):after,
.csslider > input:nth-of-type(7):checked ~ .navigation label:nth-of-type(7):after,
.csslider > input:nth-of-type(8):checked ~ .navigation label:nth-of-type(8):after,
.csslider > input:nth-of-type(9):checked ~ .navigation label:nth-of-type(9):after,
.csslider > input:nth-of-type(10):checked ~ .navigation label:nth-of-type(10):after,
.csslider > input:nth-of-type(11):checked ~ .navigation label:nth-of-type(11):after {
  opacity: 1;
}
.csslider > .arrows {
  position: absolute;
  left: -31px;
  top: 50%;
  width: 100%;
  height: 26px;
  padding: 0 31px;
  z-index: 0;
  -moz-box-sizing: content-box;
  -webkit-box-sizing: content-box;
  box-sizing: content-box;
}
.csslider > .arrows label {
  display: none;
  position: absolute;
  top: -50%;
  padding: 13px;
  box-shadow: inset 2px -2px 0 1px #3a3a3a;
  cursor: pointer;
  -moz-transition: .15s;
  -o-transition: .15s;
  -webkit-transition: .15s;
  transition: .15s;
}
.csslider > .arrows label:hover {
  box-shadow: inset 3px -3px 0 2px #71ad37;
  margin: 0 0px;
}
.csslider > .arrows label:before {
  content: '';
  position: absolute;
  top: -100%;
  left: -100%;
  height: 300%;
  width: 300%;
}
.csslider.infinity > input:first-of-type:checked ~ .arrows label:last-of-type,
.csslider > input:nth-of-type(1):checked ~ .arrows label:nth-of-type(0),
.csslider > input:nth-of-type(2):checked ~ .arrows label:nth-of-type(1),
.csslider > input:nth-of-type(3):checked ~ .arrows label:nth-of-type(2),
.csslider > input:nth-of-type(4):checked ~ .arrows label:nth-of-type(3),
.csslider > input:nth-of-type(5):checked ~ .arrows label:nth-of-type(4),
.csslider > input:nth-of-type(6):checked ~ .arrows label:nth-of-type(5),
.csslider > input:nth-of-type(7):checked ~ .arrows label:nth-of-type(6),
.csslider > input:nth-of-type(8):checked ~ .arrows label:nth-of-type(7),
.csslider > input:nth-of-type(9):checked ~ .arrows label:nth-of-type(8),
.csslider > input:nth-of-type(10):checked ~ .arrows label:nth-of-type(9),
.csslider > input:nth-of-type(11):checked ~ .arrows label:nth-of-type(10) {
  display: block;
  left: 0;
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
  transform: rotate(45deg);
}
.csslider.infinity > input:last-of-type:checked ~ .arrows label:first-of-type,
.csslider > input:nth-of-type(1):checked ~ .arrows label:nth-of-type(2),
.csslider > input:nth-of-type(2):checked ~ .arrows label:nth-of-type(3),
.csslider > input:nth-of-type(3):checked ~ .arrows label:nth-of-type(4),
.csslider > input:nth-of-type(4):checked ~ .arrows label:nth-of-type(5),
.csslider > input:nth-of-type(5):checked ~ .arrows label:nth-of-type(6),
.csslider > input:nth-of-type(6):checked ~ .arrows label:nth-of-type(7),
.csslider > input:nth-of-type(7):checked ~ .arrows label:nth-of-type(8),
.csslider > input:nth-of-type(8):checked ~ .arrows label:nth-of-type(9),
.csslider > input:nth-of-type(9):checked ~ .arrows label:nth-of-type(10),
.csslider > input:nth-of-type(10):checked ~ .arrows label:nth-of-type(11),
.csslider > input:nth-of-type(11):checked ~ .arrows label:nth-of-type(12) {
  display: block;
  right: 0;
  -moz-transform: rotate(225deg);
  -ms-transform: rotate(225deg);
  -o-transform: rotate(225deg);
  -webkit-transform: rotate(225deg);
  transform: rotate(225deg);
}
@import url('//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css');
</style>



<script>
function loadutubecontent(){
	//	$(this).css("background-color", "red");
	$("#search-container").hide();
	//alert('Hi !');
}


$(".youtube-main-content #myTab li").eq(1).click(function(){
	$(this).css("background-color", "red");
		//alert('Wow');
});

function creatPlayList(){
$('#creatplaylistform').show();
	}
function hideform(){
	$('#creatplaylistform').hide();
}

var lastselectedtabvalue = $('#lastselectedheck').val();
      // Enter a client ID for a web application from the Google Developer Console.
      // The provided clientId will only work if the sample is run directly from
      // https://google-api-javascript-client.googlecode.com/hg/samples/authSample.html
      // In your Developer Console project, add a JavaScript origin that corresponds to the domain
      // where you will be running the script.
      var clientId = '256900375360';

      // Enter the API key from the Google Develoepr Console - to handle any unauthenticated
      // requests in the code.
      // The provided key works for this sample only when run from
      // https://google-api-javascript-client.googlecode.com/hg/samples/authSample.html
      // To use in your own application, replace this API key with your own.
      var apiKey = 'AIzaSyDmnumV0Rt6XzaxK0IeCA2yoEsSOsSEVDs';

      // To enter one or more authentication scopes, refer to the documentation for the API.
      var scopes = ['https://www.googleapis.com/auth/youtube','https://www.googleapis.com/auth/plus.me'];
 
	  // Define some variables used to remember state.
	  var myvideoId, playlistId, nextPageToken, prevPageToken, nextPageTokenList, prevPageTokenList, nextPageTokenSearch, prevPageTokenSearch;

      // Use a button to handle authentication the first time.
      function handleClientLoad() {
        gapi.client.setApiKey(apiKey);
        window.setTimeout(checkAuth,1);
      }

      function checkAuth() {
        gapi.auth.authorize({client_id: clientId, scope: scopes, immediate: true}, handleAuthResult);
      }

	  function handleAuthClick(event) {
        	gapi.auth.authorize({client_id: clientId, scope: scopes, immediate: false}, handleAuthResult);
        	return false;
      }
	  
      function handleAuthResult(authResult) {
		 
        var authorizeButton = document.getElementById('authorize-button');
        if (authResult && !authResult.error) {
          authorizeButton.style.display = 'none';
          handleAPILoaded();
        } else {
          authorizeButton.style.display = 'block';
          authorizeButton.onclick = handleAuthClick;
        }
      }

		// After the API loads, call a function to get the uploads playlist ID.
		function handleAPILoaded() {			
			makeApiCall();
		}
      	
		//###################################################//
		//############## MY VIDEOS FUNCTION #################//
		//###################################################//
		
		// Load the API and make an API call.  Display the results on the screen.
		function makeApiCall() {
			$('#userbar').css("display","block");
			
			
			gapi.client.load('plus', 'v1', function() {
			  var request = gapi.client.plus.people.get({
				'userId': 'me'
			  });
			  request.execute(function(resp) {
			   	$('#flagcheck').val("1");

		
				$('#userbar').show();
				$('#yt_avatar').attr('src',resp.image.url);
				$('#yt_username').html(resp.displayName);
			  });
			});
		}
		 
		// Call the Data API to retrieve the playlist ID that uniquely identifies the
		// list of videos uploaded to the currently authenticated user's channel.
		function requestUserUploadsPlaylistId() {
			gapi.client.load('youtube', 'v3', function() {
				
			  var request = gapi.client.youtube.channels.list({
				part: 'contentDetails',
				mine: true
				
			  });
			  request.execute(function(resp) {
				
						myvideoId = resp.result.items[0].contentDetails.relatedPlaylists.uploads;
						requestVideoPlaylist(myvideoId);
			  });
			});	
		}
		
		// Retrieve the list of videos in the specified playlist.
		function requestVideoPlaylist(playlistId, pageToken) {
			
$('.youtube-main-content').show();
$('#search-container').html('');

		  $('#video-container').html('');
		  var requestOptions = {
			playlistId: playlistId,
			part: 'snippet',
			maxResults: 5
		  };
		  if (pageToken) {
			requestOptions.pageToken = pageToken;
		  }
		  var request = gapi.client.youtube.playlistItems.list(requestOptions);
		  request.execute(function(response) {
			// Only show pagination buttons if there is a pagination token for the
			// next or previous page of results.
			nextPageToken = response.result.nextPageToken;
			var nextVis = nextPageToken ? '' : 'none';
			$('#next-button').css('display', nextVis);
			prevPageToken = response.result.prevPageToken
			var prevVis = prevPageToken ? '' : 'none';
			$('#prev-button').css('display', prevVis);
			var playlistItems = response.result.items;
			if (playlistItems) {
			  $.each(playlistItems, function(index, item) {
				displayResult(item.snippet,'search-container');
			  });
			  
			  $("a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
			  
			} else {
			  $('#search-container').html('Sorry you have no uploaded videos');
			}
		  });
		}
		
		function displayResultSearch(videoSnippet,container)
		{
			var videoUrl = videoSnippet.thumbnails.default.url;
			var videoTitle = videoSnippet.title.substring(0,15)+'...';
			var VideoDescription = videoSnippet.description.substring(0,35)+'...';
			var channelTitle = videoSnippet.channelTitle;
			var prevideoLink = videoUrl.split('/');
			var videoLink = 'http://www.youtube.com/watch?v='+$(prevideoLink).get(-2)+'?rel=0';
			
			

			
			$('#'+container).append('<div class="viditemdiv commentdiv"><div class="user"><a href="'+videoLink+'" rel="prettyPhoto" title="'+videoTitle+'" ><img alt="" src="'+videoUrl+'" style="height:75px;width:110px;" /></a></div><div class="body"><div class="videotitle"> <a href="'+videoLink+'" rel="prettyPhoto" title="'+videoTitle+'" >'+videoTitle+'</a></div><div class="descriptiontext"> '+VideoDescription+'<br><strong>By '+channelTitle+'</strong></div><div class="timeview"><div align="left" style="padding-bottom:5px">&nbsp;&nbsp;&nbsp;</div></div></div></div>');
		}
		// Create a listing for a video.
		function displayResult(videoSnippet,container) {
		 
		  var videoUrl = videoSnippet.thumbnails.default.url;
		  var videoTitle = videoSnippet.title.substring(0,15)+'...';
		  var VideoDescription = videoSnippet.description.substring(0,35)+'...';
		  var channelTitle = videoSnippet.channelTitle;
		  var videoLink = 'http://www.youtube.com/watch?v='+videoSnippet.resourceId.videoId+'?rel=0';

		
		 
		 $('#'+container).append('<div class="viditemdiv commentdiv"><div class="user"><a href="'+videoLink+'" rel="prettyPhoto" title="'+videoTitle+'" ><img alt="" src="'+videoUrl+'" width="110" height="60" /></a></div><div class="body"><div class="videotitle"> <a href="'+videoLink+'" rel="prettyPhoto" title="'+videoTitle+'" >'+videoTitle+'</a></div><div class="descriptiontext"> '+VideoDescription+'<br><strong>By '+channelTitle+'</strong></div><div class="timeview"><div align="left" style="padding-bottom:5px">&nbsp;&nbsp;&nbsp;</div></div></div></div>');

		}
		
		// Retrieve the next page of videos in the playlist.
		function nextPage() {
		  setTimeout("requestVideoPlaylist(myvideoId, nextPageToken)",1000);
		}
		
		// Retrieve the previous page of videos in the playlist.
		function previousPage() {
			setTimeout("requestVideoPlaylist(myvideoId, prevPageToken)",1000);;
		  
		}

		
		//###################################################//
		//############## END [MY VIDEOS FUNCTION] ###########//
		//###################################################//
		
		
		
		
		//###################################################//
		//############## PLAY LIST FUNCTIONS ################//
		//###################################################//
		
		function requestUserPlaylistId(pageToken) {


			$('#search-container').html('');
			
			var xcoun = 101;
			
			gapi.client.load('youtube', 'v3', function() {
				
			  var request = gapi.client.youtube.playlists.list({
				part: 'snippet',
				mine: true,
				maxResults : 3,
				pageToken:pageToken
			  });
			  request.execute(function(resp) {

					if(parseInt(resp.result.pageInfo.totalResults)>0) {
						$('.paging-button-playlist').show();
						for (var prop in resp.result.items) {
						//readObj(resp.result);
						var newobj = resp.result.items[prop].snippet;
						//readObj(newobj);

						
						// Only show pagination buttons if there is a pagination token for the
						// next or previous page of results.
						nextPageTokenList = resp.result.nextPageToken;
						var nextVis = nextPageTokenList ? '' : 'none';
						$('#next-button-playlist').css('display', nextVis);
						prevPageTokenList = resp.result.prevPageToken;
						var prevVis = prevPageTokenList ? '' : 'none';
						$('#prev-button-playlist').css('display', prevVis);
						
						// retrive playlist id
						playlistId = resp.result.items[prop].id;
						
	 $('#search-container').append('<div class="viditemdiv commentdiv"><div class="videotitle"> <a href="javascript:void(0)">'+newobj.title+'</a></div><div class="descriptiontext"> '+newobj.description.substring(0,25)+'...</div></div> <!--loadingiteam--><div class="csslider"><ul id="div_'+xcoun+'"></ul></div>');

						
						requestPlayListVideos(playlistId,'div_'+xcoun);						
						xcoun = xcoun + 100;
		 			}
					}
					else
					{
						$('#search-container').html('Sorry you have no uploaded videos');
					}
					//playlistId = resp.result.items[0].contentDetails.relatedPlaylists.uploads;
					//requestVideoPlaylist(playlistId);
			  });
			});
			
		}

		function requestPlayListVideos(playlistId, divid, pageToken) {
			//alert(playlistId);
			//$('.paging-button').show();
		 
		  var requestOptions = {
			playlistId: playlistId,
			part: 'snippet',
			maxResults: 5
		  };
		  if (pageToken) {
			//requestOptions.pageToken = pageToken;
		  }
		  var request = gapi.client.youtube.playlistItems.list(requestOptions);
		  request.execute(function(response) {
			 // readObj(response.result);
			
			var playlistItems = response.result.items;
			if (playlistItems) {
			  
			  $.each(playlistItems, function(index, item) {
				displayResultPlaylist(item.snippet,divid);
			  });

				$("a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
			  
			  
			  $('#'+divid).append('<div style="clear:both"></div>');
			} else {
			  $('#'+divid).html('Sorry you have no uploaded videos for this playlist');
			}
		  });
		}
		
		// Create a listing for a video.
		function displayResultPlaylist(videoSnippet,divid) {
		  var title = videoSnippet.title;
		  var videoId = videoSnippet.resourceId.videoId;
		  var videoLink = 'http://www.youtube.com/watch?v='+videoId+'?rel=0';
		  
		  $('#'+divid).append('<li><div style="float:left;padding-right:10px;font-size: 10px;"><a href="'+videoLink+'" rel="prettyPhoto" title="'+title+'" ><img src="http://img.youtube.com/vi/' + videoId + '/default.jpg" width="68" /></a><br>'+ title +'</div></li>');
		}
		
		// Retrieve the next page of videos in the playlist.
		function nextPagePlayList() {
		  setTimeout("requestUserPlaylistId(nextPageTokenList)",1000);
		}
		
		// Retrieve the previous page of videos in the playlist.
		function previousPagePlayList() {
			setTimeout("requestUserPlaylistId(prevPageTokenList)",1000);
		}

		//###################################################//
		//############## END [PLAY LIST FUNCTIONS ###########//
		//###################################################//
		
		
		
		
		
		//###################################################//
		//############## SEARCH FUNCTION ####################  showing search result//
		//###################################################//
		
		function requestSearchList(pageToken) {
	$("#search-container").show();

		  	var q = $('#search-input').val();
			var forMine = $('#forMine').val();
			var loadingSearchdivYT = "<div id='loading'></div>";

			  $('#search-container').html(loadingSearchdivYT);

			
		  gapi.client.load('youtube', 'v3', function() {
				
			  var request = gapi.client.youtube.search.list({
				q: q,
				part: 'snippet',
				pageToken:pageToken
				
			  });
			  request.execute(function(resp) {
				
					if(parseInt(resp.result.pageInfo.totalResults)>0) {
												/*g */$('#search-container').html('<p>Search Result for <b>'+ q +'</b></p>');
						$('.paging-button-search').show();
						
						// next or previous page of results.
						nextPageTokenSearch = resp.result.nextPageToken;
						var nextVis = nextPageTokenSearch ? '' : 'none';
						$('#next-button-search').css('display', nextVis);
						
						prevPageTokenSearch = resp.result.prevPageToken;
						var prevVis = prevPageTokenSearch ? '' : 'none';
						$('#prev-button-search').css('display', prevVis);
						
						 var playlistItems = resp.result.items;
						 $.each(playlistItems, function(index, item) {
							displayResultSearch(item.snippet,'search-container');
						 });
			  
			  			$("a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
					}
					else
					{
						$('#search-container').html('Sorry no related videos found');
					}
			  });
			});
		  
		  
		  
		  
		}
		
		
		
		
		function nextSearchPage() {
			requestSearchList(nextPageTokenSearch);
		}
		
		function previousSearchPage() {
			requestSearchList(prevPageTokenSearch);
		}
		
		//###################################################//
		//############## END [SEARCH FUNCTION] ##############//
		//###################################################//
		
		
		function readObj(obj)
		{
		 var errors = '';
										 for (var prop in obj) {
			 errors += prop + ": " + obj[prop] + "\n";
		 }
		 alert(errors);
		}
		
		

</script>
    
<script src="https://apis.google.com/js/client.js?onload=handleClientLoad"></script>
<script src="./js/jquery.prettyPhoto.js"></script>




  
  <!-- /.modal -->

<!--a href="http://www.youtube.com/watch?v=6w4FI0Jq0lI">Video 1</a>
<a href="http://www.youtube.com/watch?v=6w4FI0Jq0lI" data-width="640" data-height="360">Video 2</a-->
<div class="accordion-inner">
<!--a href="https://www.youtube.com/watch?v=4JZhGYrgCPg">Watch Video 1</a>
<a href="https://www.youtube.com/watch?v=4JZhGYrgCPg" data-width="640" data-height="360">Watch Video 2</a-->


    <div id="userbar" style="background-color:#ededed; white-space:inherit;line-height: 30px;
padding: 5px;border: 0px solid #cecece;
border-bottom: transparent; display:none">
      <div class="userinfo"> <img alt="" id="yt_avatar" src="images/avatar5.png" width="30px" style="float: left;
padding-right: 6px;"  />
        <div style="padding-right:5px; display:inline-block" id="yt_username"></div>
        <div style="float:right; clear:right; position:relative;  display: inline-block; border-left: 1px solid #CCC; padding-left:5px;
}"><a href="#">Log Out</a></div>
      </div></div>
<div class="padd10">  

  

<input name="flags" id="lastselectedheck" type="hidden" value="0" style="width:30%"   >

<button id="authorize-button" >Sign in</button>
</div>
<div class="clearfix youtube-search-content padd10">


	<input name="search-input" id="search-input" type="text" style="width:79%" placeholder="Search Videos...">
  <span class="youtube-search-btn pull-right" data-rel="#" data-ajax="#" data-placement="#" onclick="jQuery('#utubeSubab3').hide(); requestSearchList('')"> <i class="icon-search "></i></span>



<div class="dataTables_paginate paging_bootstrap pagination paging-button-search" style="clear:both; display:none;">
<ul>
<li class="prev" id="prev-button-search" style="display:none" onClick="previousSearchPage();" ><a href="javascript:void(0)"><i class="icon-double-angle-left"></i></a></li>
<li class="next" id="next-button-search" style="display:none" onClick="nextSearchPage();"><a href="javascript:void(0)"><i class="icon-double-angle-right"></i></a></li>
</ul>
</div>
  

	</div>
<div class="3prtytabbable youtube-main-content" id="3prtytabbablers" style="margin-top: -9px;">
<ul class="nav nav-subtabs" id="myTab">
	<li class="active first utbt"><a data-toggle="tab" href="#utubeSubab1" onclick="jQuery('#utubeSubab3').hide(); requestUserUploadsPlaylistId();">My Videos</a></li>
	<li class="second utbt"><a data-toggle="tab" href="#utubeSubab2" onclick="jQuery('#utubeSubab3').hide(); requestUserPlaylistId(); ">My Playlist</a></li>
	<li class="third utbt"><a data-toggle="tab" href="#utubeSubab3" onclick="jQuery('#search-container').hide(); jQuery('#utubeSubab3').show();">Upload Video</a> </li>
</ul>
    <div class="tab-content subtab-content">
      <div id="utubeSubab1" class="tab-pane active">
        <div class="page-content no-padding">
          <div class="row-fluid">
          
            
            <div class="dataTables_paginate paging_bootstrap pagination" style="clear:both">
                <ul>
                  <li class="prev paging-button" id="prev-button" style="display:none" onClick="previousPage();" ><a href="javascript:void(0)"><i class="icon-double-angle-left"></i></a></li>
                  <li class="next paging-button" id="next-button" style="display:none" onClick="nextPage();"><a href="javascript:void(0)"><i class="icon-double-angle-right"></i></a></li>
                </ul>
              </div>
          </div>
        </div>
      </div>
      <div  id="search-container">  </div>
      <div id="utubeSubab2" class="tab-pane">

	      
      	  <span class="btn btn-mini" data-rel="#" data-ajax="#" data-placement="#" style="display:none;" >
          <a href="javascript:void(0)" onClick="creatPlayList();" >Create New Playlist</a>
          </span>
          <div id="creatplaylistform"> Add New Playlist
            Enter a title for the new playlist::
            <div class="padd10">
              <input name="txtFirstName" id="txtFirstName" type="text" style="width:90%">
            </div>
            Enter a description:
            <div class="padd10">
              <input name="txtFirstName" id="txtFirstName" type="text" style="width:90%">
            </div>
            <div class="padd10"> <span class="btn btn-mini" data-rel="#" data-ajax="#" data-placement="#"><a href="javascript:void(0)" onClick="hideform();">Create Playlist</a></span> </div>
          </div>
          
          <div class="dataTables_paginate paging_bootstrap pagination">
            <ul>
              <li class="prev paging-button-playlist" id="prev-button-playlist" style="display:none" onClick="previousPagePlayList();" ><a href="javascript:void(0)"><i class="icon-double-angle-left"></i></a></li>
              <li class="next paging-button-playlist" id="next-button-playlist" style="display:none" onClick="nextPagePlayList();"><a href="javascript:void(0)"><i class="icon-double-angle-right"></i></a></li>
            </ul>
          </div>
          
      </div>
      <div id="utubeSubab3" style="display:none;" class="tab-pane"> <span class="help-block">You can select upto 5 groups</span> Enter video title:
        <div class="padd10">
          <input name="txtFirstName" id="txtFirstName" type="text" style="width:90%">
        </div>
        Enter video description:
        <div class="padd10">
          <input name="txtFirstName" id="txtFirstName" type="text" style="width:90%">
        </div>
        Select a category:
        <div class="padd10">
          <select class="form-control" style="width:90%" onChange="showContent(1, 2, this.value)">
            <option value="all" selected="">All Videos</option>
            <option value="last">Latest</option>
            <option value="cust">My Videoss</option>
          </select>
        </div>
        Enter some tags to describe your video
        <div class="padd10">
          <input name="txtFirstName" id="txtFirstName" type="text" style="width:90%">
        </div>
        (separated by spaces):
        <div class="padd10"> <span class="btn btn-mini" data-rel="#" data-ajax="#" data-placement="#">Upload</span> </div>
      </div>
      <div id="utubeSubab4" class="tab-pane" >
        <div class="clearfix">
        
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
			window.jQuery || document.write("<script src='js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>
<script src="js/jquery.bxslider.js"></script>
<script type="text/javascript">
/*

NOTE : IT WAS COMMENTED JUST BECAUSE IT WAS CONFLICTIN GOT DATE PICKER OF DASHBOARD BOXES, AND FOR NOW THE BX SLIDER IS ALSO NOW IN WORKING FACE

$( window ).load(function() {
$('.bxslider').bxSlider({
	slideWidth: 105,
    minSlides: 1,
    maxSlides: 3,
    slideMargin: 5,
	moveSlides: 1,
}); });
*/
</script>
<!--script type="text/javascript">

/*g2 */
$(document).ready(function(){
$('.bxslider').bxSlider({
	mode: 'fade',
	pager: true,
	autoControls: true,
	controls: false,
	auto: false,
});
$('.bxgallery').bxSlider({
    maxSlides: 5,
	moveSlides: 1,
    slideWidth: 120,
	slideMargin: 0,
	pager: false,
});
});

</script-->
