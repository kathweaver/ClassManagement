<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
$page_title="Webmastering Projects";
include 'header.php';
?>

<div align="center"> 
  <h2>Winter Greeting Card Website</h2>
  <p align="left">Your third six weeks project is to create a website that will 
    be a winter holiday type greeting card. Your website will be posted on a website 
    that anyone can get to on the internet if you provide them with the address 
    and a userid and password.</p>
  <p align="left">I create one each year containing Christmas Greetings and include 
    photographs of my dogs. I email the address of my holiday greeting to everyone 
    in my email address book. Within the page, I include a short update on how 
    our family is doing. I would like you to make a similar page.</p>
  <p align="left">Requirements:</p>
</div>
<ul>
  <li> 
    <div align="left">At least one page will be included.</div>
  </li>
  <li> 
    <div align="left">Include at least one photograph. We will use the scanner 
      in the classroom or you can bring in the photograph in digital form.</div>
  </li>
  <li>Include at least 3 graphics to place in your website.</li>
  <li>Any theme can be picked, as long as it is appropriate for the classroom.</li>
</ul>
<p>More requirements may be added.</p>
<table width="75%" border="1">
  <tr> 
    <td width="82%"><font color="#006699"><strong>Instructions</strong></font></td>
  </tr>
  <tr> 
    <td><font color="#FF0000">Create a folder within your network drive (h:) named 
    wintercard</font></td>
  </tr>
  <tr> 
    <td><font color="#FF0000">Create a folder within wintercard named images</font></td>
  </tr>
  <tr> 
    <td><font color="#0000FF">HOMEWORK: Determine what image or images you would 
      like feature in your winter card. It can be a photograph that needs to be 
      scanned or a digital image from a camera. It could even be a drawing if 
      you like to draw. Bring the image to class so we can put it in the wintercard 
    directory.</font></td>
  </tr>
  <tr> 
    <td><font color="#FF0000">Find a background for your website. Place that background in your images directory </font></td>
  </tr>
  <tr> 
    <td><font color="#FF0000">Put your scanned or uploaded digital image in the 
      images directory</font></td>
  </tr>
  <tr>
    <td><font color="#0066CC">Create a index.html file. It should display your background as a background and should display the image(s) you want on your card. </font></td>
  </tr>
  <tr> 
    <td><font color="#FF0000">Add a heading to your webpage indicate what type 
    of winter card it is.</font></td>
  </tr>
  <tr> 
    <td><font color="#FF0000">Add content to your webpage greeting</font></td>
  </tr>
  <tr> 
    <td>Add content to your webpage greeting using some of the tags we have 
        covered in class (bold, italitics, underline, etc.) Use at least two of 
    these tags.</td>
  </tr>
  <tr> 
    <td><p>&nbsp;</p>
      <p>Required:</p>
      <p>Background (use &lt;body background=<em>filename</em>&gt;)</p>
      <p><font color="#000000">One image (use &lt;IMG SRC=<em>filename</em>)</font></p>
      <p><font color="#000000">A link to another website (can be to the website 
        where you got your background, or to your favorite website) (use &lt;a 
        href=&quot;<em>website&quot;&gt;Text</em>&lt;/a&gt;</font></p>
      <p><font color="#000000">Add one list. It can be an unordered list (&lt;UL&gt;), 
        ordered list (&lt;OL&gt;), or a definition list (&lt;DL&gt;). A list of 
        your family members, or a list of your accomplishments would be a nice 
        touch.</font></p></td>
  </tr>
  <tr> 
    <td><font color="#000000">Compress and submit the wintercard directory.</font></td>
  </tr>
  <tr> 
    <td height="67"><p>Learn how to create a table and put it in your index.html </p>
      <p>You can put either pictures, content, or links in the table. Choose at 
        least 1.</p></td>
  </tr>
  <tr> 
    <td height="67"><p>Compress and submit the wintercard directory. At this point, you should 
        have the following:</p>
      <ul>
        <li>Background image</li>
        <li>At least one image included as a &lt;IMG SRC&gt; </li>
        <li>Content</li>
        <li>At least one link to another site.</li>
        <li>At least one list</li>
        <li>At least one table</li>
      </ul></td>
  </tr>
</table>
<p>Here is a &quot;quick reference&quot; for each of the assignments. The following 
  HTML tags should go in the index.html file.</p>
<p>For the first assignment -- show me a background and an image, you'll need 
  the following tags:</p>
<p>&lt;HTML&gt;<br>
  &lt;HEAD&gt;<br>
  &lt;TITLE&gt;<em>some title</em>&lt;/TITLE&gt;<br>
  &lt;/HEAD&gt;<br>
  &lt;BODY BACKGROUND=&quot;images/<em>somename.</em>gif&quot;&gt; -- this tiles 
  the background<br>
  &lt;IMG SRC=&quot;images/<em>filename.</em>jpg&quot; WIDTH=<em>numeric or percentage</em>&gt; 
  -- this puts an image on the page.<br>
  &lt;/BODY&gt;<br>
  &lt;/HTML&gt;</p>
<p>For the second assignment -- add a link to ANY webpage, and the link can be 
  anywhere. </p>
<p>&lt;HTML&gt;<br>
  &lt;HEAD&gt;<br>
  &lt;TITLE&gt;<em>some title</em>&lt;/TITLE&gt;<br>
  &lt;/HEAD&gt;<br>
  &lt;BODY BACKGROUND=&quot;images/<em>somename.</em>gif&quot;&gt; -- this tiles 
  the background<br>
  &lt;IMG SRC=&quot;images/<em>filename.</em>jpg&quot; WIDTH=<em>numeric or percentage</em>&gt; 
  -- this puts an image on the page.<br>
  &lt;A HREF=&quot;<em>webpage address</em>&quot;&gt;<em>text to click on</em>&lt;/A&gt; 
  -- this adds a link<br>
  &lt;/BODY&gt;<br>
  &lt;/HTML&gt;</p>
<p>For the third assignment -- add a list. You choose whether you want an unordered, 
  an ordered. or a definition list</p>
<p>&lt;HTML&gt;<br>
  &lt;HEAD&gt;<br>
  &lt;TITLE&gt;<em>some title</em>&lt;/TITLE&gt;<br>
  &lt;/HEAD&gt;<br>
  &lt;BODY BACKGROUND=&quot;images/<em>somename.</em>gif&quot;&gt; -- this tiles 
  the background<br>
  &lt;IMG SRC=&quot;images/<em>filename.</em>jpg&quot; WIDTH=<em>numeric or percentage</em>&gt; 
  -- this puts an image on the page.<br>
  &lt;A HREF=&quot;<em>webpage address</em>&quot;&gt;<em>text to click on</em>&lt;/A&gt; 
  -- this adds a link</p>
<p>&lt;UL&gt;<br>
  &lt;LI&gt; <em>list text </em>&lt;/LI&gt;<br>
  &lt;LI&gt; <em>list text </em>&lt;/LI&gt;<br>
  &lt;LI&gt; <em>list text </em>&lt;/LI&gt;<br>
  &lt;/UL&gt;</p>
<p> &lt;/BODY&gt;<br>
  &lt;/HTML&gt;</p>
<p>For the third assignment -- add a table. You can put anything you want in the 
  table (as long as it is appropriate for the classroom.</p>
<p>&lt;HTML&gt;<br>
  &lt;HEAD&gt;<br>
  &lt;TITLE&gt;<em>some title</em>&lt;/TITLE&gt;<br>
  &lt;/HEAD&gt;<br>
  &lt;BODY BACKGROUND=&quot;images/<em>somename.</em>gif&quot;&gt; -- this tiles 
  the background<br>
  &lt;IMG SRC=&quot;images/<em>filename.</em>jpg&quot; WIDTH=<em>numeric or percentage</em>&gt; 
  -- this puts an image on the page.<br>
  &lt;A HREF=&quot;<em>webpage address</em>&quot;&gt;<em>text to click on</em>&lt;/A&gt; 
  -- this adds a link</p>
<p>&lt;UL&gt;<br>
  &lt;LI&gt; <em>list text </em>&lt;/LI&gt;<br>
  &lt;LI&gt; <em>list text </em>&lt;/LI&gt;<br>
  &lt;LI&gt; <em>list text </em>&lt;/LI&gt;<br>
  &lt;/UL&gt;</p>
<p>&lt;TABLE&gt;</p>
<p>&lt;TR&gt;<br>
  &lt;TD&gt;<em>Content</em> &lt;/TD&gt;<br>
  &lt;TD&gt;<em>Content </em>&lt;/TD&gt;<br>
  &lt;/TR&gt;</p>
<p> &lt;TR&gt;<br>
  &lt;TD&gt;<em>Content</em> &lt;/TD&gt;<br>
  &lt;TD&gt;<em>Content </em>&lt;/TD&gt;<br>
  &lt;/TR&gt;</p>
<p><br>
  &lt;/TABLE&gt;</p>
<p> &lt;/BODY&gt;<br>
  &lt;/HTML&gt;</p>
<?php
ini_set('include_path', '/home/kweavus/public_html/class');
include 'footer.php';
?>
