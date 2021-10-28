tài liệu tham khảo:
# Tạo form search
https://www.youtube.com/watch?v=Mylh7H844Ro

# Paginate
https://laravel.com/docs/6.x/pagination#introduction
```php
<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Show all of the users for the application.
     *
     * @return Response
     */
    public function index()
    {
        $users = DB::table('users')->paginate(15);

        return view('user.index', ['users' => $users]);
    }
}
```