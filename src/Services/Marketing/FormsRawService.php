<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Forms\FormDefinitionBase;
use HubspotSDK\Marketing\Forms\FormDisplayOptions;
use HubspotSDK\Marketing\Forms\FormGetParams;
use HubspotSDK\Marketing\Forms\FormListParams;
use HubspotSDK\Marketing\Forms\FormListParams\FormType;
use HubspotSDK\Marketing\Forms\FormUpdateParams;
use HubspotSDK\Marketing\Forms\HubSpotFormConfiguration;
use HubspotSDK\Marketing\Forms\HubSpotFormDefinition;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\FormsRawContract;

/**
 * @phpstan-import-type HubSpotFormConfigurationShape from \HubspotSDK\Marketing\Forms\HubSpotFormConfiguration
 * @phpstan-import-type FormDisplayOptionsShape from \HubspotSDK\Marketing\Forms\FormDisplayOptions
 * @phpstan-import-type LegalConsentOptionsShape from \HubspotSDK\Marketing\Forms\FormUpdateParams\LegalConsentOptions
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class FormsRawService implements FormsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Add a new `hubspot` form
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FormDefinitionBase>
     *
     * @throws APIException
     */
    public function create(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'marketing/v3/forms/',
            options: $requestOptions,
            convert: FormDefinitionBase::class,
        );
    }

    /**
     * @api
     *
     * Update some of the form definition components
     *
     * @param string $formID the ID of the form to update
     * @param array{
     *   archived?: bool,
     *   configuration?: HubSpotFormConfiguration|HubSpotFormConfigurationShape,
     *   displayOptions?: FormDisplayOptions|FormDisplayOptionsShape,
     *   fieldGroups?: list<mixed>,
     *   legalConsentOptions?: LegalConsentOptionsShape,
     *   name?: string,
     * }|FormUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FormDefinitionBase>
     *
     * @throws APIException
     */
    public function update(
        string $formID,
        array|FormUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FormUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['marketing/v3/forms/%1$s', $formID],
            body: (object) $parsed,
            options: $options,
            convert: FormDefinitionBase::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of forms based on the search filters. By default, it returns the first 20 `hubspot` forms
     *
     * @param array{
     *   after?: string,
     *   archived?: bool,
     *   formTypes?: list<FormType|value-of<FormType>>,
     *   limit?: int,
     * }|FormListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<HubSpotFormDefinition>>
     *
     * @throws APIException
     */
    public function list(
        array|FormListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FormListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'marketing/v3/forms/',
            query: $parsed,
            options: $options,
            convert: HubSpotFormDefinition::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Archive a form definition. New submissions will not be accepted and the form definition will be permanently deleted after 3 months.
     *
     * @param string $formID the ID of the form to archive
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $formID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['marketing/v3/forms/%1$s', $formID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Returns a form based on the form ID provided.
     *
     * @param string $formID The unique identifier of the form
     * @param array{archived?: bool}|FormGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FormDefinitionBase>
     *
     * @throws APIException
     */
    public function get(
        string $formID,
        array|FormGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FormGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['marketing/v3/forms/%1$s', $formID],
            query: $parsed,
            options: $options,
            convert: FormDefinitionBase::class,
        );
    }

    /**
     * @api
     *
     * Update all fields of a hubspot form definition.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FormDefinitionBase>
     *
     * @throws APIException
     */
    public function replace(
        string $formID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['marketing/v3/forms/%1$s', $formID],
            options: $requestOptions,
            convert: FormDefinitionBase::class,
        );
    }
}
