<?php

namespace App\Core;

class Field
{
    private $attribute;
    private $label;
    private $type;

    const TYPE_TEXT = 'text';
    const TYPE_EMAIL = 'email';
    const TYPE_PASSWORD = 'password';
    const TYPE_NUMBER = 'number';

    const LABELS = [
        'firstname' => 'Họ',
        'lastname' => 'Tên',
        'email' => 'Email',
        'phone' => 'Số điện thoại',
        'password' => 'Mật khẩu',
        'confirmPassword' => 'Nhập lại mật khẩu',
    ];

    const TYPE_MAP = [
        'email' => self::TYPE_EMAIL,
        'password' => self::TYPE_PASSWORD,
        'age' => self::TYPE_NUMBER,
    ];

    public function __construct($attribute)
    {
        $this->attribute = $attribute;
        $this->setLabelByAttribute();
        $this->defineTypeByAttribute();
    }

    private function setLabelByAttribute(): void
    {
        $this->label = self::LABELS[$this->attribute] ?? $this->attribute;
    }

    private function defineTypeByAttribute(): void
    {
        $this->type = self::TYPE_MAP[$this->attribute] ?? self::TYPE_TEXT;
    }

    public function passwordField(): self
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }

    public function numberField(): self
    {
        $this->type = self::TYPE_NUMBER;
        return $this;
    }

    public function emailField(): self
    {
        $this->type = self::TYPE_EMAIL;
        return $this;
    }

    public function toString(): string
    {
        $key = strtolower($this->attribute);
        $label = self::LABELS[$key] ?? $this->attribute;
    
        return "<div class=\"col-md-6\">
                    <label for=\"{$key}\" class=\"form-label\">{$label}</label>
                    <input type=\"{$this->type}\" class=\"form-control mb-3\" id=\"{$key}\" name=\"{$key}\" placeholder=\"{$label}\">
                </div>";
    }
}
