<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Extensions\Cards\CardFetchBodyPatch\CardType;

/**
 * Update a card definition with new details.
 *
 * @see HubspotSDK\Services\Crm\Extensions\CardsService::update()
 *
 * @phpstan-type CardUpdateParamsShape = array{
 *   appID: int,
 *   actions?: CardActions|array{baseURLs: list<string>},
 *   display?: CardDisplayBody|array{properties: list<CardDisplayProperty>},
 *   fetch?: CardFetchBodyPatch|array{
 *     objectTypes: list<CardObjectTypeBody>,
 *     cardType?: value-of<CardType>|null,
 *     serverlessFunction?: string|null,
 *     targetURL?: string|null,
 *   },
 *   title?: string,
 * }
 */
final class CardUpdateParams implements BaseModel
{
    /** @use SdkModel<CardUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public int $appID;

    /**
     * Configuration for custom user actions on cards.
     */
    #[Optional]
    public ?CardActions $actions;

    /**
     * Configuration for displayed info on a card.
     */
    #[Optional]
    public ?CardDisplayBody $display;

    /**
     * Variant of CardFetchBody with fields as optional for patches.
     */
    #[Optional]
    public ?CardFetchBodyPatch $fetch;

    /**
     * The top-level title for this card. Displayed to users in the CRM UI.
     */
    #[Optional]
    public ?string $title;

    /**
     * `new CardUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CardUpdateParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CardUpdateParams)->withAppID(...)
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
     * @param CardActions|array{baseURLs: list<string>} $actions
     * @param CardDisplayBody|array{properties: list<CardDisplayProperty>} $display
     * @param CardFetchBodyPatch|array{
     *   objectTypes: list<CardObjectTypeBody>,
     *   cardType?: value-of<CardType>|null,
     *   serverlessFunction?: string|null,
     *   targetURL?: string|null,
     * } $fetch
     */
    public static function with(
        int $appID,
        CardActions|array|null $actions = null,
        CardDisplayBody|array|null $display = null,
        CardFetchBodyPatch|array|null $fetch = null,
        ?string $title = null,
    ): self {
        $self = new self;

        $self['appID'] = $appID;

        null !== $actions && $self['actions'] = $actions;
        null !== $display && $self['display'] = $display;
        null !== $fetch && $self['fetch'] = $fetch;
        null !== $title && $self['title'] = $title;

        return $self;
    }

    public function withAppID(int $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    /**
     * Configuration for custom user actions on cards.
     *
     * @param CardActions|array{baseURLs: list<string>} $actions
     */
    public function withActions(CardActions|array $actions): self
    {
        $self = clone $this;
        $self['actions'] = $actions;

        return $self;
    }

    /**
     * Configuration for displayed info on a card.
     *
     * @param CardDisplayBody|array{properties: list<CardDisplayProperty>} $display
     */
    public function withDisplay(CardDisplayBody|array $display): self
    {
        $self = clone $this;
        $self['display'] = $display;

        return $self;
    }

    /**
     * Variant of CardFetchBody with fields as optional for patches.
     *
     * @param CardFetchBodyPatch|array{
     *   objectTypes: list<CardObjectTypeBody>,
     *   cardType?: value-of<CardType>|null,
     *   serverlessFunction?: string|null,
     *   targetURL?: string|null,
     * } $fetch
     */
    public function withFetch(CardFetchBodyPatch|array $fetch): self
    {
        $self = clone $this;
        $self['fetch'] = $fetch;

        return $self;
    }

    /**
     * The top-level title for this card. Displayed to users in the CRM UI.
     */
    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }
}
