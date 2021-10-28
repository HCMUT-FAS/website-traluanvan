```
php artisan make:model Models/TenModel -m
```

Có nhiều Model nên ta phải thêm s
Tên trong Model phải viết hoa chữ cái đầu tiên

Cái `-m` là tạo cái migration để liên kết với database luôn.

Sau khi chạy lênh thì có file tại `/database/migrations/`

Thì trong này có form tạo bản ta chỉnh lại theo ý thích của mình. 
Để chạy tạo bảng thì ta sử dụng lệnh
``
php artisan migrate
```