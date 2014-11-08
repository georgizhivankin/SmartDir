<?php
namespace Smartdir\Services\Validation;

class DirectoryValidator extends Validator
{

    /**
     *
     * @var array Validation rules for the test form, they can contain in-built Laravel rules or our custom rules
     */
    public $rules = array(
        'name' => array(
            'required',
            'max:255'
        ),
        'path' => array(
            'required'
        ),
        'assigned_to_user' => array(
        'required')
    );
}