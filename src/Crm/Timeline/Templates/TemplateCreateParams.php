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
 * Event templates define the general structure for a custom timeline event, and enable you to send event data to HubSpot. A template includes formatted copy for its heading and details, as well as any custom property definitions. A single app can include up to 750 event templates.<br/><Warning>the `v1` and `v3` timeline events APIs are only available for app partners with existing `v1`/`v3` timeline events defined in their public app. <ul><li>If your app doesn't include any timeline events yet, requests to this endpoint will fail. Instead, you can get started on [latest version of the developer platform](/apps/developer-platform/build-apps/overview). Note that you'll need to request approval before you can define app events for your app. Learn more in the [app events overview](/apps/developer-platform/add-features/app-events/overview).</li><li>If your app includes a `v1`/`v3` timeline event, learn how to [migrate it to the developer platform](/apps/developer-platform/add-features/app-events/create-and-manage-event-types#migrate-an-existing-timeline-event-type). You don't need to request approval before migrating existing event types.</li></ul>If you're not an app partner, you can send custom event data to HubSpot using the [custom events API](/api-reference/events-manage-event-definitions-v3/guide).</Warning>.
 *
 * @see HubspotSDK\Services\Crm\Timeline\TemplatesService::create()
 *
 * @phpstan-import-type TimelineEventTemplateTokenShape from \HubspotSDK\Crm\Timeline\TimelineEventTemplateToken
 *
 * @phpstan-type TemplateCreateParamsShape = array{
 *   name: string,
 *   objectType: string,
 *   tokens: list<TimelineEventTemplateTokenShape>,
 *   detailTemplate?: string|null,
 *   headerTemplate?: string|null,
 * }
 */
final class TemplateCreateParams implements BaseModel
{
    /** @use SdkModel<TemplateCreateParamsShape> */
    use SdkModel;
    use SdkParams;

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
     * `new TemplateCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TemplateCreateParams::with(name: ..., objectType: ..., tokens: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TemplateCreateParams)->withName(...)->withObjectType(...)->withTokens(...)
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
        string $name,
        string $objectType,
        array $tokens,
        ?string $detailTemplate = null,
        ?string $headerTemplate = null,
    ): self {
        $self = new self;

        $self['name'] = $name;
        $self['objectType'] = $objectType;
        $self['tokens'] = $tokens;

        null !== $detailTemplate && $self['detailTemplate'] = $detailTemplate;
        null !== $headerTemplate && $self['headerTemplate'] = $headerTemplate;

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
