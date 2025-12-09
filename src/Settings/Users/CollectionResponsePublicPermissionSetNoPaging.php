<?php

declare(strict_types=1);

namespace HubspotSDK\Settings\Users;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CollectionResponsePublicPermissionSetNoPagingShape = array{
 *   results: list<PublicPermissionSet>
 * }
 */
final class CollectionResponsePublicPermissionSetNoPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponsePublicPermissionSetNoPagingShape> */
    use SdkModel;

    /** @var list<PublicPermissionSet> $results */
    #[Required(list: PublicPermissionSet::class)]
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
     * @param list<PublicPermissionSet|array{
     *   id: string, name: string, requiresBillingWrite: bool
     * }> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * @param list<PublicPermissionSet|array{
     *   id: string, name: string, requiresBillingWrite: bool
     * }> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
