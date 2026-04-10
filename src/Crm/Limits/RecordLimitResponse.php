<?php

declare(strict_types=1);

namespace HubSpotSDK\Crm\Limits;

use HubSpotSDK\Core\Attributes\Required;
use HubSpotSDK\Core\Concerns\SdkModel;
use HubSpotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CustomObjectRecordLimitResponseShape from \HubSpotSDK\Crm\Limits\CustomObjectRecordLimitResponse
 * @phpstan-import-type LimitAndUsageForObjectTypeShape from \HubSpotSDK\Crm\Limits\LimitAndUsageForObjectType
 *
 * @phpstan-type RecordLimitResponseShape = array{
 *   customObjectTypes: CustomObjectRecordLimitResponse|CustomObjectRecordLimitResponseShape,
 *   hubSpotDefinedObjectTypes: list<LimitAndUsageForObjectType|LimitAndUsageForObjectTypeShape>,
 * }
 */
final class RecordLimitResponse implements BaseModel
{
    /** @use SdkModel<RecordLimitResponseShape> */
    use SdkModel;

    #[Required]
    public CustomObjectRecordLimitResponse $customObjectTypes;

    /** @var list<LimitAndUsageForObjectType> $hubSpotDefinedObjectTypes */
    #[Required(
        'hubspotDefinedObjectTypes',
        list: LimitAndUsageForObjectType::class
    )]
    public array $hubSpotDefinedObjectTypes;

    /**
     * `new RecordLimitResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RecordLimitResponse::with(
     *   customObjectTypes: ..., hubSpotDefinedObjectTypes: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RecordLimitResponse)
     *   ->withCustomObjectTypes(...)
     *   ->withHubSpotDefinedObjectTypes(...)
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
     * @param list<LimitAndUsageForObjectType|LimitAndUsageForObjectTypeShape> $hubSpotDefinedObjectTypes
     */
    public static function with(
        CustomObjectRecordLimitResponse|array $customObjectTypes,
        array $hubSpotDefinedObjectTypes,
    ): self {
        $self = new self;

        $self['customObjectTypes'] = $customObjectTypes;
        $self['hubSpotDefinedObjectTypes'] = $hubSpotDefinedObjectTypes;

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
     * @param list<LimitAndUsageForObjectType|LimitAndUsageForObjectTypeShape> $hubSpotDefinedObjectTypes
     */
    public function withHubSpotDefinedObjectTypes(
        array $hubSpotDefinedObjectTypes
    ): self {
        $self = clone $this;
        $self['hubSpotDefinedObjectTypes'] = $hubSpotDefinedObjectTypes;

        return $self;
    }
}
