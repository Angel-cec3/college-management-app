<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'attendances';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'teacher_id',
        'student_class_id',
        'subject_id',
        'slot_id',
        'marked_at'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Get the teacher for this model.
     *
     * @return App\User
     */
    public function teacher()
    {
        return $this->belongsTo('App\User', 'teacher_id');
    }

    /**
     * Get the studentClass for this model.
     *
     * @return App\StudentClass
     */
    public function studentClass()
    {
        return $this->belongsTo('App\StudentClass', 'student_class_id');
    }

    /**
     * Get the subject for this model.
     *
     * @return App\Subject
     */
    public function subject()
    {
        return $this->belongsTo('App\Subject', 'subject_id');
    }

    /**
     * Get the slot for this model.
     *
     * @return App\Slot
     */
    public function slot()
    {
        return $this->belongsTo('App\Slot', 'slot_id');
    }

    /**
     * Set the marked_at.
     *
     * @param  string  $value
     * @return void
     */
    public function setMarkedAtAttribute($value)
    {
        $this->attributes['marked_at'] = !empty($value) ? \DateTime::createFromFormat('Y-m-d h:i:s A', $value) : null;
    }

    /**
     * Get marked_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getMarkedAtAttribute($value)
    {
        return \DateTime::createFromFormat('Y-m-d H:i:s', $value)->format('Y-m-d h:i:s A');
    }


    public function getMarkedAtHumanAttribute($value)
    {
        return \DateTime::createFromFormat('Y-m-d h:i:s A', $this->marked_at)->format('D M Y h:i A');
    }
}
