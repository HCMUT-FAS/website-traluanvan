
# code
## INSERT INTO

```php
// prepare and bind
$stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $firstname, $lastname, $email);

// set parameters and execute
$firstname = "Phuong";
$lastname = "Dang";
$email = "phuong@example.com";
$stmt->execute();

$firstname = "Triet";
$lastname = "Do";
$email = "triet@example.com";
$stmt->execute();

$firstname = "Nhu";
$lastname = "Din";
$email = "nhu@example.com";
$stmt->execute();

echo "New records created successfully";

$stmt->close();
$conn->close();
```

# Giai thich code:

Prepared Statements la thuc hien lai code nhieu lan ma khong can ghi lai MySQL query

Thay dong lenh sau:

`"INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)"`

Trong lenh MySQL dau '?' thay the cho mot `interger`, `string`, `double` hay la `blob value`

Gio nhin vo cai dong `$stmt->bind_param("sss", $firstname, $lastname, $email);`

Luu y ham nay la de ket hop parameters toi MySQL query va noi toi thang database la may cai parameters nay la gi.

Ki hieu "sss" tuong trung cho kieu du lieu cua parameters

- i - interger
- d - double
- s - string
- b - blob

Nhung chu cai nay BAT BUOC phai de truoc ham `bind_param()` tranh tinh trang du lieu khong dung

## SELECT

Cách viết cấu trúc prepare tìm kiếm khác với cấu trúc `INSERT`

```php
//database
$mysqli = new mysqli("localhost","my_user","my_password","my_db");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

// Từ cần tìm kiếm.
$s="%Con gà%";
// Câu lệnh tìm kiếm
$sql = "SELECT * FROM $table WHERE LV_Ten LIKE ? OR GV1_Ten LIKE ? OR GV2_Ten LIKE ? OR LV_Ma LIKE ?;";
//Tạo câu lệnh prepare
$stmt = $mysqli->prepare($sql);
// Kết hợp các biến của "Câu lệnh tìm kiếm";
$stmt->bind_param('ssss', $s, $s, $s, $s);
//Thực thi 
$stmt->execute();
//Lấy giá trị
$result = $stmt->get_result();
// Create a prepared statement
$stmt -> close();
$mysqli -> close();
```