<?php

namespace Neondigital\NeonArchitecture\Actions;

class CollectionResponseAction extends BaseAction
{
    /**
     * Create a new action instance.
     *
     * @return void
     */
    public function __construct($resourceClass, $data)
    {
        $this->resourceClass = $resourceClass;
        $this->data = $data;
    }

    /**
     * Execute the action.
     *
     * @return void
     */
    public function act()
    {
        return new $this->resourceClass($this->data);
    }
}
