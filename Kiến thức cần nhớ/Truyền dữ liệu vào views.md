Từ trang `routes/web.php` ta truyền các thông số vào trang `resources/views/file.blade.php`

`routes/web.php`

```php
Route::GET('/login', function (){
    // hãy tưởng tượng lúc này ta nhận được dữ liệu từ database, thì lúc này ta cần truyền một mảng vào file login
    return view('login', ['title' => 'Login - tên-domain']);
})
```

Thì lúc này file `resources/views/login.blade.php` sẽ nhận tham số `'title'` nhận vào bằng cách như sau:

```html
<title>{{ $title }}</title>
```
Lúc này chỉ cần thay giá trị `title` ở file `routes/view.blade.php` là được.