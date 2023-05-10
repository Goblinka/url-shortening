<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, width=device-width">
    <title>Your private URL dashboard</title>
    <style>
        * {
             font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            box-sizing: border-box;
            font-size: 20px;
            line-height: 1.5em;
        }
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            background: #ffffff;
        }

        .container {
            max-width: 900px;
            margin: auto;
            padding: 1em;
        }

        h1 {
            font-size: 2em;
        }

        h2 {
            font-size: 1.5em;
            margin-top: 2em;
        }

        .form-group {
            width: 100%;
            margin: 1em 0;
        }
        
        .form-group label {
            display:  block;
        }

        .details {
            display: grid;
            gap: 1em;
            grid-template-columns: repeat(3, 1fr);
        }

        .card {
            border: 1px solid #ccc;
            padding: 0.5em;
            text-align: center;
        }

        .card .title {
            font-weight: bold;
        }

        @media screen and (max-width: 600px) {
            .details {
                grid-template-columns: repeat(1, 1fr);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Dashboard</h1>

        <div class="form-group">
            <label>Your original URL</label>
            <input value="{{ $url }}">
        </div>

        <div class="form-group">
            <label>Your short URL</label>
            <input value="{{ $short_url }}">
        </div>


        <h2>Stats</h2>        
        <div class="details">
            <div class="card">
                <div class="title">Total visits</div>
                <div class="value">{{ $visits }}</div>
            </div>
        </div>
    </div>
</body>
</html>