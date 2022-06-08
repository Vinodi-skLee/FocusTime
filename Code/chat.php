<?php
	include 'connection.php';
	$query = "SELECT * FROM chat ORDER BY id DESC";
	$run = $con -> query($query);
	while ($row = $run->fetch_array()) :
?>
<div id="message">
		<img class="message-avatar" src="https://static.vecteezy.com/system/resources/previews/000/550/731/original/user-icon-vector.jpg" alt="" style="width: 50px">
		<a class="message-author" href="#"> <?php echo $row['name'];?> </a> 
		<span class="message-date"> <?php echo formatDate($row['date']);?> </span></br>
		<span class="message-content"> <?php echo $row['message'];?> </span>
</div>
<?php endwhile; ?>