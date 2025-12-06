<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Extensions\Cards\CardObjectTypeBody\Name;

/**
 * @phpstan-type PublicCardFetchBodyShape = array{
 *   objectTypes: list<CardObjectTypeBody>, targetUrl: string
 * }
 */
final class PublicCardFetchBody implements BaseModel
{
    /** @use SdkModel<PublicCardFetchBodyShape> */
    use SdkModel;

    /** @var list<CardObjectTypeBody> $objectTypes */
    #[Api(list: CardObjectTypeBody::class)]
    public array $objectTypes;

    #[Api]
    public string $targetUrl;

    /**
     * `new PublicCardFetchBody()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicCardFetchBody::with(objectTypes: ..., targetUrl: ...)
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
     * @param list<CardObjectTypeBody|array{
     *   name: value-of<Name>, propertiesToSend: list<string>
     * }> $objectTypes
     */
    public static function with(array $objectTypes, string $targetUrl): self
    {
        $obj = new self;

        $obj['objectTypes'] = $objectTypes;
        $obj['targetUrl'] = $targetUrl;

        return $obj;
    }

    /**
     * @param list<CardObjectTypeBody|array{
     *   name: value-of<Name>, propertiesToSend: list<string>
     * }> $objectTypes
     */
    public function withObjectTypes(array $objectTypes): self
    {
        $obj = clone $this;
        $obj['objectTypes'] = $objectTypes;

        return $obj;
    }

    public function withTargetURL(string $targetURL): self
    {
        $obj = clone $this;
        $obj['targetUrl'] = $targetURL;

        return $obj;
    }
}
