<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\Tasks;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * Move an Object identified by `{taskId}` to the recycling bin.
 *
 * @see HubspotSDK\Services\Crm\Objects\TasksService::delete()
 *
 * @phpstan-type TaskDeleteParamsShape = array{objectType: string}
 */
final class TaskDeleteParams implements BaseModel
{
    /** @use SdkModel<TaskDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $objectType;

    /**
     * `new TaskDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TaskDeleteParams::with(objectType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TaskDeleteParams)->withObjectType(...)
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
     */
    public static function with(string $objectType): self
    {
        $self = new self;

        $self['objectType'] = $objectType;

        return $self;
    }

    public function withObjectType(string $objectType): self
    {
        $self = clone $this;
        $self['objectType'] = $objectType;

        return $self;
    }
}
