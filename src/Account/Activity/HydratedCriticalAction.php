<?php

declare(strict_types=1);

namespace HubspotSDK\Account\Activity;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Details about the a particular security activity for a HubSpot account.
 *
 * @phpstan-type HydratedCriticalActionShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   type: string,
 *   userID: int,
 *   actingUser?: string|null,
 *   countryCode?: string|null,
 *   infoURL?: string|null,
 *   ipAddress?: string|null,
 *   location?: string|null,
 *   objectID?: string|null,
 *   regionCode?: string|null,
 * }
 */
final class HydratedCriticalAction implements BaseModel
{
    /** @use SdkModel<HydratedCriticalActionShape> */
    use SdkModel;

    /**
     * The unique ID of the activity.
     */
    #[Required]
    public string $id;

    /**
     * The time the activity took place.
     */
    #[Required]
    public \DateTimeInterface $createdAt;

    /**
     * The type of activity.
     */
    #[Required]
    public string $type;

    /**
     * The user's unique ID.
     */
    #[Required('userId')]
    public int $userID;

    /**
     * Email address of the user associated with the activity.
     */
    #[Optional]
    public ?string $actingUser;

    /**
     * The approximate country code.
     */
    #[Optional]
    public ?string $countryCode;

    /**
     * A link to the URL where the action was taken in the account.
     */
    #[Optional('infoUrl')]
    public ?string $infoURL;

    /**
     * IP address where the activity originated.
     */
    #[Optional]
    public ?string $ipAddress;

    #[Optional]
    public ?string $location;

    /**
     * The ID of the affected object.
     */
    #[Optional('objectId')]
    public ?string $objectID;

    /**
     * The approximate region code.
     */
    #[Optional]
    public ?string $regionCode;

    /**
     * `new HydratedCriticalAction()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HydratedCriticalAction::with(id: ..., createdAt: ..., type: ..., userID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HydratedCriticalAction)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withType(...)
     *   ->withUserID(...)
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
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        string $type,
        int $userID,
        ?string $actingUser = null,
        ?string $countryCode = null,
        ?string $infoURL = null,
        ?string $ipAddress = null,
        ?string $location = null,
        ?string $objectID = null,
        ?string $regionCode = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['type'] = $type;
        $self['userID'] = $userID;

        null !== $actingUser && $self['actingUser'] = $actingUser;
        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $infoURL && $self['infoURL'] = $infoURL;
        null !== $ipAddress && $self['ipAddress'] = $ipAddress;
        null !== $location && $self['location'] = $location;
        null !== $objectID && $self['objectID'] = $objectID;
        null !== $regionCode && $self['regionCode'] = $regionCode;

        return $self;
    }

    /**
     * The unique ID of the activity.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The time the activity took place.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The type of activity.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The user's unique ID.
     */
    public function withUserID(int $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    /**
     * Email address of the user associated with the activity.
     */
    public function withActingUser(string $actingUser): self
    {
        $self = clone $this;
        $self['actingUser'] = $actingUser;

        return $self;
    }

    /**
     * The approximate country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    /**
     * A link to the URL where the action was taken in the account.
     */
    public function withInfoURL(string $infoURL): self
    {
        $self = clone $this;
        $self['infoURL'] = $infoURL;

        return $self;
    }

    /**
     * IP address where the activity originated.
     */
    public function withIPAddress(string $ipAddress): self
    {
        $self = clone $this;
        $self['ipAddress'] = $ipAddress;

        return $self;
    }

    public function withLocation(string $location): self
    {
        $self = clone $this;
        $self['location'] = $location;

        return $self;
    }

    /**
     * The ID of the affected object.
     */
    public function withObjectID(string $objectID): self
    {
        $self = clone $this;
        $self['objectID'] = $objectID;

        return $self;
    }

    /**
     * The approximate region code.
     */
    public function withRegionCode(string $regionCode): self
    {
        $self = clone $this;
        $self['regionCode'] = $regionCode;

        return $self;
    }
}
