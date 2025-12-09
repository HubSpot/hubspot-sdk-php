<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalLinkMetadataShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   defaultLink: bool,
 *   link: string,
 *   organizerUserID: string,
 *   slug: string,
 *   type: string,
 *   userIDsOfLinkMembers: list<string>,
 *   name?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class ExternalLinkMetadata implements BaseModel
{
    /** @use SdkModel<ExternalLinkMetadataShape> */
    use SdkModel;

    #[Required]
    public string $id;

    #[Required]
    public \DateTimeInterface $createdAt;

    #[Required]
    public bool $defaultLink;

    #[Required]
    public string $link;

    #[Required('organizerUserId')]
    public string $organizerUserID;

    #[Required]
    public string $slug;

    #[Required]
    public string $type;

    /** @var list<string> $userIDsOfLinkMembers */
    #[Required('userIdsOfLinkMembers', list: 'string')]
    public array $userIDsOfLinkMembers;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new ExternalLinkMetadata()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalLinkMetadata::with(
     *   id: ...,
     *   createdAt: ...,
     *   defaultLink: ...,
     *   link: ...,
     *   organizerUserID: ...,
     *   slug: ...,
     *   type: ...,
     *   userIDsOfLinkMembers: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalLinkMetadata)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withDefaultLink(...)
     *   ->withLink(...)
     *   ->withOrganizerUserID(...)
     *   ->withSlug(...)
     *   ->withType(...)
     *   ->withUserIDsOfLinkMembers(...)
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
     * @param list<string> $userIDsOfLinkMembers
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        bool $defaultLink,
        string $link,
        string $organizerUserID,
        string $slug,
        string $type,
        array $userIDsOfLinkMembers,
        ?string $name = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['defaultLink'] = $defaultLink;
        $self['link'] = $link;
        $self['organizerUserID'] = $organizerUserID;
        $self['slug'] = $slug;
        $self['type'] = $type;
        $self['userIDsOfLinkMembers'] = $userIDsOfLinkMembers;

        null !== $name && $self['name'] = $name;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withDefaultLink(bool $defaultLink): self
    {
        $self = clone $this;
        $self['defaultLink'] = $defaultLink;

        return $self;
    }

    public function withLink(string $link): self
    {
        $self = clone $this;
        $self['link'] = $link;

        return $self;
    }

    public function withOrganizerUserID(string $organizerUserID): self
    {
        $self = clone $this;
        $self['organizerUserID'] = $organizerUserID;

        return $self;
    }

    public function withSlug(string $slug): self
    {
        $self = clone $this;
        $self['slug'] = $slug;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param list<string> $userIDsOfLinkMembers
     */
    public function withUserIDsOfLinkMembers(array $userIDsOfLinkMembers): self
    {
        $self = clone $this;
        $self['userIDsOfLinkMembers'] = $userIDsOfLinkMembers;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
