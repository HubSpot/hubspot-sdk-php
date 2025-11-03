<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Limits;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkResponse;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type RecordLimitResponseShape = array{
 *   customObjectTypes: CustomObjectRecordLimitResponse,
 *   hubspotDefinedObjectTypes: list<LimitAndUsageForObjectType>,
 * }
 */
final class RecordLimitResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<RecordLimitResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public CustomObjectRecordLimitResponse $customObjectTypes;

    /** @var list<LimitAndUsageForObjectType> $hubspotDefinedObjectTypes */
    #[Api(list: LimitAndUsageForObjectType::class)]
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
     * @param list<LimitAndUsageForObjectType> $hubspotDefinedObjectTypes
     */
    public static function with(
        CustomObjectRecordLimitResponse $customObjectTypes,
        array $hubspotDefinedObjectTypes,
    ): self {
        $obj = new self;

        $obj->customObjectTypes = $customObjectTypes;
        $obj->hubspotDefinedObjectTypes = $hubspotDefinedObjectTypes;

        return $obj;
    }

    public function withCustomObjectTypes(
        CustomObjectRecordLimitResponse $customObjectTypes
    ): self {
        $obj = clone $this;
        $obj->customObjectTypes = $customObjectTypes;

        return $obj;
    }

    /**
     * @param list<LimitAndUsageForObjectType> $hubspotDefinedObjectTypes
     */
    public function withHubspotDefinedObjectTypes(
        array $hubspotDefinedObjectTypes
    ): self {
        $obj = clone $this;
        $obj->hubspotDefinedObjectTypes = $hubspotDefinedObjectTypes;

        return $obj;
    }
}
