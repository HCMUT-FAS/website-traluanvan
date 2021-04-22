```php
$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}
```

Code lines to explain from the example above:

First, we set up an SQL query that selects the id, firstname and lastname columns from the `MyGuests` table. The next line of code runs the query and puts the resulting data into a variable called `$result`.

Then, the function `num_rows()`checks if there are more than zero rows returned.

If there are more than zero rows returned, the function `fetch_assoc()` puts all the results into an associative array that we can loop through. The `while()` loop loops through the result set and outputs the data from the `id`, `firstname` and `lastname` columns.