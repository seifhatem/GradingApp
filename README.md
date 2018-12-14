# GradingApp
This is a PHP website script for a university grading system with different roles (student, TA & lecturer)

It's aim is to show how different security principles are implemented:
_Authentication:_ Login & registration for the users
_Encryption/Hashing:_ Passwords are MD5 hashed during registration and logins
_Access Control:_ each of the student, TA or lecturer have specific roles show in the table below
_Tokens:_ With successful logins a token is generated and saved in the DB and used for user identification for ll functionalities. logout script deletes the token from the DB

# Setting it up
edit the config.php file and add your DB credentials
run setup.php and it will drop old tables if existing and create the required tables
_NOTE:_ setup script will rename itself to prevent dropping a working table

# Access Roles
Type | View Own| View Others | Edit | Add
--- | --- | --- | --- | ---
Student | Yes | No | No | No
TA | N/A | Yes | No | No
Lecturer | N/A | Yes | Yes | Yes
