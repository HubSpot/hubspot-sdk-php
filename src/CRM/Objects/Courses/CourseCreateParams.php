<?php

declare(strict_types=1);

namespace HubspotSDK\CRM\Objects\Courses;

use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\PublicAssociationsForObject;

/**
 * Create a course with the given properties and return a copy of the object, including the ID. Documentation and examples for creating standard courses is provided.
 *
 * @see HubspotSDK\CRM\Objects\Courses->create
 *
 * @phpstan-type CourseCreateParamsShape = array{
 *   properties: array<string, string>,
 *   associations?: list<PublicAssociationsForObject>,
 * }
 */
final class CourseCreateParams implements BaseModel
{
    /** @use SdkModel<CourseCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Key-value pairs for setting properties for the new object.
     *
     * @var array<string, string> $properties
     */
    #[Api(map: 'string')]
    public array $properties;

    /** @var list<PublicAssociationsForObject>|null $associations */
    #[Api(list: PublicAssociationsForObject::class, optional: true)]
    public ?array $associations;

    /**
     * `new CourseCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CourseCreateParams::with(properties: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CourseCreateParams)->withProperties(...)
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
     * @param array<string, string> $properties
     * @param list<PublicAssociationsForObject> $associations
     */
    public static function with(
        array $properties,
        ?array $associations = null
    ): self {
        $obj = new self;

        $obj->properties = $properties;

        null !== $associations && $obj->associations = $associations;

        return $obj;
    }

    /**
     * Key-value pairs for setting properties for the new object.
     *
     * @param array<string, string> $properties
     */
    public function withProperties(array $properties): self
    {
        $obj = clone $this;
        $obj->properties = $properties;

        return $obj;
    }

    /**
     * @param list<PublicAssociationsForObject> $associations
     */
    public function withAssociations(array $associations): self
    {
        $obj = clone $this;
        $obj->associations = $associations;

        return $obj;
    }
}
