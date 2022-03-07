# Welcome to Cloudr Admin Panel!
This is a admin panel with many features, such as a surveys system, a calendar, and also a reservation system! This system is in beta, so you can experience some bugs! Contact me if you have any questions!

# Where to edit?
| Database for polls. (Will be one file when second release)
  - /polls/functions.php

| Database for authentication. (Will be one file when second release)
  - /auth/events/db_connect.php

| Email to send surveys to.
  - /surveys/survey.php

| Logo
  - /assets/images/logo.svg
  - /assets/images/logo-mini.svg

| CSS
  - /assets/css/

| Email Template surveys
  - /surveys/email-template.php

# How to use the calendar? (/calendar/)
| Include the class into your project and create a new instance.
  ```php
  include 'Calendar.php';
  $calendar = new Calendar();
  ```

| We can specify a date while creating a new instance:
  ```php
  include 'Calendar.php';
  $calendar = new Calendar('2021-02-26');
  ```

| Add new events to the calendar:
  ```php
  $calendar->add_event('Holiday', '2021-02-14');
  ```

| We can specify the number of days the event should last by binding an additional value to the add_event method:
  ```php
  $calendar->add_event('Holiday', '2021-02-14', 7); // Event will last for 7 days
  ```

| We can also change the color:
  ```php
  $calendar->add_event('Holiday', '2021-02-14', 7, 'red');
  ```

| We can populate the calendar in HTML format with the following code:
  ```php
  echo $calendar;
  ```

# ToS
 - You may not claim this as you're own project!
 - Don't repost or resell it!

