<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ScheduleContent extends Model
{
    protected $table = 'schedule_content';

    protected $guarded = ['id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function publish()
    {
        $this->update(['status' => 'published']);
    }

    public function unpublish()
    {
        $this->update(['status' => 'draft']);
    }

    public static function contentToBePublishedNow()
    {
        return static::where('status', '=', 'draft')->where('schedule_on', '<=', Carbon::now())->get();
    }
}
