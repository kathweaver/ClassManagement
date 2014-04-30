<?
	echo "<P>";
	include "/home/kweavus/public_html/class/submissions/list_summary.php";
?>
<ul>
  <li>Schedule</li>
  <ul>
    <li><a href='/class/cal.php'>Daily Student Schedule</a></li>
	<LI><a href='/class/daily_subject.php'>Daily Schedule by Subject</a></LI>
	<li><a href='/class/weekly.php'>Weekly Student Schedule</a></li>
    <li><a href='/class/sixweeks.php'>Six Weeks Schedule</a></li>
	<LI><a href='/class/sixweeks_subject.php'>Six Weeks Schedule by Subject</a></LI>
     <li><a href='/class/Due/listdue.php'>Assignments to be Turned In</a></li>
  </ul>
   <li>Grading</li>
  <ul>
    <li><a href='/class/submissions/list_teacher_grade.php'>Grade 
      Assignments</a> 
    <li><a href='/class/submissions/list_teacher_record.php'>Record 
      Assignments</a> 
      <li><a href='/class/submissions/list_teacher_gradespeed.php'>Record 
      in Gradespeed</a> 
	  <li><a href='/class/submissions/list_teacher_record_last.php'>Record 
      Assignments By Last Name</a> 
    <li><a href='/class/submissions/list_teacher_done.php'>List Recorded 
      Assignments</a> 
    <li><a href='/class/submissions/list_old_recorded.php'>List 
      old Assignments</a> 
  </ul>
  <li>Assignments 
    <ul>
      <li><a href="/class/Assignments/add_assignment.html">Add 
        Assignment</a></li>
      <li><a href="/class/Assignments/assignment_index.php">Find 
        Assignment by Index</a></li>
      <li><a href="/class/Assignments/assignmentlist.php">List 
        Assignments</a></li>
      <li><a href="/class/Assignments/assignment_list_topics.php">List Topics 
        (and Assignments later)</a></li>
      <li><a href="/class/Assignments/assignment_by_topic.php">List Assignments 
        by Topic</a></li>
      <li><a href="/class/Assignments/find_assignment.php"> 
        Search Assignments</a></li>
      <li><a href="/class/Assignments/find_assignmass.php">Modify 
        Group of Assignments</a></li>
    </ul>
  </li>
  <li>Lessons</li>
  <ul>
    <li><a href='/class/Lessons/add_lesson.php'>Add Lesson</a></li>
    <li><a href="/class/Lessons/lessonlist.php">List All 
      Lessons</a></li>
    <li><a href='/class/Lessons/find_lesson.php'>Find A 
      Lesson</a></li>
    <li><a href='/class/Lessons/find_rangelesson.php'>Find 
      a Range of Lessons</a></li>
  </ul>
  </li>
  <li><a href='/class/Days/daylist.php'>Schedule Days</a></li>
 
  <li>Textbooks 
    <ul>
      <li><a href='/class/navigation/java_text.php'> PreAP 
        Textbook - Java Exposure</a> </li>
      <li><a href="/class/readfile.php?path=/textbooks/BPJ_TextBook_1_04.pdf">Blue-Pelican 
        Java</a></li>
      <li><a href='/class/readfile.php?path=/textbooks/JavaMBCS/Narrative/2002_mbs.pdf'>Marine 
        Biology Case Study </a> 
      <li><a href="/class/navigation/aplus1.php">APlus 1 Materials</a> 
    </ul>
  </li>
  <li><a href='/class/Projects/index.php'>Projects</a> </li>
  <li>Users 
    <ul>
      <li><a href='/class/user/userlist.php'>List and maintain 
        users</a></li>
      <li><a href='/class/email/index.php'>Email users</a></li>
    </ul>
  </li>
  <li>SixWeeks
  <UL>
	  <LI><a href='/class/sixweeks.php?SixWeeks=1'>First Six Weeks Schedule</a></LI>
	  <LI><a href='/class/sixweeks.php?SixWeeks=2'>Second Six Weeks Schedule</a></LI>
	  <LI><a href='/class/sixweeks.php?SixWeeks=3'>Third Six Weeks Schedule</a></LI>
	  <LI><a href='/class/sixweeks.php?SixWeeks=4'>Fourth Six Weeks Schedule</a></LI>
	  <LI><a href='/class/sixweeks.php?SixWeeks=5'>Fifth Six Weeks Schedule</a></LI>
	  <LI><a href='/class/sixweeks.php?SixWeeks=6'>Sixth Six Weeks Schedule</a></LI>
  </UL>
  </li>
  <li><a href='/class/user/change_info.php'>Change Information</a></li>
  <li><a href='/class/user/change_psw.html'>Change Password</a></li>
</ul>
