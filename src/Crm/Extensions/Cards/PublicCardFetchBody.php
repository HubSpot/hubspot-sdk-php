<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CardObjectTypeBodyShape from \HubspotSDK\Crm\Extensions\Cards\CardObjectTypeBody
 *
 * @phpstan-type PublicCardFetchBodyShape = array{
 *   objectTypes: list<CardObjectTypeBody|CardObjectTypeBodyShape>,
 *   targetURL: string,
 * }
 */
final class PublicCardFetchBody implements BaseModel
{
    /** @use SdkModel<PublicCardFetchBodyShape> */
    use SdkModel;

    /** @var list<CardObjectTypeBody> $objectTypes */
    #[Required(list: CardObjectTypeBody::class)]
    public array $objectTypes;

    #[Required('targetUrl')]
    public string $targetURL;

    /**
     * `new PublicCardFetchBody()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicCardFetchBody::with(objectTypes: ..., targetURL: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicCardFetchBody)->withObjectTypes(...)->withTargetURL(...)
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
     * @param list<CardObjectTypeBody|CardObjectTypeBodyShape> $objectTypes
     */
    public static function with(array $objectTypes, string $targetURL): self
    {
        $self = new self;

        $self['objectTypes'] = $objectTypes;
        $self['targetURL'] = $targetURL;

        return $self;
    }

    /**
     * @param list<CardObjectTypeBody|CardObjectTypeBodyShape> $objectTypes
     */
    public function withObjectTypes(array $objectTypes): self
    {
        $self = clone $this;
        $self['objectTypes'] = $objectTypes;

        return $self;
    }

    public function withTargetURL(string $targetURL): self
    {
        $self = clone $this;
        $self['targetURL'] = $targetURL;

        return $self;
    }
}
