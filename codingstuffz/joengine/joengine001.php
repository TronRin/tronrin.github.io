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
  <li><a href="joengine000.php">Previous</a></li>
  <li><a href="joengine000.php">Index</a></li>
  <li><a href="joengine002.php">Next</a></li>
  <li></li>
</ul>


<H2>Creating Disc Images in the Jo Engine Environment</H2>

<p>
This page demonstrates a set of working batch files for cleaning files resulting from compilation, compiling code and writing to disc images, and running the resulting disc images in an emulator.
</p>

<p>
Included in Jo Engine under directory <code>\JO Engine\Compiler</code> is a series of tools and a C compiler (via cygwn if on windows). These tools are utilized via scripts provided with example programs. Below are script files that will function when working in <code>\JO Engine\Projects\[YOUR-CODE-FOLDER-NAME]</code>.
</p>

<p>
You will need to make a <code>\cd\</code> folder inside of <code>\JO Engine\Projects\[YOUR-CODE-FOLDER-NAME]</code>. The <code>\cd\</code> folder is required to compile the disc image. This folder will hold all your non-code game assets that will need to be loaded into the file system (textures, sounds, maps, etc.)
</p>

<H3>Windows</H3>

<p>
In windows, you will be using the batch script files <code>clean.bat</code>, <code>compile.bat</code>, and a third batch file corresponding to the emulator of your choice for play testing. Each emulator will require different calls to run the resulting disc image. Yabause is the simplest emulator to use for beginners, and so <code>run_with_yabause.bat</code> is demonstrated, however, it is not necessarily accureate and can sometimes have errors not present on hardware. Once you have grasped how to utilize these scripts, you may wish to use a more accurate emulator for testing. Mednafen is highly recommmended.
</p>

<p>
<code>clean.bat</code>:
</p>

<pre><code><XMP>
@ECHO Off
SET COMPILER_DIR=..\..\Compiler
SET JO_ENGINE_SRC_DIR=../../jo_engine
SET PATH=%COMPILER_DIR%\SH_COFF\Other Utilities;%PATH%

rm -f ./cd/0.bin
rm -f *.o
rm -f %JO_ENGINE_SRC_DIR%/*.o
rm -f ./sl_coff.bin
rm -f ./sl_coff.coff
rm -f ./sl_coff.map
rm -f ./sl_coff.iso
rm -f ./sl_coff.cue

ECHO Done.

</XMP></code></pre>

<p>
This file deletes object files and disc image files resulting from compliation. After your first compilation, you will want to run this before <code>compile.bat</code>. The first line simply disables command prompt output so that the only prompted output is displayed. The proceeding two <code>SET</code> lines allow the script to call the program <code>rm.exe</code> in the Jo Engine compiler directory to remove files. The <code>rm</code> statements remove object (.o) files, .bin files, and other files used in or resulting from the disc image creation. Because <code>sh-coff</code> is the default name for resulting disc files, all disc images are assumed to have that name. If you wish to retain your disc image when cleaning, simply rename the necessary files (.iso, or the .bin/.cue pair.)
</p>

<p>
<code>compile.bat</code>:
</p>

<pre><code><XMP>
@ECHO Off
SET COMPILER_DIR=..\..\Compiler
SET PATH=%COMPILER_DIR%\SH_COFF\Other Utilities;%COMPILER_DIR%\SH_COFF\sh-coff\bin;%COMPILER_DIR%\TOOLS;%PATH%
make re
JoEngineCueMaker

</XMP></code></pre>

<p>
The first three lines function as in <code>clean.bat</code>. The final two lines use your make file and call <code>JoEngineCueMaker.exe</code> to generate disc images, all of which will be named <code>sl_coff</code>.
</p>

<p>
<code>run_with_yabause.bat</code>:
</p>

<pre><code><XMP>
@ECHO Off
SET EMULATOR_DIR=..\..\Emulators

if exist sl_coff.iso (
"%EMULATOR_DIR%\yabause\yabause.exe" -a -i sl_coff.iso
) else (
echo Please compile first !
)

</XMP></code></pre>

<p>
Again, superflouous output is supressed in the first line. The Jo Engine emulator directory is <code>SET</code> to the correct location in the Jo Engine folder structure. The <code>if</code> statement checks for the existence of the compiled iso, and displays a request to compile first if it can’t be found. Yabause is called with flags -a and -i to run the image <code>sl_coff.cue</code>. These flags are needed to run the image properly, so leave them be.
</p>

<p>
For rapid prototyping, it may be prudent to create a single batch script that calls all three scripts in successsion.
</p>

</body>

<footer>
<link rel="stylesheet" type="text/css" href="../style.css">


<ul>
  <li></li>
  <li><a href="joengine000.php">Previous</a></li>
  <li><a href="joengine000.php">Index</a></li>
  <li><a href="joengine002.php">Next</a></li>
  <li></li>
</ul>

</footer>

</html>