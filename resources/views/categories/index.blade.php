<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>カテゴリ一覧</title>
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
            max-width: 800px;
        }

        .category-item {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .category-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .category-name {
            font-weight: bold;
            font-size: 18px;
        }

        .category-color {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 2px solid #ddd;
        }

        .category-actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            display: inline-block;
            padding: 5px 10px;
            text-decoration: none;
            color: #fff;
            border-radius: 3px;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-warning {
            background-color: #ffc107;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .create-btn {
            margin-bottom: 20px;
        }

        .nav-links {
            margin-bottom: 20px;
        }

        .nav-links a {
            margin-right: 15px;
            color: #007bff;
            text-decoration: none;
        }

        form {
            display: inline;
        }

        .empty-message {
            text-align: center;
            color: #666;
            padding: 40px;
        }
    </style>
</head>
<body>
    <div class="category-container">
        <h1>カテゴリ一覧</h1>

        <div class="nav-links">
            <a href="{{ route('todos.index') }}">Todo一覧</a>
            <a href="{{ route('categories.create') }}">カテゴリ作成</a>
        </div>

        <div class='create-btn'>
            <a href="{{ route('categories.create') }}" class="btn btn-primary">新規カテゴリ作成</a>
        </div>

        @if(!empty($categories) && count($categories) > 0)
            @foreach($categories as $category)
                <div class="category-item">
                    <div class="category-info">
                        @if($category->color)
                            <div class="category-color" style="background-color: {{ $category->color }};"></div>
                        @endif
                        <div class="category-name">{{ $category->name }}</div>
                    </div>
                    <div class="category-actions">
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">編集</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('このカテゴリを削除しますか？関連するTodoも影響を受ける可能性があります。');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">削除</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <div class="empty-message">
                <p>カテゴリがありません</p>
                <p>新しいカテゴリを作成してください</p>
            </div>
        @endif
    </div>
</body>
</html>