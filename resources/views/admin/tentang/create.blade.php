<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Tentang</title>
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
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 550px;
            background: white;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 22px;
            color: #1e3c72;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 6px;
            color: #333;
        }

        select,
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 18px;
            border-radius: 10px;
            border: 1px solid #ddd;
            font-size: 14px;
            transition: 0.3s;
        }

        select:focus,
        textarea:focus,
        input[type="file"]:focus {
            border-color: #2563eb;
            outline: none;
            box-shadow: 0 0 0 3px rgba(37,99,235,0.1);
        }

        textarea {
            resize: vertical;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        button {
            background: #2563eb;
            color: white;
            border: none;
            padding: 10px 22px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            transition: 0.3s;
        }

        button:hover {
            background: #1d4ed8;
        }

        .btn-back {
            text-decoration: none;
            background: #6b7280;
            color: white;
            padding: 10px 22px;
            border-radius: 10px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-back:hover {
            background: #4b5563;
        }

        @media(max-width:500px){
            .container{
                padding:25px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>📄 Tambah Data Tentang</h1>

    <form action="{{ route('admin.tentang.store') }}" 
          method="POST" 
          enctype="multipart/form-data">

        @csrf

        <label>Section</label>
        <select name="section" required>
            <option value="">-- Pilih Section --</option>
            <option value="tasty_food">Tasty Food</option>
            <option value="visi">Visi</option>
            <option value="misi">Misi</option>
        </select>

        <label>Deskripsi</label>
        <textarea name="deskripsi" rows="5" required></textarea>

        <label>Foto</label>
        <input type="file" name="gambar">

        <div class="btn-group">
            <button type="submit">💾 Simpan</button>
            <a href="{{ route('admin.tentang.index') }}" class="btn-back">⬅ Kembali</a>
        </div>

    </form>
</div>

</body>
</html>
