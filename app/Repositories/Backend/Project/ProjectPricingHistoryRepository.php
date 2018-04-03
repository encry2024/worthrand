<?php
/**
 * Created by PhpStorm.
 * User: christanjake2024
 * Date: 1/26/18
 * Time: 2:06 PM
 */

namespace App\Repositories\Backend\Project;

# Models
use App\Models\Project\ProjectPricingHistory;
# Repository
use App\Repositories\BaseRepository;

/**
 * Class ProjectRepository.
 */
class ProjectPricingHistoryRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return ProjectPricingHistory::class;
    }
}
