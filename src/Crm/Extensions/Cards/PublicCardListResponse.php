<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Extensions\Cards;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PublicCardListResponseShape = array{
 *   results: list<PublicCardResponse>
 * }
 */
final class PublicCardListResponse implements BaseModel
{
    /** @use SdkModel<PublicCardListResponseShape> */
    use SdkModel;

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
     * @param list<PublicCardResponse|array{
     *   id: string,
     *   actions: CardActions,
     *   auditHistory: list<CardAuditResponse>,
     *   display: CardDisplayBody,
     *   fetch: PublicCardFetchBody,
     *   title: string,
     *   createdAt?: \DateTimeInterface|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $results
     */
    public static function with(array $results): self
    {
        $obj = new self;

        $obj['results'] = $results;

        return $obj;
    }

    /**
     * @param list<PublicCardResponse|array{
     *   id: string,
     *   actions: CardActions,
     *   auditHistory: list<CardAuditResponse>,
     *   display: CardDisplayBody,
     *   fetch: PublicCardFetchBody,
     *   title: string,
     *   createdAt?: \DateTimeInterface|null,
     *   updatedAt?: \DateTimeInterface|null,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }
}
