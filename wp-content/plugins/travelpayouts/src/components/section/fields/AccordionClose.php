<?php

namespace Travelpayouts\components\section\fields;

class AccordionClose extends BaseField
{
    public $type = 'osc_accordion';
    public $id = 'we';
    public $position = 'end';
    public $class = 'travelpayouts-destroy';
    public $hideTitle = true;
    public $wrapField = false;

    public $skipSave  = true;
}