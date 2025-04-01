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
        'date', # Remember to format date to 'Y/m/d'
        'type_id',
        'duration', # Duration is in seconds
        'distance', # Distance is in Km
    ];

    public function user():BelongsTo{
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cardioType():BelongsTo{
        return $this->belongsTo(CardioType::class, 'type_id');
    }

    # Function to get the time that is saved in seconds to be in hour min and secs
    public function formatDuration(): array
    {
        $duration = $this->duration;
        $hours = floor($duration / 3600);
        $duration %= 3600;
        $minutes = floor($duration / 60);
        $seconds = $duration % 60;
        
        return ['hours' => $hours, 'minutes' => $minutes, 'seconds' => $seconds];
    }

    # Function to get the pace in string
    public function formatPace(): string
    {
        $pace = ($this->duration/60) / $this->distance;
        $minutes = floor($pace);
        $seconds = round(($pace - $minutes) * 60);
        
        return sprintf("%02d : %02d", $minutes, $seconds);
    }
}
