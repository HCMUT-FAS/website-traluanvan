<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IssuesThesis extends Model
{
    /*
        $form->thesis_id = $request->thesis_id;
        $form->user_id = $request->user_id;
        $form->expectedIssuesDate = $request->expected_date;
    */ 
    public $timestamps = false;
    protected $fillable = [
        'issuesDate', 
        'expectedIssuesDate', 
        'returnDate', 
        'expectedReturnDate', 
        'user_id', 
        'thesis_id', 
    ];
}
