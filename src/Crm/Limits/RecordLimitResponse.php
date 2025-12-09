<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Limits;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type RecordLimitResponseShape = array{
 *   customObjectTypes: CustomObjectRecordLimitResponse,
 *   hubspotDefinedObjectTypes: list<LimitAndUsageForObjectType>,
 * }
 */
final class RecordLimitResponse implements BaseModel
{
    /** @use SdkModel<RecordLimitResponseShape> */
    use SdkModel;

    #[Required]
    public CustomObjectRecordLimitResponse $customObjectTypes;

    /** @var list<LimitAndUsageForObjectType> $hubspotDefinedObjectTypes */
    #[Required(list: LimitAndUsageForObjectType::class)]
    public array $hubspotDefinedObjectTypes;

    /**
     * `new RecordLimitResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RecordLimitResponse::with(
     *   customObjectTypes: ..., hubspotDefinedObjectTypes: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RecordLimitResponse)
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
     * @param CustomObjectRecordLimitResponse|array{
     *   byObjectType: list<UsageForObjectType>,
     *   overallLimit: int,
     *   overallPercentage: float,
     *   overallUsage: int,
     * } $customObjectTypes
     * @param list<LimitAndUsageForObjectType|array{
     *   limit: int,
     *   objectTypeID: string,
     *   percentage: float,
     *   pluralLabel: string,
     *   singularLabel: string,
     *   usage: int,
     * }> $hubspotDefinedObjectTypes
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
     * @param CustomObjectRecordLimitResponse|array{
     *   byObjectType: list<UsageForObjectType>,
     *   overallLimit: int,
     *   overallPercentage: float,
     *   overallUsage: int,
     * } $customObjectTypes
     */
    public function withCustomObjectTypes(
        CustomObjectRecordLimitResponse|array $customObjectTypes
    ): self {
        $self = clone $this;
        $self['customObjectTypes'] = $customObjectTypes;

        return $self;
    }

    /**
     * @param list<LimitAndUsageForObjectType|array{
     *   limit: int,
     *   objectTypeID: string,
     *   percentage: float,
     *   pluralLabel: string,
     *   singularLabel: string,
     *   usage: int,
     * }> $hubspotDefinedObjectTypes
     */
    public function withHubspotDefinedObjectTypes(
        array $hubspotDefinedObjectTypes
    ): self {
        $self = clone $this;
        $self['hubspotDefinedObjectTypes'] = $hubspotDefinedObjectTypes;

        return $self;
    }
}
