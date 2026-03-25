<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\CardsDev;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Extensions\CardsDev\IntegratorCardPayloadResponse\ResponseVersion;

/**
 * @phpstan-import-type IntegratorObjectResultShape from \HubspotSDK\Crm\Extensions\CardsDev\IntegratorObjectResult
 * @phpstan-import-type TopLevelActionsShape from \HubspotSDK\Crm\Extensions\CardsDev\TopLevelActions
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
     * The total number of cards that are sent in this response.
     */
    #[Required]
    public int $totalCount;

    /**
     * URL to a page the integrator has built that displays all details for the object cards. This URL will be displayed to users on the title of the card.
     */
    #[Optional('allItemsLinkUrl')]
    public ?string $allItemsLinkURL;

    /**
     * The label to be used for the `allItemsLinkUrl` link (e.g. 'See more tickets') and the title of the card.
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
     * The total number of cards that are sent in this response.
     */
    public function withTotalCount(int $totalCount): self
    {
        $self = clone $this;
        $self['totalCount'] = $totalCount;

        return $self;
    }

    /**
     * URL to a page the integrator has built that displays all details for the object cards. This URL will be displayed to users on the title of the card.
     */
    public function withAllItemsLinkURL(string $allItemsLinkURL): self
    {
        $self = clone $this;
        $self['allItemsLinkURL'] = $allItemsLinkURL;

        return $self;
    }

    /**
     * The label to be used for the `allItemsLinkUrl` link (e.g. 'See more tickets') and the title of the card.
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
