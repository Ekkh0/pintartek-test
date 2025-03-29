<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CardioEntry extends Model
{
    use HasFactory;

    protected $table = 'CardioEntries';

    protected $fillable = [
        'user_id',
        'date',
        'type_id',
        'duration',
        'distance',
    ];

    public function user():BelongsTo{
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cardioType():BelongsTo{
        return $this->belongsTo(CardioType::class, 'type_id');
    }

    public function formatDuration(): array
    {
        $duration = $this->duration;
        $hours = floor($duration / 3600);
        $duration %= 3600;
        $minutes = floor($duration / 60);
        $seconds = $duration % 60;
        
        return ['hours' => $hours, 'minutes' => $minutes, 'seconds' => $seconds];
    }

    public function formatPace(): string
    {
        $pace = ($this->duration/60) / $this->distance;
        $minutes = floor($pace);
        $seconds = round(($pace - $minutes) * 60);
        
        return sprintf("%02d : %02d", $minutes, $seconds);
    }
}
