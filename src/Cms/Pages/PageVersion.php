<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Pages;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\VersionUser;

/**
 * @phpstan-import-type PageShape from \HubspotSDK\Cms\Pages\Page
 * @phpstan-import-type VersionUserShape from \HubspotSDK\VersionUser
 *
 * @phpstan-type PageVersionShape = array{
 *   id: string,
 *   object: Page|PageShape,
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
    public Page $object;

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
     * @param Page|PageShape $object
     * @param VersionUser|VersionUserShape $user
     */
    public static function with(
        string $id,
        Page|array $object,
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
     * @param Page|PageShape $object
     */
    public function withObject(Page|array $object): self
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
