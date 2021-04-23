define({ "api": [
  {
    "type": "post",
    "url": "/forgot-password",
    "title": "Esqueci Senha",
    "description": "<p>Envia o link de redefinição de senha para o email do usuário</p>",
    "name": "EsqueciSenha",
    "group": "Auth",
    "version": "0.0.1",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email do usuário</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>Status da operação</p>"
          }
        ]
      }
    },
    "filename": "routes/api/auth.php",
    "groupTitle": "Auth",
    "sampleRequest": [
      {
        "url": "https://recipes.renatospindolasistemas.com.br/api/forgot-password"
      }
    ]
  },
  {
    "type": "post",
    "url": "/login",
    "title": "Login",
    "description": "<p>Entra no sistema</p>",
    "name": "Login",
    "group": "Auth",
    "version": "0.0.1",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email do usuário.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>Senha do usuário.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Nome do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "gender",
            "description": "<p>Sexo do usuário. (M, F)</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "avatar",
            "description": "<p>Avatar do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "phone",
            "description": "<p>Celular do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "origin",
            "description": "<p>Origem do registro do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>Status do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "created_at",
            "description": "<p>Momento de criação do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "auth",
            "description": "<p>Informações de autenticação.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "auth.access_token",
            "description": "<p>Token de acesso</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "auth.token_type",
            "description": "<p>Tipo do token</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "auth.expires_in",
            "description": "<p>Tempo de validade do token</p>"
          }
        ]
      }
    },
    "filename": "routes/api/auth.php",
    "groupTitle": "Auth",
    "sampleRequest": [
      {
        "url": "https://recipes.renatospindolasistemas.com.br/api/login"
      }
    ]
  },
  {
    "type": "get",
    "url": "/logout",
    "title": "Revogar Token",
    "description": "<p>Revoga o token de acesso do usuário</p>",
    "name": "Logout",
    "group": "Auth",
    "version": "0.0.1",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "response",
            "description": "<p>Mensagem de sucesso</p>"
          }
        ]
      }
    },
    "filename": "routes/api/auth.php",
    "groupTitle": "Auth",
    "sampleRequest": [
      {
        "url": "https://recipes.renatospindolasistemas.com.br/api/logout"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Token gerado (access_token)</p>"
          }
        ]
      }
    }
  },
  {
    "type": "post",
    "url": "/oauth/token",
    "title": "Obter Token",
    "description": "<p>Obtém o token de acesso (access_token)</p>",
    "name": "OauthToken",
    "group": "Auth",
    "version": "0.0.1",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "grant_type",
            "description": "<p>Tipo de autorizaçao (<code>client_credentials</code> para aplicações e <code>password</code> para usuários).</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "client_id",
            "description": "<p>ID do cliente</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "client_secret",
            "description": "<p>Chave de segurança do cliente</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "username",
            "description": "<p>Email do usuário</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "password",
            "description": "<p>Senha do usuário</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "scope",
            "description": "<p>Escopos da API (separados por espaço)</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "token_type",
            "description": "<p>Tipo de token</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "expires_in",
            "description": "<p>Tempo de vida do token (em segundos)</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "access_token",
            "description": "<p>Token de acesso</p>"
          }
        ]
      }
    },
    "filename": "routes/api/auth.php",
    "groupTitle": "Auth",
    "sampleRequest": [
      {
        "url": "https://recipes.renatospindolasistemas.com.br/api/oauth/token"
      }
    ]
  },
  {
    "type": "post",
    "url": "/register",
    "title": "Registrar Usuário",
    "description": "<p>Registra um novo usuário</p>",
    "name": "Registrar",
    "group": "Auth",
    "version": "0.0.1",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Nome do usuário.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email do usuário.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>Senha do usuário.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "gender",
            "description": "<p>Sexo do usuário. (M, F)</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "avatar",
            "description": "<p>Avatar do usuário.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "phone",
            "description": "<p>Celular do usuário.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Nome do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "gender",
            "description": "<p>Sexo do usuário. (M, F)</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "avatar",
            "description": "<p>Avatar do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "phone",
            "description": "<p>Celular do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "origin",
            "description": "<p>Origem do registro do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>Status do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "created_at",
            "description": "<p>Momento de criação do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "auth",
            "description": "<p>Informações de autenticação.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "auth.access_token",
            "description": "<p>Token de acesso</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "auth.token_type",
            "description": "<p>Tipo do token</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "auth.expires_in",
            "description": "<p>Tempo de validade do token</p>"
          }
        ]
      }
    },
    "filename": "routes/api/auth.php",
    "groupTitle": "Auth",
    "sampleRequest": [
      {
        "url": "https://recipes.renatospindolasistemas.com.br/api/register"
      }
    ]
  },
  {
    "type": "post",
    "url": "/categories",
    "title": "Cadastrar Categoria",
    "description": "<p>Cadastra uma nova categoria no sistema</p>",
    "name": "CadastrarCategoria",
    "group": "Categoria",
    "version": "0.0.1",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Nome da categoria.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "description",
            "description": "<p>Descrição da categoria.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "icon",
            "description": "<p>URL da imagem do icone da categoria.</p>"
          }
        ]
      }
    },
    "filename": "routes/api/categories.php",
    "groupTitle": "Categoria",
    "sampleRequest": [
      {
        "url": "https://recipes.renatospindolasistemas.com.br/api/categories"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Token gerado (access_token)</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>ID da categoria.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Nome da categoria.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "description",
            "description": "<p>Descrição da categoria.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "icon",
            "description": "<p>URL da imagem do icone da categoria.</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "created_at",
            "description": "<p>Momento de criação da categoria.</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "updated_at",
            "description": "<p>Momento de atualização da categoria.</p>"
          }
        ]
      }
    }
  },
  {
    "type": "put",
    "url": "/categories/:category",
    "title": "Editar Categoria",
    "description": "<p>Edita uma categoria no sistema</p>",
    "name": "EditarCategoria",
    "group": "Categoria",
    "version": "0.0.1",
    "parameter": {
      "fields": {
        "URL": [
          {
            "group": "URL",
            "type": "Number",
            "optional": false,
            "field": "category",
            "description": "<p>ID da categoria</p>"
          }
        ],
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Nome da categoria.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "description",
            "description": "<p>Descrição da categoria.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "icon",
            "description": "<p>URL da imagem do icone da categoria.</p>"
          }
        ]
      }
    },
    "filename": "routes/api/categories.php",
    "groupTitle": "Categoria",
    "sampleRequest": [
      {
        "url": "https://recipes.renatospindolasistemas.com.br/api/categories/:category"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Token gerado (access_token)</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>ID da categoria.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Nome da categoria.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "description",
            "description": "<p>Descrição da categoria.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "icon",
            "description": "<p>URL da imagem do icone da categoria.</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "created_at",
            "description": "<p>Momento de criação da categoria.</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "updated_at",
            "description": "<p>Momento de atualização da categoria.</p>"
          }
        ]
      }
    }
  },
  {
    "type": "get",
    "url": "/categories",
    "title": "Obter Categorias",
    "description": "<p>Obtém a listagrem de todas as categorias no sistema</p>",
    "name": "ObterCategorias",
    "group": "Categoria",
    "version": "0.0.1",
    "filename": "routes/api/categories.php",
    "groupTitle": "Categoria",
    "sampleRequest": [
      {
        "url": "https://recipes.renatospindolasistemas.com.br/api/categories"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Token gerado (access_token)</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>ID da categoria.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Nome da categoria.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "description",
            "description": "<p>Descrição da categoria.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "icon",
            "description": "<p>URL da imagem do icone da categoria.</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "created_at",
            "description": "<p>Momento de criação da categoria.</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "updated_at",
            "description": "<p>Momento de atualização da categoria.</p>"
          }
        ]
      }
    }
  },
  {
    "type": "delete",
    "url": "/categories/:category",
    "title": "Remover Categoria",
    "description": "<p>Remove uma categoria do sistema.</p>",
    "name": "RemoverCategoria",
    "group": "Categoria",
    "version": "0.0.1",
    "parameter": {
      "fields": {
        "URL": [
          {
            "group": "URL",
            "type": "Number",
            "optional": false,
            "field": "category",
            "description": "<p>ID da categoria.</p>"
          }
        ]
      }
    },
    "filename": "routes/api/categories.php",
    "groupTitle": "Categoria",
    "sampleRequest": [
      {
        "url": "https://recipes.renatospindolasistemas.com.br/api/categories/:category"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Token gerado (access_token)</p>"
          }
        ]
      }
    }
  },
  {
    "type": "post",
    "url": "/recipes",
    "title": "Cadastrar Receita",
    "description": "<p>Cadastra uma nova receita no sistema</p>",
    "name": "CadastrarReceita",
    "group": "Receita",
    "version": "0.0.1",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "category_id",
            "description": "<p>ID da categoria relacionada a receita.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Nome da receita.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "description",
            "description": "<p>Descrição da receita.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "image",
            "description": "<p>URL da imagem de destaque da receita.</p>"
          }
        ]
      }
    },
    "filename": "routes/api/recipes.php",
    "groupTitle": "Receita",
    "sampleRequest": [
      {
        "url": "https://recipes.renatospindolasistemas.com.br/api/recipes"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Token gerado (access_token)</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>ID da receita.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Nome da receita.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "description",
            "description": "<p>Descrição da receita.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "icon",
            "description": "<p>URL da imagem do icone da receita.</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "created_at",
            "description": "<p>Momento de criação da receita.</p>"
          }
        ]
      }
    }
  },
  {
    "type": "put",
    "url": "/recipes/:recipe",
    "title": "Editar Receita",
    "description": "<p>Edita uma receita no sistema</p>",
    "name": "EditarReceita",
    "group": "Receita",
    "version": "0.0.1",
    "parameter": {
      "fields": {
        "URL": [
          {
            "group": "URL",
            "type": "Number",
            "optional": false,
            "field": "recipe",
            "description": "<p>ID da receita</p>"
          }
        ],
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Nome da receita.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "description",
            "description": "<p>Descrição da receita.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "image",
            "description": "<p>URL da imagem de destaque da receita.</p>"
          }
        ]
      }
    },
    "filename": "routes/api/recipes.php",
    "groupTitle": "Receita",
    "sampleRequest": [
      {
        "url": "https://recipes.renatospindolasistemas.com.br/api/recipes/:recipe"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Token gerado (access_token)</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>ID da categoria.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Nome da categoria.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "description",
            "description": "<p>Descrição da categoria.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "icon",
            "description": "<p>URL da imagem do icone da categoria.</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "created_at",
            "description": "<p>Momento de criação da categoria.</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "updated_at",
            "description": "<p>Momento de atualização da categoria.</p>"
          }
        ]
      }
    }
  },
  {
    "type": "get",
    "url": "/recipes",
    "title": "Listar Receitas",
    "description": "<p>Obtém a listagrem de todas as receitas no sistema</p>",
    "name": "ListarReceitas",
    "group": "Receita",
    "version": "0.0.1",
    "filename": "routes/api/recipes.php",
    "groupTitle": "Receita",
    "sampleRequest": [
      {
        "url": "https://recipes.renatospindolasistemas.com.br/api/recipes"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Token gerado (access_token)</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>ID da receita.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Nome da receita.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "description",
            "description": "<p>Descrição da receita.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "icon",
            "description": "<p>URL da imagem do icone da receita.</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "created_at",
            "description": "<p>Momento de criação da receita.</p>"
          }
        ]
      }
    }
  },
  {
    "type": "get",
    "url": "/recipes/:recipe",
    "title": "Obter Receita",
    "description": "<p>Obtém a receita no sistema pelo id</p>",
    "name": "ObterReceita",
    "group": "Receita",
    "version": "0.0.1",
    "parameter": {
      "fields": {
        "URL": [
          {
            "group": "URL",
            "type": "Number",
            "optional": false,
            "field": "recipe",
            "description": "<p>ID da receita</p>"
          }
        ]
      }
    },
    "filename": "routes/api/recipes.php",
    "groupTitle": "Receita",
    "sampleRequest": [
      {
        "url": "https://recipes.renatospindolasistemas.com.br/api/recipes/:recipe"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Token gerado (access_token)</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>ID da receita.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Nome da receita.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "description",
            "description": "<p>Descrição da receita.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "icon",
            "description": "<p>URL da imagem do icone da receita.</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "created_at",
            "description": "<p>Momento de criação da receita.</p>"
          }
        ]
      }
    }
  },
  {
    "type": "delete",
    "url": "/recipes/:recipe",
    "title": "Remover Receita",
    "description": "<p>Remove uma receita do sistema.</p>",
    "name": "RemoverReceita",
    "group": "Receita",
    "version": "0.0.1",
    "parameter": {
      "fields": {
        "URL": [
          {
            "group": "URL",
            "type": "Number",
            "optional": false,
            "field": "recipe",
            "description": "<p>ID da receita.</p>"
          }
        ]
      }
    },
    "filename": "routes/api/recipes.php",
    "groupTitle": "Receita",
    "sampleRequest": [
      {
        "url": "https://recipes.renatospindolasistemas.com.br/api/recipes/:recipe"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Token gerado (access_token)</p>"
          }
        ]
      }
    }
  },
  {
    "type": "put",
    "url": "/users/:user/change-password",
    "title": "Alterar Senha",
    "description": "<p>Altera a senha do usuário</p>",
    "name": "AlterarSenhaUsuario",
    "group": "Usuário",
    "version": "0.0.1",
    "parameter": {
      "fields": {
        "URL": [
          {
            "group": "URL",
            "type": "Number",
            "optional": false,
            "field": "user",
            "description": "<p>ID do usuário ou use <code>me</code> para utilizar o usuário autenticado</p>"
          }
        ],
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "old_password",
            "description": "<p>Senha Antiga</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "new_password",
            "description": "<p>Nova Senha</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>Situação da atualização</p>"
          }
        ]
      }
    },
    "filename": "routes/api/users.php",
    "groupTitle": "Usuário",
    "sampleRequest": [
      {
        "url": "https://recipes.renatospindolasistemas.com.br/api/users/:user/change-password"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Token gerado (access_token)</p>"
          }
        ]
      }
    }
  },
  {
    "type": "post",
    "url": "/users",
    "title": "Cadastrar Usuário",
    "description": "<p>Cadastra um novo usuário</p>",
    "name": "CadastrarUsuario",
    "group": "Usuário",
    "version": "0.0.1",
    "permission": [
      {
        "name": "users.create"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Nome do usuário.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email do usuário.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>Senha do usuário.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "gender",
            "description": "<p>Sexo do usuário. (M, F)</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "avatar",
            "description": "<p>Avatar do usuário.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "phone",
            "description": "<p>Celular do usuário.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Nome do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "gender",
            "description": "<p>Sexo do usuário. (M, F)</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "avatar",
            "description": "<p>Avatar do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "phone",
            "description": "<p>Celular do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "origin",
            "description": "<p>Origem do registro do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>Status do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "created_at",
            "description": "<p>Momento de criação do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "auth",
            "description": "<p>Informações de autenticação.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "auth.access_token",
            "description": "<p>Token de acesso</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "auth.token_type",
            "description": "<p>Tipo do token</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "auth.expires_in",
            "description": "<p>Tempo de validade do token</p>"
          }
        ]
      }
    },
    "filename": "routes/api/users.php",
    "groupTitle": "Usuário",
    "sampleRequest": [
      {
        "url": "https://recipes.renatospindolasistemas.com.br/api/users"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Token gerado (access_token)</p>"
          }
        ]
      }
    }
  },
  {
    "type": "put",
    "url": "/users/:user",
    "title": "Editar Usuário",
    "description": "<p>Edita um usuário</p>",
    "name": "EditarUsuario",
    "group": "Usuário",
    "version": "0.0.1",
    "parameter": {
      "fields": {
        "URL": [
          {
            "group": "URL",
            "type": "Number",
            "optional": false,
            "field": "user",
            "description": "<p>ID do usuário ou use <code>me</code> para utilizar o usuário autenticado</p>"
          }
        ],
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "name",
            "description": "<p>Nome do usuário.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "avatar",
            "description": "<p>Avatar do usuário.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "phone",
            "description": "<p>Celular do usuário.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "gender",
            "description": "<p>Sexo do usuário. (M, F)</p>"
          }
        ]
      }
    },
    "filename": "routes/api/users.php",
    "groupTitle": "Usuário",
    "sampleRequest": [
      {
        "url": "https://recipes.renatospindolasistemas.com.br/api/users/:user"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Token gerado (access_token)</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>ID do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Nome do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "gender",
            "description": "<p>Gênero do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "avatar",
            "description": "<p>URL do avatar do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "phone",
            "description": "<p>Telefone do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "origin",
            "description": "<p>Origem da criação do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>Situação do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "created_at",
            "description": "<p>Momento de criação do usuário.</p>"
          }
        ]
      }
    }
  },
  {
    "type": "get",
    "url": "/users/:user",
    "title": "Obter Usuário",
    "description": "<p>Obtém as informações do usuário</p>",
    "name": "ObterUsuario",
    "group": "Usuário",
    "version": "0.0.1",
    "parameter": {
      "fields": {
        "URL": [
          {
            "group": "URL",
            "type": "Number|String",
            "optional": false,
            "field": "user",
            "description": "<p>ID do usuário ou use <code>me</code> para utilizar o usuário autenticado</p>"
          }
        ]
      }
    },
    "filename": "routes/api/users.php",
    "groupTitle": "Usuário",
    "sampleRequest": [
      {
        "url": "https://recipes.renatospindolasistemas.com.br/api/users/:user"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>Token gerado (access_token)</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>ID do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Nome do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "gender",
            "description": "<p>Gênero do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "avatar",
            "description": "<p>URL do avatar do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "phone",
            "description": "<p>Telefone do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "origin",
            "description": "<p>Origem da criação do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>Situação do usuário.</p>"
          },
          {
            "group": "Success 200",
            "type": "Timestamp",
            "optional": false,
            "field": "created_at",
            "description": "<p>Momento de criação do usuário.</p>"
          }
        ]
      }
    }
  }
] });
