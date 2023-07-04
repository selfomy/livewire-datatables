<?php

namespace Mediconesystems\LivewireDatatables;

use Illuminate\Support\Carbon;
use Whitecube\LaravelTimezones\Facades\Timezone;

class TimeColumn extends Column
{
    public $type = 'time';
    public $callback;

    public function __construct()
    {
        $this->format();
    }

    public function format($format = null)
    {
        $this->callback = function ($value) use ($format) {
            return $value ? Carbon::parse(Timezone::date(Carbon::createFromFormat($format ?? config('livewire-datatables.default_time_format'), $value)))->format($format ?? config('livewire-datatables.default_time_format')) : null;
        };

        return $this;
    }
}
