<?php

namespace App\Http\Resources;

use App\Http\Resources\Abstracts\AbstractJsonResource;
use App\Models\Branch;
use App\Models\BranchUser;
use App\Utility\UserType;
use Illuminate\Http\Request;

class TransactionResource extends AbstractJsonResource
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
            'user' => $this->user->name,
            'amount' => $this->amount,
            'date_to_pay' => $this->date_to_pay,
            'status' => $this->status,
            'vat' => $this->vat,
            'including_vat' => $this->including_vat,
        ];
    }
}
