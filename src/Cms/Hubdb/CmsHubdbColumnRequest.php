<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Hubdb;

use HubspotSDK\Cms\Hubdb\CmsHubdbColumnRequest\Type;
use HubspotSDK\Core\Attributes\Api;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Contracts\BaseModel;
use HubspotSDK\CRM\CRMOption;

/**
 * @phpstan-type cms_hubdb_column_request = array{
 *   id: int,
 *   label: string,
 *   name: string,
 *   options: list<CRMOption>,
 *   type: value-of<Type>,
 *   foreignColumnID?: int,
 *   foreignTableID?: int,
 *   maxNumberOfCharacters?: int,
 *   maxNumberOfOptions?: int,
 * }
 */
final class CmsHubdbColumnRequest implements BaseModel
{
    /** @use SdkModel<cms_hubdb_column_request> */
    use SdkModel;

    #[Api]
    public int $id;

    #[Api]
    public string $label;

    #[Api]
    public string $name;

    /** @var list<CRMOption> $options */
    #[Api(list: CRMOption::class)]
    public array $options;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    #[Api('foreignColumnId', optional: true)]
    public ?int $foreignColumnID;

    #[Api('foreignTableId', optional: true)]
    public ?int $foreignTableID;

    #[Api(optional: true)]
    public ?int $maxNumberOfCharacters;

    #[Api(optional: true)]
    public ?int $maxNumberOfOptions;

    /**
     * `new CmsHubdbColumnRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CmsHubdbColumnRequest::with(
     *   id: ..., label: ..., name: ..., options: ..., type: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CmsHubdbColumnRequest)
     *   ->withID(...)
     *   ->withLabel(...)
     *   ->withName(...)
     *   ->withOptions(...)
     *   ->withType(...)
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
     * @param list<CRMOption> $options
     * @param Type|value-of<Type> $type
     */
    public static function with(
        int $id,
        string $label,
        string $name,
        array $options,
        Type|string $type,
        ?int $foreignColumnID = null,
        ?int $foreignTableID = null,
        ?int $maxNumberOfCharacters = null,
        ?int $maxNumberOfOptions = null,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->label = $label;
        $obj->name = $name;
        $obj->options = $options;
        $obj['type'] = $type;

        null !== $foreignColumnID && $obj->foreignColumnID = $foreignColumnID;
        null !== $foreignTableID && $obj->foreignTableID = $foreignTableID;
        null !== $maxNumberOfCharacters && $obj->maxNumberOfCharacters = $maxNumberOfCharacters;
        null !== $maxNumberOfOptions && $obj->maxNumberOfOptions = $maxNumberOfOptions;

        return $obj;
    }

    public function withID(int $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * @param list<CRMOption> $options
     */
    public function withOptions(array $options): self
    {
        $obj = clone $this;
        $obj->options = $options;

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

    public function withForeignColumnID(int $foreignColumnID): self
    {
        $obj = clone $this;
        $obj->foreignColumnID = $foreignColumnID;

        return $obj;
    }

    public function withForeignTableID(int $foreignTableID): self
    {
        $obj = clone $this;
        $obj->foreignTableID = $foreignTableID;

        return $obj;
    }

    public function withMaxNumberOfCharacters(int $maxNumberOfCharacters): self
    {
        $obj = clone $this;
        $obj->maxNumberOfCharacters = $maxNumberOfCharacters;

        return $obj;
    }

    public function withMaxNumberOfOptions(int $maxNumberOfOptions): self
    {
        $obj = clone $this;
        $obj->maxNumberOfOptions = $maxNumberOfOptions;

        return $obj;
    }
}
