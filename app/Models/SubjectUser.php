<?php


namespace App\Models;


class SubjectUser extends BaseModel
{
    protected $table = 'subject_user';

    protected $fillable = [
        "user_id",
        "parent_id",
        "subject_id",
        "status",
    ];
}
