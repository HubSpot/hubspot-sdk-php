<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Timeline\TimelineEventTemplateToken\Type;

/**
 * State of the template definition being created.
 *
 * @phpstan-type TimelineEventTemplateCreateRequestShape = array{
 *   name: string,
 *   objectType: string,
 *   tokens: list<TimelineEventTemplateToken>,
 *   detailTemplate?: string|null,
 *   headerTemplate?: string|null,
 * }
 */
final class TimelineEventTemplateCreateRequest implements BaseModel
{
    /** @use SdkModel<TimelineEventTemplateCreateRequestShape> */
    use SdkModel;

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
     * `new TimelineEventTemplateCreateRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TimelineEventTemplateCreateRequest::with(
     *   name: ..., objectType: ..., tokens: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TimelineEventTemplateCreateRequest)
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
     * @param list<TimelineEventTemplateToken|array{
     *   label: string,
     *   name: string,
     *   type: value-of<Type>,
     *   createdAt?: \DateTimeInterface|null,
     *   objectPropertyName?: string|null,
     *   options?: list<TimelineEventTemplateTokenOption>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $tokens
     */
    public static function with(
        string $name,
        string $objectType,
        array $tokens,
        ?string $detailTemplate = null,
        ?string $headerTemplate = null,
    ): self {
        $obj = new self;

        $obj['name'] = $name;
        $obj['objectType'] = $objectType;
        $obj['tokens'] = $tokens;

        null !== $detailTemplate && $obj['detailTemplate'] = $detailTemplate;
        null !== $headerTemplate && $obj['headerTemplate'] = $headerTemplate;

        return $obj;
    }

    /**
     * The template name.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * The type of CRM object this template is for. [Contacts, companies, tickets, and deals] are supported.
     */
    public function withObjectType(string $objectType): self
    {
        $obj = clone $this;
        $obj['objectType'] = $objectType;

        return $obj;
    }

    /**
     * A collection of tokens that can be used as custom properties on the event and to create fully fledged CRM objects.
     *
     * @param list<TimelineEventTemplateToken|array{
     *   label: string,
     *   name: string,
     *   type: value-of<Type>,
     *   createdAt?: \DateTimeInterface|null,
     *   objectPropertyName?: string|null,
     *   options?: list<TimelineEventTemplateTokenOption>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $tokens
     */
    public function withTokens(array $tokens): self
    {
        $obj = clone $this;
        $obj['tokens'] = $tokens;

        return $obj;
    }

    /**
     * This uses Markdown syntax with Handlebars and event-specific data to render HTML on a timeline when you expand the details.
     */
    public function withDetailTemplate(string $detailTemplate): self
    {
        $obj = clone $this;
        $obj['detailTemplate'] = $detailTemplate;

        return $obj;
    }

    /**
     * This uses Markdown syntax with Handlebars and event-specific data to render HTML on a timeline as a header.
     */
    public function withHeaderTemplate(string $headerTemplate): self
    {
        $obj = clone $this;
        $obj['headerTemplate'] = $headerTemplate;

        return $obj;
    }
}
