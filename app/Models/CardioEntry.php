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

    public function formatDuration(): string
    {
        $duration = $this->duration;
        $minutes = floor($duration / 60);
        $seconds = $duration % 60;
        
        return sprintf("%d:%02d", $minutes, $seconds);
    }

    public function formatPace(): string
    {
        $pace = $this->duration / $this->distance;
        $minutes = floor($pace);
        $seconds = round(($pace - $minutes) * 60);
        
        return sprintf("%d:%02d", $minutes, $seconds);
    }
}
