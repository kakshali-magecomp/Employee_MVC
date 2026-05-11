<!DOCTYPE html>
<html>
<head>
    <title>Attendance Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-100">
<div class="max-w-7xl mx-auto p-8">

<div class="bg-white rounded-3xl  overflow-hidden">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-2xl font-bold text-gray-700">
                Attendance Records
            </h2>
        </div>

        <div class="bg-white rounded-3xl  p-8 ">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-700">
                Search Attendance
            </h2>
        </div>

        <form method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-5">

            <input type="hidden" name="page" value="dashboard">

            <input type="date" name="date" id="searchDate" class="border border-gray-300 p-4 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500">

            <input type="text" name="employee" id="searchEmployee" placeholder="Search Employee Name" class="border border-gray-300 p-4 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500">

            <!-- <button type="button" class="bg-indigo-600 hover:bg-indigo-700 text-white rounded-2xl font-semibold transition">
                Search
            </button> -->

            <a href="index.php?page=attendance" class="bg-indigo-600  text-white rounded-2xl font-semibold flex items-center justify-center transition">
                Reset</a>

        </form>
    </div>

<div class="overflow-x-auto ">
<table class="w-full" id="attendanceTable">
    <tr class="bg-indigo-600 text-white">
        <th  class="p-5 text-left">ID</th>
        <th  class="p-5 text-left">Employee Name</th>
        <th  class="p-5 text-left">Email</th>
        <th  class="p-5 text-left">Date</th>
        <th  class="p-5 text-left">Punch In</th>
        <th  class="p-5 text-left">Punch Out</th>
        <th  class="p-5 text-left">Working Hours</th>
        <th  class="p-5 text-left">Status</th>
    </tr>
<tbody id="attendanceBody">
    <?php foreach ($attendanceData as $row): ?>

    <tr class="border-b hover:bg-gray-50 transition" >
        <td class="p-5"><?= $row['id']; ?></td>

        <td class="p-5"><?= htmlspecialchars($row['full_name']); ?></td>

        <td class="p-5"><?= htmlspecialchars($row['email']); ?></td>

        <td class="p-5"><?= $row['attendance_date']; ?></td>

        <td class="p-5">
            <?= !empty($row['punch_in']) 
                ? date('h:i A', strtotime($row['punch_in'])) 
                : '-'; ?>
        </td>

        <td class="p-5">
            <?= !empty($row['punch_out']) 
                ? date('h:i A', strtotime($row['punch_out'])) 
                : '-'; ?>
        </td>

        <td class="p-5"><?= $row['working_hours'] ?? '-'; ?></td>

        <!-- <td class="p-5"><?= $row['late_time'] ?? '-'; ?></td> -->

        <td class="p-5">
            <?php if ($row['status'] == 'Present'): ?>
                <span class="present">Present</span>

            <?php elseif ($row['status'] == 'Late'): ?>
                <span class="late">Late</span>

            <?php else: ?>
                <span class="absent">Absent</span>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
<tbody>
</table>
            
</div>
          
</div>
<div class="mt-[20px]">
<a href="index.php?page=dashboard"class="bg-white text-indigo-700 px-5 py-3 rounded-xl font-semibold hover:bg-gray-200 transition mt-[10px] ">
                Back</a>    
</div>  
<script src="../public/search.js"></script>
</body>
</html>