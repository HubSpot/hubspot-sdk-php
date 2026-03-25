<?php

declare(strict_types=1);

namespace HubspotSDK\Meta\Origins\IPRanges;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Meta\Origins\IPRanges\IPRangeListParams\Direction;
use HubspotSDK\Meta\Origins\IPRanges\IPRangeListParams\Service;

/**
 * Retrieve a collection of IP ranges associated with specific services and directions, such as `EMAIL`, `API`, `DNS`, or `WEB_SCRAPING`. The response includes details like CIDR notation, description, and the direction of IP traffic.
 *
 * @see HubspotSDK\Services\Meta\Origins\IPRangesService::list()
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

    /**
     * An array of traffic directions to filter the IP ranges. Valid values are `INGRESS` and `EGRESS`.
     *
     * @var list<value-of<Direction>>|null $direction
     */
    #[Optional(list: Direction::class)]
    public ?array $direction;

    /**
     * An array of service types to filter the IP ranges. Valid values include `EMAIL`, `API`, `DNS`, `WEB_SCRAPING`, and `TEST_SERVICE`.
     *
     * @var list<value-of<Service>>|null $service
     */
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
     * An array of traffic directions to filter the IP ranges. Valid values are `INGRESS` and `EGRESS`.
     *
     * @param list<Direction|value-of<Direction>> $direction
     */
    public function withDirection(array $direction): self
    {
        $self = clone $this;
        $self['direction'] = $direction;

        return $self;
    }

    /**
     * An array of service types to filter the IP ranges. Valid values include `EMAIL`, `API`, `DNS`, `WEB_SCRAPING`, and `TEST_SERVICE`.
     *
     * @param list<Service|value-of<Service>> $service
     */
    public function withService(array $service): self
    {
        $self = clone $this;
        $self['service'] = $service;

        return $self;
    }
}
