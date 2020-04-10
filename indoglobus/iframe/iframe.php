<table border="" cellspacing="4" cellpadding="14">
<tbody><tr><td valign="top" width="48%">
<center>
<h1>A Simple Sample Web Page</h1>

<div id="remove_me" style="position:absolute; width:150px; height:50px; background-color:red">Please Remove Me</div>

<h4>By Sheldon Brown</h4>
<h2>Demonstrating a few HTML features</h2>
</center>
<input type="text" id="t1" value="meral" />
HTML is really a very simple language. It consists of ordinary text, with commands that are enclosed by "&lt;" and "&gt;" characters, or bewteen an "&amp;" and a ";". <p>
You don't really need to know much HTML to create a page, because you can copy bits of HTML from other pages that do what you want, then change the text!</p><p>
This page shows on the left as it appears in your browser, and the corresponding HTML code appears on the right. The HTML commands are linked to explanations of what they do.
</p><h3>Line Breaks</h3>
HTML doesn't normally use line breaks for ordinary text. A white space of any size is treated as a single space. This is because the author of the page has no way of knowing the size of the reader's screen, or what size type they will have their browser set for.<p>
If you want to put a line break at a particular place, you can use the "&lt;BR&gt;" command, or, for a paragraph break, the "&lt;P&gt;" command, which will insert a blank line. The heading command ("&lt;H4&gt;&lt;/H4&gt;") puts a blank line above and below the heading text.
</p><h4>Starting and Stopping Commands</h4>
Most HTML commands come in pairs: for example, "&lt;H4&gt;" marks the beginning of a size 4 heading, and "&lt;/H4&gt;" marks the end of it. The closing command is always the same as the opening command, except for the addition of the "/".<p>
Modifiers are sometimes included along with the basic command, inside the opening command's &lt; &gt;. The modifier does not need to be repeated in the closing command.
</p><h1>This is a size "1" heading</h1>
<h2>This is a size "2" heading</h2>
<h3>This is a size "3" heading</h3>
<h4>This is a size "4" heading</h4>
<h5>This is a size "5" heading</h5>
<h6>This is a size "6" heading</h6>
<center>
<h4>Copyright © 1997, by <a href="http://sheldonbrown.com/index.html">Sheldon Brown</a></h4>
If you would like to make a link or bookmark to this page, the URL is:<br>
</center></td><td valign="top" bgcolor="gray" width="48%"><code>
<a href="#head">&lt;HEAD&gt;</a><br>
<a href="#title">&lt;TITLE&gt;</a>Basic HTML Sample Page<a href="#title">&lt;/TITLE&gt;</a><br>
<a href="#head">&lt;/HEAD&gt;</a><p>
<a href="#body">&lt;BODY</a><a href="#bgcolor"> BGCOLOR="WHITE"&gt;</a><br>
<a href="#center">&lt;CENTER&gt;</a><br>
<a href="#h">&lt;H1&gt;</a>A Simple Sample Web Page<a href="#h">&lt;/H1&gt;</a></p><p>&nbsp;</p><p>&nbsp;
<a href="#img">&lt;IMG SRC="</a>http://sheldonbrown.com/images/scb_eagle_contact.jpeg<a href="#img">"&gt;</a></p><p>&nbsp;</p><p></p><p>&nbsp;</p><p>&nbsp;
<a href="#h">&lt;H4&gt;</a>By Sheldon Brown<a href="#h">&lt;/H4&gt;</a></p><p>
<a href="#h">&lt;H2&gt;</a>Demonstrating a few HTML features<a href="#h">&lt;/H2&gt;</a></p><p>
<a href="#center">&lt;/CENTER&gt;</a></p><p>
HTML is really a very simple language. It consists of ordinary text, with commands that are enclosed by "&lt;" and "&gt;" characters, or bewteen an "&amp;" and a ";". <a href="#p">&lt;P&gt;</a><br>&nbsp;</p><p>
You don't really need to know much HTML to create a page, because you can copy bits of HTML from other pages that do what you want, then change the text!<a href="#p">&lt;P&gt;</a><br>&nbsp;</p><p>
This page shows on the left as it appears in your browser, and the corresponding HTML code appears on the right. The HTML commands are linked to explanations of what they do.<br>&nbsp;</p><p>&nbsp;</p><p>
<a href="#h">&lt;H3&gt;</a>Line Breaks<a href="#h">&lt;/H3&gt;</a></p><p>
HTML doesn't normally use line breaks for ordinary text. A white space of any size is treated as a single space. This is because the author of the page has no way of knowing the size of the reader's screen, or what size type they will have their browser set for.<a href="#p">&lt;P&gt;</a></p><p>&nbsp;</p><p>
If you want to put a line break at a particular place, you can use the "<a href="#br">&lt;BR&gt;</a>" command, or, for a paragraph break, the "<a href="#p">&lt;P&gt;</a>" command, which will insert a blank line. The heading command ("<a href="#h">&lt;4&gt;&lt;/4&gt;</a>") puts a blank line above and below the heading text.</p><p>&nbsp;</p><p>
<a href="#h">&lt;H4&gt;</a>Starting and Stopping Commands<a href="#h">&lt;/H4&gt;</a></p><p>
Most HTML commands come in pairs: for example, "<a href="#h">&lt;H4&gt;</a>" marks the beginning of a size 4 heading, and "<a href="#h">&lt;/H4&gt;</a>" marks the end of it. The closing command is always the same as the opening command, except for the addition of the "/".<a href="#p">&lt;P&gt;</a></p><p>&nbsp;</p><p>
Modifiers are sometimes included along with the basic command, inside the opening command's &lt; &gt;. The modifier does not need to be repeated in the closing command.</p><p>&nbsp;</p><p>&nbsp;</p><p>
<a href="#h">&lt;H1&gt;</a>This is a size "1" heading<a href="#h">&lt;/H1&gt;</a></p><p>
<a href="#h">&lt;H2&gt;</a>This is a size "2" heading<a href="#h">&lt;/H2&gt;</a></p><p>
<a href="#h">&lt;H3&gt;</a>This is a size "3" heading<a href="#h">&lt;/H3&gt;</a></p><p>
<a href="#h">&lt;H4&gt;</a>This is a size "4" heading<a href="#h">&lt;/H4&gt;</a></p><p>
<a href="#h">&lt;H5&gt;</a>This is a size "5" heading<a href="#h">&lt;/H5&gt;</a></p><p>
<a href="#h">&lt;H6&gt;</a>This is a size "6" heading<a href="#h">&lt;/H6&gt;</a></p><p>
<a href="#center">&lt;center&gt;</a></p><p>
<a href="#h">&lt;H4&gt;</a>Copyright © 1997, by<br> <a href="#href">&lt;A HREF="</a><a href="#href">"&gt;</a>Sheldon Brown<a href="#href">&lt;/A&gt;</a><a href="#h"><br>&lt;/H4&gt;</a></p><p>
If you would like to make a link or bookmark to this page, the URL is:<a href="#br">&lt;BR&gt;</a>
<a href="#body">&lt;/body&gt;</a>
</p></code></td></tr></tbody></table>
<script>
var py = 123;
</script>