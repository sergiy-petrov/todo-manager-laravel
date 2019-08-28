<?php

declare(strict_types=1);

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class DeleteTaskForm extends Form
{
    public function buildForm()
    {
        $this->add('submit', 'submit', [
            'label' => 'Delete Task',
            'attr' => ['class' => 'form-control btn btn-danger'],
        ]);
    }
}
