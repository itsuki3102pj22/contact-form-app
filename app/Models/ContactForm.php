<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'email',
        'url',
        'gender',
        'age',
        'contact'
    ];

    public function scopeSearch($query, $search)
    {
        if (!empty($search)) {
            $search_split = mb_convert_kana($search, 's'); //全角スペースを半角
            $search_split2 = preg_split('/[\s]+/', $search_split); //空白で区切る
            $query->where(function ($query) use ($search_split2) {
                foreach ($search_split2 as $value) {
                    $query->orWhere('name', 'like', "%{$value}%");
                }
            });
        }
        return $query;
    }
}
