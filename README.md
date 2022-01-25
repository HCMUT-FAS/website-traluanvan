# Công nghệ sử dụng
- Framework: laravel 8
- Font-end: css Bootstrap, chưa có áp dụng js nào hết.
- Back-end: laravel (php framework)
- Database: mysql
# Cách cài đặt
## Các ứng dụng cần thiết
- [Git](https://git-scm.com/)
- [Laragon](https://laragon.org/) - nếu OS là windows
- [Xampp](https://www.apachefriends.org/download.html) - nếu OS là linux (Lưu ý cài phiên bản có php 7.4v)
## Windows OS
### Các bước cài đặt
1. Laragon
    
    Vào thư mục đã cài đặt Laragon, Ví dụ laragon được cài đặt vào ổ `C:` thì có đường dẫn như sau: `C:\laragon\`

    Mở thư mục `C:\laragon\www` lên bằng `git`:

    - Chuột phải vào thư mục `C:\laragon\www` > Git Bash Here
    - Nếu không có dòng `Git Bash Here` thì là bạn chưa cài đặt GIT (Quay lại bước "Cài đặt các ứng dụng cần thiết").
2. Clone reposotory

    Copy và Paste dòng lệnh sau vào GIT (sử dụng **chuột phải > paste**)
    ```bash
    git clone https://github.com/Achicken7301/thvlkt-BTL.git
    ```
3. Mở laragon > termnial
    ```bash
    composer install
    ```
    Trong quá trình commit code thì không thêm thư mục 'vendor' vào. Mà trong vendor có autoload nên ta cần phải `composer install` để tự động cài vendor.
4. Tạo server laravel

    `php artisan serve` để chạy dự án.
5. Tạo file môi trường .env và copy nội dung file .env.example vào file .env
## Linux OS
### Cài đặt và sử dụng Xampp

1. Thêm quyền eXecute cho file vừa tải về

    Ví dụ tên file như sau: `xampp-linux-x64-7.4.26-installer.run`
    ```bash
    sudo chmod +x xampp-linux-x64-7.4.26-installer.run
    ```
2. Cài đặt xampp

    Vào thư mục chứa file `xampp-linux-x64-7.4.26-installer.run`. 
    
    VD: `~/Download/xampp-linux-x64-7.4.26-installer.run` 

    ```bash
    sudo ~/Download/xampp-linux-x64-7.4.26-installer.run
    ```
3. Đổi root-dir

    VD: folder đã tải về nằm ở thư mục `~/Documents/website-traluanvan`.
    
    Để mở xampp lên `sudo /opt/lampp/manager-linux-x64.run`

    Đối với laragon thì root-dir nằm trong `laragon\www`. Còn đối với xampp thì ta cần đổi trong file Conf của Apache
    [hướng dẫn chi tiết](https://stackoverflow.com/questions/18902887/how-to-configuring-a-xampp-web-server-for-different-root-directory)

    Manage Servers > Apache Web Servers > nút Configure > Open Conf File

    Đổi 2 dòng thành đường dẫn tới dự án của mình VD: `/home/$USER/Document/website-traluanvan`
    ```conf
    DocumentRoot "/home/$USER/Document/website-traluanvan"
    <Directory "/home/$USER/Document/website-traluanvan">
    ```
4. Cài đặt composer
    [hướng dẫn](https://askubuntu.com/questions/604522/install-composer-and-configure-with-xampp)
    ```bash
    $ sudo curl -s https://getcomposer.org/installer | /opt/lampp/bin/php
    $ sudo ln -s /opt/lampp/bin/php /usr/local/bin/php
    $ sudo mv composer.phar /usr/local/bin/composer
    ```

    Để có file vendor thì `composer install`. Nếu nó tự động tải rồi có file vendor trong thư mục thì OK xong rồi đấy.

5. Tạo server laravel

    `php artisan serve` để chạy dự án.
6. Tạo file môi trường .env và copy nội dung file .env.example vào file .env

## Nếu có thắc mắc gì thêm thì vào [đây](https://github.com/Tra-Luan-Van-Tot-Nghiep-HCMUT/website-traluanvan/issues?q=is%3Aissue+is%3Aopen+label%3A%22good+first+issue%22) tìm trước khi tạo issue mới.
