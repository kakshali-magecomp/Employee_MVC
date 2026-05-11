document.addEventListener("DOMContentLoaded", function () {

    const employeeInput = document.getElementById("searchEmployee");

    const dateInput = document.getElementById("searchDate");

    const rows = document.querySelectorAll("#attendanceBody tr");

    function filterTable() {

        const employeeValue = employeeInput.value.toLowerCase();

        const dateValue = dateInput.value;

        rows.forEach(row => {

            const employeeName = row.cells[1].textContent.toLowerCase();

            const attendanceDate = row.cells[3].textContent.trim();

            let matchEmployee = true;

            let matchDate = true;

            if (employeeValue !== "") {
                matchEmployee = employeeName.includes(employeeValue);
            }

            
            if (dateValue !== "") {
                matchDate = attendanceDate === dateValue;
            }

            if (matchEmployee && matchDate) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }

        });

    }

    employeeInput.addEventListener("keyup", filterTable);
    dateInput.addEventListener("change", filterTable);

});