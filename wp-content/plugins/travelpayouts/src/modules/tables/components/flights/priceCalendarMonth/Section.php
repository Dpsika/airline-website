<?php

/**
 * Created by: Andrey Polyakov (andrey@polyakov.im)
 */

namespace Travelpayouts\modules\tables\components\flights\priceCalendarMonth;

use Travelpayouts;
use Travelpayouts\components\tables\TableShortcode;
use Travelpayouts\modules\tables\components\flights\BaseFields;
use Travelpayouts\modules\tables\components\flights\ColumnLabels;

/**
 * Class Section
 * @package Travelpayouts\src\modules\tables\components\flights\priceCalendarMonth
 */
class Section extends BaseFields
{
    /**
     * @var string
     */
    public $title;
    /**
     * @var string
     */
    public $title_tag;
    /**
     * @var string
     */
    public $button_title;
    /**
     * @var string
     */
    public $sort_by = ColumnLabels::DEPARTURE_AT;
    /**
     * @var string
     */
    public $use_pagination;
    /**
     * @var string
     */
    public $pagination_size;
    /**
     * @var string
     */
    public $row_link;
    /**
     * @var string
     */
    public $subid = 'calMonth';
    /**
     * @var string
     */
    public $stops = '0';

    /**
     * @return array
     */
    public function columnsOptions()
    {
        return [
            'enabled' => $this->getDashboardColumnLabels([
                ColumnLabels::DEPARTURE_AT,
                ColumnLabels::NUMBER_OF_CHANGES,
                ColumnLabels::BUTTON,
            ]),
            'disabled' => $this->getDashboardColumnLabels([
                ColumnLabels::PRICE,
                ColumnLabels::TRIP_CLASS,
                ColumnLabels::DISTANCE,
            ]),
        ];
    }

    /**
     * @inheritdoc
     */
    public function fields(): array
    {
        return [
            'title',
            'title_tag',
            'columns',
            'button_title',
            'sort_by',
            'use_pagination',
            'pagination_size',
            'row_link',
            'subid',
            'stops',
        ];
    }

    /**
     * @inheritDoc
     */
    public function optionPath(): string
    {
        return 'tp_price_calendar_month_shortcodes';
    }

    /**
     * @inheritDoc
     */
    public function titlePlaceholder($locale = null)
    {
        return Travelpayouts::t('flights.title.Flight prices for a month from {origin} to {destination}, one way', [], 'tables', $locale);
    }

    /**
     * @inheritDoc
     */
    public function buttonPlaceholder($locale = null)
    {
        return Travelpayouts::t('flights.button.OW tickets from {price}', [], 'tables', $locale);
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return Travelpayouts::__('Flights from origin to destination, one way (next month)');
    }

    /**
     * @inheritDoc
     */
    protected function getShortcode(): ?TableShortcode
    {
        return Table::getInstance();
    }
}
