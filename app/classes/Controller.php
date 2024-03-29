<?php

namespace App\Classes;
use Pimple\Container;

abstract class Controller {
    protected Container $container;
    private Database $db;

    public function __construct()
    {
        $container = new Container();
        $container['config'] = new Configuration();
        $container['database'] = fn() => new Database("mysql:host=" . $this->container['config']->getParameter('DBHOSTNAME') . ";dbname=" . $this->container['config']->getParameter('DBNAME'), $this->container['config']->getParameter('DBUSERNAME'), $this->container['config']->getParameter('DBPASSWORD'));

        $this->container = $container;
        $this->db = $this->container['database'];
    }

    /**
     * Instantiate and return model object
     *
     * @param string $model
     * @return object
     */
    protected function model(string $model): object
    {
        require BASEDIR . 'app/models/' . $model . '.php';

        // Instantiate model object
        return new $model($this->container);
    }

    /**
     * Return content of the page ready to display
     *
     * @param array $page_data
     * @return string
     */
    protected function view(array $page_data): string
    {
        $page = new ProcessPage($page_data['page_view'], $page_data['content']);

        return $page->output();
    }
}