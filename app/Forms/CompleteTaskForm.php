<?php

declare(strict_types=1);

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class CompleteTaskForm extends Form
{
    public function buildForm(): void
    {
        $this->add('submit', 'submit', [
            'label' => 'Complete Task',
            'attr' => ['class' => 'form-control btn btn-success'],
        ]);
    }
}
