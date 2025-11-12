<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Configuration for custom user actions on cards.
 *
 * @phpstan-type CardActionsShape = array{baseUrls: list<string>}
 */
final class CardActions implements BaseModel
{
    /** @use SdkModel<CardActionsShape> */
    use SdkModel;

    /**
     * A list of URL prefixes that will be accepted for card action URLs. If your data fetch response includes an action URL that doesn't begin with one of these values, it will result in an error and the card will not be displayed.
     *
     * @var list<string> $baseUrls
     */
    #[Api(list: 'string')]
    public array $baseUrls;

    /**
     * `new CardActions()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CardActions::with(baseUrls: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CardActions)->withBaseURLs(...)
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
     * @param list<string> $baseUrls
     */
    public static function with(array $baseUrls): self
    {
        $obj = new self;

        $obj->baseUrls = $baseUrls;

        return $obj;
    }

    /**
     * A list of URL prefixes that will be accepted for card action URLs. If your data fetch response includes an action URL that doesn't begin with one of these values, it will result in an error and the card will not be displayed.
     *
     * @param list<string> $baseURLs
     */
    public function withBaseURLs(array $baseURLs): self
    {
        $obj = clone $this;
        $obj->baseUrls = $baseURLs;

        return $obj;
    }
}
