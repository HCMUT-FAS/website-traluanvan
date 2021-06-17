
# code
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