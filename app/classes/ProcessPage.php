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

        // Include page elements
        $this->includeElements();

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
     * Include page elements (header, footer, sidebar...)
     *
     * @return void
     */
    private function includeElements(): void
    {
        // Elements to include
        preg_match_all('/{@include_element\[(.*)\]}}/', $this->ready_page, $matches);

        // Get contents of the element, set key and value
        foreach($matches[1] as $element) {
            // Set key and element content
            $element_content = file_get_contents(BASEDIR . 'app/view/page_elements/' . $element . '.php');
            $this->content['include_element[' . $element . ']'] = $element_content;
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