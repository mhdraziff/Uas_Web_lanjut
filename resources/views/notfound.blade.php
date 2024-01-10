<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404 - Page Not Found</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(
                to right,
                pink,
                #ff6699);
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .wrapper {
            text-align: center;
        }

        h1 {
            font-size: 8em;
            color: #ff5733;
            margin: 0;
        }

        p {
            font-size: 2em;
            color: #333;
            height: 7px;
        }

        .robot {
            width: 350px;
            height: 170px;
            margin: 20px auto;
        }

        .robot img {
            width: 200px;
            /* Ganti dengan nilai lebar yang Anda inginkan */
            height: auto;
            /* Tinggi otomatis menyesuaikan agar gambar tidak terdistorsi */
            margin: 20px auto;
            /* Atur margin seperti yang Anda inginkan */
        }

        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        a {
            text-decoration: none;
            color: #3498db;
            font-size: 1.3em;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <h1>404</h1>
        <p>Halaman yang Anda cari tidak ditemukan.</p>
        <div class="robot">
            <img src="https://i.gifer.com/DKke.gif" alt="Robot">
        </div>
        <p>Kembali ke <a href="/">beranda</a></p>
    </div>
</body>

</html>
