<?php

declare(strict_types=1);

namespace HubspotSDK\Crm\Objects\CommercePayments;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\Crm\Objects\PublicAssociationsForObject;

/**
 * Create a single payment. Include a `properties` object to define [property values](https://developers.hubspot.com/docs/guides/api/crm/properties) for the {objectName}, along with an `associations` array to define [associations](https://developers.hubspot.com/docs/guides/api/crm/associations/associations-v4) with other CRM records.
 *
 * @see HubspotSDK\Services\Crm\Objects\CommercePaymentsService::create()
 *
 * @phpstan-import-type PublicAssociationsForObjectShape from \HubspotSDK\Crm\Objects\PublicAssociationsForObject
 *
 * @phpstan-type CommercePaymentCreateParamsShape = array{
 *   associations: list<PublicAssociationsForObject|PublicAssociationsForObjectShape>,
 *   properties: array<string,string>,
 * }
 */
final class CommercePaymentCreateParams implements BaseModel
{
    /** @use SdkModel<CommercePaymentCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<PublicAssociationsForObject> $associations */
    #[Required(list: PublicAssociationsForObject::class)]
    public array $associations;

    /**
     * Key-value pairs for setting properties for the new object.
     *
     * @var array<string,string> $properties
     */
    #[Required(map: 'string')]
    public array $properties;

    /**
     * `new CommercePaymentCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CommercePaymentCreateParams::with(associations: ..., properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CommercePaymentCreateParams)->withAssociations(...)->withProperties(...)
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
     * @param list<PublicAssociationsForObject|PublicAssociationsForObjectShape> $associations
     * @param array<string,string> $properties
     */
    public static function with(array $associations, array $properties): self
    {
        $self = new self;

        $self['associations'] = $associations;
        $self['properties'] = $properties;

        return $self;
    }

    /**
     * @param list<PublicAssociationsForObject|PublicAssociationsForObjectShape> $associations
     */
    public function withAssociations(array $associations): self
    {
        $self = clone $this;
        $self['associations'] = $associations;

        return $self;
    }

    /**
     * Key-value pairs for setting properties for the new object.
     *
     * @param array<string,string> $properties
     */
    public function withProperties(array $properties): self
    {
        $self = clone $this;
        $self['properties'] = $properties;

        return $self;
    }
}
