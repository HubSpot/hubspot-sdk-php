<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\MediaBridge;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type EndpointsShape from \HubspotSDK\Cms\MediaBridge\Endpoints
 *
 * @phpstan-type IntegratorOEmbedDomainModelShape = array{
 *   id: int,
 *   appID: int,
 *   createdAt: int,
 *   deletedAt: int,
 *   endpoints: Endpoints|EndpointsShape,
 *   portalID: int,
 *   updatedAt: int,
 * }
 */
final class IntegratorOEmbedDomainModel implements BaseModel
{
    /** @use SdkModel<IntegratorOEmbedDomainModelShape> */
    use SdkModel;

    #[Required]
    public int $id;

    #[Required('appId')]
    public int $appID;

    #[Required]
    public int $createdAt;

    #[Required]
    public int $deletedAt;

    #[Required]
    public Endpoints $endpoints;

    #[Required('portalId')]
    public int $portalID;

    #[Required]
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
     *
     * @param EndpointsShape $endpoints
     */
    public static function with(
        int $id,
        int $appID,
        int $createdAt,
        int $deletedAt,
        Endpoints|array $endpoints,
        int $portalID,
        int $updatedAt,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['appID'] = $appID;
        $self['createdAt'] = $createdAt;
        $self['deletedAt'] = $deletedAt;
        $self['endpoints'] = $endpoints;
        $self['portalID'] = $portalID;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    public function withCreatedAt(int $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withDeletedAt(int $deletedAt): self
    {
        $self = clone $this;
        $self['deletedAt'] = $deletedAt;

        return $self;
    }

    /**
     * @param EndpointsShape $endpoints
     */
    public function withEndpoints(Endpoints|array $endpoints): self
    {
        $self = clone $this;
        $self['endpoints'] = $endpoints;

        return $self;
    }

    public function withPortalID(int $portalID): self
    {
        $self = clone $this;
        $self['portalID'] = $portalID;

        return $self;
    }

    public function withUpdatedAt(int $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
