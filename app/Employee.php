<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;

class Employee extends Model
{
    use HasFactory;

    public $table = 'employees';


    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'phone',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'employee_id', 'id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
