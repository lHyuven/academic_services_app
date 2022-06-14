<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubmittedRequest extends Model
{
    use Uuids, HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected $fillable = ([
        'request_status',
        'completed_status',
        'release_status',
        'application_status',
        'signed_status',
        'request_details',
        'request_deadline',
        'school_year',
        'control_no',
        'reason',
        'signed_student_status',
        //
        //fk ids:
        'approved_by', 
        'forward_to',
        'client',    
        'received_by',
        'request_id',
        //
        'created_by',  
        'updated_by',
        'status',
    ]);
    public function approved_by()
    {
        return $this->belongsTo(User::class,'approved_by');
    }
    public function forward_to()
    {
        return $this->belongsTo(User::class,'forward_to');
    }
    public function client()
    {
        return $this->belongsTo(User::class,'client');
    }
    public function received_by()
    {
        return $this->belongsTo(User::class,'received_by');
    }
    public function requests(){
        return $this->belongsTo(Request::class, 'request_id');
    }
    //
    public function created_by_user()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function updated_by_user()
    {
        return $this->belongsTo(User::class,'updated_by');
    }
}