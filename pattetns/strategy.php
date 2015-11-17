<?php
/**
 * @description: strategia to uzywanie roznych algorytmow do uzyskania tego samego celu np validacji
 */
namespace Patterns\Strategy;

/**
 * Class Validate
 * @package Patterns\Strategy
 */
abstract class Validate
{
    public $valueToValidation;
    public $errors;

    public function __construct($valuteToValidation)
    {
        $this->valueToValidation = $valuteToValidation;
    }

    public function isValid(){}
    public function getValidationDescription(){}

    public function getErrors()
    {
        if(!empty($this->errors)) {

            return $this->errors;
        }

        return null;
    }

}

/**
 * Class UsernameLengthValidate
 * @package Patterns\Strategy
 */
class UsernameLengthValidate extends Validate
{
    public function isValid()
    {
        if(strlen($this->valueToValidation) <= 5) {
            $this->errors[] = 'Validation lenngth of : ' . $this->valueToValidation . ' fail ';

            return false;
        } else {

            return true;
        }
    }

}

class UsernameNoDigitsValidate extends Validate
{
    public function isValid()
    {
        $regRule = '/^([^0-9]*)$/';
        if(preg_match($regRule,$this->valueToValidation)) {

            return true;
        } else {
            $this->errors[] = 'Value contain digits ' . $this->valueToValidation . ' fail !';

            return false;
        }
    }

}




class Simulate
{
    public static function execute()
    {
        $name = 'abcdefgh4454ijk';

        $validators = [];
        $validators[] = new UsernameLengthValidate($name);
        $validators[] = new UsernameNoDigitsValidate($name);


        foreach($validators as $validator) {
            if(!$validator->isValid()) {
                var_dump($validator->getErrors());
            } else {
                var_dump($validator->valueToValidation . ' is valid ');
            }
        }


    }
}
