<?php

declare(strict_types=1);

namespace HubSpotSDK\Meta\Origins;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Meta\Origins\IPRange\Direction;
use HubSpotSDK\Meta\Origins\IPRange\Service;

/**
 * @phpstan-type IPRangeShape = array{
 *   cidr: string,
 *   description: string,
 *   direction: Direction|value-of<Direction>,
 *   service: Service|value-of<Service>,
 * }
 */
final class IPRange implements BaseModel
{
    /** @use SdkModel<IPRangeShape> */
    use SdkModel;

    /**
     * The CIDR notation representing the IP range.
     */
    #[Required]
    public string $cidr;

    /**
     * A description of the IP range.
     */
    #[Required]
    public string $description;

    /**
     * The direction of the IP traffic, which can be INGRESS or EGRESS.
     *
     * @var value-of<Direction> $direction
     */
    #[Required(enum: Direction::class)]
    public string $direction;

    /**
     * The service associated with the IP range, such as EMAIL, API, DNS, or WEB_SCRAPING.
     *
     * @var value-of<Service> $service
     */
    #[Required(enum: Service::class)]
    public string $service;

    /**
     * `new IPRange()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IPRange::with(cidr: ..., description: ..., direction: ..., service: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IPRange)
     *   ->withCidr(...)
     *   ->withDescription(...)
     *   ->withDirection(...)
     *   ->withService(...)
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
     * @param Direction|value-of<Direction> $direction
     * @param Service|value-of<Service> $service
     */
    public static function with(
        string $cidr,
        string $description,
        Direction|string $direction,
        Service|string $service,
    ): self {
        $self = new self;

        $self['cidr'] = $cidr;
        $self['description'] = $description;
        $self['direction'] = $direction;
        $self['service'] = $service;

        return $self;
    }

    /**
     * The CIDR notation representing the IP range.
     */
    public function withCidr(string $cidr): self
    {
        $self = clone $this;
        $self['cidr'] = $cidr;

        return $self;
    }

    /**
     * A description of the IP range.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * The direction of the IP traffic, which can be INGRESS or EGRESS.
     *
     * @param Direction|value-of<Direction> $direction
     */
    public function withDirection(Direction|string $direction): self
    {
        $self = clone $this;
        $self['direction'] = $direction;

        return $self;
    }

    /**
     * The service associated with the IP range, such as EMAIL, API, DNS, or WEB_SCRAPING.
     *
     * @param Service|value-of<Service> $service
     */
    public function withService(Service|string $service): self
    {
        $self = clone $this;
        $self['service'] = $service;

        return $self;
    }
}
