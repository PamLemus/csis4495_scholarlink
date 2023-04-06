<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Lecture Notes</title>
    <style>
        body,
        footer {
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
            color: black;
            
        }

        h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            margin-bottom: 5px;
        }

        .logo {
            max-width: 80%;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .content {
            margin: 0 20px;
        }

        .course {
            font-size: 20px;
            margin-bottom: 10px;
            text-decoration: underline;
        }

        .tutor {
            font-size: 18px;
            margin-bottom: 10px;
            text-decoration: underline;
        }

        .notes {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .center {
            text-align: center;
        }
    </style>

</head>

<body>
    <div class="header center">
        <img src="https://res.cloudinary.com/dkdffcxrx/image/upload/v1679854567/logo-png_ag2vkt.png" class="logo mx-auto d-block center" style="max-width: 500px;">
    </div>
    <div class="content">
        <h1>Lecture Notes</h1>
        <h3 class="course">Course:</h3>
        <p> {{ $results['course_name'] }}</p>

        <h3 class="tutor">Tutor Name:</h3>
        <p> {{ $results['tutor_name'] }} {{ $results['tutor_last_name'] }}</p>

        <h3>Notes: </h3>
        <p> {{ $results['content'] }}</p>

        <h3>Written by: </h3>
        <p><em> {{ auth()->user()->name}} {{auth()->user()->last_name}} </em></p>
    </div>
    

    <footer>
        <div class="center">
            <p><strong>This is the PDF version of your notes.</strong></p>
        </div>
    </footer>
    </body>
    
</html>