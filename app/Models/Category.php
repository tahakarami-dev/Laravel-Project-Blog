<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'parent_id'
    ];

    public function parentCategory(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
       return $this->belongsTo(Category::class, 'parent_id','id')->withDefault(['title'=>'دسته بندی اصلی']);
    }

    public function childCategory(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Category::class, 'parent_id','id');
    }

    public static function getCategories(): array
    {
        $array=[];
       $categories = self::query()->with('childCategory')->where('parent_id',0)->get();
       foreach ($categories as $category1) {
           $array[$category1->id]= $category1->title;
           foreach ($category1->childCategory as $category2) {
               $array[$category2->id]= '-' . $category2->title;
               foreach ($category2->childCategory as $category3) {
                   $array[$category3->id]= '--' . $category3->title;
               }
           }
       }
          return $array;
    }

    protected static function boot(): void
    {
        parent::boot();
        self::deleting(function ($category){
            foreach ($category->childCategory()->get() as $child){
                $child->delete();
            }
        });
    }

    public function articles(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Article::class);
    }

//    public function articleCount($category_id): int
//    {
//      return  Article::query()->where('category_id',$category_id)->count();
//    }

//    public function getRouteKeyName()
//    {
//        return 'slug';
//    }
}
