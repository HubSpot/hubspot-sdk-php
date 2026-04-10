<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Extensions\CardsDev;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicCardResponseShape from \HubSpotSDK\Crm\Extensions\CardsDev\PublicCardResponse
 *
 * @phpstan-type PublicCardListResponseShape = array{
 *   results: list<PublicCardResponse|PublicCardResponseShape>
 * }
 */
final class PublicCardListResponse implements BaseModel
{
    /** @use SdkModel<PublicCardListResponseShape> */
    use SdkModel;

    /**
     * A list of card responses.
     *
     * @var list<PublicCardResponse> $results
     */
    #[Required(list: PublicCardResponse::class)]
    public array $results;

    /**
     * `new PublicCardListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PublicCardListResponse::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PublicCardListResponse)->withResults(...)
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
     * @param list<PublicCardResponse|PublicCardResponseShape> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * A list of card responses.
     *
     * @param list<PublicCardResponse|PublicCardResponseShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
