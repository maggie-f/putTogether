<?php

namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

class CreateProject extends Form
{
    protected function _buildSchema(Schema $schema)
    {
        return $schema->addField('name', 'text')
                      ->addField('Guardar', ['type' => 'button',
                                             'action' => 'add']);
    }

    protected function _buildValidator(Validator $validator)
    {
        return $validator->add('name', 'length', [
                        'rule' => ['minLength', 5],
                        'message' => 'A name is required']);
    }
}