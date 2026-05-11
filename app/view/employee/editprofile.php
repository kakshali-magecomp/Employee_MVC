<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="max-w-4xl mx-auto p-8">
      <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

        <div class="p-6 border-b border-gray-200">
            <h2 class="text-3xl font-bold text-gray-700">
                Edit Profile
            </h2>
        </div>

        <div class="p-8">

            <form action="index.php?page=updateemployee" method="POST" enctype="multipart/form-data">
                
                <div class="mb-6">
                <input type="text" name="id" value="<?= $employee['id']; ?>" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400" readonly>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Full Name</label>
                    <input type="text" name="full_name" value="<?= htmlspecialchars($employee['full_name'] ?? '') ?>" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400" >
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">email</label>
                    <input type="text" name="email" value="<?= $employee['email']; ?>" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">password</label>
                    <input type="password" name="password" value="<?= $employee['email']; ?>" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">mobile</label>
                    <input type="mobile" name="mobile" value="<?= $employee['mobile']; ?>" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">profile Image</label>
                    <input type="file" name="profile_image" value="<?= $employee['profile_image']; ?>" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400" require>
                </div>

                <div class="mb-8">
                    <label class="block text-gray-700 font-semibold mb-2">Role</label>
                    <select name="role" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="admin"
                            <?= ($employee['role'] == 'admin') ? 'selected' : ''; ?>>
                            Admin
                        </option>
                        <option value="employee"
                            <?= ($employee['role'] == 'employee') ? 'selected' : ''; ?>>
                            Employee
                        </option>
                    </select>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Status</label>
                    <select name="status" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        <option value="active"
                            <?= ($employee['status'] == 'active') ? 'selected' : ''; ?>>
                            Active
                        </option>
                        <option value="inactive"
                            <?= ($employee['status'] == 'inactive') ? 'selected' : ''; ?>>
                            Inactive
                        </option>
                    </select>                
                </div>

                <div class="flex items-center gap-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-xl font-semibold transition">
                        Update Profile
                    </button>

                    <a href="index.php?page=empdashboard" class="bg-gray-400 hover:bg-gray-500 text-white px-6 py-3 rounded-xl font-semibold transition">
                        Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>