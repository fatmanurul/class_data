<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    use HasFactory;
    protected $table = 'teachers';
    protected $primaryKey = 'tcr_id';

    const CREATED_AT = 'tcr_created_at';
    const UPDATED_AT = 'tcr_updated_at';
    const DELETED_AT = 'tcr_deleted_at';
    
    protected $guarded = ['tcr_id'];
}
