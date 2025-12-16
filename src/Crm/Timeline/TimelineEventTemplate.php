<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * The current state of the template definition.
 *
 * @phpstan-import-type TimelineEventTemplateTokenShape from \HubspotSDK\Crm\Timeline\TimelineEventTemplateToken
 *
 * @phpstan-type TimelineEventTemplateShape = array{
 *   id: string,
 *   name: string,
 *   objectType: string,
 *   tokens: list<TimelineEventTemplateTokenShape>,
 *   createdAt?: \DateTimeInterface|null,
 *   detailTemplate?: string|null,
 *   headerTemplate?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class TimelineEventTemplate implements BaseModel
{
    /** @use SdkModel<TimelineEventTemplateShape> */
    use SdkModel;

    /**
     * The template ID.
     */
    #[Required]
    public string $id;

    /**
     * The template name.
     */
    #[Required]
    public string $name;

    /**
     * The type of CRM object this template is for. [Contacts, companies, tickets, and deals] are supported.
     */
    #[Required]
    public string $objectType;

    /**
     * A collection of tokens that can be used as custom properties on the event and to create fully fledged CRM objects.
     *
     * @var list<TimelineEventTemplateToken> $tokens
     */
    #[Required(list: TimelineEventTemplateToken::class)]
    public array $tokens;

    /**
     * The date and time that the Event Template was created, as an ISO 8601 timestamp. Will be null if the template was created before Feb 18th, 2020.
     */
    #[Optional]
    public ?\DateTimeInterface $createdAt;

    /**
     * This uses Markdown syntax with Handlebars and event-specific data to render HTML on a timeline when you expand the details.
     */
    #[Optional]
    public ?string $detailTemplate;

    /**
     * This uses Markdown syntax with Handlebars and event-specific data to render HTML on a timeline as a header.
     */
    #[Optional]
    public ?string $headerTemplate;

    /**
     * The date and time that the Event Template was last updated, as an ISO 8601 timestamp. Will be null if the template was created before Feb 18th, 2020.
     */
    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new TimelineEventTemplate()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TimelineEventTemplate::with(id: ..., name: ..., objectType: ..., tokens: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TimelineEventTemplate)
     *   ->withID(...)
     *   ->withName(...)
     *   ->withObjectType(...)
     *   ->withTokens(...)
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
     * @param list<TimelineEventTemplateTokenShape> $tokens
     */
    public static function with(
        string $id,
        string $name,
        string $objectType,
        array $tokens,
        ?\DateTimeInterface $createdAt = null,
        ?string $detailTemplate = null,
        ?string $headerTemplate = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['name'] = $name;
        $self['objectType'] = $objectType;
        $self['tokens'] = $tokens;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $detailTemplate && $self['detailTemplate'] = $detailTemplate;
        null !== $headerTemplate && $self['headerTemplate'] = $headerTemplate;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The template ID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The template name.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The type of CRM object this template is for. [Contacts, companies, tickets, and deals] are supported.
     */
    public function withObjectType(string $objectType): self
    {
        $self = clone $this;
        $self['objectType'] = $objectType;

        return $self;
    }

    /**
     * A collection of tokens that can be used as custom properties on the event and to create fully fledged CRM objects.
     *
     * @param list<TimelineEventTemplateTokenShape> $tokens
     */
    public function withTokens(array $tokens): self
    {
        $self = clone $this;
        $self['tokens'] = $tokens;

        return $self;
    }

    /**
     * The date and time that the Event Template was created, as an ISO 8601 timestamp. Will be null if the template was created before Feb 18th, 2020.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * This uses Markdown syntax with Handlebars and event-specific data to render HTML on a timeline when you expand the details.
     */
    public function withDetailTemplate(string $detailTemplate): self
    {
        $self = clone $this;
        $self['detailTemplate'] = $detailTemplate;

        return $self;
    }

    /**
     * This uses Markdown syntax with Handlebars and event-specific data to render HTML on a timeline as a header.
     */
    public function withHeaderTemplate(string $headerTemplate): self
    {
        $self = clone $this;
        $self['headerTemplate'] = $headerTemplate;

        return $self;
    }

    /**
     * The date and time that the Event Template was last updated, as an ISO 8601 timestamp. Will be null if the template was created before Feb 18th, 2020.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
