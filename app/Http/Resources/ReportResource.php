<?php

namespace App\Http\Resources;

use App\Http\Resources\Abstracts\AbstractJsonResource;
use App\Models\Branch;
use App\Models\BranchUser;
use App\Utility\UserType;
use Illuminate\Http\Request;

class ReportResource extends AbstractJsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array
     */
    public function modelResponse(Request $request): array
    {
        return [
            'month' => $this->month ?? '',
            'year' => $this->year ?? '',
            'paid' => $this->paid,
            'outstanding' => $this->outstanding,
            'overdue' => $this->overdue
        ];
    }
}
