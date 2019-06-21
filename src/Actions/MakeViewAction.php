<?php

namespace Neondigital\NeonArchitecture\Actions;

class MakeViewAction extends BaseAction
{
    protected $view;
    protected $data = [];

    /**
     * Create a new action instance.
     *
     * @return void
     */
    public function __construct($view, $data = [])
    {
        $this->view = $view;
        $this->data = $data;
    }

    /**
     * Execute the action.
     *
     * @return void
     */
    public function act()
    {
        return view($this->view, $this->data);
    }
}
