<?php
namespace Smartdir\Services\Validation;

class UserRegistrationValidator extends Validator
{

    /**
     *
     * @var array Validation rules for the test form, they can contain in-built Laravel rules or our custom rules
     */
    public $rules = array(
        'username' => array(
            'required',
            'alpha_dash',
            'min:6',
            'max:255'
        ),
        'email' => array(
            'required',
            'email',
            'min:6',
            'max:255'
        ),
        'password' => array(
            'required',
            'alpha_num',
            'min:6',
            'max:255'
        )
    );
}