<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $guarded;

    protected $appends = ['picUrl'];

    public function getPicUrlAttribute() {
        $url = $this->img ? asset('uploads/img/' . $this->img) : "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSURWyyYxG8FKFB-xYnnMhl1qztJVZouG1n9g&usqp=CAU";
        return $url;
    }
}
