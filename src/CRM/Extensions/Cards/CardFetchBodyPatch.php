<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Extensions\Cards;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Extensions\Cards\CardFetchBodyPatch\CardType;

/**
 * Variant of CardFetchBody with fields as optional for patches.
 *
 * @phpstan-type card_fetch_body_patch = array{
 *   objectTypes: list<CardObjectTypeBody>,
 *   cardType?: value-of<CardType>,
 *   serverlessFunction?: string,
 *   targetURL?: string,
 * }
 */
final class CardFetchBodyPatch implements BaseModel
{
    /** @use SdkModel<card_fetch_body_patch> */
    use SdkModel;

    /**
     * An array of CRM object types where this card should be displayed. HubSpot will call your target URL whenever a user visits a record page of the types defined here.
     *
     * @var list<CardObjectTypeBody> $objectTypes
     */
    #[Api(list: CardObjectTypeBody::class)]
    public array $objectTypes;

    /** @var value-of<CardType>|null $cardType */
    #[Api(enum: CardType::class, optional: true)]
    public ?string $cardType;

    #[Api(optional: true)]
    public ?string $serverlessFunction;

    /**
     * URL to a service endpoint that will respond with details for this card. HubSpot will call this endpoint each time a user visits a CRM record page where this card should be displayed.
     */
    #[Api('targetUrl', optional: true)]
    public ?string $targetURL;

    /**
     * `new CardFetchBodyPatch()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CardFetchBodyPatch::with(objectTypes: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CardFetchBodyPatch)->withObjectTypes(...)
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
        CardType|string|null $cardType = null,
        ?string $serverlessFunction = null,
        ?string $targetURL = null,
    ): self {
        $obj = new self;

        $obj->objectTypes = $objectTypes;

        null !== $cardType && $obj['cardType'] = $cardType;
        null !== $serverlessFunction && $obj->serverlessFunction = $serverlessFunction;
        null !== $targetURL && $obj->targetURL = $targetURL;

        return $obj;
    }

    /**
     * An array of CRM object types where this card should be displayed. HubSpot will call your target URL whenever a user visits a record page of the types defined here.
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

    /**
     * URL to a service endpoint that will respond with details for this card. HubSpot will call this endpoint each time a user visits a CRM record page where this card should be displayed.
     */
    public function withTargetURL(string $targetURL): self
    {
        $obj = clone $this;
        $obj->targetURL = $targetURL;

        return $obj;
    }
}
