<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $table = 'reminders';

    protected $fillable = ['title', 'date', 'time', 'category_id', 'user_id'];

    /**
     * Get the category that owns the reminder.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the user that owns the reminder.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function is_past_due()
    {
        $now = Carbon::now();
        $reminder_time = Carbon::parse($this->date . ' ' . $this->time, $this->timezone);
        return $now->greaterThan($reminder_time);
    }

}