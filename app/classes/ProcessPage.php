<?php

namespace App\Classes;

class ProcessPage {
    private string $ready_page = '';

    /**
     * @param string $template
     * @param array $content
     */
    public function __construct(private string $template, private array $content)
    {
        // Load page template
        $this->getViewTemplate();

        // Apply content from the database
        $this->processData();
    }

    /**
     * Load page template
     *
     * @return void
     */
    private function getViewTemplate(): void
    {
        if (file_exists(BASEDIR . 'app/view/' . $this->template . '.php')) {
            $this->ready_page = file_get_contents(BASEDIR . 'app/view/' . $this->template . '.php');
        } else {
            $this->ready_page = 'Page template ' . $this->template . ' does not exist.';
        }
    }

    /**
     * Replace keys with their values in the page
     *
     * @return void
     */
    public function processData(): void
    {
        foreach($this->content as $key => $val) {
            $this->ready_page = str_replace("{@$key}}", $val, $this->ready_page);
        }
    }

    /**
     * Return the page content
     *
     * @return string
     */
    public function output(): string
    {
        return $this->ready_page;
    }
}