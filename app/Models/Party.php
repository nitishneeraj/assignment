<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;
    protected $table = 'parties';
    protected $fillable = [
        'party_type', 'full_name',
        'phone_no', 'address',
        'account_holder_name', 'account_no',
        'bank_name', 'party_branch_address',
        'branch_address', 'ifsc_code',
    ];
}
