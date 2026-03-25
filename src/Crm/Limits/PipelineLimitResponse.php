<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Limits;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CustomObjectRecordLimitResponseShape from \HubspotSDK\Crm\Limits\CustomObjectRecordLimitResponse
 * @phpstan-import-type LimitAndUsageForObjectTypeShape from \HubspotSDK\Crm\Limits\LimitAndUsageForObjectType
 *
 * @phpstan-type PipelineLimitResponseShape = array{
 *   customObjectTypes: CustomObjectRecordLimitResponse|CustomObjectRecordLimitResponseShape,
 *   hubspotDefinedObjectTypes: list<LimitAndUsageForObjectType|LimitAndUsageForObjectTypeShape>,
 * }
 */
final class PipelineLimitResponse implements BaseModel
{
    /** @use SdkModel<PipelineLimitResponseShape> */
    use SdkModel;

    #[Required]
    public CustomObjectRecordLimitResponse $customObjectTypes;

    /** @var list<LimitAndUsageForObjectType> $hubspotDefinedObjectTypes */
    #[Required(list: LimitAndUsageForObjectType::class)]
    public array $hubspotDefinedObjectTypes;

    /**
     * `new PipelineLimitResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PipelineLimitResponse::with(
     *   customObjectTypes: ..., hubspotDefinedObjectTypes: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PipelineLimitResponse)
     *   ->withCustomObjectTypes(...)
     *   ->withHubspotDefinedObjectTypes(...)
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
     * @param CustomObjectRecordLimitResponse|CustomObjectRecordLimitResponseShape $customObjectTypes
     * @param list<LimitAndUsageForObjectType|LimitAndUsageForObjectTypeShape> $hubspotDefinedObjectTypes
     */
    public static function with(
        CustomObjectRecordLimitResponse|array $customObjectTypes,
        array $hubspotDefinedObjectTypes,
    ): self {
        $self = new self;

        $self['customObjectTypes'] = $customObjectTypes;
        $self['hubspotDefinedObjectTypes'] = $hubspotDefinedObjectTypes;

        return $self;
    }

    /**
     * @param CustomObjectRecordLimitResponse|CustomObjectRecordLimitResponseShape $customObjectTypes
     */
    public function withCustomObjectTypes(
        CustomObjectRecordLimitResponse|array $customObjectTypes
    ): self {
        $self = clone $this;
        $self['customObjectTypes'] = $customObjectTypes;

        return $self;
    }

    /**
     * @param list<LimitAndUsageForObjectType|LimitAndUsageForObjectTypeShape> $hubspotDefinedObjectTypes
     */
    public function withHubspotDefinedObjectTypes(
        array $hubspotDefinedObjectTypes
    ): self {
        $self = clone $this;
        $self['hubspotDefinedObjectTypes'] = $hubspotDefinedObjectTypes;

        return $self;
    }
}
