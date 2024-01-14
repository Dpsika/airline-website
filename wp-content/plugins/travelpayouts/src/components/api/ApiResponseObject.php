<?php
/**
 * Created by: Andrey Polyakov (andrey@polyakov.im)
 */

namespace Travelpayouts\components\api;

use ArrayAccess;
use Travelpayouts\components\BaseInjectedObject;
use Travelpayouts\interfaces\Arrayable;
use Travelpayouts\traits\ArrayableTrait;
use Travelpayouts\traits\SingletonTrait;

abstract class ApiResponseObject extends BaseInjectedObject implements Arrayable, ArrayAccess
{
    use SingletonTrait;
    use ArrayableTrait;

    /**
     * @inheritDoc
     */
    public function offsetExists($offset): bool
    {
        return isset($this->$offset);
    }

    /**
     * @inheritDoc
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->$offset;
    }

    /**
     * @inheritDoc
     */
    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value)
    {
        return $this->$offset;
    }

    /**
     * @inheritDoc
     */
    #[\ReturnTypeWillChange]
    public function offsetUnset($offset)
    {
        $this->$offset = null;
    }
}
