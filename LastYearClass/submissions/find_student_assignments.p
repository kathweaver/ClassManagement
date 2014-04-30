<form name="form1" method="post" action="">
  <p align="center">Find Student Assignments</p>
  <p>First Name: 
    <input type="text" name="textfield">
  </p>
  <p>Last Name: 
    <input type="text" name="textfield2">
  </p>
  <p>
    <input type="submit" name="Submit" value="Submit">
  </p>
</form>
<?
SESSION_START();
ini_set('include_path', '/home/kathweav/public_html/class');
include 'sessionchecker.php';
session_checker();
include 'db.php';
?>


<?
include 'footer.php';
?>