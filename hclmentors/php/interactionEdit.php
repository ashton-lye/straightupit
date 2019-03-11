
<?php
include 'header.php';
include 'navbar.php';

if(isset($_GET['sessionID']) && $_GET['sessionID']!='')
    {
        $op_sql = "SELECT * FROM sessions where id=$_GET[sessionID]"; 
        $result = $con->query($op_sql); 
        if ($result->rowCount() > 0) 
        {  
            $rows = $result->fetch();            
?>
        <table>
            <td><?php echo $rows['sessionID'];?></td>
        </table>
<!--
           <form action="interactionEdit.php" method="post"></form>
           <input type="text" name="Name" value="<?php $rows['client_name'] ?>" />
           
           
           <input type="hidden" name="id" value="$_GET['id']" />
           
           
           <input type="submit" name="update" value="update" /> -->

<?php
        }
        
    }    
    include 'footer.php'
?>
