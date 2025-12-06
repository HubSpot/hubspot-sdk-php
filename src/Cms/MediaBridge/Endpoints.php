<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type EndpointsShape = array{
 *   discovery: bool, schemes: list<string>, url: string
 * }
 */
final class Endpoints implements BaseModel
{
    /** @use SdkModel<EndpointsShape> */
    use SdkModel;

    #[Api]
    public bool $discovery;

    /** @var list<string> $schemes */
    #[Api(list: 'string')]
    public array $schemes;

    #[Api]
    public string $url;

    /**
     * `new Endpoints()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Endpoints::with(discovery: ..., schemes: ..., url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Endpoints)->withDiscovery(...)->withSchemes(...)->withURL(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $schemes
     */
    public static function with(
        bool $discovery,
        array $schemes,
        string $url
    ): self {
        $obj = new self;

        $obj['discovery'] = $discovery;
        $obj['schemes'] = $schemes;
        $obj['url'] = $url;

        return $obj;
    }

    public function withDiscovery(bool $discovery): self
    {
        $obj = clone $this;
        $obj['discovery'] = $discovery;

        return $obj;
    }

    /**
     * @param list<string> $schemes
     */
    public function withSchemes(array $schemes): self
    {
        $obj = clone $this;
        $obj['schemes'] = $schemes;

        return $obj;
    }

    public function withURL(string $url): self
    {
        $obj = clone $this;
        $obj['url'] = $url;

        return $obj;
    }
}
