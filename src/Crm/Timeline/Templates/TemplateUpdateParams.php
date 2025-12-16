<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline\Templates;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Timeline\TimelineEventTemplateToken;

/**
 * Update an existing event template, specified by ID.
 *
 * @see HubspotSDK\Services\Crm\Timeline\TemplatesService::update()
 *
 * @phpstan-import-type TimelineEventTemplateTokenShape from \HubspotSDK\Crm\Timeline\TimelineEventTemplateToken
 *
 * @phpstan-type TemplateUpdateParamsShape = array{
 *   appID: int,
 *   id: string,
 *   name: string,
 *   tokens: list<TimelineEventTemplateTokenShape>,
 *   detailTemplate?: string|null,
 *   headerTemplate?: string|null,
 * }
 */
final class TemplateUpdateParams implements BaseModel
{
    /** @use SdkModel<TemplateUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

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
     * `new TemplateUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TemplateUpdateParams::with(appID: ..., id: ..., name: ..., tokens: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TemplateUpdateParams)
     *   ->withAppID(...)
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
        int $appID,
        string $id,
        string $name,
        array $tokens,
        ?string $detailTemplate = null,
        ?string $headerTemplate = null,
    ): self {
        $self = new self;

        $self['appID'] = $appID;
        $self['id'] = $id;
        $self['name'] = $name;
        $self['tokens'] = $tokens;

        null !== $detailTemplate && $self['detailTemplate'] = $detailTemplate;
        null !== $headerTemplate && $self['headerTemplate'] = $headerTemplate;

        return $self;
    }

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

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
