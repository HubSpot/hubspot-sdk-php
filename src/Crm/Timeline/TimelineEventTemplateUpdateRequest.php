<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * State of the template definition being updated.
 *
 * @phpstan-import-type TimelineEventTemplateTokenShape from \HubspotSDK\Crm\Timeline\TimelineEventTemplateToken
 *
 * @phpstan-type TimelineEventTemplateUpdateRequestShape = array{
 *   id: string,
 *   name: string,
 *   tokens: list<TimelineEventTemplateTokenShape>,
 *   detailTemplate?: string|null,
 *   headerTemplate?: string|null,
 * }
 */
final class TimelineEventTemplateUpdateRequest implements BaseModel
{
    /** @use SdkModel<TimelineEventTemplateUpdateRequestShape> */
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
     * A collection of tokens that can be used as custom properties on the event and to create fully fledged CRM objects.
     *
     * @var list<TimelineEventTemplateToken> $tokens
     */
    #[Required(list: TimelineEventTemplateToken::class)]
    public array $tokens;

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
     * `new TimelineEventTemplateUpdateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TimelineEventTemplateUpdateRequest::with(id: ..., name: ..., tokens: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TimelineEventTemplateUpdateRequest)
     *   ->withID(...)
     *   ->withName(...)
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
        array $tokens,
        ?string $detailTemplate = null,
        ?string $headerTemplate = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['name'] = $name;
        $self['tokens'] = $tokens;

        null !== $detailTemplate && $self['detailTemplate'] = $detailTemplate;
        null !== $headerTemplate && $self['headerTemplate'] = $headerTemplate;

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
}
