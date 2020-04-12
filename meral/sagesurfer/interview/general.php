<pre>
<h1>MYSQL</h1>Latest mysql 6.0
-----------------------

MySQL is RDBMS
RDBMS enforce the rules

-----------------------

DATABASE ENGINE IN MYSQL

MyISAM is MySQL's extended ISAM format and default database engine. In addition to providing a number of indexing 
and field management functions not available in ISAM
fast but recovety not possible and not supporting savepoint

INNODB
direct  products of the technology that makes MySQL so flexible
foreign-key support 
recovery possible

HEAP
HEAP allows for temporary tables that reside only in memory. Residing in memory makes HEAP faster than ISAM or 

MyISAM, but the data it manages is volatile and will be lost if it's not saved prior to shutdown.

----------------------

CHAR Vs VARCHAR

CHAR is used for Fixed Length Size Variable
VARCHAR is used for Variable Length Size Variable.

E.g.

Create table temp (City CHAR(10), Street VARCHAR(10));

Insert into temp values('Pune','Oxford');

select length(city), length(street) from temp;

Output will be

length(City)          Length(street)
10                    6



----------------------------------

which datatype is used for comma saperated value


----------------------------------

join

inner join - common in both
left join - all left value
right join - all right value
outer join - all value

----------------------------------

mysql_fetch_function

which one is faster


----------------------------------

FIND_IN_SET

how to find a specific value from a column having comma separated value

find 5 from 23,0,5,33,15,25

----------------------------------

How to fetch the unique record from a column

DISTINCT

----------------------------------

A table having last visited column having datetime datatye

How can i find specific record having of a perticular day


----------------------------------</pre>
<p>How would concatenate strings in MySQL?</p>
<p>With the use of - CONCAT (string1, string2, string3)</p>
<pre>

<a href="http://www.careerride.com/MySQL-Interview-Questions.aspx">http://www.careerride.com/MySQL-Interview-Questions.aspx</a>

##############################################

</pre>
<h1><br>
  PHP<br>
</h1>
<pre>
Latest php 5.5.3


--------

php.ini will run very first when php loads
it is for initiate the php & php settings like

display error
short tags
max upload file size
magic quotes
---------------------

SUPER GLOBAL VARIABLE

$GLOBALS
$_SERVER
$_GET
$_POST
$_FILES
$_COOKIE
$_SESSION
$_REQUEST
$_ENV

----------------------------------

max file upload

upload_max_filesize = 2M
post_max_size = 8M

------------------

Oops Concept

----------------------

FINAL KEYWORD

prevents child classes from overriding a method 
class itself is being defined final then it cannot be extended.

----------------------

STATIC KEYWORD

Declaring class properties or methods as static makes them accessible without needing an instantiation of the class.

A property declared as static can not be accessed with an instantiated class object (though a static method can).


-----------------

Overload Vs Overriding

overload : same name, different params
override : redefine the same function of parent class (not possible with final)

----------------

statick keyword

----------------

Interface v/s Abstract Class
</pre>
<p>In abstract classes this is not necessary that every method should be abstract. But in interface every method is abstract.</p>
<p>Method of php interface must be public only. Method in abstract class in php could be public or protected both.</p>
<pre>

----------------

</pre>
<pre>

Are all cookies the same?

There are two different types of cookies:

Session cookies - these are temporary and are erased when you close your browser at the end of your surfing 

session. The next time you visit that particular site it will not recognise you and will treat you as a completely 

new visitor as there is nothing in your browser to let the site know that you have visited before (more on session 

cookies).

Persistent cookies - these remain on your hard drive until you erase them or they expire. How long a cookie 

remains on your browser depends on how long the visited website has programmed the cookie to last (more on 

persistent cookies).

------------------

session & cookie

cookies is stored client side/local browser
session is also stored at server side but the link connection is maintained by the cookie only. actual data is 

stored in server side





---------------------

set session timeout
in php.ini set session.gc_maxlifetime = value

---------------------

web optimization

less http request
less mysql query
compress css & js
dont scale the image size

-----------------------

HTACCESS USE

Error Documents - 
Password protection - 
Enabling SSI via htaccess
Blocking users by IP
Blocking users/ sites by referrer
Blocking bad bots and site rippers (aka offline browsers)
Change your default directory page - 
Redirects - 
Prevent viewing of htaccess
Adding MIME types
Preventing hot linking of your images and other file types
Preventing directory listing
Conclusion and more information

----------------------------

Output buffer

ob_start()
ob_get_clean() removes the buffer (without printing it), and returns its content.
ob_get_flush() prints the buffer, removes it, and returns its content

----------------------------

ERROR TYPES IN PHP

1. Notices: 
These are small, non-critical errors 
for example, accessing a variable that has not yet been defined. 
By default, such errors are not displayed to the user at all 

2. Warnings: 
Warnings are more severe errors like attempting to include() a file which does not exist. 
By default, these errors are displayed to the user, but they do not result in script termination.

3. Fatal errors: These are critical errors - 
for example, instantiating an object of a non-existent class,
calling a non-existent function. 
These errors cause the immediate termination of the script

----------------------------

GARBAGE COLLECTION

Memory cleanup for long-running scripts.

<?php
gc_enable(); // Enable Garbage Collector
var_dump(gc_enabled()); // true
var_dump(gc_collect_cycles()); // # of elements cleaned up
gc_disable(); // Disable Garbage Collector
?>

----------------------------

Security Aspects of PHP

Any directory should not be accessible, put index.html
Store the password in secure way - md5 sh1
move_uploaded_file() instead of copy() or rename().

		-Always check that register globals are OFF

Always check that magic quotes are OFF

Make sure you understand SQL injection attacks

Turn OFF error reporting in production

Never use Admin or Root as your server log in name.


 
----------------------------

1 tier, 2 tier, 3 tier

UI - User Interface
BL - business logic
DAL - data access layer

1 tier - all are on one server
2 tier - UI & BL + DAL
3 tier - UI + BL + DAL

----------------------------

value pass by reference 

function doSomething( &amp;$arg )  {     $arg = 5;      }    <br />$a = 3;  <br />doSomething( $a );<br />echo $a;


now remove the argument

function doSomething(  )  {     $a = 5;      }   $a = 3;   doSomething();  echo $a;

----------------------------
</pre>
<p>$a = 012;<br />
  echo $a / 4;</p>
<p>// answer 2.5</p>
<p>When a number is preceded by a 0 in PHP, the number is treated as an octal number (base-8). Therefore the octal number 012 is equal to the decimal number 10.<br />
</p>
<p>----------------</p>
<pre>
###############################
</pre>
<h1><br />
jQuery</h1>
<p>how many selectors in jquery</p>
<p>----------------</p>
<p>animate function</p>
<p>$('#book').animate({<br />
  opacity: 0.30,<br />
  left: '+=20',<br />
  height: 'toggle'<br />
  }, 3000, function() {<br />
  // run after the animation complete.<br />
});</p>
<p>----------------</p>
<p>live keyword</p>
<p>----------------</p>
<p>how can i change the width of element</p>
<p>$(‘#mydiv’).css(‘width’,’300px’);<br />
$(‘#mydiv’).width(100);</p>
<p>----------------</p>
<p>how to add class with an element</p>
<p>----------------</p>
<p> How to always reference latest version of jQuery?</p>
<p>When you reference the jQuery on your web page, you have to specify the version number also.</p>
<p>&lt;script type=”text/javascript”<br />
  src=”http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js”&gt;<br />
  &lt;/script&gt;</p>
<p>&nbsp;</p>
<p><a href="http://www.careerride.com/jQuery-Interview-Questions.aspx#jquery2">http://www.careerride.com/jQuery-Interview-Questions.aspx#jquery2</a></p>
<p>&nbsp;</p>
<p>Explain the each() function.</p>
<p>create watch </p>
<p>&nbsp;</p>
<p>---------------------------- </p>
<pre>
###############################
</pre>
<h1><br>
  AJAX <br>
</h1>
<pre>

---------------------------- 

ajax status

0: request not initialized 
1: server connection established
2: request received 
3: processing request 
4: request finished and response is ready

---------------------------- 

ASYNCHRONOUS
there is no need of specif interval 
also called start-stop transmission.

telephone call is asynchronous
SMS is synchronous

-----------------------------
</pre>
<p>What is the disadvantage of AJAX?</p>
<p>The disadvantages of AJAX are: Search engines would not be able to index an AJAX application</p>
<p>--------------------------------------</p>
<p>ajax call via jquery</p>
<p>$.ajax({<br />
  type: &quot;POST&quot;,<br />
  url: url,<br />
  data: data,<br />
  success: success,<br />
  dataType: dataType<br />
});</p>
<p>$.post( &quot;example.php&quot;, { name: &quot;John&quot;, time: &quot;2pm&quot; } , function() { alert( &quot;success&quot; ); })</p>
<pre>
<a href="http://www.careerride.com/AJAX-Interview-Questions.aspx">
http://www.careerride.com/AJAX-Interview-Questions.aspx</a>

-----------

</pre>
<p><a href="http://www.careerride.com/Online-practice-test.aspx">http://www.careerride.com/Online-practice-test.aspx</a></p>
<p><a href="http://stackoverflow.com/questions/2118755/questions-every-good-php-developer-should-be-able-to-answer">http://stackoverflow.com/questions/2118755/questions-every-good-php-developer-should-be-able-to-answer</a></p>

--------------------

boostrap - difference between jquery & boostrap

--------------------

http & https 

--------------------

print - echo 

echo - can output one or more strings
print - can only output one string, and returns always 1

--------------------

magic function of oops

__sleep(), __walk(), __invoke(), __toString()

--------------------

DB Tool 
	DeZing
	Db designer
	Datamanic
	Toad

--------------------