<html>

<head> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="../style.css">
	<script async src="linecount.js"></script>
	<title>Emerald Nova Games</title>
</head>

<body>


<link rel="stylesheet" type="text/css" href="../style.css">

<H1>
<img src="../img/emeraldnova.png" height="100"></img>
Emerald Nova Games
</H1>

<ul>
	<li><a href="../index.php">Home</a></li>
	<li><a href="../games.php">Games</a></li>
	<li class="dropdown">
		<a href="https://www.twitch.tv/emeraldnovagames" target="_blank" class="dropbtn">Livestream</a>
		<div class="dropdown-content">
		  <a href="https://www.twitch.tv/emeraldnovagames" target="_blank">Twitch</a>
		  <a href="https://www.youtube.com/emeraldnova" target="_blank">Youtube</a>
		</div>
	</li>
	<li class="dropdown">
		<a href="shrec.php">Code</a>
		<div class="dropdown-content">
			<a href="shrec.php">S.H.R.E.C.</a>
			<a href="https://www.jo-engine.org/" target="_blank">Jo Engine</a>
			<a href="https://antime.kapsi.fi/sega/docs.html" target="_blank">Saturn Documentation</a>
		</div>
	</li>
	<li class="dropdown">
		<a href="../community/history.php">Community</a>
		<div class="dropdown-content">
			<a href="../community/history.php">Sega Xtreme/Homebrew History</a>
			<a href="https://segaxtreme.net/" target="_blank">Sega Xtreme</a>
			<a href="https://discord.gg/vAzG5P" target="_blank">Sega Xtreme Discord</a>
		</div>
	</li>
	<li class="dropdown">
		<a href="../contact.php">Contact</a>
		<div class="dropdown-content">
			<a href="../contact.php">Contact Emerald Nova</a>
			<a href="https://twitter.com/EmeraldNovaGame" target="_blank">Twitter</a>
		</div>
	</li>
</ul>







<center><H1>Jo Engine</H1></center>

<link rel="stylesheet" type="text/css" href="../style.css">


<ul>
  <li></li>
  <li><a href="joengine003.php">Previous</a></li>
  <li><a href="joengine000.php">Index</a></li>
  <li><a href="joengine000.php">Next</a></li>
  <li></li>
</ul>


<H2>Math: Integers and Fixed-Point Arithmetic</H2>

<p>
Most programmers will be used to floating point numbers for calculations. However, the Saturn has no floating point unit. It can support floating points in software, but at the cost of performance. It's best to get used to using FIXEDs when integers won't cut it. To understand how FIXEDs work, we should look at the binary structure of them:
</p>

<table style="width:95%">
	<tr>
		<th colspan="16">Integer</th>
		<th colspan="16">Decimal</th>
	</tr>
	<tr>
		<th>32</th>
		<th>31</th>
		<th>30</th>
		<th>29</th>
		<th>28</th>
		<th>27</th>
		<th>26</th>
		<th>25</th>
		<th>24</th>
		<th>23</th>
		<th>22</th>
		<th>21</th>
		<th>20</th>
		<th>19</th>
		<th>18</th>
		<th>17</th>
		<th>16</th>
		<th>15</th>
		<th>14</th>
		<th>13</th>
		<th>12</th>
		<th>11</th>
		<th>10</th>
		<th>9</th>
		<th>8</th>
		<th>7</th>
		<th>6</th>
		<th>5</th>
		<th>4</th>
		<th>3</th>
		<th>2</th>
		<th>1</th>
	</tr>
	<tr>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>1</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>1</th>
	</tr>
</table> 

<p>
In the above example, the FIXED number represented by that binary sequence is 1 + 1/65536. A FIXED number is a 32-bit number composed of two 16-bit numbers separated by an implicit decimal point between the 16<sup>th</sup> and 17<sup>th</sup> bits, (hence, FIXED point number.) The low bits on the right are the decimal or fractionional portion of the FIXED and count up in units of 1/2<sup>16</sup>. Every time you add an integer 1 to a FIXED, you are really adding 1/2<sup>16</sup> to it. By the time you have added 2<sup>16</sup> of these to 0, you will have flipped the 17<sup>th</sup> bit to 1 with all the decimal bits at 0, giving a FIXED value of 1. This makes sense as 2<sup>16</sup> * 1/2<sup>16</sup> = 1. The upper bits on the right are a 16-bit representation of the whole number portion of the FIXED functionally equivalent to a signed 16-bit integer. This number rolls over at 2<sup>15</sup> into negative numbers, however, the decimal portion is always a positive offset.
</p>

<table style="width:95%">
	<tr>
		<th colspan="16">Integer</th>
		<th colspan="16">Decimal</th>
	</tr>
	<tr>
		<th>32</th>
		<th>31</th>
		<th>30</th>
		<th>29</th>
		<th>28</th>
		<th>27</th>
		<th>26</th>
		<th>25</th>
		<th>24</th>
		<th>23</th>
		<th>22</th>
		<th>21</th>
		<th>20</th>
		<th>19</th>
		<th>18</th>
		<th>17</th>
		<th>16</th>
		<th>15</th>
		<th>14</th>
		<th>13</th>
		<th>12</th>
		<th>11</th>
		<th>10</th>
		<th>9</th>
		<th>8</th>
		<th>7</th>
		<th>6</th>
		<th>5</th>
		<th>4</th>
		<th>3</th>
		<th>2</th>
		<th>1</th>
	</tr>
	<tr>
		<th>0</th>
		<th>1</th>
		<th>1</th>
		<th>1</th>
		<th>1</th>
		<th>1</th>
		<th>1</th>
		<th>1</th>
		<th>1</th>
		<th>1</th>
		<th>1</th>
		<th>1</th>
		<th>1</th>
		<th>1</th>
		<th>1</th>
		<th>1</th>
		<th>1</th>
		<th>1</th>
		<th>1</th>
		<th>1</th>
		<th>1</th>
		<th>1</th>
		<th>1</th>
		<th>1</th>
		<th>1</th>
		<th>1</th>
		<th>1</th>
		<th>1</th>
		<th>1</th>
		<th>1</th>
		<th>1</th>
		<th>1</th>
	</tr>
</table> 

<p>
This is the largest FIXED number, equivalent to 2<sup>15</sup> - 1 + 65535/65536, or about 32765.99998 (FIXED are generally expressed with 5 decimal places, as that's about all the precision they are useful for.) If we add integer 1 to this we get.
</p>

<table style="width:95%">
	<tr>
		<th colspan="16">Integer</th>
		<th colspan="16">Decimal</th>
	</tr>
	<tr>
		<th>32</th>
		<th>31</th>
		<th>30</th>
		<th>29</th>
		<th>28</th>
		<th>27</th>
		<th>26</th>
		<th>25</th>
		<th>24</th>
		<th>23</th>
		<th>22</th>
		<th>21</th>
		<th>20</th>
		<th>19</th>
		<th>18</th>
		<th>17</th>
		<th>16</th>
		<th>15</th>
		<th>14</th>
		<th>13</th>
		<th>12</th>
		<th>11</th>
		<th>10</th>
		<th>9</th>
		<th>8</th>
		<th>7</th>
		<th>6</th>
		<th>5</th>
		<th>4</th>
		<th>3</th>
		<th>2</th>
		<th>1</th>
	</tr>
	<tr>
		<th>1</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
	</tr>
</table> 

<p>
Which is equivalent to -32768, the lowest FIXED number. Adding one more gives:
</p>

<table style="width:95%">
	<tr>
		<th colspan="16">Integer</th>
		<th colspan="16">Decimal</th>
	</tr>
	<tr>
		<th>32</th>
		<th>31</th>
		<th>30</th>
		<th>29</th>
		<th>28</th>
		<th>27</th>
		<th>26</th>
		<th>25</th>
		<th>24</th>
		<th>23</th>
		<th>22</th>
		<th>21</th>
		<th>20</th>
		<th>19</th>
		<th>18</th>
		<th>17</th>
		<th>16</th>
		<th>15</th>
		<th>14</th>
		<th>13</th>
		<th>12</th>
		<th>11</th>
		<th>10</th>
		<th>9</th>
		<th>8</th>
		<th>7</th>
		<th>6</th>
		<th>5</th>
		<th>4</th>
		<th>3</th>
		<th>2</th>
		<th>1</th>
	</tr>
	<tr>
		<th>1</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>0</th>
		<th>1</th>
	</tr>
</table> 

<p>
Which is equivalent to -32768 + 1/65536 or about -32767.99998.
</p>

<p>
To retrieve the decimal portion of your FIXED, you can simply use:
</p>

<code><XMP>(100000 * (X & 0x0000FFFF))>>16)</XMP></code>

<p>
The bitwise AND function selects the lowest 16 bits (the decimal portion.) Multiplying by 100000 allows you to extract five decimal places of information, and the bitshift right by 16 bits is effectively dividing by 65536. You can use a formatted print with <code>".%05d"</code> to display these five digits of the decimal. The integer portion is much simpler.
</p>

<code><XMP>X>>16</XMP></code>

<p>
The above converts a FIXED into an integer by effectively dropping out the decimal bits, leaving the equivalent 16-bit integer.
</p>

<p>
In the general sense, multiplication is handled as:
</p>

<code><XMP>(X*Y)>>16</XMP></code>

<p>
However, remember that there is an upper and lower limit to FIXED values, and that mutliplication is handled as if these are 32-bit integers. This means that, while 2 * 8192 = 16384 is less than the maximum FIXED number of less than 32768, the result of mutliplying two 32 bit numbers stored as FIXEDs like that would lead to overflow, as 2 is not 2, but 2 shifted left by 16 bits. The result would actually require representation in bits 33+. A solution would be to first shift the larger number to an integer:
</p>

<code><XMP>X*(Y>>16)</XMP></code>

<p>
In theory you could also partially shift both numbers as long as the shifts add up to 16 to keep the decimal in the same place. Generally, you will want to just use <code>jo_fixed_mult(X,Y)</code>. This (presumably) stores the product of the two FIXED (32bit * 32 bit = 64 bit) into a pair of 32 bit registers that are treated as an effective 64 bit register. The middle 32 bits are then grabbed as a result, ignoring the high 16 bits (overflow) and the low 16 bits (effectively bitshifting back to FIXED, dropping decimal infromation smaller than 1/65536.) At least, this is what <code>slMulFX(X,Y)</code> does in the Sega Graphics Library. (Jo Engine is built on top of Sega Graphics Library and has access to all its functions.) If you cannot reduce one number to an integer for fast multiplication, it is recommended to use <code>slMulFX(X,Y)</code>.
<p>

<p>
Division gets even more complicated and with greater risk of losing data. It is also much slower (relative to multiplication and especially relative to addition.) Generally, you'd handle division as:
</p>

<code><XMP>(Y/X)<<16</XMP></code>

<p>
This is, however, bound to be fraught with loss of information due to the dropping of 16 bits during integer division and then being compensated for with the bitshift back by 16 to return to a FIXED. For FIXED division, use <code>slDivFX(X,Y)</code> for Y/X (from the Sega Graphics Library.) If at all possible, divsion should be avoided for the sake of speed and accuracy. It is popular for distance caclulation and Z-sorting (3D drawing order) to prebuild tables of 1/Z values to multiply by, and simply go by the closest value you wanted to divide by.
</p>


</body>

<footer>
<link rel="stylesheet" type="text/css" href="../style.css">


<ul>
  <li></li>
  <li><a href="joengine003.php">Previous</a></li>
  <li><a href="joengine000.php">Index</a></li>
  <li><a href="joengine000.php">Next</a></li>
  <li></li>
</ul>

</footer>

</html>