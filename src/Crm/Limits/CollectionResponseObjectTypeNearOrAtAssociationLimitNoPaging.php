<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Limits;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CollectionResponseObjectTypeNearOrAtAssociationLimitNoPagingShape = array{
 *   results: list<ObjectTypeNearOrAtAssociationLimit>
 * }
 */
final class CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging implements BaseModel
{
    /**
     * @use SdkModel<CollectionResponseObjectTypeNearOrAtAssociationLimitNoPagingShape>
     */
    use SdkModel;

    /** @var list<ObjectTypeNearOrAtAssociationLimit> $results */
    #[Api(list: ObjectTypeNearOrAtAssociationLimit::class)]
    public array $results;

    /**
     * `new CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponseObjectTypeNearOrAtAssociationLimitNoPaging)
     *   ->withResults(...)
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
     * @param list<ObjectTypeNearOrAtAssociationLimit|array{
     *   hasRecordsAtLimit: bool,
     *   hasRecordsNearLimit: bool,
     *   objectTypeId: string,
     *   pluralLabel: string,
     *   singularLabel: string,
     * }> $results
     */
    public static function with(array $results): self
    {
        $obj = new self;

        $obj['results'] = $results;

        return $obj;
    }

    /**
     * @param list<ObjectTypeNearOrAtAssociationLimit|array{
     *   hasRecordsAtLimit: bool,
     *   hasRecordsNearLimit: bool,
     *   objectTypeId: string,
     *   pluralLabel: string,
     *   singularLabel: string,
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }
}
