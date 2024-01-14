<?php
/**
 * Created by: Andrey Polyakov (andrey@polyakov.im)
 */

namespace Travelpayouts\modules\tables\components\flights\columns;

use Travelpayouts;
use Travelpayouts\components\grid\columns\GridColumn;

class ColumnStops extends GridColumn
{
    protected $locale = 'en';

    public function renderDataCellContent($model, $key, $index)
    {
        $value = $this->getDataCellValue($model, $key, $index);
        if ($value !== null) {
            $dictionary = [
                Travelpayouts::t('flights.stops.Direct', [], 'tables', $this->locale),
                Travelpayouts::t('flights.stops.1 Stop', [], 'tables', $this->locale),
                Travelpayouts::t('flights.stops.2 Stops', [], 'tables', $this->locale),
                Travelpayouts::t('flights.stops.3 Stops', [], 'tables', $this->locale),
            ];
            return $dictionary[$value] ?? null;
        }
        return null;
    }

    /**
     * @inheritDoc
     */
    protected function getSortOrderValue($model, $key, int $index)
    {
        return (int)$this->getDataCellValue($model, $key, $index);
    }

}
