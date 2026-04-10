<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Extensions\Calling;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Extensions\Calling\CompanyCallerID\CallerIDType;

/**
 * @phpstan-import-type ObjectCoordinatesShape from \HubSpotSDK\Crm\Extensions\Calling\ObjectCoordinates
 *
 * @phpstan-type CompanyCallerIDShape = array{
 *   callerIDType: CallerIDType|value-of<CallerIDType>,
 *   objectCoordinates: ObjectCoordinates|ObjectCoordinatesShape,
 *   name?: string|null,
 * }
 */
final class CompanyCallerID implements BaseModel
{
    /** @use SdkModel<CompanyCallerIDShape> */
    use SdkModel;

    /**
     * Specifies the type of caller ID, which is set to 'COMPANY' by default.
     *
     * @var value-of<CallerIDType> $callerIDType
     */
    #[Required('callerIdType', enum: CallerIDType::class)]
    public string $callerIDType;

    #[Required]
    public ObjectCoordinates $objectCoordinates;

    /**
     * The name associated with the company caller ID.
     */
    #[Optional]
    public ?string $name;

    /**
     * `new CompanyCallerID()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CompanyCallerID::with(callerIDType: ..., objectCoordinates: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CompanyCallerID)->withCallerIDType(...)->withObjectCoordinates(...)
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
     * @param ObjectCoordinates|ObjectCoordinatesShape $objectCoordinates
     * @param CallerIDType|value-of<CallerIDType> $callerIDType
     */
    public static function with(
        ObjectCoordinates|array $objectCoordinates,
        CallerIDType|string $callerIDType = 'COMPANY',
        ?string $name = null,
    ): self {
        $self = new self;

        $self['callerIDType'] = $callerIDType;
        $self['objectCoordinates'] = $objectCoordinates;

        null !== $name && $self['name'] = $name;

        return $self;
    }

    /**
     * Specifies the type of caller ID, which is set to 'COMPANY' by default.
     *
     * @param CallerIDType|value-of<CallerIDType> $callerIDType
     */
    public function withCallerIDType(CallerIDType|string $callerIDType): self
    {
        $self = clone $this;
        $self['callerIDType'] = $callerIDType;

        return $self;
    }

    /**
     * @param ObjectCoordinates|ObjectCoordinatesShape $objectCoordinates
     */
    public function withObjectCoordinates(
        ObjectCoordinates|array $objectCoordinates
    ): self {
        $self = clone $this;
        $self['objectCoordinates'] = $objectCoordinates;

        return $self;
    }

    /**
     * The name associated with the company caller ID.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
