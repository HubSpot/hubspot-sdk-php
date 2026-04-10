<?php

declare(strict_types=1);

namespace HubSpotSDK\Settings\Users;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicPermissionSetShape from \HubSpotSDK\Settings\Users\PublicPermissionSet
 *
 * @phpstan-type CollectionResponsePublicPermissionSetNoPagingShape = array{
 *   results: list<PublicPermissionSet|PublicPermissionSetShape>
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
     * @param list<PublicPermissionSet|PublicPermissionSetShape> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * @param list<PublicPermissionSet|PublicPermissionSetShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
