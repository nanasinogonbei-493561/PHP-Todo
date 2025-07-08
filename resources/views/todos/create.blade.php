<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo作成</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            margin-bottom: 20px;
        }

        .todo-container {
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

        input[type="text"], textarea, select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }

        textarea {
            height: 100px;
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
    </style>
</head>
<body>
    <div class="todo-container">
        <h1>Todo作成</h1>

        <div class="nav-links">
            <a href="{{ route('todos.index') }}">Todo一覧</a>
            <a href="{{ route('categories.index') }}">カテゴリ一覧</a>
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

        <form action="{{ route('todos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">タイトル</label>
                <input type="text" name="title" id="title" class="form-control" required>
                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">説明</label>
                <textarea name="description" id="description">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="category_id">カテゴリ</label>
                <select name="category_id" id="category_id">
                    <option value="">カテゴリを選択してください</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">保存</button>
                <a href="{{ route('todos.index') }}" class="btn btn-secondary">戻る</a>
            </div>
        </form>
    </div>
</body>
</html>