<?php
include "connect.php";
   if($_SERVER["REQUEST_METHOD"]=="POST")
   {
       $result=0;
        
        $size=count($_POST);
        $rows=ceil($size/6);
        $x=1;
        
        for($i=1;$i<=$rows;$i++)
        {
            $index0="id".$i;
            $index1="name".$i;
            $index2="sex".$i;
            $index3="address".$i;
            $index4="contact".$i;
            $index5="email".$i;

            $id[$i]=$_POST["$index0"];
            $name[$i]=$_POST["$index1"];
            $sex[$i]=$_POST["$index2"];
            $address[$i]=$_POST["$index3"];
            $contact[$i]=$_POST["$index4"];
            $email[$i]=$_POST["$index4"];
        }

        for($i=1;$i<=$rows;$i++)
        {
            $query="update class1 set name='$name[$i]',sex='$sex[$i]',address='$address[$i]',contact='$contact[$i]',email='$email[$i]'
             where id='$id[$i]'";
             $result=mysqli_query($con,$query);
        }
       if($result)
       {
           echo "Updated Successfully";
       }
       else{
        echo "Updated failed";
       }

   }

?>