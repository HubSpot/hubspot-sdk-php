<?php

declare(strict_types=1);

namespace HubSpotSDK\Events\Definitions;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ExternalPrimaryObjectResolutionRuleShape from \HubSpotSDK\Events\Definitions\ExternalPrimaryObjectResolutionRule
 *
 * @phpstan-type ExternalObjectResolutionMappingResponseShape = array{
 *   primaryObjectRule: ExternalPrimaryObjectResolutionRule|ExternalPrimaryObjectResolutionRuleShape,
 * }
 */
final class ExternalObjectResolutionMappingResponse implements BaseModel
{
    /** @use SdkModel<ExternalObjectResolutionMappingResponseShape> */
    use SdkModel;

    #[Required]
    public ExternalPrimaryObjectResolutionRule $primaryObjectRule;

    /**
     * `new ExternalObjectResolutionMappingResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalObjectResolutionMappingResponse::with(primaryObjectRule: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalObjectResolutionMappingResponse)->withPrimaryObjectRule(...)
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
