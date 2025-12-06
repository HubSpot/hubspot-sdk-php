<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Automation\Actions\PublicActionFunctionIdentifier\FunctionType;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type CollectionResponsePublicActionFunctionIdentifierNoPagingShape = array{
 *   results: list<PublicActionFunctionIdentifier>
 * }
 */
final class CollectionResponsePublicActionFunctionIdentifierNoPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponsePublicActionFunctionIdentifierNoPagingShape> */
    use SdkModel;

    /** @var list<PublicActionFunctionIdentifier> $results */
    #[Api(list: PublicActionFunctionIdentifier::class)]
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
     * @param list<PublicActionFunctionIdentifier|array{
     *   functionType: value-of<FunctionType>, id?: string|null
     * }> $results
     */
    public static function with(array $results): self
    {
        $obj = new self;

        $obj['results'] = $results;

        return $obj;
    }

    /**
     * @param list<PublicActionFunctionIdentifier|array{
     *   functionType: value-of<FunctionType>, id?: string|null
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }
}
