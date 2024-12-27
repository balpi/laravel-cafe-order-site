<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    /** @use HasFactory<\Database\Factories\MessagesFactory> */
    use HasFactory;
    protected $fillable = [

        'Name',
        'Email',
        'Phone',
        'Subject',
        'Message',
        'Status',
        'IP',
        'updated_at',
        'created_at',
        'Note'

    ];
}
