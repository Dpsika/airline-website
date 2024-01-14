<?php
/**
 * Created by: Andrey Polyakov (andrey@polyakov.im)
 */

namespace Travelpayouts\components\tables;

use Travelpayouts;
use Travelpayouts\components\LanguageHelper;
use Travelpayouts\components\Translator;
use Travelpayouts\traits\SingletonTrait;

abstract class BaseColumnLabels
{
    use SingletonTrait;

    protected $domain = 'tables';

    protected $dashboardLocale = Translator::DEFAULT_TRANSLATION;

    public function __construct()
    {
        $this->dashboardLocale = LanguageHelper::isRuDashboard() ? LanguageHelper::DASHBOARD_RUSSIAN : LanguageHelper::DASHBOARD_ENGLISH;
    }

    /**
     * Набор ключей для symfony translator
     * @return string[]
     */
    public function translationKeys()
    {
        return [];
    }

    /**
     * Переводы для строк указанные по умолчанию
     * @return string[]
     */
    public function defaultTranslations()
    {
        return [];
    }

    /**
     * @param null|string[] $names
     * @param null|string $locale
     * @return string[]
     */
    public function getColumnLabels($names = null, $locale = null)
    {
        $labelsList =  $this->translatedStrings($locale);
        if (is_array($names)) {
            $result = [];
            foreach ($names as $key) {
                $result[$key] = array_key_exists($key, $labelsList) ? $labelsList[$key] : null;
            }
            return $result;
        }
        return $labelsList;
    }

    /**
     * @param null|string[] $names
     * @return string[]
     */
    public function getDashboardColumnLabels($names = null)
    {
        return $this->getColumnLabels($names, $this->dashboardLocale);
    }

    /**
     * @param null|string $locale
     * @return array
     */
    protected function translatedStrings($locale = null)
    {
        $result = [];
        foreach ($this->translationKeys() as $column => $value) {
            $result[$column] = Travelpayouts::t($value, [], $this->domain, $locale);
        }
        return $result;
    }
}
