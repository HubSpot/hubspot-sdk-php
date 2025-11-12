<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type ExternalLinkMetadataShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   defaultLink: bool,
 *   link: string,
 *   organizerUserId: string,
 *   slug: string,
 *   type: string,
 *   userIdsOfLinkMembers: list<string>,
 *   name?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class ExternalLinkMetadata implements BaseModel
{
    /** @use SdkModel<ExternalLinkMetadataShape> */
    use SdkModel;

    #[Api]
    public string $id;

    #[Api]
    public \DateTimeInterface $createdAt;

    #[Api]
    public bool $defaultLink;

    #[Api]
    public string $link;

    #[Api]
    public string $organizerUserId;

    #[Api]
    public string $slug;

    #[Api]
    public string $type;

    /** @var list<string> $userIdsOfLinkMembers */
    #[Api(list: 'string')]
    public array $userIdsOfLinkMembers;

    #[Api(optional: true)]
    public ?string $name;

    #[Api(optional: true)]
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
     *   organizerUserId: ...,
     *   slug: ...,
     *   type: ...,
     *   userIdsOfLinkMembers: ...,
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
     * @param list<string> $userIdsOfLinkMembers
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        bool $defaultLink,
        string $link,
        string $organizerUserId,
        string $slug,
        string $type,
        array $userIdsOfLinkMembers,
        ?string $name = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->createdAt = $createdAt;
        $obj->defaultLink = $defaultLink;
        $obj->link = $link;
        $obj->organizerUserId = $organizerUserId;
        $obj->slug = $slug;
        $obj->type = $type;
        $obj->userIdsOfLinkMembers = $userIdsOfLinkMembers;

        null !== $name && $obj->name = $name;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

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

    public function withDefaultLink(bool $defaultLink): self
    {
        $obj = clone $this;
        $obj->defaultLink = $defaultLink;

        return $obj;
    }

    public function withLink(string $link): self
    {
        $obj = clone $this;
        $obj->link = $link;

        return $obj;
    }

    public function withOrganizerUserID(string $organizerUserID): self
    {
        $obj = clone $this;
        $obj->organizerUserId = $organizerUserID;

        return $obj;
    }

    public function withSlug(string $slug): self
    {
        $obj = clone $this;
        $obj->slug = $slug;

        return $obj;
    }

    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }

    /**
     * @param list<string> $userIDsOfLinkMembers
     */
    public function withUserIDsOfLinkMembers(array $userIDsOfLinkMembers): self
    {
        $obj = clone $this;
        $obj->userIdsOfLinkMembers = $userIDsOfLinkMembers;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
