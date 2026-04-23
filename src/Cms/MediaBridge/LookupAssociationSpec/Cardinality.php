<?php

declare(strict_types=1);

namespace HubSpotSDK\Cms\MediaBridge\LookupAssociationSpec;

enum Cardinality: string
{
    case ONE_TO_MANY = 'ONE_TO_MANY';

    case ONE_TO_ONE = 'ONE_TO_ONE';
}
