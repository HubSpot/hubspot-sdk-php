<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\CardsDev;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CardActionsShape = array{baseURLs: list<string>}
 */
final class CardActions implements BaseModel
{
    /** @use SdkModel<CardActionsShape> */
    use SdkModel;

    /**
     * A list of URL prefixes that will be accepted for card action URLs. If your data fetch response includes an action URL that doesn't begin with one of these values, it will result in an error and the card will not be displayed.
     *
     * @var list<string> $baseURLs
     */
    #[Required('baseUrls', list: 'string')]
    public array $baseURLs;

    /**
     * `new CardActions()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CardActions::with(baseURLs: ...)
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
     * @param list<string> $baseURLs
     */
    public static function with(array $baseURLs): self
    {
        $self = new self;

        $self['baseURLs'] = $baseURLs;

        return $self;
    }

    /**
     * A list of URL prefixes that will be accepted for card action URLs. If your data fetch response includes an action URL that doesn't begin with one of these values, it will result in an error and the card will not be displayed.
     *
     * @param list<string> $baseURLs
     */
    public function withBaseURLs(array $baseURLs): self
    {
        $self = clone $this;
        $self['baseURLs'] = $baseURLs;

        return $self;
    }
}
