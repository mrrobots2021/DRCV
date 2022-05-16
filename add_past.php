<?php include 'head.php'; ?>
<title>Add Past Events</title>
<link href="CSS/add-events.css" rel="stylesheet"/>
<?php include 'header.php'; ?>

    <div class="add-event-container" addEventContainer>
      <h3 id="event-header">add new events </h3>
        <form id="event-form" action="add_past_event.php" method="POST">
            <input type="event_name" name="event_name" class="add-event-field" id = "event-name" placeholder="event name">
            <input type="event_date" name="event_date" class="add-event-field" id = "event-date" placeholder="event date (yyyy-mm-dd)">
            <textarea  name="event_overview" class="add-event-field" id = "event-overview" placeholder="overview">
<h4>⚠️Overview/summary⚠️</h4>
<h4>⚠️Each will be a new line⚠️</h4>
<ul>
  <li>⚠️Speaker/quick point⚠️<i>🚧speaker bio(optional)🚧</i></li>
  <li>⚠️Speaker/quick point⚠️<i>🚧speaker bio(optional)🚧</i></li>
  <li>⚠️Speaker/quick point⚠️<i>🚧speaker bio(optional)🚧</i></li>
</ul>
<h4>⚠️Summary/Info⚠️</h4>
</textarea>
            <textarea name="event_lesson" class="add-event-field" id = "event-lesson" placeholder="lesson">
<li><h4>⚠️ImportantLesson⚠️</h4></li>
<li><h4>⚠️ImportantLesson⚠️</h4></li>
<li><h4>⚠️ImportantLesson⚠️</h4></li>
<li><h4>⚠️ImportantLesson⚠️</h4></li>
            </textarea>
            <input type="submit" value="add event" id="add-event-submit">
            <a href="past-events.html" id="show-link">Check out the events</a>
        </form>
        </div>
    </div>

<?php include 'footer.php';?>
  