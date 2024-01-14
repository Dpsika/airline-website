<?php
/**
 * Created by: Andrey Polyakov (andrey@polyakov.im)
 */

namespace Travelpayouts\modules\tables\components;

use Travelpayouts\components\Model;

class TableColumns extends Model
{
    public $_enabled;
    public $_disabled;

    public function rules()
    {
        return [
            [
                [
                    '_enabled',
                ],
                'strict' => true,
                'isEmpty' => static function ($value) {
                    return !is_array($value);
                },
                'required',
            ],
            [
                [
                    '_enabled',
                    '_disabled',
                ],
                'each',
                'rule' => [
                    'string',
                ],
            ],
        ];
    }

    /**
     * @return mixed
     */
    public function getEnabled(): ?array
    {
        return $this->_enabled;
    }

    /**
     * @param mixed $enabled
     */
    public function setEnabled($enabled): void
    {
        if (is_array($enabled)) {
            $this->_enabled = $this->filterColumns($enabled);
        }
    }

    /**
     * @return array
     */
    public function getDisabled(): ?array
    {
        return $this->_disabled;
    }

    /**
     * @param mixed $data
     */
    public function setDisabled($data): void
    {
        if (is_array($data)) {
            $this->_disabled = $this->filterColumns($data);
        }
    }

    protected function filterColumns(array $data): array
    {
        return array_filter($data, static function ($key) {
            return $key !== 'placebo';
        }, ARRAY_FILTER_USE_KEY);
    }

    /**
     * Массив всех доступных колонок
     * @return array
     */
    public function getAvailable(): array
    {
        return array_merge(
            $this->getEnabled() ?? [],
            $this->getDisabled() ?? []
        );
    }

}
