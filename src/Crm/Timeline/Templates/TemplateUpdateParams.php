<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Timeline\Templates;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Timeline\TimelineEventTemplateToken;

/**
 * Update an existing event template, specified by ID.
 *
 * @see HubspotSDK\Crm\Timeline\Templates->update
 *
 * @phpstan-type TemplateUpdateParamsShape = array{
 *   appId: int,
 *   id: string,
 *   name: string,
 *   tokens: list<TimelineEventTemplateToken>,
 *   detailTemplate?: string,
 *   headerTemplate?: string,
 * }
 */
final class TemplateUpdateParams implements BaseModel
{
    /** @use SdkModel<TemplateUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appId;

    /**
     * The template ID.
     */
    #[Api]
    public string $id;

    /**
     * The template name.
     */
    #[Api]
    public string $name;

    /**
     * A collection of tokens that can be used as custom properties on the event and to create fully fledged CRM objects.
     *
     * @var list<TimelineEventTemplateToken> $tokens
     */
    #[Api(list: TimelineEventTemplateToken::class)]
    public array $tokens;

    /**
     * This uses Markdown syntax with Handlebars and event-specific data to render HTML on a timeline when you expand the details.
     */
    #[Api(optional: true)]
    public ?string $detailTemplate;

    /**
     * This uses Markdown syntax with Handlebars and event-specific data to render HTML on a timeline as a header.
     */
    #[Api(optional: true)]
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
     * @param list<TimelineEventTemplateToken> $tokens
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

        $obj->appId = $appId;
        $obj->id = $id;
        $obj->name = $name;
        $obj->tokens = $tokens;

        null !== $detailTemplate && $obj->detailTemplate = $detailTemplate;
        null !== $headerTemplate && $obj->headerTemplate = $headerTemplate;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj->appId = $appID;

        return $obj;
    }

    /**
     * The template ID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The template name.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * A collection of tokens that can be used as custom properties on the event and to create fully fledged CRM objects.
     *
     * @param list<TimelineEventTemplateToken> $tokens
     */
    public function withTokens(array $tokens): self
    {
        $obj = clone $this;
        $obj->tokens = $tokens;

        return $obj;
    }

    /**
     * This uses Markdown syntax with Handlebars and event-specific data to render HTML on a timeline when you expand the details.
     */
    public function withDetailTemplate(string $detailTemplate): self
    {
        $obj = clone $this;
        $obj->detailTemplate = $detailTemplate;

        return $obj;
    }

    /**
     * This uses Markdown syntax with Handlebars and event-specific data to render HTML on a timeline as a header.
     */
    public function withHeaderTemplate(string $headerTemplate): self
    {
        $obj = clone $this;
        $obj->headerTemplate = $headerTemplate;

        return $obj;
    }
}
