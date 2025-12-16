<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicActionFunctionIdentifierShape from \HubspotSDK\Automation\Actions\PublicActionFunctionIdentifier
 *
 * @phpstan-type CollectionResponsePublicActionFunctionIdentifierNoPagingShape = array{
 *   results: list<PublicActionFunctionIdentifierShape>
 * }
 */
final class CollectionResponsePublicActionFunctionIdentifierNoPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponsePublicActionFunctionIdentifierNoPagingShape> */
    use SdkModel;

    /** @var list<PublicActionFunctionIdentifier> $results */
    #[Required(list: PublicActionFunctionIdentifier::class)]
    public array $results;

    /**
     * `new CollectionResponsePublicActionFunctionIdentifierNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponsePublicActionFunctionIdentifierNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponsePublicActionFunctionIdentifierNoPaging)->withResults(...)
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
     * @param list<PublicActionFunctionIdentifierShape> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * @param list<PublicActionFunctionIdentifierShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
