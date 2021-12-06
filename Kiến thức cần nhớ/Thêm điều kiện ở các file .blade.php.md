# Giả sử ở `./routes/web.php` người ta truyền vào các tham số như `age` thì khi ở file `./recources/file.blade.php` ta thêm điều kiện như thế nào khi `age > 15` thì làm cái này `age < 2` thì làm cái khác.



## Điều kiện if
[Hướng dẫn](https://www.youtube.com/watch?v=pQ2vxa4_f2w&list=PL4cUxeGkcC9hL6aCFKyagrT1RCfVN4w2Q&index=5)

```
@if ($age < 2 )
    <p>tuổi nhỏ hơn 2<p>
@esleif($age > 15)
    <p>tuổi lớn hơn 15<p>
@esle
    <p> Tuổi từ 2 tới 15 <p>
@endif
```

## Vòng lặp
[Hướng dẫn](https://www.youtube.com/watch?v=Po1i6BYG84c&list=PL4cUxeGkcC9hL6aCFKyagrT1RCfVN4w2Q&index=6)

Vòng lặp for và foreach

Ông ngày bảo vòng lặp foreach tốt hơn

Chền thêm câu điều kiện cho giá trị array đầu tiên 

`$loop->first` và `$loop->last`

```
@if($loop->first)
    <span> thêm vào giá trị đầu tiên của mảng <span>
@endif
```