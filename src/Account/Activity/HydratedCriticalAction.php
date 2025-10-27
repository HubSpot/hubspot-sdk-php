<?php

declare(strict_types=1);

namespace HubspotSDK\Account\Activity;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Details about the a particular security activity for a HubSpot account.
 *
 * @phpstan-type hydrated_critical_action = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   type: string,
 *   userID: int,
 *   actingUser?: string,
 *   countryCode?: string,
 *   infoURL?: string,
 *   ipAddress?: string,
 *   location?: string,
 *   objectID?: string,
 *   regionCode?: string,
 * }
 */
final class HydratedCriticalAction implements BaseModel
{
    /** @use SdkModel<hydrated_critical_action> */
    use SdkModel;

    /**
     * The unique ID of the activity.
     */
    #[Api]
    public string $id;

    /**
     * The time the activity took place.
     */
    #[Api]
    public \DateTimeInterface $createdAt;

    /**
     * The type of activity.
     */
    #[Api]
    public string $type;

    /**
     * The user's unique ID.
     */
    #[Api('userId')]
    public int $userID;

    /**
     * Email address of the user associated with the activity.
     */
    #[Api(optional: true)]
    public ?string $actingUser;

    /**
     * The approximate country code.
     */
    #[Api(optional: true)]
    public ?string $countryCode;

    /**
     * A link to the URL where the action was taken in the account.
     */
    #[Api('infoUrl', optional: true)]
    public ?string $infoURL;

    /**
     * IP address where the activity originated.
     */
    #[Api(optional: true)]
    public ?string $ipAddress;

    #[Api(optional: true)]
    public ?string $location;

    /**
     * The ID of the affected object.
     */
    #[Api('objectId', optional: true)]
    public ?string $objectID;

    /**
     * The approximate region code.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        $obj->id = $id;
        $obj->createdAt = $createdAt;
        $obj->type = $type;
        $obj->userID = $userID;

        null !== $actingUser && $obj->actingUser = $actingUser;
        null !== $countryCode && $obj->countryCode = $countryCode;
        null !== $infoURL && $obj->infoURL = $infoURL;
        null !== $ipAddress && $obj->ipAddress = $ipAddress;
        null !== $location && $obj->location = $location;
        null !== $objectID && $obj->objectID = $objectID;
        null !== $regionCode && $obj->regionCode = $regionCode;

        return $obj;
    }

    /**
     * The unique ID of the activity.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The time the activity took place.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * The type of activity.
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }

    /**
     * The user's unique ID.
     */
    public function withUserID(int $userID): self
    {
        $obj = clone $this;
        $obj->userID = $userID;

        return $obj;
    }

    /**
     * Email address of the user associated with the activity.
     */
    public function withActingUser(string $actingUser): self
    {
        $obj = clone $this;
        $obj->actingUser = $actingUser;

        return $obj;
    }

    /**
     * The approximate country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

        return $obj;
    }

    /**
     * A link to the URL where the action was taken in the account.
     */
    public function withInfoURL(string $infoURL): self
    {
        $obj = clone $this;
        $obj->infoURL = $infoURL;

        return $obj;
    }

    /**
     * IP address where the activity originated.
     */
    public function withIPAddress(string $ipAddress): self
    {
        $obj = clone $this;
        $obj->ipAddress = $ipAddress;

        return $obj;
    }

    public function withLocation(string $location): self
    {
        $obj = clone $this;
        $obj->location = $location;

        return $obj;
    }

    /**
     * The ID of the affected object.
     */
    public function withObjectID(string $objectID): self
    {
        $obj = clone $this;
        $obj->objectID = $objectID;

        return $obj;
    }

    /**
     * The approximate region code.
     */
    public function withRegionCode(string $regionCode): self
    {
        $obj = clone $this;
        $obj->regionCode = $regionCode;

        return $obj;
    }
}
