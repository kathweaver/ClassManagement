<?php
session_start();
ini_set('include_path', '/home/kathweav/public_html/class');
include 'sessionchecker.php';
session_checker();
$page_title="Webmastering Projects";
?>
<body>
<div align="center"> 
  <h3><font size="2">Changing a PSD to a Image and putting it on a Web Page (Font 
    Assignment) </font></h3>
</div>
<ul>
  <li>Go into photoshop and retrieve your font.psd file (this part will work for 
    any PSD file)<br>
    <em>Note: we created that several weeks ago. </em> </li>
</ul>
<blockquote> 
  <p><em>If you didn't do that, do it now.</em></p>
  <p><em>To create fonts.psd, do the following:<br>
    Go into Photo Shop.<br>
    Selected File New to get a new image.<br>
    Pick any size.<br>
    Colored my background.<br>
    Selected text, and put in my name.<br>
    Copied the layer, blurred the layer and moved it to the back<br>
    (Layer, Arrange, Move to back) or (Drag Layer below the text)</em></p>
</blockquote>
<ul>
  <li> Save your font file for the Web. 
    <ul>
      <li> Click on File</li>
      <li>Click on Save for Web.</li>
      <li>Take all the defaults.</li>
      <li> Click Save.</li>
      <li>Save it in your webpages -- images -- directory -- it should name it 
        font.gif (provided you named the original file file font.psd</li>
    </ul>
  </li>
  <li>Create a blank web page using notepad.</li>
  <li>Within the body tags, add a &lt;IMG SRC=&quot;images\font.gif&quot;&gt; 
    tag</li>
  <li>Save the file in h:\webpages as &quot;index.html&quot;</li>
  <li>View your webpage with a browser.</li>
  <li>To turn in
    <ul>
      <li>Click on My Computer</li>
      <li>Click on the Drive with your name (your h:)</li>
      <li>Right click on the webpages folder (directory)</li>
      <li>Select &quot;Add to webpages.zip&quot;</li>
      <li>Click on &quot;I Accept&quot;</li>
      <li>This will create a compressed folder of your pages called webpages.zip</li>
      <li>Upload that when you submit your assignment.</li>
    </ul>
  </li>
</ul>

<p>&nbsp;</p>

</body>
<?php
ini_set('include_path', '/home/kathweav/public_html/class');
include 'footer.php';
?>