<?php

/**
 * @author Roberto
 */

namespace TenilUser\Form;

use Zend\InputFilter\InputFilter;
use Zend\Validator;

class LoginFilter extends InputFilter {

    public function __construct() {

        $emailValidator = new Validator\EmailAddress();
        $this->add(array(
            'name' => 'email',
            'required' => TRUE,
            'validators' => array($emailValidator)
        ));

        $this->add(array(
            'name' => 'password',
            'required' => TRUE,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim')
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array(
                            'isEmpty' => 'Precisa ser preenchido'
                        ),
                    ),
                ),
            ),
        ));

    }

}