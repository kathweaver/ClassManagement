<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
?>
<HTML>
<HEAD>
   <TITLE>WebQuest</TITLE>
<META NAME="keywords" CONTENT="WebQuest,Lesson Plan,Teacher Page"><META NAME="description" CONTENT="WebQuest: an inquiry-oriented learning environment that makes good use of the Web.">
<link href="../../site.css" rel="stylesheet" type="text/css">
</HEAD>
<BODY>
<CENTER>
  <TABLE BORDER=0 WIDTH=550>
    <TR> 
      <TD WIDTH=50> <P></P></TD>
      <TD> <CENTER>
          <FONT SIZE="+3" FACE="verdana,arial,helvetica"><B>Exploring the History 
          of Computer Programming Languages</B></FONT> <FONT SIZE="+4" FACE="verdana,arial,helvetica"><B><BR>
          </B></FONT><FONT SIZE="+2" FACE="verdana,arial,helvetica"><B><br>
          Teacher Page</B></FONT> 
          <P><FONT SIZE="-1" FACE="verdana,arial,helvetica"><strong>A WebQuest 
            for 9th-12th Grade Computer Science</strong></FONT></P>
          <P><FONT SIZE="-1" FACE="verdana,arial,helvetica">Designed by</FONT></P>
          <P><FONT SIZE="-1" FACE="verdana,arial,helvetica">Kathleen Weaver<BR>
            <a href="mailto:kw3922@dallasisd.org">kw3922@dallasisd.org</a></FONT></P>
          <P><img src="images/1history-med.jpg" width="300" height="224"></P>
          <P><A HREF="#Introduction"><FONT SIZE="-2" FACE="Helvetica">Introduction</FONT></A><FONT SIZE="-2" FACE="Helvetica"> 
            | </FONT><A HREF="#Learners"><FONT SIZE="-2" FACE="Helvetica">Learners</FONT></A><FONT SIZE="-2" FACE="Helvetica"> 
            | </FONT><A HREF="#Standards"><FONT SIZE="-2" FACE="Helvetica">Standards</FONT></A><FONT SIZE="-2" FACE="Helvetica"> 
            | </FONT><A HREF="#Process"><FONT SIZE="-2" FACE="Helvetica">Process</FONT></A><FONT SIZE="-2" FACE="Helvetica"> 
            | </FONT><A HREF="#Resources"><FONT SIZE="-2" FACE="Helvetica">Resources</FONT></A><FONT SIZE="-2" FACE="Helvetica"> 
            | </FONT><A HREF="#Evaluation"><FONT SIZE="-2" FACE="Helvetica">Evaluation</FONT></A><FONT SIZE="-2" FACE="Helvetica"> 
            | </FONT><A HREF="#Conclusion"><FONT SIZE="-2" FACE="Helvetica">Conclusion</FONT></A><FONT SIZE="-2" FACE="Helvetica"> 
            | </FONT><A HREF="#Credits"><FONT SIZE="-2" FACE="Helvetica">Credits</FONT></A><FONT SIZE="-2" FACE="Helvetica"> 
            | </FONT><A HREF="index.php"><FONT SIZE="-2" FACE="Helvetica">Student 
            Page</FONT></A><FONT SIZE="-2" FACE="Helvetica"><BR>
            </FONT></P>
          <P>&nbsp;</P>
        </CENTER>
        <P><FONT SIZE="+2" FACE="Helvetica"><B><A NAME=Introduction></A><BR>
          </B></FONT><FONT SIZE="+2" FACE="verdana,arial,helvetica"><B>Introduction</B></FONT></P>
        <P><FONT FACE="verdana,arial,helvetica">The creation of this lesson was 
          the result of two different needs. I was assigned to write curriculum 
          by my school district (Dallas ISD). I was also assigned, as extra credit, 
          during the same summer, to write a web quest for <a href="http://notes1.nms.unt.edu/testsyllabi.nsf/d260927bf6b48b65862566a20031196e/b904d5607c4d863c862564d900818508?OpenDocument">CECS 
          5030 </a>while working on a <a href="http://www.cecs.unt.edu/tech_app_cert_prog.jsp">Technology 
          Applications Certification</a> at <a href="http://www.unt.edu">UNT</a>.</FONT></P>
        <P><FONT FACE="verdana,arial,helvetica">This Web Quest is designed to 
          facilitate researching about computer programming languages. I like 
          to use Web Quests for Computer Science research projects because they 
          build a structure. Web Quests guide the student towards discovering 
          information for themselves rather than being teacher driven.<br>
          </FONT><font size="+1"><a name=Learners></a><br>
          </font><font size="+2" face="verdana,arial,helvetica"><b>Learners</b></font></P>
        <P><FONT FACE="verdana,arial,helvetica">I have designed this web quest 
          for Dallas ISD Pre-AP Computer Science students. These students are 
          typically 9-11 grade students, though we do get a few seniors. These 
          students should be talented and gifted, should be independent, and should 
          be able to handle doing a research project without a lot of teacher 
          intervention. If the student does not fall within this criteria, the 
          teacher, parent, and counselors should look into moving the student 
          into regular Computer Science. <br>
          </FONT></P>
        <p><font face="verdana,arial,helvetica">Students should have taken computer 
          literacy in middle school, and should have basic word processing skills. 
          In addition, students should have basic searching skills. They may need 
          some additional assistance with both, with I&nbsp;suggest during tutoring 
          time (which is mandatory for this program in my district), rather than 
          using class time. If the majority of the class is missing the skill 
          -- which should be determined during the review and audit of the assignment, 
          then it should included in the Web Quest.</font></p>
        <p><FONT SIZE="+1"><A NAME=Standards></A></FONT></p>
        <P><FONT SIZE="+2" FACE="verdana,arial,helvetica"><B>Curriculum Standards</B></FONT></P>
        <P><a href="http://www.tea.state.tx.us/teks/126-021n.htm#126.22">From 
          the Texas TEKS for Computer Science I</a></P>
        <P>(c) Knowledge and skills.</P>
        <blockquote> 
          <p> (1) Foundations. The student demonstrates knowledge and<br>
            appropriate use of hardware components, software<br>
            programs, and their connections. The student is<br>
            expected to:</p>
          <blockquote> 
            <p> (E) differentiate current programming languages,<br>
              discuss the use of the languages in other<br>
              fields of study, and demonstrate knowledge of<br>
              specific programming terminology and concepts;<br>
              <br>
              (F) differentiate among the levels of programming<br>
              languages including machine, assembly, high-<br>
              level compiled and interpreted languages; and<br>
            </p>
          </blockquote>
          <p> (4) Information acquisition. The student uses a variety<br>
            of strategies to acquire information from<br>
            electronic resources, with appropriate supervision.<br>
            The student is expected to:</p>
          <blockquote> 
            <p>(A) use local area networks (LANs) and wide area<br>
              networks (WANs), including the Internet and<br>
              intranet, in research and resource sharing;<br>
              and<br>
              <br>
              (B) construct appropriate electronic search<br>
              strategies in the acquisition of information<br>
              including keyword and Boolean search<br>
              strategies.<br>
            </p>
          </blockquote>
          <p> (8) Solving problems. The student uses research skills<br>
            and electronic communication, with appropriate<br>
            supervision, to create new knowledge. The student<br>
            is expected to:</p>
          <blockquote> 
            <p> (A) participate with electronic communities as a<br>
              learner, initiator, contributor, and<br>
              teacher/mentor;<br>
              <br>
              (B) demonstrate proficiency in, appropriate use<br>
              of, and navigation of LANs and WANs for<br>
              research and for sharing of resources;<br>
              <br>
              (C) extend the learning environment beyond the<br>
              school walls with digital products created to<br>
              increase teaching and learning in the<br>
              foundation and enrichment curricula; and<br>
              <br>
              (D) participate in relevant, meaningful activities<br>
              in the larger community and society to create<br>
              electronic projects. <br>
            </p>
          </blockquote>
          <p> (11)Communication. The student delivers the product<br>
            electronically in a variety of media, with<br>
            appropriate supervision. The student is expected<br>
            to:</p>
          <blockquote> 
            <p> (A) publish information in a variety of ways<br>
              including, but not limited to, printed copy<br>
              and monitor displays; and<br>
              <br>
              (B) publish information in a variety of ways<br>
              including, but not limited to, software, Internet documents, and 
              video.<br>
            </p>
          </blockquote>
        </blockquote>
        <P>With some modification, more of the requirements could be satisfied. 
          However, I have other webquests planned to satisfy those requirements.</P>
        <P><FONT SIZE="+1"><A NAME=Process></A><BR>
          </FONT><FONT SIZE="+2" FACE="verdana,arial,helvetica"><B>Process</B></FONT></P>
        <P><FONT FACE="verdana,arial,helvetica">See <a href="index.php#Process">Process</a> 
          on the Student page.</FONT></P>
        <P><font face="verdana,arial,helvetica">Since this project is assigned 
          the first six weeks, I actually allow for four weeks for the assignment. 
          This gives me two weeks for grading, and allows me to introduce the 
          next six week assignment and get the students started on it during the 
          end of the last six weeks. This also gives time if additional skills 
          need to be taught during class time.</font></P>
        <P><FONT FACE="verdana,arial,helvetica">I do this as an individual assignment, 
          but it could easily be done as a group assignment. I would provide more 
          structure to the assignment, and assign individual parts.</FONT></P>
        <P><FONT FACE="verdana,arial,helvetica">Any teacher familiar with the 
          internet should be able to conduct this assignment.</FONT></P>
        <P><FONT FACE="verdana,arial,helvetica"><B>Variations</B></FONT></P>
        <P><font face="verdana,arial,helvetica">If the students are familiar with 
          Inspiration, I would have them use Inspiration to organize the programming 
          languages rather than using a list. I am planning to use the list to 
          introduce Inspiration.</font></P>
        <P><FONT SIZE="+1"><A NAME=Resources></A><BR>
          </FONT><FONT SIZE="+2" FACE="verdana,arial,helvetica"><B>Resources Needed</B></FONT></P>
        <P>&nbsp; </P>
        <UL>
          <LI><FONT FACE="verdana,arial,helvetica">Computer with internet connection 
            (can be assigned for at at-home or at-library assignment if not available 
            in the classroom).</FONT></LI>
          <LI><FONT FACE="verdana,arial,helvetica">Word processing software</FONT></LI>
          <LI><FONT FACE="verdana,arial,helvetica">Textbook with information on 
            computer languages</FONT></LI>
        </UL>
        <P><font face="verdana,arial,helvetica">This assignment can be accomplished 
          entirely in the classroom with one teacher provided the above needs 
          are met. If not, it can be assigned as an at-home or library project 
          if resources are available there.</font><FONT SIZE="+1"><A NAME=Evaluation></A><BR>
          </FONT></P>
        <p><FONT SIZE="+2" FACE="verdana,arial,helvetica"><B>Evaluation</B></FONT></p> 
        <P><FONT FACE="verdana,arial,helvetica">If you and your students are successful 
          with this assignment you should know more about each individual student, 
          especially as to how well they work independently and how much assistance 
          they want and desire.</FONT></P>
        <P><font face="verdana,arial,helvetica">I am setting some criteria in 
          advance, but plan for additional criteria to be determined by the class 
          when the Web Quest is designed. Much of the documentation I've read 
          about rubrics indicate that they are more powerful if they are set by 
          the students. </font></P>
        <TABLE BORDER=1 WIDTH=475>
          <TR> 
            <TH VALIGN=top WIDTH=120 HEIGHT=2> <P></P></TH>
            <TH VALIGN=top WIDTH=80 HEIGHT=2 BGCOLOR="#FF9999"> <P><FONT SIZE="-1" FACE="verdana,arial,helvetica">Beginning</FONT></P>
              <P><FONT SIZE="-1" FACE="verdana,arial,helvetica">1</FONT></P></TH>
            <TH VALIGN=top WIDTH=80 HEIGHT=2 BGCOLOR="#FFCC99"> <P><FONT SIZE="-1" FACE="verdana,arial,helvetica">Developing</FONT></P>
              <P><FONT SIZE="-1" FACE="verdana,arial,helvetica">2</FONT></P></TH>
            <TH VALIGN=top WIDTH=80 HEIGHT=2 BGCOLOR="#FFFFCC"> <P><FONT SIZE="-1" FACE="verdana,arial,helvetica">Accomplished</FONT></P>
              <P><FONT SIZE="-1" FACE="verdana,arial,helvetica">3</FONT></P></TH>
            <TH VALIGN=top WIDTH=80 HEIGHT=2 BGCOLOR="#CCFFCC"> <P><FONT SIZE="-1" FACE="verdana,arial,helvetica">Exemplary</FONT></P>
              <P><FONT SIZE="-1" FACE="verdana,arial,helvetica">4</FONT></P></TH>
            <TH VALIGN=top WIDTH=40 HEIGHT=2> <P><FONT SIZE="-1" FACE="verdana,arial,helvetica">Score</FONT></P></TH>
          </TR>
          <TR> 
            <TD VALIGN=top WIDTH=120 HEIGHT=3 BGCOLOR="#CCCCCC"> <P><FONT SIZE="-1" FACE="verdana,arial,helvetica">&nbsp;</FONT></P>
              <CENTER>
                <FONT SIZE="-1" FACE="verdana,arial,helvetica"><b>Number of Questions 
                Answered </b></FONT> 
              </CENTER>
              <P><FONT SIZE="-1" FACE="verdana,arial,helvetica">&nbsp;</FONT></P></TD>
            <TD WIDTH=80 HEIGHT=3 align="left" valign="top"> <CENTER>
                <p><font size="-1" face="verdana,arial,helvetica"><b>0 points</b></font></p>
                <p><FONT SIZE="-1" FACE="verdana,arial,helvetica"><b>Only one 
                  question answered: </b>What is<b> </b>a computer language and 
                  why should you know one? </FONT> </p>
              </CENTER></TD>
            <TD WIDTH=80 HEIGHT=3 align="left" valign="top"> <CENTER>
                <p><font size="-1" face="verdana,arial,helvetica"><b>1 point</b></font></p>
                <p><FONT SIZE="-1" FACE="verdana,arial,helvetica"><b>Two or more 
                  addition questions answered.</b></FONT> </p>
              </CENTER></TD>
            <TD WIDTH=80 HEIGHT=3 align="left" valign="top"> <CENTER>
                <p><FONT SIZE="-1" FACE="verdana,arial,helvetica"><b>2 points</b></FONT></p>
                <p><FONT SIZE="-1" FACE="verdana,arial,helvetica"><b>Four or more 
                  addition questions answered.</b></FONT> </p>
              </CENTER></TD>
            <TD WIDTH=80 HEIGHT=3 align="left" valign="top"> <CENTER>
                <p><FONT SIZE="-1" FACE="verdana,arial,helvetica"><b>3 points</b></FONT></p>
                <p><FONT SIZE="-1" FACE="verdana,arial,helvetica"><b>More than 
                  six questions answered about computer languages.</b></FONT> 
                </p>
              </CENTER></TD>
            <TD WIDTH=40 HEIGHT=3> <CENTER>
                <FONT SIZE="-1" FACE="verdana,arial,helvetica"><BR>
                </FONT></CENTER></TD>
          </TR>
          <TR> 
            <TD VALIGN=top WIDTH=120 HEIGHT=3 BGCOLOR="#CCCCCC"> <P><FONT SIZE="-1" FACE="verdana,arial,helvetica">&nbsp;</FONT></P>
              <CENTER>
                <font size="-1" face="verdana,arial,helvetica"><strong>Writing 
                style in written documents</strong> </font>
              </CENTER>
              <P><FONT SIZE="-1" FACE="verdana,arial,helvetica">&nbsp;</FONT></P>
              <P><FONT SIZE="-1" FACE="verdana,arial,helvetica">&nbsp;</FONT></P></TD>
            <TD WIDTH=80 HEIGHT=3 valign="top"> <CENTER>
                <p><font size="-1" face="verdana,arial,helvetica">0 points</font></p>
                <p><font size="-1" face="verdana,arial,helvetica"> Difficult to 
                  understand, sentence fragments, bad structure, spelling, and 
                  other errors. </font></p>
              </CENTER></TD>
            <TD WIDTH=80 HEIGHT=3 valign="top"> <CENTER>
                <p><font size="-1" face="verdana,arial,helvetica">1 point</font></p>
                <p><font size="-1" face="verdana,arial,helvetica">Many errors 
                  but consistent line of thought </font> </p>
              </CENTER></TD>
            <TD WIDTH=80 HEIGHT=3 valign="top"> <CENTER>
                <p><font size="-1" face="verdana,arial,helvetica">2 points</font></p>
                <p><font size="-1" face="verdana,arial,helvetica">Easy to understand; 
                  perfect spelling; one or two grammar, syntax, or semantic problems 
                  </font></p>
              </CENTER></TD>
            <TD WIDTH=80 HEIGHT=3 valign="top"> <CENTER>
                <p><font size="-1" face="verdana,arial,helvetica">3 points</font></p>
                <p><font size="-1" face="verdana,arial,helvetica">Clear, concise, 
                  well-written content</font> </p>
              </CENTER></TD>
            <TD WIDTH=40 HEIGHT=3> <CENTER>
                <FONT SIZE="-1" FACE="verdana,arial,helvetica"><BR>
                </FONT></CENTER></TD>
          </TR>
          <TR> 
            <TD VALIGN=top WIDTH=120 HEIGHT=3 BGCOLOR="#CCCCCC"> <P><FONT SIZE="-1" FACE="verdana,arial,helvetica">&nbsp;</FONT></P>
              <CENTER>
                <FONT SIZE="-1" FACE="verdana,arial,helvetica"><b>List of Languages</b></FONT> 
              </CENTER>
              <P><FONT SIZE="-1" FACE="verdana,arial,helvetica">&nbsp;</FONT></P>
              <P><FONT SIZE="-1" FACE="verdana,arial,helvetica">&nbsp;</FONT></P></TD>
            <TD WIDTH=80 HEIGHT=3 valign="top"> <CENTER>
                <p><font size="-1" face="verdana,arial,helvetica">0 points</font></p>
                <p><font size="-1" face="verdana,arial,helvetica">Less than 4 
                  languages listed by level or less than 5 languages listed without 
                  organization. </font></p>
              </CENTER></TD>
            <TD WIDTH=80 HEIGHT=3 valign="top"> <CENTER>
                <p><font size="-1" face="verdana,arial,helvetica">2 points</font></p>
                <p><font size="-1" face="verdana,arial,helvetica">Less than 8 
                  languages listed by level or less than 10 languages listed without 
                  organization. </font></p>
              </CENTER></TD>
            <TD WIDTH=80 HEIGHT=3 valign="top"> <CENTER>
                <p><font size="-1" face="verdana,arial,helvetica">4 points</font></p>
                <p><font size="-1" face="verdana,arial,helvetica">Less than 16 
                  languages organized by level and type.</font></p>
              </CENTER></TD>
            <TD WIDTH=80 HEIGHT=3 valign="top"> <CENTER>
                <p><font size="-1" face="verdana,arial,helvetica">6 points</font></p>
                <p><font size="-1" face="verdana,arial,helvetica">A comprehensive 
                  list of languages organized by level and type.</font></p>
              </CENTER></TD>
            <TD WIDTH=40 HEIGHT=3> <CENTER>
                <FONT SIZE="-1" FACE="verdana,arial,helvetica"><BR>
                </FONT></CENTER></TD>
          </TR>
        </TABLE>
        <p>&nbsp;</p>
        <P><FONT SIZE="+1"><A NAME=Conclusion></A><BR>
          </FONT><FONT SIZE="+2" FACE="verdana,arial,helvetica"><B>Conclusion</B></FONT></P>
        <P><FONT FACE="verdana,arial,helvetica">I like to assign a six week's 
          written project to my students each six weeks because it satisfies most 
          of the requirements for writing without getting in the way of daily 
          projects. My six weeks projects give students something to do when they 
          do finish their daily projects before others do. Since we are going 
          back to a regular schedule, I plan that a portion of each assignment 
          will be due during six weeks in order to provide more structure. I also 
          plan that most Fridays will be a &quot;catsup and mustard&quot; day. 
          Catsup and mustard = Catch up the must do's, giving students some time 
          to work on the assignment during class. Making the assignment due the 
          next Monday will allow them to finish their project over the weekend.</FONT></P>
        <P><FONT FACE="verdana,arial,helvetica"><A NAME=Credits></A><BR>
          </FONT><FONT SIZE="+2" FACE="verdana,arial,helvetica"><B>Credits &amp; 
          References</B></FONT></P>
        <P><FONT FACE="verdana,arial,helvetica"><a href="http://school.discovery.com/schrockguide/">Rubric 
          assistance: Kathy Schrock's Guide for Educators</a><br>
          <a href="http://webquest.sdsu.edu/">Web Quest Design and Template</a></FONT></P>
        <P><FONT FACE="verdana,arial,helvetica">The images I used was obtained 
          from <a href="http://www.clipartconnection.com/clipartconnection.com/index.php">http://www.clipartconnection.com/clipartconnection.com/index.php</a></FONT></P>
        <P><font face="verdana,arial,helvetica"><a href="Citing%20Internet%20Resources%20(APA)">Citing 
          Internet Resources (APA)</a></font><FONT SIZE="+1"> </FONT></P>
        <CENTER>
          <FONT SIZE="+1"> 
          <HR>
          </FONT><FONT SIZE="-2" FACE="verdana,arial,helvetica">Last updated on 
          July 6, 2003 </FONT><FONT SIZE="-2">. </FONT><FONT SIZE="-2" FACE="verdana,arial,helvetica">Based 
          on a template from </FONT><A HREF="http://edweb.sdsu.edu/webquest/webquest.html"><FONT SIZE="-2" FACE="verdana,arial,helvetica">The 
          WebQuest Page</FONT></A> </CENTER></TD>
    </TR>
    <TR>
      <TD>&nbsp;</TD>
      <TD>&nbsp;</TD>
    </TR>
  </TABLE>

<P></P></CENTER>
</BODY>
</HTML>
