<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <table class="table table-bordered">

        <thead class="table-dark">

            <tr>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Role</th>
                <th>Status</th>
            </tr>

        </thead>
        <tbody>
            <?php foreach ($employee as $emp): ?>
                <tr>
                    <td><?= $emp['id']; ?></td>
                    <td><?= $emp['full_name']; ?></td>
                    <td><?= $emp['email']; ?></td>
                    <td><?= $emp['mobile']; ?></td>
                    <td><?= $emp['role']; ?></td>
                    <td><?= $emp['status']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<a href="/EMPLOYEE_M_SYSTEM/public/?page=login" class="btn btn-primary w-50">
        Logout
    </a>
</div>

</body>
</html>