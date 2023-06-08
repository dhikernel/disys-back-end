<?php

declare(strict_types=1);

namespace App\Domain\Order\Models;

use App\Domain\Client\Models\Client;
use App\Domain\Product\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * @OA\Schema(
 *
 * @OA\Property(property="client_code", type="integer", description="client code"),
 * @OA\Property(property="product_code", type="integer", description="product code")
 * )
 * Class Order
 * @method static find(int $id)
 */

class Order extends Model
{
    use HasFactory;

    use SoftDeletes;

    public const TABLE_NAME = 'orders';

    public const PRIMARY_KEY = 'id';

    public const FILLABLE = [
        'client_code',
        'product_code',
    ];

    public $fillable = self::FILLABLE;

    protected $primaryKey = self::PRIMARY_KEY;

    protected $table = self::TABLE_NAME;

    public function product(): HasMany
    {
        return $this->hasMany(
            Product::class,
            'code',
            'product_code'
        );
    }

    public function client(): HasOne
    {
        return $this->hasOne(
            Client::class,
            'id',
            'client_code'

        );
    }

}
