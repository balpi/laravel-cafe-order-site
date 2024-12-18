<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    /** @use HasFactory<\Database\Factories\SettingsFactory> */
    use HasFactory;
    protected $fillable = [

        'Title',
        'Keywords',
        'Description',
        'Company',
        'Adress',
        'Phone',
        'Email',
        'SmtpServer',
        'SmtpEmail',
        'SmtpPassword',
        'SmtpPort',
        'Facebook',
        'Instagram',
        'X',
        'AboutUs',
        'Contact',
        'References',
        'Status',
        'created_at',
        'updated_at'



    ];
}
