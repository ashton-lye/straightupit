<!--Mentor interaction page Johnny to complete-->
<?php
require_once('connect.php');
include 'header.php';
include 'navbar.php';
?>

<div class="statistics">
<link rel="stylesheet" type="text/css" href="../css/interaction.css"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>  
<body>

<?php
  include_once('connect.php');
  $query="select * from sessions;";
  $result= $con->query($query);
?>

<h1>
Mentor Interactions
</h1>
<br>

<table id="sessTable" class="table table-hover table-bordered" >
  <tr>
    <th >ID</th>
    <th>Client Name</th>
    <th>Problem Description</th>
    <th>Platform</th>
    <th>Date</th>
    <th>Time</th>
    <th>Mentor</th>
    <th>Library</th>
    <th>Client Phone Number</th>
    <th>Client No Show?</th>
    <th>Notes</th>
  </tr>

  <?php while($rows=$result->fetch()) {
  ?>
    <tr onclick="Javascript:rowID()" <?php echo "id=".$rows['sessionID']."" ?> >
            <?php echo "<td><a href='interactionEdit.php?id=".$rows['sessionID']."'>Edit</a></td>";
            ?>
            <td><?php echo $rows['client_name'];?></td>
            <td><?php echo $rows['problem'];?></td>
            <td><?php echo $rows['platform'];?></td>
            <td><?php echo $rows['date'];?></td>
            <td><?php echo $rows['time'];?></td>
            <td><?php echo $rows['mentor'];?></td>
            <td><?php echo $rows['library'];?></td>
            <td><?php echo $rows['client_phone'];?></td>
            <td><?php echo $rows['noshow'];?></td>
            <td><?php echo $rows['notes'];?></td>
          </tr>
  <?php
  }
  ?>
   <input type="button" id="tst" value="Update" onclick="Javascript:rowID()" />   
</table>

<textarea label="Session Notes:" rows="4" cols="50">
Notes
</textarea>

<script src="../js/scripts.js"></script>
<script src="../js/interactionscript.js"></script>

<?php
include 'footer.php'
?>