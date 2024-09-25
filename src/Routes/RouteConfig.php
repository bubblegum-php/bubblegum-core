<?php

namespace Bubblegum\Routes;

/**
 * Route configuration
 */
class RouteConfig
{
    /**
     * @var string
     */
    protected string $regexPattern;
    /**
     * @var string|null
     */
    protected ?string $destinationName;
    /**
     * @var array
     */
    protected array $data = [];

    /**
     * @param string $uriTemplate
     * @param string $routedComponent
     * @param string|null $destinationNameByDefault
     */
    public function __construct(protected string $uriTemplate, protected string $routedComponent, ?string $destinationNameByDefault = null)
    {
        $this->destinationName = $destinationNameByDefault;
        $this->regexPattern = $this->generateRegexPattern();
    }

    /**
     * Set destination name, e.g. a controller method or a view name
     * @param string $destinationName
     * @return $this
     */
    public function to(string $destinationName): RouteConfig
    {
        $this->destinationName = $destinationName;
        return $this;
    }

    /**
     * Set data that must pass to the destination (destination examples: Controller method, named view)
     * @param array $data
     * @return $this
     */
    public function withData(array $data): RouteConfig
    {
        $this->data = $data;
        return $this;
    }

    /**
     * Merges data with existing data with replacement during duplication.
     * @param array $data
     * @return $this
     */
    public function withDataMerge(array $data): RouteConfig
    {
        $this->data = array_merge($this->data, $data);
        return $this;
    }

    /**
     * Supplement existing data without replacement. If the existing data contains the same key, skip it.
     * @param array $data
     * @return $this
     */
    public function withDataSupplement(array $data): RouteConfig
    {
        $this->data = array_merge($data, $this->data);
        return $this;
    }

    /**
     *
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return RoutedComponent
     */
    public function getRoutedComponent(): RoutedComponent
    {
        return new $this->routedComponent($this->destinationName);
    }

    /**
     * @return string
     */
    public function getRegexPattern(): string
    {
        return $this->regexPattern;
    }

    /**
     * @return string
     */
    protected function generateRegexPattern(): string
    {
        $pattern = preg_replace(
            '/\{(\w+)\}/',
            '(?P<$1>[^/]+)',
            trim($this->uriTemplate, '/')
        );
        return "#^$pattern\$#";
    }
}