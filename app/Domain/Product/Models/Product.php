<?php

declare(strict_types=1);

namespace App\Domain\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * @OA\Schema(
 *
 * @OA\Property(property="code", type="integer", description="Product Code"),
 * @OA\Property(property="names", type="string", description="Product name"),
 * @OA\Property(property="price", type="decimal", description="Product price"),
 * @OA\Property(property="photo", type="string", description="Product photo")
 * )
 * Class Product
 */
class Product extends Model
{
    use HasFactory;

    use SoftDeletes;

    public const TABLE_NAME = 'products';

    public const PRIMARY_KEY = 'id';

    public const FILLABLE = [
        'code',
        'name',
        'price',
        'photo',
    ];

    public $fillable = self::FILLABLE;

    protected $primaryKey = self::PRIMARY_KEY;

    protected $table = self::TABLE_NAME;

}
