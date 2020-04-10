<pre>

<h2>
Write a function that will output the numbers from 1 through 100.  While printing the numbers, apply the following logic:
1. if the number is evenly divisible by 3, print the number and the word three
2. if the number is evenly divisible by 5, print the number and the word five
3. if the number is evenly divisible by both 3 and 5, do not print the number, 
do not print the word "three" or "five" - only print the word dog
</h2>
<br /><br /><br />

foreach(range(1,100) as $number){
    if(($number % 15 == 0) )
        echo "dog";
    elseif($number % 3 == 0)
        echo $number." "."three";
    elseif($number % 5 == 0)
        echo $number." "."five";
	else
		echo $number;
    
	echo "<br>";
}

</pre>

<br /><br /><hr><br /><br />

<pre>

<h2>
Assume we have three tables, tbl_employee and tbl_department, and tbl_employee_department.

tbl_employee
-------------------------------
tbl_employee_id int primary key
first_name varchar(25)
last_name varchar(25)

This table has 3 rows
1  Bob  Smith
2  Jane Smith
3  Yuri Smith


tbl_department
---------------------------------
tbl_department_id int primary key
department_name varchar(50)

This table has 1 row
100  Technology


tbl_employee_department
---------------------------------
tbl_employee_department int primary key
tbl_employee_id int references tbl_employee(tbl_employee_id)
tbl_department_id int references tbl_department(tbl_department_id)

This table has 2 rows
1000  1  100
1001  2  100


There are two parts to this question:
1. Using a left join, write a SQL query that will output the names of the employees who do not have any departments.  
2. Please specify what the output data from your query will be.
</h2>
<br /><br /><br />

SELECT CONCAT(e.first_name, ' ' , e.last_name) FROM `tbl_employee` e 
LEFT JOIN tbl_employee_department d ON e.`tbl_employee_id` = d.`tbl_employee_id` WHERE d.`tbl_department_id` IS NULL

</pre>

<br /><br /><hr><br /><br />

<pre>

<h2>
Using jQuery, write a statement to find a div with the id of "dog", and hide it.
</h2>
<br /><br /><br />

$(document).ready(function(){
	$('div#dog').hide();	
})

</pre>
<br /><br /><hr><br /><br />


<pre>
<h2>
Create a class diagram to implement a tic-tac-toe game.
We are looking for a list of the classes, their methods, 
and the inputs and outputs, along with a brief description of what each method does.  
We do not need the implementation.
</h2>
<br /><br /><br />

class tictactoe extends game
{
	var $player = "X";			//whose turn is
	var $board = array();		//the tic tac toe board
	var $totalMoves = 0;		//how many moves have been made so far		

	/**
	* Purpose: default constructor
	* Preconditions: none
	* Postconditions: parent object started
	**/
	function tictactoe()
	{
		/**
		* instantiate the parent game class so this class
		* inherits all of the game class's attributes 
		* and methods
		**/
		game::start();
        $this->newBoard();
	}
	
	/**
	* Purpose: start a new tic tac toe game
	* Preconditions: none
	* Postconditions: game is ready to be displayed
	**/
	function newGame()
	{
		//setup the game
		$this->start();
		
		//reset the player
		$this->player = "X";
		$this->totalMoves = 0;
        $this->newBoard();
	}
    
    /**
	* Purpose: create an empty board
	* Preconditions: none
	* Postconditions: empty board created
	**/
    function newBoard() {
    
        //clear out the board
		$this->board = array();
        
        //create the board
        for ($x = 0; $x <= 2; $x++)
        {
            for ($y = 0; $y <= 2; $y++)
            {
                $this->board[$x][$y] = null;
            }
        }
    }
	
	/**
	* Purpose: run the game until it's tied or someone has won
	* Preconditions: all $_POST content
	* Postconditions: game is in play
	**/
	function playGame($gamedata)
	{
		if (!$this->isOver() && isset($gamedata['move'])) {
			$this->move($gamedata);
        }
			
		//player pressed the button to start a new game
		if (isset($gamedata['newgame'])) {
			$this->newGame();
        }
				
		//display the game
		$this->displayGame();
	}
	
	/**
	* Purpose: display the game interface
	* Preconditions: none
	* Postconditions: start a game or keep playing the current game
	**/
	function displayGame()
	{
		
		//while the game isn't over
		if (!$this->isOver())
		{
			echo "<div id=\"board\">";
			
			for ($x = 0; $x < 3; $x++)
			{
				for ($y = 0; $y < 3; $y++)
				{
					echo "<div class=\"board_cell\">";
					
					//check to see if that position is already filled
					if ($this->board[$x][$y])
						echo "<img src=\"images/{$this->board[$x][$y]}.jpg\" alt=\"{$this->board[$x][$y]}\" title=\"{$this->board[$x][$y]}\" />";
					else
					{
						//let them choose to put an x or o there
						echo "<select name=\"{$x}_{$y}\">
								<option value=\"\"></option>
								<option value=\"{$this->player}\">{$this->player}</option>
							</select>";
					}
					
					echo "</div>";
				}
				
				echo "<div class=\"break\"></div>";
			}
			
			echo "
				<p align=\"center\">
					<input type=\"submit\" name=\"move\" value=\"Take Turn\" /><br/>
					<b>It's player {$this->player}'s turn.</b></p>
			</div>";
		}
		else
		{
			
			//someone won the game or there was a tie
			if ($this->isOver() != "Tie")
				echo successMsg("Congratulations player " . $this->isOver() . ", you've won the game!");
			else if ($this->isOver() == "Tie")
				echo errorMsg("Whoops! Looks like you've had a tie game. Want to try again?");
				
			session_destroy(); 
				
			echo "<p align=\"center\"><input type=\"submit\" name=\"newgame\" value=\"New Game\" /></p>";
		}
	}
	
	/**
	* Purpose: trying to place an X or O on the board
	* Preconditions: the position they want to make their move
	* Postconditions: the game data is updated
	**/
	function move($gamedata)
	{			

		if ($this->isOver())
			return;

		//remove duplicate entries on the board	
		$gamedata = array_unique($gamedata);
		
		foreach ($gamedata as $key => $value)
		{
			if ($value == $this->player)
			{	
				//update the board in that position with the player's X or O 
				$coords = explode("_", $key);
				$this->board[$coords[0]][$coords[1]] = $this->player;

				//change the turn to the next player
				if ($this->player == "X")
					$this->player = "O";
				else
					$this->player = "X";
					
				$this->totalMoves++;
			}
		}
	
		if ($this->isOver())
			return;
	}
	
	/**
	* Purpose: check for a winner
	* Preconditions: none
	* Postconditions: return the winner if found
	**/
	function isOver()
	{
		
		//top row
		if ($this->board[0][0] && $this->board[0][0] == $this->board[0][1] && $this->board[0][1] == $this->board[0][2])
			return $this->board[0][0];
			
		//middle row
		if ($this->board[1][0] && $this->board[1][0] == $this->board[1][1] && $this->board[1][1] == $this->board[1][2])
			return $this->board[1][0];
			
		//bottom row
		if ($this->board[2][0] && $this->board[2][0] == $this->board[2][1] && $this->board[2][1] == $this->board[2][2])
			return $this->board[2][0];
			
		//first column
		if ($this->board[0][0] && $this->board[0][0] == $this->board[1][0] && $this->board[1][0] == $this->board[2][0])
			return $this->board[0][0];
			
		//second column
		if ($this->board[0][1] && $this->board[0][1] == $this->board[1][1] && $this->board[1][1] == $this->board[2][1])
			return $this->board[0][1];
			
		//third column
		if ($this->board[0][2] && $this->board[0][2] == $this->board[1][2] && $this->board[1][2] == $this->board[2][2])
			return $this->board[0][2];
			
		//diagonal 1
		if ($this->board[0][0] && $this->board[0][0] == $this->board[1][1] && $this->board[1][1] == $this->board[2][2])
			return $this->board[0][0];
			
		//diagonal 2
		if ($this->board[0][2] && $this->board[0][2] == $this->board[1][1] && $this->board[1][1] == $this->board[2][0])
			return $this->board[0][2];
			
		if ($this->totalMoves >= 9)
			return "Tie";
	}
}
</pre>

<br /><br /><hr><br /><br />

<pre>
<h2>
- Pick a number
- Add the next highest number to it
- Add 9
- Divide by 2
- Subtract the original number you chose in step 1

1. Write the formula.
2. What is the answer?
3. Explain why the answer is always 5.
</h2>
<br /><br /><br />

function formula(){
	$pick_a_number = rand(1,100);
    $next = $pick_a_number +1;
    $answer = ($pick_a_number + $next + 9 ) / 2 - $pick_a_number;
    return $answer;
}

echo formula();


</pre>



Answer will be 5 always because if we simplify this as following,
Initially we are doing (2X+1)
then adding 9 means
(2X+1+9) 
this means 
(2X+10)
if we divide the above value by 2 then it will be
(X+5)
now subtracting X from this so only 5 will remain.
<br /><br /><hr><br /><br />

