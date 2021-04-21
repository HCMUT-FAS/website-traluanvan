Cai nay de xem `auto_inscrease` khi tao bang no nhu the nao thoi

```php
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('Khang', 'Bui', 'khang@example.com')";

if ($conn->query($sql) === TRUE) {
  $last_id = $conn->insert_id;
  echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
```