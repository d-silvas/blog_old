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
<pre class="terminal"><font color="#8AE234"><b>bandit4@bandit</b></font>:<font color="#729FCF"><b>~/inhere</b></font>$ file ./*
./-file00: data
./-file01: data
./-file02: data
./-file03: data
./-file04: data
./-file05: data
./-file06: data
./-file07: ASCII text
./-file08: data
./-file09: data</pre>
<pre class="terminal"><font color="#8AE234"><b>bandit4@bandit</b></font>:<font color="#729FCF"><b>~/inhere</b></font>$ head ./-file07
koReBOKuIDDepwhWk7jZC0RTdopnAYKh
</pre>

<br>
<h4 class="subtitle"><b>[05]</b> Bandit level 5</h4>
<ul>
  <li>
    The password for the next level is stored in a file somewhere under
    the <b>inhere</b> directory and has all of the following properties:
    <ul>
      <li>
        Human-readable
      </li>
      <li>
        1033 bytes in size
      </li>
      <li>
        Not executable
      </li>
    </ul>
  </li>
</ul>
<pre class="terminal"><font color="#8AE234"><b>bandit5@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ cd inhere
<font color="#8AE234"><b>bandit5@bandit</b></font>:<font color="#729FCF"><b>~/inhere</b></font>$ ls -la | wc -l
23
<font color="#8AE234"><b>bandit5@bandit</b></font>:<font color="#729FCF"><b>~/inhere</b></font>$ ls -la
total 88
drwxr-x--- 22 root bandit5 4096 Dec 28 14:34 <font color="#729FCF"><b>.</b></font>
drwxr-xr-x  3 root root    4096 Dec 28 14:34 <font color="#729FCF"><b>..</b></font>
drwxr-x---  2 root bandit5 4096 Dec 28 14:34 <font color="#729FCF"><b>maybehere00</b></font>
drwxr-x---  2 root bandit5 4096 Dec 28 14:34 <font color="#729FCF"><b>maybehere01</b></font>
drwxr-x---  2 root bandit5 4096 Dec 28 14:34 <font color="#729FCF"><b>maybehere02</b></font>
drwxr-x---  2 root bandit5 4096 Dec 28 14:34 <font color="#729FCF"><b>maybehere03</b></font>
drwxr-x---  2 root bandit5 4096 Dec 28 14:34 <font color="#729FCF"><b>maybehere04</b></font>
drwxr-x---  2 root bandit5 4096 Dec 28 14:34 <font color="#729FCF"><b>maybehere05</b></font>
drwxr-x---  2 root bandit5 4096 Dec 28 14:34 <font color="#729FCF"><b>maybehere06</b></font>
drwxr-x---  2 root bandit5 4096 Dec 28 14:34 <font color="#729FCF"><b>maybehere07</b></font>
drwxr-x---  2 root bandit5 4096 Dec 28 14:34 <font color="#729FCF"><b>maybehere08</b></font>
drwxr-x---  2 root bandit5 4096 Dec 28 14:34 <font color="#729FCF"><b>maybehere09</b></font>
drwxr-x---  2 root bandit5 4096 Dec 28 14:34 <font color="#729FCF"><b>maybehere10</b></font>
drwxr-x---  2 root bandit5 4096 Dec 28 14:34 <font color="#729FCF"><b>maybehere11</b></font>
drwxr-x---  2 root bandit5 4096 Dec 28 14:34 <font color="#729FCF"><b>maybehere12</b></font>
drwxr-x---  2 root bandit5 4096 Dec 28 14:34 <font color="#729FCF"><b>maybehere13</b></font>
drwxr-x---  2 root bandit5 4096 Dec 28 14:34 <font color="#729FCF"><b>maybehere14</b></font>
drwxr-x---  2 root bandit5 4096 Dec 28 14:34 <font color="#729FCF"><b>maybehere15</b></font>
drwxr-x---  2 root bandit5 4096 Dec 28 14:34 <font color="#729FCF"><b>maybehere16</b></font>
drwxr-x---  2 root bandit5 4096 Dec 28 14:34 <font color="#729FCF"><b>maybehere17</b></font>
drwxr-x---  2 root bandit5 4096 Dec 28 14:34 <font color="#729FCF"><b>maybehere18</b></font>
drwxr-x---  2 root bandit5 4096 Dec 28 14:34 <font color="#729FCF"><b>maybehere19</b></font>
<font color="#8AE234"><b>bandit5@bandit</b></font>:<font color="#729FCF"><b>~/inhere</b></font>$ ls -la maybehere00
total 72
-rwxr-x---  1 root bandit5 1039 Dec 28 14:34 <font color="#8AE234"><b>-file1</b></font>
-rw-r-----  1 root bandit5 9388 Dec 28 14:34 -file2
-rwxr-x---  1 root bandit5 7378 Dec 28 14:34 <font color="#8AE234"><b>-file3</b></font>
drwxr-x---  2 root bandit5 4096 Dec 28 14:34 <font color="#729FCF"><b>.</b></font>
drwxr-x--- 22 root bandit5 4096 Dec 28 14:34 <font color="#729FCF"><b>..</b></font>
-rwxr-x---  1 root bandit5  551 Dec 28 14:34 <font color="#8AE234"><b>.file1</b></font>
-rw-r-----  1 root bandit5 7836 Dec 28 14:34 .file2
-rwxr-x---  1 root bandit5 4802 Dec 28 14:34 <font color="#8AE234"><b>.file3</b></font>
-rwxr-x---  1 root bandit5 6118 Dec 28 14:34 <font color="#8AE234"><b>spaces file1</b></font>
-rw-r-----  1 root bandit5 6850 Dec 28 14:34 spaces file2
-rwxr-x---  1 root bandit5 1915 Dec 28 14:34 <font color="#8AE234"><b>spaces file3</b></font>
</pre>
<pre class="terminal"><font color="#8AE234"><b>bandit5@bandit</b></font>:<font color="#729FCF"><b>~/inhere</b></font>$ ls -la ./* | wc -l
279
<font color="#8AE234"><b>bandit5@bandit</b></font>:<font color="#729FCF"><b>~/inhere</b></font>$ ls -la ./* | grep 1033
-rw-r-----  1 root bandit5 <font color="#EF2929"><b>1033</b></font> Dec 28 14:34 .file2
<font color="#8AE234"><b>bandit5@bandit</b></font>:<font color="#729FCF"><b>~/inhere</b></font>$ find . -size 1033c
./maybehere07/.file2
<font color="#8AE234"><b>bandit5@bandit</b></font>:<font color="#729FCF"><b>~/inhere</b></font>$ cat ./maybehere07/.file2
DXjZPULLxYr17uwoI01bNLQbtFemEgo7
</pre>

<br>
<h4 class="subtitle"><b>[06]</b> Bandit level 6</h4>
<ul>
  <li>
    The password for the next level is stored <b>somewhere on the server</b>
    and has all of the following properties:
    <ul>
      <li>
        Owned by user bandit7
      </li>
      <li>
        Owned by group bandit6
      </li>
      <li>
        33 bytes in size
      </li>
    </ul>
  </li>
</ul>
<pre class="terminal"><font color="#8AE234"><b>bandit6@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ find / -size 33c -user bandit7 -group bandit6 2&gt;/dev/null
/var/lib/dpkg/info/bandit7.password
<font color="#8AE234"><b>bandit6@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ cat /var/lib/dpkg/info/bandit7.password
HKBPTKQnIay4Fw76bEy8PVxKEDQRKTzs
</pre>

<br>
<h4 class="subtitle"><b>[07]</b> Bandit level 7 </h4>
<ul>
  <li>
    The password for the next level is stored in the file <b>data.txt</b> next
    to the word <b>millionth</b>.
  </li>
</ul>
<pre class="terminal"><font color="#8AE234"><b>bandit7@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ wc data.txt
  98567  197133 4184396 data.txt
<font color="#8AE234"><b>bandit7@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ wc -l data.txt
98567 data.txt
<font color="#8AE234"><b>bandit7@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ cat data.txt | grep millionth
<font color="#EF2929"><b>millionth</b></font>	cvX2JJa4CFALtqS87jk27qwqGhBM9plV
<font color="#8AE234"><b>bandit7@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ head data.txt
stripes	ZrwoAbav24aKageEnorHYKB9vxoNWUst
notched	rQI7c1ckBq47CEZdMnQGQk6QcHNw7oiD
Armstrong&apos;s	rUWxU2IDq8debiXsN0UK7Q0O2xL9d1ts
frightens	G161lZov2U6KdfLWyFOEyfo3jywMF14g
shuttered	qs8qWcr185CCG3wm0LNNCuGDWYwWjlSi
Prakrit&apos;s	HV8XkpDaUp08uLofbczyRstbbrO57ZtV
tapeworms	jkJdvjWn5ruqP5IKaZVsr99Eu6NTWBOI
Gamble	rGpYkHUc2BvCDoi7ZHOL2Jham57ehRUb
anchovies	Iy0uvBzQrSfIzjZuXM5sIFvS0NDNkdiV
Adelaide&apos;s	qnWisXg0ExqA7ULLWd8qwV4xyCnxSyWk
</pre>

<br>
<h4 class="subtitle"><b>[08]</b> Bandit level 8</h4>
<ul>
  <li>
    The password for the next level is stored in the file <b>data.txt</b> and
    is the only line of text that occurs only once.
  </li>
</ul>
<pre class="terminal"><font color="#8AE234"><b>bandit8@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ cat data.txt | sort | uniq -c | head
     10 0OghIfgwMwCAdHU7bJQcnZQ0AJIJW32i
     10 0kIXXRRxkn9zt1QVboXxUGgJTc2icRdm
     10 0xxl0vtwyD0TuZQispVqVKnGaVo9z0c1
     10 1zbIa4c2iej6q6r2h6iU9wS289pPpotu
     10 2J4VxABj9e09n3E9EUmf4jAXdtHZzPck
     10 2KZNnJAnwT6joAhp6eea8L858HAhGBhd
     10 2WcB98YA5OecAwmWNDLx3K8uCtiKge54
     10 5FvnyZFrVEY2G3GerowsrkE6SZgLZdYo
     10 5Ui17aYrH08gXOV1TsUyHJzCtZDZwEf8
     10 6Nm9n4LAW7cbmnJdnuyAFhbi6CGdUrbM
</pre>
<pre class="terminal"><font color="#8AE234"><b>bandit8@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ cat data.txt | sort | uniq -u
UsvVyFSfZZWbi6wgC7dAFyFuR6jQQUhR
</pre>

<br>
<h4 class="subtitle"><b>[09]</b> Bandit level 9</h4>
<ul>
  <li>
    The password for the next level is stored in the file <b>data.txt</b>
    in one of the few human-readable strings, beginning with
    several ‘=’ characters.
  </li>
</ul>
<pre class="terminal"><font color="#8AE234"><b>bandit9@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ file data.txt
data.txt: data
</pre>
<pre class="terminal"><font color="#8AE234"><b>bandit9@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ strings data.txt | head
nfZ=
OOO4
FG4F
a(|c;
+#Nn
U=R*q
ULl[
{`at4
BhZd
q#yrggZ
<font color="#8AE234"><b>bandit9@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ strings data.txt | grep -E &quot;^\=&quot;
<font color="#EF2929"><b>=</b></font>-VW+
<font color="#EF2929"><b>=</b></font>========= theP`
<font color="#EF2929"><b>=</b></font>========= password
<font color="#EF2929"><b>=</b></font>========= truKLdjsbJ5g7yyJ2X2R0o3a5HQJFuLk
</pre>

<br>
<h4 class="subtitle"><b>[10]</b> Bandit level 10</h4>
<ul>
  <li>
    The password for the next level is stored in the file <b>data.txt</b>,
    which contains base64 encoded data
  </li>
</ul>
<pre class="terminal"><font color="#8AE234"><b>bandit10@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ base64 --decode data.txt
The password is IFukwKGsFW8MOq3IRFqrxE1hxTNEbUPR
<font color="#8AE234"><b>bandit10@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ cat data.txt
VGhlIHBhc3N3b3JkIGlzIElGdWt3S0dzRlc4TU9xM0lSRnFyeEUxaHhUTkViVVBSCg==
<font color="#8AE234"><b>bandit10@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ file data.txt
data.txt: ASCII text
</pre>

<br>
<h4 class="subtitle"><b>[11]</b> Bandit level 11</h4>
<ul>
  <li>
    The password for the next level is stored in the file <b>data.txt</b>,
    where all lowercase (a-z) and uppercase (A-Z) letters
    have been rotated by 13 positions
  </li>
</ul>
<pre class="terminal"><font color="#8AE234"><b>bandit11@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ cat data.txt | tr &apos;[a-m]&apos; &apos;[n-z]&apos;
Gur pnssworq vs 5Gr8L4qrtPEsPx8utqwuRK8XSP6x2RHu
<font color="#8AE234"><b>bandit11@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ cat data.txt | tr &apos;[a-mn-z]&apos; &apos;[n-za-m]&apos;
Ghe password is 5Ge8L4drgPEfPx8ugdwuRK8XSP6k2RHu
<font color="#8AE234"><b>bandit11@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ cat data.txt | tr &apos;[a-z]&apos; &apos;[n-za-m]&apos;
Ghe password is 5Ge8L4drgPEfPx8ugdwuRK8XSP6k2RHu
<font color="#8AE234"><b>bandit11@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ cat data.txt | tr &apos;[A-Za-z]&apos; &apos;[N-ZA-Mn-za-m]&apos;
The password is 5Te8Y4drgCRfCx8ugdwuEX8KFC6k2EUu
</pre>
<ul><ul><li>
  The usage of [] will <i>accidentally</i> work but it is incorrect! This the
  correct way to do it:
</ul></ul></li>
</ul>
<pre class="terminal"><font color="#8AE234"><b>bandit11@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ cat data.txt | tr &apos;A-Za-z&apos; &apos;N-ZA-Mn-za-m&apos;
The password is 5Te8Y4drgCRfCx8ugdwuEX8KFC6k2EUu
</pre>
<ul><ul><li>
  Read <a href="https://stackoverflow.com/questions/5442436/using-rot13-and-tr-command-for-having-an-encrypted-email-address">
    https://stackoverflow.com/questions/5442436/using-rot13-and-tr-command-for-having-an-encrypted-email-address
  </a> third answer.
</li></ul></ul>
<br>
<h4 class="subtitle"><b>[12]</b> Bandit level 12</h4>
<ul>
  <li>
    The password for the next level is stored in the file <b>data.txt</b>,
    which is a hexdump of a file that has been repeatedly compressed.
    For this level it may be useful to create a directory under /tmp in which
    you can work using mkdir. For example: mkdir /tmp/myname123. Then copy
    the datafile using cp, and rename it using mv (read the manpages!)
  </li>
</ul>
<pre class="terminal"><font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ mkdir /tmp/lalala1928
<font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ cp data.txt /tmp/lalala1928
<font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ cd /tmp/lalala1928
<font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>/tmp/lalala1928</b></font>$ ls
data.txt
</pre>
<ul><ul>
  <li>
    First, analyze what type of file it is. We can do the hex dump and use an
    online file signature analyzer, because <b>file</b> says it's type ASCII
    text: <a href="https://www.filesignatures.net/index.php?page=search&search=1F8B08&mode=SIG">
    https://www.filesignatures.net/index.php?page=search&search=1F8B08&mode=SIG</a>
  </li>
  <li>
    <a href="https://stackoverflow.com/questions/19120676/how-to-detect-type-of-compression-used-on-the-file-if-no-file-extension-is-spe">
      https://stackoverflow.com/questions/19120676/how-to-detect-type-of-compression-used-on-the-file-if-no-file-extension-is-spe
    </a>
  </li>
</ul></ul>
<pre class="terminal"><font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>/tmp/lalala1928</b></font>$ file data.txt
data.txt: ASCII text
<font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>/tmp/lalala1928</b></font>$ hexdump -C data.txt
00000000  30 30 30 30 30 30 30 30  3a 20 31 66 38 62 20 30  |00000000: 1f8b 0|
00000010  38 30 38 20 65 63 66 32  20 34 34 35 61 20 30 32  |808 ecf2 445a 02|
00000020  30 33 20 36 34 36 31 20  37 34 36 31 20 33 32 32  |03 6461 7461 322|
00000030  65 20 20 2e 2e 2e 2e 2e  2e 44 5a 2e 2e 64 61 74  |e  ......DZ..dat|
00000040  61 32 2e 0a 30 30 30 30  30 30 31 30 3a 20 36 32  |a2..00000010: 62|
00000050  36 39 20 36 65 30 30 20  30 31 34 39 20 30 32 62  |69 6e00 0149 02b|
00000060  36 20 66 64 34 32 20 35  61 36 38 20 33 39 33 31  |6 fd42 5a68 3931|
00000070  20 34 31 35 39 20 20 62  69 6e 2e 2e 49 2e 2e 2e  | 4159  bin..I...|
00000080  42 5a 68 39 31 41 59 0a  30 30 30 30 30 30 32 30  |BZh91AY.00000020|
00000090  3a 20 32 36 35 33 20 35  39 33 30 20 33 65 31 62  |: 2653 5930 3e1b|
000000a0  20 34 30 30 30 20 30 30  31 34 20 66 66 66 66 20  | 4000 0014 ffff |
000000b0  64 64 65 33 20 32 62 36  64 20 20 26 53 59 30 3e  |dde3 2b6d  &amp;SY0&gt;|
000000c0  2e 40 2e 2e 2e 2e 2e 2e  2e 2b 6d 0a 30 30 30 30  |.@.......+m.0000|
</pre>
<pre class="terminal"><font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>/tmp/lalala1928</b></font>$ tar -xvzf data

gzip: stdin: not in gzip format
tar: Child returned status 1
tar: Error is not recoverable: exiting now
<font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>/tmp/lalala1928</b></font>$ tar -xvf data
tar: This does not look like a tar archive
tar: Skipping to next header
tar: Exiting with failure status due to previous errors
</pre>
<ul><ul>
  <li>
    LOL! <b>data</b> is actually a hex dump itself! I have been deceived.
  </li>
  <li>
    We need to use <code>xxd</code> with the <b>-r</b> option.
</ul></ul>
<pre class="terminal"><font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>/tmp/lalala1928</b></font>$ head data
00000000: 1f8b 0808 ecf2 445a 0203 6461 7461 322e  ......DZ..data2.
00000010: 6269 6e00 0149 02b6 fd42 5a68 3931 4159  bin..I...BZh91AY
00000020: 2653 5930 3e1b 4000 0014 ffff dde3 2b6d  &amp;SY0&gt;.@.......+m
00000030: afff dd1e dfd7 ffbf bdfb 3f67 bfff ffff  ..........?g....
00000040: bde5 bfff aff7 bfdb e5ff ffef b001 39b0  ..............9.
00000050: 480d 3400 0068 0068 1a00 0000 01a3 4000  H.4..h.h......@.
00000060: 0001 a643 4d34 0000 d00d 0698 800d 1934  ...CM4.........4
00000070: d0c4 d034 1a36 a343 646a 1c9a 3206 9a00  ...4.6.Cdj..2...
00000080: 3406 8000 068d 064f 51a3 4000 000f 5000  4......OQ.@...P.
00000090: 6868 0034 d308 0da4 6990 1a03 4000 6869  hh.4....i...@.hi
<font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>/tmp/lalala1928</b></font>$ hexdump -C data | head
00000000  30 30 30 30 30 30 30 30  3a 20 31 66 38 62 20 30  |00000000: 1f8b 0|
00000010  38 30 38 20 65 63 66 32  20 34 34 35 61 20 30 32  |808 ecf2 445a 02|
00000020  30 33 20 36 34 36 31 20  37 34 36 31 20 33 32 32  |03 6461 7461 322|
00000030  65 20 20 2e 2e 2e 2e 2e  2e 44 5a 2e 2e 64 61 74  |e  ......DZ..dat|
00000040  61 32 2e 0a 30 30 30 30  30 30 31 30 3a 20 36 32  |a2..00000010: 62|
00000050  36 39 20 36 65 30 30 20  30 31 34 39 20 30 32 62  |69 6e00 0149 02b|
00000060  36 20 66 64 34 32 20 35  61 36 38 20 33 39 33 31  |6 fd42 5a68 3931|
00000070  20 34 31 35 39 20 20 62  69 6e 2e 2e 49 2e 2e 2e  | 4159  bin..I...|
00000080  42 5a 68 39 31 41 59 0a  30 30 30 30 30 30 32 30  |BZh91AY.00000020|
00000090  3a 20 32 36 35 33 20 35  39 33 30 20 33 65 31 62  |: 2653 5930 3e1b|
</pre>
<pre class="terminal"><font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>/tmp/lalala1928</b></font>$ xxd -r data &gt; data.gz
<font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>/tmp/lalala1928</b></font>$ file data.gz
data.gz: gzip compressed data, was &quot;data2.bin&quot;, last modified: Thu Dec 28 13:34:36 2017, max compression, from Unix
</pre>
<pre class="terminal"><font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>/tmp/lalala1928</b></font>$ mv data data_old
<font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>/tmp/lalala1928</b></font>$ gunzip data.gz
<font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>/tmp/lalala1928</b></font>$ ls -la
total 724
drwxrwxr-x    2 bandit12 bandit12   4096 Mar 11 16:03 <font color="#729FCF"><b>.</b></font>
drwxrwx-wt 2480 root     root     724992 Mar 11 16:03 <span style="background-color:#4E9A06"><font color="#2E3436">..</font></span>
-rw-rw-r--    1 bandit12 bandit12    585 Mar 11 16:00 data
-rw-r-----    1 bandit12 bandit12   2646 Mar 11 15:40 data_old
</pre>
<pre class="terminal"><font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>/tmp/lalala1928</b></font>$ file data
data: bzip2 compressed data, block size = 900k
<font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>/tmp/lalala1928</b></font>$ bzip2 -d data
bzip2: Can&apos;t guess original name for data -- using data.out
<font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>/tmp/lalala1928</b></font>$ ls -la
total 724
drwxrwxr-x    2 bandit12 bandit12   4096 Mar 11 16:09 <font color="#729FCF"><b>.</b></font>
drwxrwx-wt 2481 root     root     724992 Mar 11 16:09 <span style="background-color:#4E9A06"><font color="#2E3436">..</font></span>
-rw-rw-r--    1 bandit12 bandit12    443 Mar 11 16:00 data.out
-rw-r-----    1 bandit12 bandit12   2646 Mar 11 15:40 data_old
<font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>/tmp/lalala1928</b></font>$ file data.out
data.out: gzip compressed data, was &quot;data4.bin&quot;, last modified: Thu Dec 28 13:34:36 2017, max compression, from Unix
<font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>/tmp/lalala1928</b></font>$ gzip -d data.out
gzip: data.out: unknown suffix -- ignored
<font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>/tmp/lalala1928</b></font>$ tar zxvf data.out
data5.bin
<font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>/tmp/lalala1928</b></font>$ file data5.bin
data5.bin: POSIX tar archive (GNU)
<font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>/tmp/lalala1928</b></font>$ tar xvf data5.bin
data6.bin
<font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>/tmp/lalala1928</b></font>$ file data6.bin
data6.bin: bzip2 compressed data, block size = 900k
<font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>/tmp/lalala1928</b></font>$ bzip2 -d data6.bin
bzip2: Can&apos;t guess original name for data6.bin -- using data6.bin.out
<font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>/tmp/lalala1928</b></font>$ file data6.bin.out
data6.bin.out: POSIX tar archive (GNU)
<font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>/tmp/lalala1928</b></font>$ tar xvf data6.bin.out
data8.bin
<font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>/tmp/lalala1928</b></font>$ file data8.bin
data8.bin: gzip compressed data, was &quot;data9.bin&quot;, last modified: Thu Dec 28 13:34:36 2017, max compression, from Unix
<font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>/tmp/lalala1928</b></font>$ gunzip data8.bin
gzip: data8.bin: unknown suffix -- ignored
</pre>
<ul><ul>
  <li>
    The program <code>gunzip</code> cares about the extension of the file,
    that's why I was getting those errors before.
  </li>
  <li>
    <a href="https://unix.stackexchange.com/questions/94837/having-trouble-uncompressing-a-few-files">
      https://unix.stackexchange.com/questions/94837/having-trouble-uncompressing-a-few-files
    </a>
  </li>
</ul></ul>
<pre class="terminal"><font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>/tmp/lalala1928</b></font>$ mv data8.bin data8.bin.gz
<font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>/tmp/lalala1928</b></font>$ gunzip data8.bin.gz
<font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>/tmp/lalala1928</b></font>$ ls
data.out  data5.bin  data6.bin.out  data8.bin  data_old
<font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>/tmp/lalala1928</b></font>$ file data8.bin
data8.bin: ASCII text
<font color="#8AE234"><b>bandit12@bandit</b></font>:<font color="#729FCF"><b>/tmp/lalala1928</b></font>$ cat data8.bin
The password is 8ZjyCRiBWFYkneahHwxCv3wb2a1ORpYL
</pre>

<br>
<h4 class="subtitle"><b>[13]</b> Bandit level 13</h4>
<ul>
  <li>
    The password for the next level is stored in <b>/etc/bandit_pass/bandit14</b>
    and can only be read by user bandit14. For this level, you don’t get the
    next password, but you get a private SSH key that can be used
    to log into the next level.
  </li>
  <ul>
    <li>
      <a href="https://help.ubuntu.com/community/SSH/OpenSSH/Keys">
        https://help.ubuntu.com/community/SSH/OpenSSH/Keys
      </a>
    </li>
  </ul>
</ul>
<pre class="terminal"><font color="#8AE234"><b>bandit13@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ ssh -i ./sshkey.private bandit14@localhost
Could not create directory &apos;/home/bandit13/.ssh&apos;.
The authenticity of host &apos;localhost (127.0.0.1)&apos; can&apos;t be established.
ECDSA key fingerprint is SHA256:98UL0ZWr85496EtCRkKlo20X3OPnyPSB5tB5RPbhczc.
Are you sure you want to continue connecting (yes/no)? yes
Failed to add the host to the list of known hosts (/home/bandit13/.ssh/known_hosts).
This is a OverTheWire game server. More information on http://www.overthewire.org/wargames

      ,----..            ,----,          .---.
     /   /   \         ,/   .`|         /. ./|
    /   .     :      ,`   .&apos;  :     .--&apos;.  &apos; ;
   .   /   ;.  \   ;    ;     /    /__./ \ : |
  .   ;   /  ` ; .&apos;___,/    ,&apos; .--&apos;.  &apos;   \&apos; .
  ;   |  ; \ ; | |    :     | /___/ \ |    &apos; &apos;
  |   :  | ; | &apos; ;    |.&apos;;  ; ;   \  \;      :
  .   |  &apos; &apos; &apos; : `----&apos;  |  |  \   ;  `      |
  &apos;   ;  \; /  |     &apos;   :  ;   .   \    .\  ;
   \   \  &apos;,  /      |   |  &apos;    \   \   &apos; \ |
    ;   :    /       &apos;   :  |     :   &apos;  |--&quot;
     \   \ .&apos;        ;   |.&apos;       \   \ ;
  www. `---` ver     &apos;---&apos; he       &apos;---&quot; ire.org

#...

</pre>
<pre class="terminal"><font color="#8AE234"><b>bandit14@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ cat /etc/bandit_pass/bandit14
4wcYUJFw0k0XLShlDzztnTBHiqxU3b3e
</pre>

<br>
<h4 class="subtitle"><b>[14]</b> Bandit level 14</h4>
<ul>
  <li>
    The password for the next level can be retrieved by submitting the
    password of the current level to <b>port 30000 on localhost</b>.
  </li>
</ul>
<pre class="terminal"><font color="#8AE234"><b>bandit14@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ ssh -vvv bandit15@localhost -p 30000
OpenSSH_7.2p2 Ubuntu-4ubuntu2.4, OpenSSL 1.0.2g  1 Mar 2016
debug1: Reading configuration data /etc/ssh/ssh_config
debug1: /etc/ssh/ssh_config line 3: Applying options for *
debug2: resolving &quot;localhost&quot; port 30000
debug2: ssh_connect_direct: needpriv 0
debug1: Connecting to localhost [::1] port 30000.
debug1: connect to address ::1 port 30000: Connection refused
debug1: Connecting to localhost [127.0.0.1] port 30000.
debug1: Connection established.
debug1: key_load_public: No such file or directory
debug1: identity file /home/bandit14/.ssh/id_rsa type -1
debug1: key_load_public: No such file or directory
debug1: identity file /home/bandit14/.ssh/id_rsa-cert type -1
debug1: key_load_public: No such file or directory
debug1: identity file /home/bandit14/.ssh/id_dsa type -1
debug1: key_load_public: No such file or directory
debug1: identity file /home/bandit14/.ssh/id_dsa-cert type -1
debug1: key_load_public: No such file or directory
debug1: identity file /home/bandit14/.ssh/id_ecdsa type -1
debug1: key_load_public: No such file or directory
debug1: identity file /home/bandit14/.ssh/id_ecdsa-cert type -1
debug1: key_load_public: No such file or directory
debug1: identity file /home/bandit14/.ssh/id_ed25519 type -1
debug1: key_load_public: No such file or directory
debug1: identity file /home/bandit14/.ssh/id_ed25519-cert type -1
debug1: Enabling compatibility mode for protocol 2.0
debug1: Local version string SSH-2.0-OpenSSH_7.2p2 Ubuntu-4ubuntu2.4
debug1: ssh_exchange_identification: Wrong! Please enter the correct current password

ssh_exchange_identification: Connection closed by remote host
</pre>
<pre class="terminal"><font color="#8AE234"><b>bandit14@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ telnet localhost 30000
Trying ::1...
Trying 127.0.0.1...
Connected to localhost.
Escape character is &apos;^]&apos;.
4wcYUJFw0k0XLShlDzztnTBHiqxU3b3e
Correct!
BfMYroe26WYalil77FoDi9qh59eK5xNr

Connection closed by foreign host.</pre>

<br>
<h4 class="subtitle"><b>[15]</b> Bandit level 15</h4>
<ul>
  <li>
    The password for the next level can be retrieved by submitting the
    password of the current level to port 30001 on localhost
    using SSL encryption.
  </li>
  <li>
    Helpful note: Getting “HEARTBEATING” and “Read R BLOCK”? Use -ign_eof
    and read the “CONNECTED COMMANDS” section in the manpage. Next to ‘R’
    and ‘Q’, the ‘B’ command also works in this version of that command…
  </li>
</ul>
<pre class="terminal"><font color="#8AE234"><b>bandit14@bandit</b></font>:<font color="#729FCF"><b>~</b></font>$ openssl s_client -connect localhost:30001
CONNECTED(00000003)
depth=0 CN = bandit
verify error:num=18:self signed certificate
verify return:1
depth=0 CN = bandit
verify return:1
---
Certificate chain
 0 s:/CN=bandit
   i:/CN=bandit
---
Server certificate
-----BEGIN CERTIFICATE-----
MIICsjCCAZqgAwIBAgIJAKZI1xYeoXFuMA0GCSqGSIb3DQEBCwUAMBExDzANBgNV
BAMMBmJhbmRpdDAeFw0xNzEyMjgxMzIzNDBaFw0yNzEyMjYxMzIzNDBaMBExDzAN
BgNVBAMMBmJhbmRpdDCCASIwDQYJKoZIhvcNAQEBBQADggEPADCCAQoCggEBAOcX
ruVcnQUBeHJeNpSYayQExCJmcHzSCktnOnF/H4efWzxvLRWt5z4gYaKvTC9ixLrb
K7a255GEaUbP/NVFpB/sn56uJc1ijz8u0hWQ3DwVe5ZrHUkNzAuvC2OeQgh2HanV
5LwB1nmRZn90PG1puKxktMjXsGY7f9Yvx1/yVnZqu2Ev2uDA0RXij/T+hEqgDMI7
y4ZFmuYD8z4b2kAUwj7RHh9LUKXKQlO+Pn8hchdR/4IK+Xc4+GFOin0XdQdUJaBD
8quOUma424ejF5aB6QCSE82MmHlLBO2tzC9yKv8L8w+fUeQFECH1WfPC56GcAq3U
IvgdjGrU/7EKN5XkONcCAwEAAaMNMAswCQYDVR0TBAIwADANBgkqhkiG9w0BAQsF
AAOCAQEAnrOty7WAOpDGhuu0V8FqPoKNwFrqGuQCTeqhQ9LP0bFNhuH34pZ0JFsH
L+Y/q4Um7+66mNJUFpMDykm51xLY2Y4oDNCzugy+fm5Q0EWKRwrq+hIM+5hs0RdC
nARP+719ddmUiXF7r7IVP2gK+xqpa8+YcYnLuoXEtpKkrrQCCUiqabltU5yRMR77
3wqB54txrB4IhwnXqpO23kTuRNrkG+JqDUkaVpvct+FAdT3PODMONP/oHII3SH9i
ar/rI9k+4hjlg4NqOoduxX9M+iLJ0Zgj6HAg3EQVn4NHsgmuTgmknbhqTU3o4IwB
XFnxdxVy0ImGYtvmnZDQCGivDok6jA==
-----END CERTIFICATE-----
subject=/CN=bandit
issuer=/CN=bandit
---
No client certificate CA names sent
---
SSL handshake has read 1015 bytes and written 631 bytes
---
New, TLSv1/SSLv3, Cipher is AES128-SHA
Server public key is 2048 bit
Secure Renegotiation IS supported
Compression: NONE
Expansion: NONE
No ALPN negotiated
SSL-Session:
    Protocol  : TLSv1
    Cipher    : AES128-SHA
    Session-ID: A1DA112B8BA7648098AA748AE939A0A60E11A2B03F89EE6BBEE4D73FA8CDB186
    Session-ID-ctx:
    Master-Key: C0D004FD49523CAA0F4C0207E4A5A5034D3D135C92AEB03FD24EBEF39C20F11EF4BBDD07AE0F41EAB9D25F430AF65A24
    Key-Arg   : None
    PSK identity: None
    PSK identity hint: None
    SRP username: None
    TLS session ticket lifetime hint: 7200 (seconds)
    TLS session ticket:
    0000 - 29 a6 28 17 9b 5c 28 7b-85 c9 28 dc 8e 75 2f 22   ).(..\({..(..u/&quot;
    0010 - 79 a7 05 a6 86 29 7f 40-a0 89 8a b5 26 7a 57 e1   y....).@....&amp;zW.
    0020 - 69 15 9e 92 af 7d 02 85-0b 88 60 22 a9 f7 59 f2   i....}....`&quot;..Y.
    0030 - 39 52 14 c8 d4 fb 2d 67-ec 02 5f 58 59 c0 59 7d   9R....-g.._XY.Y}
    0040 - 2b 73 5e cd b5 77 6c 58-67 10 17 67 74 e0 00 5d   +s^..wlXg..gt..]
    0050 - 23 0a 7b 4e 2e 2d 99 ec-19 87 9a 28 95 73 b1 92   #.{N.-.....(.s..
    0060 - 04 c5 fe 79 bb df d2 5d-d4 34 49 56 08 b8 71 af   ...y...].4IV..q.
    0070 - 21 8b 13 62 28 52 9a bf-f9 68 dc 4c 50 92 f8 31   !..b(R...h.LP..1
    0080 - b6 85 e5 1d 9f 7f 0a 38-43 8c 39 77 3f 96 95 bd   .......8C.9w?...
    0090 - 3b 43 ad 24 62 27 54 17-cd 91 74 cd 34 63 02 f8   ;C.$b&apos;T...t.4c..

    Start Time: 1520787754
    Timeout   : 300 (sec)
    Verify return code: 18 (self signed certificate)
---
BfMYroe26WYalil77FoDi9qh59eK5xNr
HEARTBEATING
read R BLOCK

Wrong! Please enter the correct current password
closed
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
    <ul>
      <li>
        Option <code>-p</code> shows the command that is going to be executed
      </li>
      <li>
        <a href="https://shapeshed.com/unix-xargs/">https://shapeshed.com/unix-xargs/</a>
      </li>
    </ul>
  </li>
  <li>
    Pipes and redirects
    <ul>
      <li>
        <a href="http://www.westwind.com/reference/os-x/commandline/pipes.html">
          http://www.westwind.com/reference/os-x/commandline/pipes.html
        </a>
      </li>
    </ul>
  </li>
  <li>
    <code>grep</code>
    <ul>
      <li>
        <a href="https://linode.com/docs/tools-reference/tools/how-to-grep-for-text-in-files/">
          https://linode.com/docs/tools-reference/tools/how-to-grep-for-text-in-files/
        </a>
        (very useful info for filtering logs!)
      </li>
    </ul>
  </li>
  <li>
    ROT13
    <ul>
      <li>
        <a href="https://en.wikipedia.org/wiki/ROT13">
          https://en.wikipedia.org/wiki/ROT13
        </a>
      </li>
    </ul>
  </li>
  <li>
    Stuff to check out: <code>nc</code>
    <ul>
      <li>
        <a href="http://www.tutorialspoint.com/unix_commands/nc.htm">
          http://www.tutorialspoint.com/unix_commands/nc.htm
        </a>
      </li>
    </ul>
  </li>
</ul>
