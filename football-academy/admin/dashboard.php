<?php
session_start();
if (!isset($_SESSION["admin"])) {
  header("Location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <style>
    * { margin:0; padding:0; box-sizing:border-box; font-family:Arial,sans-serif; }
    html { scroll-behavior: smooth; }
    body { display:flex; min-height:100vh; background:#f4f6f9; }
    .sidebar .menu { 
  list-style:none; 
  display:flex; 
  flex-direction:column; 
  height: calc(100vh - 80px); 
}

.sidebar .menu li.logout { 
  margin-top:auto; 
}

.sidebar .menu li a { 
  color:white; 
  text-decoration:none; 
  width:100%; 
}

   
    .sidebar {
      width: 240px;
      background: linear-gradient(180deg, #14532d, #052e16);
      color:white;
      padding:20px;
      position:fixed;
      height:100vh;
    }
    .sidebar .logo { display:flex; align-items:center; gap:10px; font-size:18px; font-weight:bold; margin-bottom:35px; }
    .sidebar .menu { list-style:none; }
    .sidebar .menu li { padding:12px; border-radius:8px; margin-bottom:8px; cursor:pointer; display:flex; align-items:center; gap:10px; }
    .sidebar .menu li:hover, .sidebar .menu li.active { background: rgba(255,255,255,0.15); }
    .sidebar .menu li a { color:white; text-decoration:none; width:100%; }

  
    .content { margin-left:240px; flex:1; }

   
    section { min-height:100vh; padding:40px 30px; display:flex; flex-direction:column; }

    h1.section-title { font-size:32px; margin-bottom:25px; }

 
    .stats { display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:20px; margin-bottom:30px; }
    .stat-card { background:white; padding:25px; border-radius:12px; box-shadow:0 6px 14px rgba(0,0,0,0.06); transition:transform 0.2s; display:flex; flex-direction:column; align-items:flex-start; }
    .stat-card:hover { transform:translateY(-6px); }
    .stat-card i { font-size:28px; margin-bottom:15px; }
    .stat-card h3 { font-size:15px; color:#6b7280; margin-bottom:8px; }
    .stat-card p { font-size:32px; font-weight:bold; color:#111827; }

    .players { border-left:6px solid #22c55e; } .players i { color:#22c55e; }
    .coaches { border-left:6px solid #3b82f6; } .coaches i { color:#3b82f6; }
    .trainings { border-left:6px solid #f59e0b; } .trainings i { color:#f59e0b; }
    .matches { border-left:6px solid #ef4444; } .matches i { color:#ef4444; }

    
    .table-wrapper { overflow-x:auto; margin-bottom:40px; }
    table.activity-table { width:100%; border-collapse:collapse; background:white; border-radius:12px; overflow:hidden; box-shadow:0 6px 14px rgba(0,0,0,0.06); }
    table th { text-align:left; padding:14px 16px; font-size:14px; color:#6b7280; background:#f9fafb; text-transform:uppercase; }
    table td { padding:14px 16px; font-size:15px; color:#111827; border-top:1px solid #e5e7eb; }
    table tr:hover { background:#f3f4f6; }

   
    .status { padding:5px 12px; border-radius:999px; font-size:13px; font-weight:600; display:inline-block; }
    .status.active { background:#dcfce7; color:#166534; }
    .status.injured { background:#fee2e2; color:#991b1b; }
    .status.suspended { background:#fef3c7; color:#92400e; }
    .status.success { background:#dcfce7; color:#166534; }
    .status.info { background:#dbeafe; color:#1e40af; }

 
    .btn { background:#22c55e; color:white; padding:10px 18px; border:none; border-radius:8px; cursor:pointer; font-weight:600; margin-bottom:15px; }
    .btn:hover { background:#16a34a; }
    .btn.small { padding:6px 12px; font-size:13px; }
    .btn.danger { background:#ef4444; } .btn.danger:hover { background:#dc2626; }

  
    .table-header { display:flex; justify-content:space-between; align-items:center; margin-bottom:15px; }
    .search-box { position:relative; width:260px; }
    .search-box i { position:absolute; left:12px; top:50%; transform:translateY(-50%); color:#9ca3af; }
    .search-box input { width:100%; padding:10px 12px 10px 36px; border-radius:8px; border:1px solid #e5e7eb; outline:none; font-size:14px; }
    .search-box input:focus { border-color:#3b82f6; box-shadow:0 0 0 2px rgba(59,130,246,0.15); }

  </style>
</head>
<body>
  <aside class="sidebar">
    <div class="logo"><i class="fa-solid fa-futbol"></i>F.C Ferizaj</div>
    <ul class="menu">
      <li class="active"><a href="#dashboard">Dashboard</a></li>
      <li><a href="#players">Players</a></li>
      <li><a href="#trainings">Trainings</a></li>
      <li><a href="#matches">Matches</a></li>
      <li><a href="#attendance">Attendance</a></li>

      <li class="logout">
    <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
  </li>
</ul>
    </ul>
  </aside>
  <div class="content">
    <section id="dashboard">
      <h1 class="section-title">Dashboard</h1>
      <div class="stats">
        <div class="stat-card players"><i class="fa-solid fa-futbol"></i><h3>Players</h3><p>86</p></div>
        <div class="stat-card coaches"><i class="fa-solid fa-user-tie"></i><h3>Coaches</h3><p>12</p></div>
        <div class="stat-card trainings"><i class="fa-solid fa-calendar-days"></i><h3>Trainings</h3><p>18</p></div>
        <div class="stat-card matches"><i class="fa-solid fa-trophy"></i><h3>Matches</h3><p>5</p></div>
      </div>
    </section>
    <section id="players">
      <div class="table-header">
        <h1 class="section-title">Players</h1>
        <div class="search-box"><i class="fa-solid fa-magnifying-glass"></i><input type="text" id="searchPlayers" placeholder="Search players..." onkeyup="searchTable('players')"></div>
      </div>
      <button class="btn">+ Add Player</button>
      <div class="table-wrapper">
        <table class="activity-table" id="playersTable">
          <thead><tr><th>Name</th><th>Age</th><th>Team</th><th>Status</th><th>Actions</th></tr></thead>
          <tbody>
            <tr><td>Ardit Krasniqi</td><td>15</td><td>U15</td><td><span class="status active">Active</span></td><td><button class="btn small">Edit</button> <button class="btn small danger">Delete</button></td></tr>
            <tr><td>Leon Berisha</td><td>17</td><td>U17</td><td><span class="status injured">Injured</span></td><td><button class="btn small">Edit</button> <button class="btn small danger">Delete</button></td></tr>
          </tbody>
        </table>
      </div>
    </section>
    <section id="trainings">
      <div class="table-header">
        <h1 class="section-title">Trainings</h1>
        <div class="search-box"><i class="fa-solid fa-magnifying-glass"></i><input type="text" id="searchTrainings" placeholder="Search trainings..." onkeyup="searchTable('trainings')"></div>
      </div>
      <button class="btn">+ Add Training</button>
      <div class="table-wrapper">
        <table class="activity-table" id="trainingsTable">
          <thead><tr><th>Team</th><th>Date</th><th>Time</th><th>Coach</th><th>Status</th></tr></thead>
          <tbody>
            <tr><td>U17</td><td>2025-01-15</td><td>17:00 - 18:30</td><td>Coach Ilir</td><td><span class="status info">Planned</span></td></tr>
          </tbody>
        </table>
      </div>
    </section>
    <section id="matches">
      <div class="table-header">
        <h1 class="section-title">Matches & Results</h1>
        <div class="search-box"><i class="fa-solid fa-magnifying-glass"></i><input type="text" id="searchMatches" placeholder="Search matches..." onkeyup="searchTable('matches')"></div>
      </div>
      <button class="btn">+ Add Match</button>
      <div class="table-wrapper">
        <table class="activity-table" id="matchesTable">
          <thead><tr><th>Team</th><th>Opponent</th><th>Date</th><th>Score</th><th>Status</th></tr></thead>
          <tbody>
            <tr><td>U19</td><td>FC Prishtina</td><td>2025-01-10</td><td>2 - 1</td><td><span class="status success">Won</span></td></tr>
          </tbody>
        </table>
      </div>
    </section>
    <section id="attendance">
      <div class="table-header">
        <h1 class="section-title">Attendance & Performance</h1>
        <div class="search-box"><i class="fa-solid fa-magnifying-glass"></i><input type="text" id="searchAttendance" placeholder="Search attendance..." onkeyup="searchTable('attendance')"></div>
      </div>
      <div class="table-wrapper">
        <table class="activity-table" id="attendanceTable">
          <thead><tr><th>Player</th><th>Team</th><th>Attendance</th><th>Performance</th></tr></thead>
          <tbody>
            <tr><td>Leon Berisha</td><td>U17</td><td>92%</td><td><span class="status success">Excellent</span></td></tr>
          </tbody>
        </table>
      </div>
    </section>

  </div>
  <script>
    function searchTable(section) {
      const input = document.getElementById(search${section.charAt(0).toUpperCase() + section.slice(1)});
      const filter = input.value.toLowerCase();
      const table = document.getElementById(${section}Table);
      const rows = table.getElementsByTagName("tr");
      for (let i = 1; i < rows.length; i++) {
        const text = rows[i].innerText.toLowerCase();
        rows[i].style.display = text.includes(filter) ? "" : "none";
    
  };
}
new Chart(document.getElementById('playersChart'), {
  type: 'bar',
  data: {
    labels: ['U15', 'U17', 'U19'],
    datasets: [{
      label: 'Players',
      data: [25, 30, 18]
    }]
  }
});
</script>
</body>
</html>