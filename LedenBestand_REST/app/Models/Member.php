<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    public static function createMember(string $firstName, string $lastName) {
        $member = new Member;
        $member->firstName = firstName;
        return $member;
    }
    
    protected $fillable = ['firstName', 'lastName', 'type', 'andereVereniging'];
}
