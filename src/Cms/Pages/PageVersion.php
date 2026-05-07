<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\Pages;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\VersionUser;

/**
 * @phpstan-import-type PagesPageShape from \HubSpotSDK\Cms\Pages\PagesPage
 * @phpstan-import-type VersionUserShape from \HubSpotSDK\VersionUser
 *
 * @phpstan-type PageVersionShape = array{
 *   id: string,
 *   object: PagesPage|PagesPageShape,
 *   updatedAt: \DateTimeInterface,
 *   user: VersionUser|VersionUserShape,
 * }
 */
final class PageVersion implements BaseModel
{
    /** @use SdkModel<PageVersionShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public PagesPage $object;

    #[Required]
    public \DateTimeInterface $updatedAt;

    #[Required]
    public VersionUser $user;

    /**
     * `new PageVersion()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PageVersion::with(id: ..., object: ..., updatedAt: ..., user: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PageVersion)
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
     *
     * @param PagesPage|PagesPageShape $object
     * @param VersionUser|VersionUserShape $user
     */
    public static function with(
        string $id,
        PagesPage|array $object,
        \DateTimeInterface $updatedAt,
        VersionUser|array $user,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['object'] = $object;
        $self['updatedAt'] = $updatedAt;
        $self['user'] = $user;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param PagesPage|PagesPageShape $object
     */
    public function withObject(PagesPage|array $object): self
    {
        $self = clone $this;
        $self['object'] = $object;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * @param VersionUser|VersionUserShape $user
     */
    public function withUser(VersionUser|array $user): self
    {
        $self = clone $this;
        $self['user'] = $user;

        return $self;
    }
}
