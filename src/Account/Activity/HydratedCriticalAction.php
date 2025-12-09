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
 *   userId: int,
 *   actingUser?: string|null,
 *   countryCode?: string|null,
 *   infoUrl?: string|null,
 *   ipAddress?: string|null,
 *   location?: string|null,
 *   objectId?: string|null,
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
    #[Required]
    public int $userId;

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
    #[Optional]
    public ?string $infoUrl;

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
    #[Optional]
    public ?string $objectId;

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
     * HydratedCriticalAction::with(id: ..., createdAt: ..., type: ..., userId: ...)
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
        int $userId,
        ?string $actingUser = null,
        ?string $countryCode = null,
        ?string $infoUrl = null,
        ?string $ipAddress = null,
        ?string $location = null,
        ?string $objectId = null,
        ?string $regionCode = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['createdAt'] = $createdAt;
        $obj['type'] = $type;
        $obj['userId'] = $userId;

        null !== $actingUser && $obj['actingUser'] = $actingUser;
        null !== $countryCode && $obj['countryCode'] = $countryCode;
        null !== $infoUrl && $obj['infoUrl'] = $infoUrl;
        null !== $ipAddress && $obj['ipAddress'] = $ipAddress;
        null !== $location && $obj['location'] = $location;
        null !== $objectId && $obj['objectId'] = $objectId;
        null !== $regionCode && $obj['regionCode'] = $regionCode;

        return $obj;
    }

    /**
     * The unique ID of the activity.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The time the activity took place.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * The type of activity.
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * The user's unique ID.
     */
    public function withUserID(int $userID): self
    {
        $obj = clone $this;
        $obj['userId'] = $userID;

        return $obj;
    }

    /**
     * Email address of the user associated with the activity.
     */
    public function withActingUser(string $actingUser): self
    {
        $obj = clone $this;
        $obj['actingUser'] = $actingUser;

        return $obj;
    }

    /**
     * The approximate country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['countryCode'] = $countryCode;

        return $obj;
    }

    /**
     * A link to the URL where the action was taken in the account.
     */
    public function withInfoURL(string $infoURL): self
    {
        $obj = clone $this;
        $obj['infoUrl'] = $infoURL;

        return $obj;
    }

    /**
     * IP address where the activity originated.
     */
    public function withIPAddress(string $ipAddress): self
    {
        $obj = clone $this;
        $obj['ipAddress'] = $ipAddress;

        return $obj;
    }

    public function withLocation(string $location): self
    {
        $obj = clone $this;
        $obj['location'] = $location;

        return $obj;
    }

    /**
     * The ID of the affected object.
     */
    public function withObjectID(string $objectID): self
    {
        $obj = clone $this;
        $obj['objectId'] = $objectID;

        return $obj;
    }

    /**
     * The approximate region code.
     */
    public function withRegionCode(string $regionCode): self
    {
        $obj = clone $this;
        $obj['regionCode'] = $regionCode;

        return $obj;
    }
}
