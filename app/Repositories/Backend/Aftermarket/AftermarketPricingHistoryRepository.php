<?php
/**
 * Created by PhpStorm.
 * User: christanjake2024
 * Date: 1/26/18
 * Time: 2:06 PM
 */

namespace App\Repositories\Backend\Aftermarket;

# Models
use App\Models\Aftermarket\AftermarketPricingHistory;
# Repository
use App\Repositories\BaseRepository;

/**
 * Class AftermarketRepository.
 */
class AftermarketPricingHistoryRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return AftermarketPricingHistory::class;
    }
}
