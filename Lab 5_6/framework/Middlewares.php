<?php
namespace Illuminate\framework;

abstract class Middlewares
{
    public $db;
    abstract function handle();
}
