<style>
.for {
  text-transform: uppercase;
  font-size: 12px;
  color: grey;
  padding-right: 8px;
}
img {
  display: block;
  width: 60%;
  margin: 0 auto;
}
@media only screen and (max-width: 991px) {
  img {
    width: 100%;
  }
}
</style>
<!--<img src="../../../assets/images/00setup.png" alt="Setup">-->
<p>A Git workflow for small teams.</p>
<ul>
  <li><a href="#00">Introduction</a></li>
  <li><span class="for">[Maintainer]</span><a href="#01">Starting a new project</a></li>
  <li><span class="for">[Developers]</span><a href="#02">Cloning the new project</a></li>
  <li><span class="for">[Developers]</span><a href="#03">Starting a new feature</a></li>
  <li><span class="for">[Developers]</span><a href="#04">Developing a new feature and pushing the changes</a></li>
  <li><span class="for">[Maintainer]</span><a href="#05">Merging the changes</a></li>
  <li><span class="for">[Maintainer]</span><a href="#06">Tags</a></li>
  <li><a href="#07">Other tasks</a></li>
</ul>
<hr>
<a id="00" class="anchor"></a>
<h4 class="subtitle"><b>Introduction</b></h4>
<p> 
I'm going to describe here a Git workflow that works well for small teams. It is
basically what is known as <i>fetaure branch workflow</i>. You can get more information
about this particular workflow by clicking on the following links:
</p>
<ul>
  <li>
    <a target="_blank" href="https://www.atlassian.com/git/tutorials/comparing-workflows/feature-branch-workflow">
      Feature branch workflow
    </a> explained by BitBucket.
  </li>
</ul>
<p>
Our workflow includes the figure of the <i>Maintainer</i>, who is usually the lead developer.
He will be controlling the git flow and pushing his own changes to the master branch.
</p>
<br>
<a id="01" class="anchor"></a>
<h4 class="subtitle"><b>Starting a new project</b></h4>
<p>
The maintainer will start a new project from the Bitbucket interface.
</p>
<img src="<?= base_url("/assets/images/0009.png") ?>">
<br>
<img src="<?= base_url("/assets/images/0010.png") ?>">
<br>
<img src="<?= base_url("/assets/images/0011.png") ?>">
<br>
<p>
Next, we will open a Git bash on our web server directory (<code>C:\xampp\htdocs</code>, if we are using XAMPP 
on Windows), and run the <code>git clone</code> command that we see above. We will see a new folder,
containing the new project:
</p>
<img src="<?= base_url("/assets/images/0012.png") ?>">
<br>
<p>
Finally, we will add the first files in our project, do our first commit and push this changes to 
the remote master branch
</p>
<img src="<?= base_url("/assets/images/0013.png") ?>">
<br>
<a id="02" class="anchor"></a>
<h4 class="subtitle"><b>Cloning the new project</b></h4>
<p>
The maintainer must add the developers that are going to work in the project, from the Bitbucket 
interface. Then, the developers will see the new project in their bitbucket accounts, and they 
will have to clone the project into their <code>C:\xampp\htdocs</code> folder:
</p>
<img src="<?= base_url("/assets/images/0014.png") ?>">
<br>
<p>
At this point, source code is available for the developers and they can start working on it 
</p>
<br>
<a id="03" class="anchor"></a>
<h4 class="subtitle"><b>Starting a new feature</b></h4>
<p>
Every time the developers start working on a new feature they will do so on a new branch. First of all, 
they need to get the latest updated master branch from the remote, because there could have been changes 
since the last time they did it:
</p>
<pre class="terminal">
git checkout master 
git fetch origin master 
git reset --hard origin/master
</pre>
<p>
After this they will create a new branch and start making the changes:
</p>
<pre class="terminal">
git checkout -b new-feature
</pre>
<br>
<a id="04" class="anchor"></a>
<h4 class="subtitle"><b>Developing a new feature and pushing the changes</b></h4>
<p>

</p>
