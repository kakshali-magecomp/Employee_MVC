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

        <thead class="table-info">

            <tr>
                <th>Employee Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Role</th>
                <th>Status</th>
            </tr>

        </thead>
        <tbody class="table-primary">
            <?php foreach ($employee as $emp): ?>
                <tr>
                    <td><?= $emp['full_name']; ?></td>
                    <td><?= $emp['email']; ?></td>
                    <td><?= $emp['mobile']; ?></td>
                    <td><?= $emp['role']; ?></td>
                    <td><?= $emp['status']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

</body>
</html>