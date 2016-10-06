<?php

namespace Application\Form;

use Zend\Form\Form;

class AccountForm extends Form
{

    public function __construct($name = null)
    {
        parent::__construct($name);
        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'form-horizontal');

        $this->add(array(
            'name' => 'email',
            'attributes' => array(
                'type' => 'text',
                'class' => 'form-control',
                'placeholder' => _('Email adres')
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'class' => 'btn btn-default',
                'value' => _('Update'),
                'id' => 'submitbutton',
            ),
        ));
    }

}
