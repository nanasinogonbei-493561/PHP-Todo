<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo編集</title>
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
            max-width: 800px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"], textarea {
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
    </style>
</head>
<body>
    <div class="todo-container">
        <h1>Todo編集</h1>

        @if($errors->any())
            <div class="alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('todos.update', $todo->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">タイトル</label>
                <input type="text" name="title" id="title" value="{{ old('title', $todo->title) }}" required>
                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">説明</label>
                <textarea name="description" id="description">{{ old('description', $todo->description) }}</textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">更新</button>
                <a href="{{ route('todos.index') }}" class="btn btn-secondary">戻る</a>
            </div>
        </form>
</body>
</html>