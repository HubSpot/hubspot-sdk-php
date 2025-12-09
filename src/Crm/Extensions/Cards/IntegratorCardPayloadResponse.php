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
 * @phpstan-type IntegratorCardPayloadResponseShape = array{
 *   totalCount: int,
 *   allItemsLinkURL?: string|null,
 *   cardLabel?: string|null,
 *   responseVersion?: value-of<ResponseVersion>|null,
 *   sections?: list<IntegratorObjectResult>|null,
 *   topLevelActions?: TopLevelActions|null,
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
     * @param ResponseVersion|value-of<ResponseVersion> $responseVersion
     * @param list<IntegratorObjectResult|array{
     *   id: string,
     *   actions: list<ActionHookActionBody|IFrameActionBody>,
     *   title: string,
     *   tokens: list<ObjectToken>,
     *   linkURL?: string|null,
     * }> $sections
     * @param TopLevelActions|array{
     *   secondary: list<ActionHookActionBody|IFrameActionBody>,
     *   primary?: ActionHookActionBody|IFrameActionBody|null,
     *   settings?: IFrameActionBody|null,
     * } $topLevelActions
     */
    public static function with(
        int $totalCount,
        ?string $allItemsLinkURL = null,
        ?string $cardLabel = null,
        ResponseVersion|string|null $responseVersion = null,
        ?array $sections = null,
        TopLevelActions|array|null $topLevelActions = null,
    ): self {
        $obj = new self;

        $obj['totalCount'] = $totalCount;

        null !== $allItemsLinkURL && $obj['allItemsLinkURL'] = $allItemsLinkURL;
        null !== $cardLabel && $obj['cardLabel'] = $cardLabel;
        null !== $responseVersion && $obj['responseVersion'] = $responseVersion;
        null !== $sections && $obj['sections'] = $sections;
        null !== $topLevelActions && $obj['topLevelActions'] = $topLevelActions;

        return $obj;
    }

    /**
     * The total number of card properties that will be sent in this response.
     */
    public function withTotalCount(int $totalCount): self
    {
        $obj = clone $this;
        $obj['totalCount'] = $totalCount;

        return $obj;
    }

    /**
     * URL to a page the integrator has built that displays all details for this card. This URL will be displayed to users under a `See more [x]` link if there are more than five items in your response, where `[x]` is the value of `itemLabel`.
     */
    public function withAllItemsLinkURL(string $allItemsLinkURL): self
    {
        $obj = clone $this;
        $obj['allItemsLinkURL'] = $allItemsLinkURL;

        return $obj;
    }

    /**
     * The label to be used for the `allItemsLinkUrl` link (e.g. 'See more tickets'). If not provided, this falls back to the card's title.
     */
    public function withCardLabel(string $cardLabel): self
    {
        $obj = clone $this;
        $obj['cardLabel'] = $cardLabel;

        return $obj;
    }

    /**
     * @param ResponseVersion|value-of<ResponseVersion> $responseVersion
     */
    public function withResponseVersion(
        ResponseVersion|string $responseVersion
    ): self {
        $obj = clone $this;
        $obj['responseVersion'] = $responseVersion;

        return $obj;
    }

    /**
     * A list of up to five valid card sub categories.
     *
     * @param list<IntegratorObjectResult|array{
     *   id: string,
     *   actions: list<ActionHookActionBody|IFrameActionBody>,
     *   title: string,
     *   tokens: list<ObjectToken>,
     *   linkURL?: string|null,
     * }> $sections
     */
    public function withSections(array $sections): self
    {
        $obj = clone $this;
        $obj['sections'] = $sections;

        return $obj;
    }

    /**
     * @param TopLevelActions|array{
     *   secondary: list<ActionHookActionBody|IFrameActionBody>,
     *   primary?: ActionHookActionBody|IFrameActionBody|null,
     *   settings?: IFrameActionBody|null,
     * } $topLevelActions
     */
    public function withTopLevelActions(
        TopLevelActions|array $topLevelActions
    ): self {
        $obj = clone $this;
        $obj['topLevelActions'] = $topLevelActions;

        return $obj;
    }
}
