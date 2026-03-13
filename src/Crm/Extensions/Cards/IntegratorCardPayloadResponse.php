<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Extensions\Cards\IntegratorCardPayloadResponse\ResponseVersion;

/**
 * The card details payload, sent to HubSpot by an app in response to a data fetch request when a user visits a CRM record page.
 *
 * @phpstan-import-type IntegratorObjectResultShape from \HubspotSDK\Crm\Extensions\Cards\IntegratorObjectResult
 * @phpstan-import-type TopLevelActionsShape from \HubspotSDK\Crm\Extensions\Cards\TopLevelActions
 *
 * @phpstan-type IntegratorCardPayloadResponseShape = array{
 *   totalCount: int,
 *   allItemsLinkURL?: string|null,
 *   cardLabel?: string|null,
 *   responseVersion?: null|ResponseVersion|value-of<ResponseVersion>,
 *   sections?: list<IntegratorObjectResult|IntegratorObjectResultShape>|null,
 *   topLevelActions?: null|TopLevelActions|TopLevelActionsShape,
 * }
 */
final class IntegratorCardPayloadResponse implements BaseModel
{
    /** @use SdkModel<IntegratorCardPayloadResponseShape> */
    use SdkModel;

    /**
     * The total number of card properties that will be sent in this response.
     */
    #[Required]
    public int $totalCount;

    /**
     * URL to a page the integrator has built that displays all details for this card. This URL will be displayed to users under a `See more [x]` link if there are more than five items in your response, where `[x]` is the value of `itemLabel`.
     */
    #[Optional('allItemsLinkUrl')]
    public ?string $allItemsLinkURL;

    /**
     * The label to be used for the `allItemsLinkUrl` link (e.g. 'See more tickets'). If not provided, this falls back to the card's title.
     */
    #[Optional]
    public ?string $cardLabel;

    /** @var value-of<ResponseVersion>|null $responseVersion */
    #[Optional(enum: ResponseVersion::class)]
    public ?string $responseVersion;

    /**
     * A list of up to five valid card sub categories.
     *
     * @var list<IntegratorObjectResult>|null $sections
     */
    #[Optional(list: IntegratorObjectResult::class)]
    public ?array $sections;

    #[Optional]
    public ?TopLevelActions $topLevelActions;

    /**
     * `new IntegratorCardPayloadResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegratorCardPayloadResponse::with(totalCount: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IntegratorCardPayloadResponse)->withTotalCount(...)
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
     * @param ResponseVersion|value-of<ResponseVersion>|null $responseVersion
     * @param list<IntegratorObjectResult|IntegratorObjectResultShape>|null $sections
     * @param TopLevelActions|TopLevelActionsShape|null $topLevelActions
     */
    public static function with(
        int $totalCount,
        ?string $allItemsLinkURL = null,
        ?string $cardLabel = null,
        ResponseVersion|string|null $responseVersion = null,
        ?array $sections = null,
        TopLevelActions|array|null $topLevelActions = null,
    ): self {
        $self = new self;

        $self['totalCount'] = $totalCount;

        null !== $allItemsLinkURL && $self['allItemsLinkURL'] = $allItemsLinkURL;
        null !== $cardLabel && $self['cardLabel'] = $cardLabel;
        null !== $responseVersion && $self['responseVersion'] = $responseVersion;
        null !== $sections && $self['sections'] = $sections;
        null !== $topLevelActions && $self['topLevelActions'] = $topLevelActions;

        return $self;
    }

    /**
     * The total number of card properties that will be sent in this response.
     */
    public function withTotalCount(int $totalCount): self
    {
        $self = clone $this;
        $self['totalCount'] = $totalCount;

        return $self;
    }

    /**
     * URL to a page the integrator has built that displays all details for this card. This URL will be displayed to users under a `See more [x]` link if there are more than five items in your response, where `[x]` is the value of `itemLabel`.
     */
    public function withAllItemsLinkURL(string $allItemsLinkURL): self
    {
        $self = clone $this;
        $self['allItemsLinkURL'] = $allItemsLinkURL;

        return $self;
    }

    /**
     * The label to be used for the `allItemsLinkUrl` link (e.g. 'See more tickets'). If not provided, this falls back to the card's title.
     */
    public function withCardLabel(string $cardLabel): self
    {
        $self = clone $this;
        $self['cardLabel'] = $cardLabel;

        return $self;
    }

    /**
     * @param ResponseVersion|value-of<ResponseVersion> $responseVersion
     */
    public function withResponseVersion(
        ResponseVersion|string $responseVersion
    ): self {
        $self = clone $this;
        $self['responseVersion'] = $responseVersion;

        return $self;
    }

    /**
     * A list of up to five valid card sub categories.
     *
     * @param list<IntegratorObjectResult|IntegratorObjectResultShape> $sections
     */
    public function withSections(array $sections): self
    {
        $self = clone $this;
        $self['sections'] = $sections;

        return $self;
    }

    /**
     * @param TopLevelActions|TopLevelActionsShape $topLevelActions
     */
    public function withTopLevelActions(
        TopLevelActions|array $topLevelActions
    ): self {
        $self = clone $this;
        $self['topLevelActions'] = $topLevelActions;

        return $self;
    }
}
