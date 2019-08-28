<?php

declare(strict_types=1);

namespace App\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class CreateTaskForm extends Form
{
    public function buildForm(): void
    {
        $this->add('assignee_id', Field::SELECT, [
                'label' => 'Assignee',
                'choices' => \App\User::all()->pluck('name', 'id')->toArray(),
                'empty_value' => '- Select assignee -'
            ])
            ->add('title')
            ->add('priority', Field::SELECT, [
                'choices' => range(0, 5),
                'empty_value' => '- Select Priority -',
            ])
            ->add('description', Field::TEXTAREA)
            ->add('submit', 'submit', [
                'label' => 'Save',
                'attr' => ['class' => 'form-control btn btn-primary'],
            ]);
    }
}
