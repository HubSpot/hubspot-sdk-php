<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\Deals\Batch;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Objects\SimplePublicObjectBatchInputForCreate;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new BatchCreateParams); // set properties as needed
 * $client->crm.objects.deals.batch->create(...$params->toArray());
 * ```
 * Create a batch of deals.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.objects.deals.batch->create(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Objects\Deals\Batch->create
 *
 * @phpstan-type batch_create_params = array{
 *   inputs: list<SimplePublicObjectBatchInputForCreate>
 * }
 */
final class BatchCreateParams implements BaseModel
{
    /** @use SdkModel<batch_create_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<SimplePublicObjectBatchInputForCreate> $inputs */
    #[Api(list: SimplePublicObjectBatchInputForCreate::class)]
    public array $inputs;

    /**
     * `new BatchCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BatchCreateParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BatchCreateParams)->withInputs(...)
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
     * @param list<SimplePublicObjectBatchInputForCreate> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<SimplePublicObjectBatchInputForCreate> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
