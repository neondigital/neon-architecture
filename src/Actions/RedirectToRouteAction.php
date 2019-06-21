<?php

namespace Neondigital\NeonArchitecture\Actions;

class RedirectToRouteAction extends BaseAction
{
    protected $route;
    protected $data = [];

    /**
     * Create a new action instance.
     *
     * @return void
     */
    public function __construct($route, $data = [])
    {
        $this->route = $route;
        $this->data = $data;
    }

    /**
     * Execute the action.
     *
     * @return void
     */
    public function act()
    {
        return redirect(route($this->route, $this->data));
    }
}
