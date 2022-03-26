# Application for the teacher to assign students to groups for the project using Laravel framework.

<h2>Used Technologies</h2>
- PHP 8.1.2 <br>
- Laravel Framework 9.4.1 <br>
- MySQL RDBMS <br>
- Faker - PHP library that generates fake or dummy data for application

<h2>Instructions for setting up a Laravel project from Github.com</h2>
URL: https://stackoverflow.com/questions/38602321/cloning-laravel-project-from-github

<h2>Hosted application</h2>
The app has been uploaded to the free hosting service Heroku <br>
URL: http://projects-for-students.herokuapp.com/

<h2>Initial database schema</h2>
The SQL file to create the initial schema for the database <br>
is located at the following project path: <br>
students-by-groups/database/initial/students_by_groups.sql

<h2>Solution and technical decisions</h2>
1. Migration files and models for the tables have been created: Student, Project and Group. <br>
And also the relationship of the tables: Project -> Group (1:M) and Group -> Student (1:M). <br><br>
2. The home page shows all created projects and you can create a new <br>
project or delete an existing one. The data entered are validated. <br><br>
3. When opening a project status page, the user sees a list of students and can create a new one or delete existing. <br><br>
4. The creation of a new user takes place on a separate page, where the value entered is checked for uniqueness. <br><br>
5. Next, on the same page, the user can add students to groups. <br>
The number of groups and the number of students in them is determined during project creation. <br>
Based on this data, the desired number of tables and possible values in them are generated. <br><br>
6. If the group overflows, the user sees a corresponding notification. <br>

<h2>Tests</h2>
A Feature test has been added for student removing from list.
    
<h2>REST API Endpoint</h2>
The REST API is implemented to add a new student. <br>
Create Student POST Endpoint: /students/store/
