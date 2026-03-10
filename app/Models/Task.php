<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'is_completed',
        'completed_at',
    ];

    protected $casts = [
        'is_completed' => 'boolean',
        'completed_at' => 'datetime',
    ];

    public function attachments()
    {
        return $this->hasMany(TaskAttachment::class);
    }

    public function subtasks()
    {
        return $this->hasMany(Subtask::class);
    }

    public function updateCompletionFromSubtasks(): void
    {
        $total = $this->subtasks()->count();
        $completed = $this->subtasks()->where('status', 'completed')->count();

        if ($total > 0 && $total === $completed) {
            $this->update([
                'is_completed' => true,
                'completed_at' => now(),
            ]);
        } else {
            $this->update([
                'is_completed' => false,
                'completed_at' => null,
            ]);
        }
    }
}