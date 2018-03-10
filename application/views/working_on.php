<style>
</style>
<!--<img src="../../../assets/images/00setup.png" alt="Setup">-->
<p>Note: Add links to the titles</p>
<h4 class="subtitle"><b>[00]</b> Bandit level 0</h4>
<ul>
  <li>
    The password for the next level is stored in a file called readme located
    in the home directory. Use this password to log into bandit1 using SSH.
    Whenever you find a password for a level, use SSH (on port 2220)
    to log into that level and continue the game.
  </li>
</ul>
<pre class="terminal"><font color="#8AE234"><b>user@ubuntupc</b></font>:<font color="#729FCF"><b>~</b></font>$ ssh -p 2220 bandit0@bandit.labs.overthewire.org
</pre>
<pre class="terminal"><font color="#8AE234"><b>bandit0@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ ls -la
total 24
drwxr-xr-x  2 root    root    4096 Dec 28 14:34 <font color="#729FCF"><b>.</b></font>
drwxr-xr-x 29 root    root    4096 Dec 28 14:34 <font color="#729FCF"><b>..</b></font>
-rw-r--r--  1 root    root     220 Sep  1  2015 .bash_logout
-rw-r--r--  1 root    root    3771 Sep  1  2015 .bashrc
-rw-r--r--  1 root    root     655 Jun 24  2016 .profile
-rw-r-----  1 bandit1 bandit0   33 Dec 28 14:34 readme
<font color="#8AE234"><b>bandit0@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ cat readme
boJ9jbbUNNfktd78OOpsqOltutMc3MY1
</pre>
<br>
<h4 class="subtitle"><b>[01]</b> Bandit level 1</h4>
<ul>
  <li>
    The password for the next level is stored in a file called - located in the home directory
  </li>
</ul>
<pre class="terminal"><font color="#8AE234"><b>bandit1@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ ls -la
total 24
-rw-r-----  1 bandit2 bandit1   33 Dec 28 14:34 -
drwxr-xr-x  2 root    root    4096 Dec 28 14:34 <font color="#729FCF"><b>.</b></font>
drwxr-xr-x 29 root    root    4096 Dec 28 14:34 <font color="#729FCF"><b>..</b></font>
-rw-r--r--  1 root    root     220 Sep  1  2015 .bash_logout
-rw-r--r--  1 root    root    3771 Sep  1  2015 .bashrc
-rw-r--r--  1 root    root     655 Jun 24  2016 .profile
<font color="#8AE234"><b>bandit1@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ cat -
^C
<font color="#8AE234"><b>bandit1@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ cat &quot;-&quot;
^C
<font color="#8AE234"><b>bandit1@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ cat &apos;-&apos;
^C
<font color="#8AE234"><b>bandit1@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ cat ./-
CV1DtqXWVFXTvM2F0k09SHz0YwRINYA9
</pre>
<ul>
  <li>
    Read here the section "redirection from/to stdin or stdout [dash]":
    <a href="http://tldp.org/LDP/abs/html/special-chars.html">http://tldp.org/LDP/abs/html/special-chars.html</a>
  </li>
  <li>
    <a href="https://unix.stackexchange.com/questions/16357/usage-of-dash-in-place-of-a-filename">
      https://unix.stackexchange.com/questions/16357/usage-of-dash-in-place-of-a-filename
    </a>
  </li>
</ul>

<br>
<h4 class="subtitle"><b>[03]</b> Bandit level 2</h4>
<ul>
  <li>
    The password for the next level is stored in a file called
    <b>spaces in this filename</b> located in the home directory
  </li>
</ul>
<pre class="terminal"><font color="#8AE234"><b>bandit2@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ ls -la
total 24
drwxr-xr-x  2 root    root    4096 Dec 28 14:34 <font color="#729FCF"><b>.</b></font>
drwxr-xr-x 29 root    root    4096 Dec 28 14:34 <font color="#729FCF"><b>..</b></font>
-rw-r--r--  1 root    root     220 Sep  1  2015 .bash_logout
-rw-r--r--  1 root    root    3771 Sep  1  2015 .bashrc
-rw-r--r--  1 root    root     655 Jun 24  2016 .profile
-rw-r-----  1 bandit3 bandit2   33 Dec 28 14:34 spaces in this filename
<font color="#8AE234"><b>bandit2@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ cat &quot;spaces in this filename&quot;
UmHadQclWmgdLOKQ3YNgjWxGoRMb5luK
<font color="#8AE234"><b>bandit2@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ cat spaces\ in\ this\ filename
UmHadQclWmgdLOKQ3YNgjWxGoRMb5luK
</pre>

<br>
<h4 class="subtitle"><b>[03]</b> Bandit level 3</h4>
<ul>
  <li>
    The password for the next level is stored in a hidden file in the
    <b>inhere</b> directory.
  </li>
</ul>
<pre class="terminal"><font color="#8AE234"><b>bandit3@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ ls -la
total 24
drwxr-xr-x  3 root root 4096 Dec 28 14:34 <font color="#729FCF"><b>.</b></font>
drwxr-xr-x 29 root root 4096 Dec 28 14:34 <font color="#729FCF"><b>..</b></font>
-rw-r--r--  1 root root  220 Sep  1  2015 .bash_logout
-rw-r--r--  1 root root 3771 Sep  1  2015 .bashrc
-rw-r--r--  1 root root  655 Jun 24  2016 .profile
drwxr-xr-x  2 root root 4096 Dec 28 14:34 <font color="#729FCF"><b>inhere</b></font>
<font color="#8AE234"><b>bandit3@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ cd inhere/
<font color="#8AE234"><b>bandit3@bandit</b></font>:<font color="#729FCF"><b>~/inhere</b></font>$ ls -la
total 12
drwxr-xr-x 2 root    root    4096 Dec 28 14:34 <font color="#729FCF"><b>.</b></font>
drwxr-xr-x 3 root    root    4096 Dec 28 14:34 <font color="#729FCF"><b>..</b></font>
-rw-r----- 1 bandit4 bandit3   33 Dec 28 14:34 .hidden
<font color="#8AE234"><b>bandit3@bandit</b></font>:<font color="#729FCF"><b>~/inhere</b></font>$ cat .hidden
pIwrPrtPN36QITSp3EQaw936yaFoFgAB
</pre>

<br>
<h4 class="subtitle"><b>[04]</b> Bandit level 4</h4>
<ul>
  <li>
    The password for the next level is stored in the only human-readable
    file in the inhere directory. Tip: if your terminal is messed up,
    try the “reset” command.
  </li>
</ul>
<pre class="terminal"><font color="#8AE234"><b>bandit4@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ cd inhere/
<font color="#8AE234"><b>bandit4@bandit</b></font>:<font color="#729FCF"><b>~/inhere</b></font>$ ls -la
total 48
-rw-r----- 1 bandit5 bandit4   33 Dec 28 14:34 -file00
-rw-r----- 1 bandit5 bandit4   33 Dec 28 14:34 -file01
-rw-r----- 1 bandit5 bandit4   33 Dec 28 14:34 -file02
-rw-r----- 1 bandit5 bandit4   33 Dec 28 14:34 -file03
-rw-r----- 1 bandit5 bandit4   33 Dec 28 14:34 -file04
-rw-r----- 1 bandit5 bandit4   33 Dec 28 14:34 -file05
-rw-r----- 1 bandit5 bandit4   33 Dec 28 14:34 -file06
-rw-r----- 1 bandit5 bandit4   33 Dec 28 14:34 -file07
-rw-r----- 1 bandit5 bandit4   33 Dec 28 14:34 -file08
-rw-r----- 1 bandit5 bandit4   33 Dec 28 14:34 -file09
drwxr-xr-x 2 root    root    4096 Dec 28 14:34 <font color="#729FCF"><b>.</b></font>
drwxr-xr-x 3 root    root    4096 Dec 28 14:34 <font color="#729FCF"><b>..</b></font>
<font color="#8AE234"><b>bandit4@bandit</b></font>:<font color="#729FCF"><b>~/inhere</b></font>$ head ./-file00
yk&#x1f;&#x1c;C6q�+���z�C|���&#x10;�M�	�rkA����A<font color="#8AE234"><b>bandit4@bandit</b></font>:<font color="#729FCF"><b>~/inhere</b></font>$
<font color="#8AE234"><b>bandit4@bandit</b></font>:<font color="#729FCF"><b>~/inhere</b></font>$ file ./-file00
./-file00: data
</pre>
<pre class="terminal"><font color="#8AE234"><b>bandit4@bandit</b></font>:<font color="#729FCF"><b>~/inhere</b></font>$ hexdump -C ./*
00000000  79 6b 1f 1c 43 36 71 9b  2b c0 bf 92 7a 83 43 7c  |yk..C6q.+...z.C||
00000010  ac e1 9c 10 8c 4d b5 09  8c 72 6b 41 ef f5 ea c9  |.....M...rkA....|
00000020  41 d3 0f bc f8 9d 4c d0  0c 10 aa e2 80 5d c2 53  |A.....L......].S|
00000030  4e c2 99 1a e0 b7 05 02  13 17 72 2b f4 6c e0 d6  |N.........r+.l..|
00000040  32 e7 bf 69 c5 84 3a 35  ff a1 04 eb 1f 6d 70 17  |2..i..:5.....mp.|
00000050  36 f1 57 17 7b f2 0c 2f  af 0b 84 84 91 95 a4 16  |6.W.{../........|
00000060  25 ed 52 d1 4f 8f 10 90  2c 2d de 0c ab d7 c1 db  |%.R.O...,-......|
00000070  74 f5 aa 8e 54 da f1 57  99 a3 4c 76 8f 3c 64 d6  |t...T..W..Lv.&lt;d.|
00000080  ca c5 33 71 9c 0c 26 8c  3d de 5b 5f fc 92 60 c9  |..3q..&amp;.=.[_..`.|
00000090  9d 92 6d a4 3d 8a 60 ae  7f 56 a1 7a 73 e4 39 29  |..m.=.`..V.zs.9)|
000000a0  08 f9 ed b1 5f 6f cb 94  b7 4d 40 9e 5a 7f b2 f8  |...._o...M@.Z...|
000000b0  8e ac a9 f3 13 ac 02 0e  ae f7 b9 56 c6 8a 5c 25  |...........V..\%|
000000c0  8c 15 f3 90 2b 8e a6 21  03 47 12 20 6b 54 f5 38  |....+..!.G. kT.8|
000000d0  16 ec cb c3 95 78 6a 02  8e 79 73 fc c6 b5 1e 94  |.....xj..ys.....|
000000e0  ca 91 6a ea ae a5 4f 6b  6f 52 65 42 4f 4b 75 49  |..j...OkoReBOKuI|
000000f0  44 44 65 70 77 68 57 6b  37 6a 5a 43 30 52 54 64  |DDepwhWk7jZC0RTd|
00000100  6f 70 6e 41 59 4b 68 0a  9b 12 c2 96 9b a7 15 b9  |opnAYKh.........|
00000110  26 e3 ed da 9b a4 91 9d  1f 5b cc b9 32 c2 fd 7e  |&amp;........[..2..~|
00000120  21 5c 20 be 8a 8f ae e7  9d 52 a8 9d 0c 13 19 50  |!\ ......R.....P|
00000130  b2 a9 ca d0 ba 31 e4 16  3d 3f 47 30 a4 14 b0 87  |.....1..=?G0....|
00000140  44 f7 85 1c cb 55 69 2c  a3 57                    |D....Ui,.W|
0000014a
</pre>



<br>
<h4 class="subtitle"><b>[01]</b> Bandit level 2</h4>
<ul>
  <li>
    The password for the next level is stored in a file called
    <b>spaces in this filename</b> located in the home directory
  </li>
</ul>

<br>
<h4 class="subtitle"><b>[01]</b> Bandit level 2</h4>
<ul>
  <li>
    The password for the next level is stored in a file called
    <b>spaces in this filename</b> located in the home directory
  </li>
</ul>

<br>
<h4 class="subtitle"><b>[01]</b> Bandit level 2</h4>
<ul>
  <li>
    The password for the next level is stored in a file called
    <b>spaces in this filename</b> located in the home directory
  </li>
</ul>

<br>
<h4 class="subtitle"><b>[01]</b> Bandit level 2</h4>
<ul>
  <li>
    The password for the next level is stored in a file called
    <b>spaces in this filename</b> located in the home directory
  </li>
</ul>

<br>
<h4 class="subtitle"><b>[01]</b> Bandit level 2</h4>
<ul>
  <li>
    The password for the next level is stored in a file called
    <b>spaces in this filename</b> located in the home directory
  </li>
</ul>

<br>
<h4 class="subtitle"><b>[01]</b> Bandit level 2</h4>
<ul>
  <li>
    The password for the next level is stored in a file called
    <b>spaces in this filename</b> located in the home directory
  </li>
</ul>






<br>
<h4 class="subtitle"><b>[*]</b> Tips and tricks</h4>
<ul><li>
  Using <b>file</b> command to determine the filetype of all the files in
  a directory
</li></ul>
<pre class="terminal"><font color="#8AE234"><b>bandit0@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ find . -exec file -h {} \;
.: directory
./.profile: ASCII text
./readme: ASCII text
./.bashrc: ASCII text
./.bash_logout: ASCII text
</pre>
<pre class="terminal"><font color="#8AE234"><b>bandit0@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ ls -a | xargs file
.:            directory
..:           directory
.bash_logout: ASCII text
.bashrc:      ASCII text
.profile:     ASCII text
readme:       ASCII text
</pre>
<pre class="terminal"><font color="#8AE234"><b>bandit0@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ file ./.*
./.:            directory
./..:           directory
./.bash_logout: ASCII text
./.bashrc:      ASCII text
./.profile:     ASCII text
</pre>
<pre class="terminal"><font color="#8AE234"><b>bandit0@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ find . | xargs file
.:              directory
./.profile:     ASCII text
./readme:       ASCII text
./.bashrc:      ASCII text
./.bash_logout: ASCII text
</pre>
<ul>
  <li>
    Info about <code>xargs</code>, a command line utility for building an
    execution pipeline from standard input.By default xargs reads items from
    standard input as separated by blanks and executes a command once
    for each argument.
  </li>
  <ul>
    <li>
      Option <code>-p</code> shows the command that is going to be executed
    </li>
    <li>
      <a href="https://shapeshed.com/unix-xargs/">https://shapeshed.com/unix-xargs/</a>
    </li>
  </ul>
</ul>
