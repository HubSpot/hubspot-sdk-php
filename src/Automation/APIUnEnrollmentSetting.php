<?php

declare(strict_types=1);

namespace HubspotSDK\Automation;

use HubspotSDK\Automation\APIUnEnrollmentSetting\Type;
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

    /** @var list<string> $flowIDs */
    #[Api('flowIds', list: 'string')]
    public array $flowIDs;

    /** @var value-of<Type> $type */
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
     * @param list<string> $flowIDs
     */
    public function withFlowIDs(array $flowIDs): self
    {
        $obj = clone $this;
        $obj->flowIDs = $flowIDs;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
