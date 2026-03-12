<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Gallery</title>
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

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
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

        .btn-save {
            flex: 1;
            padding: 10px;
            border-radius: 10px;
            border: none;
            background: #16a34a;
            color: white;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-save:hover {
            background: #15803d;
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
    <h2>📷 Tambah Gallery</h2>

    {{-- ERROR --}}
    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form 
        action="{{ route('admin.gallery.store') }}" 
        method="POST" 
        enctype="multipart/form-data"
    >
        @csrf

        <label>Judul</label>
        <input type="text" name="judul" value="{{ old('judul') }}" required>

        <label>Gambar</label>
        <input type="file" name="gambar" required>

        <label>Deskripsi</label>
        <textarea name="description" required>{{ old('description') }}</textarea>

        <div class="btn-group">
            <a href="{{ route('admin.gallery.index') }}" class="btn-back">
                Batal
            </a>

            <button type="submit" class="btn-save">
                💾 Simpan
            </button>
        </div>
    </form>
</div>

</body>
</html>
