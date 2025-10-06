<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIStaticTimeZoneStrategy\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type api_static_time_zone_strategy = array{
 *   timeZoneID: string, type: value-of<Type>
 * }
 */
final class APIStaticTimeZoneStrategy implements BaseModel
{
    /** @use SdkModel<api_static_time_zone_strategy> */
    use SdkModel;

    #[Api('timeZoneId')]
    public string $timeZoneID;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new APIStaticTimeZoneStrategy()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIStaticTimeZoneStrategy::with(timeZoneID: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIStaticTimeZoneStrategy)->withTimeZoneID(...)->withType(...)
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $timeZoneID,
        Type|string $type = 'STATIC_TIME_ZONE'
    ): self {
        $obj = new self;

        $obj->timeZoneID = $timeZoneID;
        $obj['type'] = $type;

        return $obj;
    }

    public function withTimeZoneID(string $timeZoneID): self
    {
        $obj = clone $this;
        $obj->timeZoneID = $timeZoneID;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
