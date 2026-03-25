<?php

declare(strict_types=1);

namespace HubspotSDK\Scheduler\Meetings;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Scheduler\Meetings\ExternalLinkMetadata\Type;

/**
 * @phpstan-type ExternalLinkMetadataShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   defaultLink: bool,
 *   link: string,
 *   organizerUserID: string,
 *   slug: string,
 *   type: Type|value-of<Type>,
 *   userIDsOfLinkMembers: list<string>,
 *   name?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class ExternalLinkMetadata implements BaseModel
{
    /** @use SdkModel<ExternalLinkMetadataShape> */
    use SdkModel;

    /**
     * The unique identifier for the meeting link.
     */
    #[Required]
    public string $id;

    /**
     * The Unix time in milliseconds when the meeting link was created.
     */
    #[Required]
    public \DateTimeInterface $createdAt;

    /**
     * Whether the meeting link is the user's default link.
     */
    #[Required]
    public bool $defaultLink;

    /**
     * The URL of the meeting link.
     */
    #[Required]
    public string $link;

    /**
     * The user ID of the meeting link's organizer.
     */
    #[Required('organizerUserId')]
    public string $organizerUserID;

    /**
     * The slug of the meeting link, located directly after the domain in the URL.
     */
    #[Required]
    public string $slug;

    /**
     * The type of the external meeting link. Accepted values are: PERSONAL_LINK, GROUP_CALENDAR, ROUND_ROBIN_CALENDAR.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /** @var list<string> $userIDsOfLinkMembers */
    #[Required('userIdsOfLinkMembers', list: 'string')]
    public array $userIDsOfLinkMembers;

    /**
     * The name of the meeting link.
     */
    #[Optional]
    public ?string $name;

    /**
     * The Unix time in milliseconds when the meeting link was last updated.
     */
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
     * @param Type|value-of<Type> $type
     * @param list<string> $userIDsOfLinkMembers
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        bool $defaultLink,
        string $link,
        string $organizerUserID,
        string $slug,
        Type|string $type,
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

    /**
     * The unique identifier for the meeting link.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The Unix time in milliseconds when the meeting link was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Whether the meeting link is the user's default link.
     */
    public function withDefaultLink(bool $defaultLink): self
    {
        $self = clone $this;
        $self['defaultLink'] = $defaultLink;

        return $self;
    }

    /**
     * The URL of the meeting link.
     */
    public function withLink(string $link): self
    {
        $self = clone $this;
        $self['link'] = $link;

        return $self;
    }

    /**
     * The user ID of the meeting link's organizer.
     */
    public function withOrganizerUserID(string $organizerUserID): self
    {
        $self = clone $this;
        $self['organizerUserID'] = $organizerUserID;

        return $self;
    }

    /**
     * The slug of the meeting link, located directly after the domain in the URL.
     */
    public function withSlug(string $slug): self
    {
        $self = clone $this;
        $self['slug'] = $slug;

        return $self;
    }

    /**
     * The type of the external meeting link. Accepted values are: PERSONAL_LINK, GROUP_CALENDAR, ROUND_ROBIN_CALENDAR.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
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

    /**
     * The name of the meeting link.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The Unix time in milliseconds when the meeting link was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
