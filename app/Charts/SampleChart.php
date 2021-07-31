<?php

declare(strict_types = 1);

namespace App\Charts;


use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Psy\Command\DumpCommand;

class SampleChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        
        return Chartisan::build()
            ->labels(['Gen', 'Feb', 'Mar', 'Apr', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])
            ->dataset('Ristorante 1', [1, 2, 3])
            ->dataset('Ristorante 2', [3, 2, 1]);
    }
}