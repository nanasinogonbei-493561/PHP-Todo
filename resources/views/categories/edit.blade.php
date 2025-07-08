<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>カテゴリ編集</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            margin-bottom: 20px;
        }

        .category-container {
            max-width: 600px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"], input[type="color"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }

        input[type="color"] {
            width: 60px;
            height: 40px;
            padding: 0;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .error {
            color: #dc3545;
            margin-top: 5px;
        }

        .nav-links {
            margin-bottom: 20px;
        }

        .nav-links a {
            margin-right: 15px;
            color: #007bff;
            text-decoration: none;
        }

        .color-preview {
            display: inline-block;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 2px solid #ddd;
            margin-left: 10px;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="category-container">
        <h1>カテゴリ編集</h1>

        <div class="nav-links">
            <a href="{{ route('categories.index') }}">カテゴリ一覧</a>
            <a href="{{ route('todos.index') }}">Todo一覧</a>
        </div>

        @if($errors->any())
            <div class="alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">カテゴリ名 <span style="color: red;">*</span></label>
                <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="color">カテゴリ色</label>
                <input type="color" name="color" id="color" value="{{ old('color', $category->color ?? '#007bff') }}" onchange="updatePreview()">
                <div class="color-preview" id="colorPreview" style="background-color: {{ old('color', $category->color ?? '#007bff') }};"></div>
                @error('color')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">更新</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">戻る</a>
            </div>
        </form>
    </div>

    <script>
        function updatePreview() {
            const colorInput = document.getElementById('color');
            const preview = document.getElementById('colorPreview');
            preview.style.backgroundColor = colorInput.value;
        }
    </script>
</body>
</html> 