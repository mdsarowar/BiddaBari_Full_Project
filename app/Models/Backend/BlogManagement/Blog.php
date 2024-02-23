<?php

namespace App\Models\Backend\BlogManagement;

use App\Models\Backend\AdditionalFeatureManagement\SiteSeo;
use App\Models\Frontend\AdditionalFeature\ContactMessage;
use App\Models\Scopes\Searchable;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'blog_category_id',
        'title',
        'sub_title',
        'video_url',
        'image',
        'body',
        'author_id',
        'is_featured',
        'slug',
        'hit_count',
        'status',
    ];

    protected static $blog;

    public static function saveOrUpdateBlog ($request, $id = null)
    {
        Blog::updateOrCreate(['id' => $id], [
            'blog_category_id'          => $request->blog_category_id,
            'title'                     => $request->title,
            'sub_title'                 => $request->sub_title,
            'video_url'                 => isset($request->video_url) ? explode('https://youtu.be/', $request->video_url)[1] : '',
            'image'                     => imageUpload($request->file('image'), 'blog-management/blogs/', 'blog-', '', '800', (isset($id) ? Blog::find($id)->image : null) ),
            'body'                      => $request->body,
            'slug'                      => str_replace(' ', '-', $request->title),
            'author_id'                 => auth()->id(),
            'is_featured'               => $request->is_featured == 'on' ? 1 : 0,
            'status'                    => $request->status == 'on' ? 1 : 0,
        ]);
    }

    protected $searchableFields = ['*'];

    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function contactMessages()
    {
        return $this->hasMany(ContactMessage::class, 'parent_model_id');
//        return $this->hasMany(ContactMessage::class, 'parent_model_id')->where('type', 'blog');
    }

    public function siteSeos()
    {
        return $this->hasMany(SiteSeo::class, 'parent_model_id');
//        return $this->hasMany(SiteSeo::class, 'parent_model_id')->where('model_type', 'blog');
    }
}
