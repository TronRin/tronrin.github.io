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
  <li><a href="joengine001.php">Previous</a></li>
  <li><a href="joengine000.php">Index</a></li>
  <li><a href="joengine003.php">Next</a></li>
  <li></li>
</ul>


<H2>Jo Engine Initialization and Primary Game Loop</H2>

<p>
This example provides the bare essential code for running Jo Engine.
</p>

<H3>With A Callback (Standard Method)</H3>

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
	/*
	YOUR CODE HERE
	*/
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

<p>
The opening block comment giving the Copyright and Licensing agreement for Jo Engine should be retained in any file that makes calls to Jo Engine, if not for moral reasons, then at least for legal ones. This section describes how you are permitted to use Johannes Fetz’s code, what liability he has on what you make using it, and restrictions on the distribution of said source code (and by extenstion, anything you make that requires it to run.)
</p>

<p>
<code>jo_main()</code> is the necessary main function that is run when the code is compiled and run on the Sega Saturn. <code>jo_core_init()</code> serves to initialize the game engine. The argument <code>JO_COLOR_Black</code> gives a default black background color before anything is drawn to the screen. Other colors may be selected from the <a href="https://jo-engine.org/doxygen/colors_8h.html" target="_blank">Jo Engine Documentation</a>.
</p>

<p>
<code>jo_core_add_callback(primary_loop)</code> tells the engine to run the function <code>primary_loop()</code> every update as a callback. <code>primary_loop()</code> is where essentially all game logic will take place. It is initialized first so that the call to it in <code>jo_main()</code> is possible. This is the top level logic of your game and should be responsible for calling all functions (and functions that call other functions, etc.)
</p>

<p>
The blank line at the end of the file is required by the compiler and should be retained.
</p>

<p>
The make file, a necessary set of instructions for the compiler, is shown below.
</p>

<pre><code><XMP>
JO_COMPILE_WITH_VIDEO_MODULE = 0
JO_COMPILE_WITH_BACKUP_MODULE = 0
JO_COMPILE_WITH_TGA_MODULE = 0
JO_COMPILE_WITH_AUDIO_MODULE = 0
JO_COMPILE_WITH_3D_MODULE = 0
JO_COMPILE_WITH_PSEUDO_MODE7_MODULE = 0
JO_COMPILE_WITH_EFFECTS_MODULE = 0
JO_COMPILE_WITH_RAM_CARD_MODULE = 0
JO_GLOBAL_MEMORY_SIZE_FOR_MALLOC = 262144
JO_PSEUDO_SATURN_KAI_SUPPORT = 1
JO_DEBUG = 0
SRCS = main.c
JO_ENGINE_SRC_DIR=../../jo_engine
COMPILER_DIR=../../Compiler
include $(COMPILER_DIR)/COMMON/jo_engine_makefile

</XMP></code></pre>

<p>
Because this example is for only the most basic functionality, all optional modules are deactivated (set to 0) except <code>JO_PSEUDO_SATURN_KAI_SUPPORT</code>, which is set to 1 to allow for Psuedo Saturn Kai users to run teh resulting image. The memory size setting <code>JO_GLOBAL_MEMORY_SIZE_FOR_MALLOC = 262144</code> is a value found by XL2 that functions for his code, and is kept as a vestigial compatibility for any potential <code>malloc()</code> operations. <code>SRCS</code> tells the compiler which source files (.c) are to be included in the build. This is not necessary for header (.h) as the include statements (such as <code>#include &lt;jo/jo.h&gt;</code>) are pulled in with source files. The final three lines give a directory structure to find the compiler and engine files required by the Jo Engine environment. As written, the code needs to be in a subdirectory two levels down from the parent. <code>\JO Engine\Projects\[YOUR-CODE-FOLDER-NAME]</code> is recommended as a working folder.
</p>

<p>
This code should result in a black screen after startup.
</p>

<center><img src="joengine-img/002a.jpg"></img></center>

<hr>

<H3>Without A Callback (Alternate Method)</H3>

<p>
<code>main.c</code>:
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
	while(1)
	{
		/*
		YOUR CODE HERE
		*/
	}
}

void jo_main(void)
{
	//  Initialize engine with black background
	jo_core_init(JO_COLOR_Black);	

	//	Main loop of game
	primary_loop();	
}

</XMP></code></pre>

<p>
When <code>primary_loop()</code> is called, the <code>while(1)</code> condition starts and, provided the program does not crash, never stops. For normal game operation, you will never want to exit or break this loop, as the Saturn will simple stop doing anything. For an “exit game” or “return to title” feature, games states should be used (covered separately.)
</p>

<p>
This approach, avoiding Jo Enging callbacks, is required for compatibility with Z-Treme Tools. This may, however, break certain functions such as <code>jo_printf()</code> and <code>jo_get_ticks</code> that rely on the callback sttructure. You will need to rely on the SGL equivalent functions in this case.
</p>

</body>

<footer>
<link rel="stylesheet" type="text/css" href="../style.css">


<ul>
  <li></li>
  <li><a href="joengine001.php">Previous</a></li>
  <li><a href="joengine000.php">Index</a></li>
  <li><a href="joengine003.php">Next</a></li>
  <li></li>
</ul>

</footer>

</html>