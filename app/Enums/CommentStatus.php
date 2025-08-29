<?php

namespace App\Enums;

enum CommentStatus: string
{
    case Draft = 'draft';
    case Accepted = 'accepted';
    case Rejected = 'rejected';
}
