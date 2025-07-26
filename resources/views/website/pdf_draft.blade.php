<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project Draft</title>
    <style>
        body {
            font-family: "DejaVu Sans", Arial, sans-serif;
            direction: ltr;
            background-color: #f9f9f9;
            margin: 30px auto;
            max-width: 700px;
            padding: 20px 25px;
            border: 1px solid #ddd;
            border-radius: 10px;
            color: #333;
        }

        h1 {
            text-align: center;
            font-size: 30px;
            margin-bottom: 25px;
            color: #2c3e50;
        }

        p {
            font-size: 18px;
            line-height: 1.6;
            margin: 12px 0;
            padding-bottom: 6px;
            border-bottom: 1px solid #eee;
        }

        p strong {
            display: inline-block;
            min-width: 120px;
            color: #555;
        }

        /* Optional: highlight on hover */
        p strong:hover {
            color: #007bff;
            cursor: default;
        }
    </style>
</head>
<body>
    <h1>Your Project Details</h1>
    <p><strong>Title:</strong> {{ $data['title'] }}</p>
    <p><strong>Description:</strong> {{ $data['description'] }}</p>
    <p><strong>Price From:</strong> {{ $data['min_price'] }}</p>
    <p><strong>Price To:</strong> {{ $data['max_price'] }}</p>
    <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Location:</strong> {{ $data['location'] }}</p>

    @if (!empty($data['services']))
        <p><strong>Services:</strong> {{ implode(', ', $data['services']) }}</p>
    @endif

    @if (!empty($data['workdays']))
        <p><strong>Working Days:</strong> {{ implode(', ', $data['workdays']) }}</p>
    @endif
</body>
</html>
