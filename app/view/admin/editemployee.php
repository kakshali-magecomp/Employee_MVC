<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Attendance</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="max-w-4xl mx-auto p-8">

    <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

        <div class="p-6 border-b border-gray-200">
            <h2 class="text-3xl font-bold text-gray-700">
                Edit Attendance Record
            </h2>
        </div>

        <div class="p-8">

            <form action="index.php?page=updateattendance" method="POST">

                <input type="hidden" name="id" value="<?= $attendance['id']; ?>">
                <input type="hidden" name="employee_id" value="<?= $attendance['employee_id']; ?>">

                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Employee Name</label>
                    <input type="text" name="full_name" value="<?= htmlspecialchars($attendance['full_name'] ?? '') ?>" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400" readonly>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Attendance Date</label>
                    <input type="date" name="attendance_date" value="<?= $attendance['attendance_date']; ?>" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Punch In</label>
                    <input type="time" name="punch_in" value="<?= !empty($attendance['punch_in']) ? date('H:i', strtotime($attendance['punch_in'])) : ''; ?>" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Punch Out</label>
                    <input type="time" name="punch_out" value="<?= !empty($attendance['punch_out']) ? date('H:i', strtotime($attendance['punch_out'])) : ''; ?>" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Working Hours</label>
                    <input type="text" name="working_hours" value="<?= $attendance['working_hours'] ?? ''; ?>" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Late Time</label>
                    <input type="text" name="late_time" value="<?= $attendance['late_time'] ?? ''; ?>" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-8">
                    <label class="block text-gray-700 font-semibold mb-2">Status</label>
                    <select name="status" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="Present"
                            <?= ($attendance['status'] == 'Present') ? 'selected' : ''; ?>>
                            Present
                        </option>
                        <option value="Absent"
                            <?= ($attendance['status'] == 'Absent') ? 'selected' : ''; ?>>
                            Absent
                        </option>
                    </select>
                </div>

                <div class="flex items-center gap-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold transition">
                        Update Attendance
                    </button>

                    <a href="index.php?page=dashboard" class="bg-gray-400 hover:bg-gray-500 text-white px-6 py-3 rounded-xl font-semibold transition">
                        Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>