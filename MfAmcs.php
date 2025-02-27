<?php

namespace Apps\Fintech\Packages\Mf\Houses;

use Apps\Fintech\Packages\Mf\Amcs\Model\AppsFintechMfAmcs;
use System\Base\BasePackage;

class MfAmcs extends BasePackage
{
    protected $modelToUse = AppsFintechMfAmcs::class;

    protected $packageName = 'mfamcs';

    public $mfamcs;

    public function getMfHouseByCode($code)
    {
        if ($this->config->databasetype === 'db') {
            $conditions =
                [
                    'conditions'    => 'amc_code = :code:',
                    'bind'          =>
                        [
                            'code'  => $code
                        ]
                ];
        } else {
            $conditions =
                [
                    'conditions'    => [
                        ['amc_code', '=', $code]
                    ]
                ];
        }

        $mfhouse = $this->getByParams($conditions);

        if ($mfhouse && count($mfhouse) > 0) {
            return $mfhouse[0];
        }

        return false;
    }

    public function addMfHouses($data)
    {
        //
    }

    public function updateMfHouses($data)
    {
        $mfamcs = $this->getById($id);

        if ($mfamcs) {
            //
            $this->addResponse('Success');

            return;
        }

        $this->addResponse('Error', 1);
    }

    public function removeMfHouses($data)
    {
        $mfamcs = $this->getById($id);

        if ($mfamcs) {
            //
            $this->addResponse('Success');

            return;
        }

        $this->addResponse('Error', 1);
    }
}