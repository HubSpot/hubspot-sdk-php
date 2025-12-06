<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Limits;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type PipelineLimitResponseShape = array{
 *   customObjectTypes: CustomObjectRecordLimitResponse,
 *   hubspotDefinedObjectTypes: list<LimitAndUsageForObjectType>,
 * }
 */
final class PipelineLimitResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<PipelineLimitResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public CustomObjectRecordLimitResponse $customObjectTypes;

    /** @var list<LimitAndUsageForObjectType> $hubspotDefinedObjectTypes */
    #[Api(list: LimitAndUsageForObjectType::class)]
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
     *   objectTypeId: string,
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
     *   objectTypeId: string,
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
