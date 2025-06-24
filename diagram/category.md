# カテゴリ機能追加の手順
 1. カテゴリテーブルの作成とマイグレーション実行
 2. Categoryモデルの作成と関連設定
 3. 既存のTodoモデルにリレーション追加
 4. コントローラーの作成・修正
 5. ビューファイルの作成・修正
 6. ルーティングの設定
 7. バリデーションの実装

## categories_tableにて、以下のカラム追加
 - id(主キー)
 - name(カテゴリ名)
 - color(カテゴリ色・オプション)
 - created_at, updated_at

## todosテーブルの修正
 - category_idカラムを追加してリレーション設定

## Eloquentモデルの設定
 - Categoryモデルの作成
 - リレーションシップの定義
  - Category　→　Todo(1対多)
  - Todo　→　Category(多対1)

## コントローラーの実装
 - CategoryControllerの作成
 - 以下のメソッドを実装
  - index()  カテゴリ一覧表示
  - create()  カテゴリ作成フォーム
  - store()  カテゴリ保存処理
  - edit()  カテゴリ編集フォーム
  - update()  カテゴリ更新処理
  - destroy()  カテゴリ削除処理
 - TodoControllerの修正 : 既存のTodoコントローラーにカテゴリ選択機能を追加

 ## ビューの作成・修正
  - categories/index.blade.php  カテゴリ一覧
  - categories/create.blade.php  カテゴリ作成
  - categories/edit.blade.php  カテゴリ編集
  - 修正するビュー
   - Todo作成・編集フォームにカテゴリ選択プルダウンを追加
   - Todo一覧にカテゴリ表示を追加

## ルーティング設定
 - web.phpにカテゴリ関連のルートを追加
  - Route::resouce('categories', CategoryController::class);

## フォームバリデーション
 - カテゴリバリデーション
  - カテゴリ名の必須チェック
  - 重複チェック
  - 文字数制限

## TodoバリデーションにCategoryId追加
 - 存在するカテゴリIDかチェック