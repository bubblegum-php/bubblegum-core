<?php

namespace Bubblegum\Routes;

class RouteConfig
{
    protected string $regexPattern;
    protected string $destinationName;
    protected array $data = [];

    public function __construct(protected string $uri, protected string $routedComponentName, ?string $destinationNameByDefault = null)
    {
        $this->destinationName = $destinationNameByDefault;
        $this->regexPattern = $this->generateRegexPattern();
    }

    public function to(string $destinationName): RouteConfig
    {
        $this->destinationName = $destinationName;
        return $this;
    }

    public function withData(array $data): RouteConfig
    {
        $this->data = $data;
        return $this;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getRoutedComponent(): RoutedComponent
    {
        return new $this->routedComponentName($this->destinationName);
    }

    public function getRegexPattern(): string
    {
        return $this->regexPattern;
    }

    protected function generateRegexPattern(): string
    {
        $escaped = preg_quote(trim($this->uri, '/'), '/');
        return "/^$escaped\$/";
    }
}