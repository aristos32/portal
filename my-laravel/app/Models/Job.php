<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Job
{
    public static function all(): array
    {
        return [
            [
                'id' => 1,
                'title' => 'PHP Developer',
                'salary' => '$60,000',
            ],
            [
                'id' => 2,
                'title' => 'Python Developer',
                'salary' => '$70,000',
            ],
            [
                'id' => 3,
                'title' => 'Java Developer',
                'salary' => '$80,000',
            ],
        ];
    }

    public static function find(int $id): array
    {
        $job = Arr::first(self::all(), fn($job) => $job['id'] == $id);

        // sad path
        if (!$job) {
            abort(404);
        }

        // happy path
        return $job;
    }

}