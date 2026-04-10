<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Extensions\CardsDev;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Extensions\CardsDev\IntegratorCardPayloadResponse\ResponseVersion;

/**
 * @phpstan-import-type IntegratorObjectResultShape from \HubSpotSDK\Crm\Extensions\CardsDev\IntegratorObjectResult
 * @phpstan-import-type TopLevelActionsShape from \HubSpotSDK\Crm\Extensions\CardsDev\TopLevelActions
 *
 * @phpstan-type IntegratorCardPayloadResponseShape = array{
 *   responseVersion: ResponseVersion|value-of<ResponseVersion>,
 *   sections: list<IntegratorObjectResult|IntegratorObjectResultShape>,
 *   totalCount: int,
 *   allItemsLinkURL?: string|null,
 *   cardLabel?: string|null,
 *   topLevelActions?: null|TopLevelActions|TopLevelActionsShape,
 * }
 */
final class IntegratorCardPayloadResponse implements BaseModel
{
    /** @use SdkModel<IntegratorCardPayloadResponseShape> */
    use SdkModel;

    /**
     * The number version of the response.
     *
     * @var value-of<ResponseVersion> $responseVersion
     */
    #[Required(enum: ResponseVersion::class)]
    public string $responseVersion;

    /**
     * A list of up to five valid card sub categories.
     *
     * @var list<IntegratorObjectResult> $sections
     */
    #[Required(list: IntegratorObjectResult::class)]
    public array $sections;

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

    #[Optional]
    public ?TopLevelActions $topLevelActions;

    /**
     * `new IntegratorCardPayloadResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * IntegratorCardPayloadResponse::with(
     *   responseVersion: ..., sections: ..., totalCount: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new IntegratorCardPayloadResponse)
     *   ->withResponseVersion(...)
     *   ->withSections(...)
     *   ->withTotalCount(...)
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
     * @param list<IntegratorObjectResult|IntegratorObjectResultShape> $sections
     * @param TopLevelActions|TopLevelActionsShape|null $topLevelActions
     */
    public static function with(
        ResponseVersion|string $responseVersion,
        array $sections,
        int $totalCount,
        ?string $allItemsLinkURL = null,
        ?string $cardLabel = null,
        TopLevelActions|array|null $topLevelActions = null,
    ): self {
        $self = new self;

        $self['responseVersion'] = $responseVersion;
        $self['sections'] = $sections;
        $self['totalCount'] = $totalCount;

        null !== $allItemsLinkURL && $self['allItemsLinkURL'] = $allItemsLinkURL;
        null !== $cardLabel && $self['cardLabel'] = $cardLabel;
        null !== $topLevelActions && $self['topLevelActions'] = $topLevelActions;

        return $self;
    }

    /**
     * The number version of the response.
     *
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
