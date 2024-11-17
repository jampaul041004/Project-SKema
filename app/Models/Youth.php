<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Youth extends Model
{
    use HasFactory;

    // Define the fillable properties to allow mass assignment
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'age',
        'birthdate',
        'sex',
        'civil_status',
        'youth_classification',
        'youth_age_group',
        'email',
        'contact_number',
        'sitio',
        'highest_educational_attainment', // Added field
        'work_status',
        'registered_voter',
        'voted_last_election',
        'attended_kk_assembly',
        'kk_assembly_count',
    ];
}
