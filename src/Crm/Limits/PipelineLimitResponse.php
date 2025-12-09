<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Limits;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type PipelineLimitResponseShape = array{
 *   customObjectTypes: CustomObjectRecordLimitResponse,
 *   hubspotDefinedObjectTypes: list<LimitAndUsageForObjectType>,
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
        $obj = new self;

        $obj['customObjectTypes'] = $customObjectTypes;
        $obj['hubspotDefinedObjectTypes'] = $hubspotDefinedObjectTypes;

        return $obj;
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
        $obj = clone $this;
        $obj['customObjectTypes'] = $customObjectTypes;

        return $obj;
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
        $obj = clone $this;
        $obj['hubspotDefinedObjectTypes'] = $hubspotDefinedObjectTypes;

        return $obj;
    }
}
