<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
        protected $fillable = [
            'category_id',
            'first_name',
            'last_name',
            'gender',
            'email',
            'tel',
            'address',
            'building',
            'detail',
        ];

        public function category() {
            return $this->belongsTo(Category::class);
        }

        public function scopeCategorySearch($query, $keyword, $gender, $category_id, $date, )
        {
            if (!empty($keyword)){
                $keyword = trim(mb_convert_kana($keyword, 's'));

                $query->where(function ($q) use ($keyword) {
                    $q->where('last_name', 'like', '%' . $keyword . '%')
                        ->orWhere('first_name', 'like', '%' . $keyword . '%')
                        ->orWhereRaw("CONCAT(last_name, first_name) like ?", ['%' . $keyword . '%'])
                        ->orWhere('email', 'like', '%' . $keyword . '%')

                        ->orWhereHas('category', function ($q) use ($keyword) {
                            $q->where('content', 'like', '%' . $keyword . '%');
                        });
                });
            }
            if (!empty($gender)){
                $query->where('gender', $gender);
            }

            if (!empty($category_id)){
                $query->where('category_id', $category_id);
            }

            if (!empty($date)){
                $query->whereDate('created_at', $date);
            }
            
            return $query;
        }
}
