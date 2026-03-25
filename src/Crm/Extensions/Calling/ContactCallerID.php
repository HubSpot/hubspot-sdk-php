<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Calling;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Extensions\Calling\ContactCallerID\CallerIDType;

/**
 * @phpstan-import-type ObjectCoordinatesShape from \HubspotSDK\Crm\Extensions\Calling\ObjectCoordinates
 *
 * @phpstan-type ContactCallerIDShape = array{
 *   callerIDType: CallerIDType|value-of<CallerIDType>,
 *   objectCoordinates: ObjectCoordinates|ObjectCoordinatesShape,
 *   email?: string|null,
 *   firstName?: string|null,
 *   lastName?: string|null,
 * }
 */
final class ContactCallerID implements BaseModel
{
    /** @use SdkModel<ContactCallerIDShape> */
    use SdkModel;

    /** @var value-of<CallerIDType> $callerIDType */
    #[Required('callerIdType', enum: CallerIDType::class)]
    public string $callerIDType;

    #[Required]
    public ObjectCoordinates $objectCoordinates;

    #[Optional]
    public ?string $email;

    #[Optional]
    public ?string $firstName;

    #[Optional]
    public ?string $lastName;

    /**
     * `new ContactCallerID()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ContactCallerID::with(callerIDType: ..., objectCoordinates: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ContactCallerID)->withCallerIDType(...)->withObjectCoordinates(...)
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
        CallerIDType|string $callerIDType = 'CONTACT',
        ?string $email = null,
        ?string $firstName = null,
        ?string $lastName = null,
    ): self {
        $self = new self;

        $self['callerIDType'] = $callerIDType;
        $self['objectCoordinates'] = $objectCoordinates;

        null !== $email && $self['email'] = $email;
        null !== $firstName && $self['firstName'] = $firstName;
        null !== $lastName && $self['lastName'] = $lastName;

        return $self;
    }

    /**
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

    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    public function withFirstName(string $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    public function withLastName(string $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

        return $self;
    }
}
