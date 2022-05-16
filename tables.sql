drop table event_overview;
DROP table event_lesson;
drop table past_events;

create table events(
	event_id int AUTO_INCREMENT not null,
    event_name varchar(250) not null,
    event_date date,
    event_overview text,
    event_lessons text,
    PRIMARY key (event_id)
);