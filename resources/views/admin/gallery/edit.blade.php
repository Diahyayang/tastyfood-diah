<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Gallery</title>
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
            max-width: 520px;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            font-size: 14px;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: 1px solid #ddd;
            margin-bottom: 18px;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 2px rgba(37,99,235,0.2);
        }

        .preview {
            text-align: center;
            margin-bottom: 20px;
        }

        .preview img {
            max-width: 150px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .btn-group {
            display: flex;
            gap: 10px;
        }

        .btn-back {
            flex: 1;
            text-align: center;
            padding: 10px;
            border-radius: 10px;
            background: #e5e7eb;
            text-decoration: none;
            color: black;
            font-weight: 500;
        }

        .btn-update {
            flex: 1;
            padding: 10px;
            border-radius: 10px;
            border: none;
            background: #2563eb;
            color: white;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-update:hover {
            background: #1d4ed8;
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
    <h2>✏️ Edit Gallery</h2>

    <form action="{{ route('admin.gallery.update', $gallery->id) }}" 
          method="POST" 
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <label>Judul</label>
        <input type="text" name="judul" value="{{ $gallery->judul }}" required>

        <div class="preview">
            <label>Gambar Saat Ini</label>
            <img src="{{ asset('storage/'.$gallery->gambar) }}">
        </div>

        <label>Ganti Gambar (Opsional)</label>
        <input type="file" name="gambar">

        <label>Deskripsi</label>
        <textarea name="description" required>{{ $gallery->description }}</textarea>

        <div class="btn-group">
            <a href="{{ route('admin.gallery.index') }}" class="btn-back">
                Batal
            </a>

            <button type="submit" class="btn-update">
                💾 Update
            </button>
        </div>
    </form>
</div>

</body>
</html>
