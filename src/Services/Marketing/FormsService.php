<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Forms\FieldGroup;
use HubspotSDK\Marketing\Forms\FieldGroup\GroupType;
use HubspotSDK\Marketing\Forms\FieldGroup\RichTextType;
use HubspotSDK\Marketing\Forms\FormDefinitionBase;
use HubspotSDK\Marketing\Forms\FormDisplayOptions;
use HubspotSDK\Marketing\Forms\FormDisplayOptions\Theme;
use HubspotSDK\Marketing\Forms\FormListParams\FormType;
use HubspotSDK\Marketing\Forms\FormPostSubmitAction;
use HubspotSDK\Marketing\Forms\FormPostSubmitAction\Type;
use HubspotSDK\Marketing\Forms\FormStyle;
use HubspotSDK\Marketing\Forms\FormStyle\SubmitAlignment;
use HubspotSDK\Marketing\Forms\HubSpotFormConfiguration;
use HubspotSDK\Marketing\Forms\HubSpotFormConfiguration\Language;
use HubspotSDK\Marketing\Forms\HubSpotFormDefinition;
use HubspotSDK\Marketing\Forms\LifecycleStage;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\FormsContract;

final class FormsService implements FormsContract
{
    /**
     * @api
     */
    public FormsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new FormsRawService($client);
    }

    /**
     * @api
     *
     * Add a new `hubspot` form
     *
     * @throws APIException
     */
    public function create(
        ?RequestOptions $requestOptions = null
    ): FormDefinitionBase {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update some of the form definition components
     *
     * @param string $formID the ID of the form to update
     * @param bool $archived whether this form is archived
     * @param array{
     *   allowLinkToResetKnownValues: bool,
     *   archivable: bool,
     *   cloneable: bool,
     *   createNewContactForNewEmail: bool,
     *   editable: bool,
     *   language: 'af'|'ar-eg'|'bg'|'bn'|'ca-es'|'cs'|'da'|'de'|'el'|'en'|'es'|'es-mx'|'fi'|'fr'|'fr-ca'|'he-il'|'hr'|'hu'|'id'|'it'|'ja'|'ko'|'lt'|'ms'|'nl'|'no-no'|'pl'|'pt'|'pt-br'|'ro'|'ru'|'sk'|'sl'|'sv'|'th'|'tl'|'tr'|'uk'|'vi'|'zh-cn'|'zh-hk'|'zh-tw'|Language,
     *   notifyContactOwner: bool,
     *   notifyRecipients: list<string>,
     *   postSubmitAction: array{
     *     type: 'redirect_url'|'thank_you'|Type, value: string
     *   }|FormPostSubmitAction,
     *   prePopulateKnownValues: bool,
     *   recaptchaEnabled: bool,
     *   lifecycleStages?: list<array{
     *     objectTypeID: string, value: string
     *   }|LifecycleStage>,
     * }|HubSpotFormConfiguration $configuration
     * @param array{
     *   renderRawHTML: bool,
     *   style: array{
     *     backgroundWidth: string,
     *     fontFamily: string,
     *     helpTextColor: string,
     *     helpTextSize: string,
     *     labelTextColor: string,
     *     labelTextSize: string,
     *     legalConsentTextColor: string,
     *     legalConsentTextSize: string,
     *     submitAlignment: 'center'|'left'|'right'|SubmitAlignment,
     *     submitColor: string,
     *     submitFontColor: string,
     *     submitSize: string,
     *   }|FormStyle,
     *   submitButtonText: string,
     *   theme: 'canvas'|'default_style'|'legacy'|'linear'|'round'|'sharp'|Theme,
     *   cssClass?: string,
     * }|FormDisplayOptions $displayOptions Options for styling the form
     * @param list<array{
     *   fields: list<array<string,mixed>>,
     *   groupType: 'default_group'|'progressive'|'queued'|GroupType,
     *   richTextType: 'image'|'text'|RichTextType,
     *   richText?: string,
     * }|FieldGroup> $fieldGroups The fields in the form, grouped in rows
     * @param array<string,mixed> $legalConsentOptions
     * @param string $name The name of the form. Expected to be unique for a hub.
     *
     * @throws APIException
     */
    public function update(
        string $formID,
        ?bool $archived = null,
        array|HubSpotFormConfiguration|null $configuration = null,
        array|FormDisplayOptions|null $displayOptions = null,
        ?array $fieldGroups = null,
        ?array $legalConsentOptions = null,
        ?string $name = null,
        ?RequestOptions $requestOptions = null,
    ): FormDefinitionBase {
        $params = [
            'archived' => $archived,
            'configuration' => $configuration,
            'displayOptions' => $displayOptions,
            'fieldGroups' => $fieldGroups,
            'legalConsentOptions' => $legalConsentOptions,
            'name' => $name,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($formID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of forms based on the search filters. By default, it returns the first 20 `hubspot` forms
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param bool $archived whether to return only results that have been archived
     * @param list<'hubspot'|'captured'|'flow'|'blog_comment'|'all'|FormType> $formTypes the form types to be included in the results
     * @param int $limit the maximum number of results to display per page
     *
     * @return Page<HubSpotFormDefinition>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?bool $archived = null,
        ?array $formTypes = null,
        ?int $limit = null,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = [
            'after' => $after,
            'archived' => $archived,
            'formTypes' => $formTypes,
            'limit' => $limit,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Archive a form definition. New submissions will not be accepted and the form definition will be permanently deleted after 3 months.
     *
     * @param string $formID the ID of the form to archive
     *
     * @throws APIException
     */
    public function delete(
        string $formID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($formID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a form based on the form ID provided.
     *
     * @param string $formID The unique identifier of the form
     * @param bool $archived whether to return only results that have been archived
     *
     * @throws APIException
     */
    public function get(
        string $formID,
        ?bool $archived = null,
        ?RequestOptions $requestOptions = null,
    ): FormDefinitionBase {
        $params = ['archived' => $archived];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($formID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update all fields of a hubspot form definition.
     *
     * @throws APIException
     */
    public function replace(
        string $formID,
        ?RequestOptions $requestOptions = null
    ): FormDefinitionBase {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->replace($formID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
