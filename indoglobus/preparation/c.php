Q1:   What is the difference between == and ===?     	

Q2:   How can you pass a variable by reference?     	

Q3:   What does $GLOBALS mean?     	

Q4:   What is the purpose of php.ini file?     	

error_reporting
display_errors
short_open_tag
max_execution_time 
session.gc_maxlifetime
register_argc_argv
url_rewriter.tags

Q5:   What is the return type of a function that doesn't return anything?     	
		Null
Q6:   What is the use of ini_set()?     	
		Set the ini setting in php
Q7:   What are the keys & values in an indexed array?     	
		$a = array('key'=>'value')
		
Q8:   Can you extend a Final defined class?     	
		NO
		
Q9:   When should I use require vs. include?     	


Q10:   Explain usage of enumerations in PHP     	

Q11:   What is stdClass in PHP?

Q12:   PHP array delete by value (not key)     	
		$arr = array('1'=>'a','2'=>'b','3'=>'c');
		unset($arr[array_search('b',$arr)]);

Q13:   What is the difference between single-quoted and double-quoted strings in PHP?     	
		$s = "dollars";
		echo 'This costs a lot of $s.'; // This costs a lot of $s.
		echo "This costs a lot of $s."; // This costs a lot of dollars.


Q14:   What are the differences between die() and exit() functions in PHP?     	
		No dirrerenct at all
		
		
Q15:   What are the main differences between const vs define     	
		The fundamental difference between const vs define is that const defines constants at compile time, whereas define defines them at run time.

		const FOO = 'BAR';
		define('FOO', 'BAR');

		// but
		if (...) {
			const FOO = 'BAR';    // Invalid
		}
		if (...) {
			define('FOO', 'BAR'); // Valid
}


Q16:   What does the 'var' keyword mean in PHP?     	

		It's for declaring class member variables in PHP4, and is no longer needed. It will work in PHP5, but will raise an E_STRICT warning in PHP from version 5.0.0 up to version 5.1.2, as of when it was deprecated. Since PHP 5.3, var has been un-deprecated and is a synonym for 'public'.

		Consider:

		class foo {
			var $x = 'y'; // or you can use public like...
			public $x = 'y'; //this is also a class member variables.
			function bar() {
			}
		}

Q17:   What's the difference between isset() and array_key_exists()?     	
		$a = array('key1' => 'Foo Bar', 'key2' => null);

		isset($a['key1']);             // true
		array_key_exists('key1', $a);  // true

		isset($a['key2']);             // false
		array_key_exists('key2', $a);  // true
		
		
Q18:   What is the difference between var_dump() and print_r()?     	

		$obj = (object) array('qualitypoint', 'technologies', 'India');
		var_dump($obj)will display below output in the screen:

		object(stdClass)#1 (3) {
		 [0]=> string(12) "qualitypoint"
		 [1]=> string(12) "technologies"
		 [2]=> string(5) "India"
		}
		And, print_r($obj) will display below output in the screen.

		stdClass Object ( 
		 [0] => qualitypoint
		 [1] => technologies
		 [2] => India
		)
		
Q19:   Is there a difference between isset and !empty?   	
		empty is more or less shorthand for!isset($foo) || !$foo, and !empty is analogous to isset($foo) && $foo. empty is the same as !$foo, but doesn't throw warnings if the variable doesn't exist. That's the main point of this function: do a boolean comparison without worrying about the variable being set.
		
Q20:   Explain what the different PHP errors are     	
		
		A notice is a non-critical error saying something went wrong in execution, something minor like an undefined variable.
		A warning is given when a more critical error like if an include() command went to retrieve a non-existent file. In both this and the error above, the script would continue.
		A fatal error would terminate the code. Failure to satisfy a require() would generate this type of error, for example.
		
		
Q21:   How can you enable error reporting in PHP?     	
		ini_set('display_errors', 1)
		error_reporting(E_ALL);
		error_reporting(E_ALL & ~E_NOTICE & ~E_WARRNINGS)
		
		
Q22:   Give me some real life examples when you had to use __destruct in your classes     	
		
		Closing custom database connector/wrapper connection
		Deletion of temporary folders
		Cleaning up caching
		Spooling the queue of logging messages to db/file

Q23:   Declare some function with default parameter     	

Q24:   What are PSRs? Choose 1 and briefly describe it.     	
		php standard recommendation
		
Q25:   Is multiple inheritance supported in PHP?     	
		using magic method __call and traits 
		
		
Q26:   How is it possible to set an infinite execution time for PHP script?     	
		set_time_limit(0);
		
		
Q27:   In PHP, objects are they passed by value or by reference?     	
		value
		
Q28:   What is the differences between $a != $b and $a !== $b?     	
			equat & identical
			
Q29:   What is PDO in PHP?     	
			PDO stands for PHP Data Object.
			$dsn = "mysql:host=localhost;dbname=test";
			$user = "root";
			$passwd = "";
			
			$pdo = new PDO($dsn, $user, $passwd);
			$stm = $pdo->query("SELECT VERSION()");
			$version = $stm->fetch();
			echo $version[0] . PHP_EOL;
			
Q30:   Explain how we handle exceptions in PHP?     	

Q31:   What do we mean by keys and values?     	

Q32:   What are the different scopes of variables?     	

Q33:   Differentiate between echo and print()     	
		echo multiple argument and return nothing and fast
		
		
Q34:   What is the difference between using self and $this?     	
			
			self is for use in static member functions to allow you to access static member variables. $this is used in non-static member functions, and is a reference to the instance of the class on which the member function was called.

Q35:   When should I use require_once vs. require?     	

Q36:   Let's create Enumerations for PHP. Prove some  examples.


Q37:   Check if PHP array is associative     	

			$a = [5,10];

			$b = array_values($a);

			if($a===$b)
			{
				echo "is_seq";
			}

Q38:   How do I pass variables and data from PHP to JavaScript?     	

		<?php
		$b = 100;
		?>
		<script>
		var x = '<?=$b?>'
		alert(x);
		</script>
		
Q39:   Is there a function to make a copy of a PHP array to another?  

		array_merge();
		

Q40:   What will be returned by this ?     	

Q41:   Is there any reason to use strcmp() for strings comparison?     	

		0 - if the two strings are equal
		<0 - if string1 is less than string2
		>0 - if string1 is greater than string2

Q42:   What will be returned by this ? Explain the result.     	

Q43:   Explain the difference between shell_exec() and exec()     	
		echo exec('dir');  // return only basic info. if given second arg, return all info as shell_exec() in second argument variable
		echo shell_exec('dir');  // return only 
		
Q44:   What exactly is the the difference between array_map, array_walk and array_filter?     	

			<?php

				$origarray1 = array(2.4, 2.6, 3.5);
				$origarray2 = array(2.4, 2.6, 3.7);


				$map_out = (array_map('floor', $origarray1)); // $origarray1 stays the same

				print_r($map_out); echo "<br>";
				print_r($origarray1); echo "<br>";

				// array_map accepts several arrays and key can not be accessed

				$map_out = (
					array_map(function ($a, $b) { return $a*$b*100; }, $origarray1, $origarray2)
				);

				print_r($map_out); echo "<br>";
				print_r($origarray1); echo "<br>";
				print_r($origarray2); echo "<br>";

				echo "<br>";echo "<br>";echo "<br>";echo "<br>";  

				// changes $origarray2
				$walk_out = array_walk($origarray1, function (&$v, $k) { $v = floor($v); }); 

				print_r($walk_out); echo "<br>";
				print_r($origarray1); echo "<br>";


				echo "<br>";echo "<br>";echo "<br>";echo "<br>"; 

				$origarray1 = array(2.4, 2.6, 3.5);
				// select only elements that are > 2.5
				print_r(
					array_filter($origarray1, function ($a,$k) { return $k; }, ARRAY_FILTER_USE_BOTH    )
				);

				?>

Q45:   Explain the difference between exec() vs system() vs passthru()?     	
			echo exec('dir');  // return only basic info. if given second arg, return all info as shell_exec() in second argument variable
			echo system('dir');  // return only 
			
Q46:   How would you create a Singleton class using PHP? 

		Defining a private 
		class myClass  
		{
			private static $instance;
		 
			private function __construct() {  }
		 
			public static function get_instance() {
		 
				if (!self::$instance)
					self::$instance = new myClass();
		 
				return self::$instance;
			}
		}

Q47:   What does the following  output?     	

Q48:   What is the difference between MySQL, MySQLi and PDO?     	
			only PDO exists in 7 , rest are depricated
			
Q49:   What is the difference between PDO's query() vs execute()?     	
			
			query runs a standard SQL statement and requires you to properly escape all data to avoid SQL Injections and other issues.

			execute runs a prepared statement which allows you to bind parameters to avoid the need to escape or quote the parameters. 
			execute will also perform better if you are repeating a query multiple times. Example of prepared statements:

			$sth = $db->query("SELECT name, colour, calories FROM fruit
				WHERE calories < 100 AND colour = 'red'");
			$result = $sth->fetchAll();
			
			---

			$sth = $dbh->prepare('SELECT name, colour, calories FROM fruit
				WHERE calories < :calories AND colour = :colour');
			$sth->bindParam(':calories', $calories);
			$sth->bindParam(':colour', $colour);
			$sth->execute();
			$result = $sth->fetchAll();
			
Q50:   Are Parent constructors called implicitly/automatic inside a class constructor?     	
			Yes if child has no constuct() function else not
			
Q51:   What are some of the big changes PHP has gone through in the past few years?     	

Q52:   What is use of Null Coalesce Operator?     	
			$name = $_GET['name'] ?? $_SESSION['name'] ?? 'nobody';   // which finds first assign that;
			
Q53:   What is autoloading classes in PHP?     	

			Depricated
			
Q54:   Differentiate between exception and error     	

Q55:   What are the exception class functions?     	

Q56:   Does PHP support method overloading?     	
			no,  but using __call() and traits
			
Q57:   Differentiate between parameterised and non parameterised functions     	
			
Q58:   Explain function call by reference     	

Q59:   Maximum how many arguments are allowed in a function in PHP?     	
			not fix but 5 is a good number and beyond that need to think about refactor
			
Q60:   Why do we use extract()?     	

Q61:   What is the difference between a PHP interpreter and a PHP handler?     	
			A PHP Handler is an Apache module that is used by Apache to communicate with the PHP Interpreter. It is basically used by Apache to handle requests for PHP files. There are different types of PHP Handlers. For example mod_php is an Apache module for PHP. mod_fcgid allows communication with the php_fpm interpreter over a TCP or Unix socket.
			The PHP Interpreter is an application that executes PHP code one line at a time. The output of the PHP Interpreter is sent to the PHP Handler. This output may be processed by other Apache modules such as mod_deflate or mod_security. The final output is sent out of the TCP socket that Apache listens on.

Q62:   Store an array as JSON or as a PHP serialized array?     	
			echo json_encode($arr);
			echo serialize($arr);

Q63:   explain what is a closure in PHP and why does it use the 'use' identifier?

			public function getTotal($tax)
			{
				$total = 0.00;

				$callback =
					/* This line here: */
					function ($quantity, $product) use ($tax, &$total)
					{
						$pricePerItem = constant(__CLASS__ . "::PRICE_" .
							strtoupper($product));
						$total += ($pricePerItem * $quantity) * ($tax + 1.0);
					};

				array_walk($this->products, $callback);
				return round($total, 2);
			}

			The closure is a function assigned to a variable, so you can pass it around
			A closure is a separate namespace, normally, you can not access variables defined outside of this namespace. There comes the use keyword:
			use allows you to access (use) the succeeding variables inside the closure.
			use is early binding. That means the variable values are COPIED upon DEFINING the closure. So modifying $tax inside the closure has no external effect, unless it is a pointer, like an object is.
			You can pass in variables as pointers like in case of &$total. This way, modifying the value of $total DOES HAVE an external effect, the original variable's value changes.
			Variables defined inside the closure are not accessible from outside the closure either.
			Closures and functions have the same speed. Yes, you can use them all over your scripts.

Q64:   What exactly are late static bindings in PHP?     	

		<?php
			class Alpha 
			{
				const MY_CONST = false;

				public function selfConst() 
				{
					return self::MY_CONST;
				} 

				public function staticConst() 
				{
					return static::MY_CONST;
				} 
			}

			class Beta extends Alpha 
			{
			   const MY_CONST = true;
			}

			$beta = new Beta();
			echo $beta->selfConst() ? 'yes' : 'no'; // prints "no"
			echo $beta->staticConst() ? 'yes' : 'no'; // prints "yes"
			?>
			
Q65:   What is the crucial difference between using traits versus interfaces?

			An interface defines a set of methods that the implementing class must implement.

			When a trait is use'd the implementations of the methods come along too--which doesn't happen in an Interface.

			That is the biggest difference.

Q66:   How to turn errors into exceptions in PHP?

Q67:   How to measure execution times of PHP scripts?   

			echo microtime() at starting and bottom

Q68:   What's better at freeing memory with PHP: unset() or $var = null?     	
			
			$whatever = null resets the buffer and the L1 cache whereas unset clears the buffer and resets the L2 cache
			
Q69:   What is the best method to merge two PHP objects?

			$q = (object)array_merge((array)$a,(array) $y);

Q70:   What does yield mean in PHP?     	
			
			<?php
			function gen_one_to_three() {
				for ($i = 1; $i <= 3; $i++) {
					// Note that $i is preserved between yields.
					yield $i;
				}
			}

			$generator = gen_one_to_three();

			//print_r($generator); --> this will return a Generator Object

			foreach ($generator as $value) {
				echo "$value\n";
			}
			?>

Q71:   Compare mysqli or PDO - what are the pros and cons?     	
			mysqli is depricated bro, just concentrate in PDO.
			
Q72:   What are the disadvantages of using persistent connection in PDO?     	

			Persistent connections are a good idea only when it takes a (relatively) long time to connect to your database. Nowadays that's almost never the case. The biggest drawback to persistent connections is that it limits the number of users you can have browsing your site: if MySQL is configured to only allow 10 concurrent connections at once then when an 11th person tries to browse your site it won't work for them.
			
Q73:   What does $$ mean?     	

		Input :  $Hello = "Geeks for Geeks"
			 $var = "Hello"
			 echo $var
			 echo $$var
		Output : Hello
				 Geeks for Geeks

		Input :  $GFG = "Welcome to GeeksforGeeks"
				 $var = "GFG"
				 echo $var
				 echo $$var
		Output : GFG
				 Welcome to GeeksforGeeks
				 
Q74:   What is use of Spaceship Operator?     	

			This <=> operator offers combined comparison :

			Return 0 if values on either side are equal
			Return 1 if value on the left is greater
			Return -1 if the value on the right is greater

Q75:   Explain the 
			Throwable
				Error
					ArithmeticError
						DivisionByZeroError
					AssertionError
					ParseError
					TypeError
				Exception
					ClosedGeneratorException
					DOMException
					ErrorException
					IntlException
					LogicException
						BadFunctionCallException
							BadMethodCallException
						DomainException
						InvalidArgumentException
						LengthException
						OutOfRangeException
					PharException
					ReflectionException
					RuntimeException
						mysqli_sql_exception
						OutOfBoundsException
						OverflowException
						PDOException
						RangeException
						UnderflowException
						UnexpectedValueException
						
						
Q76:   Does PHP have threading?     	
		Install php thread dll  (https://windows.php.net/downloads/pecl/releases/pthreads/) 
		put *VC*.dll in bin/php  and  php_pthread.dll in bin/php/ext/
			
		<?php
		class AsyncOperation extends Thread {

			public function __construct($arg) {
				$this->arg = $arg;
			}

			public function run() {
				if ($this->arg) {
					$sleep = mt_rand(1, 10);
					printf('%s: %s  -start -sleeps %d' . "\n", date("g:i:sa"), $this->arg, $sleep);
					sleep($sleep);
					printf('%s: %s  -finish' . "\n", date("g:i:sa"), $this->arg);
				}
			}
		}

		// Create a array
		$stack = array();

		//Initiate Multiple Thread
		foreach ( range("A", "D") as $i ) {
			$stack[] = new AsyncOperation($i);
		}

		// Start The Threads
		foreach ( $stack as $t ) {
			$t->start();
		}

		?>
		
		
Q77:   Is PHP single or multi threaded?     	
		Multithreading
		
Q79:   Provide some ways to mimic multiple constructors in PHP     	
			1. Use func_get_args() and func_num_args()

			class Example {
				function __construct() {
					$argv = func_get_args();
					switch( func_num_args() ) {
						case 1:
							self::__construct1($argv[0]);
							break;
						case 2:
							self::__construct2( $argv[0], $argv[1] );
							break;
						case 3:
							self::__construct2( $argv[0], $argv[1], $argv[2] );
					 }
				}

				function __construct1($arg1) {
				...
				}

				function __construct2($arg1, $arg2) {
				...
				}

				function __construct3($arg1, $arg2, $arg3) {
				...
				}
			}

			$a = new Example("Argument 1");
			$b = new Example("Argument 1", "Argument 2");
			$b = new Example("Argument 1", "Argument 2", "Argument 3");
			2. Use "static" Factory Pattern.

			The factory pattern allows for the instantiation of objects at runtime, which may be used to mimic creation of each object with different factory methods. Instead of creating multiple constructors, you can define one factory method for each constructor.

			class Example {

				public static function factory1($arg1) {
				}

				public static function factory2($arg1, $arg2) {
				}
			}

			$a = new Example::factory1("Argument 1");
			$b = new Example::factory2("Argument 1", "Argument 2");
			
Q80:   Are PDO prepared statements sufficient to prevent SQL injection?
			No need to use a better mysql charset
			
Q81:	Why wamp has 2 php.ini files.

		The one from Apache folder is used for the web and the one from the PHP folder is used for the CLI.
		phpinfo() will tell you what ini file(s) it's loading and where it's looking for more 
		
Q82:   How could we implement method overloading in PHP?
			__call  and  by Traits
		
Q83:   HTACCES Rules?

		Forcing https with SSL

			RewriteCond %{HTTPS} !=on
			RewriteRule (.*) https://%{HTTP_HOST}%{REQUEST_URI}
		
		Creating a Vanity URL

			RewriteRule ^promo123 /full-path/to-desired/page.html [R=301,L]

		Whitelist IP Addresses

			Order Deny,Allow
			 Deny from all
			 Allow from 111.22.3.4
			 Allow from 111.22.3.5

		Blacklist IP Addresses

			Order allow,Deny
			 Deny from 111.22.3.4
			 Deny from 111.22.3.
			Allow from all

		301 Redirect all Non-primary URLs to Primary URL (non-https)

			RewriteCond %{HTTP_HOST} !^primarydomain.com [NC]
			RewriteCond %{REQUEST_URI} !administrator
			RewriteCond %{HTTP_HOST} !^casite-#####.cloudaccess.net [NC]
			RewriteRule (.*) http://primarydomain.com/$1 [R=301,L]
			301 Redirect all Non-primary URLs to Primary URL (https)
			RewriteCond %{HTTP_HOST} !^domain\.com [NC]
			RewriteRule (.*) https://domain.com/$1 [R=301,L]