<?php
/**
 * Created by: Andrey Polyakov (andrey@polyakov.im)
 */

namespace Travelpayouts\components\formatters;

use Travelpayouts;
use Travelpayouts\traits\SingletonTrait;

class StopsNameFormatter extends Travelpayouts\components\BaseObject
{
    use SingletonTrait;

    public function format(string $value, string $locale)
    {
        $dictionary = [
            Travelpayouts::t('flights.stops.Direct', [], 'tables', $locale),
            Travelpayouts::t('flights.stops.1 Stop', [], 'tables', $locale),
            Travelpayouts::t('flights.stops.2 Stops', [], 'tables', $locale),
            Travelpayouts::t('flights.stops.3 Stops', [], 'tables', $locale),
        ];
        return $dictionary[$value] ?? null;
    }
}
