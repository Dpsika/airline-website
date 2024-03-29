<?php
/**
 * Created by: Andrey Polyakov (andrey@polyakov.im)
 */

namespace Travelpayouts\modules\tables\components\api\travelpayouts\v1\cityDirections;

use Travelpayouts\helpers\ArrayHelper;
use Travelpayouts\modules\tables\components\api\travelpayouts\BaseTravelpayoutsApiModel;

class CityDirectionsApiModel extends BaseTravelpayoutsApiModel
{
    protected $responseClass = CityDirectionApiResponse::class;

    public $currency = 'RUB';
    public $origin;

    public function rules()
    {
        return array_merge(parent::rules(), [
            [['currency', 'origin'], 'required'],
            [['currency', 'origin'], 'string', 'length' => 3],
        ]);
    }

    /**
     * @inheritDoc
     */
    protected function endpointUrl()
    {
        return 'http://api.travelpayouts.com/v1/city-directions';
    }

    public function afterRequest()
    {
        parent::afterRequest(); // TODO: Change the autogenerated stub
        $response = $this->response;
        if (is_array($response) && ArrayHelper::isAssociative($response)) {
            $this->response = array_values($response);
        }
    }
}
