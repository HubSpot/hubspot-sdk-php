<?php

declare(strict_types=1);

namespace HubSpotSDK\Meta\Origins\IPRanges;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Concerns\SdkParams;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Meta\Origins\IPRanges\IPRangeListParams\Direction;
use HubSpotSDK\Meta\Origins\IPRanges\IPRangeListParams\Service;

/**
 * Retrieve a collection of IP ranges associated with specific services and directions, such as `EMAIL`, `API`, `DNS`, or `WEB_SCRAPING`. The response includes details like CIDR notation, description, and the direction of IP traffic.
 *
 * @see HubSpotSDK\Services\Meta\Origins\IPRangesService::list()
 *
 * @phpstan-type IPRangeListParamsShape = array{
 *   direction?: list<Direction|value-of<Direction>>|null,
 *   service?: list<Service|value-of<Service>>|null,
 * }
 */
final class IPRangeListParams implements BaseModel
{
    /** @use SdkModel<IPRangeListParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<value-of<Direction>>|null $direction */
    #[Optional(list: Direction::class)]
    public ?array $direction;

    /** @var list<value-of<Service>>|null $service */
    #[Optional(list: Service::class)]
    public ?array $service;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Direction|value-of<Direction>>|null $direction
     * @param list<Service|value-of<Service>>|null $service
     */
    public static function with(
        ?array $direction = null,
        ?array $service = null
    ): self {
        $self = new self;

        null !== $direction && $self['direction'] = $direction;
        null !== $service && $self['service'] = $service;

        return $self;
    }

    /**
     * @param list<Direction|value-of<Direction>> $direction
     */
    public function withDirection(array $direction): self
    {
        $self = clone $this;
        $self['direction'] = $direction;

        return $self;
    }

    /**
     * @param list<Service|value-of<Service>> $service
     */
    public function withService(array $service): self
    {
        $self = clone $this;
        $self['service'] = $service;

        return $self;
    }
}
