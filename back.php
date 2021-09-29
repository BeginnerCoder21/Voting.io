<?php
$name=$_POST["pname"];
if($name==" " || $name=="")
{
  echo "<script>alert('Please enter name !!')</script>";
  readfile('Vote2.html');
}
else
{
     $t=array('1','2','3','4','5','6');
     $t1=array('1','2','3','4','5','6');
     $connection=mysqli_connect("localhost","root") or die("Couldn't connect to server");
     $db=mysqli_select_db($connection,"Participant_DB") or die("Couldn't select database");
     $query="SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME=N'Participant'";
     $result=mysqli_query($connection,$query) or die("Query failed : ".mysqli_error($connection));
     if($result==NULL){
       $query="CREATE TABLE Participant(Name varchar(20),Vote int)";
       $result=mysqli_query($connection,$query) or die("Query failed : ".mysqli_error($connection));
       $query="INSERT INTO Participant VALUES('Amaya',100000)";
       $result=mysqli_query($connection,$query) or die("Query failed : ".mysqli_error($connection));
       $query="INSERT INTO Participant VALUES('Aryan',100000)";
       $result=mysqli_query($connection,$query) or die("Query failed : ".mysqli_error($connection));
       $query="INSERT INTO Participant VALUES('Abha',100000)";
       $result=mysqli_query($connection,$query) or die("Query failed : ".mysqli_error($connection));
       $query="INSERT INTO Participant VALUES('Olivia',100000)";
       $result=mysqli_query($connection,$query) or die("Query failed : ".mysqli_error($connection));
       $query="INSERT INTO Participant VALUES('Ashvin',100000)";
       $result=mysqli_query($connection,$query) or die("Query failed : ".mysqli_error($connection));
       $query="INSERT INTO Participant VALUES('Arhan',100000)";
       $result=mysqli_query($connection,$query) or die("Query failed : ".mysqli_error($connection));
     }else{
       $query="SELECT * FROM Participant";
       $result=mysqli_query($connection,$query) or die("Query failed : ".mysqli_error($connection));
         $query="SELECT*FROM Participant";
         $result=mysqli_query($connection,$query) or die("Query failed : ".mysqli_error($connection));
         $k=0;
         while($row=mysqli_fetch_array($result))
         {
           $t[$k]=$row['Name'];
           $t1[$k]=$row['Vote'];
           $k=$k+1;
         }
         $query="SELECT * FROM Participant";
         $result=mysqli_query($connection,$query) or die("Query failed : ".mysqli_error($connection));
         for($s=0;$s<$k;$s++)
         {
           if($name == $t[$s])
           {
             $pvote= $t1[$s];
             $pvote= $pvote+1;
             $t1[$s]=$pvote;
             readfile('Vote2.html');
             echo "<script>
               var n;
               var p;
               var b=document.getElementById('vote1');
               var count=0;
               n=document.getElementById('pname').value;
               p=document.getElementById('par_name');
               p.innerHTML='$name';
               document.getElementById('p2').innerHTML=' ';
               document.getElementById('p3').innerHTML=' ';
               document.getElementById('p4').innerHTML=' ';
               document.getElementById('p5').innerHTML=' ';
               document.getElementById('p6').innerHTML=' ';
               b.style.visibility='visible';
               b.addEventListener('click',set);
               function set()
               {
                 count++;
                 if(count==1)
                 {
                   document.getElementById('ack').innerHTML='Thank you for Voting!!!';
                   document.getElementById('ackn').innerHTML='You have successfully voted for '+'$name';
                 }
                 else{
                   document.getElementById('ack').innerHTML=' ';
                   document.getElementById('ackn').innerHTML='You have already voted once';
                 }
               }
             </script>";

             $query="DROP TABLE Participant";
             $result=mysqli_query($connection,$query) or die("Query failed : ".mysqli_error($connection));
             $connection=mysqli_connect("localhost","root") or die("Couldn't connect to server");
             $db=mysqli_select_db($connection,"Participant_DB") or die("Couldn't select database");
             $query="SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME=N'Participant'";
             $result=mysqli_query($connection,$query) or die("Query failed : ".mysqli_error($connection));
             $query="CREATE TABLE Participant(Name varchar(20),Vote int)";
             $result=mysqli_query($connection,$query) or die("Query failed : ".mysqli_error($connection));
             for($q=0;$q<$k;$q++)
             {
               echo "<script type='text/javascript' src='open.js'></script>";
               $query="INSERT INTO Participant VALUES('$t[$q]',$t1[$q])";
               $result=mysqli_query($connection,$query) or die("Query failed : ".mysqli_error($connection));
             }
             $query="SELECT*FROM Participant";
             $result=mysqli_query($connection,$query) or die("Query failed : ".mysqli_error($connection));
           }
         }
         mysqli_close($connection);
     }
}
?>
