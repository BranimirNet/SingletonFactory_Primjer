<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Unos zaposlenika</title>
        <style>
            body{
                font-family: Arial, Helvetica, sans-serif;
                background-color: #e0dedeff;
            }

            form{
                width: 100%;
                font-size: 12px;
            }

            input[type="text"],input[type="email"],input[type="number"]{
                padding: 5px;
            }

            input[type="submit"]{
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
                <label><input type="submit" value="Spremi"></label>
            </form>
    </body>
</html>