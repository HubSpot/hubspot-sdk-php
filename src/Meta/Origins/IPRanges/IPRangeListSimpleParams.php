<?php

declare(strict_types=1);

namespace HubspotSDK\Meta\Origins\IPRanges;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Meta\Origins\IPRanges\IPRangeListSimpleParams\Direction;
use HubspotSDK\Meta\Origins\IPRanges\IPRangeListSimpleParams\Service;

/**
 * Retrieve a simplified list of IP ranges for specified services and directions in plain text format. This endpoint provides a straightforward representation of IP ranges without additional metadata.
 *
 * @see HubspotSDK\Services\Meta\Origins\IPRangesService::listSimple()
 *
 * @phpstan-type IPRangeListSimpleParamsShape = array{
 *   direction?: list<Direction|value-of<Direction>>|null,
 *   service?: list<Service|value-of<Service>>|null,
 * }
 */
final class IPRangeListSimpleParams implements BaseModel
{
    /** @use SdkModel<IPRangeListSimpleParamsShape> */
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
