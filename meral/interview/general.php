

- XAMPP SETUP
- 

<pre>
<h1>MYSQL</h1>Latest mysql 6.0
-----------------------
https://www.bestinterviewquestion.com/mysql-interview-questions


MySQL v/s MariaDB

Both are different 
Mysql was took over by Sun Microsystem
Mysql Core developer developed MariaDB having almost same functionality 
XAMPP replaced mysql with maria dba_close

-----------------------

How do you login in mysql using command line


mysql -u root -p  [Enter]

show databases;

use wordpress1;

SHOW VARIABLES; // show all configuration settings 


default mysql connection 

show variables like "max_connections";

set global max_connections = 200;

------------------------

DATABASE ENGINE IN MYSQL

 MyISAM – MyISAM is the default storage engine for MySQL. It extends the former ISAM storage engine. MyISAM offers big storage, up to 256TB! The tables can also be compressed to get extra storage. MyISAM tables are not transaction-safe. 

· MERGE – A MERGE table is a virtual table that consolidates different MyISAM tables that have a comparable structure to one table. MERGE tables use the indexes of the base tables, as they do not have indexes of their own.

· ARCHIVE – As the name suggests, Archive helps in archiving the tables by compressing them, in-turn reducing the storage space. Hence, you can store a lot of records with the Archive. It uses the compression-decompression procedure while writing and reading the table records. It is done using the Zlib library.

· CSV – This is more like a storage format. CSV engine stores the values in the Comma-separated values (CSV) format. This engine makes it easier to migrate the tables into a non-SQL pipeline.

· InnoDB – InnoDB is the most optimal while choosing an engine to drive performance. InnoDB is a transaction-safe engine. Hence it is ACID-compliant and can efficiently restore your database to the most stable state in case of a crash.

· Memory– Memory tables were formerly known as HEAP. With memory tables, there can be a performance boost as the tables are stored in the memory. But it does not work with large data tables due to the same reason.

· Federated – Federated tables allow accessing remote MySQL server tables. It can be done without any third-party integration or cluster technology.

----------------------

Difference between MyISAM and InnoDB are given below:-
MyISAM does no longer support transactions, however InnoDB supports transactions.
MyISAM helps Table-level Locking, however InnoDB supports Row-level Locking.
MyISAM helps full-text search, however InnoDB does not.
MyISAM designed for the need for speed but InnoDB designed for most performance.
MyISAM does now not aid overseas keys, but InnoDB helps foreign keys.
We can use commit and rollback with InnoDB however not in MyISAM.
MyISAM does no longer assist ACID (Atomicity, Consistency, Isolation, and Durability) however InnoDB supports the ACID property.
In the InnoDB table, the AUTO_INCREMENT field is a section of the index but now not in MyISAM.
MyISAM stores its tables, data, and indexes in disk area the usage of a separate table name.FRM, desk name.MYD and table name.MYI however InnoDB stores its tables and indexes in a tablespace.

----------------------

Default port 3306


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


7. How does database import/export work in MySQL?

export
· mysqldump -u username -p databasename > dbsample.sql

import 

· mysql -u username -p databasename < dbsample.sql



trigger

CREATE TRIGGER data_backup BEFORE UPDATE ON users

   FOR EACH ROW

   BEGIN

     IF NEW.amount < 0 THEN

        SET NEW.amount = 0;

     ELSEIF NEW.amount > 100 THEN

       SET NEW.amount = 100;

     END IF;

   END;// 

store procedure


view


foreign key constrain - 
 RESTRICT | CASCADE | SET NULL | NO ACTION | SET DEFAULT
 
 eg on CREATE TABLE parent (
    id INT NOT NULL,
    PRIMARY KEY (id)
) ENGINE=INNODB;

CREATE TABLE child (
    id INT,
    parent_id INT,
    INDEX par_ind (parent_id),
    FOREIGN KEY (parent_id)
        REFERENCES parent(id)
        ON DELETE RESTRICT
		ON UPDATE CASCADE
) ENGINE=INNODB;

Cascaded foreign key actions do not activate triggers.


commit , rollback & save point


Q. What is the Transactions in database ? 

Single unit of an entire process -> Atomic, Consistent, Isolated, Durable 

https://www.youtube.com/watch?v=5Pia4UFuMKo


Q Write a query to fetch duplicate records from a table using MySQL?
SELECT EmpId, Project, Salary, COUNT(*) FROM EmployeeSalary GROUP BY EmpId, Project, Salary HAVING COUNT(*) > 1


Q . How to create case insensitive query in MySQL?
The standard way to perform case insensitive queries in SQL is to use the SQL upper or lower functions like the following:

select * from users where upper(first_name) = 'AJAY';

OR

select * from users where lower(first_name) = 'ajay';


Q How to get Nth highest salary from table in a MySQL?

SELECT * FROM EmployeeTable1 AS Emp1 WHERE (1) = ( SELECT COUNT(DISTINCT(Emp2.amount)) FROM EmployeeTable2 AS Emp2 WHERE Emp2.amount > Emp1.amount)


Q. What are the difference between NOW and CURRENT_DATE in MySQL?

NOW() give you the current date time in the format 'YYYY-MM_DD HH:MM: SS'	
CURRENT_DATE() will only give you the current date in format "YYYY-MM_DD"

Q. mysql_pconnect() -- use of that and when not to use that


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

The function parse_ini_file() enables us to load in the ini file specified in filename and returns the settings in it in an associative array.

display error
short tags
max upload file size
magic quotes
---------------------

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
value pass by reference 

function doSomething( &amp;$arg )  {     $arg = 5;      }    <br />$a = 3;  <br />doSomething( $a );<br />echo $a;


now remove the argument

function doSomething(  )  {     $a = 5;      }   $a = 3;   doSomething();  echo $a;

----------------------------

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


</pre>
<p>$a = 012;<br />
  echo $a / 4;</p>
<p>// answer 2.5</p>
<p>When a number is preceded by a 0 in PHP, the number is treated as an octal number (base-8). Therefore the octal number 012 is equal to the decimal number 10.<br />
</p>



Oops Concept

recursive function
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
OAuth
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



GARBAGE COLLECTION

Memory cleanup for long-running scripts.

<?php
gc_enable(); // Enable Garbage Collector
var_dump(gc_enabled()); // true
var_dump(gc_collect_cycles()); // # of elements cleaned up
gc_disable(); // Disable Garbage Collector
?>


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
jQuery.noConflict()

dataTable 
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

php inheritance 

3 user session

access modifiers

scope of variable



mysql_pconnect < ---  when not to use


data_seek

1, 1,2   1,2,3    1,2,3,4


echo ctype_alnum("foo!#*bar");


Is it possible to remove the HTML tags from data?
The strip_tags() function enables us to clean a string from the HTML tags.





 47) 
 
if("12" == 12)  // true
	echo 1;


	
	
48) 	
$x = 12;
echo $X;

function ABC(){ echo 1; }
abc();


49)

How do you execute a PHP script from the command line?

php myfile.php daily
$type = $argv[1];

OR
php abc.php --name=xyz

$val = getopt(null, ["name:"]);
print_r($val); // output: ['name' => 'xyz'];


What is the difference between null and empty?

$a = "" ;   // this is empty and hold a memorey
$b = NULL;  // this is null not holding any memory


Is it possible to remove the HTML tags from data?
strip_tags();


What is the most convenient hashing method to be used to hash passwords?

It is preferable to use crypt() which natively supports several hashing algorithms or the function hash() which supports more variants than crypt() rather than using the common hashing algorithms such as md5, sha1 or sha256 because they are conceived to be fast. Hence, hashing passwords with these algorithms can create vulnerability.


 [OOP] Are Parent constructors called implicitly inside a class constructor?


 
 
 46) what is the static variable in function useful for?

 <?php
function testFunction() { static $testVariable = 1; echo $testVariable; $testVariable++; } 
 testFunction();      // print 1 
 testFunction();       // print 2
 testFunction();        // print 2
 ?>
 
50) persistent cookie
 <?php setcookie( "cookieName2", $value2, strtotime( '+30 days' ) ); ?>
 
 Cookies with an expiration date are called persistent.
 can you check in your browser
 
 
 
51) Something about $_FILE



83) How can we determine whether a PHP variable is an instantiated object of a certain class?

<?php
/*
 * 
 * opcode number: 138
 */
  class A{
	 
 }
 class B{
	 
 }
$obj = new B();

if ($obj instanceof A) {
   echo 'A';
}
?>


99) deal with an array as a property of object.

<?php 
{$obj->$properties}['name']

$a = array('a'=> 'apple', 'b' => 'ball');

$a['c'] = new StdClass();

$a['c']->prop = "hello";

$obj1 = new stdClass();

$obj1->prop = $a;

echo $obj1->prop['c']->prop;

?>

100)


<?php
switch ($expr) {
	case 'a' :  
		echo 123;  // this will exexute 
	break;
	
	case 'a' :  
		echo 456;
	break;
	
    default:
         echo "Goodbye Moon!";
         break;
		 
	 //default:		// duplicate default case will give you error
	 //echo "Goodbye Moon!";
	 //break;
}

?>

101) Scalar Type Hints  

<?php
declare(strict_types=1);

function sendHttpStatus(int $statusCode, string $message) {
     header('HTTP/1.0 ' .$statusCode. ' ' .$message);
}

sendHttpStatus("403", "OK"); // string "403" coerced to int(403)

?>

102) Return type 

<?php

echo isValidStatusCode();

//declare(strict_types=1);

function isValidStatusCode(): bool {    return 1;  }  // on function call will print 1 and throw error in case of strict type
function isValidStatusCode(): bool {    return true;  }  // on function call will print 1 and good for strict type
function isValidStatusCode(): bool {    return 100;  }  // on function call will print 1

?>

103) Combined Comparison Operator,

<?php

echo order_func(3,2);

function order_func($a, $b) {
    return $a <=> $b;
}

// <=> simply called 'is bigger than'
?>
103)  Soap & Rest API

soap is old and heave and xml base
rest is new , light weight and advance and URL base

104) which IDE

what are the good facilities in that ?

105) what is composer


106) what is version control system 
branch & Tag
do you have git hub account 


111) whats new in PHP 7
https://www.youtube.com/watch?v=thGH8jYlQCc
