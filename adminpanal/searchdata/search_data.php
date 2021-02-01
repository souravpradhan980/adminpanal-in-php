<?php

include "connect.php";
if($con)
{
    if($_SERVER['REQUEST_METHOD']=='POST')
{
    $name=$_POST['search2'];

    if(ctype_digit($name))
    {
        $sql="select * from class1 where ID=$name";
        $result=mysqli_query($con,$sql);
    }
    else
    {

        $sql="select * from class1 where (name LIKE '%$name%')";
        $result=mysqli_query($con,$sql);
    }

    $rows=mysqli_num_rows($result);
    if($result)
    {
        for($i=1;$i<=$rows;$i++)
        {
                $data=mysqli_fetch_array($result);

            ?>
            <tr>
                <td><?php echo "$data[0]"; ?><input type="hidden" name="id<?php echo $i; ?>" id="id_no" value="<?php echo "$data[0]"; ?>"></td>
                <td><input type="text" name="name<?php echo $i; ?>" id="name<?php echo $i ?>" value="<?php echo "$data[1]"; ?>"  ></td>
                <td><input type="text" name="sex<?php echo $i; ?>" id="sex<?php echo $i ?>" value="<?php echo "$data[2]"; ?>"></td>
                <td><input type="text" name="address<?php echo $i; ?>" id="address" value="<?php echo "$data[3]"; ?>" ></td>
                <td><input type="text" name="contact<?php echo $i; ?>" id="contact" value="<?php echo "$data[4]"; ?>" ></td>
                <td><input type="text" name="email<?php echo $i; ?>" id="email" value="<?php echo "$data[5]"; ?>" ></td>
         
                
                
            </tr>
            <?php
        }
    }
}
}
else
{
    echo "data not connected";
}



?>