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
  <li><a href="joengine002.php">Previous</a></li>
  <li><a href="joengine000.php">Index</a></li>
  <li><a href="joengine004.php">Next</a></li>
  <li></li>
</ul>


<H2>Hello World and Print Statements</H2>

<p>
The basic print satement in Jo Engine is <code>void jo_print(int x, int y, char* str)</code>. With this print statement, you can print up to 40 characters in a line over 30 lines. <code>int x</code> gives the horizontal position on the screen to print the character array <code>char* str</code>, while <code>int y</code> gives the vertical position (line.) (0,0) is the top left corner of the screen. To print hellow world:
</p>

<pre><code><XMP>
/*
** Jo Sega Saturn Engine
** Copyright (c) 2012-2017, Johannes Fetz (johannesfetz@gmail.com)
** All rights reserved.
**
** Redistribution and use in source and binary forms, with or without
** modification, are permitted provided that the following conditions are met:
**     * Redistributions of source code must retain the above copyright
**       notice, this list of conditions and the following disclaimer.
**     * Redistributions in binary form must reproduce the above copyright
**       notice, this list of conditions and the following disclaimer in the
**       documentation and/or other materials provided with the distribution.
**     * Neither the name of the Johannes Fetz nor the
**       names of its contributors may be used to endorse or promote products
**       derived from this software without specific prior written permission.
**
** THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
** ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
** WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
** DISCLAIMED. IN NO EVENT SHALL Johannes Fetz BE LIABLE FOR ANY
** DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
** (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
** LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
** ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
** (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
** SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
*/

#include <jo/jo.h>

//  Primary Logic Loop
void primary_loop(void)
{
	char string[40] = "Hello World!";
	jo_print(0, 0, string);
}

void jo_main(void)
{
	//  Initialize engine with black background
	jo_core_init(JO_COLOR_Black);	

	//	Main loop of game
	jo_core_add_callback(primary_loop);	
	jo_core_run();
}

</XMP></code></pre>

<center><img src="joengine-img/003a.jpg"></img></center>

<p>
Also available is a formatted print statement <code>jo_printf</code>. This works much the same as <code>printf</code>, allowing you to insert variables into a string for printing. Here the primary loop is altered to show the character space on screen:
</p>

<pre><code><XMP>
void primary_loop(void)
{
	char string[40] = "0123456789012345678901234567890123456789";
	jo_print(0, 0, string);
	
	for(int i = 1; i <= 29; i++)
	{
		jo_printf(0, i, "Line # %d/%d.", i, 29);
	}
}
</XMP></code></pre>

<center><img src="joengine-img/003b.jpg"></img></center>

<p>
You can change the color of <code>jo_printf</code> statements by preceeding it with <code>jo_set_printf_color_index</code> with an <a href="https://jo-engine.org/doxygen/colors_8h.html">indexed color</a>. You can also use <code>jo_printf_with_color</code> with an indexed color. Note that indexed colors all start with <code>JO_COLOR_INDEX_</code>.
</p>

<pre><code><XMP>
void primary_loop(void)
{
    jo_set_printf_color_index(JO_COLOR_INDEX_Green);
    jo_printf(0, 0, "Year: %d", 1994);
    jo_printf_with_color(0, 1, JO_COLOR_INDEX_Red, "Sega Saturn: $%d", 399);
}
</XMP></code></pre>

<center><img src="joengine-img/003c.jpg"></img></center>

</body>

<footer>
<link rel="stylesheet" type="text/css" href="../style.css">


<ul>
  <li></li>
  <li><a href="joengine002.php">Previous</a></li>
  <li><a href="joengine000.php">Index</a></li>
  <li><a href="joengine004.php">Next</a></li>
  <li></li>
</ul>

</footer>

</html>