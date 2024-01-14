<?php
namespace App\Core;

class Form {
    private $fields = [];
    private $action;
    private $method;

    public function __construct($action = '', $method = 'post') {
        $this->action = $action;
        $this->method = $method;
    }

    public function addField(Field $field): void {
        $this->fields[] = $field;
    }

    public function toString(): string {
        $fieldsString = '';
        foreach ($this->fields as $field) {
            $fieldsString .= $field->toString();
        }
        return $fieldsString;
    }

    public function getAction(): string {
        return $this->action;
    }

    public function getMethod(): string {
        return $this->method;
    }
}