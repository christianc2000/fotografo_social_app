<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;

use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

// use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    // use HasRoles;
    const EVENTO = "EVENTO"; //Cuando se invita a un fotografo a participar de un evento, notificar al user fotografo. Usar los datos de un evento como: id, titulo, url_imagen
    const FOTOC = "FOTO CLIENTE"; //Cuando el cliente aparece en una foto enviar al cliente, notificar al user cliente. Usar los datos de la imagen como: id, titulo, url_photo
    const COMPRAR = "FOTO COMPRAR";
    const ACEPTARFOTOGRAFO = "FOTOGRAFO ACEPTA";
    const ACEPTARCLIENTE = "CLIENTE ACEPTA";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastname',
        'fecha_nacimiento',
        'genero',
        'url_photo',
        'tipo', //A=admin,F=fotografo,C=cliente,O=Organizador
        'biografia', //fotografo
        'marca', //fotografo
        'slogan', //fotografo
        'direccion_envio', //cliente
        'gps', //cliente
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public static function getFotografos()
    {
        return self::whereIn('tipo', 'F')->get();
    }

    public static function clientes()
    {
        return self::where('tipo', 'C')->get();
    }
    public static function organizadors()
    {
        return self::where('tipo', 'O')->get();
    }
    public function eventos()
    {
        return $this->hasMany(Evento::class);
    }

    public function vinculacionEvento()
    {
        return $this->belongsToMany(Evento::class, 'evento_user')->withPivot('estado', 'fecha_envio', 'fecha_aceptacion', 'qr', 'fecha_asistencia', 'user_id', 'evento_id')->withTimestamps();
    }

    // public function fotografosVinculado(){
    //     return $this->belongsToMany(User::class, 'vinculado', 'organizador_id', 'fotografo_id')->withPivot('estado')->withTimestamps();
    // }
    public function organizadores()
    {
        return $this->belongsToMany(User::class, 'vinculado', 'fotografo_id', 'organizador_id')
            ->where('tipo', 'O')
            ->withPivot('estado')->withTimestamps();
    }

    public function fotografos()
    {
        return $this->belongsToMany(User::class, 'vinculado', 'organizador_id', 'fotografo_id')
            ->where('tipo', 'F')
            ->withPivot('estado')->withTimestamps();
    }
   
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    //relación con orden
    public function ordens()
    {
        return $this->hasMany(Orden::class);
    }

    public function suscripcions(){
        return $this->hasMany(Suscripcion::class);
    }
}
