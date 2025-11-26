<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unos Zaposlenika</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #e0dedeff;
        }
        form{
            width: 100%;
            font-size: 12px;

        }
        input[type="text"],input[type="email"], input[type="number"] {
            padding: 5px
        }
        input[typer+"submit"] {
            display: block;
            border-radius: 3px;
            padding: 10px;
        }
        label{
            padding-top: 10px;
            display: block;
        }
    </style>
</head>
<body>
    <h2>Unos zaposlenika</h2>
<form action="saveEmployee.php" method="POST">
    <label>Ime:</label>
    <input type="text" name="firstName">

    <label>Prezime:</label>
    <input type="text" name="lastName">

    <label>Job title:</label>
    <input type="text" name="jobTitle">

    <label>Email:</label>
    <input type="email" name="email">

    <label>Office code:</label>
    <input type="text" name="officeCode">

    <label>Reports to:</label>
    <input type="number" name="reportsTo">

    <label>Salary:</label>
    <input type="text" name="salary">

    <input type="submit" value="Spremi">
</form>

</body>
</html>