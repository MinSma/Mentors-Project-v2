<?php
declare(strict_types = 1);

namespace App\Repositories;

use App\Models\Comment;

/**
 * Class CommentsRepository
 * @package App\Repositories
 */
class CommentsRepository extends Repository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return Comment::class;
    }
}