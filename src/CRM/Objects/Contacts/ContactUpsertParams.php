<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\Contacts;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\Objects\CRMObjectsSimplePublicObjectBatchInputUpsert;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ContactUpsertParams); // set properties as needed
 * $client->crm.objects.contacts->upsert(...$params->toArray());
 * ```
 * Create or update a batch of contacts.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->crm.objects.contacts->upsert(...$params->toArray());`
 *
 * @see HubspotSDK\CRM\Objects\Contacts->upsert
 *
 * @phpstan-type contact_upsert_params = array{
 *   inputs: list<CRMObjectsSimplePublicObjectBatchInputUpsert>
 * }
 */
final class ContactUpsertParams implements BaseModel
{
    /** @use SdkModel<contact_upsert_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<CRMObjectsSimplePublicObjectBatchInputUpsert> $inputs */
    #[Api(list: CRMObjectsSimplePublicObjectBatchInputUpsert::class)]
    public array $inputs;

    /**
     * `new ContactUpsertParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ContactUpsertParams::with(inputs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ContactUpsertParams)->withInputs(...)
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
     * @param list<CRMObjectsSimplePublicObjectBatchInputUpsert> $inputs
     */
    public static function with(array $inputs): self
    {
        $obj = new self;

        $obj->inputs = $inputs;

        return $obj;
    }

    /**
     * @param list<CRMObjectsSimplePublicObjectBatchInputUpsert> $inputs
     */
    public function withInputs(array $inputs): self
    {
        $obj = clone $this;
        $obj->inputs = $inputs;

        return $obj;
    }
}
