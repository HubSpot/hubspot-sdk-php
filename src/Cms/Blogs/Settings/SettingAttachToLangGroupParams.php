<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Settings;

use HubspotSDK\Core\Attributes\Optional;
use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Cms\Blogs\SettingsService::attachToLangGroup()
 *
 * @phpstan-type SettingAttachToLangGroupParamsShape = array{
 *   id: string, language: string, primaryId: string, primaryLanguage?: string
 * }
 */
final class SettingAttachToLangGroupParams implements BaseModel
{
    /** @use SdkModel<SettingAttachToLangGroupParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * ID of the object to add to a multi-language group.
     */
    #[Required]
    public string $id;

    /**
     * Designated language of the object to add to a multi-language group.
     */
    #[Required]
    public string $language;

    /**
     * ID of primary language object in multi-language group.
     */
    #[Required]
    public string $primaryId;

    /**
     * Primary language of the multi-language group.
     */
    #[Optional]
    public ?string $primaryLanguage;

    /**
     * `new SettingAttachToLangGroupParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SettingAttachToLangGroupParams::with(id: ..., language: ..., primaryId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SettingAttachToLangGroupParams)
     *   ->withID(...)
     *   ->withLanguage(...)
     *   ->withPrimaryID(...)
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
    public static function with(
        string $id,
        string $language,
        string $primaryId,
        ?string $primaryLanguage = null,
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['language'] = $language;
        $obj['primaryId'] = $primaryId;

        null !== $primaryLanguage && $obj['primaryLanguage'] = $primaryLanguage;

        return $obj;
    }

    /**
     * ID of the object to add to a multi-language group.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Designated language of the object to add to a multi-language group.
     */
    public function withLanguage(string $language): self
    {
        $obj = clone $this;
        $obj['language'] = $language;

        return $obj;
    }

    /**
     * ID of primary language object in multi-language group.
     */
    public function withPrimaryID(string $primaryID): self
    {
        $obj = clone $this;
        $obj['primaryId'] = $primaryID;

        return $obj;
    }

    /**
     * Primary language of the multi-language group.
     */
    public function withPrimaryLanguage(string $primaryLanguage): self
    {
        $obj = clone $this;
        $obj['primaryLanguage'] = $primaryLanguage;

        return $obj;
    }
}
