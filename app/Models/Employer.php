<?php /** @noinspection PhpUnused */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;


    /**
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'name',
        'position',
        'salary'
    ];
}
