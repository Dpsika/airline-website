<?php

namespace Travelpayouts\modules\account;

use Travelpayouts;
use Travelpayouts\admin\redux\base\ModuleSection;
use Travelpayouts\components\HtmlHelper;
use Travelpayouts\components\Platforms;

class AccountForm extends ModuleSection
{
    /**
     * @var string
     */
    public $api_token;
    /**
     * @var string
     */
    public $api_marker;
    /**
     * @var string
     */
    public $platform;
    /**
     * @var string
     */
    public $flights_domain;
    /**
     * @var string
     */
    public $hotels_domain;
    /**
     * @var string
     */
    public $wl_domain;

    /**
     * @inheritdoc
     */
    public function section(): array
    {
        return [
            'title' => Travelpayouts::__('Account'),
            'icon' => 'el el-user',
        ];
    }

    /**
     * @inheritdoc
     */
    public function fields(): array
    {
        return [
            'api_token' => $this->fieldInput()
                ->setTitle(Travelpayouts::__('Your Travelpayouts API token'))
                ->setSubtitle('<a href="https://www.travelpayouts.com/programs/100/tools/api" target="_blank" class="tp-link">' . Travelpayouts::__('Get API token and affiliate ID') . '</a>')
                ->setDesc(Travelpayouts::__('Insert your API token')),
            'api_marker' => $this->fieldInput()
                ->setTitle(Travelpayouts::__('Your Travelpayouts affiliate ID'))
                ->setDesc(Travelpayouts::__('Insert your affiliate ID')),
            'platform' => $this->fieldTrafficSource()
                ->setTitle(Travelpayouts::__('Traffic Source'))
                ->setSubtitle(HtmlHelper::tag(
                        'p',
                        [],
                        Travelpayouts::__('Please select a relevant source for your website')
                    ) . HtmlHelper::tag(
                        'p',
                        [],
                        Travelpayouts::__('<a href="https://support.travelpayouts.com/hc/en-us/articles/360015015439-Traffic-sources" target="_blank" class="tp-link">What is a traffic source?</a>')
                ))
                ->setDesc(Travelpayouts::__('To attribute your stats correctly, please select a relevant source for your website. You can edit or add new sources at <a href="https://www.travelpayouts.com/profile/sources" class="tp-link" target="_blank">Travelpayouts.com</a>'))
                ->setOptions(Platforms::getInstance()->getSelectOptions()),
            'wl_domain_start' => $this->fieldSection()
                ->setTitle(Travelpayouts::__('Domain of your White Label'))
                ->setSubtitle(Travelpayouts::__('Enter domain configured at Travelpayouts')),
            'flights_domain' => $this->fieldInput()
                ->setTitle(Travelpayouts::__('Flights White Label'))
                ->setDesc(Travelpayouts::__('Make sure that your white label’s URL contains /flights after domain. For example "mywhitelabel.com/fligths"')),
            'hotels_domain' => $this->fieldInput()
                ->setTitle(Travelpayouts::__('Hotels White Label'))
                ->setDesc(Travelpayouts::__('Make sure that your white label’s URL contains /hotels after domain. For example "mywhitelabel.com/hotels"')),
            'wl_domain_end' => $this->fieldSection()
        ];
    }

    /**
     * @inheritDoc
     */
    public function optionPath(): string
    {
        return 'account';
    }
}
