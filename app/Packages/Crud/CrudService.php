<?php
namespace App\Packages\Crud;

class CrudService implements CrudPort{


    private $port = null;

    function __construct(CrudPort $crudPort)
    {
        $this->port = $crudPort;
    }

    function getList()
    {
        return $this->port->getList();
    }

    function create()
    {
        return $this->port->create();
    }

    function update()
    {
        return $this->port->update();
    }

    function delete()
    {
        return $this->port->delete();
    }

    function getItem($id)
    {
        return $this->port->getItem($id);
    }

    function getCount()
    {
        return $this->port->getCount();
    }


}
