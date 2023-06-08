<?php

declare(strict_types=1);

namespace App\Domain\Client\Models;

use App\Domain\Order\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * @OA\Schema(
 *
 * @OA\Property(property="name", type="string", description="client name"),
 * @OA\Property(property="email", type="string", description="client email"),
 * @OA\Property(property="phone", type="string", description="client phone"),
 * @OA\Property(property="birth_date", type="date", description="client birth_date"),
 * @OA\Property(property="address", type="string", description="client address"),
 * @OA\Property(property="complement", type="string", description="client complement"),
 * @OA\Property(property="neighborhood", type="string", description="client neighborhood"),
 * @OA\Property(property="zip_code", type="string", description="client zip_code"),
 * )
 * Class Client
 * @method static find(int $id)
 */

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
