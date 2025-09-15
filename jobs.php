<?php include 'db.php'; ?>
<!doctype html><html lang="en"><head><meta charset="utf-8"/><meta name="viewport" content="width=device-width,initial-scale=1"/><title>Jobs - QuickJobs (Dynamic)</title><link rel="stylesheet" href="style.css"></head><body>
<header id="main-header"><h1>QuickJobs (Dynamic Jobs)</h1><nav><a href="index.html">Home</a><a href="jobs.php">Jobs (dynamic)</a></nav></header>
<main><h2>Available Jobs (from DB)</h2>
<table><thead><tr><th>Company</th><th>Role</th><th>Location</th><th>Salary</th><th>Type</th></tr></thead><tbody>
<?php
$sql = 'SELECT * FROM jobs';
$res = $conn->query($sql);
if($res && $res->num_rows>0){
  while($row = $res->fetch_assoc()){
    echo '<tr><td>'.htmlspecialchars($row['company']).'</td><td>'.htmlspecialchars($row['title']).'</td><td>'.htmlspecialchars($row['location']).'</td><td>'.htmlspecialchars($row['salary']).'</td><td>'.htmlspecialchars($row['type']).'</td></tr>';
  }
} else {
  echo '<tr><td colspan="5">No jobs found. Please import <code>database.sql</code> or use the static jobs.html file.</td></tr>';
}
?>
</tbody></table></main><footer><p>&copy; 2025 QuickJobs</p></footer></body></html>