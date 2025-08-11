<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'description',
        'price',
        'status',
        'is_approved',
        'location',
        'surface',
        'nombre_de_pieces',
        'equipements',
        'images',
        'videos',
        'documents',
        'whatsapp_link',
        'phone_number',
    ];

    protected $casts = [
        'images' => 'array',
        'videos' => 'array',
        'documents' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

      /**
     * Accesseur pour obtenir le chemin de la première image.
     */
    public function getFirstImageAttribute()
    {
        // On s'assure que le champ "images" est bien un tableau
        if (is_array($this->images) && !empty($this->images)) {
            return $this->images[0];
        }

        // Retourne un chemin d'image par défaut si aucune image n'est trouvée
        return 'path/to/default/image.jpg'; 
    }

     /**
     * Obtenir les rendez-vous associés à cette annonce.
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
   
}