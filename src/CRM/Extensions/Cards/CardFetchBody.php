<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Extensions\Cards;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Extensions\Cards\CardFetchBody\CardType;

/**
 * Configuration for this card's data fetch request.
 *
 * @phpstan-type CardFetchBodyShape = array{
 *   objectTypes: list<CardObjectTypeBody>,
 *   targetURL: string,
 *   cardType?: value-of<CardType>,
 *   serverlessFunction?: string,
 * }
 */
final class CardFetchBody implements BaseModel
{
    /** @use SdkModel<CardFetchBodyShape> */
    use SdkModel;

    /**
     * An array of CRM object types where this card should be displayed. HubSpot will call your data fetch URL whenever a user visits a record page of the types defined here.
     *
     * @var list<CardObjectTypeBody> $objectTypes
     */
    #[Api(list: CardObjectTypeBody::class)]
    public array $objectTypes;

    /**
     * URL to a service endpoints that will respond with card details. HubSpot will call this endpoint each time a user visits a CRM record page where this card should be displayed.
     */
    #[Api('targetUrl')]
    public string $targetURL;

    /** @var value-of<CardType>|null $cardType */
    #[Api(enum: CardType::class, optional: true)]
    public ?string $cardType;

    #[Api(optional: true)]
    public ?string $serverlessFunction;

    /**
     * `new CardFetchBody()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CardFetchBody::with(objectTypes: ..., targetURL: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CardFetchBody)->withObjectTypes(...)->withTargetURL(...)
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
     * @param list<CardObjectTypeBody> $objectTypes
     * @param CardType|value-of<CardType> $cardType
     */
    public static function with(
        array $objectTypes,
        string $targetURL,
        CardType|string|null $cardType = null,
        ?string $serverlessFunction = null,
    ): self {
        $obj = new self;

        $obj->objectTypes = $objectTypes;
        $obj->targetURL = $targetURL;

        null !== $cardType && $obj['cardType'] = $cardType;
        null !== $serverlessFunction && $obj->serverlessFunction = $serverlessFunction;

        return $obj;
    }

    /**
     * An array of CRM object types where this card should be displayed. HubSpot will call your data fetch URL whenever a user visits a record page of the types defined here.
     *
     * @param list<CardObjectTypeBody> $objectTypes
     */
    public function withObjectTypes(array $objectTypes): self
    {
        $obj = clone $this;
        $obj->objectTypes = $objectTypes;

        return $obj;
    }

    /**
     * URL to a service endpoints that will respond with card details. HubSpot will call this endpoint each time a user visits a CRM record page where this card should be displayed.
     */
    public function withTargetURL(string $targetURL): self
    {
        $obj = clone $this;
        $obj->targetURL = $targetURL;

        return $obj;
    }

    /**
     * @param CardType|value-of<CardType> $cardType
     */
    public function withCardType(CardType|string $cardType): self
    {
        $obj = clone $this;
        $obj['cardType'] = $cardType;

        return $obj;
    }

    public function withServerlessFunction(string $serverlessFunction): self
    {
        $obj = clone $this;
        $obj->serverlessFunction = $serverlessFunction;

        return $obj;
    }
}
