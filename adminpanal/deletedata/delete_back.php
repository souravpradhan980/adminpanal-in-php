<?php
include "connect.php";
   if($_SERVER["REQUEST_METHOD"]=="POST")
   {
       $result=0;
        
        $size=sizeof($_POST);
        $x=1;
        foreach($_POST as $key => $value)
        {

            if($x<=$size)
            {
                $query="delete from class1 where ID = $value";
                $result=mysqli_query($con,$query);
            }
            $x++;
        }
       if($result)
       {
           echo "Record Deleted";
       }
       else{
        echo "No record deleted";
       }

   }

?>