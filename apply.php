<!doctype html><html lang="en"><head><meta charset="utf-8"/><meta name="viewport" content="width=device-width,initial-scale=1"/><title>Apply - QuickJobs (Dynamic)</title><link rel="stylesheet" href="style.css"></head><body>
<header id="main-header"><h1>Apply (Dynamic)</h1><nav><a href="index.php">Home</a><a href="apply.php">Apply (dynamic)</a></nav></header>
<main><h2>Application Form (DB)</h2>
<form action="submit.php" method="post" enctype="multipart/form-data">
  <label>Name:</label><input type="text" name="name" required><br>
  <label>Email:</label><input type="email" name="email" required><br>
  <label>Role:</label><select name="role_applied"><option>Data Analyst</option><option>Frontend Developer</option><option>ML Intern</option></select><br>
  <label>Experience:</label><input type="number" name="experience" min="0" value="0"><br>
  <label>Skills (comma separated):</label><input type="text" name="skills"><br>
  <label>Resume:</label><input type="file" name="resume" accept=".pdf,.txt"><br>
  <label>Cover Note:</label><textarea name="cover_note"></textarea><br>
  <button type="submit">Submit Application (DB)</button>
</form></main><footer><p>&copy; 2025 QuickJobs</p></footer></body></html>