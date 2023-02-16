<?php

namespace App\Imports;

use App\Models\Rate;
use App\Models\RateValue;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportRate implements WithHeadingRow, WithStartRow, ToCollection, WithValidation
{
    public function startRow(): int
    {
        return 2;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $rate = Rate::query()->firstOrNew([['type', $row['type']],['bank_id', $row['bank_id']]]);
            $rate->type = $row['type'];
            $rate->bank_id = $row['bank_id'];
            $rate->active = $row['active'];
            $rate->save();

            $rate_value = RateValue::query()->firstOrNew([['rate_id', $rate->id],['label', '5bps']]);
            $rate_value->rate_id = $rate->id;
            $rate_value->label = '5bps';
            $rate_value->value = $row['5bps'];
            $rate_value->save();

            $rate_value = RateValue::query()->firstOrNew([['rate_id', $rate->id],['label', '10bps']]);
            $rate_value->rate_id = $rate->id;
            $rate_value->label = '10bps';
            $rate_value->value = $row['10bps'];
            $rate_value->save();

            $rate_value = RateValue::query()->firstOrNew([['rate_id', $rate->id],['label', '15bps']]);
            $rate_value->rate_id = $rate->id;
            $rate_value->label = '15bps';
            $rate_value->value = $row['15bps'];
            $rate_value->save();

            $rate_value = RateValue::query()->firstOrNew([['rate_id', $rate->id],['label', '20bps']]);
            $rate_value->rate_id = $rate->id;
            $rate_value->label = '20bps';
            $rate_value->value = $row['20bps'];
            $rate_value->save();

            $rate_value = RateValue::query()->firstOrNew([['rate_id', $rate->id],['label', 'max']]);
            $rate_value->rate_id = $rate->id;
            $rate_value->label = 'max';
            $rate_value->value = $row['max'];
            $rate_value->save();

        }
    }

    public function rules(): array
    {
        return [

        ];
    }
    public function customValidationMessages()
    {
        return [

        ];
    }
}
