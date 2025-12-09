<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Extensions\Cards\CardFetchBodyPatch\CardType;
use HubspotSDK\Crm\Extensions\Cards\CardObjectTypeBody\Name;

/**
 * Variant of CardFetchBody with fields as optional for patches.
 *
 * @phpstan-type CardFetchBodyPatchShape = array{
 *   objectTypes: list<CardObjectTypeBody>,
 *   cardType?: value-of<CardType>|null,
 *   serverlessFunction?: string|null,
 *   targetURL?: string|null,
 * }
 */
final class CardFetchBodyPatch implements BaseModel
{
    /** @use SdkModel<CardFetchBodyPatchShape> */
    use SdkModel;

    /**
     * An array of CRM object types where this card should be displayed. HubSpot will call your target URL whenever a user visits a record page of the types defined here.
     *
     * @var list<CardObjectTypeBody> $objectTypes
     */
    #[Required(list: CardObjectTypeBody::class)]
    public array $objectTypes;

    /** @var value-of<CardType>|null $cardType */
    #[Optional(enum: CardType::class)]
    public ?string $cardType;

    #[Optional]
    public ?string $serverlessFunction;

    /**
     * URL to a service endpoint that will respond with details for this card. HubSpot will call this endpoint each time a user visits a CRM record page where this card should be displayed.
     */
    #[Optional('targetUrl')]
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
     * @param list<CardObjectTypeBody|array{
     *   name: value-of<Name>, propertiesToSend: list<string>
     * }> $objectTypes
     * @param CardType|value-of<CardType> $cardType
     */
    public static function with(
        array $objectTypes,
        CardType|string|null $cardType = null,
        ?string $serverlessFunction = null,
        ?string $targetURL = null,
    ): self {
        $self = new self;

        $self['objectTypes'] = $objectTypes;

        null !== $cardType && $self['cardType'] = $cardType;
        null !== $serverlessFunction && $self['serverlessFunction'] = $serverlessFunction;
        null !== $targetURL && $self['targetURL'] = $targetURL;

        return $self;
    }

    /**
     * An array of CRM object types where this card should be displayed. HubSpot will call your target URL whenever a user visits a record page of the types defined here.
     *
     * @param list<CardObjectTypeBody|array{
     *   name: value-of<Name>, propertiesToSend: list<string>
     * }> $objectTypes
     */
    public function withObjectTypes(array $objectTypes): self
    {
        $self = clone $this;
        $self['objectTypes'] = $objectTypes;

        return $self;
    }

    /**
     * @param CardType|value-of<CardType> $cardType
     */
    public function withCardType(CardType|string $cardType): self
    {
        $self = clone $this;
        $self['cardType'] = $cardType;

        return $self;
    }

    public function withServerlessFunction(string $serverlessFunction): self
    {
        $self = clone $this;
        $self['serverlessFunction'] = $serverlessFunction;

        return $self;
    }

    /**
     * URL to a service endpoint that will respond with details for this card. HubSpot will call this endpoint each time a user visits a CRM record page where this card should be displayed.
     */
    public function withTargetURL(string $targetURL): self
    {
        $self = clone $this;
        $self['targetURL'] = $targetURL;

        return $self;
    }
}
