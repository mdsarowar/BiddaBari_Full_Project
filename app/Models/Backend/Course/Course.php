<?php

namespace App\Models\Backend\Course;

use App\Models\Backend\AdditionalFeatureManagement\Affiliation\AffiliationHistory;
use App\Models\Backend\AdditionalFeatureManagement\SiteSeo;
use App\Models\Backend\OrderManagement\ParentOrder;
use App\Models\Backend\UserManagement\Student;
use App\Models\Backend\UserManagement\Teacher;
use App\Models\CourseStudent;
use App\Models\Frontend\AdditionalFeature\ContactMessage;
use App\Models\Frontend\CourseOrder\CourseOrder;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title',
        'sub_title',
        'price',
        'banner',
        'description',
        'duration_in_month',
        'starting_date_time',
        'starting_date_time_timestamp',
        'ending_date_time',
        'ending_date_time_timestamp',
        'discount_type',
        'discount_amount',
        'partial_payment',
        'fack_student_count',
        'enroll_student_count',
        'featured_video_vendor',
        'featured_video_url',
        'total_video',
        'total_audio',
        'total_exam',
        'total_pdf',
        'total_note',
        'total_link',
        'total_live',
        'total_zip',
        'total_class',
        'total_hours',
        'total_file',
        'total_written_exam',
        'is_featured',
        'slug',
        'status',
        'is_approved',
        'is_paid',
        'show_home_slider',
        'discount_start_date',
        'discount_start_date_timestamp',
        'discount_end_date',
        'discount_end_date_timestamp',
        'admission_last_date',
        'affiliate_amount',
        'parent_id',
        'c_order'
    ];

    protected $searchableFields = ['*'];

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        static::deleting(function ($course){
            if (file_exists($course->image))
            {
                unlink($course->image);
            }
            if (!empty($course->courseRoutines))
            {
                $course->courseRoutines->each->delete();
            }
            if (!empty($course->courseSections))
            {
                $course->courseSections->each->delete();
            }
            if (!empty($course->courseCoupons))
            {
                $course->courseCoupons->each->delete();
            }
//            if (!empty($course->courseOrders))
//            {
//                $course->courseOrders->each->delete();
//            }
            if (!empty($course->parentOrders))
            {
                $course->parentOrders->each->delete();
            }
            if (!empty($course->teachers))
            {
                $course->teachers()->detach();
            }
            if (!empty($course->students))
            {
                $course->students()->detach();
            }
            if (!empty($course->courseCategories))
            {
                $course->courseCategories()->detach();
            }
            if (!empty($course->contactMessages))
            {
                $course->contactMessages->each->delete();
            }
            if (!empty($course->siteSeos))
            {
                $course->siteSeos->each->delete();
            }
            if (!empty($course->affiliationHistories))
            {
                $course->affiliationHistories->each->delete();
            }
            if (!empty($course->courses))
            {
                $course->courses->each->delete();
            }
        });
    }

    protected static $course;

    public static function createOrUpdateCourse ($request, $id = null)
    {
        $lastOrder = Course::orderBy("c_order", "DESC")->first();
        if (isset($id))
        {
            self::$course = Course::find($id);
        } else {
            self::$course = new Course();
        }
        self::$course->title                    = $request->title;
        self::$course->slug                     = str_replace(' ', '-', $request->title);
        self::$course->sub_title                = $request->sub_title;
        self::$course->price                    = $request->price;
        self::$course->banner                   = isset($id) ? imageUpload($request->file('banner'), 'course/course-banners/', 'courses', '1000', '600', Course::find($id)->banner) : imageUpload($request->file('banner'), 'course/course-banners/', 'courses', '1000', '600');
        self::$course->description              = $request->description;
        self::$course->duration_in_month        = $request->duration_in_month;
        self::$course->starting_date_time       = $request->starting_date_time;
        self::$course->starting_date_time_timestamp       = strtotime($request->starting_date_time);
        self::$course->ending_date_time         = $request->ending_date_time;
        self::$course->ending_date_time_timestamp       = strtotime($request->ending_date_time);
        self::$course->discount_type            = $request->discount_type;
//        self::$course->discount_amount          = $request->discount_type == 1 ? $request->discount_amount : (($request->price * $request->discount_amount)/100);
        self::$course->discount_amount          = $request->discount_amount;
        self::$course->discount_start_date      = $request->discount_start_date;
        self::$course->discount_start_date_timestamp   = strtotime($request->discount_start_date);
        self::$course->discount_end_date        = $request->discount_end_date;
        self::$course->discount_end_date_timestamp     = strtotime($request->discount_end_date);
        self::$course->partial_payment          = $request->partial_payment;
        self::$course->fack_student_count       = $request->fack_student_count;
//        self::$course->featured_video_url       = $request->featured_video_url;
        if (isset($request->featured_video_url))
        {
//            $vidUrlString = explode('https://youtu.be/', $request->featured_video_url)[1];
            $vidUrlString = explode('https://www.youtube.com/watch?v=', $request->featured_video_url)[1];
        }
        self::$course->featured_video_url       = isset($vidUrlString) ? $vidUrlString : (isset($id) ? self::$course->featured_video_url : null);
        self::$course->affiliate_amount         = $request->affiliate_amount;
        self::$course->featured_video_vendor    = $request->featured_video_vendor;
        self::$course->total_class              = $request->total_class;
        self::$course->total_hours               = $request->total_hours;
        self::$course->total_video              = $request->total_video;
        self::$course->total_audio              = $request->total_audio;
        self::$course->total_exam               = $request->total_exam;
        self::$course->total_pdf                = $request->total_pdf;
        self::$course->total_note               = $request->total_note;
        self::$course->total_link               = $request->total_link;
        self::$course->total_live               = $request->total_live;
        self::$course->total_zip                = $request->total_zip;
        self::$course->total_file               = $request->total_file;
        self::$course->total_written_exam       = $request->total_written_exam;
        self::$course->admission_last_date      = $request->admission_last_date;
        self::$course->c_order                  = isset($id) ? self::$course->c_order : (isset($lastOrder) ? $lastOrder->c_order+1 : 1);
        self::$course->status                   = $request->status == 'on' ? 1 : 0;
        self::$course->is_paid                  = $request->is_paid == 'on' ? 1 : 0;
        self::$course->is_featured              = $request->is_featured == 'on' ? 1 : 0;
        self::$course->show_home_slider         = $request->show_home_slider == 'on' ? 1 : 0;
        self::$course->save();
        self::$course->teachers()->sync($request->teachers_id);
        return self::$course;
    }

    public static function importCourseModel($data = null)
    {
        self::$course = new Course();
        self::$course->title                    = $data->title;
        self::$course->slug                     = $data->slug;
        self::$course->sub_title                = $data->sub_title;
        self::$course->price                    = $data->price;
        self::$course->banner                   = $data->banner;
        self::$course->description              = $data->description;
        self::$course->duration_in_month        = $data->duration_in_month;
        self::$course->starting_date_time       = $data->starting_date_time;
        self::$course->starting_date_time_timestamp       = $data->starting_date_time_timestamp;
        self::$course->ending_date_time         = $data->ending_date_time;
        self::$course->ending_date_time_timestamp       = $data->ending_date_time_timestamp;
        self::$course->discount_type            = $data->discount_type;
        self::$course->discount_amount          = $data->discount_amount;
        self::$course->discount_start_date      = $data->discount_start_date;
        self::$course->discount_start_date_timestamp   = $data->discount_start_date_timestamp;
        self::$course->discount_end_date        = $data->discount_end_date;
        self::$course->discount_end_date_timestamp     = $data->discount_end_date_timestamp;
        self::$course->partial_payment          = $data->partial_payment;
        self::$course->fack_student_count       = $data->fack_student_count;
        self::$course->featured_video_url       = $data->featured_video_url;
        self::$course->featured_video_vendor    = $data->featured_video_vendor;
        self::$course->affiliate_amount              = $data->affiliate_amount;
        self::$course->total_class              = $data->total_class;
        self::$course->total_hours               = $data->total_hours;
        self::$course->total_video              = $data->total_video;
        self::$course->total_audio              = $data->total_audio;
        self::$course->total_exam               = $data->total_exam;
        self::$course->total_pdf                = $data->total_pdf;
        self::$course->total_note               = $data->total_note;
        self::$course->total_link               = $data->total_link;
        self::$course->total_live               = $data->total_live;
        self::$course->total_zip                = $data->total_zip;
        self::$course->total_file               = $data->total_file;
        self::$course->total_written_exam       = $data->total_written_exam;
        self::$course->admission_last_date      = $data->admission_last_date;
        self::$course->status                   = $data->status;
        self::$course->is_paid                  = $data->is_paid;
        self::$course->is_featured              = $data->is_featured;
        self::$course->show_home_slider         = $data->show_home_slider;
        self::$course->save();
        return self::$course;
    }

    public function courseRoutines()
    {
        return $this->hasMany(CourseRoutine::class);
    }

    public function courseSections()
    {
        return $this->hasMany(CourseSection::class);
    }
    public function courseSectionsByOrder()
    {
        return $this->hasMany(CourseSection::class)->orderBy('order', 'ASC');
    }

    public function courseCoupons()
    {
        return $this->hasMany(CourseCoupon::class);
    }

    public function courseOrders()
    {
        return $this->hasMany(CourseOrder::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
    public function getStudents()
    {
        return $this->hasMany(CourseStudent::class, 'course_id', 'id');
    }
    public function studentsTemp()
    {
        return $this->belongsToMany(Student::class)->take(40000);
    }

    public function courseCategories()
    {
        return $this->belongsToMany(CourseCategory::class);
    }

    public function parentOrders()
    {
//        return $this->hasMany(ParentOrder::class, 'parent_model_id');
        return $this->hasMany(ParentOrder::class, 'parent_model_id')->where('ordered_for', 'course');
    }

    public function contactMessages()
    {
        return $this->hasMany(ContactMessage::class, 'parent_model_id');
//        return $this->hasMany(ContactMessage::class, 'parent_model_id')->where('type', 'course');
    }

    public function parentComments()
    {
        return $this->hasMany(ParentComment::class, 'parent_model_id');
    }

    public function siteSeos()
    {
        return $this->hasMany(SiteSeo::class, 'parent_model_id');
//        return $this->hasMany(SiteSeo::class, 'parent_model_id')->where('model_type', 'course');
    }

    public function affiliationHistories()
    {
        return $this->hasMany(AffiliationHistory::class, 'model_id');
//        return $this->hasMany(AffiliationHistory::class, 'model_id')->where('model_type', 'course');
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'parent_id')->orderBy('c_order', 'ASC');
    }

    public function courseSectionContents()
    {
        return $this->hasManyThrough(CourseSectionContent::class, CourseSection::class);
    }
}