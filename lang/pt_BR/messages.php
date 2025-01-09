<?php

return [
    'permissions' => [
        'admin' => [
            'unauthorized' => '#10001 - Ops, parece que algo deu errado! Tente novamente ou entre em contato com o suporte.',
        ],
    ],

    'business_rules' => [
        'generic' => [
            'not_found'          => '#10002 - Ops, parece que algo deu errado! Tente novamente ou entre em contato com o suporte.',
            'not_found_explicit' => '#10003 - Registro não encontrado! Verifique os parâmetros de busca.',
        ],
    ],

    'response_messages' => [
        'products'   => [
            'index'   => 'Produtos recuperados em nossa base de dados.',
            'store'   => 'Novo produto cadastrado com sucesso.',
            'show'    => 'Produto encontrado em nossa base de dados.',
            'update'  => 'Atualização de produto bem sucedida.',
            'destroy' => 'Produto removido da nossa base de dados.',
        ],
        'categories' => [
            'index'   => 'Categorias recuperadas em nossa base de dados.',
            'store'   => 'Nova categoria cadastrada com sucesso.',
            'show'    => 'Categoria encontrada em nossa base de dados.',
            'update'  => 'Atualização de categoria bem sucedida.',
            'destroy' => 'Categoria removido da nossa base de dados.',
        ],
        'auth'       => [
            'login'   => 'Login realizado com sucesso, seja bem-vindo!',
            'logout'  => 'Você saiu da sua conta!',
        ],
    ],
];
