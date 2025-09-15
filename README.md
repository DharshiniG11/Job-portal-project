# QuickJobs 

This repository contains a combined version of the QuickJobs project:
- Static HTML/CSS/JS pages for easy viewing on GitHub.
- PHP scripts demonstrating GET/POST and CSV saving (process.php).
- Database-driven PHP pages (jobs.php, apply.php, submit.php) using MySQL.
- `database.sql` to create the `quickjobs` database and sample data.
- `uploads/` folder for storing uploaded resumes.

## to run the php file:
1. Extract the ZIP into `htdocs` (XAMPP) or your server folder.
2. Import `database.sql` using phpMyAdmin or `mysql` CLI to create the database and tables.
3. Start Apache & MySQL (XAMPP control panel).
4. Open `http://localhost/QuickJobs_Combined/index.html` for static preview.
5. Open `http://localhost/QuickJobs_Combined/jobs.php` to see dynamic jobs (requires DB).
6. Use `apply.php` to submit an application to the database (stores files in `uploads/`).

