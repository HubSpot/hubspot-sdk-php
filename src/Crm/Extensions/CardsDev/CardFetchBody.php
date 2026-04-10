<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Extensions\CardsDev;

use HubSpotSDK\Core\Attributes\Optional;
use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;
use HubSpotSDK\Crm\Extensions\CardsDev\CardFetchBody\CardType;

/**
 * @phpstan-import-type CardObjectTypeBodyShape from \HubSpotSDK\Crm\Extensions\CardsDev\CardObjectTypeBody
 *
 * @phpstan-type CardFetchBodyShape = array{
 *   cardType: CardType|value-of<CardType>,
 *   objectTypes: list<CardObjectTypeBody|CardObjectTypeBodyShape>,
 *   targetURL: string,
 *   serverlessFunction?: string|null,
 * }
 */
final class CardFetchBody implements BaseModel
{
    /** @use SdkModel<CardFetchBodyShape> */
    use SdkModel;

    /**
     * A deprecated field to determine the type of card returned.
     *
     * @var value-of<CardType> $cardType
     */
    #[Required(enum: CardType::class)]
    public string $cardType;

    /**
     * An array of CRM object types where this card should be displayed. HubSpot will call your data fetch URL whenever a user visits a record page of the types defined here.
     *
     * @var list<CardObjectTypeBody> $objectTypes
     */
    #[Required(list: CardObjectTypeBody::class)]
    public array $objectTypes;

    /**
     * URL to a service endpoints that will respond with card details. HubSpot will call this endpoint each time a user visits a CRM record page where this card should be displayed.
     */
    #[Required('targetUrl')]
    public string $targetURL;

    /**
     * A deprecated field to specify serverless functionality with the card.
     */
    #[Optional]
    public ?string $serverlessFunction;

    /**
     * `new CardFetchBody()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CardFetchBody::with(cardType: ..., objectTypes: ..., targetURL: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CardFetchBody)->withCardType(...)->withObjectTypes(...)->withTargetURL(...)
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
     * @param CardType|value-of<CardType> $cardType
     * @param list<CardObjectTypeBody|CardObjectTypeBodyShape> $objectTypes
     */
    public static function with(
        CardType|string $cardType,
        array $objectTypes,
        string $targetURL,
        ?string $serverlessFunction = null,
    ): self {
        $self = new self;

        $self['cardType'] = $cardType;
        $self['objectTypes'] = $objectTypes;
        $self['targetURL'] = $targetURL;

        null !== $serverlessFunction && $self['serverlessFunction'] = $serverlessFunction;

        return $self;
    }

    /**
     * A deprecated field to determine the type of card returned.
     *
     * @param CardType|value-of<CardType> $cardType
     */
    public function withCardType(CardType|string $cardType): self
    {
        $self = clone $this;
        $self['cardType'] = $cardType;

        return $self;
    }

    /**
     * An array of CRM object types where this card should be displayed. HubSpot will call your data fetch URL whenever a user visits a record page of the types defined here.
     *
     * @param list<CardObjectTypeBody|CardObjectTypeBodyShape> $objectTypes
     */
    public function withObjectTypes(array $objectTypes): self
    {
        $self = clone $this;
        $self['objectTypes'] = $objectTypes;

        return $self;
    }

    /**
     * URL to a service endpoints that will respond with card details. HubSpot will call this endpoint each time a user visits a CRM record page where this card should be displayed.
     */
    public function withTargetURL(string $targetURL): self
    {
        $self = clone $this;
        $self['targetURL'] = $targetURL;

        return $self;
    }

    /**
     * A deprecated field to specify serverless functionality with the card.
     */
    public function withServerlessFunction(string $serverlessFunction): self
    {
        $self = clone $this;
        $self['serverlessFunction'] = $serverlessFunction;

        return $self;
    }
}
