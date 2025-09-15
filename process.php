<?php
header('Content-Type: text/html; charset=utf-8');
function h($s){return htmlspecialchars($s,ENT_QUOTES);}
echo '<!doctype html><html><head><meta charset="utf-8"><title>Process</title><link rel="stylesheet" href="style.css"></head><body><h1>QuickJobs - Process</h1>';
if($_SERVER['REQUEST_METHOD']==='GET'){
  $q = isset($_GET['q']) ? trim($_GET['q']) : '';
  echo '<h2>GET Request</h2><p>Query: <strong>'.h($q).'</strong></p>';
  if(strlen($q)<1) echo '<p>Please provide a search query.</p>'; else { echo '<p>Simulated results for '.h($q).'</p><ul><li>Result 1</li><li>Result 2</li></ul>'; }
} elseif($_SERVER['REQUEST_METHOD']==='POST'){
  echo '<h2>POST Request (CSV save)</h2>';
  $name = isset($_POST['name']) ? $_POST['name'] : '';
  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $role = isset($_POST['role']) ? $_POST['role'] : '';
  $etype = isset($_POST['etype']) ? $_POST['etype'] : '';
  $skills = isset($_POST['skills']) ? $_POST['skills'] : array();
  $experience = isset($_POST['experience']) ? $_POST['experience'] : 0;
  $cover = isset($_POST['cover']) ? $_POST['cover'] : '';
  echo '<p>Name: <strong>'.h($name).'</strong></p><p>Email: <strong>'.h($email).'</strong></p>';
  echo '<p>Role: '.h($role).' | Type: '.h($etype).' | Exp: '.h($experience).'</p>';
  echo '<p>Skills:</p><ul>'; foreach($skills as $s) echo '<li>'.h($s).'</li>'; echo '</ul>';
  echo '<p>Cover:</p><blockquote>'.nl2br(h($cover)).'</blockquote>';
  $row = array($name,$email,$role,$etype,implode('|',$skills),$experience,$cover,date('c'));
  $f = fopen('applications.csv','a');
  if($f){ fputcsv($f,$row); fclose($f); echo '<p><em>Saved to applications.csv</em></p>'; } else { echo '<p>Unable to save CSV on server.</p>'; }
} else { echo '<p>Unsupported method.</p>'; }
echo '<p><a href="index.html">Back</a></p></body></html>'; ?>