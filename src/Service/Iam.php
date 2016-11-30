<?php
/**
 * creator: maigoxin
 */
namespace Ksyun\Service;

use Ksyun\Base\V4Curl;
class Iam extends V4Curl 
{
    protected function getConfig()
    {
        return [
            'host' => 'https://iam.api.ksyun.com',
            'config' => [
                'timeout' => 5.0,
                'headers' => [
                    'Accept' => 'application/json'
                ],
                'v4_credentials' => [
                    'region' => 'cn-beijing-6',
                    'service' => 'iam',
                ],
            ],
        ];
    }

    protected $apiList = [
        'CreateUser' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'CreateUser',
                    'Version' => '2015-11-01',
                ],
            ],
        ],
        'DeleteUser' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DeleteUser',
                    'Version' => '2015-11-01',
                ],
            ],
        ],
        'GetUser' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetUser',
                    'Version' => '2015-11-01',
                ],
            ],
        ],
        'UpdateUser' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'UpdateUser',
                    'Version' => '2015-11-01',
                ],
            ],
        ],
        'ListUsers' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ListUsers',
                    'Version' => '2015-11-01',
                ],
            ],
        ],
        'CreateLoginProfile' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'CreateLoginProfile',
                    'Version' => '2015-11-01',
                ],
            ],
        ],
        'DeleteLoginProfile' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DeleteLoginProfile',
                    'Version' => '2015-11-01',
                ],
            ],
        ],
        'GetLoginProfile' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetLoginProfile',
                    'Version' => '2015-11-01',
                ],
            ],
        ],
        'UpdateLoginProfile' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'UpdateLoginProfile',
                    'Version' => '2015-11-01',
                ],
            ],
        ],
        'ChangePassword' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ChangePassword',
                    'Version' => '2015-11-01',
                ],
            ],
        ],
        'CreateAccessKey' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'CreateAccessKey',
                    'Version' => '2015-11-01',
                ],
            ],
        ],
        'DeleteAccessKey' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DeleteAccessKey',
                    'Version' => '2015-11-01',
                ],
            ],
        ],
        'UpdateAccessKey' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'UpdateAccessKey',
                    'Version' => '2015-11-01',
                ],
            ],
        ],
        'ListAccessKeys' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ListAccessKeys',
                    'Version' => '2015-11-01',
                ],
            ],
        ],
        'CreatePolicy' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'CreatePolicy',
                    'Version' => '2015-11-01',
                ],
            ],
        ],
        'DeletePolicy' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DeletePolicy',
                    'Version' => '2015-11-01',
                ],
            ],
        ],
        'GetPolicy' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetPolicy',
                    'Version' => '2015-11-01',
                ],
            ],
        ],
        'ListPolicies' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ListPolicies',
                    'Version' => '2015-11-01',
                ],
            ],
        ],
        'CreatePolicyVersion' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'CreatePolicyVersion',
                    'Version' => '2015-11-01',
                ],
            ],
        ],
        'GetPolicyVersion' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetPolicyVersion',
                    'Version' => '2015-11-01',
                ],
            ],
        ],
        'DeletePolicyVersion' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DeletePolicyVersion',
                    'Version' => '2015-11-01',
                ],
            ],
        ],
        'ListPolicyVersions' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ListPolicyVersions',
                    'Version' => '2015-11-01',
                ],
            ],
        ],
        'SetDefaultPolicyVersion' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'SetDefaultPolicyVersion',
                    'Version' => '2015-11-01',
                ],
            ],
        ],
        'AttachUserPolicy' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'AttachUserPolicy',
                    'Version' => '2015-11-01',
                ],
            ],
        ],
        'DetachUserPolicy' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'DetachUserPolicy',
                    'Version' => '2015-11-01',
                ],
            ],
        ],
        'ListAttachedUserPolicies' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ListAttachedUserPolicies',
                    'Version' => '2015-11-01',
                ],
            ],
        ],
        'ListEntitiesForPolicy' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'ListEntitiesForPolicy',
                    'Version' => '2015-11-01',
                ],
            ],
        ],
        'GetAccountSummary' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'GetAccountSummary',
                    'Version' => '2015-11-01',
                ],
            ],
        ],
    ];
}

