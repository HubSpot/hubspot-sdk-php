<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type IntegratorOEmbedDomainModelShape = array{
 *   id: int,
 *   appId: int,
 *   createdAt: int,
 *   deletedAt: int,
 *   endpoints: Endpoints,
 *   portalId: int,
 *   updatedAt: int,
 * }
 */
final class IntegratorOEmbedDomainModel implements BaseModel
{
    /** @use SdkModel<IntegratorOEmbedDomainModelShape> */
    use SdkModel;

    #[Required]
    public int $id;

    #[Required]
    public int $appId;

    #[Required]
    public int $createdAt;

    #[Required]
    public int $deletedAt;

    #[Required]
    public Endpoints $endpoints;

    #[Required]
    public int $portalId;

    #[Required]
    public int $updatedAt;

    /**
     * `new IntegratorOEmbedDomainModel()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegratorOEmbedDomainModel::with(
     *   id: ...,
     *   appId: ...,
     *   createdAt: ...,
     *   deletedAt: ...,
     *   endpoints: ...,
     *   portalId: ...,
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
     *
     * @param Endpoints|array{
     *   discovery: bool, schemes: list<string>, url: string
     * } $endpoints
     */
    public static function with(
        int $id,
        int $appId,
        int $createdAt,
        int $deletedAt,
        Endpoints|array $endpoints,
        int $portalId,
        int $updatedAt,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['appId'] = $appId;
        $obj['createdAt'] = $createdAt;
        $obj['deletedAt'] = $deletedAt;
        $obj['endpoints'] = $endpoints;
        $obj['portalId'] = $portalId;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    public function withID(int $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj['appId'] = $appID;

        return $obj;
    }

    public function withCreatedAt(int $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    public function withDeletedAt(int $deletedAt): self
    {
        $obj = clone $this;
        $obj['deletedAt'] = $deletedAt;

        return $obj;
    }

    /**
     * @param Endpoints|array{
     *   discovery: bool, schemes: list<string>, url: string
     * } $endpoints
     */
    public function withEndpoints(Endpoints|array $endpoints): self
    {
        $obj = clone $this;
        $obj['endpoints'] = $endpoints;

        return $obj;
    }

    public function withPortalID(int $portalID): self
    {
        $obj = clone $this;
        $obj['portalId'] = $portalID;

        return $obj;
    }

    public function withUpdatedAt(int $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
