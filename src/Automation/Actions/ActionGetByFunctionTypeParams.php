<?php

declare(strict_types=1);

namespace HubspotSDK\Automation\Actions;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionGetByFunctionTypeParams); // set properties as needed
 * $client->automation.actions->getByFunctionType(...$params->toArray());
 * ```
 * Retrieve functions by a type for a given definition.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->automation.actions->getByFunctionType(...$params->toArray());`
 *
 * @see HubspotSDK\Automation\Actions->getByFunctionType
 *
 * @phpstan-type action_get_by_function_type_params = array{
 *   appID: int, definitionID: string
 * }
 */
final class ActionGetByFunctionTypeParams implements BaseModel
{
    /** @use SdkModel<action_get_by_function_type_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public int $appID;

    #[Api]
    public string $definitionID;

    /**
     * `new ActionGetByFunctionTypeParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionGetByFunctionTypeParams::with(appID: ..., definitionID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionGetByFunctionTypeParams)->withAppID(...)->withDefinitionID(...)
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
    public static function with(int $appID, string $definitionID): self
    {
        $obj = new self;

        $obj->appID = $appID;
        $obj->definitionID = $definitionID;

        return $obj;
    }

    public function withAppID(int $appID): self
    {
        $obj = clone $this;
        $obj->appID = $appID;

        return $obj;
    }

    public function withDefinitionID(string $definitionID): self
    {
        $obj = clone $this;
        $obj->definitionID = $definitionID;

        return $obj;
    }
}
