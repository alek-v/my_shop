<?php

namespace App\Classes;

class Cookies {
    private array $cookie_data;

    public function __construct(private readonly string $cookie_name)
    {
        // Read cookie data
        $this->read();
    }

    /**
     * Read content of the cookie
     *
     * @return void
     */
    private function read(): void
    {
        if (isset($_COOKIE[$this->cookie_name])) {
            $this->cookie_data = unserialize($_COOKIE[$this->cookie_name]);
        } else {
            $this->cookie_data = [];
        }
    }

    /**
     * Return array with a content of the cookie
     *
     * @return array
     */
    public function show(): array
    {
        return $this->cookie_data;
    }

    /**
     * Add a value to the cookie
     *
     * @param array $item
     * @return bool
     */
    public function add(array $item): bool
    {
        // Add item
        $this->cookie_data[] = $item;

        // Update cookie
        return $this->update();
    }

    /**
     * Update cookie data
     *
     * @return bool
     */
    public function update(): bool
    {
        return setcookie($this->cookie_name, serialize($this->cookie_data), time() + 60*100000, '/');
    }

    /**
     * Delete cookie
     *
     * @return bool
     */
    public function delete(): bool
    {
        if (isset($_COOKIE[$this->cookie_name])) {
            unset($_COOKIE[$this->cookie_name]);
            setcookie($this->cookie_name, null, -1, '/');

            return true;
        }

        return false;
    }
}