<?php
return [
    'default' => 'basic',
    'basic' => [
        # Model 设置
        'model' => [
            'config_type' => 'file',
            'config_file_path' => config_path() . '/plugin/qifen/casbin/rbac-model.conf',
            'config_text' => '',
        ],
        # 适配器
        'adapter' => \Qifen\Casbin\Adapter\DatabaseAdapter::class,
        'database' => [
            'connection' => '',
            'rules_table' => 'casbin_rule',
            'rules_name' => null
        ],
    ]
];