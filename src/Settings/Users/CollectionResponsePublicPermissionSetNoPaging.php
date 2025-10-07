<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Users;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type collection_response_public_permission_set_no_paging = array{
 *   results: list<PublicPermissionSet>
 * }
 */
final class CollectionResponsePublicPermissionSetNoPaging implements BaseModel
{
    /** @use SdkModel<collection_response_public_permission_set_no_paging> */
    use SdkModel;

    /** @var list<PublicPermissionSet> $results */
    #[Api(list: PublicPermissionSet::class)]
    public array $results;

    /**
     * `new CollectionResponsePublicPermissionSetNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponsePublicPermissionSetNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponsePublicPermissionSetNoPaging)->withResults(...)
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
     * @param list<PublicPermissionSet> $results
     */
    public static function with(array $results): self
    {
        $obj = new self;

        $obj->results = $results;

        return $obj;
    }

    /**
     * @param list<PublicPermissionSet> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }
}
