<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Implementation\HasRawResponse;
use HubspotSDK\Marketing\Forms\FormListParams;
use HubspotSDK\Marketing\Forms\FormReadParams;
use HubspotSDK\Marketing\Forms\FormReplaceParams;
use HubspotSDK\Marketing\Forms\FormReplaceParams\FormType;
use HubspotSDK\Marketing\Forms\FormUpdateParams;
use HubspotSDK\Marketing\Forms\MarketingFormsCollectionResponseFormDefinitionBaseForwardPaging;
use HubspotSDK\Marketing\Forms\MarketingFormsFieldGroup;
use HubspotSDK\Marketing\Forms\MarketingFormsFormDisplayOptions;
use HubspotSDK\Marketing\Forms\MarketingFormsHubSpotFormConfiguration;
use HubspotSDK\Marketing\Forms\MarketingFormsLegalConsentOptionsExplicitConsentToProcess;
use HubspotSDK\Marketing\Forms\MarketingFormsLegalConsentOptionsImplicitConsentToProcess;
use HubspotSDK\Marketing\Forms\MarketingFormsLegalConsentOptionsLegitimateInterest;
use HubspotSDK\Marketing\Forms\MarketingFormsLegalConsentOptionsNone;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\FormsContract;

use const HubspotSDK\Core\OMIT as omit;

final class FormsService implements FormsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a form
     *
     * @throws APIException
     */
    public function create(?RequestOptions $requestOptions = null): mixed
    {
        $params = [];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function createRaw(
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'marketing/v3/forms/',
            options: $requestOptions,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * Partially update a form definition
     *
     * @param bool $archived
     * @param MarketingFormsHubSpotFormConfiguration $configuration
     * @param MarketingFormsFormDisplayOptions $displayOptions
     * @param list<MarketingFormsFieldGroup> $fieldGroups
     * @param MarketingFormsLegalConsentOptionsNone|MarketingFormsLegalConsentOptionsLegitimateInterest|MarketingFormsLegalConsentOptionsExplicitConsentToProcess|MarketingFormsLegalConsentOptionsImplicitConsentToProcess $legalConsentOptions
     * @param string $name
     *
     * @throws APIException
     */
    public function update(
        string $formID,
        $archived = omit,
        $configuration = omit,
        $displayOptions = omit,
        $fieldGroups = omit,
        $legalConsentOptions = omit,
        $name = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'archived' => $archived,
            'configuration' => $configuration,
            'displayOptions' => $displayOptions,
            'fieldGroups' => $fieldGroups,
            'legalConsentOptions' => $legalConsentOptions,
            'name' => $name,
        ];

        return $this->updateRaw($formID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $formID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = FormUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['marketing/v3/forms/%1$s', $formID],
            body: (object) $parsed,
            options: $options,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * Get a list of forms
     *
     * @param string $after
     * @param bool $archived
     * @param list<HubspotSDK\Marketing\Forms\FormListParams\FormType|value-of<HubspotSDK\Marketing\Forms\FormListParams\FormType>> $formTypes
     * @param int $limit
     *
     * @return MarketingFormsCollectionResponseFormDefinitionBaseForwardPaging<
     *   HasRawResponse
     * >
     *
     * @throws APIException
     */
    public function list(
        $after = omit,
        $archived = omit,
        $formTypes = omit,
        $limit = omit,
        ?RequestOptions $requestOptions = null,
    ): MarketingFormsCollectionResponseFormDefinitionBaseForwardPaging {
        $params = [
            'after' => $after,
            'archived' => $archived,
            'formTypes' => $formTypes,
            'limit' => $limit,
        ];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return MarketingFormsCollectionResponseFormDefinitionBaseForwardPaging<
     *   HasRawResponse
     * >
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): MarketingFormsCollectionResponseFormDefinitionBaseForwardPaging {
        [$parsed, $options] = FormListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'marketing/v3/forms/',
            query: $parsed,
            options: $options,
            convert: MarketingFormsCollectionResponseFormDefinitionBaseForwardPaging::class,
        );
    }

    /**
     * @api
     *
     * Archive a form definition
     *
     * @throws APIException
     */
    public function delete(
        string $formID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = [];

        return $this->deleteRaw($formID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $formID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
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
     * Get a form definition
     *
     * @param bool $archived
     *
     * @throws APIException
     */
    public function read(
        string $formID,
        $archived = omit,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['archived' => $archived];

        return $this->readRaw($formID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function readRaw(
        string $formID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = FormReadParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['marketing/v3/forms/%1$s', $formID],
            query: $parsed,
            options: $options,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * Update a form definition
     *
     * @param string $id
     * @param bool $archived
     * @param MarketingFormsHubSpotFormConfiguration $configuration
     * @param \DateTimeInterface $createdAt
     * @param MarketingFormsFormDisplayOptions $displayOptions
     * @param list<MarketingFormsFieldGroup> $fieldGroups
     * @param FormType|value-of<FormType> $formType
     * @param MarketingFormsLegalConsentOptionsNone|MarketingFormsLegalConsentOptionsLegitimateInterest|MarketingFormsLegalConsentOptionsExplicitConsentToProcess|MarketingFormsLegalConsentOptionsImplicitConsentToProcess $legalConsentOptions
     * @param string $name
     * @param \DateTimeInterface $updatedAt
     * @param \DateTimeInterface $archivedAt
     *
     * @throws APIException
     */
    public function replace(
        string $formID,
        $id,
        $archived,
        $configuration,
        $createdAt,
        $displayOptions,
        $fieldGroups,
        $formType = 'hubspot',
        $legalConsentOptions,
        $name,
        $updatedAt,
        $archivedAt = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'id' => $id,
            'archived' => $archived,
            'configuration' => $configuration,
            'createdAt' => $createdAt,
            'displayOptions' => $displayOptions,
            'fieldGroups' => $fieldGroups,
            'formType' => $formType,
            'legalConsentOptions' => $legalConsentOptions,
            'name' => $name,
            'updatedAt' => $updatedAt,
            'archivedAt' => $archivedAt,
        ];

        return $this->replaceRaw($formID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function replaceRaw(
        string $formID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = FormReplaceParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['marketing/v3/forms/%1$s', $formID],
            body: (object) $parsed,
            options: $options,
            convert: 'mixed',
        );
    }
}
