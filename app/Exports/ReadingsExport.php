<?php

namespace App\Exports;

use App\Models\Reading;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReadingsExport implements FromCollection, WithHeadings
{
    protected $apartmentId;

    public function __construct($apartmentId)
    {
        $this->apartmentId = $apartmentId;
    }

    public function collection()
    {
        return Reading::with(['user', 'meter.apartment']) //user and meters corresponding apartment
            ->whereHas('meter', fn($q) => $q->where('apartment_id', $this->apartmentId))->get() ->map(function ($reading) {
                return [
                    'ID' => $reading->id,
                    'Dzīvoklis' => $reading->meter->apartment->address . ', Dz. ' . $reading->meter->apartment->apartment_number,
                    'Skaitītāja tips' => $reading->meter->type_lv,
                    'Vārds' => $reading->user->first_name ?? '',//put empty if null
                    'Uzvārds' => $reading->user->last_name ?? '',
                    'Rādījums' => $reading->value,
                    'Statuss' => $reading->status_lv,
                    'Iesniegšanas datums' => $reading->submission_date,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Dzīvoklis',
            'Skaitītāja tips',
            'Vārds',
            'Uzvārds',
            'Rādījums',
            'Statuss',
            'Iesniegšanas datums',
        ];
    }
}
