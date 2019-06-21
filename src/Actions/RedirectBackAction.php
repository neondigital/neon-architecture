<?php

namespace Neondigital\NeonArchitecture\Actions;

class RedirectBackAction extends BaseAction
{
    protected $errors = [];

    /**
     * Create a new action instance.
     *
     * @return void
     */
    public function __construct($errors = [])
    {
        $this->errors = $errors;
    }

    /**
     * Execute the action.
     *
     * @return void
     */
    public function act()
    {
        return redirect()->back()->withErrors($this->errors);
    }
}
