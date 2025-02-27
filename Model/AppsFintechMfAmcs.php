<?php

namespace Apps\Fintech\Packages\Mf\Amcs\Model;

use System\Base\BaseModel;

class AppsFintechMfAmcs extends BaseModel
{
    public $id;

    public $amc_code;

    public $amc_name;

    public $available_for_purchase;

    public $description;

    public $image;

    public $short_code;

    public $rta_info;

    public $address;

    public $phone_number;

    public $website;

    public $contact_email;
}