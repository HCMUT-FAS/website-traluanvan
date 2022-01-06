# Prefex là thay cho đường dẫn

Các đường dẫn có cùng librarian:
```
localhost/librarian/abc
localhost/librarian/abc1
localhost/librarian/abc2
localhost/librarian/abc3
```
Thì viết `prefix` sẽ không viết lại cái librarian.

# Namespace là thay cho thư mục của Controller

Các Controller trong cùng một thư mục, như trong thư mục Librarian có 10 cái controller thì ta cần namespace để rút gọn lại.
thay vì
```php
Route::GET('home', 'Librarian.IssuesThesisController@index')->name('home');
Route::GET('home', 'Librarian.IssuesThesisController@accept')->name('librarian-accept');
Route::GET('home', 'Librarian.IssuesThesisController@decline')->name('librarian-decline');
Route::GET('home', 'Librarian.IssuesThesisController@return')->name('librarian-return');
```
Thì viết lại như thế này là ổn:

```php
Route::prefix('librarian')->namespace('Librarian')->middleware(['auth'])->group(function () {
    Route::GET('home', 'IssuesThesisController@index')->name('home');

    Route::POST('accept', [
        'uses' => 'IssuesThesisController@accept'
    ])->name('librarian-accept');

    Route::POST('decline', [
        'uses' => 'IssuesThesisController@decline'
    ])->name('librarian-decline');

    Route::POST('return', [
        'uses' => 'IssuesThesisController@return'
    ])->name('librarian-return');
});
```
