<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\PropertyValidations;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type CollectionResponsePublicPropertyValidationRuleMapNoPagingShape = array{
 *   results: list<PublicPropertyValidationRuleMap>
 * }
 */
final class CollectionResponsePublicPropertyValidationRuleMapNoPaging implements BaseModel, ResponseConverter
{
    /**
     * @use SdkModel<CollectionResponsePublicPropertyValidationRuleMapNoPagingShape>
     */
    use SdkModel;

    use SdkResponse;

    /** @var list<PublicPropertyValidationRuleMap> $results */
    #[Api(list: PublicPropertyValidationRuleMap::class)]
    public array $results;

    /**
     * `new CollectionResponsePublicPropertyValidationRuleMapNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponsePublicPropertyValidationRuleMapNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponsePublicPropertyValidationRuleMapNoPaging)
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
     * @param list<PublicPropertyValidationRuleMap> $results
     */
    public static function with(array $results): self
    {
        $obj = new self;

        $obj->results = $results;

        return $obj;
    }

    /**
     * @param list<PublicPropertyValidationRuleMap> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }
}
