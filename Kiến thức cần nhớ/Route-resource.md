bây giờ trong file web.php thì ta phải 
```php
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@create')->name('home');
Route::get('/home', 'HomeController@store')->name('home');
```
Từng cái thì ta chỉ cần một dòng
```php
Route::resource('/admin', '<trỏ-tới-tên-controllers>');
Route::resource('/admin', 'AdminController');
```