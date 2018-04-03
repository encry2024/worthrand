<?php
/**
 * Created by PhpStorm.
 * User: christanjake2024
 * Date: 1/26/18
 * Time: 2:06 PM
 */

namespace App\Repositories\Backend\Seal;

# Models
use App\Models\Seal\SealPricingHistory;
# Repository
use App\Repositories\BaseRepository;

/**
 * Class SealRepository.
 */
class SealPricingHistoryRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return SealPricingHistory::class;
    }
}
