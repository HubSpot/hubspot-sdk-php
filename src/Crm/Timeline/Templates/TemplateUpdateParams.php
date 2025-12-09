<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline\Templates;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Timeline\TimelineEventTemplateToken;
use HubspotSDK\Crm\Timeline\TimelineEventTemplateToken\Type;
use HubspotSDK\Crm\Timeline\TimelineEventTemplateTokenOption;

/**
 * Update an existing event template, specified by ID.
 *
 * @see HubspotSDK\Services\Crm\Timeline\TemplatesService::update()
 *
 * @phpstan-type TemplateUpdateParamsShape = array{
 *   appId: int,
 *   id: string,
 *   name: string,
 *   tokens: list<TimelineEventTemplateToken|array{
 *     label: string,
 *     name: string,
 *     type: value-of<Type>,
 *     createdAt?: \DateTimeInterface|null,
 *     objectPropertyName?: string|null,
 *     options?: list<TimelineEventTemplateTokenOption>|null,
 *     updatedAt?: \DateTimeInterface|null,
 *   }>,
 *   detailTemplate?: string,
 *   headerTemplate?: string,
 * }
 */
final class TemplateUpdateParams implements BaseModel
{
    /** @use SdkModel<TemplateUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appId;

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
     * TemplateUpdateParams::with(appId: ..., id: ..., name: ..., tokens: ...)
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
        int $appId,
        string $id,
        string $name,
        array $tokens,
        ?string $detailTemplate = null,
        ?string $headerTemplate = null,
    ): self {
        $obj = new self;

        $obj['appId'] = $appId;
        $obj['id'] = $id;
        $obj['name'] = $name;
        $obj['tokens'] = $tokens;

        null !== $detailTemplate && $obj['detailTemplate'] = $detailTemplate;
        null !== $headerTemplate && $obj['headerTemplate'] = $headerTemplate;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj['appId'] = $appID;

        return $obj;
    }

    /**
     * The template ID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

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
