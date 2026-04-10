<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\PropertiesValidations;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PublicPropertyValidationRuleShape from \HubSpotSDK\Crm\PropertiesValidations\PublicPropertyValidationRule
 *
 * @phpstan-type CollectionResponsePublicPropertyValidationRuleNoPagingShape = array{
 *   results: list<PublicPropertyValidationRule|PublicPropertyValidationRuleShape>
 * }
 */
final class CollectionResponsePublicPropertyValidationRuleNoPaging implements BaseModel
{
    /** @use SdkModel<CollectionResponsePublicPropertyValidationRuleNoPagingShape> */
    use SdkModel;

    /**
     * Collection of validation rules configured for the specified property. Each rule defines a constraint that property values must satisfy (e.g., format requirements, length limits, allowed values).
     *
     * @var list<PublicPropertyValidationRule> $results
     */
    #[Required(list: PublicPropertyValidationRule::class)]
    public array $results;

    /**
     * `new CollectionResponsePublicPropertyValidationRuleNoPaging()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionResponsePublicPropertyValidationRuleNoPaging::with(results: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionResponsePublicPropertyValidationRuleNoPaging)->withResults(...)
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
     * @param list<PublicPropertyValidationRule|PublicPropertyValidationRuleShape> $results
     */
    public static function with(array $results): self
    {
        $self = new self;

        $self['results'] = $results;

        return $self;
    }

    /**
     * Collection of validation rules configured for the specified property. Each rule defines a constraint that property values must satisfy (e.g., format requirements, length limits, allowed values).
     *
     * @param list<PublicPropertyValidationRule|PublicPropertyValidationRuleShape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
