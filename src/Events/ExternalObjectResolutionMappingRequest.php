<?php

declare(strict_types=1);

namespace HubspotSDK\Events;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ExternalPrimaryObjectResolutionRuleShape from \HubspotSDK\Events\ExternalPrimaryObjectResolutionRule
 *
 * @phpstan-type ExternalObjectResolutionMappingRequestShape = array{
 *   primaryObjectRule: ExternalPrimaryObjectResolutionRule|ExternalPrimaryObjectResolutionRuleShape,
 * }
 */
final class ExternalObjectResolutionMappingRequest implements BaseModel
{
    /** @use SdkModel<ExternalObjectResolutionMappingRequestShape> */
    use SdkModel;

    #[Required]
    public ExternalPrimaryObjectResolutionRule $primaryObjectRule;

    /**
     * `new ExternalObjectResolutionMappingRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalObjectResolutionMappingRequest::with(primaryObjectRule: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalObjectResolutionMappingRequest)->withPrimaryObjectRule(...)
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
     * @param ExternalPrimaryObjectResolutionRule|ExternalPrimaryObjectResolutionRuleShape $primaryObjectRule
     */
    public static function with(
        ExternalPrimaryObjectResolutionRule|array $primaryObjectRule
    ): self {
        $self = new self;

        $self['primaryObjectRule'] = $primaryObjectRule;

        return $self;
    }

    /**
     * @param ExternalPrimaryObjectResolutionRule|ExternalPrimaryObjectResolutionRuleShape $primaryObjectRule
     */
    public function withPrimaryObjectRule(
        ExternalPrimaryObjectResolutionRule|array $primaryObjectRule
    ): self {
        $self = clone $this;
        $self['primaryObjectRule'] = $primaryObjectRule;

        return $self;
    }
}
