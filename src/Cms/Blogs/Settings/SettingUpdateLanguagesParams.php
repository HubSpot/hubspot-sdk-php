<?php

declare(strict_types=1);

namespace HubspotSDK\Cms\Blogs\Settings;

use HubspotSDK\Core\Attributes\Required;
use HubspotSDK\Core\Concerns\SdkModel;
use HubspotSDK\Core\Concerns\SdkParams;
use HubspotSDK\Core\Contracts\BaseModel;

/**
 * @see HubspotSDK\Services\Cms\Blogs\SettingsService::updateLanguages()
 *
 * @phpstan-type SettingUpdateLanguagesParamsShape = array{
 *   languages: array<string,string>, primaryId: string
 * }
 */
final class SettingUpdateLanguagesParams implements BaseModel
{
    /** @use SdkModel<SettingUpdateLanguagesParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Map of object IDs to associated languages of object in the multi-language group.
     *
     * @var array<string,string> $languages
     */
    #[Required(map: 'string')]
    public array $languages;

    /**
     * ID of the primary object in the multi-language group.
     */
    #[Required]
    public string $primaryId;

    /**
     * `new SettingUpdateLanguagesParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SettingUpdateLanguagesParams::with(languages: ..., primaryId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SettingUpdateLanguagesParams)->withLanguages(...)->withPrimaryID(...)
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
     * @param array<string,string> $languages
     */
    public static function with(array $languages, string $primaryId): self
    {
        $obj = new self;

        $obj['languages'] = $languages;
        $obj['primaryId'] = $primaryId;

        return $obj;
    }

    /**
     * Map of object IDs to associated languages of object in the multi-language group.
     *
     * @param array<string,string> $languages
     */
    public function withLanguages(array $languages): self
    {
        $obj = clone $this;
        $obj['languages'] = $languages;

        return $obj;
    }

    /**
     * ID of the primary object in the multi-language group.
     */
    public function withPrimaryID(string $primaryID): self
    {
        $obj = clone $this;
        $obj['primaryId'] = $primaryID;

        return $obj;
    }
}
