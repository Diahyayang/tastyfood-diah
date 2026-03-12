<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Berita</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
        }

        .card {
            background: white;
            width: 100%;
            max-width: 500px;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: 1px solid #ddd;
            margin-bottom: 18px;
            font-size: 14px;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 2px rgba(37,99,235,0.2);
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .btn-cancel {
            flex: 1;
            text-align: center;
            padding: 10px;
            border-radius: 10px;
            background: #e5e7eb;
            text-decoration: none;
            color: black;
            font-weight: 500;
        }

        .btn-save {
            flex: 1;
            padding: 10px;
            border-radius: 10px;
            border: none;
            background: #2563eb;
            color: white;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-save:hover {
            background: #1e40af;
        }

        @media(max-width:500px){
            .card{
                margin: 20px;
                padding: 25px;
            }
        }
    </style>
</head>
<body>

<div class="card">
    <h2>➕ Tambah Berita</h2>

    <form action="{{ route('berita.store') }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf

        <input type="text"
               name="judul"
               placeholder="Judul"
               required>

        <textarea name="isi"
                  placeholder="Isi berita"
                  rows="5"
                  required></textarea>

        <input type="file"
               name="gambar">

        <div class="btn-group">
            <a href="{{ route('berita.index') }}"
               class="btn-cancel">
                Batal
            </a>

            <button type="submit"
                    class="btn-save">
                💾 Simpan
            </button>
        </div>
    </form>
</div>

</body>
</html>
