<?php

namespace Apps\Fintech\Packages\Mf\Amcs;

use Apps\Fintech\Packages\Mf\Amcs\Model\AppsFintechMfAmcs;
use System\Base\BasePackage;

class MfAmcs extends BasePackage
{
    protected $modelToUse = AppsFintechMfAmcs::class;

    protected $packageName = 'mfamcs';

    public $mfamcs;

    public function getMfAmcByName($name)
    {
        if ($this->config->databasetype === 'db') {
            $conditions =
                [
                    'conditions'    => 'name = :name:',
                    'bind'          =>
                        [
                            'name'  => $name
                        ]
                ];

            $mfamc = $this->getByParams($conditions);
        } else {
            $this->ffStore = $this->ff->store($this->ffStoreToUse);

            $this->ffStore->setReadIndex(false);

            $mfamc = $this->ffStore->findBy(['name', '=', $name]);
        }

        if ($mfamc && count($mfamc) > 0) {
            return $mfamc[0];
        }

        return false;
    }

    public function addMfAmcs($data)
    {
        $this->ffStore = $this->ff->store($this->ffStoreToUse);

        $this->ffStore->setReadIndex(false);

        return $this->add($data);
    }

    public function updateMfAmcs($data)
    {
        $this->ffStore = $this->ff->store($this->ffStoreToUse);

        $this->ffStore->setReadIndex(false);

        if ($data['turn_around_time'] === '') {
            $data['turn_around_time'] = null;
        }

        return $this->update($data);
    }

    public function removeMfAmcs($data)
    {
        //
    }
}