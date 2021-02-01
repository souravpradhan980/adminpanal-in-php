<?php
include "connect.php";
if($con)
{
    if($_SERVER['REQUEST_METHOD']=='POST')
{
    $sql="select * from class1";
    $result=mysqli_query($con,$sql);
    $rows=mysqli_num_rows($result);
    if($result)
    {
        for($i=1;$i<=$rows;$i++)
        {
                $data=mysqli_fetch_array($result);
        
            ?>
                <tr>
                    <td><?php echo "$data[0]"; ?></td>
                    <td><?php echo "$data[1]"; ?></td>
                    <td><?php echo "$data[2]"; ?></td>
                    <td><?php echo "$data[3]"; ?></td>
                    <td><?php echo "$data[4]"; ?></td>
                    <td><?php echo "$data[5]"; ?></td>
                    <td><input type="checkbox" value="<?php echo "$data[0]";  ?>" name="<?php echo "c".$i;?>" id="<?php echo "c".$i;?>"></td>  
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