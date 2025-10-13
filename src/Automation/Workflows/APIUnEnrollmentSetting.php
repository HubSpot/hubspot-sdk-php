<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIUnEnrollmentSetting\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type api_un_enrollment_setting = array{
 *   flowIDs: list<string>, type: value-of<Type>
 * }
 */
final class APIUnEnrollmentSetting implements BaseModel
{
    /** @use SdkModel<api_un_enrollment_setting> */
    use SdkModel;

    /**
     * The IDs of the flows to unenroll an object in if it's enrolled in this flow.
     *
     * @var list<string> $flowIDs
     */
    #[Api('flowIds', list: 'string')]
    public array $flowIDs;

    /**
     * The type of unenrollment to perform:
     *
     * "ALL" - unenroll the object from all other flows
     *
     * "SELECTIVE" - only unenroll the object from the flows specified in `flowIds`
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new APIUnEnrollmentSetting()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIUnEnrollmentSetting::with(flowIDs: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new APIUnEnrollmentSetting)->withFlowIDs(...)->withType(...)
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
     * @param list<string> $flowIDs
     * @param Type|value-of<Type> $type
     */
    public static function with(array $flowIDs, Type|string $type): self
    {
        $obj = new self;

        $obj->flowIDs = $flowIDs;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * The IDs of the flows to unenroll an object in if it's enrolled in this flow.
     *
     * @param list<string> $flowIDs
     */
    public function withFlowIDs(array $flowIDs): self
    {
        $obj = clone $this;
        $obj->flowIDs = $flowIDs;

        return $obj;
    }

    /**
     * The type of unenrollment to perform:
     *
     * "ALL" - unenroll the object from all other flows
     *
     * "SELECTIVE" - only unenroll the object from the flows specified in `flowIds`
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
