<?php

namespace App\Http\Resources;

use App\Http\Resources\Abstracts\AbstractJsonResource;
use App\Models\Branch;
use App\Models\BranchUser;
use App\Utility\UserType;
use Illuminate\Http\Request;

class PaymentResource extends AbstractJsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array
     */
    public function modelResponse(Request $request): array
    {
        return [
            'id' => $this->id,
            'transaction' => $this->transaction,
            'amount' => $this->amount,
            'paid_on' => $this->paid_on,
            'details' => $this->details
        ];
    }
}
