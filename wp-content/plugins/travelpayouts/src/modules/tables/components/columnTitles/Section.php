<?php

namespace Travelpayouts\modules\tables\components\columnTitles;
use Travelpayouts\Vendor\DI\Annotation\Inject;
use Exception;
use Travelpayouts;
use Travelpayouts\admin\redux\base\ModuleSection;
use Travelpayouts\components\section\fields\Raw;
use Travelpayouts\components\HtmlHelper;
use Travelpayouts\includes\Router;
use Travelpayouts\modules\tables\components\Section as TablesSection;

class Section extends ModuleSection
{
    /**
     * @Inject
     * @var Router
     */
    protected $router;

    /**
     * @Inject
     * @var Travelpayouts\components\Translator
     */
    protected $translator;
    /**
     * @var string
     */
    public $translation_strings;

    /**
     * @var array<string,array<string,string>
     */
    protected $_translationStrings;

    public function __construct(TablesSection $parent, $config = [])
    {
        parent::__construct($parent, $config);
    }

    public function init()
    {
        parent::init();
        $this->setUpRoutes();
        $this->setUpTranslations();
    }

    /**
     * @return void
     */
    protected function setUpRoutes()
    {
        $controller = new Controller(['section' => $this]);
        $this->router->addRoutes([
            ['GET', 'columnTitles/translationPhrases', [$controller, 'actionTranslationPhrases']],
            [
                'GET',
                'columnTitles/data',
                [$controller, 'actionGetData'],
            ],
        ]);
    }

    /**
     * @return void
     */
    protected function setUpTranslations()
    {
        $this->translator->addArrayTranslations($this->getTranslationStrings(), 'tables');
    }

    /**
     * @inheritdoc
     */
    public function section(): array
    {
        return [
            'title' => Travelpayouts::__('Column titles'),
            'icon' => 'tp-icon tp-admin-sidebar-icon tp-icon-translate',
        ];
    }

    /**
     * @inheritDoc
     */
    public function fields(): array
    {
        $fieldId = 'translation_strings';

        return [
            [
                'id' => $fieldId,
                'type' => 'textarea',
                'readonly' => 'true',
                'class' => 'hidden',
            ],
            'travelpayouts_multiselect_react' => (new Raw())->setContent(
                HtmlHelper::reactWidget('TravelpayoutsColumnTitles', [
                    'outputSelector' => "#{$this->getOptionPath()}_{$fieldId}",
                    'apiUrl' => admin_url('admin-ajax.php'),
                ])
            )
        ];
    }

    /**
     * @return array<string,array<string,string>|null
     */
    public function getTranslationStrings()
    {
        try {
            $this->_translationStrings = $this->translation_strings ? json_decode($this->translation_strings, true) : [];
        } catch (Exception $e) {
            $this->_translationStrings = [];
        }
        return $this->_translationStrings;
    }

    /**
     * @inheritDoc
     */
    public function optionPath(): string
    {
        return 'column_titles';
    }

}
