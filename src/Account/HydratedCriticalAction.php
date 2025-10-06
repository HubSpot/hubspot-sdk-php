<?php

declare(strict_types=1);

namespace HubspotSDK\Account;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
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

    #[Api]
    public string $id;

    #[Api]
    public \DateTimeInterface $createdAt;

    #[Api]
    public string $type;

    #[Api('userId')]
    public int $userID;

    #[Api(optional: true)]
    public ?string $actingUser;

    #[Api(optional: true)]
    public ?string $countryCode;

    #[Api('infoUrl', optional: true)]
    public ?string $infoURL;

    #[Api(optional: true)]
    public ?string $ipAddress;

    #[Api(optional: true)]
    public ?string $location;

    #[Api('objectId', optional: true)]
    public ?string $objectID;

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

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }

    public function withUserID(int $userID): self
    {
        $obj = clone $this;
        $obj->userID = $userID;

        return $obj;
    }

    public function withActingUser(string $actingUser): self
    {
        $obj = clone $this;
        $obj->actingUser = $actingUser;

        return $obj;
    }

    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

        return $obj;
    }

    public function withInfoURL(string $infoURL): self
    {
        $obj = clone $this;
        $obj->infoURL = $infoURL;

        return $obj;
    }

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

    public function withObjectID(string $objectID): self
    {
        $obj = clone $this;
        $obj->objectID = $objectID;

        return $obj;
    }

    public function withRegionCode(string $regionCode): self
    {
        $obj = clone $this;
        $obj->regionCode = $regionCode;

        return $obj;
    }
}
