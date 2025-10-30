<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type IntegratorOEmbedDomainModelShape = array{
 *   id: int,
 *   appID: int,
 *   createdAt: int,
 *   deletedAt: int,
 *   endpoints: Endpoints,
 *   portalID: int,
 *   updatedAt: int,
 * }
 */
final class IntegratorOEmbedDomainModel implements BaseModel
{
    /** @use SdkModel<IntegratorOEmbedDomainModelShape> */
    use SdkModel;

    #[Api]
    public int $id;

    #[Api('appId')]
    public int $appID;

    #[Api]
    public int $createdAt;

    #[Api]
    public int $deletedAt;

    #[Api]
    public Endpoints $endpoints;

    #[Api('portalId')]
    public int $portalID;

    #[Api]
    public int $updatedAt;

    /**
     * `new IntegratorOEmbedDomainModel()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegratorOEmbedDomainModel::with(
     *   id: ...,
     *   appID: ...,
     *   createdAt: ...,
     *   deletedAt: ...,
     *   endpoints: ...,
     *   portalID: ...,
     *   updatedAt: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IntegratorOEmbedDomainModel)
     *   ->withID(...)
     *   ->withAppID(...)
     *   ->withCreatedAt(...)
     *   ->withDeletedAt(...)
     *   ->withEndpoints(...)
     *   ->withPortalID(...)
     *   ->withUpdatedAt(...)
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
        int $id,
        int $appID,
        int $createdAt,
        int $deletedAt,
        Endpoints $endpoints,
        int $portalID,
        int $updatedAt,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->appID = $appID;
        $obj->createdAt = $createdAt;
        $obj->deletedAt = $deletedAt;
        $obj->endpoints = $endpoints;
        $obj->portalID = $portalID;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    public function withID(int $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

        return $obj;
    }

    public function withCreatedAt(int $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withDeletedAt(int $deletedAt): self
    {
        $obj = clone $this;
        $obj->deletedAt = $deletedAt;

        return $obj;
    }

    public function withEndpoints(Endpoints $endpoints): self
    {
        $obj = clone $this;
        $obj->endpoints = $endpoints;

        return $obj;
    }

    public function withPortalID(int $portalID): self
    {
        $obj = clone $this;
        $obj->portalID = $portalID;

        return $obj;
    }

    public function withUpdatedAt(int $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
