<?php

namespace Jekk0\laravel\Iso3166\Validation\Rules\Tests;

use Jekk0\laravel\Iso3166\Validation\Rules\Classes\CountryCodes;
use Jekk0\laravel\Iso3166\Validation\Rules\Iso3166Alpha3;

class Iso3166Alpha3Test extends \PHPUnit\Framework\TestCase
{
    protected $rule;

    protected function setUp(): void
    {
        $this->rule = new Iso3166Alpha3();
    }

    /**
     * @param $countryCode
     *
     * @dataProvider passesSuccessDataProvider
     */
    public function testPassesSuccess($countryCode)
    {
        $this->assertTrue($this->rule->passes('attr', $countryCode));
    }

    public function passesSuccessDataProvider()
    {
        $availableCountryCodes = (new CountryCodes())->getAlpha3Codes();
        $data = [];
        foreach ($availableCountryCodes as $countryCode) {
            $data[$countryCode] = $countryCode;
        }

        return [
            $data
        ];
    }

    public function testPassesInvalidStringLength()
    {
        $this->assertFalse($this->rule->passes('attr', 'AAAA'));
    }

    /**
     * @param $invalidCountryCode
     *
     * @dataProvider passesInvalidCountryCodesDataProvider
     */
    public function testPassesInvalidCountryCodes($invalidCountryCode)
    {
        $this->assertFalse($this->rule->passes('attr', $invalidCountryCode));
    }

    public function passesInvalidCountryCodesDataProvider()
    {
        return [['xxx'], ['XXX'], ['zzz'], ['ZZZ'],];
    }

    public function testSetErrorMessage()
    {
        $result = $this->rule->setErrorMessage('error');
        $this->assertInstanceOf(Iso3166Alpha3::class, $result);
    }

    public function testMessage()
    {
        $newErrorMessage = 'Ooops, form error. Parameter :attribute, Value: :input';
        $this->rule->setErrorMessage($newErrorMessage);
        $this->assertEquals($this->rule->message(), $newErrorMessage);
    }
}
