<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type EndpointsShape = array{
 *   discovery: bool, schemes: list<string>, url: string
 * }
 */
final class Endpoints implements BaseModel
{
    /** @use SdkModel<EndpointsShape> */
    use SdkModel;

    #[Required]
    public bool $discovery;

    /** @var list<string> $schemes */
    #[Required(list: 'string')]
    public array $schemes;

    #[Required]
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
        $self = new self;

        $self['discovery'] = $discovery;
        $self['schemes'] = $schemes;
        $self['url'] = $url;

        return $self;
    }

    public function withDiscovery(bool $discovery): self
    {
        $self = clone $this;
        $self['discovery'] = $discovery;

        return $self;
    }

    /**
     * @param list<string> $schemes
     */
    public function withSchemes(array $schemes): self
    {
        $self = clone $this;
        $self['schemes'] = $schemes;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
