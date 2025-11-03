<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type PublicCardListResponseShape = array{
 *   results: list<PublicCardResponse>
 * }
 */
final class PublicCardListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<PublicCardListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<PublicCardResponse> $results */
    #[Api(list: PublicCardResponse::class)]
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
     * @param list<PublicCardResponse> $results
     */
    public static function with(array $results): self
    {
        $obj = new self;

        $obj->results = $results;

        return $obj;
    }

    /**
     * @param list<PublicCardResponse> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }
}
