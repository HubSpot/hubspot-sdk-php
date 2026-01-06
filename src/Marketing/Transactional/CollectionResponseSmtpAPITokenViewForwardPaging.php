<?php

declare(strict_types=1);

namespace HubspotSDK\Marketing\Transactional;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\ForwardPaging;
use HubspotSDK\NextPage;

/**
 * @phpstan-type CollectionResponseSmtpAPITokenViewForwardPagingShape = array{
 *   results: list<SmtpAPITokenView>, paging?: ForwardPaging|null
 * }
 */
final class CollectionResponseSmtpAPITokenViewForwardPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponseSmtpAPITokenViewForwardPagingShape> */
    use SdkModel;

    /** @var list<SmtpAPITokenView> $results */
    #[Required(list: SmtpAPITokenView::class)]
    public array $results;

    #[Optional]
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
     * @param list<SmtpAPITokenView|array{
     *   id: string,
     *   campaignName: string,
     *   createContact: bool,
     *   createdAt: \DateTimeInterface,
     *   createdBy: string,
     *   emailCampaignID: string,
     *   password?: string|null,
     * }> $results
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public static function with(
        array $results,
        ForwardPaging|array|null $paging = null
    ): self {
        $obj = new self;

        $obj['results'] = $results;

        null !== $paging && $obj['paging'] = $paging;

        return $obj;
    }

    /**
     * @param list<SmtpAPITokenView|array{
     *   id: string,
     *   campaignName: string,
     *   createContact: bool,
     *   createdAt: \DateTimeInterface,
     *   createdBy: string,
     *   emailCampaignID: string,
     *   password?: string|null,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }

    /**
     * @param ForwardPaging|array{next?: NextPage|null} $paging
     */
    public function withPaging(ForwardPaging|array $paging): self
    {
        $obj = clone $this;
        $obj['paging'] = $paging;

        return $obj;
    }
}
