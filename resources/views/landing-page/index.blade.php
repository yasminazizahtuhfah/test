<!DOCTYPE html>
<html>
<head>
    <title>Landing Page CV</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        h1 {
            margin-top: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <header>
        <h1>Selamat datang di CV Saya</h1>
    </header>

    <div class="container">
        <h2>Data Identitas</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <!-- Add additional columns as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach($identitasData as $identitas)
                @if ($identitas->id == 	3273012907030009)
                    <tr>
                        <td>{{ $identitas->nama }}</td>
                        <td>{{ $identitas->tempat_lahir }}</td>
                        <td>{{ $identitas->tanggal_lahir }}</td>
                        <!-- Add additional columns as needed -->
                    </tr>
                @endif
                @endforeach
            </tbody>
        </table>
        <br>

        <h2>Data Portofolio</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama Proyek</th>
                    <th>Deskripsi</th>
                    <!-- Add additional columns as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach($portofolioData as $portofolio)
                    <tr>
                        <td>{{ $portofolio->nama_proyek }}</td>
                        <td>{{ $portofolio->deskripsi }}</td>
                        <!-- Add additional columns as needed -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
