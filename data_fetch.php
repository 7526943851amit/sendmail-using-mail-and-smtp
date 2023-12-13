<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All data</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <style>
.container {
    text-align: center;
}
.pagehead img {
    max-width: 200px;
    margin: 0 auto;
}
.pagehead {
    text-align: center;
    padding: 10px 0;
    background: #fff;
}
body {
    background: #eae6ce;
}
.diet_planTable {
    margin: 30px 0 0;
}
.diet_planTable h2 {
    margin: 0 0 15px;
    font-weight: bold;
    text-transform: capitalize;
    font-size: 30px;
    line-height: 50px;
    color: #633d24;
    display: block;
    text-align:center;
    text-transform: uppercase;
}
.diet_planTable .table-responsive {
    background: #fff;
    padding: 20px;
    border-radius: 20px;
}
.diet_planTable .active>.page-link, 
.diet_planTable .page-link.active {
    z-index: 3;
    color: var(--bs-pagination-active-color);
    background-color: #5a3721;
    border-color: #5a3721;
}
table#dataTable{
    font-size:14px;
}
table#dataTable thead th {
    background: #eae6ce;
    color: #633d24;
}
    </style>
</head> 
<body>
<div class="pagehead">
    <div class="container-fluid">
        <a href="https://killerbodyfood.com/" class="">
            <img src="https://cdn.shopify.com/s/files/1/0553/3866/4049/files/Kopie-van-logo-killerbody_vector_fullcolor_bruin.png?v=1668510322" alt="killerbodyfood">
        </a>
    </div>
</div>
<div class="diet_planTable">
<div class="container-fluid">
    
    <h2>Diet Plan Data</h2>
    <div class="table-responsive">
    <?php
    include 'db.php';

    $sql = "SELECT * FROM diet_plan_email";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table id='dataTable' class='table table-striped table-bordered' style='width:100%'>
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Weight</th>
                        <th>Height</th>
                        <th>Age</th>
                        <th>Vegan</th>
                        <th>Gender</th>
                        <th>Goal</th>
                        <th>Activity_Level</th>
                        <th>Updates</th>
                        <th>CreatedDate</th>
                    </tr>
                </thead>
                <tbody>";

        $i = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $i . "</td>
                    <td>" . $row["Name"] . "</td>
                    <td>" . $row["Email"] . "</td>
                    <td>" . $row["Weight"] . "</td>
                    <td>" . $row["Height"] . "</td>
                    <td>" . $row["Age"] . "</td>
                    <td>" . $row["Vegan"] . "</td>
                    <td>" . $row["Gender"] . "</td>
                    <td>" . $row["Goal"] . "</td>
                    <td>" . $row["Activity_Level"] . "</td>
                    <td>" . $row["Updates"] . "</td>
                    <td>" . $row["CreatedDate"] . "</td>
                  </tr>";
            $i++;
        }

        echo "</tbody></table>";

    } else {
        echo "0 results";
    }

    $conn->close();
    ?>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>

</body>
</html>
