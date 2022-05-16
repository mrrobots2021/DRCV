<?php include 'head.php'; ?>
<title>Past Events</title>
<link href="CSS/past-events.css" rel="stylesheet"/>
<?php include 'header.php'; ?>

<div class="events">
<?php
include "sql_conn.php"; // Using database connection file here 
$query = "SELECT event_name, event_date, event_overview,event_lessons FROM events";
$records = mysqli_query($dbc,$query); // fetch data from database 

while($row = mysqli_fetch_array($records)) 
{ 
?> 
<div class="event-container">
<div class="card overview">
<h2><b><i class="bi bi-card-checklist" aria-label="checklist"></i> Overview || <i><?php echo $row['event_name']; ?></i></b></h2>  
<h3 class="subtitle">Fall/Spring Seminar <?php echo $row['event_date']; ?></h3>
<hr/>
<?php echo $row['event_overview']; ?>
</div>
<div class="card lessons">
<h2>
<b><i class="bi bi-journal-bookmark-fill" aria-label="journal"></i>Lessons Learned</b>
</h2>
<hr/>
<ul>
<?php echo $row['event_lessons']; ?>
</ul>
</div>
</div>
<?php 
} 
?> 
</div> 

<?php mysqli_close($dbc); // Close connection ?> 

<?php 
include 'footer.php';?>


