<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\PropertiesValidations;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicPropertyValidationRuleMapShape from \HubspotSDK\Crm\PropertiesValidations\PublicPropertyValidationRuleMap
 *
 * @phpstan-type CollectionResponsePublicPropertyValidationRuleMapNoPagingShape = array{
 *   results: list<PublicPropertyValidationRuleMap|PublicPropertyValidationRuleMapShape>,
 * }
 */
final class CollectionResponsePublicPropertyValidationRuleMapNoPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponsePublicPropertyValidationRuleMapNoPagingShape> */
    use SdkModel;

    /**
     * Collection of properties with their validation rules. Each item maps a property name to its configured validation rules for the specified object type.
     *
     * @var list<PublicPropertyValidationRuleMap> $results
     */
    #[Required(list: PublicPropertyValidationRuleMap::class)]
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
     * @param list<PublicPropertyValidationRuleMap|PublicPropertyValidationRuleMapShape> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * Collection of properties with their validation rules. Each item maps a property name to its configured validation rules for the specified object type.
     *
     * @param list<PublicPropertyValidationRuleMap|PublicPropertyValidationRuleMapShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
