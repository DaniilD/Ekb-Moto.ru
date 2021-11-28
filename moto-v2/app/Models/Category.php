<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $table = "category";

    public function parent() {
        $this->belongsTo(Category::class, "parent_id");
    }

    public function setName(string $name) {
        $this->name = $name;
    }

    public function setParentId(int $parentId) {
        $this->parent_id = $parentId;
    }

    public function uploadImage($image){

        if($image==null){return;}

        if($this->image !=null){
            Storage::delete('/uploads/tags/'.$this->image);
        }

        $fillename = Str::random(15).'.'.$image->extension();
        $image->move('uploads/tags/',$fillename);
        $this->image=$fillename;
        $this->save();
    }

}
