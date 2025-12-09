<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Workflows;

use HubspotSDK\Automation\Workflows\APIUnEnrollmentSetting\Type;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type APIUnEnrollmentSettingShape = array{
 *   flowIds: list<string>, type: value-of<Type>
 * }
 */
final class APIUnEnrollmentSetting implements BaseModel
{
    /** @use SdkModel<APIUnEnrollmentSettingShape> */
    use SdkModel;

    /** @var list<string> $flowIds */
    #[Required(list: 'string')]
    public array $flowIds;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new APIUnEnrollmentSetting()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * APIUnEnrollmentSetting::with(flowIds: ..., type: ...)
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
     * @param list<string> $flowIds
     * @param Type|value-of<Type> $type
     */
    public static function with(array $flowIds, Type|string $type): self
    {
        $obj = new self;

        $obj['flowIds'] = $flowIds;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * @param list<string> $flowIDs
     */
    public function withFlowIDs(array $flowIDs): self
    {
        $obj = clone $this;
        $obj['flowIds'] = $flowIDs;

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
