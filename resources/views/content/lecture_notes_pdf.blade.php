<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title>Lecture Notes | Scholar Link</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            color: #333;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #06BBCC;
            margin-bottom: 40px;
        }

        .logo {
            width: 200px;
            height: auto;
        }

        .content {
            margin: 0 20px;
        }

        .course {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .tutor {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .notes {
            font-size: 16px;
            margin-bottom: 20px;
        }
    </style>

</head>

<body>
    <div class="header">
         <h1>Lecture Notes | Scholar Link</h1>
    </div>
    <div class="content">
        
        <p><strong>This is the PDF version of your notes.</strong></p><br>

        <h3>Course:</h3>
        <p> {{ $results['course_name'] }}</p> <br>

        <h3>Tutor Name:</h3>
        <p> {{ $results['tutor_name'] }}</p> <br> 

        <h3>Notes: </h3>
        <p> {{ $results['content'] }}</p>

        <h3>Written by: </h3>
        <p> {{ auth()->user()->name}} {{auth()->user()->last_name}}</p>


    </div>
</body>

</html>