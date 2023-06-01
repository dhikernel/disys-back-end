<?php

declare(strict_types=1);

namespace App\Domain\Client\Models;

use App\Domain\Order\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;

    use SoftDeletes;

    public const TABLE_NAME = 'clients';

    public const PRIMARY_KEY = 'id';

    public const FILLABLE = [
        'name',
        'email',
        'phone',
        'birth_date',
        'address',
        'complement',
        'neighborhood',
        'zip_code',
    ];

    public $fillable = self::FILLABLE;

    protected $primaryKey = self::PRIMARY_KEY;

    protected $table = self::TABLE_NAME;

    public function order(): HasMany
    {
        return $this->hasMany(
            Order::class,
            'client_code',
            'id'
        );
    }

}
