<?php

namespace Travelpayouts\modules\tables\components\railway\tutu;

use Travelpayouts;
use Travelpayouts\components\tables\TableShortcode;
use Travelpayouts\modules\tables\components\railway\ColumnLabels;

/**
 * Class Section
 * @package Travelpayouts\src\modules\tables\components\railway\tutu
 */
class Section extends Travelpayouts\modules\tables\components\railway\BaseFields
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
     * @var array
     */
    public $columns;
    /**
     * @var string
     */
    public $button_title;
    /**
     * @var string
     */
    public $sort_by = ColumnLabels::ARRIVAL;
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
     * @return array
     */
    public function columnsOptions()
    {
        return [
            'enabled' => $this->getDashboardColumnLabels([
                ColumnLabels::TRAIN,
                ColumnLabels::ROUTE,
                ColumnLabels::DEPARTURE,
                ColumnLabels::ARRIVAL,
                ColumnLabels::DURATION,
                ColumnLabels::PRICES,
                ColumnLabels::DATES,
            ]),
            'disabled' => $this->getDashboardColumnLabels([
                ColumnLabels::ORIGIN,
                ColumnLabels::DESTINATION,
                ColumnLabels::DEPARTURE_TIME,
                ColumnLabels::ARRIVAL_TIME,
                ColumnLabels::ROUTE_FIRST_STATION,
                ColumnLabels::ROUTE_LAST_STATION,
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
        ];
    }

    /**
     * @inheritDoc
     */
    public function optionPath(): string
    {
        return 'tp_tutu_shortcodes';
    }

    /**
     * @inheritDoc
     */
    public function titlePlaceholder($locale = null)
    {
        return Travelpayouts::__('Train schedule {origin} — {destination}');
    }

    /**
     * @inheritDoc
     */
    public function buttonPlaceholder($locale = null)
    {
        return Travelpayouts::__('Select date');
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return Travelpayouts::__('Train schedule');
    }

    /**
     * @inheritDoc
     */
    protected function getShortcode(): ?TableShortcode
    {
        return TutuShortcodeModel::getInstance();
    }
}
