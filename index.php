<?php

// Include the database connection file
require_once("dbConnection.php");

// Fetch data in descending order (latest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f6f9;
            padding: 40px;
            color: #333;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        .add-button {
            display: inline-block;
            background: #007bff;
            color: white;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 6px;
            margin-bottom: 20px;
            transition: 0.3s;
        }

        .add-button:hover {
            background: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 8px;
        }

        th,
        td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background: #007bff;
            color: white;
        }

        tr:hover {
            background: #f8f9fa;
        }

        .edit {
            color: #198754;
            text-decoration: none;
            font-weight: bold;
            margin-right: 8px;
        }

        .delete {
            color: #dc3545;
            text-decoration: none;
            font-weight: bold;
        }

        .edit:hover {
            text-decoration: underline;
        }

        .delete:hover {
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            body {
                padding: 15px;
            }

            .container {
                padding: 15px;
            }

            table {
                font-size: 14px;
            }

            th,
            td {
                padding: 10px 6px;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <h2>Homepage</h2>

        <a class="add-button" href="add.php">+ Add New Data</a>

        <table>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Email</th>
                <th>Action</th>
            </tr>

            <?php

            // Fetch the next row of a result set as an associative array
            while ($res = mysqli_fetch_assoc($result)) {

                echo "<tr>";

                echo "<td>" . $res['name'] . "</td>";
                echo "<td>" . $res['age'] . "</td>";
                echo "<td>" . $res['email'] . "</td>";

                echo "<td>
                        <a class='edit' href='edit.php?id={$res['id']}'>Edit</a>
                        <a class='delete' href='delete.php?id={$res['id']}'
                           onclick=\"return confirm('Are you sure you want to delete?')\">
                           Delete
                        </a>
                      </td>";

                echo "</tr>";
            }

            ?>

        </table>

    </div>

</body>

</html>

