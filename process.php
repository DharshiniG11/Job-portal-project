<?php
// Simple PHP processor demonstrating GET and POST, variables, operators, control flow and loops,
// and saving POSTed applications to a CSV for demonstration (no database required).
header('Content-Type: text/html; charset=utf-8');

function h($s){ return htmlspecialchars($s, ENT_QUOTES); }

echo '<!doctype html><html><head><meta charset="utf-8"><title>Process - QuickJobs</title>';
echo '<style>body{font-family:Arial,Helvetica,sans-serif;padding:1rem;max-width:900px;margin:auto;} table{border-collapse:collapse;} td,th{border:1px solid #ddd;padding:6px;}</style>';
echo '</head><body>';
echo '<h1>QuickJobs - Form Processor</h1>';

if($_SERVER['REQUEST_METHOD'] === 'GET'){
    echo '<h2>GET request received</h2>';
    $q = isset($_GET['q']) ? $_GET['q'] : '';
    echo '<p>Search query: <strong>' . h($q) . '</strong></p>';
    // simple demo of decision
    if(strlen($q) < 1){
        echo '<p>Please provide a query using the search box.</p>';
    } else {
        echo '<p>Simulated search results for "' . h($q) . '"</p>';
        echo '<ul><li>Result 1 for '.h($q).'</li><li>Result 2 for '.h($q).'</li></ul>';
    }
} elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
    echo '<h2>POST request received</h2>';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $role = isset($_POST['role']) ? $_POST['role'] : '';
    $etype = isset($_POST['etype']) ? $_POST['etype'] : '';
    $skills = isset($_POST['skills']) ? $_POST['skills'] : array();
    $experience = isset($_POST['experience']) ? $_POST['experience'] : 0;
    $cover = isset($_POST['cover']) ? $_POST['cover'] : '';

    echo '<p>Name: <strong>' . h($name) . '</strong></p>';
    echo '<p>Email: <strong>' . h($email) . '</strong></p>';
    echo '<p>Role: ' . h($role) . ' | Type: ' . h($etype) . ' | Experience: ' . h($experience) . ' yrs</p>';
    echo '<p>Skills:</p><ul>';
    foreach($skills as $s){ echo '<li>' . h($s) . '</li>'; }
    echo '</ul>';
    echo '<p>Cover note:</p><blockquote>' . nl2br(h($cover)) . '</blockquote>';

    // Save to CSV (append)
    $row = array($name, $email, $role, $etype, implode('|',$skills), $experience, $cover, date('c'));
    $f = fopen('applications.csv', 'a');
    if($f){
        fputcsv($f, $row);
        fclose($f);
        echo '<p><em>Application saved to <code>applications.csv</code> (for demo).</em></p>';
    } else {
        echo '<p><strong>Unable to save application on this server demo.</strong></p>';
    }
} else {
    echo '<p>Unsupported request method.</p>';
}

echo '<p><a href="index.html">Back to Home</a></p>';
echo '</body></html>';
?>