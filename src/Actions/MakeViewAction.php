<?php

namespace Neondigital\NeonArchitecture\Actions;

class MakeViewAction extends BaseAction
{
    protected $view;
    protected $data;

    /**
     * Create a new action instance.
     *
     * @return void
     */
    public function __construct()
    {
        $argList = func_get_args();
        $this->view = $fruit = array_shift($argList);
        $this->data = $argList;
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
