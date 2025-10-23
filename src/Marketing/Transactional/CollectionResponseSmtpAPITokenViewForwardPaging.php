<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Transactional;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;

/**
 * @phpstan-type collection_response_smtp_api_token_view_forward_paging = array{
 *   results: list<SmtpAPITokenView>, paging?: ForwardPaging
 * }
 */
final class CollectionResponseSmtpAPITokenViewForwardPaging implements BaseModel
{
    /** @use SdkModel<collection_response_smtp_api_token_view_forward_paging> */
    use SdkModel;

    /** @var list<SmtpAPITokenView> $results */
    #[Api(list: SmtpAPITokenView::class)]
    public array $results;

    #[Api(optional: true)]
    public ?ForwardPaging $paging;

    /**
     * `new CollectionResponseSmtpAPITokenViewForwardPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseSmtpAPITokenViewForwardPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseSmtpAPITokenViewForwardPaging)->withResults(...)
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
     * @param list<SmtpAPITokenView> $results
     */
    public static function with(
        array $results,
        ?ForwardPaging $paging = null
    ): self {
        $obj = new self;

        $obj->results = $results;

        null !== $paging && $obj->paging = $paging;

        return $obj;
    }

    /**
     * @param list<SmtpAPITokenView> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }

    public function withPaging(ForwardPaging $paging): self
    {
        $obj = clone $this;
        $obj->paging = $paging;

        return $obj;
    }
}
