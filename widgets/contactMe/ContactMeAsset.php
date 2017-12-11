<?php
/**
 * Created by PhpStorm.
 * User: singletonn
 * Date: 12/3/17
 * Time: 11:31 PM
 */

namespace pantera\contactMe\widgets\contactMe;

use yii\web\AssetBundle;

class ContactMeAsset extends AssetBundle
{
    public $sourcePath = '@pantera/contactMe/widgets/contactMe/assets';
    public $js = [
        'js/script.js',
    ];
    public $depends = [
        'pantera\contactMe\LaddaAsset',
        'pantera\contactMe\GrowlAsset',
    ];
}