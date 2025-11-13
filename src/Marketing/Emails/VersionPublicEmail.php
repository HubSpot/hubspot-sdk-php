<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Emails;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;
use HubspotSDK\VersionUser;

/**
 * Model definition for a marketing email version. Contains metadata describing the version of the marketing email. It can be used to view edit history of a marketing email.
 *
 * @phpstan-type VersionPublicEmailShape = array{
 *   id: string,
 *   object: PublicEmail,
 *   updatedAt: \DateTimeInterface,
 *   user: VersionUser,
 * }
 */
final class VersionPublicEmail implements BaseModel, ResponseConverter
{
    /** @use SdkModel<VersionPublicEmailShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * ID of this marketing email version.
     */
    #[Api]
    public string $id;

    /**
     * A marketing email.
     */
    #[Api]
    public PublicEmail $object;

    #[Api]
    public \DateTimeInterface $updatedAt;

    /**
     * Model definition for a version user. Contains addition information about the user who created a version.
     */
    #[Api]
    public VersionUser $user;

    /**
     * `new VersionPublicEmail()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VersionPublicEmail::with(id: ..., object: ..., updatedAt: ..., user: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VersionPublicEmail)
     *   ->withID(...)
     *   ->withObject(...)
     *   ->withUpdatedAt(...)
     *   ->withUser(...)
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
        PublicEmail $object,
        \DateTimeInterface $updatedAt,
        VersionUser $user,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->object = $object;
        $obj->updatedAt = $updatedAt;
        $obj->user = $user;

        return $obj;
    }

    /**
     * ID of this marketing email version.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * A marketing email.
     */
    public function withObject(PublicEmail $object): self
    {
        $obj = clone $this;
        $obj->object = $object;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Model definition for a version user. Contains addition information about the user who created a version.
     */
    public function withUser(VersionUser $user): self
    {
        $obj = clone $this;
        $obj->user = $user;

        return $obj;
    }
}
