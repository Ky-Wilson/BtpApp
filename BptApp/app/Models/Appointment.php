<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    /**
     * Les attributs qui peuvent être assignés en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ad_id',
        'visitor_name',
        'visitor_email',
        'visitor_phone',
        'appointment_date',
    ];

    /**
     * Obtenir l'annonce associée au rendez-vous.
     */
    public function ad()
    {
        return $this->belongsTo(Ad::class);
    }
}